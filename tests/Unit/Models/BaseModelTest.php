<?php

declare(strict_types=1);
<<<<<<< HEAD
=======

>>>>>>> 8d801bbe (Check & fix styling)
use Illuminate\Database\Eloquent\Model;
use Modules\Xot\Models\BaseModel;
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

<<<<<<< .merge_file_4VWsZH
<<<<<<< HEAD
<<<<<<< HEAD
$baseModel = new class extends BaseModel
{
=======
$baseModel = new class extends BaseModel {
>>>>>>> laraxot/dev
=======
$baseModel = new class extends BaseModel {
>>>>>>> 8d801bbe (Check & fix styling)
=======
$baseModel = new class extends BaseModel
{
>>>>>>> .merge_file_acHjmF
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
