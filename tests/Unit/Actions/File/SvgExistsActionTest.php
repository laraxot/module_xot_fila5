<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Unit\Actions\File;

use Modules\Xot\Actions\File\SvgExistsAction;
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

it('verifies svg existence', function (): void {
    $action = app(SvgExistsAction::class);

    Assert::assertFalse($action->execute(''));
<<<<<<< HEAD
<<<<<<< .merge_file_mHkoFI
<<<<<<< HEAD
<<<<<<< HEAD
=======
    // We can't easily ensure a real icon exists without registering one,
    // but the try/catch block will return false if it's missing.
>>>>>>> laraxot/dev
=======
    // We can't easily ensure a real icon exists without registering one,
    // but the try/catch block will return false if it's missing.
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_1U4oaz
=======
<<<<<<< HEAD
    // We can't easily ensure a real icon exists without registering one,
    // but the try/catch block will return false if it's missing.
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
    Assert::assertFalse($action->execute('non-existent-icon-123456'));
});
