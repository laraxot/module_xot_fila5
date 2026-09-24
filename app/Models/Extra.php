<?php

declare(strict_types=1);

namespace Modules\Xot\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use Modules\Xot\Contracts\ProfileContract;
use Modules\Xot\Database\Factories\ExtraFactory;
use Spatie\SchemalessAttributes\SchemalessAttributes;

/**
 * Model Extra.
 *
<<<<<<< .merge_file_RCssZ2
 * @property string $id
 * @property string $model_type
 * @property string $model_id
=======
<<<<<<< HEAD
 * @property string $id
 * @property string $model_type
 * @property string $model_id
 * @property SchemalessAttributes|null $extra_attributes
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property Carbon|null $deleted_at
 * @property string|null $deleted_by
 *
 * @method static ExtraFactory factory($count = null, $state = [])
=======
 * @property string                    $id
 * @property string                    $model_type
 * @property string                    $model_id
>>>>>>> .merge_file_WKfM9r
 * @property SchemalessAttributes|null $extra_attributes
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property Carbon|null $deleted_at
 * @property string|null $deleted_by
 *
<<<<<<< .merge_file_RCssZ2
 * @method static ExtraFactory factory($count = null, $state = [])
=======
 * @method static ExtraFactory          factory($count = null, $state = [])
>>>>>>> laraxot/dev
>>>>>>> .merge_file_WKfM9r
 * @method static Builder<static>|Extra newModelQuery()
 * @method static Builder<static>|Extra newQuery()
 * @method static Builder<static>|Extra query()
 * @method static Builder<static>|Extra whereCreatedAt($value)
 * @method static Builder<static>|Extra whereCreatedBy($value)
 * @method static Builder<static>|Extra whereDeletedAt($value)
 * @method static Builder<static>|Extra whereDeletedBy($value)
 * @method static Builder<static>|Extra whereExtraAttributes($value)
 * @method static Builder<static>|Extra whereId($value)
 * @method static Builder<static>|Extra whereModelId($value)
 * @method static Builder<static>|Extra whereModelType($value)
 * @method static Builder<static>|Extra whereUpdatedAt($value)
 * @method static Builder<static>|Extra whereUpdatedBy($value)
 * @method static Builder<static>|Extra withExtraAttributes()
 *
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $deleter
 * @property ProfileContract|null $updater
 *
 * @mixin \Eloquent
 */
<<<<<<< .merge_file_RCssZ2
final class Extra extends BaseExtra {}
=======
<<<<<<< HEAD
final class Extra extends BaseExtra {}
=======
final class Extra extends BaseExtra
{
}
>>>>>>> laraxot/dev
>>>>>>> .merge_file_WKfM9r
