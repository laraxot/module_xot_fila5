<?php

declare(strict_types=1);

namespace Tests\Modules\Xot\Fixtures\Enums;

use Modules\Xot\Traits\EnumTrait;

enum EmptyDefinitionsEnum: string
{
    use EnumTrait;

    case ONE = 'one';
}
