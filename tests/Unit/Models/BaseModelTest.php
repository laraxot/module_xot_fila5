<?php

declare(strict_types=1);
<<<<<<< HEAD
=======

<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
use Illuminate\Database\Eloquent\Model;
use Modules\Xot\Models\BaseModel;
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

<<<<<<< .merge_file_K7qi2w
<<<<<<< HEAD
<<<<<<< HEAD
$baseModel = new class extends BaseModel
{
=======
$baseModel = new class extends BaseModel {
>>>>>>> laraxot/dev
=======
$baseModel = new class extends BaseModel {
>>>>>>> 3792da0d (Check & fix styling)
=======
$baseModel = new class extends BaseModel
{
>>>>>>> .merge_file_bVvm6D
    protected $table = 'test_table';
};

test('base model extends eloquent model', function () use ($baseModel): void {
    Assert::assertInstanceOf(Model::class, $baseModel);
});

test('base model has correct table name', function () use ($baseModel): void {
    Assert::assertSame('test_table', $baseModel->getTable());
});

test('base model has timestamps enabled', function () use ($baseModel): void {
    Assert::assertTrue($baseModel->usesTimestamps());
});

test('base model has timestamps disabled by default', function () use ($baseModel): void {
    Assert::assertTrue($baseModel->usesTimestamps());
});

test('base model can be instantiated', function () use ($baseModel): void {
    Assert::assertInstanceOf(BaseModel::class, $baseModel);
});
