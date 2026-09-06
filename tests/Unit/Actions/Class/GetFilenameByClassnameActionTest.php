<?php

declare(strict_types=1);

use Modules\Xot\Actions\Class\GetFilenameByClassnameAction;
use Modules\Xot\Models\Log;
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;

<<<<<<< HEAD
uses(TestCase::class);
=======
uses(\Modules\Xot\Tests\TestCase::class);
>>>>>>> 7f6cf6be (.)

it('gets filename from classname correctly', function (): void {
    $action = app(GetFilenameByClassnameAction::class);

    $filename = $action->execute(Log::class);

    Assert::assertIsString($filename);
    Assert::assertStringContainsString((string) 'Log.php', (string) $filename);
});
