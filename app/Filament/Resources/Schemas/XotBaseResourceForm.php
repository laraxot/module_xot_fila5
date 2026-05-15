<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Resources\Schemas;

use Filament\Schemas\Components\Component;
use Filament\Schemas\Schema;
use Illuminate\Contracts\Support\Htmlable;
use Modules\Xot\Filament\Traits\HasXotWizard;

/**
 * Base class for resource form schemas.
 *
 * Provides:
 * - `configure(Schema $schema)` to apply form components and column count.
 * - `getFormSchemaColumns()` default column count (overrideable).
 * - `getFormSchema()` default empty schema for concrete forms that only expose wizard steps.
 *
 * Steps are supplied via the {@see HasXotWizard} trait using `getSteps()`,
 * which internally calls `getStepByName()` for each step name.
 */
abstract class XotBaseResourceForm
{
    use HasXotWizard;

    /**
     * Configure the form schema.
     *
     * Applies the components defined by {@see static::getFormSchema()}
     * and sets the column count using {@see static::getFormSchemaColumns()}.
     */
    final public static function configure(Schema $schema): Schema
    {
        /** @var array<int, \Closure|Htmlable|string> $formSchema */
        $formSchema = static::getFormSchema();

        return $schema
            ->components($formSchema)
            ->columns(static::getFormSchemaColumns());
    }

    /**
     * Number of columns for the default form layout.
     *
     * Concrete classes may override to change the layout.
     */
    public static function getFormSchemaColumns(): int
    {
        return 1;
    }

    /**
     * Define the form components.
     *
     * @return array<int, \Closure|Htmlable|string> component definitions for the form
     */
    public static function getFormSchema(): array
    {
        return [];
    }
}
