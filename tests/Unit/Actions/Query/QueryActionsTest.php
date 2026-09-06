<?php

declare(strict_types=1);

use Illuminate\Support\Facades\DB;
use Modules\Xot\Actions\Query\StartQueryLogAction;
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;

<<<<<<< HEAD
uses(TestCase::class);
=======
uses(\Modules\Xot\Tests\TestCase::class);
>>>>>>> 7f6cf6be (.)

test('start query log action works', function (): void {
    $action = app(StartQueryLogAction::class);
    $action->execute();

    try {
        DB::connection('activity')->table('activity_log')->count();
    } catch (Throwable $e) {
        Assert::assertStringContainsString('connection', $e->getMessage());
    }
});
