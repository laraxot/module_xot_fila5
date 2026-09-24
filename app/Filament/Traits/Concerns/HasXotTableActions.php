<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Traits\Concerns;

use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
use Filament\Actions\BulkAction;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\DetachAction;
use Filament\Actions\EditAction;
use Filament\Actions\ReplicateAction;
use Filament\Actions\ViewAction;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ListRecords;
use Filament\Tables\Columns\Column;
use Filament\Tables\Columns\ColumnGroup;
use Filament\Tables\Columns\Layout\Component as LayoutComponent;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\BaseFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;
use Modules\Xot\Actions\Cast\SafeStringCastAction;
use Modules\Xot\Actions\GetTransKeyAction;
use Webmozart\Assert\Assert;

trait HasXotTableActions
{
    /**
     * @return array<string|int, BaseFilter|TernaryFilter>
     */
    public function getTableFilters(): array
    {
        return [];
    }

    /**
     * Get table actions.
     *
     * CRITICO: Deve essere public perché viene chiamato da Filament/Livewire dall'esterno.
     * Vedi: Modules/Xot/docs/filament/widget-method-visibility-rules.md
     *
     * @deprecated override the `table()` method to configure the table
     *
     * @return array<int|string, Action|ActionGroup>
     *
     * @phpstan-return array<int|string, Action|ActionGroup>
     */
    public function getTableActions(): array
    {
        if ($this instanceof TableWidget) {
            return [];
        }

        $resource = $this->resolveTableActionResource();
        /** @var array<int|string, Action|ActionGroup> $actions */
        $actions = $this->buildResourceCrudActions($resource);
        $this->appendReplicateAction($actions);
        $this->appendDetachActionIfNeeded($actions);

        return $actions;
    }

    private function resolveTableActionResource(): object
    {
        $resource = $this;
        /* @phpstan-ignore-next-line */
        if ($this instanceof ListRecords) {
            $resourceClass = $this->getResource();
            // @phpstan-ignore-next-line staticMethod.alreadyNarrowedType
            Assert::string($resourceClass);
            $resource = app($resourceClass);
        }

        // @phpstan-ignore-next-line staticMethod.alreadyNarrowedType
        Assert::object($resource);

        return $resource;
    }

    /**
     * @return array<int|string, Action|ActionGroup>
     */
    /**
     * @return array<int|string, Action|ActionGroup>
     */
    private function buildResourceCrudActions(object $resource): array
    {
        $actions = [];

        // @phpstan-ignore-next-line function.alreadyNarrowedType
        if (method_exists($resource, 'canView')) {
            $actions['view'] = ViewAction::make()
                ->iconButton()
                ->visible(static fn (Model $record): bool => (bool) $resource->canView($record));
        }

        // @phpstan-ignore-next-line function.alreadyNarrowedType
        if (method_exists($resource, 'canEdit')) {
            $actions['edit'] = EditAction::make()
                ->iconButton()
                ->visible(static fn (Model $record): bool => (bool) $resource->canEdit($record));
        }

        // @phpstan-ignore-next-line function.alreadyNarrowedType
        if (method_exists($resource, 'canDelete')) {
            $actions['delete'] = DeleteAction::make()
                ->iconButton()
                ->visible(static fn (Model $record): bool => (bool) $resource->canDelete($record));
        }

        return $actions;
    }

    /**
     * @param array<int|string, Action|ActionGroup> $actions
     */
    private function appendReplicateAction(array &$actions): void
    {
        if (! $this->shouldShowReplicateAction()) {
            return;
        }

        $actions['replicate'] = ReplicateAction::make()->iconButton();
    }

    /**
     * @param array<int|string, Action|ActionGroup> $actions
     */
    private function appendDetachActionIfNeeded(array &$actions): void
    {
        // @phpstan-ignore-next-line function.alreadyNarrowedType (needed for contexts where method doesn't exist)
        if (! $this->shouldShowDetachAction() || ! method_exists($this, 'getRelationship')) {
            return;
        }

        $relationship = $this->getRelationship();
        if (! $relationship instanceof BelongsToMany) {
            return;
        }

        $actions['detach'] = DetachAction::make()
            ->iconButton()
            ->tooltip((string) __('user::actions.detach'));
    }

    /**
     * Get table bulk actions.
     *
     * CRITICO: Deve essere public perché viene chiamato da Filament/Livewire dall'esterno.
     * Filament\Tables\Concerns\InteractsWithTable richiede visibilità PUBLIC.
     * Vedi: Modules/Xot/docs/filament/widget-method-visibility-rules.md
     *
     * @return array<int|string, BulkAction>
     *
     * @phpstan-return array<int|string, BulkAction|Action|ActionGroup>
     */
    public function getTableBulkActions(): array
    {
        return [
            'delete' => DeleteBulkAction::make()
                ->label('')
                ->icon('heroicon-o-trash')
                ->color('danger')
                ->requiresConfirmation(),
        ];
    }

