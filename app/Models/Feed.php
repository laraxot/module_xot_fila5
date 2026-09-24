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
<<<<<<< .merge_file_mqT77U
<<<<<<< HEAD
 * <<<<<<< HEAD
 *
 * @property string      $id
 *                                   =======
 * @property string      $id
 *                                   >>>>>>> laraxot/dev
=======
 * @property string      $id
>>>>>>> 8d801bbe (Check & fix styling)
=======
 * @property string $id
>>>>>>> .merge_file_TeThhe
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
<<<<<<< .merge_file_mqT77U
<<<<<<< HEAD
 * <<<<<<< HEAD
 *
 * @method static FeedFactory          factory($count = null, $state = [])
 *                                                                         =======
 * @method static FeedFactory          factory($count = null, $state = [])
 *                                                                         >>>>>>> laraxot/dev
=======
 * @method static FeedFactory          factory($count = null, $state = [])
>>>>>>> 8d801bbe (Check & fix styling)
=======
 * @method static FeedFactory factory($count = null, $state = [])
>>>>>>> .merge_file_TeThhe
 * @method static Builder<static>|Feed newModelQuery()
 * @method static Builder<static>|Feed newQuery()
 * @method static Builder<static>|Feed query()
 * @method static Builder<static>|Feed whereCreatedAt($value)
 * @method static Builder<static>|Feed whereCreatedBy($value)
 * @method static Builder<static>|Feed whereId($value)
 * @method static Builder<static>|Feed whereUpdatedAt($value)
 * @method static Builder<static>|Feed whereUpdatedBy($value)
 *
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $deleter
 * @property ProfileContract|null $updater
 *
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
