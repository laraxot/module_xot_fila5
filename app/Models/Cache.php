<?php

declare(strict_types=1);

namespace Modules\Xot\Models;

use Illuminate\Database\Eloquent\Builder;
use Modules\Xot\Contracts\ProfileContract;
use Modules\Xot\Database\Factories\CacheFactory;

/**
 * Modules\Xot\Models\Cache.
 *
 * @property string $key
 * @property string $value
<<<<<<< HEAD
 * @property int $expiration
 * @method static CacheFactory factory($count = null, $state = [])
=======
 * @property int    $expiration
 *
 * @method static CacheFactory          factory($count = null, $state = [])
>>>>>>> 7f6cf6be (.)
 * @method static Builder<static>|Cache newModelQuery()
 * @method static Builder<static>|Cache newQuery()
 * @method static Builder<static>|Cache query()
 * @method static Builder<static>|Cache whereExpiration($value)
 * @method static Builder<static>|Cache whereKey($value)
 * @method static Builder<static>|Cache whereValue($value)
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
class Cache extends BaseModel
{
    protected $table = 'cache';

    protected $primaryKey = 'key';

    protected $keyType = 'string';

    /** @var list<string> */
    protected $fillable = [
        'key',
        'value',
        'expiration',
    ];
}
