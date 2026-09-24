<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Unit\Actions\File;

<<<<<<< HEAD
=======
use Mockery;
use Mockery\MockInterface;
use Modules\Xot\Actions\File\FixPathAction;
use Modules\Xot\Actions\File\GetViewNameSpacePathAction;
>>>>>>> laraxot/dev
use Modules\Xot\Actions\File\ViewPathAction;
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;

<<<<<<< HEAD
uses(TestCase::class)->group('xot');
it('resolves view path correctly', function (): void {
=======
uses(TestCase::class);

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
>>>>>>> laraxot/dev
    $action = app(ViewPathAction::class);

    $result = $action->execute('Xot::dashboard.index');

    Assert::assertIsString($result);
    Assert::assertStringEndsWith('.blade.php', $result);
});
