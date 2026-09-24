<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Unit;

use Illuminate\Database\Eloquent\Model;
use Modules\Xot\Actions\Mail\SendMailByRecordAction;
use Modules\Xot\Tests\TestCase;
<<<<<<< HEAD
use PHPUnit\Framework\Assert;
=======
>>>>>>> 8d801bbe (Check & fix styling)

uses(TestCase::class);

it('throws if record has no email', function (): void {
<<<<<<< .merge_file_G9lJB0
<<<<<<< HEAD
<<<<<<< HEAD
    $record = new class extends Model
    {
=======
    $record = new class extends Model {
>>>>>>> laraxot/dev
=======
    $record = new class extends Model {
>>>>>>> 8d801bbe (Check & fix styling)
=======
    $record = new class extends Model
    {
>>>>>>> .merge_file_LDBmWp
        public function option(string $key): null
        {
            return null;
        }

        public function myLogs(): object
        {
<<<<<<< .merge_file_G9lJB0
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> .merge_file_LDBmWp
            return new class
            {
                /** @param array<string, mixed> $data */
                public function create(array $data): void {}
<<<<<<< .merge_file_G9lJB0
=======
            return new class {
                /** @param array<string, mixed> $data */
                public function create(array $data): void
                {
                }
>>>>>>> laraxot/dev
=======
            return new class {
                /** @param array<mixed> $data */
                public function create(array $data): void
                {
                }
>>>>>>> 8d801bbe (Check & fix styling)
=======
>>>>>>> .merge_file_LDBmWp
            };
        }
    };

<<<<<<< HEAD
    try {
        app(SendMailByRecordAction::class)->execute($record, \stdClass::class);
        Assert::fail('Expected exception was not thrown.');
    } catch (\InvalidArgumentException $e) {
        Assert::assertInstanceOf(\InvalidArgumentException::class, $e);
    }
=======
    $this->expectThrowable(\InvalidArgumentException::class);

    app(SendMailByRecordAction::class)->execute($record, \stdClass::class);
>>>>>>> 8d801bbe (Check & fix styling)
});
