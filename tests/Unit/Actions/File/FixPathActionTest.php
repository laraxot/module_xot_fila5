<?php

declare(strict_types=1);

namespace Tests\Modules\Xot\Unit\Actions\File;

use Modules\Xot\Actions\File\FixPathAction;
use Tests\Modules\Xot\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

it('normalizes path slashes correctly', function (): void {
    $action = app(FixPathAction::class);

    $path = 'some/path\with/mixed\\slashes';
    $expected = str_replace(['/', '\\'], [DIRECTORY_SEPARATOR, DIRECTORY_SEPARATOR], $path);

    Assert::assertSame($expected, $action->execute($path));
});
