<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Resources\Schemas;

use Filament\Forms\Components\Component;

abstract class XotBaseResourceForm
{
    /**
     * @return array<int|string, Component>
     */
    abstract public static function getFormSchema(): array;
}
