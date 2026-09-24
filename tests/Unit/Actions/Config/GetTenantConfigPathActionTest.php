<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Unit\Actions\Config;

<<<<<<< HEAD
<<<<<<< HEAD
use Mockery;
=======
>>>>>>> laraxot/dev
use Mockery\MockInterface;
=======
>>>>>>> 3792da0d (Check & fix styling)
use Modules\Tenant\Actions\Config\GetTenantFilePathAction;
use Modules\Xot\Actions\Config\GetTenantConfigPathAction;
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

describe('Get Tenant Config Path Action', function (): void {
    test('delegates to tenant file path action with php filename', function (): void {
<<<<<<< HEAD
        /** @var GetTenantFilePathAction&MockInterface $tenantPathAction */
<<<<<<< HEAD
        $tenantPathAction = Mockery::mock(GetTenantFilePathAction::class);
=======
        $tenantPathAction = \Mockery::mock(GetTenantFilePathAction::class);
>>>>>>> laraxot/dev
        $tenantPathAction->shouldReceive('execute')
            ->with('mail.php')
            ->andReturn('/tmp/tenant/mail.php');
=======
        // Replace GetTenantFilePathAction with a spy that returns a specific path
        $tenantPathAction = new class extends GetTenantFilePathAction {
            public function execute(string $configName): string
            {
                return '/tmp/tenant/'.$configName.'.php';
            }
        };
>>>>>>> 3792da0d (Check & fix styling)

        app()->instance(GetTenantFilePathAction::class, $tenantPathAction);

        $result = app(GetTenantConfigPathAction::class)->execute('mail');

        Assert::assertSame('/tmp/tenant/mail.php', $result);
    });
});
