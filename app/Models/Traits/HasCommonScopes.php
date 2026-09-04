<?php

declare(strict_types=1);

namespace Modules\Xot\Models\Traits;

use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Builder;

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
 *
 * @phpstan-ignore trait.unused
 */
trait HasCommonScopes
{
    /**
     * Scope query to only active records.
     *
     * Found 100% identical in: Activity, Blog, Cms, User, Fixcity modules.
     *
     * @param  Builder<static>  $query
     * @return Builder<static>
     */
    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope query to only inactive records.
     *
     * @param  Builder<static>  $query
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
     * @param  Builder<static>  $query
     * @return Builder<static>
     */
    public function scopePublished(Builder $query): Builder
    {
        return $query->whereNotNull('published_at')
            ->where('published_at', '<=', now());
    }

    /**
     * Scope query to draft (unpublished) records.
     *
     * Records with published_at = null or > now().
     *
     * @param  Builder<static>  $query
     * @return Builder<static>
     */
    public function scopeDraft(Builder $query): Builder
    {
        return $query->where(static function (Builder $q): void {
            $q->whereNull('published_at')
                ->orWhere('published_at', '>', now());
        });
    }

    /**
     * Scope query to records created after a date.
     *
     * @param  Builder<static>  $query
     * @return Builder<static>
     */
    public function scopeCreatedAfter(Builder $query, Carbon|string|DateTimeInterface $date): Builder
    {
        return $query->where('created_at', '>=', $date);
    }

    /**
     * Scope query to records created before a date.
     *
     * @param  Builder<static>  $query
     * @return Builder<static>
     */
    public function scopeCreatedBefore(Builder $query, Carbon|string|DateTimeInterface $date): Builder
    {
        return $query->where('created_at', '<=', $date);
    }

    /**
     * Scope query to records updated after a date.
     *
     * @param  Builder<static>  $query
     * @return Builder<static>
     */
    public function scopeUpdatedAfter(Builder $query, Carbon|string|DateTimeInterface $date): Builder
    {
        return $query->where('updated_at', '>=', $date);
    }

    /**
     * Scope query to records created by a specific user.
     *
     * @param  Builder<static>  $query
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
        $publishedAt = $this->getAttribute('published_at');
        if ($publishedAt === null) {
            return false;
        }

        if ($publishedAt instanceof Carbon) {
            return $publishedAt->isPast();
        }

        if ($publishedAt instanceof DateTimeInterface) {
            return Carbon::instance(\DateTimeImmutable::createFromInterface($publishedAt))->isPast();
        }

        if (is_string($publishedAt) || is_numeric($publishedAt)) {
            return Carbon::parse((string) $publishedAt)->isPast();
        }

        return false;
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
        return $this->getAttribute('is_active') === true;
    }
}
