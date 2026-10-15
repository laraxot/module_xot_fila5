<?php

declare(strict_types=1);

namespace Tests\Modules\Xot\Fixtures\Traits;

use Modules\Xot\Traits\HasTableFunctionsTrait;

class HasTableFunctionsTraitProbe
{
    use HasTableFunctionsTrait;

    public function exposeResourceSlug(): string
    {
        return $this->getResourceSlug();
    }
}
