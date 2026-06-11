<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Unit\Actions\Config;

use Illuminate\Support\Facades\File;
use Modules\Tenant\Actions\Config\GetTenantFilePathAction;
use Modules\Xot\Actions\Config\GetTenantConfigArrayAction;
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\Assert;
use function Safe\tempnam;

class GetTenantConfigActionsTest extends TestCase
{
    #[Test]
    public function gets_tenant_config_array_correctly(): void
    {
        $configName = 'test_config';
        $tempPath = tempnam(sys_get_temp_dir(), 'test_config_').'.php';
        $configData = ['key' => 'value'];

        File::put($tempPath, 'return '.var_export($configData, true).';');

        $mock = $this->createMock(GetTenantFilePathAction::class);
        $mock->expects($this->once())
            ->method('execute')
            ->with($configName.'.php')
            ->willReturn($tempPath);

        app()->instance(GetTenantFilePathAction::class, $mock);

        $action = app(GetTenantConfigArrayAction::class);
        $result = $action->execute($configName);

        Assert::assertSame($configData, $result);
        File::delete($tempPath);
    }

    #[Test]
    public function returns_empty_array_if_tenant_config_file_does_not_exist(): void
    {
        $configName = 'non_existent';

        $mock = $this->createMock(GetTenantFilePathAction::class);
        $mock->expects($this->once())
            ->method('execute')
            ->willReturn('/path/to/nothing.php');

        app()->instance(GetTenantFilePathAction::class, $mock);

        $action = app(GetTenantConfigArrayAction::class);
        $result = $action->execute($configName);

        Assert::assertSame([], $result);
    }
}
