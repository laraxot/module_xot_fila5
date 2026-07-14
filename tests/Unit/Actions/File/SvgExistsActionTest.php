<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Unit\Actions\File;

use Modules\Xot\Actions\File\SvgExistsAction;
<<<<<<< HEAD
<<<<<<< HEAD
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

it('verifies svg existence', function (): void {
    /** @var TestCase $this */
    // Factory is final, we check with a real instance if possible or just test logic flow
    $action = app(SvgExistsAction::class);

    Assert::assertFalse($action->execute(''));
=======
=======
use Modules\Xot\Tests\TestCase;
>>>>>>> 61938ca4 (delete .claude-audit/)
use PHPUnit\Framework\Assert;

uses(TestCase::class);

it('verifies svg existence', function (): void {
    $action = app(SvgExistsAction::class);

    Assert::assertFalse($action->execute(''));
<<<<<<< HEAD
    // We can't easily ensure a real icon exists without registering one,
    // but the try/catch block will return false if it's missing.
>>>>>>> 64619e34 (.)
=======
>>>>>>> 61938ca4 (delete .claude-audit/)
    Assert::assertFalse($action->execute('non-existent-icon-123456'));
});
