<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Unit\Actions\Config;

use Modules\Tenant\Actions\Config\GetTenantFilePathAction;
use Modules\Xot\Actions\Config\GetTenantConfigPathAction;
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\Assert;

class GetTenantConfigPathActionTest extends TestCase
{
    #[Test]
    public function delegates_to_tenant_file_path_action_with_php_filename(): void
    {
        $tenantPathAction = $this->createMock(GetTenantFilePathAction::class);
        $tenantPathAction->expects($this->once())
            ->method('execute')
            ->with('mail.php')
            ->willReturn('/tmp/tenant/mail.php');

        app()->instance(GetTenantFilePathAction::class, $tenantPathAction);

        $result = app(GetTenantConfigPathAction::class)->execute('mail');

        Assert::assertSame('/tmp/tenant/mail.php', $result);
    }
}
