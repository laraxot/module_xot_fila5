<?php

declare(strict_types=1);

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
namespace Modules\Xot\Tests\Feature;

=======
<<<<<<< HEAD
=======
namespace Modules\Xot\Tests\Feature;

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 73eab74 (.)
>>>>>>> d2b0a27 (.)
<<<<<<< HEAD
>>>>>>> ab8cc3f3 (.)
=======
=======
>>>>>>> 300ef70 (.)
>>>>>>> 6dcebf8a (.)
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\Xot\Models\BaseMorphPivot;
<<<<<<< HEAD
use Tests\TestCase;
=======
<<<<<<< HEAD
use Modules\Xot\Tests\TestCase;

uses(TestCase::class);

test('it extends pivot class', function (): void {
    // Arrange & Act
    $pivot = /** @phpstan-ignore-line new.abstract */ new BaseMorphPivot;

    // Assert
    expect($pivot)->toBeInstanceOf(Pivot::class);
});

test('it can manage morph type', function (): void {
    // Arrange
    $pivot = /** @phpstan-ignore-line new.abstract */ new BaseMorphPivot;
    $pivot->morph_type = 'App\Models\User';

    // Act
    $morphType = $pivot->morph_type;

    // Assert
    expect($morphType)->toBe('App\Models\User');
});

test('it can manage morph id', function (): void {
    // Arrange
    $pivot = /** @phpstan-ignore-line new.abstract */ new BaseMorphPivot;
    $pivot->morph_id = 123;

    // Act
    $morphId = $pivot->morph_id;

    // Assert
    expect($morphId)->toBe(123);
});

test('it can manage related type', function (): void {
    // Arrange
    $pivot = /** @phpstan-ignore-line new.abstract */ new BaseMorphPivot;
    $pivot->related_type = 'App\Models\Post';

    // Act & Assert
    expect($pivot->related_type)->toBe('App\Models\Post');
});

test('it can manage related id', function (): void {
    // Arrange
    $pivot = /** @phpstan-ignore-line new.abstract */ new BaseMorphPivot;
    $pivot->related_id = 456;

    // Act & Assert
    expect($pivot->related_id)->toBe(456);
});

test('it can manage pivot attributes', function (): void {
    // Arrange
    $pivot = /** @phpstan-ignore-line new.abstract */ new BaseMorphPivot;
    $pivot->setAttribute('custom_field', 'custom_value');
    $pivot->setAttribute('numeric_field', 42);

    // Act & Assert
    expect($pivot->getAttribute('custom_field'))->toBe('custom_value')
        ->and($pivot->getAttribute('numeric_field'))->toBe(42);
});

test('it can manage timestamps', function (): void {
    // Arrange
    $pivot = /** @phpstan-ignore-line new.abstract */ new BaseMorphPivot;
    $now = now();
    $pivot->created_at = $now;
    $pivot->updated_at = $now;

    // Act & Assert
    expect($pivot->created_at)->toBe($now)
        ->and($pivot->updated_at)->toBe($now);
});

test('it can manage soft deletes', function (): void {
    // Arrange
    $pivot = /** @phpstan-ignore-line new.abstract */ new BaseMorphPivot;
    $deletedAt = now();
    $pivot->deleted_at = $deletedAt;

    // Act & Assert
    expect($pivot->deleted_at)->toBe($deletedAt);
});

test('it can manage tenant id', function (): void {
    // Arrange
    $pivot = /** @phpstan-ignore-line new.abstract */ new BaseMorphPivot;
    $pivot->tenant_id = 789;

    // Act & Assert
    expect($pivot->tenant_id)->toBe(789);
});

test('it can manage user id', function (): void {
    // Arrange
    $pivot = /** @phpstan-ignore-line new.abstract */ new BaseMorphPivot;
    $pivot->user_id = 101;

    // Act & Assert
    expect($pivot->user_id)->toBe(101);
});

test('it can manage metadata', function (): void {
    // Arrange
    $metadata = [
        'source' => 'api',
        'ip_address' => '192.168.1.1',
        'user_agent' => 'Test Browser',
        'session_id' => 'session123',
    ];

    $pivot = /** @phpstan-ignore-line new.abstract */ new BaseMorphPivot;
    $pivot->metadata = $metadata;

    // Act & Assert
    expect($pivot->metadata)->toBeArray()
        ->and($pivot->metadata['source'])->toBe('api')
        ->and($pivot->metadata['ip_address'])->toBe('192.168.1.1')
        ->and($pivot->metadata['user_agent'])->toBe('Test Browser')
        ->and($pivot->metadata['session_id'])->toBe('session123');
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

    $pivot = /** @phpstan-ignore-line new.abstract */ new BaseMorphPivot;
    $pivot->extra_data = $extraData;

    // Act & Assert
    expect($pivot->extra_data)->toBeArray()
        ->and($pivot->extra_data['field1'])->toBe('value1')
        ->and($pivot->extra_data['field2'])->toBe('value2')
        ->and($pivot->extra_data['nested']['key'])->toBe('value');
});

test('it can manage status', function (): void {
    $pivot = /** @phpstan-ignore-line new.abstract */ new BaseMorphPivot;
    $pivot->status = 'active';
    expect($pivot->status)->toBe('active');
});

test('it can manage priority', function (): void {
    $pivot = /** @phpstan-ignore-line new.abstract */ new BaseMorphPivot;
    $pivot->priority = 5;
    expect($pivot->priority)->toBe(5);
});

test('it can manage sort order', function (): void {
    $pivot = /** @phpstan-ignore-line new.abstract */ new BaseMorphPivot;
    $pivot->sort_order = 10;
    expect($pivot->sort_order)->toBe(10);
});

test('it can manage expires at', function (): void {
    $pivot = /** @phpstan-ignore-line new.abstract */ new BaseMorphPivot;
    $expiresAt = now()->addDays(30);
    $pivot->expires_at = $expiresAt;
    expect($pivot->expires_at)->toBe($expiresAt);
});

test('it can manage starts at', function (): void {
    $pivot = /** @phpstan-ignore-line new.abstract */ new BaseMorphPivot;
    $startsAt = now()->addHours(2);
    $pivot->starts_at = $startsAt;
    expect($pivot->starts_at)->toBe($startsAt);
});

test('it can manage ends at', function (): void {
    $pivot = /** @phpstan-ignore-line new.abstract */ new BaseMorphPivot;
    $endsAt = now()->addDays(7);
    $pivot->ends_at = $endsAt;
    expect($pivot->ends_at)->toBe($endsAt);
});

test('it can manage is active', function (): void {
    $pivot = /** @phpstan-ignore-line new.abstract */ new BaseMorphPivot;
    $pivot->is_active = true;
    expect($pivot->is_active)->toBeTrue();

    $pivot->is_active = false;
    expect($pivot->is_active)->toBeFalse();
});

test('it can manage is public', function (): void {
    $pivot = /** @phpstan-ignore-line new.abstract */ new BaseMorphPivot;
    $pivot->is_public = false;
    expect($pivot->is_public)->toBeFalse();

    $pivot->is_public = true;
    expect($pivot->is_public)->toBeTrue();
});

test('it can manage is featured', function (): void {
    $pivot = /** @phpstan-ignore-line new.abstract */ new BaseMorphPivot;
    $pivot->is_featured = false;
    expect($pivot->is_featured)->toBeFalse();

    $pivot->is_featured = true;
    expect($pivot->is_featured)->toBeTrue();
});

test('it can manage tags', function (): void {
    $tags = ['tag1', 'tag2', 'important'];
    $pivot = /** @phpstan-ignore-line new.abstract */ new BaseMorphPivot;
    $pivot->tags = $tags;

    expect($pivot->tags)->toBeArray()
        ->and($pivot->tags)->toContain('tag1')
        ->and($pivot->tags)->toContain('tag2')
        ->and($pivot->tags)->toContain('important')
        ->and($pivot->tags)->toHaveCount(3);
});

