<?php

declare(strict_types=1);

use Modules\Xot\Actions\Class\GetFilenameByClassnameAction;
use Modules\Xot\Models\Log;
use PHPUnit\Framework\Assert;
uses(Modules\Xot\Tests\TestCase::class);

it('gets filename from classname correctly', function (): void {
    $action = app(GetFilenameByClassnameAction::class);

    $filename = $action->execute(Log::class);

    expect($filename)->toBeString();
    expect($filename)->toContain('Log.php');
});
