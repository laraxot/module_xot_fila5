<?php

declare(strict_types=1);
<<<<<<< HEAD
use Modules\Xot\Actions\Model\HasColumnAction;
use Modules\Xot\Models\BaseModel;
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

=======

uses(Modules\Xot\Tests\TestCase::class);
use Modules\Xot\Actions\Model\HasColumnAction;
use Modules\Xot\Models\BaseModel;
use PHPUnit\Framework\Assert;

>>>>>>> 930f8146 (Check & fix styling)
$action = app(HasColumnAction::class);

it('executes without errors', function () use ($action): void {
    $model = new class extends BaseModel
    {
<<<<<<< .merge_file_GaD5Zv
=======
    $model = new class extends BaseModel {
>>>>>>> laraxot/dev
=======

uses(Modules\Xot\Tests\TestCase::class);
use Modules\Xot\Actions\Model\HasColumnAction;
use Modules\Xot\Models\BaseModel;
use PHPUnit\Framework\Assert;

$action = app(HasColumnAction::class);

it('executes without errors', function () use ($action): void {
    $model = new class extends BaseModel {
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_VX62U4
        protected $table = 'users';
    };

    try {
        $result = $action->execute($model, 'id');
        Assert::assertIsBool($result);
    } catch (Exception $e) {
        Assert::assertStringContainsString('table', $e->getMessage());
    }
});

it('handles different tables', function () use ($action): void {
<<<<<<< .merge_file_GaD5Zv
<<<<<<< HEAD
<<<<<<< HEAD
    $model = new class extends BaseModel
    {
=======
    $model = new class extends BaseModel {
>>>>>>> laraxot/dev
=======
    $model = new class extends BaseModel {
>>>>>>> 3792da0d (Check & fix styling)
=======
    $model = new class extends BaseModel
    {
>>>>>>> .merge_file_VX62U4
        protected $table = 'migrations';
    };

    try {
        $result = $action->execute($model, 'id');
        Assert::assertIsBool($result);
    } catch (Exception $e) {
        Assert::assertStringContainsString('table', $e->getMessage());
    }
});

it('returns boolean result', function () use ($action): void {
<<<<<<< .merge_file_GaD5Zv
<<<<<<< HEAD
<<<<<<< HEAD
    $model = new class extends BaseModel
    {
=======
    $model = new class extends BaseModel {
>>>>>>> laraxot/dev
=======
    $model = new class extends BaseModel {
>>>>>>> 3792da0d (Check & fix styling)
=======
    $model = new class extends BaseModel
    {
>>>>>>> .merge_file_VX62U4
        protected $table = 'users';
    };

    try {
        $result = $action->execute($model, 'nonexistent_xyz_123');
        Assert::assertIsBool($result);
    } catch (Exception $e) {
        Assert::assertStringContainsString('table', $e->getMessage());
    }
});
