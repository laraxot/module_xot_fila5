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
        /** @var TestCase $this */
        $tenantPathAction = $this->createUnitMock(GetTenantFilePathAction::class);
<<<<<<< HEAD
<<<<<<< HEAD
        $tenantPathAction->expects($this->expectsAtLeastOnce())
=======
        /* @phpstan-ignore-next-line */
        $tenantPathAction->expects($this->atLeastOnce())
>>>>>>> 64619e34 (.)
=======
        $tenantPathAction->expects($this->expectsAtLeastOnce())
>>>>>>> 61938ca4 (delete .claude-audit/)
            ->method('execute')
            ->with('mail.php')
            ->willReturn('/tmp/tenant/mail.php');

        app()->instance(GetTenantFilePathAction::class, $tenantPathAction);

        $result = app(GetTenantConfigPathAction::class)->execute('mail');

        Assert::assertSame('/tmp/tenant/mail.php', $result);
    });
});
