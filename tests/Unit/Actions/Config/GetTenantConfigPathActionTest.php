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
        // Replace GetTenantFilePathAction with a spy that returns a specific path
        $tenantPathAction = new class extends GetTenantFilePathAction {
            public function execute(string $configName): string
            {
                return '/tmp/tenant/'.$configName.'.php';
            }
        };

    $result = app(GetTenantConfigPathAction::class)->execute('mail');

    expect($result)->toBe('/tmp/tenant/mail.php');
});
