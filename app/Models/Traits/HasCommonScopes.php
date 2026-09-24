<?php

declare(strict_types=1);

namespace Modules\Xot\Models\Traits;

<<<<<<< HEAD
=======
use Carbon\CarbonInterface;
>>>>>>> laraxot/dev
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
>>>>>>> laraxot/dev
trait HasCommonScopes
{
    /**
     * Scope query to only active records.
     *
<<<<<<< HEAD
     * Trovato identico in piu' moduli che condividono questo scope.
     *
     * @param  Builder<static>  $query
=======
     * Found 100% identical in: Activity, Blog, Cms, User, Fixcity modules.
     *
     * @param Builder<static> $query
     *
>>>>>>> laraxot/dev
     * @return Builder<static>
     */
    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope query to only inactive records.
     *
<<<<<<< HEAD
     * @param  Builder<static>  $query
=======
     * @param Builder<static> $query
     *
>>>>>>> laraxot/dev
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
<<<<<<< HEAD
     * @param  Builder<static>  $query
=======
     * @param Builder<static> $query
     *
>>>>>>> laraxot/dev
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
>>>>>>> laraxot/dev
    }

    /**
     * Scope query to draft (unpublished) records.
     *
     * Records with published_at = null or > now().
     *
<<<<<<< HEAD
     * @param  Builder<static>  $query
=======
     * @param Builder<static> $query
     *
>>>>>>> laraxot/dev
     * @return Builder<static>
     */
    public function scopeDraft(Builder $query): Builder
    {
<<<<<<< HEAD
        return $query->where(function (Builder $q): void {
=======
        return $query->where(function ($q): void {
>>>>>>> laraxot/dev
            $q->whereNull('published_at')
                ->orWhere('published_at', '>', now());
        });
    }

    /**
     * Scope query to records created after a date.
     *
<<<<<<< HEAD
     * @param  Builder<static>  $query
=======
     * @param Builder<static> $query
     *
>>>>>>> laraxot/dev
     * @return Builder<static>
     */
    public function scopeCreatedAfter(Builder $query, mixed $date): Builder
    {
        return $query->where('created_at', '>=', $date);
    }

    /**
     * Scope query to records created before a date.
     *
<<<<<<< HEAD
     * @param  Builder<static>  $query
=======
     * @param Builder<static> $query
     *
>>>>>>> laraxot/dev
     * @return Builder<static>
     */
    public function scopeCreatedBefore(Builder $query, mixed $date): Builder
    {
        return $query->where('created_at', '<=', $date);
    }

    /**
     * Scope query to records updated after a date.
     *
<<<<<<< HEAD
     * @param  Builder<static>  $query
=======
     * @param Builder<static> $query
     *
>>>>>>> laraxot/dev
     * @return Builder<static>
     */
    public function scopeUpdatedAfter(Builder $query, mixed $date): Builder
    {
        return $query->where('updated_at', '>=', $date);
    }

    /**
     * Scope query to records created by a specific user.
     *
<<<<<<< HEAD
     * @param  Builder<static>  $query
=======
     * @param Builder<static> $query
     *
>>>>>>> laraxot/dev
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
>>>>>>> laraxot/dev
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
        return $this->getAttribute('is_active') === true;
=======
        return isset($this->is_active) && true === $this->is_active;
>>>>>>> laraxot/dev
    }
}
