<?php

<<<<<<< .merge_file_N9aqwW
declare(strict_types=1);
=======
<<<<<<< HEAD
declare(strict_types=1);
=======
>>>>>>> laraxot/dev
>>>>>>> .merge_file_KnRl2O
/**
 * @see https://github.com/buyersclub/laravel-eloquent-model-interface/blob/master/src/EloquentModelInterface.php
 */

<<<<<<< .merge_file_N9aqwW
=======
<<<<<<< HEAD
=======
declare(strict_types=1);

>>>>>>> laraxot/dev
>>>>>>> .merge_file_KnRl2O
namespace Modules\Xot\Contracts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Support\Carbon;

/**
 * Modules\Xot\Contracts\ModelContract.
 *
<<<<<<< .merge_file_N9aqwW
 * @property int $id
 * @property int|null $user_id
=======
<<<<<<< HEAD
 * @property int $id
 * @property int|null $user_id
=======
 * @property int         $id
 * @property int|null    $user_id
>>>>>>> laraxot/dev
>>>>>>> .merge_file_KnRl2O
 * @property string|null $post_type
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property string|null $title
<<<<<<< .merge_file_N9aqwW
=======
<<<<<<< HEAD
>>>>>>> .merge_file_KnRl2O
 * @property bool $is_reclamed
 * @property bool $table_enable
 * @property Pivot|null $pivot
 * @property string $tennant_name
<<<<<<< .merge_file_N9aqwW
 *
 * @method string getRouteKey()
 * @method string getRouteKeyName()
 * @method string getTable()
 * @method \Illuminate\Database\Eloquent\Builder<Model> with(array<int, string> $array)
 * @method list<string> getFillable()
 * @method static fill(array<string, mixed> $array)
 * @method \Illuminate\Database\Connection getConnection()
 * @method bool update(array<string, mixed> $params)
 * @method bool|null delete()
 * @method int detach(mixed $params)
 * @method void attach(mixed $params)
 * @method array<string, mixed> treeLabel()
 * @method array<string, mixed> treeSons()
 * @method array<string, mixed> toArray()
 * @method \Illuminate\Database\Eloquent\Relations\BelongsTo<Model, Model> user()
 * @method mixed getAttributeValue(string $key)
=======
 *
 * @method string getRouteKey()
 * @method string getRouteKeyName()
 * @method string getTable()
 * @method \Illuminate\Database\Eloquent\Builder<Model> with(array<int, string> $array)
 * @method list<string> getFillable()
 * @method static fill(array<string, mixed> $array)
 * @method \Illuminate\Database\Connection getConnection()
 * @method bool update(array<string, mixed> $params)
 * @method bool|null delete()
 * @method int detach(mixed $params)
 * @method void attach(mixed $params)
 * @method array<string, mixed> treeLabel()
 * @method array<string, mixed> treeSons()
 * @method array<string, mixed> toArray()
 * @method \Illuminate\Database\Eloquent\Relations\BelongsTo<Model, Model> user()
 * @method mixed getAttributeValue(string $key)
=======
 * @property bool        $is_reclamed
 * @property bool        $table_enable
 * @property Pivot|null  $pivot
 * @property string      $tennant_name
 *
 * @method string                                                          getRouteKey()
 * @method string                                                          getRouteKeyName()
 * @method string                                                          getTable()
 * @method mixed                                                           with(array<string, mixed> $array)
 * @method list<string>                                                    getFillable()
 * @method mixed                                                           fill(array<string, mixed> $array)
 * @method mixed                                                           getConnection()
 * @method mixed                                                           update(array<string, mixed> $params)
 * @method mixed                                                           delete()
 * @method mixed                                                           detach(mixed $params)
 * @method mixed                                                           attach(mixed $params)
 * @method array<string, mixed>                                            treeLabel()
 * @method array<string, mixed>                                            treeSons()
 * @method array<string, mixed>                                            toArray()
 * @method \Illuminate\Database\Eloquent\Relations\BelongsTo<Model, Model> user()
 * @method mixed                                                           getAttributeValue(string $key)
>>>>>>> laraxot/dev
>>>>>>> .merge_file_KnRl2O
 *
 * @phpstan-require-extends Model
 *
 * @mixin \Eloquent
 */
<<<<<<< .merge_file_N9aqwW
interface ModelContract {}
=======
<<<<<<< HEAD
interface ModelContract {}
=======
interface ModelContract
{
}
>>>>>>> laraxot/dev
>>>>>>> .merge_file_KnRl2O
