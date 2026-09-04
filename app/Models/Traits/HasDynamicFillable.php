<?php

declare(strict_types=1);

namespace Modules\Xot\Models\Traits;

use BackedEnum;
use UnitEnum;

/**
 * Aggiunge al fillable i value/name di enum dichiarati dal modello consumatore.
 *
 * Override `getDynamicFillableEnums()` nel modello (vedi Client).
 *
 * @phpstan-ignore trait.unused
 */
trait HasDynamicFillable
{
    /**
     * @return list<string>
     */
    public function getFillable(): array
    {
        $fillable = array_values(parent::getFillable());

        foreach ($this->getDynamicFillableEnums() as $enumClass) {
            if ($enumClass === '' || ! enum_exists($enumClass)) {
                continue;
            }

            $enumFields = array_map(
                static function (UnitEnum $item): string {
                    if ($item instanceof BackedEnum) {
                        return (string) $item->value;
                    }

                    return $item->name;
                },
                $enumClass::cases(),
            );

            $fillable = array_merge($fillable, array_values($enumFields));
        }

        return array_values(array_unique($fillable));
    }

    /**
     * @return array<int, class-string<UnitEnum>>
     */
    protected function getDynamicFillableEnums(): array
    {
        return [];
    }
}
