<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Unit\Actions\Model;

use Illuminate\Support\Facades\Session;
use Modules\Xot\Actions\Model\DestroyAction;
use Modules\Xot\Models\BaseModel;
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

it('deletes model and returns it', function (): void {
<<<<<<< .merge_file_pgfDFf
<<<<<<< HEAD
<<<<<<< HEAD
    $mockModel = new class extends BaseModel
    {
=======
    $mockModel = new class extends BaseModel {
>>>>>>> laraxot/dev
=======
    $mockModel = new class extends BaseModel {
>>>>>>> 3792da0d (Check & fix styling)
=======
    $mockModel = new class extends BaseModel
    {
>>>>>>> .merge_file_tzV00s
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
<<<<<<< .merge_file_pgfDFf
<<<<<<< HEAD
<<<<<<< HEAD
    $mockModel = new class extends BaseModel
    {
=======
    $mockModel = new class extends BaseModel {
>>>>>>> laraxot/dev
=======
    $mockModel = new class extends BaseModel {
>>>>>>> 3792da0d (Check & fix styling)
=======
    $mockModel = new class extends BaseModel
    {
>>>>>>> .merge_file_tzV00s
        public function delete(): bool
        {
            return true;
        }
    };

    app(DestroyAction::class)->execute($mockModel, [], []);

    Assert::assertSame('eliminato', Session::get('status'));
});

it('flashes failure message when delete returns false', function (): void {
<<<<<<< .merge_file_pgfDFf
<<<<<<< HEAD
<<<<<<< HEAD
    $mockModel = new class extends BaseModel
    {
=======
    $mockModel = new class extends BaseModel {
>>>>>>> laraxot/dev
=======
    $mockModel = new class extends BaseModel {
>>>>>>> 3792da0d (Check & fix styling)
=======
    $mockModel = new class extends BaseModel
    {
>>>>>>> .merge_file_tzV00s
        public function delete(): bool
        {
            return false;
        }
    };

    app(DestroyAction::class)->execute($mockModel, [], []);

    Assert::assertSame('NON eliminato', Session::get('status'));
});
