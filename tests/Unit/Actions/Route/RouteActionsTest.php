<?php

declare(strict_types=1);

use Modules\Xot\Actions\Route\BuildLanguageUrlAction;
use Modules\Xot\Actions\Route\BuildNestedRouteNameAction;
use Modules\Xot\Actions\Route\IsAdminRouteAction;
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;

<<<<<<< HEAD
uses(TestCase::class);
=======
uses(\Modules\Xot\Tests\TestCase::class);
>>>>>>> 7f6cf6be (.)

it('executes the converted route use cases through the container', function (): void {
    Assert::assertTrue(app(IsAdminRouteAction::class)->execute(['in_admin' => true]));
    Assert::assertSame(
        'admin.container0.container1.edit',
        app(BuildNestedRouteNameAction::class)->execute(['in_admin' => true, 'n' => 1, 'act' => 'edit']),
    );
    Assert::assertSame('?', app(BuildLanguageUrlAction::class)->execute());
});
