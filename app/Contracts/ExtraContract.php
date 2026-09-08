<?php

/**
 * @see https://github.com/buyersclub/laravel-eloquent-model-interface/blob/master/src/EloquentModelInterface.php
 */

declare(strict_types=1);

namespace Modules\Xot\Contracts;

<<<<<<< HEAD
use Spatie\SchemalessAttributes\SchemalessAttributes;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
=======
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Spatie\SchemalessAttributes\SchemalessAttributes;
>>>>>>> c7fd73eb (.)

/**
 * Modules\Xot\Contracts\ExtraContract.
 *
 * @property SchemalessAttributes $extra_attributes
 *
<<<<<<< HEAD
 * @method static Builder|ExtraContract newModelQuery()
 * @method static Builder|ExtraContract newQuery()
 * @method static Builder|ExtraContract query()
 * @method static Builder|ExtraContract withExtraAttributes()
 *
 * @property int         $id
 * @property string $model_type
 * @property string $model_id
=======
 * @method static Builder<Model> newModelQuery()
 * @method static Builder<Model> newQuery()
 * @method static Builder<Model> query()
 * @method static Builder<Model> withExtraAttributes()
 *
 * @property int         $id
 * @property string      $model_type
 * @property string      $model_id
>>>>>>> c7fd73eb (.)
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property Carbon|null $deleted_at
 * @property string|null $deleted_by
 *
<<<<<<< HEAD
 * @method static Builder|ExtraContract whereCreatedAt($value)
 * @method static Builder|ExtraContract whereCreatedBy($value)
 * @method static Builder|ExtraContract whereDeletedAt($value)
 * @method static Builder|ExtraContract whereDeletedBy($value)
 * @method static Builder|ExtraContract whereExtraAttributes($value)
 * @method static Builder|ExtraContract whereId($value)
 * @method static Builder|ExtraContract whereModelId($value)
 * @method static Builder|ExtraContract whereModelType($value)
 * @method static Builder|ExtraContract whereUpdatedAt($value)
 * @method static Builder|ExtraContract whereUpdatedBy($value)
=======
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
>>>>>>> c7fd73eb (.)
 *
 * @phpstan-require-extends Model
 *
 * @mixin \Eloquent
 */
interface ExtraContract
{
}
