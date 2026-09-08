<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Traits;

use Illuminate\Contracts\Support\Htmlable;

<<<<<<< HEAD
=======
/** @phpstan-ignore trait.unused */
>>>>>>> c7fd73eb (.)
trait NavigationPageLabelTrait
{
    use TransTrait;

    public function getModelLabel(): string
    {
        return static::trans('navigation.name');
    }

<<<<<<< HEAD
    public function getPluralModelLabel(): string
=======
    public static function getPluralModelLabel(): string
>>>>>>> c7fd73eb (.)
    {
        return static::trans('navigation.plural');
    }

    public function getTitle(): string|Htmlable
    {
        return static::trans('title');
    }

    public function getHeading(): string|Htmlable
    {
        return static::trans('heading');
    }

    public function getSubHeading(): string|Htmlable
    {
        return static::trans('sub_heading');
    }
}
