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
            $deleted = true;

            return true;
        }
    };

    $result = $action->execute($mockModel, [], []);

    expect($result)->toBe($mockModel)
        ->and($mockModel->deleted)->toBeTrue();
});

it('flashes status message on successful delete', function (): void {
    $mockModel = new class extends BaseModel {
        public function delete(): bool
        {
            return true;
        }
    };

    $action->execute($mockModel, [], []);

    expect(Session::get('status'))->toBe('eliminato');
});

it('flashes failure message when delete returns false', function (): void {
    $mockModel = new class extends BaseModel {
        public function delete(): bool
        {
            return false;
        }
    };

    $action->execute($mockModel, [], []);

    expect(Session::get('status'))->toBe('NON eliminato');
});
