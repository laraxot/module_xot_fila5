<?php

declare(strict_types=1);

namespace Modules\Xot\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
<<<<<<< HEAD
use Illuminate\Database\Eloquent\Model;
=======
<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
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
<<<<<<< .merge_file_OXdqv9
<<<<<<< HEAD
     * <<<<<<< HEAD
     *
=======
<<<<<<< HEAD
>>>>>>> da9ae01a0 (.)
     * @param Model                $_model      The Eloquent model instance
=======
     * @param mixed                $_model      The Eloquent model instance
>>>>>>> 930f8146 (Check & fix styling)
     * @param string               $_key        The attribute key
     * @param mixed                $value       The raw value from database
     * @param array<string, mixed> $_attributes All model attributes
     *                                          =======
     * @param Model                $_model      The Eloquent model instance
     * @param string               $_key        The attribute key
     * @param mixed                $value       The raw value from database
     * @param array<string, mixed> $_attributes All model attributes
     *                                          >>>>>>> laraxot/dev
=======
     * @param  Model  $_model  The Eloquent model instance
     * @param  string  $_key  The attribute key
     * @param  mixed  $value  The raw value from database
     * @param  array<string, mixed>  $_attributes  All model attributes
>>>>>>> .merge_file_eLjVHz
     */
<<<<<<< HEAD
    public function get(Model $_model, string $_key, mixed $value, array $_attributes): PhoneValueObject
=======
<<<<<<< HEAD
     * @param mixed                $_model      The Eloquent model instance
     * @param string               $_key        The attribute key
     * @param mixed                $value       The raw value from database
     * @param array<string, mixed> $_attributes All model attributes
     */
    public function get(mixed $_model, string $_key, mixed $value, array $_attributes): PhoneValueObject
>>>>>>> 3792da0d (Check & fix styling)
=======
    public function get(mixed $_model, string $_key, mixed $value, array $_attributes): PhoneValueObject
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
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
<<<<<<< .merge_file_OXdqv9
<<<<<<< HEAD
     * <<<<<<< HEAD
     *
=======
<<<<<<< HEAD
>>>>>>> da9ae01a0 (.)
     * @param Model                $_model      The Eloquent model instance
=======
     * @param mixed                $_model      The Eloquent model instance
>>>>>>> 930f8146 (Check & fix styling)
     * @param string               $_key        The attribute key
     * @param mixed                $value       The value to be stored
     * @param array<string, mixed> $_attributes All model attributes
     *                                          =======
     * @param Model                $_model      The Eloquent model instance
     * @param string               $_key        The attribute key
     * @param mixed                $value       The value to be stored
     * @param array<string, mixed> $_attributes All model attributes
     *                                          >>>>>>> laraxot/dev
=======
     * @param  Model  $_model  The Eloquent model instance
     * @param  string  $_key  The attribute key
     * @param  mixed  $value  The value to be stored
     * @param  array<string, mixed>  $_attributes  All model attributes
>>>>>>> .merge_file_eLjVHz
     */
<<<<<<< HEAD
    public function set(Model $_model, string $_key, mixed $value, array $_attributes): string
=======
<<<<<<< HEAD
     * @param mixed                $_model      The Eloquent model instance
     * @param string               $_key        The attribute key
     * @param mixed                $value       The value to be stored
     * @param array<string, mixed> $_attributes All model attributes
     */
    public function set(mixed $_model, string $_key, mixed $value, array $_attributes): string
>>>>>>> 3792da0d (Check & fix styling)
=======
    public function set(mixed $_model, string $_key, mixed $value, array $_attributes): string
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
    {
        if (! $value instanceof PhoneValueObject) {
            throw new \InvalidArgumentException('The given value is not an Phone instance.');
        }

        return $value->toString();
    }
}
