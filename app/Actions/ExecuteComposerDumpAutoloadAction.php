<?php

declare(strict_types=1);

namespace Modules\Xot\Actions;

<<<<<<< HEAD
<<<<<<< .merge_file_esjHW7
=======
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Process;
=======
<<<<<<< .merge_file_GcEyAu
<<<<<<< HEAD
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Process;

=======
<<<<<<< HEAD
>>>>>>> .merge_file_Op1DXW
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Process;

=======
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Process;
>>>>>>> laraxot/dev
<<<<<<< .merge_file_esjHW7
=======
>>>>>>> laraxot/dev
=======
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Process;
>>>>>>> .merge_file_2EEPTa
>>>>>>> laraxot/dev
>>>>>>> .merge_file_Op1DXW
use Spatie\QueueableAction\QueueableAction;

/**
 * Esegue `composer dump-autoload`, e solo quello — nessun input, nessuna
 * interpolazione, un unico comando fisso via Process. Non è un comando
 * artisan (`ExecuteArtisanCommandAction` esegue solo `php artisan ...`,
 * non può lanciarlo): serve a chi non ha accesso SSH e deve rigenerare
 * l'autoloader dopo un deploy che ha aggiunto nuove classi (sintomo:
 * job in coda falliti con "Job is incomplete class" — story
 * xot-artisan-commands-manager-layout-and-composer-dump-autoload.md).
 */
class ExecuteComposerDumpAutoloadAction
{
    use QueueableAction;

