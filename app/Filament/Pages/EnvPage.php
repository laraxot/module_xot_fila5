<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Pages;

<<<<<<< HEAD
use Filament\Pages\Page;
use Modules\Xot\Filament\Traits\NavigationLabelTrait;

class EnvPage extends Page
{
    use NavigationLabelTrait;

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-home';
=======
use Modules\Xot\Filament\Traits\NavigationLabelTrait;

class EnvPage extends XotBasePage
{
    use NavigationLabelTrait;

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-home';
>>>>>>> c7fd73eb (.)

    protected string $view = 'xot::filament.pages.dashboard';
}
