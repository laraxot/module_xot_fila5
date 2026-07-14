<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Unit\Actions\Model;

use Illuminate\Support\Facades\Session;
use Modules\Xot\Actions\Model\DestroyAction;
use Modules\Xot\Models\BaseModel;
<<<<<<< HEAD
<<<<<<< HEAD
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

it('deletes model and returns it', function (): void {
=======
=======
use Modules\Xot\Tests\TestCase;
>>>>>>> 61938ca4 (delete .claude-audit/)
use PHPUnit\Framework\Assert;

uses(TestCase::class);

it('deletes model and returns it', function (): void {
<<<<<<< HEAD
    /** @var Modules\Xot\Tests\TestCase $this */
>>>>>>> 64619e34 (.)
=======
>>>>>>> 61938ca4 (delete .claude-audit/)
    $mockModel = new class extends BaseModel {
        public bool $deleted = false;

        public function delete(): bool
        {
            $this->deleted = true;

            return true;
        }
    };

    $result = app(DestroyAction::class)->execute($mockModel, [], []);

    Assert::assertSame($mockModel, $result);
    Assert::assertTrue($mockModel->deleted);
});

it('flashes status message on successful delete', function (): void {
    $mockModel = new class extends BaseModel {
        public function delete(): bool
        {
            return true;
        }
    };

    app(DestroyAction::class)->execute($mockModel, [], []);

    Assert::assertSame('eliminato', Session::get('status'));
});

it('flashes failure message when delete returns false', function (): void {
    $mockModel = new class extends BaseModel {
        public function delete(): bool
        {
            return false;
        }
    };

    app(DestroyAction::class)->execute($mockModel, [], []);

    Assert::assertSame('NON eliminato', Session::get('status'));
});
