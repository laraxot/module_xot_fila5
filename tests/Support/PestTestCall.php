<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Support;

final class PestTestCall
{
<<<<<<< .merge_file_DKxMSM
<<<<<<< HEAD
<<<<<<< HEAD
    public function __construct(private readonly ?object $call = null) {}
=======
    public function __construct(private readonly ?object $call = null)
    {
    }
>>>>>>> laraxot/dev
=======
    public function __construct(private readonly ?object $call = null)
    {
    }
>>>>>>> 3792da0d (Check & fix styling)
=======
    public function __construct(private readonly ?object $call = null) {}
>>>>>>> .merge_file_cX4qR5

    public function group(string ...$groups): self
    {
        return $this->forward('group', $groups);
    }

    public function skip(mixed ...$arguments): self
    {
        return $this->forward('skip', $arguments);
    }

    public function todo(mixed ...$arguments): self
    {
        return $this->forward('todo', $arguments);
    }

    public function with(mixed ...$arguments): self
    {
        return $this->forward('with', $arguments);
    }

    public function throws(mixed ...$arguments): self
    {
        return $this->forward('throws', $arguments);
    }

    public function in(string ...$directories): self
    {
        return $this->forward('in', $directories);
    }

    public function uses(string ...$classes): self
    {
        return $this->forward('uses', $classes);
    }

    public function beforeEach(callable $callback): self
    {
        return $this->forward('beforeEach', [$callback]);
    }

    public function afterEach(callable $callback): self
    {
        return $this->forward('afterEach', [$callback]);
    }

    /**
<<<<<<< .merge_file_DKxMSM
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  class-string|string  $abstract
     * @param  (callable(mixed): void)|null  $mock
=======
     * @param class-string|string          $abstract
     * @param (callable(mixed): void)|null $mock
>>>>>>> laraxot/dev
=======
     * @param class-string|string          $abstract
     * @param (callable(mixed): void)|null $mock
>>>>>>> 3792da0d (Check & fix styling)
=======
     * @param  class-string|string  $abstract
     * @param  (callable(mixed): void)|null  $mock
>>>>>>> .merge_file_cX4qR5
     */
    public function mock(string $abstract, ?callable $mock = null): self
    {
        return $this->forward('mock', [$abstract, $mock]);
    }

    /**
<<<<<<< .merge_file_DKxMSM
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  array<array-key, mixed>  $arguments
=======
     * @param array<array-key, mixed> $arguments
>>>>>>> laraxot/dev
=======
     * @param array<array-key, mixed> $arguments
>>>>>>> 3792da0d (Check & fix styling)
=======
     * @param  array<array-key, mixed>  $arguments
>>>>>>> .merge_file_cX4qR5
     */
    private function forward(string $method, array $arguments): self
    {
        $callable = [$this->call, $method];

        if (is_callable($callable)) {
            $callable(...$arguments);
        }

        return $this;
    }
}
