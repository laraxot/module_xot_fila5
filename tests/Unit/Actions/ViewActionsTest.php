<?php

declare(strict_types=1);

use Illuminate\Support\Facades\View as ViewFacade;
use Illuminate\View\View;
use Modules\Xot\Actions\GetViewByClassAction;
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;

<<<<<<< HEAD
uses(TestCase::class);
=======
uses(\Modules\Xot\Tests\TestCase::class);
>>>>>>> 7f6cf6be (.)

test('get view actions work', function (): void {
    $classAction = app(GetViewByClassAction::class);

    $mockView = Mockery::mock(View::class);
    $mockView->allows(['getName' => 'test-view-action']);

    ViewFacade::partialMock()->allows(['make' => $mockView]);

    $view = $classAction->execute('Modules\Xot\Actions\TestViewAction');
    Assert::assertInstanceOf(View::class, $view);
    Assert::assertSame('test-view-action', $view->getName());
});
