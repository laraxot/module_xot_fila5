<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Widgets;

use Filament\Widgets\ChartWidget as FilamentChartWidget;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
<<<<<<< HEAD
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
=======
>>>>>>> c7fd73eb (.)
use Modules\Xot\Filament\Traits\TransTrait;

/**
 * Widget per visualizzare il trend delle registrazioni pazienti.
 *
 * Mostra un grafico a linee con il numero di pazienti registrati nel tempo.
 * I dati sono cacheati per 5 minuti per ottimizzare le performance.
 */
abstract class XotBaseChartWidget extends FilamentChartWidget
{
<<<<<<< HEAD
    use TransTrait;
    use InteractsWithPageFilters;

    protected null|string $heading = null;
    protected static null|int $sort = 1;
    protected static bool $isLazy = true;
    protected null|string $pollingInterval = null;
=======
    use InteractsWithPageFilters;
    use TransTrait;

    protected ?string $heading = null;

    protected static ?int $sort = 1;

    protected static bool $isLazy = true;

    protected ?string $pollingInterval = null;
>>>>>>> c7fd73eb (.)

    /**
     * Restituisce il titolo del widget.
     *
     * CRITICO: Deve essere public per rispettare il contratto ChartWidget
     */
<<<<<<< HEAD
    public function getHeading(): null|string
=======
    public function getHeading(): ?string
>>>>>>> c7fd73eb (.)
    {
        return static::trans('navigation.heading');
    }

    /**
     * Restituisce i dati per il grafico.
     *
     * @return array<string, mixed>
     */
    protected function getData(): array
    {
        return [];
    }

    /**
     * Restituisce il tipo di grafico.
     */
    protected function getType(): string
    {
        return 'line';
    }

    /**
     * Restituisce le opzioni del grafico.
     *
     * @return array<string, mixed>
     */
<<<<<<< HEAD
    protected function getOptions(): array
=======
    protected function getOptionsArray(): array
>>>>>>> c7fd73eb (.)
    {
        return [
            'responsive' => true,
            'maintainAspectRatio' => false,
            'plugins' => [
                'legend' => [
                    'display' => false,
                ],
                'tooltip' => [
                    'mode' => 'index',
                    'intersect' => false,
                    'callbacks' => [
<<<<<<< HEAD
                        'label' =>

                                'function(context) {
                            return "' .
                                __('salutemo::widgets.patient_registration_trend.total_registrations') .
                                '".replace(":count", context.parsed.y);
                        }'
                            ,
=======
                        'label' => 'function(context) {
                            return "'.
                                __('<nome modulo>::widgets.patient_registration_trend.total_registrations').
                                '".replace(":count", context.parsed.y);
                        }',
>>>>>>> c7fd73eb (.)
                    ],
                ],
            ],
            'scales' => [
                'x' => [
                    'display' => true,
                    'title' => [
                        'display' => true,
<<<<<<< HEAD
                        'text' => __('salutemo::widgets.patient_registration_trend.period.label'),
=======
                        'text' => __('<nome modulo>::widgets.patient_registration_trend.period.label'),
>>>>>>> c7fd73eb (.)
                    ],
                    'grid' => [
                        'display' => false,
                    ],
                ],
                'y' => [
                    'display' => true,
                    'title' => [
                        'display' => true,
<<<<<<< HEAD
                        'text' => __('salutemo::widgets.patient_registration_trend.total_registrations'),
=======
                        'text' => __('<nome modulo>::widgets.patient_registration_trend.total_registrations'),
>>>>>>> c7fd73eb (.)
                    ],
                    'beginAtZero' => true,
                    'ticks' => [
                        'stepSize' => 1,
                    ],
                ],
            ],
            'interaction' => [
                'mode' => 'nearest',
                'axis' => 'x',
                'intersect' => false,
            ],
        ];
    }

    /**
     * Restituisce l'altezza del widget.
     */
<<<<<<< HEAD
    protected function getHeight(): null|string
=======
    protected function getHeight(): ?string
>>>>>>> c7fd73eb (.)
    {
        return '300px';
    }
}
