<?php

declare(strict_types=1);

namespace Tests\Modules\Xot\Unit;

use Modules\Xot\Models\Cache;
use Tests\Modules\Xot\Fixtures\Stubs\XotFilamentRelationContract;
use Tests\Modules\Xot\Fixtures\Stubs\XotFilamentResourceContract;
use Tests\Modules\Xot\TestCase;

uses(TestCase::class)->group('no-xot-db');

test('Xot resources preserve model and route contracts', function (): void {
    expect(XotFilamentResourceContract::getModel())->toBe(Cache::class)
        ->and(XotFilamentResourceContract::getRelations())->toBe([])
        ->and(XotFilamentResourceContract::getWidgets())->toBe([]);
});

test('relation managers expose their configured relationship', function (): void {
    expect(XotFilamentRelationContract::getRelationshipName())->toBe('sessions');
});
