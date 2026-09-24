<?php

declare(strict_types=1);

namespace Modules\Xot\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
<<<<<<< .merge_file_YeKi7T
use Illuminate\Database\Eloquent\Model;
=======
<<<<<<< HEAD
use Illuminate\Database\Eloquent\Model;
=======
>>>>>>> laraxot/dev
>>>>>>> .merge_file_9wbucT
use Modules\Xot\ValueObjects\PhoneValueObject;

/**
 * @implements CastsAttributes<PhoneValueObject, PhoneValueObject>
 */
class PhoneCast implements CastsAttributes
{
    /**
     * Cast the given value.
     *
<<<<<<< .merge_file_YeKi7T
=======
<<<<<<< HEAD
>>>>>>> .merge_file_9wbucT
     * @param  Model  $_model  The Eloquent model instance
     * @param  string  $_key  The attribute key
     * @param  mixed  $value  The raw value from database
     * @param  array<string, mixed>  $_attributes  All model attributes
     */
    public function get(Model $_model, string $_key, mixed $value, array $_attributes): PhoneValueObject
<<<<<<< .merge_file_YeKi7T
=======
=======
     * @param mixed                $_model      The Eloquent model instance
     * @param string               $_key        The attribute key
     * @param mixed                $value       The raw value from database
     * @param array<string, mixed> $_attributes All model attributes
     */
    public function get(mixed $_model, string $_key, mixed $value, array $_attributes): PhoneValueObject
>>>>>>> laraxot/dev
>>>>>>> .merge_file_9wbucT
    {
        if (! is_string($value)) {
            throw new \Exception('['.__LINE__.']['.class_basename($this).']');
        }

        return PhoneValueObject::fromString($value);
    }

    /**
     * Prepare the given value for storage.
     *
<<<<<<< .merge_file_YeKi7T
=======
<<<<<<< HEAD
>>>>>>> .merge_file_9wbucT
     * @param  Model  $_model  The Eloquent model instance
     * @param  string  $_key  The attribute key
     * @param  mixed  $value  The value to be stored
     * @param  array<string, mixed>  $_attributes  All model attributes
     */
    public function set(Model $_model, string $_key, mixed $value, array $_attributes): string
<<<<<<< .merge_file_YeKi7T
=======
=======
     * @param mixed                $_model      The Eloquent model instance
     * @param string               $_key        The attribute key
     * @param mixed                $value       The value to be stored
     * @param array<string, mixed> $_attributes All model attributes
     */
    public function set(mixed $_model, string $_key, mixed $value, array $_attributes): string
>>>>>>> laraxot/dev
>>>>>>> .merge_file_9wbucT
    {
        if (! $value instanceof PhoneValueObject) {
            throw new \InvalidArgumentException('The given value is not an Phone instance.');
        }

        return $value->toString();
    }
}
