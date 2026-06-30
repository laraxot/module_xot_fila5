<?php

declare(strict_types=1);

uses(Modules\Xot\Tests\TestCase::class);
use Modules\Xot\Actions\File\FixPathAction;
<<<<<<< HEAD
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);
=======
use PHPUnit\Framework\Assert;
>>>>>>> 64619e34 (.)

it('normalizes path slashes correctly', function (): void {
    /** @var Modules\Xot\Tests\TestCase $this */
    $action = app(FixPathAction::class);

    $path = 'some/path\with/mixed\\slashes';
    $expected = str_replace(['/', '\\'], [DIRECTORY_SEPARATOR, DIRECTORY_SEPARATOR], $path);

    Assert::assertSame($expected, $action->execute($path));
});
