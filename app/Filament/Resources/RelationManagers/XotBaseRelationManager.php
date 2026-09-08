<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Resources\RelationManagers;

<<<<<<< HEAD
use Filament\Actions\AttachAction;
=======
use Filament\Actions\Action;
use Filament\Actions\AttachAction;
use Filament\Actions\BulkAction;
>>>>>>> c7fd73eb (.)
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\DetachAction;
use Filament\Actions\DetachBulkAction;
use Filament\Actions\EditAction;
use Filament\Resources\RelationManagers\RelationManager as FilamentRelationManager;
<<<<<<< HEAD
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Modules\Xot\Filament\Resources\XotBaseResource;
use Modules\Xot\Filament\Traits\HasXotTable;
use Override;
=======
use Filament\Schemas\Components\Component;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\Column;
use Filament\Tables\Columns\Layout\Component as LayoutComponent;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Modules\Xot\Actions\Cast\SafeStringCastAction;
use Modules\Xot\Filament\Resources\Schemas\XotBaseResourceForm;
use Modules\Xot\Filament\Resources\XotBaseResource;
use Modules\Xot\Filament\Traits\HasRelationshipModelClass;
use Modules\Xot\Filament\Traits\HasXotTable;
use stdClass;
>>>>>>> c7fd73eb (.)
use Webmozart\Assert\Assert;

/**
 * @property class-string<Model> $resource
 */
abstract class XotBaseRelationManager extends FilamentRelationManager
{
<<<<<<< HEAD
    use HasXotTable;
=======
    use HasRelationshipModelClass;
    use HasXotTable {
        HasRelationshipModelClass::getModelClass insteadof HasXotTable;
    }

    /**
     * @param  array<string, bool|float|int|string|null>  $params
     */
    public static function trans(string $key, bool $exceptionIfNotExist = false, array $params = []): string
    {
        return static::$resource::trans($key, $exceptionIfNotExist, $params);
    }
>>>>>>> c7fd73eb (.)

    protected static string $relationship = '';

    /** @var class-string<XotBaseResource> */
<<<<<<< HEAD
    protected static string $resourceClass;
=======
    protected static string $resource;
>>>>>>> c7fd73eb (.)

    /**
     * Resolve the parent Resource class for this RelationManager.
     *
     * @return class-string<XotBaseResource>
     */
    public function getResource(): string
    {
<<<<<<< HEAD
        if (isset(static::$resourceClass) && is_string(static::$resourceClass) && static::$resourceClass !== '') {
            return static::$resourceClass;
=======
        if (isset(static::$resource) && \is_string(static::$resource) && static::$resource !== '') {
            return static::$resource;
>>>>>>> c7fd73eb (.)
        }

        $relationManagerClass = static::class;

        // Expect namespace like: Modules\\{Module}\\Filament\\Resources\\{ResourceName}\\RelationManagers\\{This}
        $parts = explode('\\', $relationManagerClass);
        $resourcesIndex = array_search('Resources', $parts, true);

        Assert::integer($resourcesIndex, 'Unable to locate Resources segment in class: '.$relationManagerClass);

        // Build resource class parts: Modules\\{Module}\\Filament\\Resources\\{ResourceName}
<<<<<<< HEAD
        $resourceClassParts = array_slice($parts, 0, $resourcesIndex + 2);
        $resourceClass = implode('\\', $resourceClassParts);

        Assert::true(class_exists($resourceClass), 'Resource class does not exist: '.$resourceClass);
        Assert::true(is_subclass_of($resourceClass, XotBaseResource::class), 'Resource must extend XotBaseResource: '.$resourceClass);

        /* @var class-string<XotBaseResource> $resourceClass */
        static::$resourceClass = $resourceClass;

        return static::$resourceClass;
=======
        $resourceParts = \array_slice($parts, 0, $resourcesIndex + 2);
        $resource = implode('\\', $resourceParts);

        Assert::true(class_exists($resource), 'Resource class does not exist: '.$resource);
        Assert::true(is_subclass_of($resource, XotBaseResource::class), 'Resource must extend XotBaseResource: '.$resource);

        /* @var class-string<XotBaseResource> $resource */
        static::$resource = $resource;

        return static::$resource;
>>>>>>> c7fd73eb (.)
    }

    public static function getModuleName(): string
    {
        $class = static::class;
        $arr = explode('\\', $class);
<<<<<<< HEAD
        $module_name = $arr[1];

        return $module_name;
    }

    public function getFormSchema(): array
    {
        return $this->getResource()::getFormSchema();
    }

    // *
    #[Override]
    public function getTableColumns(): array
=======

        return $arr[1];
    }

