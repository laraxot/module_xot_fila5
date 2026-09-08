<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Resources\XotBaseResource\RelationManager;

<<<<<<< HEAD
use Filament\Forms\Components\Component;
use Override;
use Exception;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Modules\Xot\Filament\Resources\XotBaseResource;
=======
use Filament\Resources\RelationManagers\RelationManager as FilamentRelationManager;
use Filament\Support\Components\Component;
use Filament\Tables;
use Illuminate\Support\Str;
use Modules\Xot\Filament\Resources\Schemas\XotBaseResourceForm;
use Modules\Xot\Filament\Resources\XotBaseResource;
use Modules\Xot\Filament\Traits\HasRelationshipModelClass;
>>>>>>> c7fd73eb (.)
use Modules\Xot\Filament\Traits\HasXotTable;
use Webmozart\Assert\Assert;

/**
 * @property class-string<XotBaseResource> $resource
 */
<<<<<<< HEAD
abstract class XotBaseRelationManager extends RelationManager
{
    use HasXotTable;
=======
abstract class XotBaseRelationManager extends FilamentRelationManager
{
    use HasRelationshipModelClass;
    use HasXotTable {
        HasRelationshipModelClass::getModelClass insteadof HasXotTable;
    }
>>>>>>> c7fd73eb (.)

    protected static string $relationship = '';

    /**
     * @var class-string<XotBaseResource>
     */
    protected static string $resource;

    public static function getModuleName(): string
    {
        return Str::between(static::class, 'Modules\\', '\Filament');
    }

    public static function getNavigationLabel(): string
    {
<<<<<<< HEAD
        return static::transFunc(__FUNCTION__);
=======
        return __(static::class.'.navigation.label');
>>>>>>> c7fd73eb (.)
    }

    public static function getNavigationGroup(): string
    {
<<<<<<< HEAD
        return static::transFunc(__FUNCTION__);
    }

    protected static function getPluralModelLabel(): string
    {
        return static::transFunc(__FUNCTION__);
    }

    final 

=======
        return __(static::class.'.navigation.group');
    }

    // final public function form(Schema $schema): Schema
    // {
    //     return $schema->components($this->getFormSchema());
    // }
>>>>>>> c7fd73eb (.)
    /**
     * Get form schema.
     *
     * @return array<string|int, Component>
     */
<<<<<<< HEAD
    public function getFormSchema(): array
    {
        return $this->getResource()::getFormSchema();
=======
    final public function getFormSchema(): array
    {
        $class = $this->getResource()::getFormClass();
        $instance = app($class);
        Assert::isInstanceOf($instance, XotBaseResourceForm::class);

        return $instance->getFormSchema();
>>>>>>> c7fd73eb (.)
    }

    /**
     * Get table columns.
     *
     * @return array<string, Tables\Columns\Column>
     */
<<<<<<< HEAD
    #[Override]
=======
    #[\Override]
>>>>>>> c7fd73eb (.)
    public function getTableColumns(): array
    {
        return [];

<<<<<<< HEAD
        //return $this->getResource()::getTableColumns();
=======
        // return $this->getResource()::getTableColumns();
    }

    protected static function getPluralModelLabel(): string
    {
        return __(static::class.'.plural_model_label');
>>>>>>> c7fd73eb (.)
    }

    // public function table(Table $table): Table
    // {
    //     /** @var class-string<Model> $resource */
    //     $resource = $this->getResource();
    //     Assert::classExists($resource);
    //     if (method_exists($resource, 'getTableColumns')) {
    //         /** @var array<string, Tables\Columns\Column> $columns */
    //         $columns = $resource::getTableColumns();
    //         return $table->columns($columns);
    //     }
    //     return $table->columns($this->getTableColumns());
    // }
    // /**
    //  * Get table columns.
    //  *
    //  * @return array<string, Tables\Columns\Column>
    //  */
    // protected function getTableColumns(): array
    // {
    //     return [];
    // }
    /**
     * Get the resource class.
     *
     * @return class-string<XotBaseResource>
     */
    protected function getResource(): string
    {
<<<<<<< HEAD
        // Get the resource class via parent method first
        try {
            // @phpstan-ignore staticMethod.notFound
            $parentResource = parent::getResource();
            if (is_subclass_of($parentResource, XotBaseResource::class)) {
                /** @var class-string<XotBaseResource> $parentResource */
                return $parentResource;
            }
        } catch (Exception $e) {
            // Fallback if parent method fails
        }

        // Fallback: derive the resource class name from the relation manager name
        $class = get_class($this);
        $resource_name = Str::of(class_basename($this))
=======
        // Use static property if available
        if (isset(static::$resource) && is_string(static::$resource)) {
            if (is_subclass_of(static::$resource, XotBaseResource::class)) {
                /* @var class-string<XotBaseResource> */
                return static::$resource;
            }
        }

        // Fallback: derive the resource class name from the relation manager name
        $class = static::class;
        $resourceName = Str::of(class_basename($this))
>>>>>>> c7fd73eb (.)
            ->beforeLast('RelationManager')
            ->singular()
            ->append('Resource')
            ->toString();
        $ns = Str::of($class)
            ->before('Resources\\')
            ->append('Resources\\')
            ->toString();
<<<<<<< HEAD
        $resourceClass = $ns . '\\' . $resource_name;

        if (!class_exists($resourceClass)) {
            throw new Exception("Cannot find resource class {$resourceClass}");
        }

        if (!is_subclass_of($resourceClass, XotBaseResource::class)) {
            throw new Exception("{$resourceClass} must extend XotBaseResource");
        }

=======
        $resourceClass = $ns.$resourceName;

        if (! class_exists($resourceClass)) {
            throw new \Exception("Cannot find resource class {$resourceClass}");
        }

        if (! is_subclass_of($resourceClass, XotBaseResource::class)) {
            throw new \Exception("{$resourceClass} must extend XotBaseResource");
        }

        /* @var class-string<XotBaseResource> $resourceClass */
>>>>>>> c7fd73eb (.)
        return $resourceClass;
    }
}
