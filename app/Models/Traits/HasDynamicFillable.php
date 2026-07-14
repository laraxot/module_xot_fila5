<?php

declare(strict_types=1);

namespace Modules\Xot\Models\Traits;

/**
 * Extends the model's fillable list with the values of one or more backed enums.
 *
 * Consumers declare which enums contribute fillable field names by
 * implementing {@see self::getDynamicFillableEnums()}, returning an array
 * of backed enum class-strings. Each case's scalar value is treated as a
 * column/attribute name and merged into the static `$fillable` array.
 */
trait HasDynamicFillable
{
    /**
     * @return array<int, class-string<\UnitEnum>>
     */
    protected function getDynamicFillableEnums(): array
    {
        return [];
    }

    /**
     * @return array<int, string>
     */
    public function getFillable(): array
    {
        $fillable = parent::getFillable();

        $dynamicFillableEnums = $this->getDynamicFillableEnums();

        foreach ($dynamicFillableEnums as $enumClass) {
            if (! is_string($enumClass) || '' === $enumClass) {
                continue;
            }

            // Basic validation for enum class
            if (! enum_exists($enumClass)) {
                continue; // Skip invalid enum classes
            }

            // Get enum cases' values and merge
            $enumCases = $enumClass::cases();
            $enumFields = array_map(
                static function (\UnitEnum $item): string {
                    if ($item instanceof \BackedEnum) {
                        return (string) $item->value;
                    }

                    return $item->name;
                },
                $enumCases,
            );

            $fillable = array_merge($fillable, array_values($enumFields));
        }

        // Ensure unique values and reset keys for cleanliness
        return array_values(array_unique($fillable));
    }

    /**
     * Models using this trait may override this to list Enum classes whose
     * cases should be merged into `$fillable`.
     *
     * @return list<class-string<\UnitEnum>>
     */
    protected function getDynamicFillableEnums(): array
    {
        return [];
    }
}
