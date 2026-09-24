<?php

declare(strict_types=1);

namespace Modules\Xot\Models;

use Illuminate\Database\Eloquent\Builder;
use Modules\Xot\Contracts\ProfileContract;
use Modules\Xot\Database\Factories\PulseValueFactory;

/**
 * <<<<<<< .merge_file_tLvRk4
 * <<<<<<< HEAD.
 *
 * @property string               $id
 * @property int                  $timestamp
 * @property string               $type
 * @property string               $key
 * @property string|null          $key_hash
 * @property string               $value
 *                                           =======
 *                                           <<<<<<< HEAD.
 * @property string               $id
 * @property int                  $timestamp
 * @property string               $type
 * @property string               $key
 * @property string|null          $key_hash
 * @property string               $value
 *                                           >>>>>>> .merge_file_onPDMJ
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
 *
 * @method static PulseValueFactory factory($count = null, $state = [])
 *                                                                      <<<<<<< .merge_file_tLvRk4
 *                                                                      =======
 *                                                                      =======
 *                                                                      =======
 *
 * >>>>>>> .merge_file_onPDMJ
 *
 * @property string               $id
 * @property int                  $timestamp
 * @property string               $type
 * @property string               $key
 * @property string|null          $key_hash
 * @property string               $value
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
 *
 * @method static PulseValueFactory          factory($count = null, $state = [])
 *                                                                               <<<<<<< .merge_file_tLvRk4
 *                                                                               >>>>>>> laraxot/dev
 *                                                                               =======
 *                                                                               >>>>>>> laraxot/dev
 *                                                                               >>>>>>> .merge_file_onPDMJ
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
