<?php

declare(strict_types=1);

namespace Modules\Xot\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use Modules\Xot\Contracts\ProfileContract;
use Modules\Xot\Database\Factories\FeedFactory;

/**
 * Modules\Xot\Models\Feed.
 *
<<<<<<< HEAD
 * @property string $id
=======
 * @property string      $id
>>>>>>> 7f6cf6be (.)
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
<<<<<<< HEAD
 * @method static FeedFactory factory($count = null, $state = [])
=======
 *
 * @method static FeedFactory          factory($count = null, $state = [])
>>>>>>> 7f6cf6be (.)
 * @method static Builder<static>|Feed newModelQuery()
 * @method static Builder<static>|Feed newQuery()
 * @method static Builder<static>|Feed query()
 * @method static Builder<static>|Feed whereCreatedAt($value)
 * @method static Builder<static>|Feed whereCreatedBy($value)
 * @method static Builder<static>|Feed whereId($value)
 * @method static Builder<static>|Feed whereUpdatedAt($value)
 * @method static Builder<static>|Feed whereUpdatedBy($value)
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
class Feed extends BaseModel
{
    /** @var list<string> */
    protected $fillable = [
        'id',
        'created_at',
        'updated_at',
    ];
}
