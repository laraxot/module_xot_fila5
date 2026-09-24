<?php

declare(strict_types=1);

<<<<<<< HEAD
use Illuminate\Support\Facades\DB;
use Modules\Xot\Actions\Query\StartQueryLogAction;
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

=======
uses(Modules\Xot\Tests\TestCase::class);
use Illuminate\Support\Facades\DB;
use Modules\Xot\Actions\Query\StartQueryLogAction;
use PHPUnit\Framework\Assert;

>>>>>>> laraxot/dev
test('start query log action works', function (): void {
    $action = app(StartQueryLogAction::class);
    $action->execute();

    try {
        DB::connection('activity')->table('activity_log')->count();
    } catch (Throwable $e) {
        Assert::assertStringContainsString('connection', $e->getMessage());
    }
});
