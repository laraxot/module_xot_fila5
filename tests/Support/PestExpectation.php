<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Support;

use Modules\Xot\Actions\Cast\SafeStringCastAction;
use PHPUnit\Framework\Assert;

/**
 * @property self $not Negated expectation (resolved via __get).
 */
final class PestExpectation
{
    public function __construct(
        private readonly mixed $value,
        private readonly bool $negated = false,
<<<<<<< .merge_file_pprJJz
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> .merge_file_TlRRvZ
    ) {}

    public function __get(string $name): self
    {
        if ($name === 'not') {
<<<<<<< .merge_file_pprJJz
=======
=======
>>>>>>> 3792da0d (Check & fix styling)
    ) {
    }

    public function __get(string $name): self
    {
        if ('not' === $name) {
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_TlRRvZ
            return $this->not();
        }

        Assert::fail('Unknown expectation property: '.$name);
    }

    public function not(): self
    {
        return new self($this->value, ! $this->negated);
    }

    public function and(mixed $value): self
    {
        return new self($value);
    }

<<<<<<< HEAD
    public function toBe(mixed $expected, string $message = ''): self
    {
        $this->negated
            ? Assert::assertNotSame($expected, $this->value, $message)
            : Assert::assertSame($expected, $this->value, $message);
=======
    public function toBe(mixed $expected): self
    {
        $this->negated
            ? Assert::assertNotSame($expected, $this->value)
            : Assert::assertSame($expected, $this->value);
<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)

        return $this;
    }

<<<<<<< HEAD
    public function toEqual(mixed $expected, string $message = ''): self
    {
        $this->negated
            ? Assert::assertNotEquals($expected, $this->value, $message)
            : Assert::assertEquals($expected, $this->value, $message);
=======
    public function toEqual(mixed $expected): self
    {
        $this->negated
            ? Assert::assertNotEquals($expected, $this->value)
            : Assert::assertEquals($expected, $this->value);
<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)

        return $this;
    }

<<<<<<< HEAD
    public function toBeTrue(string $message = ''): self
    {
        $this->negated ? Assert::assertNotTrue($this->value, $message) : Assert::assertTrue($this->value, $message);
=======
    public function toBeTrue(): self
    {
        $this->negated ? Assert::assertNotTrue($this->value) : Assert::assertTrue($this->value);
<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)

        return $this;
    }

<<<<<<< HEAD
    public function toBeFalse(string $message = ''): self
    {
        $this->negated ? Assert::assertNotFalse($this->value, $message) : Assert::assertFalse($this->value, $message);
=======
    public function toBeFalse(): self
    {
        $this->negated ? Assert::assertNotFalse($this->value) : Assert::assertFalse($this->value);
<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)

        return $this;
    }

<<<<<<< HEAD
    public function toBeNull(string $message = ''): self
    {
        $this->negated ? Assert::assertNotNull($this->value, $message) : Assert::assertNull($this->value, $message);
=======
    public function toBeNull(): self
    {
        $this->negated ? Assert::assertNotNull($this->value) : Assert::assertNull($this->value);
<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)

        return $this;
    }

    public function toBeArray(): self
    {
        $this->negated ? Assert::assertFalse(is_array($this->value)) : Assert::assertIsArray($this->value);

        return $this;
    }

    public function toBeString(): self
    {
        $this->negated ? Assert::assertFalse(is_string($this->value)) : Assert::assertIsString($this->value);

        return $this;
    }

    public function toBeInt(): self
    {
        $this->negated ? Assert::assertFalse(is_int($this->value)) : Assert::assertIsInt($this->value);

        return $this;
    }

    public function toBeFloat(): self
    {
        $this->negated ? Assert::assertFalse(is_float($this->value)) : Assert::assertIsFloat($this->value);

        return $this;
    }

    public function toBeBool(): self
    {
        $this->negated ? Assert::assertFalse(is_bool($this->value)) : Assert::assertIsBool($this->value);

        return $this;
    }

    public function toBeObject(): self
    {
        $this->negated ? Assert::assertFalse(is_object($this->value)) : Assert::assertIsObject($this->value);

        return $this;
    }

    public function toBeEmpty(string $message = ''): self
    {
        if ($this->negated) {
            Assert::assertNotEmpty($this->value, $message);
        } else {
            Assert::assertEmpty($this->value, $message);
        }

        return $this;
    }

    /**
<<<<<<< .merge_file_pprJJz
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> .merge_file_TlRRvZ
     * @param  class-string  $expectedClass
     */
<<<<<<< HEAD
    public function toBeInstanceOf(string $expectedClass, string $message = ''): self
    {
        $this->negated
            ? Assert::assertNotInstanceOf($expectedClass, $this->value, $message)
            : Assert::assertInstanceOf($expectedClass, $this->value, $message);
=======
<<<<<<< HEAD
     * @param class-string $expectedClass
     */
=======
>>>>>>> da9ae01a0 (.)
    public function toBeInstanceOf(string $expectedClass): self
    {
        $this->negated
            ? Assert::assertNotInstanceOf($expectedClass, $this->value)
            : Assert::assertInstanceOf($expectedClass, $this->value);
<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)

        return $this;
    }

<<<<<<< HEAD
    public function toHaveCount(int $count, string $message = ''): self
    {
        if ($this->negated) {
            Assert::assertNotCount($count, $this->normaliseCountable($this->value), $message);
=======
    public function toHaveCount(int $count): self
    {
        if ($this->negated) {
            Assert::assertNotCount($count, $this->normaliseCountable($this->value));
<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)

            return $this;
        }

<<<<<<< HEAD
        Assert::assertCount($count, $this->normaliseCountable($this->value), $message);
=======
        Assert::assertCount($count, $this->normaliseCountable($this->value));
<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)

        return $this;
    }

    public function toContain(mixed ...$needles): self
    {
        foreach ($needles as $needle) {
            if (is_string($this->value)) {
                $this->negated
                    ? Assert::assertStringNotContainsString(SafeStringCastAction::cast($needle), $this->value)
                    : Assert::assertStringContainsString(SafeStringCastAction::cast($needle), $this->value);

                continue;
            }

            $haystack = $this->normaliseIterable($this->value);
            $this->negated
                ? Assert::assertNotContains($needle, $haystack)
                : Assert::assertContains($needle, $haystack);
        }

        return $this;
    }

<<<<<<< HEAD
    public function toHaveKey(mixed $key, mixed $value = null, string $message = ''): self
=======
    public function toHaveKey(mixed $key): self
<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
    {
        if (! is_int($key) && ! is_string($key)) {
            Assert::fail('Expected key must be an integer or string.');
        }

        if ($this->value instanceof \ArrayAccess) {
            $exists = $this->value->offsetExists($key);
<<<<<<< HEAD
            $this->negated ? Assert::assertFalse($exists, $message) : Assert::assertTrue($exists, $message);
=======
            $this->negated ? Assert::assertFalse($exists) : Assert::assertTrue($exists);
<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)

            return $this;
        }

        Assert::assertIsArray($this->value);
        $this->negated
<<<<<<< HEAD
            ? Assert::assertArrayNotHasKey($key, $this->value, $message)
            : Assert::assertArrayHasKey($key, $this->value, $message);

        if (func_num_args() === 2 || (func_num_args() === 3 && ! $this->negated)) {
            Assert::assertArrayHasKey($key, (array) $this->value);
            Assert::assertEquals($value, ((array) $this->value)[$key], $message);
        }
=======
            ? Assert::assertArrayNotHasKey($key, $this->value)
            : Assert::assertArrayHasKey($key, $this->value);
<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)

