<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Feature;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Modules\Xot\Models\BaseMorphPivot;
use Modules\Xot\Tests\Fixtures\Models\TestConcreteMorphPivot;
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;


class BaseMorphPivotBusinessLogicTest extends TestCase
{
    /** @test */
    public function itExtendsPivotClass(): void
    {
        // Arrange & Act
        $pivot = new TestConcreteMorphPivot();

        // Assert
        Assert::assertInstanceOf(Pivot::class, $pivot);
    }

    /** @test */
    public function itCanManageMorphType(): void
    {
        // Arrange
        $pivot = new TestConcreteMorphPivot();
        $pivot->setAttribute('morph_type', 'App\Models\User');

        // Act
        $morphType = $pivot->getAttribute('morph_type');

        // Assert
        Assert::assertEquals('App\Models\User', $morphType);
    }

    /** @test */
    public function itCanManageMorphId(): void
    {
        // Arrange
        $pivot = new TestConcreteMorphPivot();
        $pivot->setAttribute('morph_id', 123);

        // Act
        $morphId = $pivot->getAttribute('morph_id');

        // Assert
        Assert::assertEquals(123, $morphId);
    }

    /** @test */
    public function itCanManageRelatedType(): void
    {
        // Arrange
        $pivot = new TestConcreteMorphPivot();
        $pivot->setAttribute('related_type', 'App\Models\Post');

        // Act
        $relatedType = $pivot->getAttribute('related_type');

        // Assert
        Assert::assertEquals('App\Models\Post', $relatedType);
    }

    /** @test */
    public function itCanManageRelatedId(): void
    {
        // Arrange
        $pivot = new TestConcreteMorphPivot();
        $pivot->setAttribute('related_id', 456);

        // Act
        $relatedId = $pivot->getAttribute('related_id');

        // Assert
        Assert::assertEquals(456, $relatedId);
    }

    /** @test */
    public function itCanManagePivotAttributes(): void
    {
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
    }

    /** @test */
    public function itCanManageTimestamps(): void
    {
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
    }

    /** @test */
    public function itCanManageSoftDeletes(): void
    {
        // Arrange
        $pivot = new TestConcreteMorphPivot();
        $deletedAt = now();
        $pivot->setAttribute('deleted_at', $deletedAt);

        // Act
        $pivotDeletedAt = $pivot->getAttribute('deleted_at');

        // Assert
        Assert::assertEquals($deletedAt, $pivotDeletedAt);
    }

    /** @test */
    public function itCanManageTenantId(): void
    {
        // Arrange
        $pivot = new TestConcreteMorphPivot();
        $pivot->setAttribute('tenant_id', 789);

        // Act
        $tenantId = $pivot->getAttribute('tenant_id');

        // Assert
        Assert::assertEquals(789, $tenantId);
    }

    /** @test */
    public function itCanManageUserId(): void
    {
        // Arrange
        $pivot = new TestConcreteMorphPivot();
        $pivot->setAttribute('user_id', 101);

        // Act
        $userId = $pivot->getAttribute('user_id');

        // Assert
        Assert::assertEquals(101, $userId);
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
    }

    /** @test */
    public function itCanManageStatus(): void
    {
        // Arrange
        $pivot = new TestConcreteMorphPivot();
        $pivot->setAttribute('status', 'active');

        // Act
        /** @var string $status */
        $status = $pivot->getAttribute('status');

        // Assert
        Assert::assertEquals('active', $status);
    }

    /** @test */
    public function itCanManagePriority(): void
    {
        // Arrange
        $pivot = new TestConcreteMorphPivot();
        $pivot->setAttribute('priority', 5);

        // Act
        /** @var int $priority */
        $priority = $pivot->getAttribute('priority');

        // Assert
        Assert::assertEquals(5, $priority);
    }

    /** @test */
    public function itCanManageSortOrder(): void
    {
        // Arrange
        $pivot = new TestConcreteMorphPivot();
        $pivot->setAttribute('sort_order', 10);

        // Act
        /** @var int $sortOrder */
        $sortOrder = $pivot->getAttribute('sort_order');

        // Assert
        Assert::assertEquals(10, $sortOrder);
    }

