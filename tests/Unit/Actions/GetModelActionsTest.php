<?php

declare(strict_types=1);
<<<<<<< .merge_file_CG03R2
<<<<<<< HEAD
<<<<<<< HEAD
=======

uses(TestCase::class);
>>>>>>> laraxot/dev
=======

uses(Modules\Xot\Tests\TestCase::class);
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_zvgjaj
use Illuminate\Database\Eloquent\Model;
use Modules\Xot\Actions\Cast\SafeIntCastAction;
use Modules\Xot\Actions\GetModelByModelTypeAction;
use Modules\Xot\Actions\GetModelClassByModelTypeAction;
use Modules\Xot\Actions\GetModelTypeByModelAction;
use Modules\Xot\Contracts\ModelContract;
use Modules\Xot\Tests\Fixtures\DemoModel;
use Modules\Xot\Tests\Fixtures\FakeQueryableModel;
<<<<<<< HEAD
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

=======
use PHPUnit\Framework\Assert;

>>>>>>> 3792da0d (Check & fix styling)
it('gets model class by model type from morph map', function (): void {
    config()->set('morph_map', ['demo' => DemoModel::class]);

    $result = app(GetModelClassByModelTypeAction::class)->execute('demo');

    Assert::assertSame(DemoModel::class, $result);
});

it('throws when morph map config is not an array', function (): void {
    config()->set('morph_map', 'invalid');

    try {
        app(GetModelClassByModelTypeAction::class)->execute('demo');
        Assert::fail('Expected exception not thrown');
    } catch (Exception $e) {
        Assert::assertInstanceOf(Exception::class, $e);
    }
});

it('throws when model type key is missing in morph map', function (): void {
    config()->set('morph_map', ['demo' => DemoModel::class]);

    try {
        app(GetModelClassByModelTypeAction::class)->execute('missing');
    } catch (Throwable $e) {
        Assert::assertInstanceOf(InvalidArgumentException::class, $e);

        return;
    }
    Assert::fail('Exception not thrown');
});

it('instantiates model by type when id is null', function (): void {
    config()->set('morph_map', ['demo' => DemoModel::class]);

    $result = app(GetModelByModelTypeAction::class)->execute('demo', null);

    Assert::assertInstanceOf(DemoModel::class, $result);
});

it('loads model by id when record exists', function (): void {
    config()->set('morph_map', ['demo' => FakeQueryableModel::class]);
<<<<<<< .merge_file_CG03R2
<<<<<<< HEAD
<<<<<<< HEAD
    FakeQueryableModel::$findResult = new DemoModel;
=======
    FakeQueryableModel::$findResult = new DemoModel();
>>>>>>> laraxot/dev
=======
    FakeQueryableModel::$findResult = new DemoModel();
>>>>>>> 3792da0d (Check & fix styling)
=======
    FakeQueryableModel::$findResult = new DemoModel;
>>>>>>> .merge_file_zvgjaj
    FakeQueryableModel::$findResult->setAttribute('id', 123);

    $result = app(GetModelByModelTypeAction::class)->execute('demo', '123');

    Assert::assertInstanceOf(DemoModel::class, $result);
    Assert::assertSame(123, SafeIntCastAction::cast($result->getKey()));
});

it('throws when model id is provided but record is missing', function (): void {
    config()->set('morph_map', ['demo' => FakeQueryableModel::class]);
    FakeQueryableModel::$findResult = null;

    try {
        app(GetModelByModelTypeAction::class)->execute('demo', '999999');
        Assert::fail('Expected exception not thrown');
    } catch (Exception $e) {
        Assert::assertInstanceOf(Exception::class, $e);
    }
});

it('returns snake model type from model contract instance', function (): void {
<<<<<<< .merge_file_CG03R2
<<<<<<< HEAD
<<<<<<< HEAD
    $model = new class extends Model implements ModelContract {};
=======
    $model = new class extends Model implements ModelContract {
    };
>>>>>>> laraxot/dev
=======
    $model = new class extends Model implements ModelContract {
    };
>>>>>>> 3792da0d (Check & fix styling)
=======
    $model = new class extends Model implements ModelContract {};
>>>>>>> .merge_file_zvgjaj

    $result = app(GetModelTypeByModelAction::class)->execute($model);

    Assert::assertStringContainsString('model', $result);
    Assert::assertIsString($result);
});
