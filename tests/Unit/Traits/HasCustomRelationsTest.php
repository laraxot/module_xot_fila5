<?php

declare(strict_types=1);
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Modules\Xot\Relations\CustomRelation;
use Modules\Xot\Tests\TestCase;
use Modules\Xot\Traits\HasCustomRelations;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

it('creates custom relation', function (): void {
<<<<<<< HEAD
    $relatedModel = new class extends Model
    {
        protected $table = 'related';
    };

    $parentModel = new class extends Model
    {
=======
    $relatedModel = new class extends Model {
        protected $table = 'related';
    };

    $parentModel = new class extends Model {
>>>>>>> laraxot/dev
        use HasCustomRelations;

        protected $table = 'parent';
    };

    $baseConstraints = fn (CustomRelation $relation) => null;
    /** @param array<int, Model> $models */
    $eagerConstraints = fn (CustomRelation $relation, array $models) => null;
    /**
<<<<<<< HEAD
     * @param  array<int, Model>  $models
     * @param  mixed  $relation  relation name/value forwarded by the relation contract
=======
     * @param array<int, Model> $models
     * @param mixed             $relation relation name/value forwarded by the relation contract
>>>>>>> laraxot/dev
     */
    $eagerMatcher = fn (array $models, Collection $results, mixed $relation) => [];

    $relation = $parentModel->customRelation(
        get_class($relatedModel),
        $baseConstraints,
        $eagerConstraints,
        $eagerMatcher
    );

    Assert::assertInstanceOf(CustomRelation::class, $relation);
});
