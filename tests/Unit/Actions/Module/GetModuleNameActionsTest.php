<?php

declare(strict_types=1);
<<<<<<< .merge_file_bpmY6Z
<<<<<<< HEAD
<<<<<<< HEAD
=======

<<<<<<< HEAD
uses(TestCase::class);
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======

uses(Modules\Xot\Tests\TestCase::class);
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_vVXIet
=======
=======
uses(Modules\Xot\Tests\TestCase::class);
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
use Illuminate\Database\Eloquent\Model;
use Modules\Xot\Actions\Module\GetModuleNameByClassAction;
use Modules\Xot\Actions\Module\GetModuleNameByModelAction;
use Modules\Xot\Actions\Module\GetModuleNameByModelClassAction;
<<<<<<< HEAD
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

=======
use PHPUnit\Framework\Assert;

<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
it('extracts module name from class and model class', function (): void {
    $byClass = app(GetModuleNameByClassAction::class)->execute('Modules\\Cms\\Models\\Page');
    $byModelClass = app(GetModuleNameByModelClassAction::class)->execute('Modules\\Xot\\Models\\Module');

    Assert::assertSame('Cms', $byClass);
    Assert::assertSame('Xot', $byModelClass);
});

it('returns extracted fragment for non-module class signatures', function (): void {
    $byClass = app(GetModuleNameByClassAction::class)->execute('App\\Models\\User');
    $byModelClass = app(GetModuleNameByModelClassAction::class)->execute('App\\Models\\User');

    Assert::assertSame('App', $byClass);
    Assert::assertSame('App', $byModelClass);
});

it('delegates model instance class to model class action', function (): void {
<<<<<<< .merge_file_bpmY6Z
<<<<<<< HEAD
<<<<<<< HEAD
    $model = new class extends Model
    {
=======
    $model = new class extends Model {
>>>>>>> laraxot/dev
=======
    $model = new class extends Model {
>>>>>>> 3792da0d (Check & fix styling)
=======
    $model = new class extends Model
    {
>>>>>>> .merge_file_vVXIet
        protected $table = 'test';
    };
    $delegate = Mockery::mock(GetModuleNameByModelClassAction::class);
    $delegate->allows(['execute' => 'Delegated']);
    app()->instance(GetModuleNameByModelClassAction::class, $delegate);

    $result = app(GetModuleNameByModelAction::class)->execute($model);

    Assert::assertSame('Delegated', $result);
});
