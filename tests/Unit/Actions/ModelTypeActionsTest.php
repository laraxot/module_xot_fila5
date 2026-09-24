<?php

declare(strict_types=1);

<<<<<<< HEAD
=======
uses(Modules\Xot\Tests\TestCase::class);
>>>>>>> laraxot/dev
use Illuminate\Support\Facades\Config;
use Modules\Xot\Actions\GetModelClassByModelTypeAction;
use Modules\Xot\Actions\GetModelTypeByModelAction;
use Modules\Xot\Contracts\ModelContract;
use Modules\Xot\Models\Log;
<<<<<<< HEAD
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

=======
use PHPUnit\Framework\Assert;

>>>>>>> laraxot/dev
it('resolves model types correctly', function (): void {
    Config::set('morph_map', ['log' => Log::class]);

    $classAction = app(GetModelClassByModelTypeAction::class);
    Assert::assertSame(Log::class, $classAction->execute('log'));

    $typeAction = app(GetModelTypeByModelAction::class);
<<<<<<< HEAD
    $result = $typeAction->execute(new class extends Log implements ModelContract {});
=======
    $result = $typeAction->execute(new class extends Log implements ModelContract {
    });
>>>>>>> laraxot/dev
    Assert::assertIsString($result);
});
