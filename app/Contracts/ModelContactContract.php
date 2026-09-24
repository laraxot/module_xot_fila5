<?php

declare(strict_types=1);

namespace Modules\Xot\Contracts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * Modules\Xot\Contracts\ModelContract.
 *
<<<<<<< HEAD
 * @property int $id
 * @property int|null $user_id
 * @property string|null $post_type
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property string|null $title
 * @property bool $is_reclamed
 * @property bool $table_enable
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
 * <<<<<<< .merge_file_3JPFC0
 * =======
 * <<<<<<< HEAD
 * <<<<<<< .merge_file_rd5PoV
 *
 * >>>>>>> .merge_file_Mi4DdT
 *
 * @property int                $id
 * @property int|null           $user_id
 * @property string|null        $post_type
 * @property Carbon|null        $created_at
 * @property Carbon|null        $updated_at
 * @property string|null        $created_by
 * @property string|null        $updated_by
 * @property string|null        $title
 * @property bool               $is_reclamed
 * @property bool               $table_enable
 *                                            <<<<<<< .merge_file_3JPFC0
 *                                            =======
 *                                            =======
 *                                            <<<<<<< .merge_file_ckQNQG
 * @property int                $id
 * @property int|null           $user_id
 * @property string|null        $post_type
 * @property Carbon|null        $created_at
 * @property Carbon|null        $updated_at
 * @property string|null        $created_by
 * @property string|null        $updated_by
 * @property string|null        $title
 * @property bool               $is_reclamed
 * @property bool               $table_enable
 *                                            =======
 *                                            <<<<<<< HEAD
 * @property int                $id
 * @property int|null           $user_id
 * @property string|null        $post_type
 * @property Carbon|null        $created_at
 * @property Carbon|null        $updated_at
 * @property string|null        $created_by
 * @property string|null        $updated_by
 * @property string|null        $title
 * @property bool               $is_reclamed
 * @property bool               $table_enable
 *                                            =======
 * @property int                $id
 * @property int|null           $user_id
 * @property string|null        $post_type
 * @property Carbon|null        $created_at
 * @property Carbon|null        $updated_at
 * @property string|null        $created_by
 * @property string|null        $updated_by
 * @property string|null        $title
 * @property bool               $is_reclamed
 * @property bool               $table_enable
 *                                            >>>>>>> 9e11d472 (Fix merge conflicts in PHPDoc comments across multiple action classes and contracts, ensuring consistent parameter annotations and removing redundant lines.)
 *                                            >>>>>>> .merge_file_Mi4DdT
 * @property PivotContract|null $pivot
 * @property string             $tennant_name
 * @property string             $mail_subject
 * @property string             $mail_body
 * @property string             $sms_from
 * @property string             $mobile_phone
 * @property string             $sms_body
 * @property string             $sms_count
 *
 * <<<<<<< HEAD
 *
 * @method int|string|null                              getKey()
 * @method string                                       getRouteKey()
 * @method string                                       getRouteKeyName()
 * @method string                                       getTable()
 * @method \Illuminate\Database\Eloquent\Builder<Model> with($array)
 * @method list<string>                                 getFillable()
 * @method static                                       fill($array)
 * @method \Illuminate\Database\Connection              getConnection()
 * @method bool                                         update($params)
 * @method bool|null                                    delete()
 * @method int                                          detach($params)
 * @method void                                         attach($params)
 * @method bool                                         save($params)
 * @method array<string, mixed>                         treeLabel()
 * @method array<string, mixed>                         treeSons()
 * @method array<string, mixed>                         toArray()
 *
 * @property PivotContract|null $pivot
 * @property string             $tennant_name
 * @property string             $mail_subject
 * @property string             $mail_body
 * @property string             $sms_from
 * @property string             $mobile_phone
 * @property string             $sms_body
 * @property string             $sms_count
 *
 * @method int|string|null                                                 getKey()
 * @method string                                                          getRouteKey()
 * @method string                                                          getRouteKeyName()
 * @method string                                                          getTable()
 * @method \Illuminate\Database\Eloquent\Builder<Model>                    with($array)
 * @method list<string>                                                    getFillable()
 * @method static                                                          fill($array)
 * @method \Illuminate\Database\Connection                                 getConnection()
 * @method bool                                                            update($params)
 * @method bool|null                                                       delete()
 * @method int                                                             detach($params)
 * @method void                                                            attach($params)
 * @method bool                                                            save($params)
 * @method array<string, mixed>                                            treeLabel()
 * @method array<string, mixed>                                            treeSons()
 * @method array<string, mixed>                                            toArray()
 *                                                                                           <<<<<<< .merge_file_3JPFC0
 *                                                                                           =======
 *                                                                                           =======
 *                                                                                           <<<<<<< .merge_file_ckQNQG
 * @method int|string|null                                                 getKey()
 * @method string                                                          getRouteKey()
 * @method string                                                          getRouteKeyName()
 * @method string                                                          getTable()
 * @method \Illuminate\Database\Eloquent\Builder<Model>                    with($array)
 * @method list<string>                                                    getFillable()
 * @method static                                                          fill($array)
 * @method \Illuminate\Database\Connection                                 getConnection()
 * @method bool                                                            update($params)
 * @method bool|null                                                       delete()
 * @method int                                                             detach($params)
 * @method void                                                            attach($params)
 * @method bool                                                            save($params)
 * @method array<string, mixed>                                            treeLabel()
 * @method array<string, mixed>                                            treeSons()
 * @method array<string, mixed>                                            toArray()
 *                                                                                           =======
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
 *                                                                                           >>>>>>> laraxot/dev
 *                                                                                           >>>>>>> .merge_file_S8c4Jr
 *                                                                                           >>>>>>> .merge_file_nhFIXv
 *                                                                                           =======
 * @method int|string|null                                                 getKey()
 * @method string                                                          getRouteKey()
 * @method string                                                          getRouteKeyName()
 * @method string                                                          getTable()
 * @method \Illuminate\Database\Eloquent\Builder<Model>                    with($array)
 * @method list<string>                                                    getFillable()
 * @method static                                                          fill($array)
 * @method \Illuminate\Database\Connection                                 getConnection()
 * @method bool                                                            update($params)
 * @method bool|null                                                       delete()
 * @method int                                                             detach($params)
 * @method void                                                            attach($params)
 * @method bool                                                            save($params)
 * @method array<string, mixed>                                            treeLabel()
 * @method array<string, mixed>                                            treeSons()
 * @method array<string, mixed>                                            toArray()
 *                                                                                           >>>>>>> 9e11d472 (Fix merge conflicts in PHPDoc comments across multiple action classes and contracts, ensuring consistent parameter annotations and removing redundant lines.)
 *                                                                                           >>>>>>> .merge_file_Mi4DdT
