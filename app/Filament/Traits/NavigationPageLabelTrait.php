<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Traits;

use Illuminate\Contracts\Support\Htmlable;

<<<<<<< HEAD
/** @phpstan-ignore trait.unused */
=======
<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
trait NavigationPageLabelTrait
{
    use TransTrait;

    public function getModelLabel(): string
    {
        return static::trans('navigation.name');
    }

    public static function getPluralModelLabel(): string
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
