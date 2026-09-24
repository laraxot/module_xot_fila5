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
=======
<<<<<<< HEAD
        throw new ValueError('Mock error');
=======
        throw new \ValueError('Mock error');
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
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
        return $key === 'name' ? 'Fallback' : null;
=======
<<<<<<< HEAD
        return $key === 'name' ? 'Fallback' : null;
=======
        return 'name' === $key ? 'Fallback' : null;
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
    }
}
