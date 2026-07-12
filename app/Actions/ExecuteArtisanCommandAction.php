<?php

declare(strict_types=1);

namespace Modules\Xot\Actions;

use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Process;
use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;

/**
 * Classe per eseguire comandi Artisan in modo sicuro.
 */
class ExecuteArtisanCommandAction
{
    use QueueableAction;

    /**
     * Lista dei comandi consentiti per motivi di sicurezza (match esatto).
     *
     * @var array<int, string>
     */
    private array $allowedCommands = [
        'migrate',
        'filament:upgrade',
        'filament:optimize',
        'view:cache',
        'config:cache',
        'route:cache',
        'event:cache',
        'queue:restart',
    ];

    /**
     * Prefissi di comandi consentiti (es. passport:install, passport:keys).
     * Un comando che inizia con uno di questi prefissi è consentito (con opzioni).
     *
     * @var array<int, string>
     */
    private array $allowedCommandPrefixes = [
        'passport:install',
        'passport:keys',
        'passport:purge',
        'passport:hash',
    ];

    /**
     * Esegue un comando Artisan e restituisce i risultati.
     *
     * @param string $command Il comando Artisan da eseguire (senza "php artisan")
     *
     * @throws \RuntimeException Se il comando non è consentito o si verifica un errore
     *
     * @return array{
     *     command: string,
     *     output: array<int, string>,
     *     status: 'completed'|'failed',
     *     exitCode: int
     * } Array con informazioni sull'esecuzione del comando
     */
    public function execute(string $command): array
    {
        Assert::stringNotEmpty($command, 'Il comando non può essere vuoto');

        if (! $this->isCommandAllowed($command)) {
            throw new \RuntimeException("Comando non consentito: {$command}");
        }

        /** @var array<int, string> $output */
        $output = [];
        $status = 'running';

        Event::dispatch('artisan-command.started', [$command]);

        try {
            $process = Process::path(base_path())
                ->command("php artisan {$command}")
                ->timeout(300)
                ->start();

            while ($process->running()) {
                $this->appendProcessStream($process->latestOutput(), $command, $output);
                $this->appendProcessStream($process->latestErrorOutput(), $command, $output, true);
                usleep(50000);
            }

            $result = $process->wait();

            $this->appendProcessStream($result->output(), $command, $output);
            $this->appendProcessStream($result->errorOutput(), $command, $output, true);

            if ($result->successful()) {
                $status = 'completed';
                Event::dispatch('artisan-command.completed', [$command]);
            } else {
                $status = 'failed';
                Event::dispatch('artisan-command.failed', [$command, $result->errorOutput()]);
            }

            return [
                'command' => $command,
                'output' => $output,
                'status' => $status,
                'exitCode' => $result->exitCode() ?? 0,
            ];
        } catch (\Throwable $e) {
            Event::dispatch('artisan-command.error', [$command, $e->getMessage()]);
            throw new \RuntimeException("Errore durante l'esecuzione del comando {$command}: {$e->getMessage()}", (int) $e->getCode(), $e);
        }
    }

    /**
     * @param array<int, string> $output
     */
    private function appendProcessStream(string $data, string $command, array &$output, bool $isError = false): void
    {
        if ('' === $data) {
            return;
        }

        $formatted = trim($data);
        if ('' === $formatted) {
            return;
        }

        $line = $isError ? '[ERROR] '.$formatted : $formatted;
        $output[] = $line;
        Event::dispatch('artisan-command.output', [$command, $line]);
    }

    /**
     * Verifica se un comando è presente nella lista dei comandi consentiti.
     *
     * @param string $command Il comando da verificare
     *
     * @return bool True se il comando è consentito, false altrimenti
     */
    private function isCommandAllowed(string $command): bool
    {
        Assert::stringNotEmpty($command, 'Il comando non può essere vuoto');

        if (in_array($command, $this->allowedCommands, true)) {
            return true;
        }

        foreach ($this->allowedCommandPrefixes as $prefix) {
            if (str_starts_with($command, $prefix)) {
                return true;
            }
        }

        return false;
    }
}
