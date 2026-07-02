<?php

declare(strict_types=1);

namespace Modules\Xot\Support;

use Illuminate\Database\Eloquent\Model;
use Webmozart\Assert\Assert;

/**
 * Duck-typing helper for MorphToOne relations (Fidum package when installed).
 */
final class MorphToOneRelationSupport
{
    /**
     * @param array<string, mixed> $attributes
     */
    public static function create(object $relation, array $attributes): Model
    {
        self::assertHasCreate($relation);

        $created = $relation->create($attributes); // @phpstan-ignore method.notFound
        Assert::isInstanceOf($created, Model::class);

        return $created;
    }

    private static function assertHasCreate(object $relation): void
    {
        Assert::methodExists($relation, 'create');
    }
}
