<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Trend;

use Carbon\CarbonPeriod;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Modules\Xot\Datas\TrendData;
use Spatie\QueueableAction\QueueableAction;

class BuildTrendCollectionAction
{
    use QueueableAction;

    /**
     * @template TModel of Model
     *
     * @param Builder<TModel> $query
     *
     * @return Collection<int, TrendData>
     */
    public function execute(
        Builder $query,
        Carbon $start,
        Carbon $end,
        string $interval = 'day',
        string $dateColumn = 'created_at',
        string $dateAlias = 'date',
        string $aggregateColumn = '*',
        string $aggregate = 'count',
    ): Collection {
        $trend = Trend::query($query)
            ->between($start, $end)
            ->interval($interval)
            ->dateColumn($dateColumn)
            ->dateAlias($dateAlias);

        $values = match ($aggregate) {
            'avg' => $trend->average($aggregateColumn),
            'min' => $trend->min($aggregateColumn),
            'max' => $trend->max($aggregateColumn),
            'sum' => $trend->sum($aggregateColumn),
            'count' => $trend->count($aggregateColumn),
            default => throw new \InvalidArgumentException('Unsupported trend aggregate.'),
        };

        return $values
            ->map(static function (mixed $value): TrendData {
                if (! $value instanceof TrendValue) {
                    throw new \UnexpectedValueException('Trend returned an invalid value.');
                }

                return TrendData::from([
                    'date' => $value->date,
                    'aggregate' => $value->aggregate,
                ]
            )
        );

        $placeholders = $this->getDatePeriod()
            ->map(
                fn (Carbon $carbon): TrendData => TrendData::from(
                    [
                        'date' => $carbon->format($this->getCarbonDateFormat()),
                        'aggregate' => 0,
                    ]
                )
            );

        return $collection
            ->merge($placeholders)
            ->unique('date')
            ->sort()
            ->flatten();
    }

    private function getDatePeriod(): Collection
    {
        return collect(
            CarbonPeriod::between(
                $this->start,
                $this->end,
            )->interval(sprintf('1 %s', $this->interval))
        );
    }

    private function getSqlDate(): string
    {
        $driver = $this->query->getConnection()->getDriverName();
        $formatAction = match ($driver) {
            'mysql' => app(MySqlFormatAction::class),
            'sqlite' => app(SqliteFormatAction::class),
            'pgsql' => app(PgsqlFormatAction::class),
            default => throw new \Error('Unsupported database driver.'),
        };

        return $formatAction->execute($this->dateColumn, $this->interval);
    }

    private function getCarbonDateFormat(): string
    {
        return match ($this->interval) {
            'minute' => 'Y-m-d H:i:00',
            'hour' => 'Y-m-d H:00',
            'day' => 'Y-m-d',
            'month' => 'Y-m',
            'year' => 'Y',
            default => throw new \Error('Invalid interval.'),
        };
    }
}
