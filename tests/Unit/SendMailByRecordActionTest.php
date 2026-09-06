<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Unit;

use Illuminate\Database\Eloquent\Model;
use Modules\Xot\Actions\Mail\SendMailByRecordAction;
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;

<<<<<<< HEAD
uses(TestCase::class);

it('throws if record has no email', function (): void {
    $record = new class extends Model
=======
uses(\Modules\Xot\Tests\TestCase::class);

it('throws if record has no email', function (): void {
    $record = new class() extends Model
>>>>>>> 7f6cf6be (.)
    {
        public function option(string $key): null
        {
            return null;
        }

        public function myLogs(): object
        {
<<<<<<< HEAD
            return new class
            {
                /** @param array<mixed> $data */
=======
            return new class()
            {
                /** @param array<string, mixed> $data */
>>>>>>> 7f6cf6be (.)
                public function create(array $data): void {}
            };
        }
    };

    try {
        app(SendMailByRecordAction::class)->execute($record, \stdClass::class);
        Assert::fail('Expected exception was not thrown.');
    } catch (\InvalidArgumentException $e) {
        Assert::assertInstanceOf(\InvalidArgumentException::class, $e);
    }
});
