<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Feature;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Modules\Xot\Tests\Fixtures\Models\TestConcreteMorphPivot;
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

describe('Base Morph Pivot Business Logic', function (): void {
    test('it extends pivot class', function (): void {
        // Arrange & Act
        $pivot = new TestConcreteMorphPivot();

        // Assert
        Assert::assertInstanceOf(Pivot::class, $pivot);
    });

    test('it can manage morph type', function (): void {
        // Arrange
        $pivot = new TestConcreteMorphPivot();
        $pivot->setAttribute('morph_type', 'App\Models\User');

        // Act
        $morphType = $pivot->getAttribute('morph_type');

        // Assert
        Assert::assertEquals('App\Models\User', $morphType);
    });

    test('it can manage morph id', function (): void {
        // Arrange
        $pivot = new TestConcreteMorphPivot();
        $pivot->setAttribute('morph_id', 123);

        // Act
        $morphId = $pivot->getAttribute('morph_id');

        // Assert
        Assert::assertEquals(123, $morphId);
    });

    test('it can manage related type', function (): void {
        // Arrange
        $pivot = new TestConcreteMorphPivot();
        $pivot->setAttribute('related_type', 'App\Models\Post');

        // Act
        $relatedType = $pivot->getAttribute('related_type');

        // Assert
        Assert::assertEquals('App\Models\Post', $relatedType);
    });

    test('it can manage related id', function (): void {
        // Arrange
        $pivot = new TestConcreteMorphPivot();
        $pivot->setAttribute('related_id', 456);

        // Act
        $relatedId = $pivot->getAttribute('related_id');

        // Assert
        Assert::assertEquals(456, $relatedId);
    });

    test('it can manage pivot attributes', function (): void {
        // Arrange
        $pivot = new TestConcreteMorphPivot();
        $pivot->setAttribute('custom_field', 'custom_value');
        $pivot->setAttribute('numeric_field', 42);

        // Act
        /** @var string $customField */
        $customField = $pivot->getAttribute('custom_field');
        /** @var int $numericField */
        $numericField = $pivot->getAttribute('numeric_field');

        // Assert
        Assert::assertEquals('custom_value', $customField);
        Assert::assertEquals(42, $numericField);
    });

    test('it can manage timestamps', function (): void {
        // Arrange
        $pivot = new TestConcreteMorphPivot();
        $now = now();
        $pivot->setAttribute('created_at', $now);
        $pivot->setAttribute('updated_at', $now);

        // Act
        $createdAt = $pivot->getAttribute('created_at');
        $updatedAt = $pivot->getAttribute('updated_at');

        // Assert
        Assert::assertEquals($now, $createdAt);
        Assert::assertEquals($now, $updatedAt);
    });

    test('it can manage soft deletes', function (): void {
        // Arrange
        $pivot = new TestConcreteMorphPivot();
        $deletedAt = now();
        $pivot->setAttribute('deleted_at', $deletedAt);

        // Act
        $pivotDeletedAt = $pivot->getAttribute('deleted_at');

        // Assert
        Assert::assertEquals($deletedAt, $pivotDeletedAt);
    });

    test('it can manage tenant id', function (): void {
        // Arrange
        $pivot = new TestConcreteMorphPivot();
        $pivot->setAttribute('tenant_id', 789);

        // Act
        $tenantId = $pivot->getAttribute('tenant_id');

        // Assert
        Assert::assertEquals(789, $tenantId);
    });

    test('it can manage user id', function (): void {
        // Arrange
        $pivot = new TestConcreteMorphPivot();
        $pivot->setAttribute('user_id', 101);

        // Act
        $userId = $pivot->getAttribute('user_id');

        // Assert
        Assert::assertEquals(101, $userId);
    });

    test('it can manage metadata', function (): void {
        // Arrange
        $metadata = [
            'source' => 'api',
            'ip_address' => '192.168.1.1',
            'user_agent' => 'Test Browser',
            'session_id' => 'session123',
        ];

        $pivot = new TestConcreteMorphPivot();
        $pivot->setAttribute('metadata', $metadata);

        // Act
        /** @var array<string, string> $pivotMetadata */
        $pivotMetadata = $pivot->getAttribute('metadata');

        // Assert
        Assert::assertIsArray($pivotMetadata);
        Assert::assertEquals('api', $pivotMetadata['source']);
        Assert::assertEquals('192.168.1.1', $pivotMetadata['ip_address']);
        Assert::assertEquals('Test Browser', $pivotMetadata['user_agent']);
        Assert::assertEquals('session123', $pivotMetadata['session_id']);
    });

    test('it can manage extra data', function (): void {
        // Arrange
        $extraData = [
            'field1' => 'value1',
            'field2' => 'value2',
            'nested' => [
                'key' => 'value',
            ],
        ];

        $pivot = new TestConcreteMorphPivot();
        $pivot->setAttribute('extra_data', $extraData);

        // Act
        /** @var array<string, mixed> $pivotExtraData */
        $pivotExtraData = $pivot->getAttribute('extra_data');

        // Assert
        Assert::assertIsArray($pivotExtraData);
        Assert::assertEquals('value1', $pivotExtraData['field1']);
        Assert::assertEquals('value2', $pivotExtraData['field2']);
        /** @var array<string, string> $nested */
        $nested = $pivotExtraData['nested'];
        Assert::assertEquals('value', $nested['key']);
    });

    test('it can manage status', function (): void {
        // Arrange
        $pivot = new TestConcreteMorphPivot();
        $pivot->setAttribute('status', 'active');

        // Act
        /** @var string $status */
        $status = $pivot->getAttribute('status');

        // Assert
        Assert::assertEquals('active', $status);
    });

    test('it can manage priority', function (): void {
        // Arrange
        $pivot = new TestConcreteMorphPivot();
        $pivot->setAttribute('priority', 5);

        // Act
        /** @var int $priority */
        $priority = $pivot->getAttribute('priority');

        // Assert
        Assert::assertEquals(5, $priority);
    });

    test('it can manage sort order', function (): void {
        // Arrange
        $pivot = new TestConcreteMorphPivot();
        $pivot->setAttribute('sort_order', 10);

        // Act
        /** @var int $sortOrder */
        $sortOrder = $pivot->getAttribute('sort_order');

        // Assert
        Assert::assertEquals(10, $sortOrder);
    });

    test('it can manage expires at', function (): void {
        // Arrange
        $pivot = new TestConcreteMorphPivot();
        $expiresAt = now()->addDays(30);
        $pivot->setAttribute('expires_at', $expiresAt);

        // Act
        $pivotExpiresAt = $pivot->getAttribute('expires_at');

        // Assert
        Assert::assertEquals($expiresAt, $pivotExpiresAt);
    });

    test('it can manage starts at', function (): void {
        // Arrange
        $pivot = new TestConcreteMorphPivot();
        $startsAt = now()->addHours(2);
        $pivot->setAttribute('starts_at', $startsAt);

        // Act
        $pivotStartsAt = $pivot->getAttribute('starts_at');

        // Assert
        Assert::assertEquals($startsAt, $pivotStartsAt);
    });

    test('it can manage ends at', function (): void {
        // Arrange
        $pivot = new TestConcreteMorphPivot();
        $endsAt = now()->addDays(7);
        $pivot->setAttribute('ends_at', $endsAt);

        // Act
        $pivotEndsAt = $pivot->getAttribute('ends_at');

        // Assert
        Assert::assertEquals($endsAt, $pivotEndsAt);
    });

    test('it can manage is active', function (): void {
        // Arrange
        $pivot = new TestConcreteMorphPivot();
        $pivot->setAttribute('is_active', true);

        // Act
        $isActive = $pivot->getAttribute('is_active');

        // Assert
        Assert::assertTrue((bool) $isActive);

        // Act - Deactivate
        $pivot->setAttribute('is_active', false);

        // Assert
        Assert::assertFalse((bool) $pivot->getAttribute('is_active'));
    });

    test('it can manage is public', function (): void {
        // Arrange
        $pivot = new TestConcreteMorphPivot();
        $pivot->setAttribute('is_public', false);

        // Act
        $isPublic = $pivot->getAttribute('is_public');

        // Assert
        Assert::assertFalse((bool) $isPublic);

        // Act - Make public
        $pivot->setAttribute('is_public', true);

        // Assert
        Assert::assertTrue((bool) $pivot->getAttribute('is_public'));
    });

    test('it can manage is featured', function (): void {
        // Arrange
        $pivot = new TestConcreteMorphPivot();
        $pivot->setAttribute('is_featured', false);

        // Act
        $isFeatured = $pivot->getAttribute('is_featured');

        // Assert
        Assert::assertFalse((bool) $isFeatured);

        // Act - Make featured
        $pivot->setAttribute('is_featured', true);

        // Assert
        Assert::assertTrue((bool) $pivot->getAttribute('is_featured'));
    });
});
