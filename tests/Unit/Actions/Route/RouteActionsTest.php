<?php

declare(strict_types=1);
<<<<<<< HEAD
<<<<<<< .merge_file_56ekcY
=======
<<<<<<< .merge_file_LAdOFv

=======
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_15EGGm
=======
<<<<<<< .merge_file_vVEKCI
<<<<<<< HEAD

=======
<<<<<<< HEAD

=======
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_82r8dc
>>>>>>> laraxot/dev
<<<<<<< .merge_file_56ekcY
=======
>>>>>>> .merge_file_pIbDog
>>>>>>> .merge_file_15EGGm
use Modules\Xot\Actions\Route\BuildLanguageUrlAction;
use Modules\Xot\Actions\Route\BuildNestedRouteNameAction;
use Modules\Xot\Actions\Route\IsAdminRouteAction;
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

it('executes the converted route use cases through the container', function (): void {
    Assert::assertTrue(app(IsAdminRouteAction::class)->execute(['in_admin' => true]));
    Assert::assertSame(
        'admin.container0.container1.edit',
        app(BuildNestedRouteNameAction::class)->execute(['in_admin' => true, 'n' => 1, 'act' => 'edit']),
    );
    Assert::assertSame('?', app(BuildLanguageUrlAction::class)->execute());
});
