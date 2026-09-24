<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Widgets;

/**
 * Widget di test per verificare la registrazione Livewire.
 */
class TestWidget extends XotBaseWidget
{
<<<<<<< HEAD
    /** @var view-string */
=======
    /** @phpstan-ignore property.defaultValue */
>>>>>>> laraxot/dev
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
