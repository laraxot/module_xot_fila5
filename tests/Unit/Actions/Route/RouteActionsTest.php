<?php

declare(strict_types=1);
<<<<<<< HEAD
<<<<<<< .merge_file_3JeRni
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
<<<<<<< HEAD
>>>>>>> da9ae01a0 (.)
<<<<<<< .merge_file_vVEKCI
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD

=======
<<<<<<< HEAD

=======
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
>>>>>>> .merge_file_82r8dc
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======

>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_Ee5rLI
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
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
