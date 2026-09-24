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
<<<<<<< .merge_file_G2czhs
<<<<<<< HEAD
<<<<<<< HEAD
=======
    // We can't easily ensure a real icon exists without registering one,
    // but the try/catch block will return false if it's missing.
>>>>>>> laraxot/dev
=======
>>>>>>> 8d801bbe (Check & fix styling)
=======
>>>>>>> .merge_file_x0hKXv
    Assert::assertFalse($action->execute('non-existent-icon-123456'));
});
