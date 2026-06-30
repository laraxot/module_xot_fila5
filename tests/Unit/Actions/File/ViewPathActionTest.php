<?php

declare(strict_types=1);

uses(Modules\Xot\Tests\TestCase::class);
use Modules\Xot\Actions\File\FixPathAction;
use Modules\Xot\Actions\File\GetViewNameSpacePathAction;
use Modules\Xot\Actions\File\ViewPathAction;
<<<<<<< HEAD
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

it('calculates view path correctly', function (): void {
=======
use PHPUnit\Framework\Assert;

it('calculates view path correctly', function (): void {
    /** @var Modules\Xot\Tests\TestCase $this */
>>>>>>> 64619e34 (.)
    $nsMock = $this->createUnitMock(GetViewNameSpacePathAction::class);
    $nsMock->method('execute')
        ->with('test_ns')
        ->willReturn('/path/to/views');

    app()->instance(GetViewNameSpacePathAction::class, $nsMock);

    $fixMock = $this->createUnitMock(FixPathAction::class);
    $fixMock->method('execute')
        ->willReturnArgument(0);

    app()->instance(FixPathAction::class, $fixMock);

    $action = app(ViewPathAction::class);

    $result = $action->execute('Xot::dashboard.index');

    Assert::assertIsString($result);
    Assert::assertStringEndsWith('.blade.php', $result);
});
