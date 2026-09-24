<?php

declare(strict_types=1);
<<<<<<< HEAD
<<<<<<< HEAD
use Illuminate\Database\Eloquent\Collection;
=======

>>>>>>> laraxot/dev
=======
use Illuminate\Database\Eloquent\Collection;
>>>>>>> laraxot/dev
use Illuminate\Database\Eloquent\Model;
use Modules\Xot\Relations\CustomRelation;
use Modules\Xot\Tests\TestCase;
use Modules\Xot\Traits\HasCustomRelations;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

it('creates custom relation', function (): void {
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
    $relatedModel = new class extends Model {
        protected $table = 'related';
    };

    $parentModel = new class extends Model {
<<<<<<< HEAD
=======
    $relatedModel = new class extends Model
    {
        protected $table = 'related';
    };

    $parentModel = new class extends Model
    {
>>>>>>> laraxot/dev
=======
>>>>>>> laraxot/dev
        use HasCustomRelations;

        protected $table = 'parent';
    };

<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
    $baseConstraints = fn (CustomRelation $relation) => null;
    /** @param array<int, Model> $models */
    $eagerConstraints = fn (CustomRelation $relation, array $models) => null;
    /**
     * @param array<int, Model> $models
     * @param mixed             $relation relation name/value forwarded by the relation contract
     */
    $eagerMatcher = fn (array $models, Collection $results, mixed $relation) => [];
<<<<<<< HEAD
=======
    $baseConstraints = fn (mixed $relation) => null;
    $eagerConstraints = fn (mixed $relation, mixed $models) => null;
    $eagerMatcher = fn (mixed $models, mixed $results, mixed $relation) => [];
>>>>>>> laraxot/dev
=======
>>>>>>> laraxot/dev

    $relation = $parentModel->customRelation(
        get_class($relatedModel),
        $baseConstraints,
        $eagerConstraints,
        $eagerMatcher
    );

    Assert::assertInstanceOf(CustomRelation::class, $relation);
});
