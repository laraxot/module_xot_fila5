<?php

declare(strict_types=1);
<<<<<<< HEAD
use Modules\Xot\Actions\Cast\SafeArrayByModelCastAction;
use Modules\Xot\Actions\Cast\SafeAttributeCastAction;
use Modules\Xot\Models\XotBaseModel;
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

=======

uses(Modules\Xot\Tests\TestCase::class);
use Modules\Xot\Actions\Cast\SafeArrayByModelCastAction;
use Modules\Xot\Actions\Cast\SafeAttributeCastAction;
use Modules\Xot\Models\XotBaseModel;
use PHPUnit\Framework\Assert;

>>>>>>> 930f8146 (Check & fix styling)
test('safe array by model cast action works', function () {
    $model = new class extends XotBaseModel
    {
<<<<<<< .merge_file_MDdxm2
=======
    $model = new class extends XotBaseModel {
>>>>>>> laraxot/dev
=======

uses(Modules\Xot\Tests\TestCase::class);
use Modules\Xot\Actions\Cast\SafeArrayByModelCastAction;
use Modules\Xot\Actions\Cast\SafeAttributeCastAction;
use Modules\Xot\Models\XotBaseModel;
use PHPUnit\Framework\Assert;

test('safe array by model cast action works', function () {
    $model = new class extends XotBaseModel {
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_jzf5Sa
        protected $attributes = [
            'id' => 1,
            'name' => 'Test',
        ];
    };

    $action = app(SafeArrayByModelCastAction::class);
    $result = $action->execute($model);

    Assert::assertArrayHasKey('id', $result);
    Assert::assertArrayHasKey('name', $result);
    Assert::assertSame('Test', $result['name']);
});

test('safe attribute cast action works', function () {
<<<<<<< .merge_file_MDdxm2
<<<<<<< HEAD
<<<<<<< HEAD
    $model = new class extends XotBaseModel
    {
=======
    $model = new class extends XotBaseModel {
>>>>>>> laraxot/dev
=======
    $model = new class extends XotBaseModel {
>>>>>>> 3792da0d (Check & fix styling)
=======
    $model = new class extends XotBaseModel
    {
>>>>>>> .merge_file_jzf5Sa
        protected $attributes = [
            'str' => 'test',
            'int' => 123,
            'float' => 12.3,
            'bool' => 1,
            'arr' => '{"a":1}',
            'null_val' => null,
        ];

        protected $casts = ['arr' => 'array'];
    };

    $action = app(SafeAttributeCastAction::class);

    Assert::assertSame(123, $action->getIntAttribute($model, 'int'));
    Assert::assertSame(12.3, $action->getFloatAttribute($model, 'float'));
    Assert::assertTrue($action->getBooleanAttribute($model, 'bool'));
    Assert::assertSame(['a' => 1], $action->getArrayAttribute($model, 'arr'));
    Assert::assertTrue($action->hasAttribute($model, 'str'));
    Assert::assertTrue(SafeAttributeCastAction::hasNonEmpty($model, 'str'));
    Assert::assertSame('test', SafeAttributeCastAction::getString($model, 'str'));
});
