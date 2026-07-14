<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Unit;

use Illuminate\Database\Eloquent\Model;
use Modules\Xot\Actions\Mail\SendMailByRecordAction;
use Modules\Xot\Tests\TestCase;

uses(TestCase::class);

it('throws if record has no email', function (): void {
    $record = new class extends Model {
        public function option(string $key): null
        {
            return null;
        }

        public function myLogs(): object
        {
            return new class {
                /** @param array<mixed> $data */
                public function create(array $data): void
                {
                }
            };
        }
    };

<<<<<<< HEAD
<<<<<<< HEAD
    $this->expectThrowable(\InvalidArgumentException::class);

    app(SendMailByRecordAction::class)->execute($record, \stdClass::class);
=======
    $this->expectThrowable(InvalidArgumentException::class);

    app(SendMailByRecordAction::class)->execute($record, stdClass::class);
>>>>>>> 64619e34 (.)
=======
    $this->expectThrowable(\InvalidArgumentException::class);

    app(SendMailByRecordAction::class)->execute($record, \stdClass::class);
>>>>>>> 61938ca4 (delete .claude-audit/)
});
