<?php

declare(strict_types=1);

use Illuminate\Database\Eloquent\Model;
use Modules\Xot\Relations\CustomRelation;
use Modules\Xot\Tests\TestCase;
use Modules\Xot\Traits\HasCustomRelations;
use PHPUnit\Framework\Assert;

<<<<<<< HEAD
uses(TestCase::class);

it('creates custom relation', function (): void {
    $relatedModel = new class extends Model
    {
        protected $table = 'related';
    };

    $parentModel = new class extends Model
    {
=======
uses(\Modules\Xot\Tests\TestCase::class);

it('creates custom relation', function (): void {
    $relatedModel = new class extends Model {
        protected $table = 'related';
    };

    $parentModel = new class extends Model {
>>>>>>> 7f6cf6be (.)
        use HasCustomRelations;

        protected $table = 'parent';
    };

<<<<<<< HEAD
    $baseConstraints = fn (mixed $relation) => null;
    $eagerConstraints = fn (mixed $relation, mixed $models) => null;
    $eagerMatcher = fn (mixed $models, mixed $results, mixed $relation) => [];
=======
    $baseConstraints = fn ($relation) => null;
    $eagerConstraints = fn ($relation, $models) => null;
    $eagerMatcher = fn ($models, $results, $relation) => [];
>>>>>>> 7f6cf6be (.)

    $relation = $parentModel->customRelation(
        get_class($relatedModel),
        $baseConstraints,
        $eagerConstraints,
        $eagerMatcher
    );

    Assert::assertInstanceOf(CustomRelation::class, $relation);
});
