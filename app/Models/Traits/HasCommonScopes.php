<?php

declare(strict_types=1);

namespace Modules\Xot\Models\Traits;

<<<<<<< HEAD
=======
use Carbon\CarbonInterface;
>>>>>>> 930f8146 (Check & fix styling)
use Illuminate\Database\Eloquent\Builder;
<<<<<<< HEAD
use Illuminate\Support\Carbon;
=======
>>>>>>> 3792da0d (Check & fix styling)

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
<<<<<<< HEAD
/** @phpstan-ignore trait.unused */
=======
<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
=======
 *
 * @property bool|null   $is_active
 * @property Carbon|null $published_at
 */
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
trait HasCommonScopes
{
    /**
     * Scope query to only active records.
     *
<<<<<<< HEAD
     * Trovato identico in piu' moduli che condividono questo scope.
=======
     * Found 100% identical in: Activity, Blog, Cms, User, Fixcity modules.
>>>>>>> 930f8146 (Check & fix styling)
     *
     * @param  Builder<static>  $query
<<<<<<< .merge_file_XQJCRG
=======
     * @param Builder<static> $query
     *
>>>>>>> laraxot/dev
=======
     * Found 100% identical in: Activity, Blog, Cms, User, Fixcity modules.
     *
     * @param Builder<static> $query
     *
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_OjJp3a
     * @return Builder<static>
     */
    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope query to only inactive records.
     *
<<<<<<< .merge_file_XQJCRG
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
>>>>>>> 3792da0d (Check & fix styling)
=======
     * @param  Builder<static>  $query
>>>>>>> .merge_file_OjJp3a
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
<<<<<<< .merge_file_XQJCRG
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
>>>>>>> 3792da0d (Check & fix styling)
=======
     * @param  Builder<static>  $query
>>>>>>> .merge_file_OjJp3a
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
>>>>>>> 930f8146 (Check & fix styling)
    }

    /**
     * Scope query to draft (unpublished) records.
     *
     * Records with published_at = null or > now().
     *
<<<<<<< .merge_file_XQJCRG
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
>>>>>>> 3792da0d (Check & fix styling)
=======
     * @param  Builder<static>  $query
>>>>>>> .merge_file_OjJp3a
     * @return Builder<static>
     */
    public function scopeDraft(Builder $query): Builder
    {
<<<<<<< HEAD
        return $query->where(function (Builder $q): void {
=======
        return $query->where(function ($q): void {
<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
            $q->whereNull('published_at')
                ->orWhere('published_at', '>', now());
        });
    }

    /**
     * Scope query to records created after a date.
     *
<<<<<<< .merge_file_XQJCRG
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> .merge_file_OjJp3a
     * @param  Builder<static>  $query
     * @return Builder<static>
     */
    public function scopeCreatedAfter(Builder $query, \DateTimeInterface|string|int $date): Builder
=======
     * @param Builder<static> $query
     *
     * @return Builder<static>
     */
<<<<<<< HEAD
    public function scopeCreatedAfter(Builder $query, mixed $date): Builder
>>>>>>> 3792da0d (Check & fix styling)
=======
<<<<<<< HEAD
    public function scopeCreatedAfter(Builder $query, \DateTimeInterface|string|int $date): Builder
=======
    public function scopeCreatedAfter(Builder $query, mixed $date): Builder
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
    {
        return $query->where('created_at', '>=', $date);
    }

    /**
     * Scope query to records created before a date.
     *
<<<<<<< .merge_file_XQJCRG
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> .merge_file_OjJp3a
     * @param  Builder<static>  $query
     * @return Builder<static>
     */
    public function scopeCreatedBefore(Builder $query, \DateTimeInterface|string|int $date): Builder
=======
     * @param Builder<static> $query
     *
     * @return Builder<static>
     */
<<<<<<< HEAD
    public function scopeCreatedBefore(Builder $query, mixed $date): Builder
>>>>>>> 3792da0d (Check & fix styling)
=======
<<<<<<< HEAD
    public function scopeCreatedBefore(Builder $query, \DateTimeInterface|string|int $date): Builder
=======
    public function scopeCreatedBefore(Builder $query, mixed $date): Builder
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
    {
        return $query->where('created_at', '<=', $date);
    }

    /**
     * Scope query to records updated after a date.
     *
<<<<<<< .merge_file_XQJCRG
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> .merge_file_OjJp3a
     * @param  Builder<static>  $query
     * @return Builder<static>
     */
    public function scopeUpdatedAfter(Builder $query, \DateTimeInterface|string|int $date): Builder
=======
     * @param Builder<static> $query
     *
     * @return Builder<static>
     */
<<<<<<< HEAD
    public function scopeUpdatedAfter(Builder $query, mixed $date): Builder
>>>>>>> 3792da0d (Check & fix styling)
=======
<<<<<<< HEAD
    public function scopeUpdatedAfter(Builder $query, \DateTimeInterface|string|int $date): Builder
=======
    public function scopeUpdatedAfter(Builder $query, mixed $date): Builder
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
    {
        return $query->where('updated_at', '>=', $date);
    }

    /**
     * Scope query to records created by a specific user.
     *
<<<<<<< .merge_file_XQJCRG
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
>>>>>>> 3792da0d (Check & fix styling)
=======
     * @param  Builder<static>  $query
>>>>>>> .merge_file_OjJp3a
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

<<<<<<< HEAD
        if (! $publishedAt instanceof Carbon) {
=======
        if (! $publishedAt instanceof \Illuminate\Support\Carbon) {
>>>>>>> 3792da0d (Check & fix styling)
            return false;
        }

        return $publishedAt->isPast();
=======
        if (! $this->published_at instanceof CarbonInterface) {
            return false;
        }

        return $this->published_at->isPast();
>>>>>>> 930f8146 (Check & fix styling)
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
<<<<<<< HEAD
<<<<<<< .merge_file_XQJCRG
<<<<<<< HEAD
<<<<<<< HEAD
        return $this->getAttribute('is_active') === true;
=======
        return true === $this->getAttribute('is_active');
>>>>>>> laraxot/dev
=======
        return true === $this->getAttribute('is_active');
>>>>>>> 3792da0d (Check & fix styling)
=======
        return $this->getAttribute('is_active') === true;
>>>>>>> .merge_file_OjJp3a
=======
<<<<<<< HEAD
        return true === $this->getAttribute('is_active');
=======
        return isset($this->is_active) && true === $this->is_active;
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
    }
}
