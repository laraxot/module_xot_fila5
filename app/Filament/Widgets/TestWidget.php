<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Widgets;

<<<<<<< HEAD
/**
 * Widget di test per verificare la registrazione Livewire.
 */
class TestWidget extends XotBaseWidget
{
<<<<<<< HEAD
    /** @var view-string */
=======
<<<<<<< HEAD
    /** @phpstan-ignore property.defaultValue */
>>>>>>> 3792da0d (Check & fix styling)
=======
use Filament\Widgets\Widget;

/**
 * Widget di test per verificare la registrazione Livewire.
 */
class TestWidget extends Widget
{
    /**
     * @phpstan-var view-string
     */
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
    protected string $view = 'xot::filament.widgets.test';

    protected int|string|array $columnSpan = 'full';

    /**
     * Determina se il widget deve essere visibile.
     */
    public static function canView(): bool
    {
        return true;
    }
}
