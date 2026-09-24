<?php

declare(strict_types=1);

namespace Modules\Xot\Models;

use Illuminate\Database\Eloquent\Builder;
use Modules\Xot\Contracts\ProfileContract;
use Modules\Xot\Database\Factories\PulseAggregateFactory;

/**
<<<<<<< HEAD
<<<<<<< .merge_file_dQJ1BY
<<<<<<< HEAD
 * <<<<<<< HEAD.
=======
<<<<<<< HEAD
>>>>>>> da9ae01a0 (.)
 *
=======
>>>>>>> 930f8146 (Check & fix styling)
 * @property string      $id
 * @property int         $bucket
 * @property int         $period
 * @property string      $type
 * @property string      $key
=======
 * @property string $id
 * @property int $bucket
 * @property int $period
 * @property string $type
 * @property string $key
>>>>>>> .merge_file_rqwWz3
 * @property string|null $key_hash
 * @property string $aggregate
 * @property string $value
 * @property int|null $count
 *
 * @method static PulseAggregateFactory factory($count = null, $state = [])
<<<<<<< .merge_file_dQJ1BY
 *                                                                          =======
 *
=======
>>>>>>> 3792da0d (Check & fix styling)
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
<<<<<<< HEAD
 * @method static PulseAggregateFactory          factory($count = null, $state = [])
<<<<<<< HEAD
 *                                                                                   >>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_rqwWz3
=======
<<<<<<< HEAD
 * @method static PulseAggregateFactory factory($count = null, $state = [])
=======
 * @method static PulseAggregateFactory          factory($count = null, $state = [])
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
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
 *
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $deleter
 * @property ProfileContract|null $updater
 *
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
