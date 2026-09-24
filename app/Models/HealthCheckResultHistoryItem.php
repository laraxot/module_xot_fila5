<?php

<<<<<<< HEAD
declare(strict_types=1);
=======
<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
/**
 * @see https://github.com/shuvroroy/filament-spatie-laravel-health/tree/main
 */

<<<<<<< HEAD
=======
declare(strict_types=1);

<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
namespace Modules\Xot\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use Spatie\Health\Models\HealthCheckResultHistoryItem as BaseHealthCheckResultHistoryItem;

/**
<<<<<<< .merge_file_qj70f2
<<<<<<< HEAD
 * <<<<<<< HEAD.
 *
=======
>>>>>>> 3792da0d (Check & fix styling)
 * @property int                     $id
 * @property string                  $check_name
 * @property string                  $check_label
 * @property string                  $status
 * @property string|null             $notification_message
 * @property string|null             $short_summary
 * @property array<array-key, mixed> $meta
 * @property string                  $ended_at
 * @property string                  $batch
 * @property Carbon|null             $created_at
 * @property Carbon|null             $updated_at
 * @property string|null             $updated_by
 * @property string|null             $created_by
<<<<<<< HEAD
 *                                                         =======
 * @property int                     $id
 * @property string                  $check_name
 * @property string                  $check_label
 * @property string                  $status
 * @property string|null             $notification_message
 * @property string|null             $short_summary
 * @property array<array-key, mixed> $meta
 * @property string                  $ended_at
 * @property string                  $batch
 * @property Carbon|null             $created_at
 * @property Carbon|null             $updated_at
 * @property string|null             $updated_by
 * @property string|null             $created_by
 *                                                         >>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
 * @property int $id
 * @property string $check_name
 * @property string $check_label
 * @property string $status
 * @property string|null $notification_message
 * @property string|null $short_summary
 * @property array<array-key, mixed> $meta
 * @property string $ended_at
 * @property string $batch
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
>>>>>>> .merge_file_tmsuGu
 *
 * @method static Builder<static>|HealthCheckResultHistoryItem newModelQuery()
 * @method static Builder<static>|HealthCheckResultHistoryItem newQuery()
 * @method static Builder<static>|HealthCheckResultHistoryItem query()
 * @method static Builder<static>|HealthCheckResultHistoryItem whereBatch($value)
 * @method static Builder<static>|HealthCheckResultHistoryItem whereCheckLabel($value)
 * @method static Builder<static>|HealthCheckResultHistoryItem whereCheckName($value)
 * @method static Builder<static>|HealthCheckResultHistoryItem whereCreatedAt($value)
 * @method static Builder<static>|HealthCheckResultHistoryItem whereCreatedBy($value)
 * @method static Builder<static>|HealthCheckResultHistoryItem whereEndedAt($value)
 * @method static Builder<static>|HealthCheckResultHistoryItem whereId($value)
 * @method static Builder<static>|HealthCheckResultHistoryItem whereMeta($value)
 * @method static Builder<static>|HealthCheckResultHistoryItem whereNotificationMessage($value)
 * @method static Builder<static>|HealthCheckResultHistoryItem whereShortSummary($value)
 * @method static Builder<static>|HealthCheckResultHistoryItem whereStatus($value)
 * @method static Builder<static>|HealthCheckResultHistoryItem whereUpdatedAt($value)
 * @method static Builder<static>|HealthCheckResultHistoryItem whereUpdatedBy($value)
 *
 * @mixin \Eloquent
 */
class HealthCheckResultHistoryItem extends BaseHealthCheckResultHistoryItem
{
    /** @var string */
    protected $connection = 'xot';
}