test('it can manage categories', function (): void {
    $categories = ['category1', 'category2'];
    $pivot = /** @phpstan-ignore-line new.abstract */ new BaseMorphPivot;
    $pivot->categories = $categories;

    expect($pivot->categories)->toBeArray()
        ->and($pivot->categories)->toContain('category1')
        ->and($pivot->categories)->toContain('category2')
        ->and($pivot->categories)->toHaveCount(2);
});

test('it can manage permissions', function (): void {
    $permissions = [
        'read' => true,
        'write' => false,
        'delete' => false,
    ];
    $pivot = /** @phpstan-ignore-line new.abstract */ new BaseMorphPivot;
    $pivot->permissions = $permissions;

    expect($pivot->permissions)->toBeArray()
        ->and($pivot->permissions['read'])->toBeTrue()
        ->and($pivot->permissions['write'])->toBeFalse()
        ->and($pivot->permissions['delete'])->toBeFalse();
});

test('it can manage settings', function (): void {
    $settings = [
        'notifications' => true,
        'auto_save' => false,
        'timeout' => 30,
    ];
    $pivot = /** @phpstan-ignore-line new.abstract */ new BaseMorphPivot;
    $pivot->settings = $settings;

    expect($pivot->settings)->toBeArray()
        ->and($pivot->settings['notifications'])->toBeTrue()
        ->and($pivot->settings['auto_save'])->toBeFalse()
        ->and($pivot->settings['timeout'])->toBe(30);
});

test('it can manage notes', function (): void {
    $notes = 'This is a test note for the pivot relationship';
    $pivot = /** @phpstan-ignore-line new.abstract */ new BaseMorphPivot;
    $pivot->notes = $notes;
    expect($pivot->notes)->toBe($notes);
});

test('it can manage description', function (): void {
    $description = 'Test description for pivot relationship';
    $pivot = /** @phpstan-ignore-line new.abstract */ new BaseMorphPivot;
    $pivot->description = $description;
    expect($pivot->description)->toBe($description);
});

test('it can manage url', function (): void {
    $url = 'https://example.com/pivot/123';
    $pivot = /** @phpstan-ignore-line new.abstract */ new BaseMorphPivot;
    $pivot->url = $url;
    expect($pivot->url)->toBe($url);
});

test('it can manage image url', function (): void {
    $imageUrl = 'https://example.com/images/pivot.jpg';
    $pivot = /** @phpstan-ignore-line new.abstract */ new BaseMorphPivot;
    $pivot->image_url = $imageUrl;
    expect($pivot->image_url)->toBe($imageUrl);
});

test('it can manage external id', function (): void {
    $externalId = 'ext_12345';
    $pivot = /** @phpstan-ignore-line new.abstract */ new BaseMorphPivot;
    $pivot->external_id = $externalId;
    expect($pivot->external_id)->toBe($externalId);
});

test('it can manage source', function (): void {
    $source = 'api_import';
    $pivot = /** @phpstan-ignore-line new.abstract */ new BaseMorphPivot;
    $pivot->source = $source;
    expect($pivot->source)->toBe($source);
});

test('it can manage version', function (): void {
    $version = '1.2.3';
    $pivot = /** @phpstan-ignore-line new.abstract */ new BaseMorphPivot;
    $pivot->version = $version;
    expect($pivot->version)->toBe($version);
});

test('it can manage hash', function (): void {
    $hash = 'abc123def456';
    $pivot = /** @phpstan-ignore-line new.abstract */ new BaseMorphPivot;
    $pivot->hash = $hash;
    expect($pivot->hash)->toBe($hash);
});

test('it can manage checksum', function (): void {
    $checksum = 'sha256:abc123def456';
    $pivot = /** @phpstan-ignore-line new.abstract */ new BaseMorphPivot;
    $pivot->checksum = $checksum;
    expect($pivot->checksum)->toBe($checksum);
});

test('it can manage size', function (): void {
    $size = 1024;
    $pivot = /** @phpstan-ignore-line new.abstract */ new BaseMorphPivot;
    $pivot->size = $size;
    expect($pivot->size)->toBe($size);
});

test('it can manage mime type', function (): void {
    $mimeType = 'application/json';
    $pivot = /** @phpstan-ignore-line new.abstract */ new BaseMorphPivot;
    $pivot->mime_type = $mimeType;
    expect($pivot->mime_type)->toBe($mimeType);
});

test('it can manage encoding', function (): void {
    $encoding = 'UTF-8';
    $pivot = /** @phpstan-ignore-line new.abstract */ new BaseMorphPivot;
    $pivot->encoding = $encoding;
    expect($pivot->encoding)->toBe($encoding);
});

test('it can manage language', function (): void {
    $language = 'en';
    $pivot = /** @phpstan-ignore-line new.abstract */ new BaseMorphPivot;
    $pivot->language = $language;
    expect($pivot->language)->toBe($language);
});

test('it can manage locale', function (): void {
    $locale = 'en_US';
    $pivot = /** @phpstan-ignore-line new.abstract */ new BaseMorphPivot;
    $pivot->locale = $locale;
    expect($pivot->locale)->toBe($locale);
});

test('it can manage timezone', function (): void {
    $timezone = 'Europe/Rome';
    $pivot = /** @phpstan-ignore-line new.abstract */ new BaseMorphPivot;
    $pivot->timezone = $timezone;
    expect($pivot->timezone)->toBe($timezone);
});

test('it can manage currency', function (): void {
    $currency = 'EUR';
    $pivot = /** @phpstan-ignore-line new.abstract */ new BaseMorphPivot;
    $pivot->currency = $currency;
    expect($pivot->currency)->toBe($currency);
});

test('it can manage decimal places', function (): void {
    $decimalPlaces = 2;
    $pivot = /** @phpstan-ignore-line new.abstract */ new BaseMorphPivot;
    $pivot->decimal_places = $decimalPlaces;
    expect($pivot->decimal_places)->toBe($decimalPlaces);
});

test('it can manage rounding mode', function (): void {
    $roundingMode = 'half_up';
    $pivot = /** @phpstan-ignore-line new.abstract */ new BaseMorphPivot;
    $pivot->rounding_mode = $roundingMode;
    expect($pivot->rounding_mode)->toBe($roundingMode);
});
=======
=======
>>>>>>> b7afadf9 (.)
=======
namespace Modules\Xot\Tests\Feature;

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 73eab74 (.)
>>>>>>> d2b0a27 (.)
=======
>>>>>>> 300ef70 (.)
use Illuminate\Database\Eloquent\Relations\Pivot;
use Modules\Xot\Models\BaseMorphPivot;
<<<<<<< HEAD
>>>>>>> 53d6a6ba (.)
=======
<<<<<<< HEAD
use Modules\Xot\Tests\TestCase;

uses(TestCase::class);

test('it extends pivot class', function (): void {
    // Arrange & Act
    $pivot = /** @phpstan-ignore-line new.abstract */ new BaseMorphPivot;

    // Assert
    expect($pivot)->toBeInstanceOf(Pivot::class);
});

test('it can manage morph type', function (): void {
    // Arrange
    $pivot = /** @phpstan-ignore-line new.abstract */ new BaseMorphPivot;
    $pivot->morph_type = 'App\Models\User';

    // Act
    $morphType = $pivot->morph_type;

    // Assert
    expect($morphType)->toBe('App\Models\User');
});

test('it can manage morph id', function (): void {
    // Arrange
    $pivot = /** @phpstan-ignore-line new.abstract */ new BaseMorphPivot;
    $pivot->morph_id = 123;

    // Act
    $morphId = $pivot->morph_id;

    // Assert
    expect($morphId)->toBe(123);
});

test('it can manage related type', function (): void {
    // Arrange
    $pivot = /** @phpstan-ignore-line new.abstract */ new BaseMorphPivot;
    $pivot->related_type = 'App\Models\Post';

    // Act & Assert
    expect($pivot->related_type)->toBe('App\Models\Post');
});

