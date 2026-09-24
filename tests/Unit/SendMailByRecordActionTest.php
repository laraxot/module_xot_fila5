<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Unit;

use Illuminate\Database\Eloquent\Model;
use Modules\Xot\Actions\Mail\SendMailByRecordAction;
use Modules\Xot\Tests\TestCase;
<<<<<<< HEAD
use PHPUnit\Framework\Assert;
=======
>>>>>>> laraxot/dev

uses(TestCase::class);

it('throws if record has no email', function (): void {
<<<<<<< HEAD
    $record = new class extends Model
    {
=======
    $record = new class extends Model {
>>>>>>> laraxot/dev
        public function option(string $key): null
        {
            return null;
        }

        public function myLogs(): object
        {
<<<<<<< HEAD
            return new class
            {
                /** @param array<string, mixed> $data */
                public function create(array $data): void {}
=======
            return new class {
                /** @param array<mixed> $data */
                public function create(array $data): void
                {
                }
>>>>>>> laraxot/dev
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
>>>>>>> laraxot/dev
});
