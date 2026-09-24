<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Fixtures\Models;

use Illuminate\Database\Eloquent\Model;
use ValueError;

/**
 * Model di fixture: attributesToArray lancia ValueError (catturato da SafeArrayByModelCastAction).
 */
final class BrokenAttributesModelForSafeArrayCast extends Model
{
    public $incrementing = false;

    protected $table = 'broken_attrs_safe_array';

    /**
     * @return array<string, mixed>
     */
    public function attributesToArray(): array
    {
<<<<<<< .merge_file_0NYkOr
<<<<<<< HEAD
        throw new ValueError('Mock error');
=======
        throw new \ValueError('Mock error');
>>>>>>> laraxot/dev
=======
        throw new \ValueError('Mock error');
>>>>>>> .merge_file_s2kNh3
    }

    /**
     * @return array<string, mixed>
     */
    public function getAttributes(): array
    {
        return ['name' => 'Fallback'];
    }

    public function getAttribute($key): mixed
    {
<<<<<<< .merge_file_0NYkOr
<<<<<<< HEAD
        return $key === 'name' ? 'Fallback' : null;
=======
        return 'name' === $key ? 'Fallback' : null;
>>>>>>> laraxot/dev
=======
        return 'name' === $key ? 'Fallback' : null;
>>>>>>> .merge_file_s2kNh3
    }
}
