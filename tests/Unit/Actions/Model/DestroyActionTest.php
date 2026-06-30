<?php

declare(strict_types=1);

uses(Modules\Xot\Tests\TestCase::class);
use Illuminate\Support\Facades\Session;
use Modules\Xot\Actions\Model\DestroyAction;
use Modules\Xot\Models\BaseModel;
<<<<<<< HEAD
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

it('deletes model and returns it', function (): void {
=======
use PHPUnit\Framework\Assert;

it('deletes model and returns it', function (): void {
    /** @var Modules\Xot\Tests\TestCase $this */
>>>>>>> 64619e34 (.)
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
