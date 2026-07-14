<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Trend;

use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
<<<<<<< HEAD
use Modules\Xot\Datas\TrendData;
use Spatie\QueueableAction\QueueableAction;
=======
use InvalidArgumentException;
use Modules\Xot\Datas\TrendData;
use Spatie\QueueableAction\QueueableAction;
use UnexpectedValueException;
>>>>>>> 61938ca4 (delete .claude-audit/)

class BuildTrendCollectionAction
{
    use QueueableAction;

    /**
     * @template TModel of Model
     *
<<<<<<< HEAD
     * @param Builder<TModel> $query
     *
=======
     * @param  Builder<TModel>  $query
>>>>>>> 61938ca4 (delete .claude-audit/)
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
<<<<<<< HEAD
        string $aggregate = 'count',
=======
        string $aggregate = 'count'
>>>>>>> 61938ca4 (delete .claude-audit/)
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
<<<<<<< HEAD
            default => throw new \InvalidArgumentException('Unsupported trend aggregate.'),
=======
            default => throw new InvalidArgumentException('Unsupported trend aggregate.'),
>>>>>>> 61938ca4 (delete .claude-audit/)
        };

        return $values
            ->map(static function (mixed $value): TrendData {
                if (! $value instanceof TrendValue) {
<<<<<<< HEAD
                    throw new \UnexpectedValueException('Trend returned an invalid value.');
=======
                    throw new UnexpectedValueException('Trend returned an invalid value.');
>>>>>>> 61938ca4 (delete .claude-audit/)
                }

                return TrendData::from([
                    'date' => $value->date,
                    'aggregate' => $value->aggregate,
                ]);
            })
            ->values();
    }
}
