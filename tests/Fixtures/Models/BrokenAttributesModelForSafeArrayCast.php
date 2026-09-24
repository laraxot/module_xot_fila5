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
<<<<<<< HEAD
        throw new ValueError('Mock error');
<<<<<<< .merge_file_jg8EwW
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_0NYkOr
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
        throw new ValueError('Mock error');
=======
        throw new \ValueError('Mock error');
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
        throw new \ValueError('Mock error');
>>>>>>> .merge_file_s2kNh3
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
        throw new \ValueError('Mock error');
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_TlXjsp
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
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
<<<<<<< HEAD
<<<<<<< .merge_file_jg8EwW
<<<<<<< HEAD
        return $key === 'name' ? 'Fallback' : null;
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_0NYkOr
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
        return $key === 'name' ? 'Fallback' : null;
=======
        return 'name' === $key ? 'Fallback' : null;
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
        return 'name' === $key ? 'Fallback' : null;
>>>>>>> .merge_file_s2kNh3
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
        return 'name' === $key ? 'Fallback' : null;
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
        return $key === 'name' ? 'Fallback' : null;
>>>>>>> .merge_file_TlXjsp
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
    }
}
