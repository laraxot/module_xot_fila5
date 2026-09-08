<?php

declare(strict_types=1);

namespace Modules\Xot\Models;

<<<<<<< HEAD
use Illuminate\Database\Eloquent\Model;

=======
>>>>>>> c7fd73eb (.)
/**
 * Class XotBaseUuidModel.
 *
 * Base class for models using UUIDs.
 */
<<<<<<< HEAD
abstract class XotBaseUuidModel extends Model
{
    /** @var bool */
    public $incrementing = false;

    /** @var string */
    protected $keyType = 'string';

    /** @var string */
    protected $primaryKey = 'id';

=======
abstract class XotBaseUuidModel extends XotBaseModel
{
    public $incrementing = false;

>>>>>>> c7fd73eb (.)
    /** @var bool */
    public $timestamps = true;

    /** @var int */
    protected $perPage = 30;
<<<<<<< HEAD
=======

    protected $keyType = 'string';

    /** @var list<string> */
    protected $fillable = [
        'id',
    ];

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'id' => 'string',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
            'deleted_at' => 'datetime',
            'updated_by' => 'string',
            'created_by' => 'string',
            'deleted_by' => 'string',
        ];
    }
>>>>>>> c7fd73eb (.)
}