test('it can manage related id', function (): void {
    // Arrange
    $pivot = /** @phpstan-ignore-line new.abstract */ new BaseMorphPivot;
    $pivot->related_id = 456;

    // Act & Assert
    expect($pivot->related_id)->toBe(456);
});

test('it can manage pivot attributes', function (): void {
    // Arrange
    $pivot = /** @phpstan-ignore-line new.abstract */ new BaseMorphPivot;
    $pivot->setAttribute('custom_field', 'custom_value');
    $pivot->setAttribute('numeric_field', 42);

    // Act & Assert
    expect($pivot->getAttribute('custom_field'))->toBe('custom_value')
        ->and($pivot->getAttribute('numeric_field'))->toBe(42);
});

test('it can manage timestamps', function (): void {
    // Arrange
    $pivot = /** @phpstan-ignore-line new.abstract */ new BaseMorphPivot;
    $now = now();
    $pivot->created_at = $now;
    $pivot->updated_at = $now;

    // Act & Assert
    expect($pivot->created_at)->toBe($now)
        ->and($pivot->updated_at)->toBe($now);
});

test('it can manage soft deletes', function (): void {
    // Arrange
    $pivot = /** @phpstan-ignore-line new.abstract */ new BaseMorphPivot;
    $deletedAt = now();
    $pivot->deleted_at = $deletedAt;

    // Act & Assert
    expect($pivot->deleted_at)->toBe($deletedAt);
});

test('it can manage tenant id', function (): void {
    // Arrange
    $pivot = /** @phpstan-ignore-line new.abstract */ new BaseMorphPivot;
    $pivot->tenant_id = 789;

    // Act & Assert
    expect($pivot->tenant_id)->toBe(789);
});

test('it can manage user id', function (): void {
    // Arrange
    $pivot = /** @phpstan-ignore-line new.abstract */ new BaseMorphPivot;
    $pivot->user_id = 101;

    // Act & Assert
    expect($pivot->user_id)->toBe(101);
});

test('it can manage metadata', function (): void {
    // Arrange
    $metadata = [
        'source' => 'api',
        'ip_address' => '192.168.1.1',
        'user_agent' => 'Test Browser',
        'session_id' => 'session123',
    ];

    $pivot = /** @phpstan-ignore-line new.abstract */ new BaseMorphPivot;
    $pivot->metadata = $metadata;

    // Act & Assert
    expect($pivot->metadata)->toBeArray()
        ->and($pivot->metadata['source'])->toBe('api')
        ->and($pivot->metadata['ip_address'])->toBe('192.168.1.1')
        ->and($pivot->metadata['user_agent'])->toBe('Test Browser')
        ->and($pivot->metadata['session_id'])->toBe('session123');
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

    $pivot = /** @phpstan-ignore-line new.abstract */ new BaseMorphPivot;
    $pivot->extra_data = $extraData;

    // Act & Assert
    expect($pivot->extra_data)->toBeArray()
        ->and($pivot->extra_data['field1'])->toBe('value1')
        ->and($pivot->extra_data['field2'])->toBe('value2')
        ->and($pivot->extra_data['nested']['key'])->toBe('value');
});

test('it can manage status', function (): void {
    $pivot = /** @phpstan-ignore-line new.abstract */ new BaseMorphPivot;
    $pivot->status = 'active';
    expect($pivot->status)->toBe('active');
});

test('it can manage priority', function (): void {
    $pivot = /** @phpstan-ignore-line new.abstract */ new BaseMorphPivot;
    $pivot->priority = 5;
    expect($pivot->priority)->toBe(5);
});

test('it can manage sort order', function (): void {
    $pivot = /** @phpstan-ignore-line new.abstract */ new BaseMorphPivot;
    $pivot->sort_order = 10;
    expect($pivot->sort_order)->toBe(10);
});

test('it can manage expires at', function (): void {
    $pivot = /** @phpstan-ignore-line new.abstract */ new BaseMorphPivot;
    $expiresAt = now()->addDays(30);
    $pivot->expires_at = $expiresAt;
    expect($pivot->expires_at)->toBe($expiresAt);
});

test('it can manage starts at', function (): void {
    $pivot = /** @phpstan-ignore-line new.abstract */ new BaseMorphPivot;
    $startsAt = now()->addHours(2);
    $pivot->starts_at = $startsAt;
    expect($pivot->starts_at)->toBe($startsAt);
});

test('it can manage ends at', function (): void {
    $pivot = /** @phpstan-ignore-line new.abstract */ new BaseMorphPivot;
    $endsAt = now()->addDays(7);
    $pivot->ends_at = $endsAt;
    expect($pivot->ends_at)->toBe($endsAt);
});

test('it can manage is active', function (): void {
    $pivot = /** @phpstan-ignore-line new.abstract */ new BaseMorphPivot;
    $pivot->is_active = true;
    expect($pivot->is_active)->toBeTrue();

    $pivot->is_active = false;
    expect($pivot->is_active)->toBeFalse();
});

test('it can manage is public', function (): void {
    $pivot = /** @phpstan-ignore-line new.abstract */ new BaseMorphPivot;
    $pivot->is_public = false;
    expect($pivot->is_public)->toBeFalse();

    $pivot->is_public = true;
    expect($pivot->is_public)->toBeTrue();
});

test('it can manage is featured', function (): void {
    $pivot = /** @phpstan-ignore-line new.abstract */ new BaseMorphPivot;
    $pivot->is_featured = false;
    expect($pivot->is_featured)->toBeFalse();

    $pivot->is_featured = true;
    expect($pivot->is_featured)->toBeTrue();
});

test('it can manage tags', function (): void {
    $tags = ['tag1', 'tag2', 'important'];
    $pivot = /** @phpstan-ignore-line new.abstract */ new BaseMorphPivot;
    $pivot->tags = $tags;

    expect($pivot->tags)->toBeArray()
        ->and($pivot->tags)->toContain('tag1')
        ->and($pivot->tags)->toContain('tag2')
        ->and($pivot->tags)->toContain('important')
        ->and($pivot->tags)->toHaveCount(3);
});

test('it can manage categories', function (): void {
    $categories = ['category1', 'category2'];
    $pivot = /** @phpstan-ignore-line new.abstract */ new BaseMorphPivot;
    $pivot->categories = $categories;

    expect($pivot->categories)->toBeArray()
        ->and($pivot->categories)->toContain('category1')
        ->and($pivot->categories)->toContain('category2')
        ->and($pivot->categories)->toHaveCount(2);
});

test('it can manage permissions', function (): void {
    $permissions = [
        'read' => true,
        'write' => false,
        'delete' => false,
    ];
    $pivot = /** @phpstan-ignore-line new.abstract */ new BaseMorphPivot;
    $pivot->permissions = $permissions;

    expect($pivot->permissions)->toBeArray()
        ->and($pivot->permissions['read'])->toBeTrue()
        ->and($pivot->permissions['write'])->toBeFalse()
        ->and($pivot->permissions['delete'])->toBeFalse();
});

test('it can manage settings', function (): void {
    $settings = [
        'notifications' => true,
        'auto_save' => false,
        'timeout' => 30,
    ];
    $pivot = /** @phpstan-ignore-line new.abstract */ new BaseMorphPivot;
    $pivot->settings = $settings;

    expect($pivot->settings)->toBeArray()
        ->and($pivot->settings['notifications'])->toBeTrue()
        ->and($pivot->settings['auto_save'])->toBeFalse()
        ->and($pivot->settings['timeout'])->toBe(30);
});

test('it can manage notes', function (): void {
    $notes = 'This is a test note for the pivot relationship';
    $pivot = /** @phpstan-ignore-line new.abstract */ new BaseMorphPivot;
    $pivot->notes = $notes;
    expect($pivot->notes)->toBe($notes);
});

