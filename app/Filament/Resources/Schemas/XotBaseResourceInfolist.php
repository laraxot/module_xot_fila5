<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Resources\Schemas;

<<<<<<< HEAD
use Filament\Schemas\Components\Component;
use Filament\Schemas\Schema;

abstract class XotBaseResourceInfolist
{
    final public static function configure(Schema $schema): Schema
    {
        return $schema->components(static::getInfolistSchema());
    }

    /**
     * @return array<string, Component>
     */
    abstract public static function getInfolistSchema(): array;
=======
use Filament\Schemas\Schema;
use Modules\Xot\Filament\Traits\HasXotInfolist;
use Webmozart\Assert\Assert;

abstract class XotBaseResourceInfolist
{
    use HasXotInfolist;

    public static function configure(Schema $schema): Schema
    {
        if (static::class === self::class) {
            throw new \LogicException('XotBaseResourceInfolist::configure() must be called on a concrete infolist class.');
        }

        $instance = app(static::class);
        Assert::isInstanceOf($instance, self::class);

        return $instance->infolist($schema);
    }

    /**
     * @return array<string, \Filament\Schemas\Components\Component>
     */
    abstract public function getInfolistSchema(): array;
>>>>>>> laraxot/dev
}