    /** @test */
    public function itCanManageExpiresAt(): void
    {
        // Arrange
        $pivot = new TestConcreteMorphPivot();
        $expiresAt = now()->addDays(30);
        $pivot->setAttribute('expires_at', $expiresAt);

        // Act
        $pivotExpiresAt = $pivot->getAttribute('expires_at');

        // Assert
        Assert::assertEquals($expiresAt, $pivotExpiresAt);
    }

    /** @test */
    public function itCanManageStartsAt(): void
    {
        // Arrange
        $pivot = new TestConcreteMorphPivot();
        $startsAt = now()->addHours(2);
        $pivot->setAttribute('starts_at', $startsAt);

        // Act
        $pivotStartsAt = $pivot->getAttribute('starts_at');

        // Assert
        Assert::assertEquals($startsAt, $pivotStartsAt);
    }

    /** @test */
    public function itCanManageEndsAt(): void
    {
        // Arrange
        $pivot = new TestConcreteMorphPivot();
        $endsAt = now()->addDays(7);
        $pivot->setAttribute('ends_at', $endsAt);

        // Act
        $pivotEndsAt = $pivot->getAttribute('ends_at');

        // Assert
        Assert::assertEquals($endsAt, $pivotEndsAt);
    }

    /** @test */
    public function itCanManageIsActive(): void
    {
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
    }

    /** @test */
    public function itCanManageIsPublic(): void
    {
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
    }

    /** @test */
    public function itCanManageIsFeatured(): void
    {
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
    }

    /** @test */
    public function itCanManageTags(): void
    {
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
    }

    /** @test */
    public function itCanManageCategories(): void
    {
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
    }

    /** @test */
    public function itCanManagePermissions(): void
    {
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
    }

    /** @test */
    public function itCanManageSettings(): void
    {
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
    }

    /** @test */
    public function itCanManageNotes(): void
    {
        // Arrange
        $notes = 'This is a test note for the pivot relationship';

        $pivot = new TestConcreteMorphPivot();
        $pivot->setAttribute('notes', $notes);

        // Act
        $pivotNotes = $pivot->getAttribute('notes');

        // Assert
        Assert::assertEquals($notes, $pivotNotes);
    }

    /** @test */
    public function itCanManageDescription(): void
    {
        // Arrange
        $description = 'Test description for pivot relationship';

        $pivot = new TestConcreteMorphPivot();
        $pivot->setAttribute('description', $description);

        // Act
        $pivotDescription = $pivot->getAttribute('description');

        // Assert
        Assert::assertEquals($description, $pivotDescription);
    }

    /** @test */
    public function itCanManageUrl(): void
    {
        // Arrange
        $url = 'https://example.com/pivot/123';

        $pivot = new TestConcreteMorphPivot();
        $pivot->setAttribute('url', $url);

        // Act
        $pivotUrl = $pivot->getAttribute('url');

        // Assert
        Assert::assertEquals($url, $pivotUrl);
    }

    /** @test */
    public function itCanManageImageUrl(): void
    {
        // Arrange
        $imageUrl = 'https://example.com/images/pivot.jpg';

        $pivot = new TestConcreteMorphPivot();
        $pivot->setAttribute('image_url', $imageUrl);

        // Act
        $pivotImageUrl = $pivot->getAttribute('image_url');

        // Assert
        Assert::assertEquals($imageUrl, $pivotImageUrl);
    }

    /** @test */
    public function itCanManageExternalId(): void
    {
        // Arrange
        $externalId = 'ext_12345';

        $pivot = new TestConcreteMorphPivot();
        $pivot->setAttribute('external_id', $externalId);

        // Act
        $pivotExternalId = $pivot->getAttribute('external_id');

        // Assert
        Assert::assertEquals($externalId, $pivotExternalId);
    }

    /** @test */
    public function itCanManageSource(): void
    {
        // Arrange
        $source = 'api_import';

        $pivot = new TestConcreteMorphPivot();
        $pivot->setAttribute('source', $source);

        // Act
        $pivotSource = $pivot->getAttribute('source');

        // Assert
        Assert::assertEquals($source, $pivotSource);
    }

    /** @test */
    public function itCanManageVersion(): void
    {
        // Arrange
        $version = '1.2.3';

        $pivot = new TestConcreteMorphPivot();
        $pivot->setAttribute('version', $version);

        // Act
        $pivotVersion = $pivot->getAttribute('version');

        // Assert
        Assert::assertEquals($version, $pivotVersion);
    }

