<?php

declare(strict_types=1);

use Illuminate\Database\Eloquent\Model;
use Illuminate\Mail\Mailable;
use Modules\Xot\Actions\Mail\SendMailByRecordAction;
use Modules\Xot\Tests\TestCase;

uses(TestCase::class);

it('throws if record has no email', function (): void {
    /** @var TestCase $this */
    $record = new class extends Model {
        public function option(string $key): null
        {
            return null;
        }

        public function myLogs()
        {
            return new class {
                /** @param array<mixed> $data */
                public function create(array $data): void
                {
                }
            };
        }
    };

    expect(fn () => app(SendMailByRecordAction::class)->execute($record, Mailable::class))
        ->toThrow(InvalidArgumentException::class);
});
