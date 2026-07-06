<?php

declare(strict_types=1);

use Modules\Xot\Actions\File\FixPathAction;
use Modules\Xot\Actions\File\GetViewNameSpacePathAction;
use Modules\Xot\Actions\File\ViewPathAction;
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

it('calculates view path correctly', function (): void {
    /** @var TestCase $this */
    $nsMock = $this->createUnitMock(GetViewNameSpacePathAction::class);
    $nsMock->method('execute')
        ->with('test_ns')
        ->andReturn('/path/to/views');

    $this->mock(FixPathAction::class)
        ->shouldReceive('execute')
        ->once()
        ->andReturnArg(0);

    $action = app(ViewPathAction::class);
    $result = $action->execute('test_ns::folder.file');

    expect($result)->toBe('/path/to/views/folder/file.blade.php');
});
