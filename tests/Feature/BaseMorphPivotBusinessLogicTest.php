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

    test('it can manage tags', function (): void {
        // Arrange
        $tags = ['tag1', 'tag2', 'important'];

        $pivot = new TestConcreteMorphPivot();
        $pivot->setAttribute('tags', $tags);

        // Act
        /** @var array<int, string> $pivotTags */
        $pivotTags = $pivot->getAttribute('tags');

        // Assert
        Assert::assertIsArray($pivotTags);
        Assert::assertContains('tag1', $pivotTags);
        Assert::assertContains('tag2', $pivotTags);
        Assert::assertContains('important', $pivotTags);
        Assert::assertCount(3, $pivotTags);
    });

    test('it can manage categories', function (): void {
        // Arrange
        $categories = ['category1', 'category2'];

        $pivot = new TestConcreteMorphPivot();
        $pivot->setAttribute('categories', $categories);

        // Act
        /** @var array<int, string> $pivotCategories */
        $pivotCategories = $pivot->getAttribute('categories');

        // Assert
        Assert::assertIsArray($pivotCategories);
        Assert::assertContains('category1', $pivotCategories);
        Assert::assertContains('category2', $pivotCategories);
        Assert::assertCount(2, $pivotCategories);
    });

    test('it can manage permissions', function (): void {
        // Arrange
        $permissions = [
            'read' => true,
            'write' => false,
            'delete' => false,
        ];

        $pivot = new TestConcreteMorphPivot();
        $pivot->setAttribute('permissions', $permissions);

        // Act
        /** @var array<string, bool> $pivotPermissions */
        $pivotPermissions = $pivot->getAttribute('permissions');

        // Assert
        Assert::assertIsArray($pivotPermissions);
        Assert::assertTrue($pivotPermissions['read']);
        Assert::assertFalse($pivotPermissions['write']);
        Assert::assertFalse($pivotPermissions['delete']);
    });

    test('it can manage settings', function (): void {
        // Arrange
        $settings = [
            'notifications' => true,
            'auto_save' => false,
            'timeout' => 30,
        ];

        $pivot = new TestConcreteMorphPivot();
        $pivot->setAttribute('settings', $settings);

        // Act
        /** @var array<string, mixed> $pivotSettings */
        $pivotSettings = $pivot->getAttribute('settings');

        // Assert
        Assert::assertIsArray($pivotSettings);
        Assert::assertTrue($pivotSettings['notifications']);
        Assert::assertFalse($pivotSettings['auto_save']);
        Assert::assertEquals(30, $pivotSettings['timeout']);
    });

    test('it can manage notes', function (): void {
        // Arrange
        $notes = 'This is a test note for the pivot relationship';

        $pivot = new TestConcreteMorphPivot();
        $pivot->setAttribute('notes', $notes);

        // Act
        $pivotNotes = $pivot->getAttribute('notes');

        // Assert
        Assert::assertEquals($notes, $pivotNotes);
    });

    test('it can manage description', function (): void {
        // Arrange
        $description = 'Test description for pivot relationship';

        $pivot = new TestConcreteMorphPivot();
        $pivot->setAttribute('description', $description);

        // Act
        $pivotDescription = $pivot->getAttribute('description');

        // Assert
        Assert::assertEquals($description, $pivotDescription);
    });

    test('it can manage url', function (): void {
        // Arrange
        $url = 'https://example.com/pivot/123';

        $pivot = new TestConcreteMorphPivot();
        $pivot->setAttribute('url', $url);

        // Act
        $pivotUrl = $pivot->getAttribute('url');

        // Assert
        Assert::assertEquals($url, $pivotUrl);
    });

    test('it can manage image url', function (): void {
        // Arrange
        $imageUrl = 'https://example.com/images/pivot.jpg';

        $pivot = new TestConcreteMorphPivot();
        $pivot->setAttribute('image_url', $imageUrl);

        // Act
        $pivotImageUrl = $pivot->getAttribute('image_url');

        // Assert
        Assert::assertEquals($imageUrl, $pivotImageUrl);
    });

    test('it can manage external id', function (): void {
        // Arrange
        $externalId = 'ext_12345';

        $pivot = new TestConcreteMorphPivot();
        $pivot->setAttribute('external_id', $externalId);

        // Act
        $pivotExternalId = $pivot->getAttribute('external_id');

        // Assert
        Assert::assertEquals($externalId, $pivotExternalId);
    });

    test('it can manage source', function (): void {
        // Arrange
        $source = 'api_import';

        $pivot = new TestConcreteMorphPivot();
        $pivot->setAttribute('source', $source);

        // Act
        $pivotSource = $pivot->getAttribute('source');

        // Assert
        Assert::assertEquals($source, $pivotSource);
    });

    test('it can manage version', function (): void {
        // Arrange
        $version = '1.2.3';

        $pivot = new TestConcreteMorphPivot();
        $pivot->setAttribute('version', $version);

        // Act
        $pivotVersion = $pivot->getAttribute('version');

        // Assert
        Assert::assertEquals($version, $pivotVersion);
    });

    test('it can manage hash', function (): void {
        // Arrange
        $hash = 'abc123def456';

        $pivot = new TestConcreteMorphPivot();
        $pivot->setAttribute('hash', $hash);

        // Act
        $pivotHash = $pivot->getAttribute('hash');

        // Assert
        Assert::assertEquals($hash, $pivotHash);
    });

    test('it can manage checksum', function (): void {
        // Arrange
        $checksum = 'sha256:abc123def456';

        $pivot = new TestConcreteMorphPivot();
        $pivot->setAttribute('checksum', $checksum);

        // Act
        $pivotChecksum = $pivot->getAttribute('checksum');

        // Assert
        Assert::assertEquals($checksum, $pivotChecksum);
    });

    test('it can manage size', function (): void {
        // Arrange
        $size = 1024;

        $pivot = new TestConcreteMorphPivot();
        $pivot->setAttribute('size', $size);

        // Act
        /** @var int $pivotSize */
        $pivotSize = $pivot->getAttribute('size');

        // Assert
        Assert::assertEquals($size, $pivotSize);
    });

    test('it can manage mime type', function (): void {
        // Arrange
        $mimeType = 'application/json';

        $pivot = new TestConcreteMorphPivot();
        $pivot->setAttribute('mime_type', $mimeType);

        // Act
        $pivotMimeType = $pivot->getAttribute('mime_type');

        // Assert
        Assert::assertEquals($mimeType, $pivotMimeType);
    });

    test('it can manage encoding', function (): void {
        // Arrange
        $encoding = 'UTF-8';

        $pivot = new TestConcreteMorphPivot();
        $pivot->setAttribute('encoding', $encoding);

        // Act
        $pivotEncoding = $pivot->getAttribute('encoding');

        // Assert
        Assert::assertEquals($encoding, $pivotEncoding);
    });

    test('it can manage language', function (): void {
        // Arrange
        $language = 'en';

        $pivot = new TestConcreteMorphPivot();
        $pivot->setAttribute('language', $language);

        // Act
        $pivotLanguage = $pivot->getAttribute('language');

        // Assert
        Assert::assertEquals($language, $pivotLanguage);
    });

    test('it can manage locale', function (): void {
        // Arrange
        $locale = 'en_US';

        $pivot = new TestConcreteMorphPivot();
        $pivot->setAttribute('locale', $locale);

        // Act
        $pivotLocale = $pivot->getAttribute('locale');

        // Assert
        Assert::assertEquals($locale, $pivotLocale);
    });

    test('it can manage timezone', function (): void {
        // Arrange
        $timezone = 'Europe/Rome';

        $pivot = new TestConcreteMorphPivot();
        $pivot->setAttribute('timezone', $timezone);

        // Act
        $pivotTimezone = $pivot->getAttribute('timezone');

        // Assert
        Assert::assertEquals($timezone, $pivotTimezone);
    });

    test('it can manage currency', function (): void {
        // Arrange
        $currency = 'EUR';

        $pivot = new TestConcreteMorphPivot();
        $pivot->setAttribute('currency', $currency);

        // Act
        $pivotCurrency = $pivot->getAttribute('currency');

        // Assert
        Assert::assertEquals($currency, $pivotCurrency);
    });

    test('it can manage decimal places', function (): void {
        // Arrange
        $decimalPlaces = 2;

        $pivot = new TestConcreteMorphPivot();
        $pivot->setAttribute('decimal_places', $decimalPlaces);

        // Act
        /** @var int $pivotDecimalPlaces */
        $pivotDecimalPlaces = $pivot->getAttribute('decimal_places');

        // Assert
        Assert::assertEquals($decimalPlaces, $pivotDecimalPlaces);
    });

    test('it can manage rounding mode', function (): void {
        // Arrange
        $roundingMode = 'half_up';

        $pivot = new TestConcreteMorphPivot();
        $pivot->setAttribute('rounding_mode', $roundingMode);

        // Act
        $pivotRoundingMode = $pivot->getAttribute('rounding_mode');

        // Assert
        Assert::assertEquals($roundingMode, $pivotRoundingMode);
    });
});
