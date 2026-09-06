<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Builders;

use Filament\Forms\Components\DatePicker;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\SoftDeletingScope;
<<<<<<< HEAD
use Modules\Xot\Actions\Cast\SafeStringCastAction;
use Modules\Xot\Datas\XotData;
=======
use Modules\User\Models\User;
>>>>>>> 7f6cf6be (.)

use function Safe\strtotime;

/**
 * Filter Builder for common Filament table filters.
 *
 * Provides standardized filter definitions to reduce code duplication
 * across List pages in all modules.
 *
 * Usage:
 *
 * Use this builder from resource table filter methods to compose common
 * Filament filters without duplicating filter callbacks.
 */
class FilterBuilder
{
    /**
     * Active/Inactive ternary filter.
     */
    public static function activeToggle(string $column = 'is_active'): TernaryFilter
    {
        return TernaryFilter::make($column)
            ->label('Status')
            ->placeholder('All')
            ->trueLabel('Active')
            ->falseLabel('Inactive');
    }

    /**
     * Published/Unpublished ternary filter.
     */
    public static function publishedToggle(string $column = 'is_published'): TernaryFilter
    {
        return TernaryFilter::make($column)
            ->label('Published')
            ->placeholder('All')
            ->trueLabel('Published')
            ->falseLabel('Unpublished');
    }

    /**
     * Featured/Not Featured ternary filter.
     */
    public static function featuredToggle(string $column = 'is_featured'): TernaryFilter
    {
        return TernaryFilter::make($column)
            ->label('Featured')
            ->placeholder('All')
            ->trueLabel('Featured')
            ->falseLabel('Not Featured');
    }

    /**
     * Generic boolean ternary filter.
     */
    public static function booleanToggle(
        string $column,
        string $label,
        string $trueLabel = 'Yes',
        string $falseLabel = 'No',
    ): TernaryFilter {
        return TernaryFilter::make($column)
            ->label($label)
            ->placeholder('All')
            ->trueLabel($trueLabel)
            ->falseLabel($falseLabel);
    }

    /**
     * Date range filter.
     */
    public static function dateRange(string $column = 'created_at', string $label = 'Date Range'): Filter
    {
        return Filter::make($column)
            ->schema([
                DatePicker::make('from')
                    ->label('From'),
                DatePicker::make('until')
                    ->label('Until'),
            ])
            ->query(function (Builder $query, array $data) use ($column): Builder {
                return $query
                    ->when(
                        $data['from'] ?? null,
<<<<<<< HEAD
                        fn (Builder $query, mixed $date): Builder => $query->whereDate($column, '>=', SafeStringCastAction::cast($date)),
                    )
                    ->when(
                        $data['until'] ?? null,
                        fn (Builder $query, mixed $date): Builder => $query->whereDate($column, '<=', SafeStringCastAction::cast($date)),
=======
                        fn (Builder $query, mixed $date): Builder => $query->whereDate($column, '>=', is_string($date) ? $date : (string) $date),
                    )
                    ->when(
                        $data['until'] ?? null,
                        fn (Builder $query, mixed $date): Builder => $query->whereDate($column, '<=', is_string($date) ? $date : (string) $date),
>>>>>>> 7f6cf6be (.)
                    );
            })
            ->indicateUsing(function (array $data) use ($label): ?string {
                $from = $data['from'] ?? null;
                $until = $data['until'] ?? null;

                if (! $from && ! $until) {
                    return null;
                }

                if ($from && $until) {
<<<<<<< HEAD
                    $fromStr = SafeStringCastAction::cast($from);
                    $untilStr = SafeStringCastAction::cast($until);
=======
                    $fromStr = is_string($from) ? $from : (string) $from;
                    $untilStr = is_string($until) ? $until : (string) $until;
>>>>>>> 7f6cf6be (.)

                    return $label.': '.date('d/m/Y', strtotime($fromStr)).' - '.date('d/m/Y', strtotime($untilStr));
                }

                if ($from) {
<<<<<<< HEAD
                    $fromStr = SafeStringCastAction::cast($from);
=======
                    $fromStr = is_string($from) ? $from : (string) $from;
>>>>>>> 7f6cf6be (.)

                    return $label.' from: '.date('d/m/Y', strtotime($fromStr));
                }

                if ($until) {
<<<<<<< HEAD
                    $untilStr = SafeStringCastAction::cast($until);
=======
                    $untilStr = is_string($until) ? $until : (string) $until;
>>>>>>> 7f6cf6be (.)

                    return $label.' until: '.date('d/m/Y', strtotime($untilStr));
                }

                return null;
            });
    }

    /**
     * Created at date range filter.
     */
    public static function createdAtRange(): Filter
    {
        return self::dateRange('created_at', 'Created Date');
    }

    /**
     * Updated at date range filter.
     */
    public static function updatedAtRange(): Filter
    {
        return self::dateRange('updated_at', 'Updated Date');
    }

    /**
     * Published at date range filter.
     */
    public static function publishedAtRange(): Filter
    {
        return self::dateRange('published_at', 'Published Date');
    }

