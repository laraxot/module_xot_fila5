<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Unit\Actions\Config;

use Modules\Tenant\Actions\Config\GetTenantFilePathAction;
use Modules\Xot\Actions\Config\GetTenantConfigPathAction;
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

describe('Get Tenant Config Path Action', function (): void {
    test('delegates to tenant file path action with php filename', function (): void {
<<<<<<< HEAD
        // Replace GetTenantFilePathAction with a spy that returns a specific path
        $tenantPathAction = new class extends GetTenantFilePathAction {
            public function execute(string $configName): string
            {
                return '/tmp/tenant/'.$configName.'.php';
            }
        };
=======
        /** @var TestCase $this */
        $tenantPathAction = $this->createUnitMock(GetTenantFilePathAction::class);
        $tenantPathAction->expects($this->expectsAtLeastOnce())
            ->method('execute')
            ->with('mail.php')
            ->willReturn('/tmp/tenant/mail.php');
>>>>>>> 2353ccee (.)

        app()->instance(GetTenantFilePathAction::class, $tenantPathAction);

        $result = app(GetTenantConfigPathAction::class)->execute('mail');

        Assert::assertSame('/tmp/tenant/mail.php', $result);
    });
});
