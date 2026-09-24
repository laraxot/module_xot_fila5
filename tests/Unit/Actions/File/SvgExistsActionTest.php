<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Unit\Actions\File;

use Modules\Xot\Actions\File\SvgExistsAction;
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;

<<<<<<< HEAD
<<<<<<< HEAD
uses(TestCase::class)->group('xot');
=======
uses(TestCase::class);

>>>>>>> laraxot/dev
=======
uses(TestCase::class)->group('xot');
>>>>>>> laraxot/dev
it('verifies svg existence', function (): void {
    $action = app(SvgExistsAction::class);

    Assert::assertFalse($action->execute(''));
<<<<<<< HEAD
<<<<<<< HEAD
    // We can't easily ensure a real icon exists without registering one,
    // but the try/catch block will return false if it's missing.
=======
>>>>>>> laraxot/dev
=======
    // We can't easily ensure a real icon exists without registering one,
    // but the try/catch block will return false if it's missing.
>>>>>>> laraxot/dev
    Assert::assertFalse($action->execute('non-existent-icon-123456'));
});
