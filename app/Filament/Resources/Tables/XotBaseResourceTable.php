<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Resources\Tables;

abstract class XotBaseResourceTable
{
    abstract public static function getTableColumns(): array;
}
