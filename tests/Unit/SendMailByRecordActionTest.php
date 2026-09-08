<?php

declare(strict_types=1);

<<<<<<< HEAD
use Illuminate\Mail\Mailable;
use Illuminate\Database\Eloquent\Model;
use Modules\Xot\Actions\Mail\SendMailByRecordAction;

it('throws if record has no email', function (): void {
    $record = new class extends Model {
        // no email attribute
        public function option(string $key): null|string
=======
namespace Modules\Xot\Tests\Unit;

use Illuminate\Database\Eloquent\Model;
use Modules\Xot\Actions\Mail\SendMailByRecordAction;
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

it('throws if record has no email', function (): void {
    $record = new class extends Model
    {
        public function option(string $key): null
>>>>>>> c7fd73eb (.)
        {
            return null;
        }

<<<<<<< HEAD
        public function myLogs()
        {
            return new class {
                public function create(array $data): void
                {
                }
=======
        public function myLogs(): object
        {
            return new class
            {
                /** @param array<mixed> $data */
                public function create(array $data): void {}
>>>>>>> c7fd73eb (.)
            };
        }
    };

<<<<<<< HEAD
    expect(fn() => app(SendMailByRecordAction::class)->execute($record, Mailable::class))
        ->toThrow(InvalidArgumentException::class);
=======
    try {
        app(SendMailByRecordAction::class)->execute($record, \stdClass::class);
        Assert::fail('Expected exception was not thrown.');
    } catch (\InvalidArgumentException $e) {
        Assert::assertInstanceOf(\InvalidArgumentException::class, $e);
    }
>>>>>>> c7fd73eb (.)
});
