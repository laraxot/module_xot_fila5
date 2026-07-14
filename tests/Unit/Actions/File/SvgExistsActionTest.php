<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Unit\Actions\File;

use Modules\Xot\Actions\File\SvgExistsAction;
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

it('verifies svg existence', function (): void {
    /** @var TestCase $this */
    // Factory is final, we check with a real instance if possible or just test logic flow
    $action = app(SvgExistsAction::class);

    Assert::assertFalse($action->execute(''));
    Assert::assertFalse($action->execute('non-existent-icon-123456'));
});
