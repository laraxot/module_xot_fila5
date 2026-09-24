<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget\Stat;
<<<<<<< HEAD
use Spatie\Health\Enums\Status;
use Spatie\Health\ResultStores\ResultStore;

class HealthOverviewWidget extends XotBaseStatsOverviewWidget
=======
use Modules\Xot\Filament\Widgets\XotBaseStatsOverviewWidget as BaseWidget;
use Spatie\Health\Enums\Status;
use Spatie\Health\ResultStores\ResultStore;

class HealthOverviewWidget extends BaseWidget
>>>>>>> laraxot/dev
{
    public function iconColor(string $status): string
    {
        return match ($status) {
            Status::ok()->value => 'success',
            Status::warning()->value => 'warning',
            Status::skipped()->value => 'warning',
            Status::failed()->value, Status::crashed()->value => 'danger',
            default => 'secondary',
        };
    }

    protected function getStats(): array
    {
        $stats = [];

        $checkResults = app(ResultStore::class)->latestResults();
<<<<<<< HEAD
        if ($checkResults === null) {
=======
        if (null === $checkResults) {
>>>>>>> laraxot/dev
            return $stats;
        }
        foreach ($checkResults->storedCheckResults as $result) {
            $label = $result->label;
            $value = $result->shortSummary;
            $stats[] = Stat::make($label, $value)
                ->description($result->notificationMessage.' '.$result->status)
                // ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color($this->iconColor($result->status));
        }

        /*
         * return [
         * Stat::make('Unique views', '192.1k'),
         * Stat::make('Bounce rate', '21%'),
         * Stat::make('Average time on page', '3:12'),
         * ];
         */
        return $stats;
    }
}
