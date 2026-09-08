<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Widgets;

<<<<<<< HEAD
use Override;
use Exception;
use Modules\Xot\Filament\Widgets\XotBaseChartWidget;

class StatesChartWidget extends XotBaseChartWidget
{
    protected null|string $heading = null;
    protected static null|int $sort = 4;
    protected static bool $isLazy = true;

    public string $stateClass;
    public string $model;

    #[Override]
    public function getHeading(): null|string
=======
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Modules\Xot\Actions\Cast\SafeIntCastAction;
use Modules\Xot\Actions\Cast\SafeStringCastAction;

class StatesChartWidget extends XotBaseChartWidget
{
    public string $stateClass;

    public string $model;

    protected ?string $heading = null;

    protected static ?int $sort = 4;

    protected static bool $isLazy = true;

    #[\Override]
    public function getHeading(): ?string
>>>>>>> c7fd73eb (.)
    {
        return static::transClass($this->model, 'widgets.states_chart.heading');
    }

<<<<<<< HEAD
    #[Override]
=======
    #[\Override]
>>>>>>> c7fd73eb (.)
    protected function getData(): array
    {
        $label = static::transClass($this->model, 'widgets.states_chart.label');
        try {
<<<<<<< HEAD
            $states = $this->model::selectRaw('state, COUNT(*) as count')
                ->groupBy('state')
                ->get()
                ->keyBy('state');

=======
            /** @var class-string<Model> $modelClass */
            $modelClass = $this->model;
            $instance = new $modelClass;

            /** @var array<string, string> $colors */
>>>>>>> c7fd73eb (.)
            $colors = [
                'active' => 'rgb(34, 197, 94)',
                'pending' => 'rgb(234, 179, 8)',
                'integration_requested' => 'rgb(107, 114, 128)',
            ];

<<<<<<< HEAD
=======
            /** @var array<string, int> $states */
            $states = [];
            $rows = DB::connection($instance->getConnectionName())
                ->table($instance->getTable())
                ->selectRaw('state, COUNT(*) as count')
                ->groupBy('state')
                ->get();
            foreach ($rows as $row) {
                $state = SafeStringCastAction::cast($row->state ?? '');
                $states[$state] = SafeIntCastAction::cast($row->count ?? 0);
            }

            $data = [];
            $backgroundColor = [];
            $labels = [];
            foreach ($states as $state => $count) {
                $data[] = $count;
                $backgroundColor[] = $colors[$state] ?? 'rgb(156, 163, 175)';
                $labels[] = static::transClass($this->model, 'states.'.$state.'.label');
            }

>>>>>>> c7fd73eb (.)
            return [
                'datasets' => [
                    [
                        'label' => $label,
<<<<<<< HEAD
                        'data' => $states->pluck('count')->toArray(),
                        'backgroundColor' => $states
                            ->keys()
                            ->map(fn($state) => $colors[$state] ?? 'rgb(156, 163, 175)')
                            ->toArray(),
                        'borderColor' => $states
                            ->keys()
                            ->map(fn($state) => $colors[$state] ?? 'rgb(156, 163, 175)')
                            ->toArray(),
                        'borderWidth' => 1,
                    ],
                ],
                'labels' => $states
                    ->keys()
                    ->map(fn($state) => static::transClass($this->model, 'states.' . $state . '.label'))
                    ->toArray(),
            ];
        } catch (Exception $e) {
=======
                        'data' => $data,
                        'backgroundColor' => $backgroundColor,
                        'borderColor' => $backgroundColor,
                        'borderWidth' => 1,
                    ],
                ],
                'labels' => $labels,
            ];
        } catch (\Exception $e) {
>>>>>>> c7fd73eb (.)
            // Fallback appropriato senza logging inutile
            return [
                'datasets' => [
                    [
                        'label' => $label,
                        'data' => [],
                        'backgroundColor' => [],
                        'borderColor' => [],
                        'borderWidth' => 1,
                    ],
                ],
                'labels' => [],
            ];
        }
    }

<<<<<<< HEAD
    #[Override]
=======
    #[\Override]
>>>>>>> c7fd73eb (.)
    protected function getType(): string
    {
        return 'bar';
    }
}
