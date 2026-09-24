<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Debug;

use Closure;
use Filament\Notifications\Notification;
<<<<<<< HEAD
=======
use Spatie\QueueableAction\QueueableAction;
>>>>>>> 8d801bbe (Check & fix styling)

/**
 * Classe per misurare le performance di esecuzione di un blocco di codice.
 *
 * @template T
 */
class MeasureAction
{
<<<<<<< HEAD
    /**
     * Esegue una closure misurando il tempo di esecuzione e l'utilizzo di memoria.
     *
     * @param  Closure():T  $closure  La closure da eseguire e misurare
     * @param  string  $label  Etichetta opzionale per identificare la misurazione
     * @return T Il risultato dell'esecuzione della closure
     */
    public function execute(Closure $closure, string $label = ''): mixed
<<<<<<< .merge_file_a7py1X
=======
=======
    use QueueableAction;

    /**
     * Esegue una closure misurando il tempo di esecuzione e l'utilizzo di memoria.
     *
>>>>>>> 8d801bbe (Check & fix styling)
     * @param \Closure():T $closure La closure da eseguire e misurare
     * @param string       $label   Etichetta opzionale per identificare la misurazione
     *
     * @return T Il risultato dell'esecuzione della closure
     */
    public function execute(\Closure $closure, string $label = ''): mixed
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 8d801bbe (Check & fix styling)
=======
>>>>>>> .merge_file_VVAdG7
    {
        $start = microtime(true);
        $memory_start = memory_get_usage();

        // Eseguiamo la closure e otteniamo il risultato
        $result = $closure();

        $end = microtime(true);
        $memory_end = memory_get_usage();

        // Calcoliamo le metriche di performance
        $execution_time = ($end - $start) * 1000; // Conversione in millisecondi
        $memory_usage = ($memory_end - $memory_start) / 1024; // Conversione in KB

        $metrics = [
            'label' => $label,
            'execution_time' => round($execution_time, 2).' ms',
            'memory_usage' => round($memory_usage, 2).' KB',
            // 'peak_memory' => round(memory_get_peak_usage() / 1024 / 1024, 2).' MB',
        ];

        // Mostriamo una notifica con le metriche
        Notification::make()
<<<<<<< .merge_file_a7py1X
<<<<<<< HEAD
<<<<<<< HEAD
            ->title('Performance Metrics '.($label !== '' ? $label : 'Unnamed'))
=======
            ->title('Performance Metrics '.('' !== $label ? $label : 'Unnamed'))
>>>>>>> laraxot/dev
=======
            ->title('Performance Metrics '.('' !== $label ? $label : 'Unnamed'))
>>>>>>> 8d801bbe (Check & fix styling)
=======
            ->title('Performance Metrics '.($label !== '' ? $label : 'Unnamed'))
>>>>>>> .merge_file_VVAdG7
            ->body($metrics['execution_time'].'  '.$metrics['memory_usage'])
            ->success()
            ->persistent()
            ->send();

        // Log::debug('Performance Metrics', $metrics);

        /* @var T $result */
        return $result;
    }
}