    /**
     * Get model class.
     *
     * @throws \Exception Se non viene trovata una classe modello valida
     *
     * @return class-string<Model>
     */
    public function getModelClass(): string
    {
        /* @phpstan-ignore-next-line function.alreadyNarrowedType */
        if (method_exists($this, 'getModel')) {
            $model = $this->getModel();
            Assert::string($model);
            Assert::classExists($model);
            Assert::subclassOf($model, Model::class);

            return $model;
        }

        throw new \RuntimeException('No model found in '.class_basename(self::class).'::'.__FUNCTION__);
    }

    /**
     * Get table search query.
     *
     * CRITICO: Deve essere public per rispettare il contratto ListRecords.
     */
    public function getTableSearch(): ?string
    {
        $search = $this->tableSearch ?? null;

        return null !== $search ? SafeStringCastAction::cast($search) : null;
    }

    /**
     * Get table columns — implement in concrete list/table page classes.
     *
     * @return array<string, Column|ColumnGroup|LayoutComponent>
     *
     * @phpstan-return array<string, Column|ColumnGroup|LayoutComponent>
     */
    abstract protected function getTableColumns(): array;

    /**
     * Get table heading.
     */
    protected function getTableHeading(): ?string
    {
        /** @var string $transKey */
        $transKey = app(GetTransKeyAction::class)->execute(static::class);
        $key = Str::of($transKey)
            ->append('.table.heading')
            ->replace('.cluster.pages.', '.')
            ->toString();

        if (Str::startsWith($key, 'edit_')) {
            $key = Str::after($key, 'edit_');
        }

        if (Str::endsWith($key, '_widget')) {
            $key = Str::beforeLast($key, '_widget');
        }

        $trans = trans($key);

        if (! is_string($trans)) {
            return null;
        }

        return $trans !== $key ? $trans : null;
    }

    /**
     * Get table empty state actions.
     *
     * @return array<int|string, Action>
     *
     * @phpstan-return array<int|string, Action>
     */
    protected function getTableEmptyStateActions(): array
    {
        return [];
    }

    protected function shouldShowAssociateAction(): bool
    {
        return false;
    }

    protected function shouldShowAttachAction(): bool
    {
        // @phpstan-ignore-next-line
        return method_exists($this, 'getRelationship');
    }

    protected function shouldShowDetachAction(): bool
    {
        // @phpstan-ignore-next-line
        return method_exists($this, 'getRelationship');
    }

    protected function shouldShowReplicateAction(): bool
    {
        return static::$canReplicate;
    }

    protected function shouldShowViewAction(): bool
    {
        return static::$canView;
    }

    protected function shouldShowEditAction(): bool
    {
        return static::$canEdit;
    }

    /**
     * Get header actions.
     *
     * @return array<string, Action>
     *
     * @phpstan-return array<string, Action>
     */
    protected function getHeaderActions(): array
    {
        return [
            'create' => CreateAction::make()->icon('heroicon-o-plus'),
        ];
    }

    /**
     * Get table pagination options.
     * Can return bool (true/false) or array of page sizes [10, 25, 50, 100].
     *
     * @return bool|array<int|string>
     *
     * @phpstan-return bool|array<int|string>
     */
    protected function getTablePaginated(): bool|array
    {
        return true;
    }

    /**
     * Get default table sort column.
     */
    protected function getDefaultTableSortColumn(): ?string
    {
        try {
            $modelClass = $this->getModelClass();
            /** @var Model $model */
            $model = app($modelClass);
            Assert::isInstanceOf($model, Model::class);

            return $model->getTable().'.id';
        } catch (\Exception $e) {
            return null;
        }
    }

    /**
     * Get default table sort direction.
     */
    protected function getDefaultTableSortDirection(): ?string
    {
        return 'desc';
    }

    /**
     * Get table polling interval.
     * Returns null to disable polling, or a string like '30s' to enable.
     */
    protected function getTablePollInterval(): ?string
    {
        return null;
    }

    /**
     * Notify that table is missing.
     */
    protected function notifyTableMissing(): void
    {
        $modelClass = $this->getModelClass();
        /** @var Model $model */
        $model = app($modelClass);
        Assert::isInstanceOf($model, Model::class);

        Notification::make()
            ->title((string) __('user::notifications.table_missing.title'))
            ->body((string) __('user::notifications.table_missing.body', [
                'table' => $model->getTable(),
            ]))
            ->persistent()
            ->warning()
            ->send();
    }

    /**
     * Configure empty table.
     */
    protected function configureEmptyTable(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(
                static fn (Builder $query): Builder => $query->whereNull('id')
            )
            ->columns([
                TextColumn::make('message')
                    ->default(__('user::fields.message.default'))
                    ->html(),
            ])
            ->headerActions([])
            ->recordActions([]);
    }

    /**
     * Get searchable columns.
     *
     * @return array<string>
     *
     * @phpstan-return array<string>
     */
    protected function getSearchableColumns(): array
    {
        return ['id', 'name'];
    }

    /**
     * Check if search is enabled.
     */
    protected function hasSearch(): bool
    {
        return true;
    }
}
