<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Unit\Actions\Config;

use Modules\Tenant\Actions\Config\GetTenantFilePathAction;
use Modules\Xot\Actions\Config\GetTenantConfigPathAction;
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\MockObject\MockObject;

uses(TestCase::class)->group('no-xot-db');

describe('Get Tenant Config Path Action', function (): void {
    test('delegates to tenant file path action with php filename', function (): void {
        /** @var GetTenantFilePathAction&MockObject $tenantPathAction */
        $tenantPathAction = $this->createUnitMock(GetTenantFilePathAction::class);
        $tenantPathAction->method('execute')
            ->willReturnCallback(static function (string $filename): string {
                Assert::assertSame('mail.php', $filename);

                return '/tmp/tenant/mail.php';
            });

        $this->bindInstance(GetTenantFilePathAction::class, $tenantPathAction);

        $result = app(GetTenantConfigPathAction::class)->execute('mail');

        Assert::assertSame('/tmp/tenant/mail.php', $result);
    });
});
