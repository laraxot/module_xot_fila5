<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Feature;

use Illuminate\Database\ConnectionInterface;
use Illuminate\Database\Eloquent\Model;
use Modules\Xot\Models\BaseModel;
use Modules\Xot\Models\Module;
use Modules\Xot\Models\XotBaseModel;
use Modules\Xot\Tests\Fixtures\Models\TestConcreteBaseModel;
use Modules\Xot\Tests\Fixtures\Models\TestConcreteXotBaseModel;
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;
use Sushi\Sushi;

use function Safe\unserialize;

uses(TestCase::class);

describe('XotBaseModel business logic', function (): void {
    it('extends correct base classes via concrete stubs', function (): void {
        $baseModel = new TestConcreteBaseModel();
        $xotBaseModel = new TestConcreteXotBaseModel();

        Assert::assertInstanceOf(BaseModel::class, $baseModel);
        Assert::assertInstanceOf(Model::class, $baseModel);
        Assert::assertInstanceOf(XotBaseModel::class, $xotBaseModel);
    });

    it('can be instantiated without database', function (): void {
        Assert::assertInstanceOf(TestConcreteBaseModel::class, new TestConcreteBaseModel());
    });

    it('supports table name override', function (): void {
        Assert::assertSame('test_table', (new TestConcreteBaseModel())->getTable());
    });

    it('supports connection override', function (): void {
        $connection = (new TestConcreteBaseModel())->getConnection();

        Assert::assertNotNull($connection);
        Assert::assertInstanceOf(ConnectionInterface::class, $connection);
    });

    it('supports key name override', function (): void {
        Assert::assertSame('id', (new TestConcreteBaseModel())->getKeyName());
    });

    it('module sushi model extends eloquent model', function (): void {
        $module = new Module();

        Assert::assertInstanceOf(Model::class, $module);
        Assert::assertContains(Sushi::class, class_uses_recursive(Module::class));
    });

    it('supports model configuration accessors', function (): void {
        $baseModel = new TestConcreteBaseModel();

        Assert::assertContains('id', $baseModel->getFillable());
        Assert::assertIsArray($baseModel->getHidden());
        Assert::assertArrayHasKey('created_at', $baseModel->getCasts());
    });

    it('supports timestamps configuration', function (): void {
        Assert::assertTrue((new TestConcreteBaseModel())->usesTimestamps());
    });

    it('can be serialized and unserialized', function (): void {
        $baseModel = new TestConcreteBaseModel();
        $serialized = serialize($baseModel);
        $unserialized = unserialize($serialized);

        Assert::assertNotSame('', $serialized);
        Assert::assertInstanceOf(TestConcreteBaseModel::class, $unserialized);
    });

    it('supports json and array conversion', function (): void {
        $baseModel = new TestConcreteBaseModel();

        Assert::assertNotSame('', $baseModel->toJson());
        Assert::assertArrayHasKey('id', $baseModel->toArray());
    });
});
