<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Unit\Actions\Config;

use Modules\Xot\Actions\Config\GetTenantConfigArrayAction;
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;

use function Safe\file_put_contents;
use function Safe\unlink;

uses(TestCase::class);

it('returns empty array when tenant config file does not exist', function (): void {
    $result = app(GetTenantConfigArrayAction::class)->execute('non-existent-config-'.uniqid('', true));

    Assert::assertSame([], $result);
});

it('returns config array when file exists and contains array', function (): void {
    $path = sys_get_temp_dir().'/xot_tenant_config_'.uniqid('', true).'.php';
    file_put_contents($path, "<?php\nreturn ['driver' => 'smtp', 'port' => 25];\n");

    try {
        $result = app(GetTenantConfigArrayAction::class)->execute('mail');
        expect($result)->toBe(['driver' => 'smtp', 'port' => 25]);
    } finally {
        @unlink($path);
    }
});

it('returns empty array when required file does not return an array', function (): void {
    $result = app(GetTenantConfigArrayAction::class)->execute('scalar-non-existent');

    Assert::assertSame([], $result);
});
