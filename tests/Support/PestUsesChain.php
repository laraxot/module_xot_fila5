<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Support;

/**
<<<<<<< HEAD
=======
 * PHPStan bridge for Pest `uses(...)->group()` / `->beforeEach()` chaining.
 */
final class PestUsesChain
{
    public function group(string ...$groups): void
    {
    }

>>>>>>> laraxot/dev
 * PHPStan bridge for Pest `uses(...)->beforeEach()` chaining.
 */
final class PestUsesChain
{
    public function beforeEach(\Closure $closure): self
    {
        return $this;
    }

    public function afterEach(\Closure $closure): self
    {
        return $this;
    }

    public function in(string ...$paths): self
    {
        return $this;
    }
<<<<<<< HEAD
=======

    public function skip(mixed ...$arguments): self
    {
        return $this;
    }
>>>>>>> laraxot/dev
}
