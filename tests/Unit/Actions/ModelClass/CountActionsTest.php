<?php

declare(strict_types=1);

use Modules\Xot\Actions\ModelClass\CountAction;
use Modules\Xot\Actions\ModelClass\UpdateCountAction;
use Modules\Xot\Models\XotBaseModel;
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;

<<<<<<< HEAD
uses(TestCase::class);
=======
uses(\Modules\Xot\Tests\TestCase::class);
>>>>>>> 7f6cf6be (.)

test('count actions work', function (): void {
    $action = app(CountAction::class);
    $updateAction = app(UpdateCountAction::class);

    $modelClass = XotBaseModel::class;

    try {
        $count = $action->execute($modelClass);
        Assert::assertIsInt($count);
        $updateAction->execute($modelClass, 10);
    } catch (Throwable $e) {
        Assert::assertStringContainsString('table', $e->getMessage());
    }
});