    /**
     * @return array{
     *     output: list<string>,
     *     status: 'completed'|'failed',
     *     exitCode: int
     * }
     */
    public function execute(): array
    {
        /** @var list<string> $output */
        $output = [];

<<<<<<< HEAD
<<<<<<< .merge_file_esjHW7
=======
=======
<<<<<<< .merge_file_GcEyAu
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> .merge_file_Op1DXW
        Event::dispatch('artisan-command.started', ['composer dump-autoload']);

=======
>>>>>>> laraxot/dev
<<<<<<< .merge_file_esjHW7
=======
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_2EEPTa
>>>>>>> laraxot/dev
>>>>>>> .merge_file_Op1DXW
        try {
            /*
             * Laravel's Process, quando non riceve `->env(...)`, passa un
             * array vuoto a Symfony Process — che poi eredita l'ambiente
             * del processo PHP filtrandolo per le chiavi già presenti in
             * `$_SERVER`. Durante una richiesta web (a differenza di una
             * chiamata `php artisan` da terminale) `$_SERVER['HOME']` non
             * e' popolato, quindi HOME sparisce e composer si rifiuta di
             * partire ("The HOME or COMPOSER_HOME environment variable
             * must be set"). Fisso esplicitamente COMPOSER_HOME su una
             * cartella del progetto: funziona a prescindere dall'utente
             * che esegue PHP, sia in locale sia sul server di produzione
             * dove l'utente del webserver spesso non ha una vera home.
             */
            $composerHome = storage_path('framework/composer-home');
            File::ensureDirectoryExists($composerHome);

            $process = Process::path(base_path())
                ->env(['COMPOSER_HOME' => $composerHome])
                ->command('composer dump-autoload')
                ->timeout(120)
                ->start();

            /*
             * Composer scrive sullo stderr anche il suo output normale
             * (avviso Xdebug, "Generating optimized autoload files",
             * script post-install, package:discover, ...), non solo i
             * veri errori. Etichettare ogni riga da stderr con "[ERROR]"
             * a prescindere dal contenuto fa sembrare fallita
             * un'esecuzione riuscita. Lo stream va mostrato così com'e';
             * il fallimento vero si segnala una sola volta, alla fine,
             * in base all'exit code — non riga per riga.
             */
            while ($process->running()) {
                $data = $process->latestOutput();
<<<<<<< .merge_file_esjHW7
=======
<<<<<<< HEAD
=======
<<<<<<< .merge_file_GcEyAu
>>>>>>> laraxot/dev
>>>>>>> .merge_file_Op1DXW
                if ($data !== '') {
                    $formatted = trim($data);
                    if ($formatted !== '') {
                        $output[] = $formatted;
<<<<<<< HEAD
<<<<<<< .merge_file_esjHW7
                        Event::dispatch('artisan-command.output', ['composer dump-autoload', $formatted]);
=======
>>>>>>> laraxot/dev
=======
=======
<<<<<<< HEAD
=======
<<<<<<< HEAD
                        Event::dispatch('artisan-command.output', ['composer dump-autoload', $formatted]);
=======
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======
                if ('' !== $data) {
                    $formatted = trim($data);
                    if ('' !== $formatted) {
                        $output[] = $formatted;
>>>>>>> .merge_file_2EEPTa
>>>>>>> laraxot/dev
>>>>>>> .merge_file_Op1DXW
                    }
                }

                $errorData = $process->latestErrorOutput();
<<<<<<< .merge_file_esjHW7
=======
<<<<<<< HEAD
=======
<<<<<<< .merge_file_GcEyAu
>>>>>>> laraxot/dev
>>>>>>> .merge_file_Op1DXW
                if ($errorData !== '') {
                    $formattedError = trim($errorData);
                    if ($formattedError !== '') {
                        $output[] = $formattedError;
<<<<<<< HEAD
<<<<<<< .merge_file_esjHW7
                        Event::dispatch('artisan-command.output', ['composer dump-autoload', $formattedError]);
=======
>>>>>>> laraxot/dev
=======
=======
<<<<<<< HEAD
=======
<<<<<<< HEAD
                        Event::dispatch('artisan-command.output', ['composer dump-autoload', $formattedError]);
=======
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======
                if ('' !== $errorData) {
                    $formattedError = trim($errorData);
                    if ('' !== $formattedError) {
                        $output[] = $formattedError;
>>>>>>> .merge_file_2EEPTa
>>>>>>> laraxot/dev
>>>>>>> .merge_file_Op1DXW
                    }
                }

                usleep(50000);
            }

            $result = $process->wait();

            $finalOutput = trim($result->output());
<<<<<<< .merge_file_esjHW7
            if ($finalOutput !== '') {
                $output[] = $finalOutput;
<<<<<<< HEAD
                Event::dispatch('artisan-command.output', ['composer dump-autoload', $finalOutput]);
=======
>>>>>>> laraxot/dev
=======
<<<<<<< HEAD
            if ($finalOutput !== '') {
                $output[] = $finalOutput;
=======
<<<<<<< .merge_file_GcEyAu
            if ($finalOutput !== '') {
                $output[] = $finalOutput;
<<<<<<< HEAD
=======
<<<<<<< HEAD
                Event::dispatch('artisan-command.output', ['composer dump-autoload', $finalOutput]);
=======
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
>>>>>>> .merge_file_Op1DXW
            }

            $finalErrorOutput = trim($result->errorOutput());
            if ($finalErrorOutput !== '') {
                $output[] = $finalErrorOutput;
<<<<<<< HEAD
<<<<<<< .merge_file_esjHW7
                Event::dispatch('artisan-command.output', ['composer dump-autoload', $finalErrorOutput]);
=======
>>>>>>> laraxot/dev
=======
=======
<<<<<<< HEAD
=======
<<<<<<< HEAD
                Event::dispatch('artisan-command.output', ['composer dump-autoload', $finalErrorOutput]);
=======
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======
            if ('' !== $finalOutput) {
                $output[] = $finalOutput;
            }

            $finalErrorOutput = trim($result->errorOutput());
            if ('' !== $finalErrorOutput) {
                $output[] = $finalErrorOutput;
>>>>>>> .merge_file_2EEPTa
>>>>>>> laraxot/dev
>>>>>>> .merge_file_Op1DXW
            }

            $status = $result->successful() ? 'completed' : 'failed';

<<<<<<< .merge_file_esjHW7
            if ($status === 'failed') {
<<<<<<< HEAD
=======
<<<<<<< HEAD
            if ($status === 'failed') {
                $output[] = '[ERRORE] Il comando è fallito (exit code '.($result->exitCode() ?? 0).').';
            }

=======
<<<<<<< .merge_file_GcEyAu
            if ($status === 'failed') {
<<<<<<< HEAD
                $output[] = '[ERRORE] Il comando è fallito (exit code '.($result->exitCode() ?? 0).').';
            }

=======
<<<<<<< HEAD
>>>>>>> .merge_file_Op1DXW
                $failureNotice = '[ERRORE] Il comando è fallito (exit code '.($result->exitCode() ?? 0).').';
                $output[] = $failureNotice;
                Event::dispatch('artisan-command.output', ['composer dump-autoload', $failureNotice]);
            }

            Event::dispatch('artisan-command.'.$status, ['composer dump-autoload', $finalErrorOutput]);

=======
                $output[] = '[ERRORE] Il comando è fallito (exit code '.($result->exitCode() ?? 0).').';
            }

>>>>>>> laraxot/dev
<<<<<<< .merge_file_esjHW7
=======
>>>>>>> laraxot/dev
=======
            if ('failed' === $status) {
                $output[] = '[ERRORE] Il comando è fallito (exit code '.($result->exitCode() ?? 0).').';
            }

>>>>>>> .merge_file_2EEPTa
>>>>>>> laraxot/dev
>>>>>>> .merge_file_Op1DXW
            return [
                'output' => $output,
                'status' => $status,
                'exitCode' => $result->exitCode() ?? 0,
            ];
        } catch (\Throwable $e) {
<<<<<<< HEAD
<<<<<<< .merge_file_esjHW7
=======
=======
<<<<<<< .merge_file_GcEyAu
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> .merge_file_Op1DXW
            Event::dispatch('artisan-command.error', ['composer dump-autoload', $e->getMessage()]);

=======
>>>>>>> laraxot/dev
<<<<<<< .merge_file_esjHW7
=======
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_2EEPTa
>>>>>>> laraxot/dev
>>>>>>> .merge_file_Op1DXW
            throw new \RuntimeException("Errore durante l'esecuzione di composer dump-autoload: {$e->getMessage()}", (int) $e->getCode(), $e);
        }
    }
}
