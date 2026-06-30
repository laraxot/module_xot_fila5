<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Unit\Actions\Config;

use Modules\Tenant\Actions\Config\GetTenantFilePathAction;
use Modules\Xot\Actions\Config\GetTenantConfigPathAction;

it('delegates to tenant file path action with php filename', function (): void {
    $tenantPathAction = Mockery::mock(GetTenantFilePathAction::class);
    $tenantPathAction->shouldReceive('execute')
        ->once()
        ->with('mail.php')
        ->andReturn('/tmp/tenant/mail.php');

describe('Get Tenant Config Path Action', function (): void {
    test('delegates to tenant file path action with php filename', function (): void {
        /** @var TestCase $this */
        $tenantPathAction = $this->createUnitMock(GetTenantFilePathAction::class);
<<<<<<< HEAD
        $tenantPathAction->expects($this->expectsAtLeastOnce())
=======
        /* @phpstan-ignore-next-line */
        $tenantPathAction->expects($this->atLeastOnce())
>>>>>>> 64619e34 (.)
            ->method('execute')
            ->with('mail.php')
            ->willReturn('/tmp/tenant/mail.php');

    $result = app(GetTenantConfigPathAction::class)->execute('mail');

    expect($result)->toBe('/tmp/tenant/mail.php');
});
