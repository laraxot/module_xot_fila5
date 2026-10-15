<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Unit\Exports;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

final class ExporterEagerLoadModelStub extends Model
{
    protected $table = 'test_models';

    /**
     * @return Builder<static>
     */
    public function newQuery(): Builder
    {
        /** @var Builder<static> $query */
        $query = parent::newQuery();

        return $query;
    }

    /**
     * @return HasMany<ExporterEagerLoadModelStub, ExporterEagerLoadModelStub>
     */
    public function ratings(): HasMany
    {
        /** @var HasMany<ExporterEagerLoadModelStub, ExporterEagerLoadModelStub> $relation */
        $relation = $this->hasMany(self::class);

        return $relation;
    }

    /**
     * @return MorphMany<ExporterEagerLoadModelStub, ExporterEagerLoadModelStub>
     */
    public function ratingMorphs(): MorphMany
    {
        /** @var MorphMany<ExporterEagerLoadModelStub, ExporterEagerLoadModelStub> $relation */
        $relation = $this->morphMany(self::class, 'rating');

        return $relation;
    }
}
