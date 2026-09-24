<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Unit\Actions\Config;

<<<<<<< HEAD
<<<<<<< .merge_file_BuzuFk
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> .merge_file_VfNnDz
use Mockery;
use Mockery\MockInterface;
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
<<<<<<< HEAD
use Mockery\MockInterface;
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
use Modules\Tenant\Actions\Config\GetTenantFilePathAction;
use Modules\Xot\Actions\Config\GetTenantConfigPathAction;
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

describe('Get Tenant Config Path Action', function (): void {
    test('delegates to tenant file path action with php filename', function (): void {
<<<<<<< HEAD
        /** @var GetTenantFilePathAction&MockInterface $tenantPathAction */
        $tenantPathAction = Mockery::mock(GetTenantFilePathAction::class);
        $tenantPathAction->shouldReceive('execute')
            ->with('mail.php')
            ->andReturn('/tmp/tenant/mail.php');
=======
<<<<<<< HEAD
        // Replace GetTenantFilePathAction with a spy that returns a specific path
        $tenantPathAction = new class extends GetTenantFilePathAction {
            public function execute(string $configName): string
            {
                return '/tmp/tenant/'.$configName.'.php';
            }
        };
>>>>>>> 3792da0d (Check & fix styling)
=======
        /** @var TestCase $this */
        $tenantPathAction = $this->createUnitMock(GetTenantFilePathAction::class);
        $tenantPathAction->expects($this->expectsAtLeastOnce())
            ->method('execute')
            ->with('mail.php')
            ->willReturn('/tmp/tenant/mail.php');
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)

        app()->instance(GetTenantFilePathAction::class, $tenantPathAction);

        $result = app(GetTenantConfigPathAction::class)->execute('mail');

        Assert::assertSame('/tmp/tenant/mail.php', $result);
    });
});
