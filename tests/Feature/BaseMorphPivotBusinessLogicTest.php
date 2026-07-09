<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Feature;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Modules\Xot\Models\BaseMorphPivot;
use Modules\Xot\Tests\TestCase;

uses(TestCase::class);

describe('Base Morph Pivot Business Logic', function (): void {
    test('it extends pivot class', function (): void {
        // Arrange & Act
        $pivot = new BaseMorphPivot();

        // Assert
        $this->assertInstanceOf(Pivot::class, $pivot);
    }

    /** @test */
    public function itCanManageMorphType(): void
    {
        // Arrange
        $pivot = new BaseMorphPivot();
        $pivot->morph_type = 'App\Models\User';

        // Act
        $morphType = $pivot->morph_type;

        // Assert
        $this->assertEquals('App\Models\User', $morphType);
    }

    /** @test */
    public function itCanManageMorphId(): void
    {
        // Arrange
        $pivot = new BaseMorphPivot();
        $pivot->morph_id = 123;

        // Act
        $morphId = $pivot->morph_id;

        // Assert
        $this->assertEquals(123, $morphId);
    }

    /** @test */
    public function itCanManageRelatedType(): void
    {
        // Arrange
        $pivot = new BaseMorphPivot();
        $pivot->related_type = 'App\Models\Post';

        // Act
        $relatedType = $pivot->related_type;

        // Assert
        $this->assertEquals('App\Models\Post', $relatedType);
    }

    /** @test */
    public function itCanManageRelatedId(): void
    {
        // Arrange
        $pivot = new BaseMorphPivot();
        $pivot->related_id = 456;

        // Act
        $relatedId = $pivot->related_id;

        // Assert
        $this->assertEquals(456, $relatedId);
    }

    /** @test */
    public function itCanManagePivotAttributes(): void
    {
        // Arrange
        $pivot = new BaseMorphPivot();
        $pivot->setAttribute('custom_field', 'custom_value');
        $pivot->setAttribute('numeric_field', 42);

        // Act
        $customField = $pivot->$this->getAttribute('custom_field');
        $numericField = $pivot->$this->getAttribute('numeric_field');

        // Assert
        $this->assertEquals('custom_value', $customField);
        $this->assertEquals(42, $numericField);
    }

    /** @test */
    public function itCanManageTimestamps(): void
    {
        // Arrange
        $pivot = new BaseMorphPivot();
        $now = now();
        $pivot->created_at = $now;
        $pivot->updated_at = $now;

        // Act
        $createdAt = $pivot->created_at;
        $updatedAt = $pivot->updated_at;

        // Assert
        $this->assertEquals($now, $createdAt);
        $this->assertEquals($now, $updatedAt);
    }

    /** @test */
    public function itCanManageSoftDeletes(): void
    {
        // Arrange
        $pivot = new BaseMorphPivot();
        $deletedAt = now();
        $pivot->deleted_at = $deletedAt;

        // Act
        $pivotDeletedAt = $pivot->deleted_at;

        // Assert
        $this->assertEquals($deletedAt, $pivotDeletedAt);
    }

    /** @test */
    public function itCanManageTenantId(): void
    {
        // Arrange
        $pivot = new BaseMorphPivot();
        $pivot->tenant_id = 789;

        // Act
        $tenantId = $pivot->tenant_id;

        // Assert
        $this->assertEquals(789, $tenantId);
    }

    /** @test */
    public function itCanManageUserId(): void
    {
        // Arrange
        $pivot = new BaseMorphPivot();
        $pivot->user_id = 101;

        // Act
        $userId = $pivot->user_id;

        // Assert
        $this->assertEquals(101, $userId);
    }

    /** @test */
    public function itCanManageMetadata(): void
    {
        // Arrange
        $metadata = [
            'source' => 'api',
            'ip_address' => '192.168.1.1',
            'user_agent' => 'Test Browser',
            'session_id' => 'session123',
        ];

        $pivot = new BaseMorphPivot();
        $pivot->metadata = $metadata;

        // Act
        $pivotMetadata = $pivot->metadata;

        // Assert
        $this->assertIsArray($pivotMetadata);
        $this->assertEquals('api', $pivotMetadata['source']);
        $this->assertEquals('192.168.1.1', $pivotMetadata['ip_address']);
        $this->assertEquals('Test Browser', $pivotMetadata['user_agent']);
        $this->assertEquals('session123', $pivotMetadata['session_id']);
    }

    /** @test */
    public function itCanManageExtraData(): void
    {
        // Arrange
        $extraData = [
            'field1' => 'value1',
            'field2' => 'value2',
            'nested' => [
                'key' => 'value',
            ],
        ];

        $pivot = new BaseMorphPivot();
        $pivot->extra_data = $extraData;

        // Act
        $pivotExtraData = $pivot->extra_data;

        // Assert
        $this->assertIsArray($pivotExtraData);
        $this->assertEquals('value1', $pivotExtraData['field1']);
        $this->assertEquals('value2', $pivotExtraData['field2']);
        $this->assertEquals('value', $pivotExtraData['nested']['key']);
    }

    /** @test */
    public function itCanManageStatus(): void
    {
        // Arrange
        $pivot = new BaseMorphPivot();
        $pivot->status = 'active';

        // Act
        $status = $pivot->status;

        // Assert
        $this->assertEquals('active', $status);
    }

    /** @test */
    public function itCanManagePriority(): void
    {
        // Arrange
        $pivot = new BaseMorphPivot();
        $pivot->priority = 5;

        // Act
        $priority = $pivot->priority;

        // Assert
        $this->assertEquals(5, $priority);
    }

    /** @test */
    public function itCanManageSortOrder(): void
    {
        // Arrange
        $pivot = new BaseMorphPivot();
        $pivot->sort_order = 10;

        // Act
        $sortOrder = $pivot->sort_order;

        // Assert
        $this->assertEquals(10, $sortOrder);
    }

    /** @test */
    public function itCanManageExpiresAt(): void
    {
        // Arrange
        $pivot = new BaseMorphPivot();
        $expiresAt = now()->addDays(30);
        $pivot->expires_at = $expiresAt;

        // Act
        $pivotExpiresAt = $pivot->expires_at;

        // Assert
        $this->assertEquals($expiresAt, $pivotExpiresAt);
    }

    /** @test */
    public function itCanManageStartsAt(): void
    {
        // Arrange
        $pivot = new BaseMorphPivot();
        $startsAt = now()->addHours(2);
        $pivot->starts_at = $startsAt;

        // Act
        $pivotStartsAt = $pivot->starts_at;

        // Assert
        $this->assertEquals($startsAt, $pivotStartsAt);
    }

    /** @test */
    public function itCanManageEndsAt(): void
    {
        // Arrange
        $pivot = new BaseMorphPivot();
        $endsAt = now()->addDays(7);
        $pivot->ends_at = $endsAt;

        // Act
        $pivotEndsAt = $pivot->ends_at;

        // Assert
        $this->assertEquals($endsAt, $pivotEndsAt);
    }

    /** @test */
    public function itCanManageIsActive(): void
    {
        // Arrange
        $pivot = new BaseMorphPivot();
        $pivot->is_active = true;

        // Act
        $isActive = $pivot->is_active;

        // Assert
        $this->assertTrue($isActive);

        // Act - Deactivate
        $pivot->is_active = false;

        // Assert
        $this->assertFalse($pivot->is_active);
    }

    /** @test */
    public function itCanManageIsPublic(): void
    {
        // Arrange
        $pivot = new BaseMorphPivot();
        $pivot->is_public = false;

        // Act
        $isPublic = $pivot->is_public;

        // Assert
        $this->assertFalse($isPublic);

        // Act - Make public
        $pivot->is_public = true;

        // Assert
        $this->assertTrue($pivot->is_public);
    }

    /** @test */
    public function itCanManageIsFeatured(): void
    {
        // Arrange
        $pivot = new BaseMorphPivot();
        $pivot->is_featured = false;

        // Act
        $isFeatured = $pivot->is_featured;

        // Assert
        $this->assertFalse($isFeatured);

        // Act - Make featured
        $pivot->is_featured = true;

        // Assert
        Assert::assertTrue((bool) $pivot->getAttribute('is_featured'));
    });
});
