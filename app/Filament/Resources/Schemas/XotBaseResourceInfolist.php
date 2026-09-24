<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Resources\Schemas;

<<<<<<< HEAD
use Filament\Schemas\Components\Component;
=======
>>>>>>> laraxot/dev
use Filament\Schemas\Schema;
use Modules\Xot\Filament\Traits\HasXotInfolist;
use Webmozart\Assert\Assert;

abstract class XotBaseResourceInfolist
{
    use HasXotInfolist;

    public static function configure(Schema $schema): Schema
    {
<<<<<<< HEAD
        if (self::class === static::class) {
=======
        if (static::class === self::class) {
>>>>>>> laraxot/dev
            throw new \LogicException('XotBaseResourceInfolist::configure() must be called on a concrete infolist class.');
        }

        $instance = app(static::class);
        Assert::isInstanceOf($instance, self::class);

        return $instance->infolist($schema);
    }

    /**
<<<<<<< HEAD
     * @return array<string, Component>
=======
     * @return array<string, \Filament\Schemas\Components\Component>
>>>>>>> laraxot/dev
     */
    abstract public function getInfolistSchema(): array;
}
