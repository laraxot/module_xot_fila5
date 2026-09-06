<?php

declare(strict_types=1);

namespace Modules\Xot\Models;

use Illuminate\Database\Eloquent\Builder;
use Modules\Xot\Contracts\ProfileContract;
use Modules\Xot\Database\Factories\PulseAggregateFactory;

/**
<<<<<<< HEAD
 * @property string $id
 * @property int $bucket
 * @property int $period
 * @property string $type
 * @property string $key
 * @property string|null $key_hash
 * @property string $aggregate
 * @property string $value
 * @property int|null $count
 * @method static PulseAggregateFactory factory($count = null, $state = [])
=======
 * @property string      $id
 * @property int         $bucket
 * @property int         $period
 * @property string      $type
 * @property string      $key
 * @property string|null $key_hash
 * @property string      $aggregate
 * @property string      $value
 * @property int|null    $count
 *
 * @method static PulseAggregateFactory          factory($count = null, $state = [])
>>>>>>> 7f6cf6be (.)
 * @method static Builder<static>|PulseAggregate newModelQuery()
 * @method static Builder<static>|PulseAggregate newQuery()
 * @method static Builder<static>|PulseAggregate query()
 * @method static Builder<static>|PulseAggregate whereAggregate($value)
 * @method static Builder<static>|PulseAggregate whereBucket($value)
 * @method static Builder<static>|PulseAggregate whereCount($value)
 * @method static Builder<static>|PulseAggregate whereId($value)
 * @method static Builder<static>|PulseAggregate whereKey($value)
 * @method static Builder<static>|PulseAggregate whereKeyHash($value)
 * @method static Builder<static>|PulseAggregate wherePeriod($value)
 * @method static Builder<static>|PulseAggregate whereType($value)
 * @method static Builder<static>|PulseAggregate whereValue($value)
<<<<<<< HEAD
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $deleter
 * @property ProfileContract|null $updater
=======
 *
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $deleter
 * @property ProfileContract|null $updater
 *
>>>>>>> 7f6cf6be (.)
 * @mixin \Eloquent
 */
class PulseAggregate extends BaseModel
{
    /** @var list<string> */
    protected $fillable = [
        'type',
        'key',
        'value',
    ];
}
