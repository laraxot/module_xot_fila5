<?php

declare(strict_types=1);
<<<<<<< .merge_file_rPmBIG
<<<<<<< HEAD
<<<<<<< HEAD
=======

uses(TestCase::class);
>>>>>>> laraxot/dev
=======

uses(Modules\Xot\Tests\TestCase::class);
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_gIbcKB
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

>>>>>>> 3792da0d (Check & fix styling)
it('resolves model types correctly', function (): void {
    Config::set('morph_map', ['log' => Log::class]);

    $classAction = app(GetModelClassByModelTypeAction::class);
    Assert::assertSame(Log::class, $classAction->execute('log'));

    $typeAction = app(GetModelTypeByModelAction::class);
<<<<<<< .merge_file_rPmBIG
<<<<<<< HEAD
<<<<<<< HEAD
    $result = $typeAction->execute(new class extends Log implements ModelContract {});
=======
    $result = $typeAction->execute(new class extends Log implements ModelContract {
    });
>>>>>>> laraxot/dev
=======
    $result = $typeAction->execute(new class extends Log implements ModelContract {
    });
>>>>>>> 3792da0d (Check & fix styling)
=======
    $result = $typeAction->execute(new class extends Log implements ModelContract {});
>>>>>>> .merge_file_gIbcKB
    Assert::assertIsString($result);
});
