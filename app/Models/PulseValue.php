<?php

declare(strict_types=1);

namespace Modules\Xot\Models;

use Illuminate\Database\Eloquent\Builder;
use Modules\Xot\Contracts\ProfileContract;
use Modules\Xot\Database\Factories\PulseValueFactory;

/**
<<<<<<< HEAD
<<<<<<< .merge_file_JC40Ur
<<<<<<< HEAD
 * <<<<<<< HEAD.
=======
<<<<<<< HEAD
>>>>>>> da9ae01a0 (.)
 *
=======
>>>>>>> 930f8146 (Check & fix styling)
 * @property string               $id
 * @property int                  $timestamp
 * @property string               $type
 * @property string               $key
 * @property string|null          $key_hash
 * @property string               $value
=======
 * @property string $id
 * @property int $timestamp
 * @property string $type
 * @property string $key
 * @property string|null $key_hash
 * @property string $value
>>>>>>> .merge_file_blRfIT
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
 *
 * @method static PulseValueFactory factory($count = null, $state = [])
<<<<<<< .merge_file_JC40Ur
 *                                                                      =======
 *
=======
>>>>>>> 3792da0d (Check & fix styling)
 * @property string               $id
 * @property int                  $timestamp
 * @property string               $type
 * @property string               $key
 * @property string|null          $key_hash
 * @property string               $value
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
 *
<<<<<<< HEAD
 * @method static PulseValueFactory          factory($count = null, $state = [])
<<<<<<< HEAD
 *                                                                               >>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_blRfIT
=======
<<<<<<< HEAD
 * @method static PulseValueFactory factory($count = null, $state = [])
=======
 * @method static PulseValueFactory          factory($count = null, $state = [])
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
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
