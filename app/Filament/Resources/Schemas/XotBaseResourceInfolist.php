<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Resources\Schemas;

use Filament\Schemas\Components\Component;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\Str;

class XotBaseResourceInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components(static::getInfolistSchema());
    }

    /**
     * @return array<int|string, Component|Htmlable|string>
     */
    public static function getInfolistSchema(): array
    {
        return [];
    }

    /**
     * @param array<int|string, Component|Htmlable|string> $schema
     */
    protected static function getTabByName(
        string $name,
        array $schema,
        string|\BackedEnum|Htmlable|\Closure|null $icon = null,
        int $columns = 1,
    ): Tab {
        $moduleLow = Str::of(static::class)->between('Modules\\', '\\Filament')->lower()->toString();
        $group = Str::of(class_basename(static::class))->kebab()->toString();
        $labelKey = $moduleLow.'::'.$group.'.tabs.'.$name.'.label';
        $label = __($labelKey);

        // __() always returns string, so we just use it directly
        $tab = Tab::make(\is_string($label) ? $label : $labelKey)
            ->columns($columns)
            ->schema(array_values($schema));

        if (null !== $icon) {
            $tab->icon($icon);
        }

        return $tab;
    }
}
