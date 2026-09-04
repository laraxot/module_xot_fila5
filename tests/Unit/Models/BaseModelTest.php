<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Unit\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Xot\Models\BaseModel;
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

beforeEach(function () {
    $this->baseModel = new class() extends BaseModel
    {
        protected $table = 'test_table';
    };
});

test('base model extends eloquent model', function () {
    Assert::assertInstanceOf(Model::class, $this->baseModel);
});

test('base model has correct table name', function () {
    Assert::assertSame('test_table', $this->baseModel->getTable());
});

test('base model has timestamps enabled', function () {
    Assert::assertTrue($this->baseModel->usesTimestamps());
});

test('base model has soft deletes disabled by default', function () {
    Assert::assertFalse(in_array(SoftDeletes::class, class_uses_recursive($this->baseModel), true));
});

test('base model can be instantiated', function () {
    Assert::assertInstanceOf(BaseModel::class, $this->baseModel);
});