    /**
     * Select filter from model.
     *
<<<<<<< HEAD
     * @param  class-string<Model>  $modelClass
=======
     * @param class-string<Model> $modelClass
>>>>>>> 7f6cf6be (.)
     */
    public static function selectFromModel(
        string $name,
        string $modelClass,
        string $labelColumn = 'name',
        string $valueColumn = 'id',
        ?string $relationshipName = null,
    ): SelectFilter {
        /** @var array<int|string, string> $options */
        $options = $modelClass::pluck($labelColumn, $valueColumn)->toArray();

        $filter = SelectFilter::make($name)
            ->options($options);

<<<<<<< HEAD
        if ($relationshipName !== null) {
=======
        if (null !== $relationshipName) {
>>>>>>> 7f6cf6be (.)
            $filter->relationship($relationshipName, $labelColumn);
        }

        return $filter;
    }

    /**
     * Status select filter with common statuses.
     *
<<<<<<< HEAD
     * @param  array<string, string>  $customStatuses
=======
     * @param array<string, string> $customStatuses
>>>>>>> 7f6cf6be (.)
     */
    public static function statusSelect(array $customStatuses = []): SelectFilter
    {
        $defaultStatuses = [
            'open' => 'Open',
            'in_progress' => 'In Progress',
            'resolved' => 'Resolved',
            'closed' => 'Closed',
        ];

        return SelectFilter::make('status')
            ->options(array_merge($defaultStatuses, $customStatuses));
    }

    /**
     * Priority select filter.
     *
<<<<<<< HEAD
     * @param  array<string, string>  $customPriorities
=======
     * @param array<string, string> $customPriorities
>>>>>>> 7f6cf6be (.)
     */
    public static function prioritySelect(array $customPriorities = []): SelectFilter
    {
        $defaultPriorities = [
            'low' => 'Low',
            'medium' => 'Medium',
            'high' => 'High',
            'critical' => 'Critical',
        ];

        return SelectFilter::make('priority')
            ->options(array_merge($defaultPriorities, $customPriorities));
    }

    /**
     * Type select filter.
     *
<<<<<<< HEAD
     * @param  array<string, string>  $types
=======
     * @param array<string, string> $types
>>>>>>> 7f6cf6be (.)
     */
    public static function typeSelect(array $types): SelectFilter
    {
        return SelectFilter::make('type')
            ->options($types);
    }

    /**
     * Category select filter.
     *
<<<<<<< HEAD
     * @param  class-string<Model>  $categoryModel
=======
     * @param class-string<Model> $categoryModel
>>>>>>> 7f6cf6be (.)
     */
    public static function categorySelect(string $categoryModel, string $labelColumn = 'name'): SelectFilter
    {
        return self::selectFromModel('category', $categoryModel, $labelColumn, 'id', 'category');
    }

    /**
     * User/Author select filter.
     *
<<<<<<< HEAD
     * @param  class-string<Model>  $userModel
     */
    /**
     * User/Author select filter.
     *
     * @param  class-string<Model>|null  $userModel
     */
    public static function userSelect(
        string $name = 'user',
        ?string $userModel = null,
        string $labelColumn = 'name',
    ): SelectFilter {
        if (null === $userModel) {
            /** @var class-string<Model> $userModel */
            $userModel = XotData::make()->getUserClass();
        }

        /** @var class-string<Model> $userModel */
=======
     * @param class-string<Model> $userModel
     */
    public static function userSelect(
        string $name = 'user',
        string $userModel = User::class,
        string $labelColumn = 'name',
    ): SelectFilter {
>>>>>>> 7f6cf6be (.)
        return self::selectFromModel($name, $userModel, $labelColumn, 'id', $name);
    }

    /**
     * Trashed filter (for SoftDeletes).
     */
    public static function trashedFilter(): TernaryFilter
    {
        return TernaryFilter::make('trashed')
            ->label('Deleted')
            ->placeholder('Without trashed')
            ->trueLabel('Only trashed')
            ->falseLabel('Without trashed')
            ->queries(
                true: fn (Builder $query): Builder => self::applyTrashedQuery($query, 'only'),
                false: fn (Builder $query): Builder => self::applyTrashedQuery($query, 'without'),
                blank: fn (Builder $query): Builder => self::applyTrashedQuery($query, 'with'),
            );
    }

    /**
<<<<<<< HEAD
     * @param  Builder<Model>  $query
=======
     * @param Builder<Model> $query
>>>>>>> 7f6cf6be (.)
     */
    private static function modelUsesSoftDeletes(Builder $query): bool
    {
        return in_array(SoftDeletes::class, class_uses_recursive($query->getModel()), true);
    }

    /**
<<<<<<< HEAD
     * @param  Builder<Model>  $query
=======
     * @param Builder<Model> $query
     *
>>>>>>> 7f6cf6be (.)
     * @return Builder<Model>
     */
    private static function applyTrashedQuery(Builder $query, string $mode): Builder
    {
        if (! self::modelUsesSoftDeletes($query)) {
            return $query;
        }

        $column = $query->getModel()->qualifyColumn('deleted_at');
        $query = $query->withoutGlobalScope(SoftDeletingScope::class);

        return match ($mode) {
            'only' => $query->whereNotNull($column),
            'without' => $query->whereNull($column),
            default => $query,
        };
    }
}
