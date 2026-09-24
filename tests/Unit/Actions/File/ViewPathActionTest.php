<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Unit\Actions\File;

<<<<<<< .merge_file_8l8AY9
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> .merge_file_0MD0qd
use Mockery;
use Mockery\MockInterface;
use Modules\Xot\Actions\File\FixPathAction;
use Modules\Xot\Actions\File\GetViewNameSpacePathAction;
<<<<<<< .merge_file_8l8AY9
=======
>>>>>>> laraxot/dev
=======
use Modules\Xot\Actions\File\FixPathAction;
use Modules\Xot\Actions\File\GetViewNameSpacePathAction;
>>>>>>> 8d801bbe (Check & fix styling)
=======
>>>>>>> .merge_file_0MD0qd
use Modules\Xot\Actions\File\ViewPathAction;
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

<<<<<<< .merge_file_8l8AY9
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> .merge_file_0MD0qd
it('calculates view path correctly', function (): void {
    /** @var GetViewNameSpacePathAction&MockInterface $nsMock */
    $nsMock = Mockery::mock(GetViewNameSpacePathAction::class);
    $nsMock->shouldReceive('execute')
        ->with('test_ns')
        ->andReturn('/path/to/views');

    app()->instance(GetViewNameSpacePathAction::class, $nsMock);

    /** @var FixPathAction&MockInterface $fixMock */
    $fixMock = Mockery::mock(FixPathAction::class);
    $fixMock->shouldReceive('execute')
        ->andReturnUsing(fn (string $path): string => $path);

    app()->instance(FixPathAction::class, $fixMock);
    $action = app(ViewPathAction::class);

    $result = $action->execute('Xot::dashboard.index');

    Assert::assertIsString($result);
    Assert::assertStringEndsWith('.blade.php', $result);
=======
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

    $action = app(ViewPathAction::class);
    $result = $action->execute('test_ns::folder.file');

    Assert::assertSame('/path/to/views/folder/file.blade.php', $result);
>>>>>>> 8d801bbe (Check & fix styling)
});
