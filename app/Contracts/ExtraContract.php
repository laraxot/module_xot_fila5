<?php

<<<<<<< HEAD
<<<<<<< HEAD
declare(strict_types=1);
=======
>>>>>>> laraxot/dev
=======
declare(strict_types=1);
>>>>>>> laraxot/dev
/**
 * @see https://github.com/buyersclub/laravel-eloquent-model-interface/blob/master/src/EloquentModelInterface.php
 */

<<<<<<< HEAD
<<<<<<< HEAD
=======
declare(strict_types=1);

>>>>>>> laraxot/dev
=======
>>>>>>> laraxot/dev
namespace Modules\Xot\Contracts;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Spatie\SchemalessAttributes\SchemalessAttributes;

/**
 * Modules\Xot\Contracts\ExtraContract.
 *
 * @property SchemalessAttributes $extra_attributes
 *
 * @method static Builder<Model> newModelQuery()
 * @method static Builder<Model> newQuery()
 * @method static Builder<Model> query()
 * @method static Builder<Model> withExtraAttributes()
 *
<<<<<<< HEAD
<<<<<<< HEAD
 * @property int $id
 * @property string $model_type
 * @property string $model_id
=======
 * @property int         $id
 * @property string      $model_type
 * @property string      $model_id
>>>>>>> laraxot/dev
=======
 * @property int $id
 * @property string $model_type
 * @property string $model_id
>>>>>>> laraxot/dev
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property Carbon|null $deleted_at
 * @property string|null $deleted_by
 *
 * @method static Builder<Model> whereCreatedAt($value)
 * @method static Builder<Model> whereCreatedBy($value)
 * @method static Builder<Model> whereDeletedAt($value)
 * @method static Builder<Model> whereDeletedBy($value)
 * @method static Builder<Model> whereExtraAttributes($value)
 * @method static Builder<Model> whereId($value)
 * @method static Builder<Model> whereModelId($value)
 * @method static Builder<Model> whereModelType($value)
 * @method static Builder<Model> whereUpdatedAt($value)
 * @method static Builder<Model> whereUpdatedBy($value)
 *
 * @phpstan-require-extends Model
 *
 * @mixin \Eloquent
 */
<<<<<<< HEAD
<<<<<<< HEAD
interface ExtraContract {}
=======
interface ExtraContract
{
}
>>>>>>> laraxot/dev
=======
interface ExtraContract {}
>>>>>>> laraxot/dev