>>>>>>> laraxot/dev
 * @method \Illuminate\Database\Eloquent\Relations\BelongsTo<Model, Model> user()
 *
 * @phpstan-require-extends Model
 *
 * @mixin \Eloquent
 */
interface ModelContactContract
{
    /**
     * @return array<int, string>
     */
    public function getNotifyVia(): array;

    public function sendEmailCallback(): void;

    /**
<<<<<<< HEAD
     * @param  array<string, mixed>  $data
=======
     * <<<<<<< .merge_file_3JPFC0.
     *
     * @param array<string, mixed> $data
     *                                   =======
     *                                   <<<<<<< HEAD
     *                                   <<<<<<< .merge_file_rd5PoV.
     * @param array<string, mixed> $data
     *                                   =======
     *                                   <<<<<<< .merge_file_ckQNQG.
     * @param array<string, mixed> $data
     *                                   =======
     *                                   <<<<<<< HEAD
     * @param array<string, mixed> $data
     *                                   =======
     * @param array<string, mixed> $data
     *                                   >>>>>>> laraxot/dev
     *                                   >>>>>>> .merge_file_S8c4Jr
     *                                   >>>>>>> .merge_file_nhFIXv
     *                                   =======
     * @param array<string, mixed> $data
     *                                   >>>>>>> 9e11d472 (Fix merge conflicts in PHPDoc comments across multiple action classes and contracts, ensuring consistent parameter annotations and removing redundant lines.)
     *                                   >>>>>>> .merge_file_Mi4DdT
>>>>>>> laraxot/dev
     */
    public function increase(string $what, array $data): void;
}
