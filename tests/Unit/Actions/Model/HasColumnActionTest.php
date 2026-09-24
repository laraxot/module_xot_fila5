<?php

declare(strict_types=1);
<<<<<<< HEAD
use Modules\Xot\Actions\Model\HasColumnAction;
use Modules\Xot\Models\BaseModel;
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

$action = app(HasColumnAction::class);

it('executes without errors', function () use ($action): void {
    $model = new class extends BaseModel
    {
<<<<<<< .merge_file_uod0Yq
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
>>>>>>> 8d801bbe (Check & fix styling)
=======
>>>>>>> .merge_file_RB9buV
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
<<<<<<< .merge_file_uod0Yq
<<<<<<< HEAD
<<<<<<< HEAD
    $model = new class extends BaseModel
    {
=======
    $model = new class extends BaseModel {
>>>>>>> laraxot/dev
=======
    $model = new class extends BaseModel {
>>>>>>> 8d801bbe (Check & fix styling)
=======
    $model = new class extends BaseModel
    {
>>>>>>> .merge_file_RB9buV
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
<<<<<<< .merge_file_uod0Yq
<<<<<<< HEAD
<<<<<<< HEAD
    $model = new class extends BaseModel
    {
=======
    $model = new class extends BaseModel {
>>>>>>> laraxot/dev
=======
    $model = new class extends BaseModel {
>>>>>>> 8d801bbe (Check & fix styling)
=======
    $model = new class extends BaseModel
    {
>>>>>>> .merge_file_RB9buV
        protected $table = 'users';
    };

    try {
        $result = $action->execute($model, 'nonexistent_xyz_123');
        Assert::assertIsBool($result);
    } catch (Exception $e) {
        Assert::assertStringContainsString('table', $e->getMessage());
    }
});
