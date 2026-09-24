<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Widgets;

<<<<<<< HEAD
/**
 * Widget di test per verificare la registrazione Livewire.
 */
class TestWidget extends XotBaseWidget
{
    /** @var view-string */
<<<<<<< .merge_file_ISz09a
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
>>>>>>> 8d801bbe (Check & fix styling)
    protected string $view = 'xot::filament.widgets.test';
=======
    /** @var view-string */
    protected string $view;
>>>>>>> .merge_file_34yvo9

    protected int|string|array $columnSpan = 'full';

    /**
     * Determina se il widget deve essere visibile.
     */
    public static function canView(): bool
    {
        return true;
    }
}
