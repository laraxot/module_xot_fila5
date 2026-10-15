<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Unit\Exports;

<<<<<<< HEAD
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
=======
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Stub minimo per verificare gli eager-load di XotBaseExporter::modifyQuery.
 *
 * @property-read \Illuminate\Database\Eloquent\Collection<int, ExporterEagerLoadModelStub> $ratings
 */
final class ExporterEagerLoadModelStub extends Model
{
    /**
     * @return HasMany<ExporterEagerLoadModelStub, $this>
     */
    public function ratings(): HasMany
    {
        return $this->hasMany(self::class);
    }

    /**
     * @return HasMany<ExporterEagerLoadModelStub, $this>
     */
    public function ratingMorphs(): HasMany
    {
        return $this->hasMany(self::class);
    }
}
>>>>>>> laraxot/dev
