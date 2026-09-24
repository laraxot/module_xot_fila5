<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Unit\Actions\Config;

use Illuminate\Support\Facades\File;
<<<<<<< HEAD
use Mockery;
use Mockery\MockInterface;
=======
>>>>>>> laraxot/dev
use Modules\Tenant\Actions\Config\GetTenantFilePathAction;
use Modules\Xot\Actions\Config\GetTenantConfigArrayAction;
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;

use function Safe\tempnam;

uses(TestCase::class);

describe('Get Tenant Config Actions', function (): void {
    test('gets tenant config array correctly', function (): void {
<<<<<<< HEAD
=======
        /** @var TestCase $this */
>>>>>>> laraxot/dev
        $configName = 'test_config';
        $tempPath = tempnam(sys_get_temp_dir(), 'test_config_').'.php';
        $configData = ['key' => 'value'];

        File::put($tempPath, 'return '.var_export($configData, true).';');

<<<<<<< HEAD
        /** @var GetTenantFilePathAction&MockInterface $mock */
        $mock = Mockery::mock(GetTenantFilePathAction::class);
        $mock->shouldReceive('execute')
            ->with($configName.'.php')
            ->andReturn($tempPath);
=======
        $mock = $this->createUnitMock(GetTenantFilePathAction::class);
        $mock->expects($this->expectsAtLeastOnce())
            ->method('execute')
            ->with($configName.'.php')
            ->willReturn($tempPath);
>>>>>>> laraxot/dev

        app()->instance(GetTenantFilePathAction::class, $mock);

        $action = app(GetTenantConfigArrayAction::class);
        $result = $action->execute($configName);

        Assert::assertSame($configData, $result);
        File::delete($tempPath);
    });

    test('returns empty array if tenant config file does not exist', function (): void {
<<<<<<< HEAD
        $configName = 'non_existent';

        /** @var GetTenantFilePathAction&MockInterface $mock */
        $mock = Mockery::mock(GetTenantFilePathAction::class);
        $mock->shouldReceive('execute')
            ->andReturn('/path/to/nothing.php');
=======
        /** @var TestCase $this */
        $configName = 'non_existent';

        $mock = $this->createUnitMock(GetTenantFilePathAction::class);
        $mock->expects($this->expectsAtLeastOnce())
            ->method('execute')
            ->willReturn('/path/to/nothing.php');
>>>>>>> laraxot/dev

        app()->instance(GetTenantFilePathAction::class, $mock);

        $action = app(GetTenantConfigArrayAction::class);
        $result = $action->execute($configName);

        Assert::assertSame([], $result);
    });
});
