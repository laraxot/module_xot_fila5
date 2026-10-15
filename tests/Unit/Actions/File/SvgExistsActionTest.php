<?php

declare(strict_types=1);

namespace Tests\Modules\Xot\Unit\Actions\File;

use Modules\Xot\Actions\File\SvgExistsAction;
use Tests\Modules\Xot\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

it('verifies svg existence', function (): void {
    $action = app(SvgExistsAction::class);

    Assert::assertFalse($action->execute(''));
    Assert::assertFalse($action->execute('non-existent-icon-123456'));
});
