<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Feature;

use Modules\Xot\Tests\Fixtures\Models\TestConcreteMorphPivot;
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

describe('Base morph pivot business logic (PHPUnit legacy coverage)', function (): void {
    it('manages custom scalar attributes', function (): void {
        $pivot = new TestConcreteMorphPivot();
        $pivot->setAttribute('custom_field', 'custom_value');
        $pivot->setAttribute('numeric_field', 42);

        Assert::assertSame('custom_value', $pivot->getAttribute('custom_field'));
        Assert::assertSame(42, $pivot->getAttribute('numeric_field'));
    });

    it('manages timestamps', function (): void {
        $pivot = new TestConcreteMorphPivot();
        $pivot->setAttribute('created_at', '2026-01-01 12:00:00');
        $pivot->setAttribute('updated_at', '2026-01-01 12:00:00');

        Assert::assertSame('2026-01-01 12:00:00', $pivot->getAttribute('created_at'));
        Assert::assertSame('2026-01-01 12:00:00', $pivot->getAttribute('updated_at'));
    });

    it('manages soft delete timestamp', function (): void {
        $pivot = new TestConcreteMorphPivot();
        $pivot->setAttribute('deleted_at', '2026-01-02 08:30:00');

        Assert::assertSame('2026-01-02 08:30:00', $pivot->getAttribute('deleted_at'));
    });

    it('manages tenant and user identifiers', function (): void {
        $pivot = new TestConcreteMorphPivot();
        $pivot->setAttribute('tenant_id', 789);
        $pivot->setAttribute('user_id', 101);

        Assert::assertSame(789, $pivot->getAttribute('tenant_id'));
        Assert::assertSame(101, $pivot->getAttribute('user_id'));
    });

    it('manages metadata and extra data arrays', function (): void {
        $metadata = [
            'source' => 'api',
            'ip_address' => '192.168.1.1',
            'user_agent' => 'Test Browser',
            'session_id' => 'session123',
        ];
        $extraData = [
            'field1' => 'value1',
            'field2' => 'value2',
            'nested' => ['key' => 'value'],
        ];

        $pivot = new TestConcreteMorphPivot();
        $pivot->setAttribute('metadata', $metadata);
        $pivot->setAttribute('extra_data', $extraData);

        /** @var array<string, mixed> $pivotMetadata */
        $pivotMetadata = $pivot->getAttribute('metadata');
        /** @var array<string, mixed> $pivotExtraData */
        $pivotExtraData = $pivot->getAttribute('extra_data');

        Assert::assertSame('api', $pivotMetadata['source']);
        Assert::assertSame('value1', $pivotExtraData['field1']);
        /** @var array<string, mixed> $nested */
        $nested = $pivotExtraData['nested'];
        Assert::assertSame('value', $nested['key']);
    });

    it('manages status priority and sort order', function (): void {
        $pivot = new TestConcreteMorphPivot();
        $pivot->setAttribute('status', 'active');
        $pivot->setAttribute('priority', 5);
        $pivot->setAttribute('sort_order', 10);

        Assert::assertSame('active', $pivot->getAttribute('status'));
        Assert::assertSame(5, $pivot->getAttribute('priority'));
        Assert::assertSame(10, $pivot->getAttribute('sort_order'));
    });

    it('manages schedule and boolean flags', function (): void {
        $pivot = new TestConcreteMorphPivot();
        $pivot->setAttribute('expires_at', '2026-03-01 00:00:00');
        $pivot->setAttribute('starts_at', '2026-02-01 10:00:00');
        $pivot->setAttribute('ends_at', '2026-04-01 18:00:00');
        $pivot->setAttribute('is_active', true);
        $pivot->setAttribute('is_public', false);
        $pivot->setAttribute('is_featured', false);

        Assert::assertSame('2026-03-01 00:00:00', $pivot->getAttribute('expires_at'));
        Assert::assertSame('2026-02-01 10:00:00', $pivot->getAttribute('starts_at'));
        Assert::assertSame('2026-04-01 18:00:00', $pivot->getAttribute('ends_at'));
        Assert::assertTrue($pivot->getAttribute('is_active'));

        $pivot->setAttribute('is_active', false);
        $pivot->setAttribute('is_public', true);
        $pivot->setAttribute('is_featured', true);

        Assert::assertFalse($pivot->getAttribute('is_active'));
        Assert::assertTrue($pivot->getAttribute('is_public'));
        Assert::assertTrue($pivot->getAttribute('is_featured'));
    });

    it('manages tag and category collections', function (): void {
        $pivot = new TestConcreteMorphPivot();
        $pivot->setAttribute('tags', ['tag1', 'tag2', 'important']);
        $pivot->setAttribute('categories', ['category1', 'category2']);

        /** @var array<int, string> $tags */
        $tags = $pivot->getAttribute('tags');
        /** @var array<int, string> $categories */
        $categories = $pivot->getAttribute('categories');

        Assert::assertCount(3, $tags);
        Assert::assertContains('important', $tags);
        Assert::assertCount(2, $categories);
    });
});