test('it can manage description', function (): void {
    $description = 'Test description for pivot relationship';
    $pivot = /** @phpstan-ignore-line new.abstract */ new BaseMorphPivot;
    $pivot->description = $description;
    expect($pivot->description)->toBe($description);
});

test('it can manage url', function (): void {
    $url = 'https://example.com/pivot/123';
    $pivot = /** @phpstan-ignore-line new.abstract */ new BaseMorphPivot;
    $pivot->url = $url;
    expect($pivot->url)->toBe($url);
});

test('it can manage image url', function (): void {
    $imageUrl = 'https://example.com/images/pivot.jpg';
    $pivot = /** @phpstan-ignore-line new.abstract */ new BaseMorphPivot;
    $pivot->image_url = $imageUrl;
    expect($pivot->image_url)->toBe($imageUrl);
});

test('it can manage external id', function (): void {
    $externalId = 'ext_12345';
    $pivot = /** @phpstan-ignore-line new.abstract */ new BaseMorphPivot;
    $pivot->external_id = $externalId;
    expect($pivot->external_id)->toBe($externalId);
});

test('it can manage source', function (): void {
    $source = 'api_import';
    $pivot = /** @phpstan-ignore-line new.abstract */ new BaseMorphPivot;
    $pivot->source = $source;
    expect($pivot->source)->toBe($source);
});

test('it can manage version', function (): void {
    $version = '1.2.3';
    $pivot = /** @phpstan-ignore-line new.abstract */ new BaseMorphPivot;
    $pivot->version = $version;
    expect($pivot->version)->toBe($version);
});

test('it can manage hash', function (): void {
    $hash = 'abc123def456';
    $pivot = /** @phpstan-ignore-line new.abstract */ new BaseMorphPivot;
    $pivot->hash = $hash;
    expect($pivot->hash)->toBe($hash);
});

test('it can manage checksum', function (): void {
    $checksum = 'sha256:abc123def456';
    $pivot = /** @phpstan-ignore-line new.abstract */ new BaseMorphPivot;
    $pivot->checksum = $checksum;
    expect($pivot->checksum)->toBe($checksum);
});

test('it can manage size', function (): void {
    $size = 1024;
    $pivot = /** @phpstan-ignore-line new.abstract */ new BaseMorphPivot;
    $pivot->size = $size;
    expect($pivot->size)->toBe($size);
});

test('it can manage mime type', function (): void {
    $mimeType = 'application/json';
    $pivot = /** @phpstan-ignore-line new.abstract */ new BaseMorphPivot;
    $pivot->mime_type = $mimeType;
    expect($pivot->mime_type)->toBe($mimeType);
});

test('it can manage encoding', function (): void {
    $encoding = 'UTF-8';
    $pivot = /** @phpstan-ignore-line new.abstract */ new BaseMorphPivot;
    $pivot->encoding = $encoding;
    expect($pivot->encoding)->toBe($encoding);
});

test('it can manage language', function (): void {
    $language = 'en';
    $pivot = /** @phpstan-ignore-line new.abstract */ new BaseMorphPivot;
    $pivot->language = $language;
    expect($pivot->language)->toBe($language);
});

test('it can manage locale', function (): void {
    $locale = 'en_US';
    $pivot = /** @phpstan-ignore-line new.abstract */ new BaseMorphPivot;
    $pivot->locale = $locale;
    expect($pivot->locale)->toBe($locale);
});

test('it can manage timezone', function (): void {
    $timezone = 'Europe/Rome';
    $pivot = /** @phpstan-ignore-line new.abstract */ new BaseMorphPivot;
    $pivot->timezone = $timezone;
    expect($pivot->timezone)->toBe($timezone);
});

test('it can manage currency', function (): void {
    $currency = 'EUR';
    $pivot = /** @phpstan-ignore-line new.abstract */ new BaseMorphPivot;
    $pivot->currency = $currency;
    expect($pivot->currency)->toBe($currency);
});

test('it can manage decimal places', function (): void {
    $decimalPlaces = 2;
    $pivot = /** @phpstan-ignore-line new.abstract */ new BaseMorphPivot;
    $pivot->decimal_places = $decimalPlaces;
    expect($pivot->decimal_places)->toBe($decimalPlaces);
});

test('it can manage rounding mode', function (): void {
    $roundingMode = 'half_up';
    $pivot = /** @phpstan-ignore-line new.abstract */ new BaseMorphPivot;
    $pivot->rounding_mode = $roundingMode;
    expect($pivot->rounding_mode)->toBe($roundingMode);
});
=======
>>>>>>> b7afadf9 (.)
=======
namespace Modules\Xot\Tests\Feature;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\Xot\Models\BaseMorphPivot;
>>>>>>> 71586de2 (.)
use Tests\TestCase;
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 3ae5e299 (.)
=======
>>>>>>> 96276392 (.)
=======
>>>>>>> d79d36e0 (.)
=======
>>>>>>> 5e58b29b (.)
=======
>>>>>>> 1c4bb8cf (.)
=======
=======
=======
>>>>>>> cc52d333 (.)
=======
>>>>>>> 90d386aa (.)
=======
>>>>>>> 3eee6f79 (.)
=======
=======
=======
>>>>>>> origin/develop
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> e0b8ebe3 (.)
=======
=======
>>>>>>> a62d7646 (.)
=======
>>>>>>> cc52d333 (.)
=======
=======
>>>>>>> 099ab7a0 (.)
=======
>>>>>>> 90d386aa (.)
=======
=======
>>>>>>> 6d1255a8 (.)
=======
>>>>>>> 3eee6f79 (.)
use Modules\Xot\Models\BaseMorphPivot;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Eloquent\Relations\Pivot;
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> f1d4085 (.)
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 73eab74 (.)
>>>>>>> ab8cc3f3 (.)
=======
>>>>>>> 6dcebf8a (.)
=======
>>>>>>> 5e58b29b (.)
=======
=======
>>>>>>> 73eab74 (.)
>>>>>>> 1c4bb8cf (.)
=======
>>>>>>> cafe8bed (.)
=======
<<<<<<< HEAD
=======
>>>>>>> cc52d333 (.)
=======
>>>>>>> 90d386aa (.)
=======
>>>>>>> 3eee6f79 (.)
>>>>>>> a12f125f4a (.)
=======
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\Xot\Models\BaseMorphPivot;
use Tests\TestCase;
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 6cba4fe (.)
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> e0b8ebe3 (.)
=======
>>>>>>> b956ebe0 (.)
=======
>>>>>>> f1d4085 (.)
>>>>>>> a62d7646 (.)
=======
=======
>>>>>>> 73eab74 (.)
>>>>>>> d79d36e0 (.)
=======
>>>>>>> 5cd593a5 (.)
=======
>>>>>>> cc52d333 (.)
=======
>>>>>>> 0123915b (.)
=======
>>>>>>> f1d4085 (.)
>>>>>>> 099ab7a0 (.)
=======
=======
>>>>>>> 73eab74 (.)
>>>>>>> 96276392 (.)
=======
>>>>>>> 3baa48bd (.)
=======
>>>>>>> 90d386aa (.)
=======
>>>>>>> 4fb9bc4b (.)
=======
>>>>>>> f1d4085 (.)
>>>>>>> 6d1255a8 (.)
=======
=======
>>>>>>> 73eab74 (.)
>>>>>>> 3ae5e299 (.)
=======
>>>>>>> 5b07d268 (.)
=======
>>>>>>> 3eee6f79 (.)
=======
>>>>>>> c2f6854c (.)
=======
namespace Modules\Xot\Tests\Feature;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\Xot\Models\BaseMorphPivot;
use Tests\TestCase;
>>>>>>> 249a0067 (.)

class BaseMorphPivotBusinessLogicTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_extends_pivot_class(): void
    {
        // Arrange & Act
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        $pivot = new BaseMorphPivot;
=======
        $pivot = new BaseMorphPivot();
>>>>>>> 5a14301c (.)
=======
        $pivot = new BaseMorphPivot();
>>>>>>> 5a14301c (.)
=======
        $pivot = new BaseMorphPivot();
>>>>>>> ab8cc3f3 (.)
=======
        $pivot = new BaseMorphPivot;
>>>>>>> 249a0067 (.)

        // Assert
        $this->assertInstanceOf(Pivot::class, $pivot);
    }

    /** @test */
    public function it_can_manage_morph_type(): void
    {
        // Arrange
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        $pivot = new BaseMorphPivot;
=======
        $pivot = new BaseMorphPivot();
>>>>>>> 5a14301c (.)
=======
        $pivot = new BaseMorphPivot();
>>>>>>> 5a14301c (.)
=======
        $pivot = new BaseMorphPivot();
>>>>>>> ab8cc3f3 (.)
=======
        $pivot = new BaseMorphPivot;
>>>>>>> 249a0067 (.)
        $pivot->morph_type = 'App\Models\User';

        // Act
        $morphType = $pivot->morph_type;

        // Assert
        $this->assertEquals('App\Models\User', $morphType);
    }

    /** @test */
    public function it_can_manage_morph_id(): void
    {
        // Arrange
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        $pivot = new BaseMorphPivot;
=======
        $pivot = new BaseMorphPivot();
>>>>>>> 5a14301c (.)
=======
        $pivot = new BaseMorphPivot();
>>>>>>> 5a14301c (.)
=======
        $pivot = new BaseMorphPivot();
>>>>>>> ab8cc3f3 (.)
=======
        $pivot = new BaseMorphPivot;
>>>>>>> 249a0067 (.)
        $pivot->morph_id = 123;

        // Act
        $morphId = $pivot->morph_id;

        // Assert
        $this->assertEquals(123, $morphId);
    }

    /** @test */
    public function it_can_manage_related_type(): void
    {
        // Arrange
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        $pivot = new BaseMorphPivot;
=======
        $pivot = new BaseMorphPivot();
>>>>>>> 5a14301c (.)
=======
        $pivot = new BaseMorphPivot();
>>>>>>> 5a14301c (.)
=======
        $pivot = new BaseMorphPivot();
>>>>>>> ab8cc3f3 (.)
=======
        $pivot = new BaseMorphPivot;
>>>>>>> 249a0067 (.)
        $pivot->related_type = 'App\Models\Post';

        // Act
        $relatedType = $pivot->related_type;

        // Assert
        $this->assertEquals('App\Models\Post', $relatedType);
    }

    /** @test */
    public function it_can_manage_related_id(): void
    {
        // Arrange
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        $pivot = new BaseMorphPivot;
=======
        $pivot = new BaseMorphPivot();
>>>>>>> 5a14301c (.)
=======
        $pivot = new BaseMorphPivot();
>>>>>>> 5a14301c (.)
=======
        $pivot = new BaseMorphPivot();
>>>>>>> ab8cc3f3 (.)
=======
        $pivot = new BaseMorphPivot;
>>>>>>> 249a0067 (.)
        $pivot->related_id = 456;

        // Act
        $relatedId = $pivot->related_id;

        // Assert
        $this->assertEquals(456, $relatedId);
    }

    /** @test */
    public function it_can_manage_pivot_attributes(): void
    {
        // Arrange
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        $pivot = new BaseMorphPivot;
=======
        $pivot = new BaseMorphPivot();
>>>>>>> 5a14301c (.)
=======
        $pivot = new BaseMorphPivot();
>>>>>>> 5a14301c (.)
=======
        $pivot = new BaseMorphPivot();
>>>>>>> ab8cc3f3 (.)
=======
        $pivot = new BaseMorphPivot;
>>>>>>> 249a0067 (.)
        $pivot->setAttribute('custom_field', 'custom_value');
        $pivot->setAttribute('numeric_field', 42);

        // Act
        $customField = $pivot->getAttribute('custom_field');
        $numericField = $pivot->getAttribute('numeric_field');

        // Assert
        $this->assertEquals('custom_value', $customField);
        $this->assertEquals(42, $numericField);
    }

    /** @test */
    public function it_can_manage_timestamps(): void
    {
        // Arrange
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        $pivot = new BaseMorphPivot;
=======
        $pivot = new BaseMorphPivot();
>>>>>>> 5a14301c (.)
=======
        $pivot = new BaseMorphPivot();
>>>>>>> 5a14301c (.)
=======
        $pivot = new BaseMorphPivot();
>>>>>>> ab8cc3f3 (.)
=======
        $pivot = new BaseMorphPivot;
>>>>>>> 249a0067 (.)
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
    public function it_can_manage_soft_deletes(): void
    {
        // Arrange
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        $pivot = new BaseMorphPivot;
=======
        $pivot = new BaseMorphPivot();
>>>>>>> 5a14301c (.)
=======
        $pivot = new BaseMorphPivot();
>>>>>>> 5a14301c (.)
=======
        $pivot = new BaseMorphPivot();
>>>>>>> ab8cc3f3 (.)
=======
        $pivot = new BaseMorphPivot;
>>>>>>> 249a0067 (.)
        $deletedAt = now();
        $pivot->deleted_at = $deletedAt;

        // Act
        $pivotDeletedAt = $pivot->deleted_at;

        // Assert
        $this->assertEquals($deletedAt, $pivotDeletedAt);
    }

    /** @test */
    public function it_can_manage_tenant_id(): void
    {
        // Arrange
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        $pivot = new BaseMorphPivot;
=======
        $pivot = new BaseMorphPivot();
>>>>>>> 5a14301c (.)
=======
        $pivot = new BaseMorphPivot();
>>>>>>> 5a14301c (.)
=======
        $pivot = new BaseMorphPivot();
>>>>>>> ab8cc3f3 (.)
=======
        $pivot = new BaseMorphPivot;
>>>>>>> 249a0067 (.)
        $pivot->tenant_id = 789;

        // Act
        $tenantId = $pivot->tenant_id;

        // Assert
        $this->assertEquals(789, $tenantId);
    }

    /** @test */
    public function it_can_manage_user_id(): void
    {
        // Arrange
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        $pivot = new BaseMorphPivot;
=======
        $pivot = new BaseMorphPivot();
>>>>>>> 5a14301c (.)
=======
        $pivot = new BaseMorphPivot();
>>>>>>> 5a14301c (.)
=======
        $pivot = new BaseMorphPivot();
>>>>>>> ab8cc3f3 (.)
=======
        $pivot = new BaseMorphPivot;
>>>>>>> 249a0067 (.)
        $pivot->user_id = 101;

        // Act
        $userId = $pivot->user_id;

        // Assert
        $this->assertEquals(101, $userId);
    }

    /** @test */
    public function it_can_manage_metadata(): void
    {
        // Arrange
        $metadata = [
            'source' => 'api',
            'ip_address' => '192.168.1.1',
            'user_agent' => 'Test Browser',
            'session_id' => 'session123',
        ];

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        $pivot = new BaseMorphPivot;
=======
        $pivot = new BaseMorphPivot();
>>>>>>> 5a14301c (.)
=======
        $pivot = new BaseMorphPivot();
>>>>>>> 5a14301c (.)
=======
        $pivot = new BaseMorphPivot();
>>>>>>> ab8cc3f3 (.)
=======
        $pivot = new BaseMorphPivot;
>>>>>>> 249a0067 (.)
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
    public function it_can_manage_extra_data(): void
    {
        // Arrange
        $extraData = [
            'field1' => 'value1',
            'field2' => 'value2',
            'nested' => [
                'key' => 'value',
            ],
        ];

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        $pivot = new BaseMorphPivot;
=======
        $pivot = new BaseMorphPivot();
>>>>>>> 5a14301c (.)
=======
        $pivot = new BaseMorphPivot();
>>>>>>> 5a14301c (.)
=======
        $pivot = new BaseMorphPivot();
>>>>>>> ab8cc3f3 (.)
=======
        $pivot = new BaseMorphPivot;
>>>>>>> 249a0067 (.)
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
    public function it_can_manage_status(): void
    {
        // Arrange
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        $pivot = new BaseMorphPivot;
=======
        $pivot = new BaseMorphPivot();
>>>>>>> 5a14301c (.)
=======
        $pivot = new BaseMorphPivot();
>>>>>>> 5a14301c (.)
=======
        $pivot = new BaseMorphPivot();
>>>>>>> ab8cc3f3 (.)
=======
        $pivot = new BaseMorphPivot;
>>>>>>> 249a0067 (.)
        $pivot->status = 'active';

        // Act
        $status = $pivot->status;

        // Assert
        $this->assertEquals('active', $status);
    }

    /** @test */
    public function it_can_manage_priority(): void
    {
        // Arrange
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        $pivot = new BaseMorphPivot;
=======
        $pivot = new BaseMorphPivot();
>>>>>>> 5a14301c (.)
=======
        $pivot = new BaseMorphPivot();
>>>>>>> 5a14301c (.)
=======
        $pivot = new BaseMorphPivot();
>>>>>>> ab8cc3f3 (.)
=======
        $pivot = new BaseMorphPivot;
>>>>>>> 249a0067 (.)
        $pivot->priority = 5;

        // Act
        $priority = $pivot->priority;

        // Assert
        $this->assertEquals(5, $priority);
    }

    /** @test */
    public function it_can_manage_sort_order(): void
    {
        // Arrange
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        $pivot = new BaseMorphPivot;
=======
        $pivot = new BaseMorphPivot();
>>>>>>> 5a14301c (.)
=======
        $pivot = new BaseMorphPivot();
>>>>>>> 5a14301c (.)
=======
        $pivot = new BaseMorphPivot();
>>>>>>> ab8cc3f3 (.)
=======
        $pivot = new BaseMorphPivot;
>>>>>>> 249a0067 (.)
        $pivot->sort_order = 10;

        // Act
        $sortOrder = $pivot->sort_order;

        // Assert
        $this->assertEquals(10, $sortOrder);
    }

    /** @test */
    public function it_can_manage_expires_at(): void
    {
        // Arrange
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        $pivot = new BaseMorphPivot;
=======
        $pivot = new BaseMorphPivot();
>>>>>>> 5a14301c (.)
=======
        $pivot = new BaseMorphPivot();
>>>>>>> 5a14301c (.)
=======
        $pivot = new BaseMorphPivot();
>>>>>>> ab8cc3f3 (.)
=======
        $pivot = new BaseMorphPivot;
>>>>>>> 249a0067 (.)
        $expiresAt = now()->addDays(30);
        $pivot->expires_at = $expiresAt;

        // Act
        $pivotExpiresAt = $pivot->expires_at;

        // Assert
        $this->assertEquals($expiresAt, $pivotExpiresAt);
    }

    /** @test */
    public function it_can_manage_starts_at(): void
    {
        // Arrange
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        $pivot = new BaseMorphPivot;
=======
        $pivot = new BaseMorphPivot();
>>>>>>> 5a14301c (.)
=======
        $pivot = new BaseMorphPivot();
>>>>>>> 5a14301c (.)
=======
        $pivot = new BaseMorphPivot();
>>>>>>> ab8cc3f3 (.)
=======
        $pivot = new BaseMorphPivot;
>>>>>>> 249a0067 (.)
        $startsAt = now()->addHours(2);
        $pivot->starts_at = $startsAt;

        // Act
        $pivotStartsAt = $pivot->starts_at;

        // Assert
        $this->assertEquals($startsAt, $pivotStartsAt);
    }

    /** @test */
    public function it_can_manage_ends_at(): void
    {
        // Arrange
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        $pivot = new BaseMorphPivot;
=======
        $pivot = new BaseMorphPivot();
>>>>>>> 5a14301c (.)
=======
        $pivot = new BaseMorphPivot();
>>>>>>> 5a14301c (.)
=======
        $pivot = new BaseMorphPivot();
>>>>>>> ab8cc3f3 (.)
=======
        $pivot = new BaseMorphPivot;
>>>>>>> 249a0067 (.)
        $endsAt = now()->addDays(7);
        $pivot->ends_at = $endsAt;

        // Act
        $pivotEndsAt = $pivot->ends_at;

        // Assert
        $this->assertEquals($endsAt, $pivotEndsAt);
    }

    /** @test */
    public function it_can_manage_is_active(): void
    {
        // Arrange
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        $pivot = new BaseMorphPivot;
=======
        $pivot = new BaseMorphPivot();
>>>>>>> 5a14301c (.)
=======
        $pivot = new BaseMorphPivot();
>>>>>>> 5a14301c (.)
=======
        $pivot = new BaseMorphPivot();
>>>>>>> ab8cc3f3 (.)
=======
        $pivot = new BaseMorphPivot;
>>>>>>> 249a0067 (.)
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
    public function it_can_manage_is_public(): void
    {
        // Arrange
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        $pivot = new BaseMorphPivot;
=======
        $pivot = new BaseMorphPivot();
>>>>>>> 5a14301c (.)
=======
        $pivot = new BaseMorphPivot();
>>>>>>> 5a14301c (.)
=======
        $pivot = new BaseMorphPivot();
>>>>>>> ab8cc3f3 (.)
=======
        $pivot = new BaseMorphPivot;
>>>>>>> 249a0067 (.)
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
    public function it_can_manage_is_featured(): void
    {
        // Arrange
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        $pivot = new BaseMorphPivot;
=======
        $pivot = new BaseMorphPivot();
>>>>>>> 5a14301c (.)
=======
        $pivot = new BaseMorphPivot();
>>>>>>> 5a14301c (.)
=======
        $pivot = new BaseMorphPivot();
>>>>>>> ab8cc3f3 (.)
=======
        $pivot = new BaseMorphPivot;
>>>>>>> 249a0067 (.)
        $pivot->is_featured = false;

        // Act
        $isFeatured = $pivot->is_featured;

        // Assert
        $this->assertFalse($isFeatured);

        // Act - Make featured
        $pivot->is_featured = true;

        // Assert
        $this->assertTrue($pivot->is_featured);
    }

    /** @test */
    public function it_can_manage_tags(): void
    {
        // Arrange
        $tags = ['tag1', 'tag2', 'important'];

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        $pivot = new BaseMorphPivot;
=======
        $pivot = new BaseMorphPivot();
>>>>>>> 5a14301c (.)
=======
        $pivot = new BaseMorphPivot();
>>>>>>> 5a14301c (.)
=======
        $pivot = new BaseMorphPivot();
>>>>>>> ab8cc3f3 (.)
=======
        $pivot = new BaseMorphPivot;
>>>>>>> 249a0067 (.)
        $pivot->tags = $tags;

        // Act
        $pivotTags = $pivot->tags;

        // Assert
        $this->assertIsArray($pivotTags);
        $this->assertContains('tag1', $pivotTags);
        $this->assertContains('tag2', $pivotTags);
        $this->assertContains('important', $pivotTags);
        $this->assertCount(3, $pivotTags);
    }

    /** @test */
    public function it_can_manage_categories(): void
    {
        // Arrange
        $categories = ['category1', 'category2'];

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        $pivot = new BaseMorphPivot;
=======
        $pivot = new BaseMorphPivot();
>>>>>>> 5a14301c (.)
=======
        $pivot = new BaseMorphPivot();
>>>>>>> 5a14301c (.)
=======
        $pivot = new BaseMorphPivot();
>>>>>>> ab8cc3f3 (.)
=======
        $pivot = new BaseMorphPivot;
>>>>>>> 249a0067 (.)
        $pivot->categories = $categories;

        // Act
        $pivotCategories = $pivot->categories;

        // Assert
        $this->assertIsArray($pivotCategories);
        $this->assertContains('category1', $pivotCategories);
        $this->assertContains('category2', $pivotCategories);
        $this->assertCount(2, $pivotCategories);
    }

    /** @test */
    public function it_can_manage_permissions(): void
    {
        // Arrange
        $permissions = [
            'read' => true,
            'write' => false,
            'delete' => false,
        ];

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        $pivot = new BaseMorphPivot;
=======
        $pivot = new BaseMorphPivot();
>>>>>>> 5a14301c (.)
=======
        $pivot = new BaseMorphPivot();
>>>>>>> 5a14301c (.)
=======
        $pivot = new BaseMorphPivot();
>>>>>>> ab8cc3f3 (.)
=======
        $pivot = new BaseMorphPivot;
>>>>>>> 249a0067 (.)
        $pivot->permissions = $permissions;

        // Act
        $pivotPermissions = $pivot->permissions;

        // Assert
        $this->assertIsArray($pivotPermissions);
        $this->assertTrue($pivotPermissions['read']);
        $this->assertFalse($pivotPermissions['write']);
        $this->assertFalse($pivotPermissions['delete']);
    }

    /** @test */
    public function it_can_manage_settings(): void
    {
        // Arrange
        $settings = [
            'notifications' => true,
            'auto_save' => false,
            'timeout' => 30,
        ];

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        $pivot = new BaseMorphPivot;
=======
        $pivot = new BaseMorphPivot();
>>>>>>> 5a14301c (.)
=======
        $pivot = new BaseMorphPivot();
>>>>>>> 5a14301c (.)
=======
        $pivot = new BaseMorphPivot();
>>>>>>> ab8cc3f3 (.)
=======
        $pivot = new BaseMorphPivot;
>>>>>>> 249a0067 (.)
        $pivot->settings = $settings;

        // Act
        $pivotSettings = $pivot->settings;

        // Assert
        $this->assertIsArray($pivotSettings);
        $this->assertTrue($pivotSettings['notifications']);
        $this->assertFalse($pivotSettings['auto_save']);
        $this->assertEquals(30, $pivotSettings['timeout']);
    }

    /** @test */
    public function it_can_manage_notes(): void
    {
        // Arrange
        $notes = 'This is a test note for the pivot relationship';

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        $pivot = new BaseMorphPivot;
=======
        $pivot = new BaseMorphPivot();
>>>>>>> 5a14301c (.)
=======
        $pivot = new BaseMorphPivot();
>>>>>>> 5a14301c (.)
=======
        $pivot = new BaseMorphPivot();
>>>>>>> ab8cc3f3 (.)
=======
        $pivot = new BaseMorphPivot;
>>>>>>> 249a0067 (.)
        $pivot->notes = $notes;

        // Act
        $pivotNotes = $pivot->notes;

        // Assert
        $this->assertEquals($notes, $pivotNotes);
    }

    /** @test */
    public function it_can_manage_description(): void
    {
        // Arrange
        $description = 'Test description for pivot relationship';

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        $pivot = new BaseMorphPivot;
=======
        $pivot = new BaseMorphPivot();
>>>>>>> 5a14301c (.)
=======
        $pivot = new BaseMorphPivot();
>>>>>>> 5a14301c (.)
=======
        $pivot = new BaseMorphPivot();
>>>>>>> ab8cc3f3 (.)
=======
        $pivot = new BaseMorphPivot;
>>>>>>> 249a0067 (.)
        $pivot->description = $description;

        // Act
        $pivotDescription = $pivot->description;

        // Assert
        $this->assertEquals($description, $pivotDescription);
    }

    /** @test */
    public function it_can_manage_url(): void
    {
        // Arrange
        $url = 'https://example.com/pivot/123';

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        $pivot = new BaseMorphPivot;
=======
        $pivot = new BaseMorphPivot();
>>>>>>> 5a14301c (.)
=======
        $pivot = new BaseMorphPivot();
>>>>>>> 5a14301c (.)
=======
        $pivot = new BaseMorphPivot();
>>>>>>> ab8cc3f3 (.)
=======
        $pivot = new BaseMorphPivot;
>>>>>>> 249a0067 (.)
        $pivot->url = $url;

        // Act
        $pivotUrl = $pivot->url;

        // Assert
        $this->assertEquals($url, $pivotUrl);
    }

    /** @test */
    public function it_can_manage_image_url(): void
    {
        // Arrange
        $imageUrl = 'https://example.com/images/pivot.jpg';

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        $pivot = new BaseMorphPivot;
=======
        $pivot = new BaseMorphPivot();
>>>>>>> 5a14301c (.)
=======
        $pivot = new BaseMorphPivot();
>>>>>>> 5a14301c (.)
=======
        $pivot = new BaseMorphPivot();
>>>>>>> ab8cc3f3 (.)
=======
        $pivot = new BaseMorphPivot;
>>>>>>> 249a0067 (.)
        $pivot->image_url = $imageUrl;

        // Act
        $pivotImageUrl = $pivot->image_url;

        // Assert
        $this->assertEquals($imageUrl, $pivotImageUrl);
    }

    /** @test */
    public function it_can_manage_external_id(): void
    {
        // Arrange
        $externalId = 'ext_12345';

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        $pivot = new BaseMorphPivot;
=======
        $pivot = new BaseMorphPivot();
>>>>>>> 5a14301c (.)
=======
        $pivot = new BaseMorphPivot();
>>>>>>> 5a14301c (.)
=======
        $pivot = new BaseMorphPivot();
>>>>>>> ab8cc3f3 (.)
=======
        $pivot = new BaseMorphPivot;
>>>>>>> 249a0067 (.)
        $pivot->external_id = $externalId;

        // Act
        $pivotExternalId = $pivot->external_id;

        // Assert
        $this->assertEquals($externalId, $pivotExternalId);
    }

    /** @test */
    public function it_can_manage_source(): void
    {
        // Arrange
        $source = 'api_import';

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        $pivot = new BaseMorphPivot;
=======
        $pivot = new BaseMorphPivot();
>>>>>>> 5a14301c (.)
=======
        $pivot = new BaseMorphPivot();
>>>>>>> 5a14301c (.)
=======
        $pivot = new BaseMorphPivot();
>>>>>>> ab8cc3f3 (.)
=======
        $pivot = new BaseMorphPivot;
>>>>>>> 249a0067 (.)
        $pivot->source = $source;

        // Act
        $pivotSource = $pivot->source;

        // Assert
        $this->assertEquals($source, $pivotSource);
    }

    /** @test */
    public function it_can_manage_version(): void
    {
        // Arrange
        $version = '1.2.3';

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        $pivot = new BaseMorphPivot;
=======
        $pivot = new BaseMorphPivot();
>>>>>>> 5a14301c (.)
=======
        $pivot = new BaseMorphPivot();
>>>>>>> 5a14301c (.)
=======
        $pivot = new BaseMorphPivot();
>>>>>>> ab8cc3f3 (.)
=======
        $pivot = new BaseMorphPivot;
>>>>>>> 249a0067 (.)
        $pivot->version = $version;

        // Act
        $pivotVersion = $pivot->version;

        // Assert
        $this->assertEquals($version, $pivotVersion);
    }

    /** @test */
    public function it_can_manage_hash(): void
    {
        // Arrange
        $hash = 'abc123def456';

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        $pivot = new BaseMorphPivot;
=======
        $pivot = new BaseMorphPivot();
>>>>>>> 5a14301c (.)
=======
        $pivot = new BaseMorphPivot();
>>>>>>> 5a14301c (.)
=======
        $pivot = new BaseMorphPivot();
>>>>>>> ab8cc3f3 (.)
=======
        $pivot = new BaseMorphPivot;
>>>>>>> 249a0067 (.)
        $pivot->hash = $hash;

        // Act
        $pivotHash = $pivot->hash;

        // Assert
        $this->assertEquals($hash, $pivotHash);
    }

    /** @test */
    public function it_can_manage_checksum(): void
    {
        // Arrange
        $checksum = 'sha256:abc123def456';

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        $pivot = new BaseMorphPivot;
=======
        $pivot = new BaseMorphPivot();
>>>>>>> 5a14301c (.)
=======
        $pivot = new BaseMorphPivot();
>>>>>>> 5a14301c (.)
=======
        $pivot = new BaseMorphPivot();
>>>>>>> ab8cc3f3 (.)
=======
        $pivot = new BaseMorphPivot;
>>>>>>> 249a0067 (.)
        $pivot->checksum = $checksum;

        // Act
        $pivotChecksum = $pivot->checksum;

        // Assert
        $this->assertEquals($checksum, $pivotChecksum);
    }

    /** @test */
    public function it_can_manage_size(): void
    {
        // Arrange
        $size = 1024;

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        $pivot = new BaseMorphPivot;
=======
        $pivot = new BaseMorphPivot();
>>>>>>> 5a14301c (.)
=======
        $pivot = new BaseMorphPivot();
>>>>>>> 5a14301c (.)
=======
        $pivot = new BaseMorphPivot();
>>>>>>> ab8cc3f3 (.)
=======
        $pivot = new BaseMorphPivot;
>>>>>>> 249a0067 (.)
        $pivot->size = $size;

        // Act
        $pivotSize = $pivot->size;

        // Assert
        $this->assertEquals($size, $pivotSize);
    }

    /** @test */
    public function it_can_manage_mime_type(): void
    {
        // Arrange
        $mimeType = 'application/json';

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        $pivot = new BaseMorphPivot;
=======
        $pivot = new BaseMorphPivot();
>>>>>>> 5a14301c (.)
=======
        $pivot = new BaseMorphPivot();
>>>>>>> 5a14301c (.)
=======
        $pivot = new BaseMorphPivot();
>>>>>>> ab8cc3f3 (.)
=======
        $pivot = new BaseMorphPivot;
>>>>>>> 249a0067 (.)
        $pivot->mime_type = $mimeType;

        // Act
        $pivotMimeType = $pivot->mime_type;

        // Assert
        $this->assertEquals($mimeType, $pivotMimeType);
    }

    /** @test */
    public function it_can_manage_encoding(): void
    {
        // Arrange
        $encoding = 'UTF-8';

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        $pivot = new BaseMorphPivot;
=======
        $pivot = new BaseMorphPivot();
>>>>>>> 5a14301c (.)
=======
        $pivot = new BaseMorphPivot();
>>>>>>> 5a14301c (.)
=======
        $pivot = new BaseMorphPivot();
>>>>>>> ab8cc3f3 (.)
=======
        $pivot = new BaseMorphPivot;
>>>>>>> 249a0067 (.)
        $pivot->encoding = $encoding;

        // Act
        $pivotEncoding = $pivot->encoding;

        // Assert
        $this->assertEquals($encoding, $pivotEncoding);
    }

    /** @test */
    public function it_can_manage_language(): void
    {
        // Arrange
        $language = 'en';

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        $pivot = new BaseMorphPivot;
=======
        $pivot = new BaseMorphPivot();
>>>>>>> 5a14301c (.)
=======
        $pivot = new BaseMorphPivot();
>>>>>>> 5a14301c (.)
=======
        $pivot = new BaseMorphPivot();
>>>>>>> ab8cc3f3 (.)
=======
        $pivot = new BaseMorphPivot;
>>>>>>> 249a0067 (.)
        $pivot->language = $language;

        // Act
        $pivotLanguage = $pivot->language;

        // Assert
        $this->assertEquals($language, $pivotLanguage);
    }

    /** @test */
    public function it_can_manage_locale(): void
    {
        // Arrange
        $locale = 'en_US';

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        $pivot = new BaseMorphPivot;
=======
        $pivot = new BaseMorphPivot();
>>>>>>> 5a14301c (.)
=======
        $pivot = new BaseMorphPivot();
>>>>>>> 5a14301c (.)
=======
        $pivot = new BaseMorphPivot();
>>>>>>> ab8cc3f3 (.)
=======
        $pivot = new BaseMorphPivot;
>>>>>>> 249a0067 (.)
        $pivot->locale = $locale;

        // Act
        $pivotLocale = $pivot->locale;

        // Assert
        $this->assertEquals($locale, $pivotLocale);
    }

    /** @test */
    public function it_can_manage_timezone(): void
    {
        // Arrange
        $timezone = 'Europe/Rome';

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        $pivot = new BaseMorphPivot;
=======
        $pivot = new BaseMorphPivot();
>>>>>>> 5a14301c (.)
=======
        $pivot = new BaseMorphPivot();
>>>>>>> 5a14301c (.)
=======
        $pivot = new BaseMorphPivot();
>>>>>>> ab8cc3f3 (.)
=======
        $pivot = new BaseMorphPivot;
>>>>>>> 249a0067 (.)
        $pivot->timezone = $timezone;

        // Act
        $pivotTimezone = $pivot->timezone;

        // Assert
        $this->assertEquals($timezone, $pivotTimezone);
    }

    /** @test */
    public function it_can_manage_currency(): void
    {
        // Arrange
        $currency = 'EUR';

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        $pivot = new BaseMorphPivot;
=======
        $pivot = new BaseMorphPivot();
>>>>>>> 5a14301c (.)
=======
        $pivot = new BaseMorphPivot();
>>>>>>> 5a14301c (.)
=======
        $pivot = new BaseMorphPivot();
>>>>>>> ab8cc3f3 (.)
=======
        $pivot = new BaseMorphPivot;
>>>>>>> 249a0067 (.)
        $pivot->currency = $currency;

        // Act
        $pivotCurrency = $pivot->currency;

        // Assert
        $this->assertEquals($currency, $pivotCurrency);
    }

    /** @test */
    public function it_can_manage_decimal_places(): void
    {
        // Arrange
        $decimalPlaces = 2;

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        $pivot = new BaseMorphPivot;
=======
        $pivot = new BaseMorphPivot();
>>>>>>> 5a14301c (.)
=======
        $pivot = new BaseMorphPivot();
>>>>>>> 5a14301c (.)
=======
        $pivot = new BaseMorphPivot();
>>>>>>> ab8cc3f3 (.)
=======
        $pivot = new BaseMorphPivot;
>>>>>>> 249a0067 (.)
        $pivot->decimal_places = $decimalPlaces;

        // Act
        $pivotDecimalPlaces = $pivot->decimal_places;

        // Assert
        $this->assertEquals($decimalPlaces, $pivotDecimalPlaces);
    }

    /** @test */
    public function it_can_manage_rounding_mode(): void
    {
        // Arrange
        $roundingMode = 'half_up';

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        $pivot = new BaseMorphPivot;
=======
        $pivot = new BaseMorphPivot();
>>>>>>> 5a14301c (.)
=======
        $pivot = new BaseMorphPivot();
>>>>>>> 5a14301c (.)
=======
        $pivot = new BaseMorphPivot();
>>>>>>> ab8cc3f3 (.)
=======
        $pivot = new BaseMorphPivot;
>>>>>>> 249a0067 (.)
        $pivot->rounding_mode = $roundingMode;

        // Act
        $pivotRoundingMode = $pivot->rounding_mode;

        // Assert
        $this->assertEquals($roundingMode, $pivotRoundingMode);
    }
}
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> d2b0a27 (.)
>>>>>>> ab8cc3f3 (.)
=======
>>>>>>> 53d6a6ba (.)
=======
>>>>>>> d2b0a27 (.)
>>>>>>> b7afadf9 (.)
=======
>>>>>>> 71586de2 (.)
=======
>>>>>>> 249a0067 (.)
