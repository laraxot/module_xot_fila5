<?php

declare(strict_types=1);

namespace Modules\Xot\Actions;

<<<<<<< HEAD
=======
use Illuminate\Support\Facades\Event;
>>>>>>> 3792da0d (Check & fix styling)
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
     * Lista dei comandi consentiti per motivi di sicurezza.
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
        'passport:install --uuids',
        'passport:keys',
        'passport:purge',
        'passport:hash',
<<<<<<< HEAD
        'notify:migrate-themes-to-mail-templates',
=======
>>>>>>> 3792da0d (Check & fix styling)
    ];

    /**
     * Esegue un comando Artisan e restituisce i risultati.
     *
<<<<<<< .merge_file_2KU0mh
<<<<<<< HEAD
     * <<<<<<< HEAD
     *
     * @param string $command Il comando Artisan da eseguire (senza "php artisan")
     *                        =======
=======
>>>>>>> 3792da0d (Check & fix styling)
     * @param string $command Il comando Artisan da eseguire (senza "php artisan")
     *
     * @throws \RuntimeException Se il comando non è consentito o si verifica un errore
     *
<<<<<<< HEAD
     * >>>>>>> laraxot/dev
     * @throws \RuntimeException Se il comando non è consentito o si verifica un errore
     *                           =======
     *                           >>>>>>> laraxot/dev
     *
=======
     * @param  string  $command  Il comando Artisan da eseguire (senza "php artisan")
>>>>>>> .merge_file_TDxySn
     * @return array{
     *     command: string,
     *     output: list<string>,
     *     status: 'completed'|'failed',
     *     exitCode: int
     * } Array con informazioni sull'esecuzione del comando
<<<<<<< .merge_file_2KU0mh
     * <<<<<<< HEAD
=======
     * @return array{
     *     command: string,
     *     output: array<int, string>,
     *     status: 'completed'|'failed',
     *     exitCode: int
     * } Array con informazioni sull'esecuzione del comando
>>>>>>> 3792da0d (Check & fix styling)
=======
     *
     * @throws \RuntimeException Se il comando non è consentito o si verifica un errore
>>>>>>> .merge_file_TDxySn
     */
    public function execute(string $command): array
    {
        Assert::stringNotEmpty($command, 'Il comando non può essere vuoto');

        if (! $this->isCommandAllowed($command)) {
            throw new \RuntimeException("Comando non consentito: {$command}");
        }

<<<<<<< HEAD
        /** @var list<string> $output */
        $output = [];
        $status = 'running';

=======
        /** @var array<int, string> $output */
        $output = [];
        $status = 'running';

        Event::dispatch('artisan-command.started', [$command]);

>>>>>>> 3792da0d (Check & fix styling)
        try {
            $process = Process::path(base_path())
                ->command("php artisan {$command}")
                ->timeout(300)
                ->start();

<<<<<<< HEAD
            // Cattura l'output man mano che il processo produce dati; non e'
            // "tempo reale" lato browser (questa chiamata resta bloccante
            // dentro un'unica richiesta Livewire sincrona), ma evita di
            // rileggere tutto solo alla fine se il processo e' lungo.
=======
            // Cattura l'output in tempo reale
>>>>>>> 3792da0d (Check & fix styling)
            while ($process->running()) {
                $data = $process->latestOutput();
                if (! empty($data)) {
                    $formattedData = trim($data);
                    if (! empty($formattedData)) {
                        $output[] = $formattedData;
<<<<<<< HEAD
=======
                        Event::dispatch('artisan-command.output', [$command, $formattedData]);
>>>>>>> 3792da0d (Check & fix styling)
                    }
                }

                $errorData = $process->latestErrorOutput();
                if (! empty($errorData)) {
                    $formattedError = trim($errorData);
                    if (! empty($formattedError)) {
                        $output[] = '[ERROR] '.$formattedError;
<<<<<<< HEAD
=======
                        Event::dispatch('artisan-command.output', [$command, '[ERROR] '.$formattedError]);
>>>>>>> 3792da0d (Check & fix styling)
                    }
                }

                usleep(50000); // 50ms di pausa per evitare sovraccarico della CPU
            }

            $result = $process->wait();

            // Cattura qualsiasi output residuo
            $finalOutput = trim($result->output());
            if (! empty($finalOutput)) {
                $output[] = $finalOutput;
<<<<<<< HEAD
=======
                Event::dispatch('artisan-command.output', [$command, $finalOutput]);
>>>>>>> 3792da0d (Check & fix styling)
            }

            $finalErrorOutput = trim($result->errorOutput());
            if (! empty($finalErrorOutput)) {
                $output[] = '[ERROR] '.$finalErrorOutput;
<<<<<<< HEAD
            }

            $status = $result->successful() ? 'completed' : 'failed';
=======
                Event::dispatch('artisan-command.output', [$command, '[ERROR] '.$finalErrorOutput]);
            }

            if ($result->successful()) {
                $status = 'completed';
                Event::dispatch('artisan-command.completed', [$command]);
            } else {
                $status = 'failed';
                Event::dispatch('artisan-command.failed', [$command, $finalErrorOutput]);
            }
>>>>>>> 3792da0d (Check & fix styling)

            return [
                'command' => $command,
                'output' => $output,
                'status' => $status,
                'exitCode' => $result->exitCode() ?? 0,
            ];
        } catch (\Throwable $e) {
<<<<<<< HEAD
=======
            Event::dispatch('artisan-command.error', [$command, $e->getMessage()]);
>>>>>>> 3792da0d (Check & fix styling)
            throw new \RuntimeException("Errore durante l'esecuzione del comando {$command}: {$e->getMessage()}", (int) $e->getCode(), $e);
        }
    }

    /**
     * Verifica se un comando è presente nella lista dei comandi consentiti.
     *
<<<<<<< .merge_file_2KU0mh
<<<<<<< HEAD
     * <<<<<<< HEAD
     *
     * @param string $command Il comando da verificare
     *                        =======
     * @param string $command Il comando da verificare
     *
     * >>>>>>> laraxot/dev
=======
     * @param string $command Il comando da verificare
>>>>>>> 3792da0d (Check & fix styling)
     *
=======
     * @param  string  $command  Il comando da verificare
>>>>>>> .merge_file_TDxySn
     * @return bool True se il comando è consentito, false altrimenti
     */
    private function isCommandAllowed(string $command): bool
    {
        Assert::stringNotEmpty($command, 'Il comando non può essere vuoto');

        return in_array($command, $this->allowedCommands, true);
    }
}
