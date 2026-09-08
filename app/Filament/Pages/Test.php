<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Pages;

<<<<<<< HEAD
use Filament\Pages\Page;

class Test extends Page
{
    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-document-text';
=======
class Test extends XotBasePage
{
    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-document-text';
>>>>>>> c7fd73eb (.)

    protected string $view = 'modules.xot.filament.pages.test';
}
