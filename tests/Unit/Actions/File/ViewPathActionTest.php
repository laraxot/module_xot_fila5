<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Unit\Actions\File;

<<<<<<< HEAD
=======
use Modules\Xot\Actions\File\FixPathAction;
use Modules\Xot\Actions\File\GetViewNameSpacePathAction;
>>>>>>> 2353ccee (.)
use Modules\Xot\Actions\File\ViewPathAction;
use PHPUnit\Framework\Assert;

<<<<<<< HEAD
it('resolves view path correctly', function (): void {
=======
uses(TestCase::class);

it('calculates view path correctly', function (): void {
    $nsMock = $this->createUnitMock(GetViewNameSpacePathAction::class);
    $nsMock->method('execute')
        ->with('test_ns')
        ->willReturn('/path/to/views');

    app()->instance(GetViewNameSpacePathAction::class, $nsMock);

    $fixMock = $this->createUnitMock(FixPathAction::class);
    $fixMock->method('execute')
        ->willReturnArgument(0);

    app()->instance(FixPathAction::class, $fixMock);

>>>>>>> 2353ccee (.)
    $action = app(ViewPathAction::class);

    $result = $action->execute('Xot::dashboard.index');

    Assert::assertIsString($result);
    Assert::assertStringEndsWith('.blade.php', $result);
});