        return $this;
    }

    /**
<<<<<<< .merge_file_pprJJz
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  iterable<array-key>  $keys
=======
     * @param iterable<array-key> $keys
>>>>>>> laraxot/dev
=======
     * @param iterable<array-key> $keys
>>>>>>> 3792da0d (Check & fix styling)
=======
     * @param  iterable<array-key>  $keys
>>>>>>> .merge_file_TlRRvZ
     */
    public function toHaveKeys(iterable $keys): self
    {
        foreach ($keys as $key) {
            $this->toHaveKey($key);
        }

        return $this;
    }

    public function toHaveProperty(string $property, mixed $expectedValue = null): self
    {
        Assert::assertIsObject($this->value);
        $exists = property_exists($this->value, $property) || isset($this->value->{$property});
        $this->negated ? Assert::assertFalse($exists) : Assert::assertTrue($exists);

<<<<<<< .merge_file_pprJJz
<<<<<<< HEAD
<<<<<<< HEAD
        if (func_num_args() === 2 && ! $this->negated) {
=======
        if (2 === func_num_args() && ! $this->negated) {
>>>>>>> laraxot/dev
=======
        if (2 === func_num_args() && ! $this->negated) {
>>>>>>> 3792da0d (Check & fix styling)
=======
        if (func_num_args() === 2 && ! $this->negated) {
>>>>>>> .merge_file_TlRRvZ
            Assert::assertEquals($expectedValue, $this->value->{$property});
        }

        return $this;
    }

    /**
<<<<<<< .merge_file_pprJJz
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  iterable<string>  $properties
=======
     * @param iterable<string> $properties
>>>>>>> laraxot/dev
=======
     * @param iterable<string> $properties
>>>>>>> 3792da0d (Check & fix styling)
=======
     * @param  iterable<string>  $properties
>>>>>>> .merge_file_TlRRvZ
     */
    public function toHaveProperties(iterable $properties): self
    {
        foreach ($properties as $property) {
            $this->toHaveProperty($property);
        }

        return $this;
    }

    public function toMatch(string $pattern): self
    {
        $this->negated
            ? Assert::assertDoesNotMatchRegularExpression($pattern, SafeStringCastAction::cast($this->value))
            : Assert::assertMatchesRegularExpression($pattern, SafeStringCastAction::cast($this->value));

        return $this;
    }

    /**
<<<<<<< .merge_file_pprJJz
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  array<array-key, mixed>  $expectedSubset
=======
     * @param array<array-key, mixed> $expectedSubset
>>>>>>> laraxot/dev
=======
     * @param array<array-key, mixed> $expectedSubset
>>>>>>> 3792da0d (Check & fix styling)
=======
     * @param  array<array-key, mixed>  $expectedSubset
>>>>>>> .merge_file_TlRRvZ
     */
    public function toMatchArray(array $expectedSubset): self
    {
        Assert::assertIsArray($this->value);

        foreach ($expectedSubset as $key => $expectedValue) {
            Assert::assertArrayHasKey($key, $this->value);
            $this->negated
                ? Assert::assertNotEquals($expectedValue, $this->value[$key])
                : Assert::assertEquals($expectedValue, $this->value[$key]);
        }

        return $this;
    }

    public function toBeGreaterThan(mixed $expected): self
    {
        $this->negated
            ? Assert::assertLessThanOrEqual($expected, $this->value)
            : Assert::assertGreaterThan($expected, $this->value);

        return $this;
    }

    public function toBeGreaterThanOrEqual(mixed $expected): self
    {
        $this->negated
            ? Assert::assertLessThan($expected, $this->value)
            : Assert::assertGreaterThanOrEqual($expected, $this->value);

        return $this;
    }

    public function toBeLessThan(mixed $expected): self
    {
        $this->negated
            ? Assert::assertGreaterThanOrEqual($expected, $this->value)
            : Assert::assertLessThan($expected, $this->value);

        return $this;
    }

    public function toBeLessThanOrEqual(mixed $expected): self
    {
        $this->negated
            ? Assert::assertGreaterThan($expected, $this->value)
            : Assert::assertLessThanOrEqual($expected, $this->value);

        return $this;
    }

    public function toBeBetween(float|int $min, float|int $max): self
    {
        if ($this->negated) {
            Assert::assertTrue(
                ! is_numeric($this->value) || $this->value < $min || $this->value > $max,
                'Expected value not to be between '.$min.' and '.$max
            );
        } else {
            Assert::assertGreaterThanOrEqual($min, $this->value);
            Assert::assertLessThanOrEqual($max, $this->value);
        }

        return $this;
    }

    /**
<<<<<<< .merge_file_pprJJz
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  iterable<mixed>  $expectedValues
=======
     * @param iterable<mixed> $expectedValues
>>>>>>> laraxot/dev
=======
     * @param iterable<mixed> $expectedValues
>>>>>>> 3792da0d (Check & fix styling)
=======
     * @param  iterable<mixed>  $expectedValues
>>>>>>> .merge_file_TlRRvZ
     */
    public function toBeIn(iterable $expectedValues): self
    {
        $values = $this->normaliseIterable($expectedValues);
        $this->negated
            ? Assert::assertNotContains($this->value, $values)
            : Assert::assertContains($this->value, $values);

        return $this;
    }

    public function toStartWith(string $prefix): self
    {
<<<<<<< .merge_file_pprJJz
<<<<<<< HEAD
<<<<<<< HEAD
        if ($prefix === '') {
=======
        if ('' === $prefix) {
>>>>>>> laraxot/dev
=======
        if ('' === $prefix) {
>>>>>>> 3792da0d (Check & fix styling)
=======
        if ($prefix === '') {
>>>>>>> .merge_file_TlRRvZ
            Assert::fail('Expected a non-empty prefix.');
        }

        $this->negated
            ? Assert::assertStringStartsNotWith($prefix, SafeStringCastAction::cast($this->value))
            : Assert::assertStringStartsWith($prefix, SafeStringCastAction::cast($this->value));

        return $this;
    }

    public function toEndWith(string $suffix): self
    {
<<<<<<< .merge_file_pprJJz
<<<<<<< HEAD
<<<<<<< HEAD
        if ($suffix === '') {
=======
        if ('' === $suffix) {
>>>>>>> laraxot/dev
=======
        if ('' === $suffix) {
>>>>>>> 3792da0d (Check & fix styling)
=======
        if ($suffix === '') {
>>>>>>> .merge_file_TlRRvZ
            Assert::fail('Expected a non-empty suffix.');
        }

        $this->negated
            ? Assert::assertStringEndsNotWith($suffix, SafeStringCastAction::cast($this->value))
            : Assert::assertStringEndsWith($suffix, SafeStringCastAction::cast($this->value));

        return $this;
    }

    public function toBeFile(): self
    {
        Assert::assertIsString($this->value);
        $this->negated ? Assert::assertFileDoesNotExist($this->value) : Assert::assertFileExists($this->value);

        if (! $this->negated) {
            Assert::assertTrue(is_file($this->value));
        }

        return $this;
    }

    public function toBeDirectory(): self
    {
        Assert::assertIsString($this->value);
        $this->negated ? Assert::assertDirectoryDoesNotExist($this->value) : Assert::assertDirectoryExists($this->value);

        return $this;
    }

    public function toThrow(mixed ...$constraints): self
    {
        Assert::assertIsCallable($this->value);

        if ($this->negated) {
            PestAssert::doesNotThrow($this->value);

            return $this;
        }

        PestAssert::throws($this->value, ...$constraints);

        return $this;
    }

    public function throws(mixed ...$constraints): self
    {
        return $this->toThrow(...$constraints);
    }

    /**
     * @return array<array-key, mixed>|\Countable
     */
    private function normaliseCountable(mixed $value): array|\Countable
    {
        if ($value instanceof \Countable) {
            return $value;
        }

        return $this->normaliseIterable($value);
    }

    /**
     * @return array<array-key, mixed>
     */
    private function normaliseIterable(mixed $value): array
    {
        if ($value instanceof \Traversable) {
            return iterator_to_array($value);
        }

        Assert::assertIsArray($value);

        return $value;
    }
}
