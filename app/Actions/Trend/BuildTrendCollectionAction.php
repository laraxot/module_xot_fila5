<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Trend;

use Carbon\CarbonPeriod;
use Error;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Modules\Xot\Actions\Trend\Format\MySqlFormatAction;
use Modules\Xot\Actions\Trend\Format\PgsqlFormatAction;
use Modules\Xot\Actions\Trend\Format\SqliteFormatAction;
use Modules\Xot\Datas\TrendData;
use Spatie\QueueableAction\QueueableAction;

class BuildTrendCollectionAction
{
    use QueueableAction;

    public string $interval;

    public Carbon $start;

    public Carbon $end;

    public string $dateColumn = 'created_at';

    public string $dateAlias = 'date';

    public Builder $query;

    public function execute(
        Builder $query,
        Carbon $start,
        Carbon $end,
        string $interval = 'day',
        string $dateColumn = 'created_at',
        string $dateAlias = 'date',
        string $aggregateColumn = '*',
        string $aggregate = 'count'
    ): Collection {
        $this->query = $query;
        $this->start = $start;
        $this->end = $end;
        $this->interval = $interval;
        $this->dateColumn = $dateColumn;
        $this->dateAlias = $dateAlias;

        $collection = $this->query
            ->toBase()
            ->selectRaw(
                "
                {$this->getSqlDate()} as {$this->dateAlias},
                {$aggregate}({$aggregateColumn}) as aggregate
            "
            )
            ->whereBetween($this->dateColumn, [$this->start, $this->end])
            ->groupBy($this->dateAlias)
            ->orderBy($this->dateAlias)
            ->get();

        return $this->mapValuesToDates($collection);
    }

    public function mapValuesToDates(Collection $collection): Collection
    {
        $collection = $collection->map(
            fn ($value): TrendData => TrendData::from(
                [
                    'date' => $value->{$this->dateAlias},
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
            default => throw new Error('Unsupported database driver.'),
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
            default => throw new Error('Invalid interval.'),
        };
    }
}
