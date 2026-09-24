<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Support;

/**
 * PHPStan bridge for Pest `uses(...)->group()` / `->beforeEach()` chaining.
 */
final class PestUsesChain
{
    public function group(string ...$groups): void
    {
    }

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

    public function skip(mixed ...$arguments): self
    {
        return $this;
    }
}
