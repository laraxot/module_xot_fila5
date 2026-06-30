<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Unit\Actions\Config;

use Illuminate\Support\Facades\File;
use Modules\Tenant\Actions\Config\GetTenantFilePathAction;
use Modules\Xot\Actions\Config\GetTenantConfigArrayAction;

it('gets tenant config array correctly', function (): void {
    $configName = 'test_config';
    $tempPath = tempnam(sys_get_temp_dir(), 'test_config_').'.php';
    $configData = ['key' => 'value'];

    File::put($tempPath, 'return '.var_export($configData, true).';');

describe('Get Tenant Config Actions', function (): void {
    test('gets tenant config array correctly', function (): void {
        $configName = 'test_config';
        $tempPath = tempnam(sys_get_temp_dir(), 'test_config_').'.php';
        $configData = ['key' => 'value'];

    $action = app(GetTenantConfigArrayAction::class);
    $result = $action->execute($configName);

        $mock = $this->createUnitMock(GetTenantFilePathAction::class);
<<<<<<< HEAD
        $mock->expects($this->expectsAtLeastOnce())
=======
        /* @phpstan-ignore-next-line */
        $mock->expects($this->atLeastOnce())
>>>>>>> 64619e34 (.)
            ->method('execute')
            ->with($configName.'.php')
            ->willReturn($tempPath);

            public function execute(string $configName): string
            {
                return $this->tempPath;
            }
        };

        app()->instance(GetTenantFilePathAction::class, $getTenantFilePathAction);

        $action = app(GetTenantConfigArrayAction::class);
        $result = $action->execute($configName);

        Assert::assertSame($configData, $result);
        File::delete($tempPath);
    });

    test('returns empty array if tenant config file does not exist', function (): void {
        $configName = 'non_existent';

        $mock = $this->createUnitMock(GetTenantFilePathAction::class);
<<<<<<< HEAD
        $mock->expects($this->expectsAtLeastOnce())
=======
        /* @phpstan-ignore-next-line */
        $mock->expects($this->atLeastOnce())
>>>>>>> 64619e34 (.)
            ->method('execute')
            ->willReturn('/path/to/nothing.php');

        app()->instance(GetTenantFilePathAction::class, $getTenantFilePathAction);

        $action = app(GetTenantConfigArrayAction::class);
        $result = $action->execute($configName);

        Assert::assertSame([], $result);
    });
});