    final public function form(Schema $schema): Schema
    {
        /** @var array<string, Component> $formSchema */
        $formSchema = $this->getFormSchema();

        // Cast to Htmlable|string to match Schema::components() signature
        // Component implements Htmlable, so this is type-safe
        /** @var array<string, Htmlable|string> $components */
        $components = $formSchema;

        return $schema->components($components);
    }

    /** @return array<int|string, Component> */
    public function getFormSchema(): array
    {
        $class = $this->getResource()::getFormClass();
        $instance = app($class);
        Assert::isInstanceOf($instance, XotBaseResourceForm::class);

        /** @var XotBaseResourceForm $instance */
        return $instance->getFormSchema();
    }

    /**
     * @return array<int|string, Column|LayoutComponent>
     */
    #[\Override]
    protected function getTableColumns(): array
>>>>>>> c7fd73eb (.)
    {
        $index = Arr::get($this->getResource()::getPages(), 'index');
        if (! $index) {
            // throw new \Exception('Index page not found');
            return [];
        }
<<<<<<< HEAD
        /** @phpstan-ignore method.nonObject */
        $index_page = $index->getPage();

=======

        if (! \is_object($index) || ! method_exists($index, 'getPage')) {
            return [];
        }

        $index_page = $index->getPage();

        if (! \is_object($index_page) && ! \is_string($index_page)) {
            return [];
        }

>>>>>>> c7fd73eb (.)
        if (! method_exists($index_page, 'getTableColumns')) {
            // throw new \Exception('method  getTableColumns on '.print_r($index_page,true).' not found');
            return [];
        }
<<<<<<< HEAD
        /** @phpstan-ignore argument.type */
        $res = app($index_page)->getTableColumns();

        // Ensure string keys always
        $assoc = [];
        foreach ($res as $key => $column) {
            if (is_string($key)) {
=======

        $instance = \is_string($index_page) ? app($index_page) : $index_page;
        if (! \is_object($instance) || ! method_exists($instance, 'getTableColumns')) {
            return [];
        }

        $res = $instance->getTableColumns();

        if (! \is_array($res)) {
            return [];
        }

        // Ensure string keys always
        /** @var array<string, Column|LayoutComponent> $assoc */
        $assoc = [];
        foreach ($res as $key => $column) {
            // Verifica che $column sia del tipo corretto
            if (! ($column instanceof Column) && ! ($column instanceof LayoutComponent)) {
                continue;
            }

            if (\is_string($key)) {
>>>>>>> c7fd73eb (.)
                $assoc[$key] = $column;

                continue;
            }

<<<<<<< HEAD
            $name = method_exists($column, 'getName') ? $column->getName() : (string) spl_object_hash($column);
            $assoc[$name] = $column;
=======
            // $column è già verificato come instance di Column|LayoutComponent sopra
            $name = method_exists($column, 'getName') ? $column->getName() : (string) spl_object_hash($column);
            $nameStr = SafeStringCastAction::cast($name);
            $assoc[$nameStr] = $column;
>>>>>>> c7fd73eb (.)
        }

        return $assoc;
    }

    // */
<<<<<<< HEAD
    public function getTableActions(): array
    {
        $actions = [];
        $resource = static::class;
        if (method_exists($resource, 'canEdit')) {
            $actions['edit'] = EditAction::make()
                ->iconButton()
                ->visible(fn (?Model $record): bool => $resource::canEdit($record));
        }
        if (method_exists($resource, 'canDetach')) {
            $actions['detach'] = DetachAction::make()
                ->iconButton()
                ->visible(fn (?Model $record): bool => $resource::canDetach($record));
        }
=======
    /**
     * Get table actions.
     *
     * CRITICO: Deve essere PUBLIC perché Filament\Tables\Concerns\InteractsWithTable
     * richiede che questo metodo sia pubblico.
     *
     * @return array<string, Action>
     */
    public function getTableActions(): array
    {
        $actions = [];
        $me = $this;
        $actions['edit'] = EditAction::make()
            ->iconButton()
            ->visible(static function (?Model $record) use ($me): bool {
                if ($record === null) {
                    return false;
                }

                return $me->canEdit($record);
            });

        $actions['detach'] = DetachAction::make()
            ->iconButton()
            ->visible(static function (?Model $record) use ($me): bool {
                if ($record === null) {
                    return false;
                }

                return $me->canDetach($record);
            });
>>>>>>> c7fd73eb (.)

        return $actions;
    }

<<<<<<< HEAD
    public function getTableBulkActions(): array
    {
        $actions = [];
        $resource = static::class;
        if (method_exists($resource, 'canDeleteBulk')) {
            $actions['delete_bulk'] = DeleteBulkAction::make()
                ->iconButton()
                ->visible(fn (?Model $record): bool => $resource::canDeleteBulk($record));
        }
        if (method_exists($resource, 'canDetachBulk')) {
            $actions['detach_bulk'] = DetachBulkAction::make()
                ->iconButton()
                ->visible(fn (?Model $record): bool => $resource::canDetachBulk($record));
        }
=======
    /**
     * Get table bulk actions.
     *
     * CRITICO: Deve essere PUBLIC per Filament InteractsWithTable.
     *
     * @return array<string, BulkAction>
     */
    public function getTableBulkActions(): array
    {
        $actions = [];

        $actions['delete_bulk'] = DeleteBulkAction::make()
            ->iconButton()
            ->visible(fn (?Model $record): bool => $this->canDeleteBulk($record));

        $actions['detach_bulk'] = DetachBulkAction::make()
            ->iconButton()
            ->visible(fn (?Model $record): bool => $this->canDetachBulk($record));
>>>>>>> c7fd73eb (.)

        return $actions;
    }

<<<<<<< HEAD
    public function getTableHeaderActions(): array
    {
        $actions = [];
        $resource = static::class;
        // @phpstan-ignore function.alreadyNarrowedType
        if (method_exists($resource, 'canAttach')) {
            $actions['attach'] = AttachAction::make()
                ->icon('heroicon-o-link')
                ->iconButton()
                ->tooltip(__('user::actions.attach.label'))
                ->visible(fn (?Model $_record): bool => $resource::canAttach());
        }
        // @phpstan-ignore function.alreadyNarrowedType
        if (method_exists($resource, 'canCreate')) {
            $actions['create'] = CreateAction::make()
                ->icon('heroicon-o-plus')
                ->iconButton()
                ->tooltip(static::trans('actions.create.tooltip'))
                ->visible(fn (?Model $_record): bool => $resource::canCreate());
        }
=======
    /**
     * Get table header actions.
     *
     * CRITICO: Deve essere PUBLIC per Filament InteractsWithTable.
     *
     * @return array<string, Action>
     */
    public function getTableHeaderActions(): array
    {
        $actions = [];
        $me = $this;
        $actions['attach'] = AttachAction::make()
            ->icon('heroicon-o-link')
            ->iconButton()
            ->tooltip(__('user::actions.attach.label'))
            ->visible(static fn (?Model $_record): bool => $me->canAttach());
        $actions['create'] = CreateAction::make()
            ->icon('heroicon-o-plus')
            ->iconButton()
            ->tooltip(static::trans('actions.create.tooltip'))
            ->visible(static fn (?Model $_record): bool => $me->canCreate());
>>>>>>> c7fd73eb (.)

        return $actions;
    }

    public function getTableFilters(): array
    {
        return [];
    }

    // public function getRelationship(): \Illuminate\Database\Eloquent\Relations\Relation|\Illuminate\Database\Eloquent\Builder
    // {
    //    return parent::getRelationship();
    // }
<<<<<<< HEAD
=======

    /**
     * Determine if the bulk delete action can be performed on the given record.
     */
    public function canDeleteBulk(Model|stdClass|null $record): bool
    {
        if ($record instanceof stdClass) {
            // For stdClass records (lightweight bulk operations), allow by default
            return true;
        }

        return true;
    }

    /**
     * Determine if the bulk detach action can be performed on the given record.
     */
    public function canDetachBulk(Model|stdClass|null $record): bool
    {
        if ($record instanceof stdClass) {
            // For stdClass records (lightweight bulk operations), allow by default
            return true;
        }

        return true;
    }
>>>>>>> c7fd73eb (.)
}
