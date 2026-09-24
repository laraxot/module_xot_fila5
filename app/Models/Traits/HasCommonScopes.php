<?php

declare(strict_types=1);

namespace Modules\Xot\Models\Traits;

<<<<<<< HEAD
=======
use Carbon\CarbonInterface;
>>>>>>> 8d801bbe (Check & fix styling)
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;

/**
 * Common query scopes for Laraxot models.
 *
 * Implements the strategy documented in METODI_DUPLICATI_ANALISI.md
 * Found 100% identical in 5 models across modules.
 *
 * Add this trait to models that need these scopes.
 *
 * Usage:
 * ```php
 * class MyModel extends BaseModel
 * {
 *     use HasCommonScopes;
 * }
 *
 * // Then use in queries:
 * MyModel::active()->get();
 * MyModel::published()->get();
 * ```
 *
 * @see docs/METODI_DUPLICATI_ANALISI.md - Proposta 4: Model Traits
<<<<<<< HEAD
 */
/** @phpstan-ignore trait.unused */
=======
 *
 * @property bool|null   $is_active
 * @property Carbon|null $published_at
 */
>>>>>>> 8d801bbe (Check & fix styling)
trait HasCommonScopes
{
    /**
     * Scope query to only active records.
     *
<<<<<<< HEAD
     * Trovato identico in piu' moduli che condividono questo scope.
     *
     * @param  Builder<static>  $query
<<<<<<< .merge_file_VA1IgV
=======
     * @param Builder<static> $query
     *
>>>>>>> laraxot/dev
=======
     * Found 100% identical in: Activity, Blog, Cms, User, Fixcity modules.
     *
     * @param Builder<static> $query
     *
>>>>>>> 8d801bbe (Check & fix styling)
=======
>>>>>>> .merge_file_B7Y33R
     * @return Builder<static>
     */
    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope query to only inactive records.
     *
<<<<<<< .merge_file_VA1IgV
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  Builder<static>  $query
=======
     * @param Builder<static> $query
     *
>>>>>>> laraxot/dev
=======
     * @param Builder<static> $query
     *
>>>>>>> 8d801bbe (Check & fix styling)
=======
     * @param  Builder<static>  $query
>>>>>>> .merge_file_B7Y33R
     * @return Builder<static>
     */
    public function scopeInactive(Builder $query): Builder
    {
        return $query->where('is_active', false);
    }

    /**
     * Scope query to published records.
     *
     * Records with published_at <= now().
     *
<<<<<<< .merge_file_VA1IgV
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  Builder<static>  $query
=======
     * @param Builder<static> $query
     *
>>>>>>> laraxot/dev
=======
     * @param Builder<static> $query
     *
>>>>>>> 8d801bbe (Check & fix styling)
=======
     * @param  Builder<static>  $query
>>>>>>> .merge_file_B7Y33R
     * @return Builder<static>
     */
    public function scopePublished(Builder $query): Builder
    {
<<<<<<< HEAD
        return $query->whereNotNull('published_at')
            ->where('published_at', '<=', now());
=======
        $query->whereNotNull('published_at');
        $query->where('published_at', '<=', now());

        return $query;
>>>>>>> 8d801bbe (Check & fix styling)
    }

    /**
     * Scope query to draft (unpublished) records.
     *
     * Records with published_at = null or > now().
     *
<<<<<<< .merge_file_VA1IgV
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  Builder<static>  $query
=======
     * @param Builder<static> $query
     *
>>>>>>> laraxot/dev
=======
     * @param Builder<static> $query
     *
>>>>>>> 8d801bbe (Check & fix styling)
=======
     * @param  Builder<static>  $query
>>>>>>> .merge_file_B7Y33R
     * @return Builder<static>
     */
    public function scopeDraft(Builder $query): Builder
    {
<<<<<<< HEAD
        return $query->where(function (Builder $q): void {
=======
        return $query->where(function ($q): void {
>>>>>>> 8d801bbe (Check & fix styling)
            $q->whereNull('published_at')
                ->orWhere('published_at', '>', now());
        });
    }

    /**
     * Scope query to records created after a date.
     *
<<<<<<< .merge_file_VA1IgV
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> .merge_file_B7Y33R
     * @param  Builder<static>  $query
     * @return Builder<static>
     */
    public function scopeCreatedAfter(Builder $query, \DateTimeInterface|string|int $date): Builder
=======
     * @param Builder<static> $query
     *
     * @return Builder<static>
     */
    public function scopeCreatedAfter(Builder $query, mixed $date): Builder
>>>>>>> 8d801bbe (Check & fix styling)
    {
        return $query->where('created_at', '>=', $date);
    }

    /**
     * Scope query to records created before a date.
     *
<<<<<<< .merge_file_VA1IgV
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> .merge_file_B7Y33R
     * @param  Builder<static>  $query
     * @return Builder<static>
     */
    public function scopeCreatedBefore(Builder $query, \DateTimeInterface|string|int $date): Builder
=======
     * @param Builder<static> $query
     *
     * @return Builder<static>
     */
    public function scopeCreatedBefore(Builder $query, mixed $date): Builder
>>>>>>> 8d801bbe (Check & fix styling)
    {
        return $query->where('created_at', '<=', $date);
    }

    /**
     * Scope query to records updated after a date.
     *
<<<<<<< .merge_file_VA1IgV
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> .merge_file_B7Y33R
     * @param  Builder<static>  $query
     * @return Builder<static>
     */
    public function scopeUpdatedAfter(Builder $query, \DateTimeInterface|string|int $date): Builder
=======
     * @param Builder<static> $query
     *
     * @return Builder<static>
     */
    public function scopeUpdatedAfter(Builder $query, mixed $date): Builder
>>>>>>> 8d801bbe (Check & fix styling)
    {
        return $query->where('updated_at', '>=', $date);
    }

    /**
     * Scope query to records created by a specific user.
     *
<<<<<<< .merge_file_VA1IgV
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  Builder<static>  $query
=======
     * @param Builder<static> $query
     *
>>>>>>> laraxot/dev
=======
     * @param Builder<static> $query
     *
>>>>>>> 8d801bbe (Check & fix styling)
=======
     * @param  Builder<static>  $query
>>>>>>> .merge_file_B7Y33R
     * @return Builder<static>
     */
    public function scopeCreatedBy(Builder $query, string|int $userId): Builder
    {
        return $query->where('created_by', $userId);
    }

    /**
     * Check if the model is published.
     */
    public function isPublished(): bool
    {
<<<<<<< HEAD
        $publishedAt = $this->getAttribute('published_at');

        if (! $publishedAt instanceof Carbon) {
            return false;
        }

        return $publishedAt->isPast();
=======
        if (! $this->published_at instanceof CarbonInterface) {
            return false;
        }

        return $this->published_at->isPast();
>>>>>>> 8d801bbe (Check & fix styling)
    }

    /**
     * Check if the model is draft.
     */
    public function isDraft(): bool
    {
        return ! $this->isPublished();
    }

    /**
     * Check if the model is active.
     */
    public function isActive(): bool
    {
<<<<<<< .merge_file_VA1IgV
<<<<<<< HEAD
<<<<<<< HEAD
        return $this->getAttribute('is_active') === true;
=======
        return true === $this->getAttribute('is_active');
>>>>>>> laraxot/dev
=======
        return isset($this->is_active) && true === $this->is_active;
>>>>>>> 8d801bbe (Check & fix styling)
=======
        return $this->getAttribute('is_active') === true;
>>>>>>> .merge_file_B7Y33R
    }
}
