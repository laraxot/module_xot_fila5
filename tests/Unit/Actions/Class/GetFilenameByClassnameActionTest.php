<?php

declare(strict_types=1);

uses(TestCase::class);
use Modules\Xot\Actions\Class\GetFilenameByClassnameAction;
use Modules\Xot\Models\Log;
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;

it('gets filename from classname correctly', function (): void {
    $action = app(GetFilenameByClassnameAction::class);

    $filename = $action->execute(Log::class);

    Assert::assertIsString($filename);
    Assert::assertStringContainsString((string) 'Log.php', (string) $filename);
});
