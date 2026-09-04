<?php

declare(strict_types=1);

use Exception;
use Modules\Xot\Models\Traits\HasExtraTrait;
use Modules\Xot\Tests\Fixtures\Models\HasExtraMockExtra;
use Modules\Xot\Tests\Fixtures\Models\HasExtraTraitProbeModel;
use Modules\Xot\Tests\TestCase;
use Modules\Xot\Tests\XotBasePest;
use PHPUnit\Framework\Assert;
use ReflectionClass;
use ReflectionMethod;
use ReflectionNamedType;

use function Safe\class_uses;

uses(TestCase::class)->group('no-xot-db');

describe('HasExtraTrait', function (): void {
    it('uses the trait correctly', function (): void {
        $traits = class_uses(HasExtraTraitProbeModel::class);

        Assert::assertContains(HasExtraTrait::class, $traits);
    });

    it('returns null for non-existent extra', function (): void {
        $testModel = new HasExtraTraitProbeModel();
        $testModel->extra = null;

        Assert::assertNull($testModel->getExtra('non_existent_key'));
    });

    it('can set and get extra attributes', function (): void {
        $testModel = new HasExtraTraitProbeModel();
        $testModel->extra = HasExtraMockExtra::withAttributes(['test_key' => 'test_value']);

        Assert::assertSame('test_value', $testModel->getExtra('test_key'));
    });

    it('handles different data types correctly', function (): void {
        $testModel = new HasExtraTraitProbeModel();
        $testModel->extra = HasExtraMockExtra::withAttributes([
            'string_value' => 'test_string',
            'int_value' => 123,
            'bool_value' => true,
            'array_value' => ['nested', 'array'],
            'null_value' => null,
        ]);

        Assert::assertSame('test_string', $testModel->getExtra('string_value'));
        Assert::assertSame(123, $testModel->getExtra('int_value'));
        Assert::assertTrue($testModel->getExtra('bool_value'));
        Assert::assertSame(['nested', 'array'], $testModel->getExtra('array_value'));
        Assert::assertNull($testModel->getExtra('null_value'));
    });

    it('throws exception for invalid data types', function (): void {
        $testModel = new HasExtraTraitProbeModel();
        $testModel->extra = HasExtraMockExtra::withAttributes(['invalid_value' => new stdClass()]);

        XotBasePest::assertThrows(
            fn (): mixed => $testModel->getExtra('invalid_value'),
            Exception::class,
        );
    });

    it('validates method signatures', function (): void {
        $reflection = new ReflectionClass(HasExtraTraitProbeModel::class);

        $getExtraMethod = $reflection->getMethod('getExtra');
        Assert::assertTrue($getExtraMethod->isPublic());

        $parameters = $getExtraMethod->getParameters();
        Assert::assertCount(1, $parameters);
        Assert::assertSame('name', $parameters[0]->getName());

        $nameType = $parameters[0]->getType();
        Assert::assertInstanceOf(ReflectionNamedType::class, $nameType);
        Assert::assertSame('string', $nameType->getName());
    });

    it('has proper return type annotations', function (): void {
        $reflection = new ReflectionClass(HasExtraTraitProbeModel::class);
        $method = $reflection->getMethod('getExtra');

        Assert::assertNotNull($method->getReturnType());
    });

    it('handles extra relationship correctly', function (): void {
        $extraMethod = new ReflectionMethod(HasExtraTraitProbeModel::class, 'extra');

        Assert::assertTrue($extraMethod->isPublic());
    });

    it('handles empty extra attributes', function (): void {
        $testModel = new HasExtraTraitProbeModel();
        $testModel->extra = HasExtraMockExtra::withAttributes([]);

        Assert::assertNull($testModel->getExtra('non_existent'));
    });

    it('has proper documentation', function (): void {
        $reflection = new ReflectionClass(HasExtraTrait::class);
        $getExtraMethod = $reflection->getMethod('getExtra');
        $docComment = $getExtraMethod->getDocComment();

        Assert::assertIsString($docComment);
        Assert::assertStringContainsString('@return', $docComment);
    });
});
