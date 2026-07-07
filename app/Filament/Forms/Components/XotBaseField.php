<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Forms\Components;

use Filament\Forms\Components\Field;
use Modules\Xot\Actions\View\GetViewByClassAction;

/**
 * Base class for form components.
 *
 * @method static static make(string $name) Create a new instance of the component
 */
abstract class XotBaseField extends Field
{
}
