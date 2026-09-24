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
<<<<<<< .merge_file_FkLy9Q
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> .merge_file_z4A1xh
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
<<<<<<< .merge_file_FkLy9Q
=======
=======
>>>>>>> 8d801bbe (Check & fix styling)
 * @property string                    $id
 * @property string                    $model_type
 * @property string                    $model_id
 * @property SchemalessAttributes|null $extra_attributes
 * @property Carbon|null               $created_at
 * @property Carbon|null               $updated_at
 * @property string|null               $updated_by
 * @property string|null               $created_by
 * @property Carbon|null               $deleted_at
 * @property string|null               $deleted_by
 *
 * @method static ExtraFactory          factory($count = null, $state = [])
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 8d801bbe (Check & fix styling)
=======
>>>>>>> .merge_file_z4A1xh
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
<<<<<<< .merge_file_FkLy9Q
<<<<<<< HEAD
<<<<<<< HEAD
final class Extra extends BaseExtra {}
=======
final class Extra extends BaseExtra
{
}
>>>>>>> laraxot/dev
=======
final class Extra extends BaseExtra
{
}
>>>>>>> 8d801bbe (Check & fix styling)
=======
final class Extra extends BaseExtra {}
>>>>>>> .merge_file_z4A1xh
