<?php

declare(strict_types=1);

namespace Modules\Xot\ValueObjects;

use function Safe\preg_match;

/**
 * @see https://medium.com/@sliusarchyn/value-objects-in-laravel-use-it-12ba71b00281
 */
readonly class PhoneValueObject
{
    private function __construct(
        private string $phone,
<<<<<<< .merge_file_Q7adxw
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> .merge_file_AsQy8P
    ) {}

    public static function fromString(string $phone): self
    {
        if (preg_match('/^\+1\d{10}$/', $phone) === 0) {
<<<<<<< .merge_file_Q7adxw
=======
=======
>>>>>>> 8d801bbe (Check & fix styling)
    ) {
    }

    public static function fromString(string $phone): self
    {
        if (0 === preg_match('/^\+1\d{10}$/', $phone)) {
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 8d801bbe (Check & fix styling)
=======
>>>>>>> .merge_file_AsQy8P
            throw new \InvalidArgumentException('It is not valid phone value');
        }

        return new self($phone);
    }

    public function toString(): string
    {
        return $this->phone;
    }
}
