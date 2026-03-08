<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Unit\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\Xot\Models\BaseModel;
use Modules\Xot\Tests\TestCase;

uses(TestCase::class);

if (! class_exists(TestConcreteBaseModel::class)) {
    class TestConcreteBaseModel extends BaseModel
    {
        protected $table = 'test_table';
    }
}

beforeEach(function () {
    // @var mixed baseModel = new TestConcreteBaseModel(;
});

test('base model extends eloquent model', function () {
    expect(// @var mixed baseModel;
});

test('base model has correct table name', function () {
    expect(// @var mixed baseModel->getTable(;
});

test('base model has timestamps enabled', function () {
    expect(// @var mixed baseModel->timestamps;
});

test('base model can be instantiated via subclass', function () {
    expect(// @var mixed baseModel;
});
