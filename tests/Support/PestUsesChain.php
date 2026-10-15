<?php

declare(strict_types=1);

namespace Tests\Modules\Xot\Support;

/**
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
}
