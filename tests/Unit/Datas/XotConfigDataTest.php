<?php

declare(strict_types=1);

use Modules\Xot\Datas\XotConfigData;
use Modules\Xot\Filament\Pages\SettingPage;
use Modules\Xot\Tests\TestCase;

uses(TestCase::class)->group('no-xot-db');

test('setting page resolves config name and data class by convention', function (): void {
    expect(SettingPage::getConfigName())->toBe('xot')
        ->and(SettingPage::getConfigDataClass())->toBe(XotConfigData::class);
});

test('config data reads the tenant file named after the module', function (): void {
    expect(XotConfigData::tenantConfigName())->toBe('xot');
});
