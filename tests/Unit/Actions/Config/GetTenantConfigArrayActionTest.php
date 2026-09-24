<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Unit\Actions\Config;

<<<<<<< HEAD
use Mockery\MockInterface;
use Modules\Xot\Actions\Config\GetTenantConfigArrayAction;
use Modules\Xot\Actions\Config\GetTenantConfigPathAction;
=======
use Modules\Xot\Actions\Config\GetTenantConfigArrayAction;
<<<<<<< HEAD
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;
>>>>>>> 3792da0d (Check & fix styling)
=======
use Modules\Xot\Actions\Config\GetTenantConfigPathAction;
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)

use function Safe\file_put_contents;
use function Safe\unlink;

<<<<<<< HEAD
it('returns empty array when tenant config file does not exist', function (): void {
    /** @var GetTenantConfigPathAction&MockInterface $pathAction */
    $pathAction = \Mockery::mock(GetTenantConfigPathAction::class);
    $pathAction->allows(['execute' => '/tmp/does-not-exist-config.php']);
=======
uses(TestCase::class);

it('returns empty array when tenant config file does not exist', function (): void {
    $pathAction = $this->createUnitMock(GetTenantConfigPathAction::class);
    $pathAction->method('execute')
        ->with('missing-config')
        ->willReturn('/tmp/does-not-exist-config.php');
>>>>>>> 930f8146 (Check & fix styling)

    app()->instance(GetTenantConfigPathAction::class, $pathAction);

    $result = app(GetTenantConfigArrayAction::class)->execute('missing-config');

<<<<<<< HEAD
    expect($result)->toBe([]);
=======
<<<<<<< HEAD
uses(TestCase::class);

it('returns empty array when tenant config file does not exist', function (): void {
    $result = app(GetTenantConfigArrayAction::class)->execute('non-existent-config-'.uniqid('', true));

    Assert::assertSame([], $result);
>>>>>>> 3792da0d (Check & fix styling)
=======
    Assert::assertSame([], $result);
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
});

it('returns config array when file exists and contains array', function (): void {
    $path = sys_get_temp_dir().'/xot_tenant_config_'.uniqid('', true).'.php';
    file_put_contents($path, "<?php\nreturn ['driver' => 'smtp', 'port' => 25];\n");

<<<<<<< HEAD
    /** @var GetTenantConfigPathAction&MockInterface $pathAction */
    $pathAction = \Mockery::mock(GetTenantConfigPathAction::class);
    $pathAction->allows(['execute' => $path]);
=======
    $pathAction = $this->createUnitMock(GetTenantConfigPathAction::class);
    $pathAction->method('execute')
        ->with('mail')
        ->willReturn($path);
>>>>>>> 930f8146 (Check & fix styling)

    app()->instance(GetTenantConfigPathAction::class, $pathAction);

    try {
        $result = app(GetTenantConfigArrayAction::class)->execute('mail');
<<<<<<< HEAD
        expect($result)->toBe(['driver' => 'smtp', 'port' => 25]);
    } finally {
        unlink($path);
=======
<<<<<<< HEAD
    try {
        $result = app(GetTenantConfigArrayAction::class)->execute('mail');
        Assert::assertSame(['driver' => 'smtp', 'port' => 25], $result);
    } finally {
        @unlink($path);
>>>>>>> 3792da0d (Check & fix styling)
=======
        Assert::assertSame(['driver' => 'smtp', 'port' => 25], $result);
    } finally {
        @unlink($path);
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
    }
});

it('returns empty array when required file does not return an array', function (): void {
<<<<<<< HEAD
    $path = sys_get_temp_dir().'/xot_tenant_config_scalar_'.uniqid('', true).'.php';
    file_put_contents($path, "<?php\nreturn 'not-array';\n");

<<<<<<< HEAD
    /** @var GetTenantConfigPathAction&MockInterface $pathAction */
    $pathAction = \Mockery::mock(GetTenantConfigPathAction::class);
    $pathAction->allows(['execute' => $path]);
=======
    $pathAction = $this->createUnitMock(GetTenantConfigPathAction::class);
    $pathAction->method('execute')
        ->with('scalar')
        ->willReturn($path);
>>>>>>> 930f8146 (Check & fix styling)

    app()->instance(GetTenantConfigPathAction::class, $pathAction);

    try {
        $result = app(GetTenantConfigArrayAction::class)->execute('scalar');
<<<<<<< HEAD
        expect($result)->toBe([]);
    } finally {
        unlink($path);
=======
        Assert::assertSame([], $result);
    } finally {
        @unlink($path);
>>>>>>> 930f8146 (Check & fix styling)
    }
=======
    $result = app(GetTenantConfigArrayAction::class)->execute('scalar-non-existent');

    Assert::assertSame([], $result);
>>>>>>> 3792da0d (Check & fix styling)
});
