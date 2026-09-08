<?php

declare(strict_types=1);

namespace Modules\Xot\Models;

<<<<<<< HEAD
use Modules\Xot\Contracts\ProfileContract;
use Modules\Xot\Database\Factories\PulseValueFactory;
use Illuminate\Database\Eloquent\Builder;

/**
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
 * @method static PulseValueFactory factory($count = null, $state = [])
 * @method static Builder|PulseValue newModelQuery()
 * @method static Builder|PulseValue newQuery()
 * @method static Builder|PulseValue query()
 * @property int         $id
 * @property int         $timestamp
=======
use Illuminate\Database\Eloquent\Builder;
use Modules\Xot\Contracts\ProfileContract;
use Modules\Xot\Database\Factories\PulseValueFactory;

/**
 * @property string $id
 * @property int $timestamp
>>>>>>> c7fd73eb (.)
 * @property string $type
 * @property string $key
 * @property string|null $key_hash
 * @property string $value
<<<<<<< HEAD
 * @method static Builder|PulseValue whereId($value)
 * @method static Builder|PulseValue whereKey($value)
 * @method static Builder|PulseValue whereKeyHash($value)
 * @method static Builder|PulseValue whereTimestamp($value)
 * @method static Builder|PulseValue whereType($value)
 * @method static Builder|PulseValue whereValue($value)
 * @mixin IdeHelperPulseValue
=======
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
 *
 * @method static PulseValueFactory factory($count = null, $state = [])
 * @method static Builder<static>|PulseValue newModelQuery()
 * @method static Builder<static>|PulseValue newQuery()
 * @method static Builder<static>|PulseValue query()
 * @method static Builder<static>|PulseValue whereId($value)
 * @method static Builder<static>|PulseValue whereKey($value)
 * @method static Builder<static>|PulseValue whereKeyHash($value)
 * @method static Builder<static>|PulseValue whereTimestamp($value)
 * @method static Builder<static>|PulseValue whereType($value)
 * @method static Builder<static>|PulseValue whereValue($value)
 *
 * @property ProfileContract|null $deleter
 *
>>>>>>> c7fd73eb (.)
 * @mixin \Eloquent
 */
class PulseValue extends BaseModel
{
    /** @var list<string> */
    protected $fillable = [
        'type',
        'key',
        'value',
    ];
}
