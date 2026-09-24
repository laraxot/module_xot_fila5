<?php

declare(strict_types=1);

namespace Modules\Xot\Contracts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * Modules\Xot\Contracts\ModelContract.
 *
<<<<<<< .merge_file_d7m1SO
=======
<<<<<<< HEAD
>>>>>>> .merge_file_kWj6Bh
 * @property int $id
 * @property int|null $user_id
 * @property string|null $name
 * @property string|null $type
 * @property mixed $value
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property string|null $title
 * @property bool $is_reclamed
 * @property bool $table_enable
<<<<<<< .merge_file_d7m1SO
=======
 * @property PivotContract|null $pivot
 * @property string $tennant_name
 * @property string $mail_subject
 * @property string $mail_body
 * @property string $sms_from
 * @property string $mobile_phone
 * @property string $sms_body
 * @property string $sms_count
 *
 * @method int|string|null getKey()
 * @method string getRouteKey()
 * @method string getRouteKeyName()
 * @method string getTable()
 * @method \Illuminate\Database\Eloquent\Builder<Model> with($array)
 * @method list<string> getFillable()
 * @method static fill($array)
 * @method \Illuminate\Database\Connection getConnection()
 * @method bool update($params)
 * @method bool|null delete()
 * @method int detach($params)
 * @method void attach($params)
 * @method bool save($params)
 * @method array<string, mixed> treeLabel()
 * @method array<string, mixed> treeSons()
 * @method array<string, mixed> toArray()
=======
 * @property int                $id
 * @property int|null           $user_id
 * @property string|null        $name
 * @property string|null        $type
 * @property mixed              $value
 * @property Carbon|null        $created_at
 * @property Carbon|null        $updated_at
 * @property string|null        $created_by
 * @property string|null        $updated_by
 * @property string|null        $title
 * @property bool               $is_reclamed
 * @property bool               $table_enable
>>>>>>> .merge_file_kWj6Bh
 * @property PivotContract|null $pivot
 * @property string $tennant_name
 * @property string $mail_subject
 * @property string $mail_body
 * @property string $sms_from
 * @property string $mobile_phone
 * @property string $sms_body
 * @property string $sms_count
 *
<<<<<<< .merge_file_d7m1SO
 * @method int|string|null getKey()
 * @method string getRouteKey()
 * @method string getRouteKeyName()
 * @method string getTable()
 * @method \Illuminate\Database\Eloquent\Builder<Model> with($array)
 * @method list<string> getFillable()
 * @method static fill($array)
 * @method \Illuminate\Database\Connection getConnection()
 * @method bool update($params)
 * @method bool|null delete()
 * @method int detach($params)
 * @method void attach($params)
 * @method bool save($params)
 * @method array<string, mixed> treeLabel()
 * @method array<string, mixed> treeSons()
 * @method array<string, mixed> toArray()
=======
 * @method mixed                                                           getKey()
 * @method string                                                          getRouteKey()
 * @method string                                                          getRouteKeyName()
 * @method string                                                          getTable()
 * @method mixed                                                           with($array)
 * @method array<string, mixed>                                            getFillable()
 * @method mixed                                                           fill($array)
 * @method mixed                                                           getConnection()
 * @method mixed                                                           update($params)
 * @method mixed                                                           delete()
 * @method mixed                                                           detach($params)
 * @method mixed                                                           attach($params)
 * @method mixed                                                           save($params)
 * @method array<string, mixed>                                            treeLabel()
 * @method array<string, mixed>                                            treeSons()
 * @method array<string, mixed>                                            toArray()
>>>>>>> laraxot/dev
>>>>>>> .merge_file_kWj6Bh
 * @method \Illuminate\Database\Eloquent\Relations\BelongsTo<Model, Model> user()
 *
 * @phpstan-require-extends Model
 *
 * @mixin \Eloquent
 */
<<<<<<< .merge_file_d7m1SO
interface ModelInputContract {}
=======
<<<<<<< HEAD
interface ModelInputContract {}
=======
interface ModelInputContract
{
}
>>>>>>> laraxot/dev
>>>>>>> .merge_file_kWj6Bh