    /** @test */
    public function itCanManageHash(): void
    {
        // Arrange
        $hash = 'abc123def456';

        $pivot = new TestConcreteMorphPivot();
        $pivot->setAttribute('hash', $hash);

        // Act
        $pivotHash = $pivot->getAttribute('hash');

        // Assert
        Assert::assertEquals($hash, $pivotHash);
    }

    /** @test */
    public function itCanManageChecksum(): void
    {
        // Arrange
        $checksum = 'sha256:abc123def456';

        $pivot = new TestConcreteMorphPivot();
        $pivot->setAttribute('checksum', $checksum);

        // Act
        $pivotChecksum = $pivot->getAttribute('checksum');

        // Assert
        Assert::assertEquals($checksum, $pivotChecksum);
    }

    /** @test */
    public function itCanManageSize(): void
    {
        // Arrange
        $size = 1024;

        $pivot = new TestConcreteMorphPivot();
        $pivot->setAttribute('size', $size);

        // Act
        /** @var int $pivotSize */
        $pivotSize = $pivot->getAttribute('size');

        // Assert
        Assert::assertEquals($size, $pivotSize);
    }

    /** @test */
    public function itCanManageMimeType(): void
    {
        // Arrange
        $mimeType = 'application/json';

        $pivot = new TestConcreteMorphPivot();
        $pivot->setAttribute('mime_type', $mimeType);

        // Act
        $pivotMimeType = $pivot->getAttribute('mime_type');

        // Assert
        Assert::assertEquals($mimeType, $pivotMimeType);
    }

    /** @test */
    public function itCanManageEncoding(): void
    {
        // Arrange
        $encoding = 'UTF-8';

        $pivot = new TestConcreteMorphPivot();
        $pivot->setAttribute('encoding', $encoding);

        // Act
        $pivotEncoding = $pivot->getAttribute('encoding');

        // Assert
        Assert::assertEquals($encoding, $pivotEncoding);
    }

    /** @test */
    public function itCanManageLanguage(): void
    {
        // Arrange
        $language = 'en';

        $pivot = new TestConcreteMorphPivot();
        $pivot->setAttribute('language', $language);

        // Act
        $pivotLanguage = $pivot->getAttribute('language');

        // Assert
        Assert::assertEquals($language, $pivotLanguage);
    }

    /** @test */
    public function itCanManageLocale(): void
    {
        // Arrange
        $locale = 'en_US';

        $pivot = new TestConcreteMorphPivot();
        $pivot->setAttribute('locale', $locale);

        // Act
        $pivotLocale = $pivot->getAttribute('locale');

        // Assert
        Assert::assertEquals($locale, $pivotLocale);
    }

    /** @test */
    public function itCanManageTimezone(): void
    {
        // Arrange
        $timezone = 'Europe/Rome';

        $pivot = new TestConcreteMorphPivot();
        $pivot->setAttribute('timezone', $timezone);

        // Act
        $pivotTimezone = $pivot->getAttribute('timezone');

        // Assert
        Assert::assertEquals($timezone, $pivotTimezone);
    }

    /** @test */
    public function itCanManageCurrency(): void
    {
        // Arrange
        $currency = 'EUR';

        $pivot = new TestConcreteMorphPivot();
        $pivot->setAttribute('currency', $currency);

        // Act
        $pivotCurrency = $pivot->getAttribute('currency');

        // Assert
        Assert::assertEquals($currency, $pivotCurrency);
    }

    /** @test */
    public function itCanManageDecimalPlaces(): void
    {
        // Arrange
        $decimalPlaces = 2;

        $pivot = new TestConcreteMorphPivot();
        $pivot->setAttribute('decimal_places', $decimalPlaces);

        // Act
        /** @var int $pivotDecimalPlaces */
        $pivotDecimalPlaces = $pivot->getAttribute('decimal_places');

        // Assert
        Assert::assertEquals($decimalPlaces, $pivotDecimalPlaces);
    }

    /** @test */
    public function itCanManageRoundingMode(): void
    {
        // Arrange
        $roundingMode = 'half_up';

        $pivot = new TestConcreteMorphPivot();
        $pivot->setAttribute('rounding_mode', $roundingMode);

        // Act
        $pivotRoundingMode = $pivot->getAttribute('rounding_mode');

        // Assert
        Assert::assertEquals($roundingMode, $pivotRoundingMode);
    }
}
