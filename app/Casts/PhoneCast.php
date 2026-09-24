<?php

declare(strict_types=1);

namespace Modules\Xot\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;
use Modules\Xot\ValueObjects\PhoneValueObject;

/**
 * @implements CastsAttributes<PhoneValueObject, PhoneValueObject>
 */
class PhoneCast implements CastsAttributes
{
    /**
     * Cast the given value.
     *
     * <<<<<<< .merge_file_7tsdzP
     * <<<<<<< HEAD
     *
     * @param Model                $_model      The Eloquent model instance
     * @param string               $_key        The attribute key
     * @param mixed                $value       The raw value from database
     * @param array<string, mixed> $_attributes All model attributes
     *                                          =======
     *                                          =======
     *                                          <<<<<<< HEAD
     *
     * >>>>>>> .merge_file_67rMYS
     * @param Model                $_model      The Eloquent model instance
     * @param string               $_key        The attribute key
     * @param mixed                $value       The raw value from database
     * @param array<string, mixed> $_attributes All model attributes
     *                                          <<<<<<< .merge_file_7tsdzP
     *                                          >>>>>>> laraxot/dev
     *                                          =======
     *                                          =======
     * @param Model                $_model      The Eloquent model instance
     * @param string               $_key        The attribute key
     * @param mixed                $value       The raw value from database
     * @param array<string, mixed> $_attributes All model attributes
     *                                          >>>>>>> laraxot/dev
     *                                          >>>>>>> .merge_file_67rMYS
     */
    public function get(Model $_model, string $_key, mixed $value, array $_attributes): PhoneValueObject
    {
        if (! is_string($value)) {
            throw new \Exception('['.__LINE__.']['.class_basename($this).']');
        }

        return PhoneValueObject::fromString($value);
    }

    /**
     * Prepare the given value for storage.
     *
     * <<<<<<< .merge_file_7tsdzP
     * <<<<<<< HEAD
     *
     * @param Model                $_model      The Eloquent model instance
     * @param string               $_key        The attribute key
     * @param mixed                $value       The value to be stored
     * @param array<string, mixed> $_attributes All model attributes
     *                                          =======
     *                                          =======
     *                                          <<<<<<< HEAD
     *
     * >>>>>>> .merge_file_67rMYS
     * @param Model                $_model      The Eloquent model instance
     * @param string               $_key        The attribute key
     * @param mixed                $value       The value to be stored
     * @param array<string, mixed> $_attributes All model attributes
     *                                          <<<<<<< .merge_file_7tsdzP
     *                                          >>>>>>> laraxot/dev
     *                                          =======
     *                                          =======
     * @param Model                $_model      The Eloquent model instance
     * @param string               $_key        The attribute key
     * @param mixed                $value       The value to be stored
     * @param array<string, mixed> $_attributes All model attributes
     *                                          >>>>>>> laraxot/dev
     *                                          >>>>>>> .merge_file_67rMYS
     */
    public function set(Model $_model, string $_key, mixed $value, array $_attributes): string
    {
        if (! $value instanceof PhoneValueObject) {
            throw new \InvalidArgumentException('The given value is not an Phone instance.');
        }

        return $value->toString();
    }
}
