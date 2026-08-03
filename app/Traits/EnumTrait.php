<?php
declare(strict_types=1);

namespace Modules\Xot\Traits;

use Filament\Forms\Components\TextInput;
use Illuminate\Database\Schema\Blueprint;
use Modules\Xot\Database\Migrations\XotBaseMigration;
use Modules\Xot\Filament\Traits\TransTrait;

/**
 * Shared trait for all enums used in the project.
 *
 * @method static list<string> getSearchable()
 * @method static array<string, \Filament\Forms\Components\TextInput> getFormSchema()
 * @method static array<string, callable(\Illuminate\Database\Schema\Blueprint): void> getColumnDefinitions()
 * @method static list<string> getColumnNames()
 * @method static array<string, callable(\Illuminate\Database\Schema\Blueprint): void> getColumnDefinitionMap()
 */
trait EnumTrait
{
    use TransTrait;

    /**
     * Get a translated label for this enum value via transClass().
     *
     * @return string the localized label
     */
    public function getLabel(): string
    {
        return $this->transClass(static::class, 'values.' . $this->value . '.label');
    }

    /**
     * Get the colour associated with this enum value via transClass().
     *
     * @return string the colour code
     */
    public function getColor(): string
    {
        return $this->transClass(static::class, 'values.' . $this->value . '.color');
    }

    /**
     * Get the icon associated with this enum value via transClass().
     *
     * @return string the icon identifier
     */
    public function getIcon(): string
    {
        return $this->transClass(static::class, 'values.' . $this->value . '.icon');
    }

    /**
     * Get the description of this enum value via transClass().
     *
     * @return string the localized description
     */
    public function getDescription(): string
    {
        return $this->transClass(static::class, 'values.' . $this->value . '.description');
    }

    /**
     * Get the tooltip text for this enum value via transClass().
     *
     * @return string the tooltip text
     */
    public function getTooltip(): string
    {
        return $this->transClass(static::class, 'values.' . $this->value . '.tooltip');
    }

    /**
     * Get the helper text for this enum value via transClass().
     *
     * @return string the helper text
     */
    public function getHelperText(): string
    {
        return $this->transClass(static::class, 'values.' . $this->value . '.helper_text');
    }

    /**
     * Get all searchable enum values as a list of strings.
     *
     * @phpstan-return list<string>
     */
    public static function getSearchable(): array
    {
        /** @var list<string> $result */
        $result = [];
        foreach (static::cases() as $item) {
            $result[] = (string) $item->value;
        }

        return $result;
    }

    /**
     * Build a mapping of form components (one per enum case).
     *
     * @phpstan-return array<string, TextInput>
     */
    public static function getFormSchema(): array
    {
        $cases = static::cases();
        /** @var array<string, TextInput> $result */
        $result = [];

        foreach ($cases as $item) {
            /** @var non-empty-string $name */
            $name = (string) $item->value;
            $result[$name] = TextInput::make($name)->prefixIcon($item->getIcon());
        }

        return $result;
    }

    /**
     * Define the database columns that belong to the enum.
     *
     * @phpstan-return array<string, callable(Blueprint): void>
     */
    public static function getColumnDefinitions(): array
    {
        /** @var array<string, callable(Blueprint): void> $result */
        $result = [];

        return $result;
    }

    /**
     * Add all standard contact columns to a migration table.
     */
    public static function columns(Blueprint $table, ?XotBaseMigration $migration = null): void
    {
        foreach (static::getColumnDefinitions() as $name => $definition) {
            if ($migration === null || ! $migration->hasColumn($name)) {
                $definition($table);
            }
        }
    }

    /**
     * Ensure all standard contact columns exist in UPDATE context.
     */
    public static function updateColumns(Blueprint $table, XotBaseMigration $migration): void
    {
        static::columns($table, $migration);
    }

    /**
     * Drop all standard contact columns from a table.
     */
    public static function dropColumns(Blueprint $table): void
    {
        $table->dropColumn(static::getColumnNames());
    }

    /**
     * Get all column names as an array.
     *
     * @phpstan-return list<string>
     */
    public static function getColumnNames(): array
    {
        /** @var list<string> $result */
        $result = array_map(fn ($case): string => (string) $case->value, static::cases());

        return $result;
    }

    /**
     * Internal map of standard column definitions.
     *
     * @phpstan-return array<string, callable(Blueprint): void>
     */
    public static function getColumnDefinitionMap(): array
    {
        /** @var array<string, callable(Blueprint): void> $result */
        $result = [];

        return $result;
    }
}
