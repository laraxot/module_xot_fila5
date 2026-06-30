<?php

declare(strict_types=1);

uses(Modules\Xot\Tests\TestCase::class);
use Modules\Xot\Actions\File\SvgExistsAction;
<<<<<<< HEAD
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

it('verifies svg existence', function (): void {
    $action = app(SvgExistsAction::class);

    Assert::assertFalse($action->execute(''));
=======
use PHPUnit\Framework\Assert;

it('verifies svg existence', function (): void {
    /** @var Modules\Xot\Tests\TestCase $this */
    // Factory is final, we check with a real instance if possible or just test logic flow
    $action = app(SvgExistsAction::class);

    // Empty name
    Assert::assertFalse($action->execute(''));
    // We can't easily ensure a real icon exists without registering one,
    // but the try/catch block will return false if it's missing.
>>>>>>> 64619e34 (.)
    Assert::assertFalse($action->execute('non-existent-icon-123456'));
});
