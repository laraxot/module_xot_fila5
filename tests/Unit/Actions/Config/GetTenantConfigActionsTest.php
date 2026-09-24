<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Unit\Actions\Config;

use Illuminate\Support\Facades\File;
<<<<<<< HEAD
<<<<<<< HEAD
use Mockery;
=======
>>>>>>> laraxot/dev
use Mockery\MockInterface;
=======
>>>>>>> 3792da0d (Check & fix styling)
use Modules\Tenant\Actions\Config\GetTenantFilePathAction;
use Modules\Xot\Actions\Config\GetTenantConfigArrayAction;
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;

use function Safe\tempnam;

uses(TestCase::class);

describe('Get Tenant Config Actions', function (): void {
    test('gets tenant config array correctly', function (): void {
        $configName = 'test_config';
        $tempPath = tempnam(sys_get_temp_dir(), 'test_config_').'.php';
        $configData = ['key' => 'value'];

        File::put($tempPath, 'return '.var_export($configData, true).';');

<<<<<<< HEAD
        /** @var GetTenantFilePathAction&MockInterface $mock */
<<<<<<< HEAD
        $mock = Mockery::mock(GetTenantFilePathAction::class);
=======
        $mock = \Mockery::mock(GetTenantFilePathAction::class);
>>>>>>> laraxot/dev
        $mock->shouldReceive('execute')
            ->with($configName.'.php')
            ->andReturn($tempPath);

        app()->instance(GetTenantFilePathAction::class, $mock);
=======
        // Replace GetTenantFilePathAction with a spy that returns the temp path
        $getTenantFilePathAction = new class($tempPath) extends GetTenantFilePathAction {
            public function __construct(private string $tempPath)
            {
            }

            public function execute(string $configName): string
            {
                return $this->tempPath;
            }
        };

        app()->instance(GetTenantFilePathAction::class, $getTenantFilePathAction);
>>>>>>> 3792da0d (Check & fix styling)

        $action = app(GetTenantConfigArrayAction::class);
        $result = $action->execute($configName);

        Assert::assertSame($configData, $result);
        File::delete($tempPath);
    });

    test('returns empty array if tenant config file does not exist', function (): void {
        $configName = 'non_existent';

<<<<<<< HEAD
        /** @var GetTenantFilePathAction&MockInterface $mock */
<<<<<<< HEAD
        $mock = Mockery::mock(GetTenantFilePathAction::class);
=======
        $mock = \Mockery::mock(GetTenantFilePathAction::class);
>>>>>>> laraxot/dev
        $mock->shouldReceive('execute')
            ->andReturn('/path/to/nothing.php');

        app()->instance(GetTenantFilePathAction::class, $mock);
=======
        // Replace GetTenantFilePathAction with a spy that returns a non-existent path
        $getTenantFilePathAction = new class extends GetTenantFilePathAction {
            public function execute(string $configName): string
            {
                return '/path/to/nothing.php';
            }
        };

        app()->instance(GetTenantFilePathAction::class, $getTenantFilePathAction);
>>>>>>> 3792da0d (Check & fix styling)

        $action = app(GetTenantConfigArrayAction::class);
        $result = $action->execute($configName);

        Assert::assertSame([], $result);
    });
});
