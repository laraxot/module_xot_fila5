<?php

declare(strict_types=1);
<<<<<<< HEAD
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Modules\Xot\Relations\CustomRelation;
use Modules\Xot\Tests\TestCase;
use Modules\Xot\Traits\HasCustomRelations;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

it('creates custom relation', function (): void {
    $relatedModel = new class extends Model
    {
        protected $table = 'related';
    };

    $parentModel = new class extends Model
    {
=======

uses(Modules\Xot\Tests\TestCase::class);
use Illuminate\Database\Eloquent\Model;
use Modules\Xot\Relations\CustomRelation;
use Modules\Xot\Traits\HasCustomRelations;
use PHPUnit\Framework\Assert;

it('creates custom relation', function (): void {
    $relatedModel = new class extends Model {
        protected $table = 'related';
    };

    $parentModel = new class extends Model {
>>>>>>> laraxot/dev
        use HasCustomRelations;

        protected $table = 'parent';
    };

<<<<<<< HEAD
    $baseConstraints = fn (CustomRelation $relation) => null;
    /** @param array<int, Model> $models */
    $eagerConstraints = fn (CustomRelation $relation, array $models) => null;
    /**
     * @param  array<int, Model>  $models
     * @param  mixed  $relation  relation name/value forwarded by the relation contract
     */
    $eagerMatcher = fn (array $models, Collection $results, mixed $relation) => [];
=======
    $baseConstraints = fn ($relation) => null;
    $eagerConstraints = fn ($relation, $models) => null;
    $eagerMatcher = fn ($models, $results, $relation) => [];
>>>>>>> .merge_file_fMJU2S

    $relation = $parentModel->customRelation(
        get_class($relatedModel),
        $baseConstraints,
        $eagerConstraints,
        $eagerMatcher
    );

    Assert::assertInstanceOf(CustomRelation::class, $relation);
});
