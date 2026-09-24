<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Unit\Actions\Config;

<<<<<<< HEAD
<<<<<<< HEAD
=======
use Mockery;
>>>>>>> laraxot/dev
=======
>>>>>>> laraxot/dev
use Mockery\MockInterface;
use Modules\Tenant\Actions\Config\GetTenantFilePathAction;
use Modules\Xot\Actions\Config\GetTenantConfigPathAction;
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;

<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
uses(TestCase::class)->group('xot');
describe('Get Tenant Config Path Action', function (): void {
    test('delegates to tenant file path action with php filename', function (): void {
        /** @var GetTenantFilePathAction&MockInterface $tenantPathAction */
        $tenantPathAction = \Mockery::mock(GetTenantFilePathAction::class);
<<<<<<< HEAD
=======
uses(TestCase::class);

describe('Get Tenant Config Path Action', function (): void {
    test('delegates to tenant file path action with php filename', function (): void {
        /** @var GetTenantFilePathAction&MockInterface $tenantPathAction */
        $tenantPathAction = Mockery::mock(GetTenantFilePathAction::class);
>>>>>>> laraxot/dev
=======
>>>>>>> laraxot/dev
        $tenantPathAction->shouldReceive('execute')
            ->with('mail.php')
            ->andReturn('/tmp/tenant/mail.php');

        app()->instance(GetTenantFilePathAction::class, $tenantPathAction);

        $result = app(GetTenantConfigPathAction::class)->execute('mail');

        Assert::assertSame('/tmp/tenant/mail.php', $result);
    });
});
