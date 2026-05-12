<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Resources\Schemas;

use Filament\Forms\Components\Component;
use Filament\Schemas\Components\Wizard\Step;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\Str;

abstract class XotBaseResourceForm
{
    /**
     * @return array<int|string, Component>
     */
    abstract public static function getFormSchema(): array;

    /**
     * Convenzione: `getStepByName('foo')` → invoca `getFooSchema()` come schema dello step.
     * Allineata a {@see \Modules\Xot\Filament\Resources\XotBaseResource::getStepByName()}.
     */
    public static function getStepByName(string $name): Step
    {
        $methodName = Str::of($name)
            ->snake()
            ->studly()
            ->prepend('get')
            ->append('Schema')
            ->toString();

        if (method_exists(static::class, $methodName)) {
            $schemaResult = static::$methodName();
            /** @var array<Htmlable|string|object> $schemaComponents */
            $schemaComponents = \is_array($schemaResult) ? array_values($schemaResult) : [];

            return Step::make($name)->schema($schemaComponents);
        }

        return Step::make($name)->schema([]);
    }
}
