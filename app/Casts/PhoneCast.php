<?php

declare(strict_types=1);

namespace Modules\Xot\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
<<<<<<< HEAD
=======
use Illuminate\Database\Eloquent\Model;
>>>>>>> laraxot/dev
use Modules\Xot\ValueObjects\PhoneValueObject;

/**
 * @implements CastsAttributes<PhoneValueObject, PhoneValueObject>
 */
class PhoneCast implements CastsAttributes
{
    /**
     * Cast the given value.
     *
<<<<<<< HEAD
     * @param  mixed  $_model  The Eloquent model instance
=======
     * @param  Model  $_model  The Eloquent model instance
>>>>>>> laraxot/dev
     * @param  string  $_key  The attribute key
     * @param  mixed  $value  The raw value from database
     * @param  array<string, mixed>  $_attributes  All model attributes
     */
<<<<<<< HEAD
    public function get(mixed $_model, string $_key, mixed $value, array $_attributes): PhoneValueObject
=======
    public function get(Model $_model, string $_key, mixed $value, array $_attributes): PhoneValueObject
>>>>>>> laraxot/dev
    {
        if (! is_string($value)) {
            throw new \Exception('['.__LINE__.']['.class_basename($this).']');
        }

        return PhoneValueObject::fromString($value);
    }

    /**
     * Prepare the given value for storage.
     *
<<<<<<< HEAD
     * @param  mixed  $_model  The Eloquent model instance
=======
     * @param  Model  $_model  The Eloquent model instance
>>>>>>> laraxot/dev
     * @param  string  $_key  The attribute key
     * @param  mixed  $value  The value to be stored
     * @param  array<string, mixed>  $_attributes  All model attributes
     */
<<<<<<< HEAD
    public function set(mixed $_model, string $_key, mixed $value, array $_attributes): string
=======
    public function set(Model $_model, string $_key, mixed $value, array $_attributes): string
>>>>>>> laraxot/dev
    {
        if (! $value instanceof PhoneValueObject) {
            throw new \InvalidArgumentException('The given value is not an Phone instance.');
        }

        return $value->toString();
    }
}
