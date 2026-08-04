<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Schemas\Components;

use Closure;
use Filament\Schemas\Components\Group;
use Illuminate\Contracts\Support\Htmlable;

/**
 * Base class for custom Group components following Laraxot philosophy.
 *
 * In the Laraxot framework, all custom Group components should extend
 * XotBaseGroup instead of directly extending Filament\Schemas\Components\Group.
 * This ensures consistency with the framework's architecture and provides
 * a foundation for common Group functionality across the application.
 */
abstract class XotBaseGroup extends Group
{
    /**
     * Accetta anche una stringa, a differenza di {@see Group::make()} che vuole `Closure|array`.
     *
     * Nel progetto ogni componente si crea con `Componente::make('nome')`: un `XotBaseGroup` che rifiuta la
     * stringa produce `TypeError: Argument #1 ($schema) must be of type Closure|array, string given` a runtime,
     * dove il chiamante non ha modo di sospettarlo. La stringa e' il nome/chiave del componente e non fa parte
     * dello schema, che i componenti concreti costruiscono in `setUp()`.
     *
     * @param  string|Closure|array<array-key, Htmlable|string>|null  $schema
     */
    public static function make($schema = null): static
    {
        if (is_string($schema) || $schema === null) {
            $schema = [];
        }

        /** @var static $static */
        $static = parent::make($schema);

        return $static;
    }

    protected function setUp(): void
    {
        parent::setUp();
        // Common setup for all XotBaseGroup components can be added here.
    }
}
