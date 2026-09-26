<?php

declare(strict_types=1);

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\States\Transitions\XotBaseTransition;

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
uses(RefreshDatabase::class);
=======
=======
>>>>>>> ab8cc3f3 (.)
=======
>>>>>>> b7afadf9 (.)
describe('XotBaseTransition', function (): void {
    beforeEach(function (): void {
        // Create a test record using concrete class
        /* @phpstan-ignore-next-line property.notFound, new.internalClass */
        $this->record = new TestModelForTransition;
<<<<<<< HEAD
>>>>>>> cc7fb225 (.)

describe('XotBaseTransition', function () {
    beforeEach(function () {
        // Create a concrete test transition class
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        $this->transition = new class extends XotBaseTransition
        {
=======
=======
>>>>>>> 3fbbf1f5 (.)
=======
=======
>>>>>>> 399f46d3 (.)
=======
>>>>>>> 17684f52 (.)
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> b93ef594b4 (.)
>>>>>>> 6cba4fe (.)
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 399f46d3 (.)
=======
>>>>>>> ca9324a4 (.)
=======
>>>>>>> ed734516 (.)
=======
=======
>>>>>>> 73eab74 (.)
>>>>>>> 21348520 (.)
=======
>>>>>>> 3fbbf1f5 (.)
=======
>>>>>>> 399f46d3 (.)
=======
>>>>>>> ca9324a4 (.)
=======
>>>>>>> 7131bd09 (.)
=======
=======
>>>>>>> 73eab74 (.)
>>>>>>> 88ea7103 (.)
=======
>>>>>>> 3310e9c6 (.)
=======
>>>>>>> 17684f52 (.)
=======
>>>>>>> 9db27d12 (.)
        $this->transition = new class extends XotBaseTransition {
>>>>>>> 5a14301c (.)
=======
        $this->transition = new class extends XotBaseTransition {
>>>>>>> 5a14301c (.)
            public static string $name = 'test_transition';

            #[Override]
=======
        /* @phpstan-ignore-next-line property.notFound, new.internalClass */
        $this->transition = new TestTransitionForTest($this->record);
=======
=======
>>>>>>> 53d6a6ba (.)
=======
=======
uses(RefreshDatabase::class);
>>>>>>> 249a0067 (.)

describe('XotBaseTransition', function () {
    beforeEach(function () {
        // Create a concrete test transition class
<<<<<<< HEAD
        /* @phpstan-ignore-next-line property.notFound, new.internalClass */
        $this->transition = new TestTransitionForTest($this->record);
=======
>>>>>>> b7afadf9 (.)
=======
>>>>>>> 71586de2 (.)
uses(RefreshDatabase::class);

describe('XotBaseTransition', function () {
    beforeEach(function () {
        // Create a concrete test transition class
=======
>>>>>>> 249a0067 (.)
        $this->transition = new class extends XotBaseTransition
        {
            public static string $name = 'test_transition';

            #[Override]
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======

>>>>>>> f1d4085 (.)
=======
>>>>>>> 73eab74 (.)
>>>>>>> ab8cc3f3 (.)
=======
>>>>>>> 6dcebf8a (.)
=======
>>>>>>> 249a0067 (.)
            public function getNotificationRecipients(): array
            {
                return [
                    'test_user' => $this->record,
                    'null_user' => null,
                ];
            }

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
            #[Override]
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
            public function sendRecipientNotification(?UserContract $recipient): void
=======
            public function sendRecipientNotification(null|UserContract $recipient): void
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 5a14301c (.)
=======
            public function sendRecipientNotification(null|UserContract $recipient): void
>>>>>>> 3fbbf1f5 (.)
=======
=======
>>>>>>> 399f46d3 (.)
=======
>>>>>>> 17684f52 (.)
=======
<<<<<<< HEAD

=======
>>>>>>> ab8cc3f3 (.)
<<<<<<< HEAD
<<<<<<< HEAD
            #[Override]
<<<<<<< HEAD
            public function sendRecipientNotification(null|UserContract $recipient): void
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 399f46d3 (.)
=======
>>>>>>> 17684f52 (.)
=======
            public function sendRecipientNotification(?UserContract $recipient): void
>>>>>>> a12f125f4a (.)
=======
            #[Override]
            public function sendRecipientNotification(null|UserContract $recipient): void
>>>>>>> b93ef594b4 (.)
=======
            
            public function sendRecipientNotification(?UserContract $recipient): void
>>>>>>> origin/develop
>>>>>>> 6cba4fe (.)
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 399f46d3 (.)
=======
>>>>>>> ca9324a4 (.)
=======
            public function sendRecipientNotification(null|UserContract $recipient): void
>>>>>>> 5a14301c (.)
=======
=======
            public function sendRecipientNotification(?UserContract $recipient): void
>>>>>>> f1d4085 (.)
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> ed734516 (.)
=======
=======
>>>>>>> 88ea7103 (.)
=======
=======
            public function sendRecipientNotification(?UserContract $recipient): void
>>>>>>> f1d4085 (.)
>>>>>>> ab8cc3f3 (.)
=======
            #[Override]
            public function sendRecipientNotification(null|UserContract $recipient): void
>>>>>>> 73eab74 (.)
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 21348520 (.)
=======
>>>>>>> 3fbbf1f5 (.)
=======
>>>>>>> 399f46d3 (.)
=======
>>>>>>> ca9324a4 (.)
=======
=======
            public function sendRecipientNotification(?UserContract $recipient): void
>>>>>>> f1d4085 (.)
>>>>>>> 7131bd09 (.)
=======
>>>>>>> 88ea7103 (.)
=======
>>>>>>> 3310e9c6 (.)
=======
>>>>>>> 17684f52 (.)
=======
>>>>>>> 9db27d12 (.)
=======
>>>>>>> ab8cc3f3 (.)
=======
            #[Override]
            public function sendRecipientNotification(null|UserContract $recipient): void
>>>>>>> 6dcebf8a (.)
=======
            public function sendRecipientNotification(?UserContract $recipient): void
>>>>>>> 53d6a6ba (.)
=======
            #[Override]
            public function sendRecipientNotification(?UserContract $recipient): void
>>>>>>> 249a0067 (.)
            {
                // Mock implementation
            }
        };

        // Create a test record
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        $this->record = new class extends Model implements UserContract
        {
=======
=======
>>>>>>> 3fbbf1f5 (.)
=======
=======
>>>>>>> 399f46d3 (.)
=======
>>>>>>> 17684f52 (.)
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> b93ef594b4 (.)
>>>>>>> 6cba4fe (.)
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 399f46d3 (.)
=======
>>>>>>> ca9324a4 (.)
=======
>>>>>>> ed734516 (.)
=======
=======
>>>>>>> 73eab74 (.)
>>>>>>> 21348520 (.)
=======
>>>>>>> 3fbbf1f5 (.)
=======
>>>>>>> 399f46d3 (.)
=======
>>>>>>> ca9324a4 (.)
=======
>>>>>>> 7131bd09 (.)
=======
=======
>>>>>>> 73eab74 (.)
>>>>>>> 88ea7103 (.)
=======
>>>>>>> 3310e9c6 (.)
=======
>>>>>>> 17684f52 (.)
=======
>>>>>>> 9db27d12 (.)
        $this->record = new class extends Model implements UserContract {
>>>>>>> 5a14301c (.)
=======
        $this->record = new class extends Model implements UserContract {
>>>>>>> 5a14301c (.)
            protected $table = 'test_users';

            protected $fillable = ['name', 'email'];
=======
=======
>>>>>>> 73eab74 (.)
=======
>>>>>>> 6dcebf8a (.)
        $this->record = new class extends Model implements UserContract {
=======
        $this->record = new class extends Model implements UserContract
        {
>>>>>>> 53d6a6ba (.)
            protected $table = 'test_users';

            protected $fillable = ['name', 'email'];
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> f1d4085 (.)
=======
>>>>>>> 73eab74 (.)
>>>>>>> ab8cc3f3 (.)
=======
>>>>>>> 6dcebf8a (.)
=======
        $this->record = new class extends Model implements UserContract
        {
            protected $table = 'test_users';

            protected $fillable = ['name', 'email'];
>>>>>>> 249a0067 (.)

            // Implement UserContract methods as needed
            public function getAuthIdentifierName(): string
            {
                return 'id';
            }

            public function getAuthIdentifier(): mixed
            {
                return $this->id;
            }

            public function getAuthPassword(): string
            {
                return '';
            }

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
            public function getRememberToken(): ?string
=======
            public function getRememberToken(): null|string
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 5a14301c (.)
=======
            public function getRememberToken(): null|string
>>>>>>> 3fbbf1f5 (.)
=======
=======
>>>>>>> 399f46d3 (.)
=======
>>>>>>> 17684f52 (.)
=======
<<<<<<< HEAD

<<<<<<< HEAD
<<<<<<< HEAD
            public function getRememberToken(): null|string
=======
            public function getRememberToken(): ?string
>>>>>>> a12f125f4a (.)
=======
            public function getRememberToken(): null|string
>>>>>>> b93ef594b4 (.)
>>>>>>> 6cba4fe (.)
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 399f46d3 (.)
=======
>>>>>>> ca9324a4 (.)
=======
            public function getRememberToken(): null|string
>>>>>>> 5a14301c (.)
=======
=======
>>>>>>> 21348520 (.)
=======
>>>>>>> 88ea7103 (.)
=======
>>>>>>> ab8cc3f3 (.)
            public function getRememberToken(): null|string
=======
            public function getRememberToken(): ?string
>>>>>>> f1d4085 (.)
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> ed734516 (.)
=======
=======
            public function getRememberToken(): null|string
>>>>>>> 73eab74 (.)
>>>>>>> 21348520 (.)
=======
            public function getRememberToken(): null|string
>>>>>>> 3fbbf1f5 (.)
=======
>>>>>>> 399f46d3 (.)
=======
>>>>>>> ca9324a4 (.)
=======
            public function getRememberToken(): null|string
=======
            public function getRememberToken(): ?string
>>>>>>> f1d4085 (.)
>>>>>>> 7131bd09 (.)
=======
=======
            public function getRememberToken(): null|string
>>>>>>> 73eab74 (.)
>>>>>>> 88ea7103 (.)
=======
            public function getRememberToken(): null|string
>>>>>>> 3310e9c6 (.)
=======
>>>>>>> 17684f52 (.)
=======
>>>>>>> 9db27d12 (.)
=======
=======
            public function getRememberToken(): null|string
>>>>>>> 73eab74 (.)
>>>>>>> ab8cc3f3 (.)
=======
            public function getRememberToken(): null|string
>>>>>>> 6dcebf8a (.)
=======
            public function getRememberToken(): ?string
>>>>>>> 53d6a6ba (.)
=======
            public function getRememberToken(): ?string
>>>>>>> 249a0067 (.)
            {
                return null;
            }

            public function setRememberToken($value): void
            {
                // Mock implementation
            }

            public function getRememberTokenName(): string
            {
                return 'remember_token';
            }
        };

        $this->transition->record = $this->record;
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> d2b0a27 (.)
>>>>>>> ab8cc3f3 (.)
=======
>>>>>>> 53d6a6ba (.)
=======
>>>>>>> d2b0a27 (.)
>>>>>>> b7afadf9 (.)
=======
>>>>>>> 71586de2 (.)
=======
>>>>>>> 249a0067 (.)
    });

    it('can be instantiated', function () {
        expect($this->transition)->toBeInstanceOf(XotBaseTransition::class);
    });

    it('has static name property', function () {
        expect($this->transition::$name)->toBe('test_transition');
    });

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    it('has record property', function () {
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        $reflection = new ReflectionObject($this->transition);
        expect($reflection->hasProperty('record'))->toBeTrue();
=======
=======
>>>>>>> 53d6a6ba (.)
=======
    it('has record property', function (): void {
        /* @phpstan-ignore-next-line property.notFound */
>>>>>>> b7afadf9 (.)
=======
    it('has record property', function () {
>>>>>>> 71586de2 (.)
=======
    it('has record property', function () {
>>>>>>> 249a0067 (.)
        expect(property_exists($this->transition, 'record'))->toBeTrue();
>>>>>>> 5a14301c (.)
=======
        expect(property_exists($this->transition, 'record'))->toBeTrue();
>>>>>>> 5a14301c (.)
    });

    it('can get record', function () {
        $record = $this->transition->getRecord();

        expect($record)->toBe($this->record);
    });

    it('has sendNotifications method', function () {
        expect(method_exists($this->transition, 'sendNotifications'))->toBeTrue();
    });

    it('can send notifications without errors', function () {
        // This should not throw an exception
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
>>>>>>> 6dcebf8a (.)
<<<<<<< HEAD
        /* @phpstan-ignore-next-line property.notFound */
>>>>>>> ab8cc3f3 (.)
=======
>>>>>>> 53d6a6ba (.)
=======
        /* @phpstan-ignore-next-line property.notFound */
>>>>>>> b7afadf9 (.)
=======
>>>>>>> 71586de2 (.)
=======
>>>>>>> 249a0067 (.)
        expect($this->transition->sendNotifications(...))->not->toThrow(Exception::class);
    });

    it('has getNotificationRecipients method', function () {
        expect(method_exists($this->transition, 'getNotificationRecipients'))->toBeTrue();
    });

    it('returns correct notification recipients structure', function () {
        $recipients = $this->transition->getNotificationRecipients();

        expect($recipients)
            ->toBeArray()
            ->and($recipients)
            ->toHaveKey('test_user')
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
>>>>>>> b7afadf9 (.)
            /* @phpstan-ignore-next-line offsetAccess.nonOffsetAccessible */
            ->and($recipients['test_user'])
            ->toBeInstanceOf(RecordNotificationData::class);
=======
<<<<<<< HEAD
>>>>>>> ab8cc3f3 (.)
=======
>>>>>>> 53d6a6ba (.)
=======
>>>>>>> b7afadf9 (.)
=======
>>>>>>> 71586de2 (.)
=======
>>>>>>> 249a0067 (.)
            ->and($recipients)
            ->toHaveKey('null_user')
            ->and($recipients['null_user'])
            ->toBeNull();
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
>>>>>>> b7afadf9 (.)
=======
        expect($recipients)->toBeArray()
            ->and($recipients)->toHaveKey('test_user')
            ->and($recipients)->toHaveKey('null_user')
            ->and($recipients['null_user'])->toBeNull();
>>>>>>> f1d4085 (.)
=======
>>>>>>> 73eab74 (.)
>>>>>>> d2b0a27 (.)
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> ab8cc3f3 (.)
=======
=======
>>>>>>> 300ef70 (.)
>>>>>>> 6dcebf8a (.)
=======
>>>>>>> 53d6a6ba (.)
=======
=======
>>>>>>> 300ef70 (.)
>>>>>>> b7afadf9 (.)
=======
>>>>>>> 71586de2 (.)
=======
>>>>>>> 249a0067 (.)
    });

    it('has sendRecipientNotification method', function () {
        expect(method_exists($this->transition, 'sendRecipientNotification'))->toBeTrue();
    });

    it('can send notification to user contract', function () {
        // This should not throw an exception
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        expect(fn () => $this->transition->sendRecipientNotification($this->record))->not->toThrow(Exception::class);
=======
        expect(fn() => $this->transition->sendRecipientNotification($this->record))->not->toThrow(Exception::class);
>>>>>>> 5a14301c (.)
=======
        expect(fn() => $this->transition->sendRecipientNotification($this->record))->not->toThrow(Exception::class);
>>>>>>> 3fbbf1f5 (.)
=======
        expect(fn() => $this->transition->sendRecipientNotification($this->record))->not->toThrow(Exception::class);
=======
        expect(fn() => $this->transition->sendRecipientNotification($this->record))->not->toThrow(Exception::class);
>>>>>>> 399f46d3 (.)
=======
        expect(fn() => $this->transition->sendRecipientNotification($this->record))->not->toThrow(Exception::class);
>>>>>>> 17684f52 (.)
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 88ea7103 (.)
=======
>>>>>>> 17684f52 (.)
        expect(fn() => $this->transition->sendRecipientNotification($this->record))->not->toThrow(Exception::class);
=======
        expect(fn () => $this->transition->sendRecipientNotification($this->record))
            ->not->toThrow(Exception::class);
>>>>>>> a12f125f4a (.)
=======
        expect(fn() => $this->transition->sendRecipientNotification($this->record))->not->toThrow(Exception::class);
>>>>>>> b93ef594b4 (.)
=======
        expect(fn () => $this->transition->sendRecipientNotification($this->record))
            ->not->toThrow(Exception::class);
>>>>>>> origin/develop
>>>>>>> 6cba4fe (.)
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 399f46d3 (.)
=======
        expect(fn() => $this->transition->sendRecipientNotification($this->record))->not->toThrow(Exception::class);
>>>>>>> ca9324a4 (.)
=======
        expect(fn() => $this->transition->sendRecipientNotification($this->record))->not->toThrow(Exception::class);
>>>>>>> 5a14301c (.)
=======
=======
>>>>>>> 21348520 (.)
        expect(fn() => $this->transition->sendRecipientNotification($this->record))->not->toThrow(Exception::class);
=======
        expect(fn() => $this->transition->sendRecipientNotification($this->record))->not->toThrow(Exception::class);
>>>>>>> 7131bd09 (.)
=======
        expect(fn () => $this->transition->sendRecipientNotification($this->record))
            ->not->toThrow(Exception::class);
>>>>>>> f1d4085 (.)
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> ed734516 (.)
=======
=======
        expect(fn() => $this->transition->sendRecipientNotification($this->record))->not->toThrow(Exception::class);
>>>>>>> 73eab74 (.)
>>>>>>> 21348520 (.)
=======
        expect(fn() => $this->transition->sendRecipientNotification($this->record))->not->toThrow(Exception::class);
>>>>>>> 3fbbf1f5 (.)
=======
>>>>>>> 399f46d3 (.)
=======
        expect(fn() => $this->transition->sendRecipientNotification($this->record))->not->toThrow(Exception::class);
>>>>>>> ca9324a4 (.)
=======
>>>>>>> 7131bd09 (.)
=======
=======
        expect(fn() => $this->transition->sendRecipientNotification($this->record))->not->toThrow(Exception::class);
>>>>>>> 73eab74 (.)
>>>>>>> 88ea7103 (.)
=======
        expect(fn() => $this->transition->sendRecipientNotification($this->record))->not->toThrow(Exception::class);
>>>>>>> 3310e9c6 (.)
=======
>>>>>>> 17684f52 (.)
=======
        expect(fn() => $this->transition->sendRecipientNotification($this->record))->not->toThrow(Exception::class);
>>>>>>> 9db27d12 (.)
=======
=======
>>>>>>> 6dcebf8a (.)
        /* @phpstan-ignore-next-line property.notFound */
        expect(fn () => $this->transition->sendRecipientNotification($recipientData, []))->not->toThrow(Exception::class);
>>>>>>> ab8cc3f3 (.)
    });

<<<<<<< HEAD
    it('can send notification to null recipient', function () {
        // This should not throw an exception
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        expect(fn () => $this->transition->sendRecipientNotification(null))->not->toThrow(Exception::class);
=======
        expect(fn() => $this->transition->sendRecipientNotification(null))->not->toThrow(Exception::class);
>>>>>>> 5a14301c (.)
=======
        expect(fn() => $this->transition->sendRecipientNotification(null))->not->toThrow(Exception::class);
>>>>>>> 3fbbf1f5 (.)
=======
        expect(fn() => $this->transition->sendRecipientNotification(null))->not->toThrow(Exception::class);
=======
        expect(fn() => $this->transition->sendRecipientNotification(null))->not->toThrow(Exception::class);
>>>>>>> 399f46d3 (.)
=======
        expect(fn() => $this->transition->sendRecipientNotification(null))->not->toThrow(Exception::class);
>>>>>>> 17684f52 (.)
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 88ea7103 (.)
=======
>>>>>>> 17684f52 (.)
        expect(fn() => $this->transition->sendRecipientNotification(null))->not->toThrow(Exception::class);
=======
        expect(fn () => $this->transition->sendRecipientNotification(null))
            ->not->toThrow(Exception::class);
>>>>>>> a12f125f4a (.)
=======
        expect(fn() => $this->transition->sendRecipientNotification(null))->not->toThrow(Exception::class);
>>>>>>> b93ef594b4 (.)
=======
        expect(fn () => $this->transition->sendRecipientNotification(null))
            ->not->toThrow(Exception::class);
>>>>>>> origin/develop
>>>>>>> 6cba4fe (.)
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 399f46d3 (.)
=======
        expect(fn() => $this->transition->sendRecipientNotification(null))->not->toThrow(Exception::class);
>>>>>>> ca9324a4 (.)
=======
        expect(fn() => $this->transition->sendRecipientNotification(null))->not->toThrow(Exception::class);
>>>>>>> 5a14301c (.)
=======
=======
>>>>>>> 21348520 (.)
        expect(fn() => $this->transition->sendRecipientNotification(null))->not->toThrow(Exception::class);
=======
        expect(fn() => $this->transition->sendRecipientNotification(null))->not->toThrow(Exception::class);
>>>>>>> 7131bd09 (.)
=======
        expect(fn () => $this->transition->sendRecipientNotification(null))
            ->not->toThrow(Exception::class);
>>>>>>> f1d4085 (.)
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> ed734516 (.)
=======
=======
        expect(fn() => $this->transition->sendRecipientNotification(null))->not->toThrow(Exception::class);
>>>>>>> 73eab74 (.)
>>>>>>> 21348520 (.)
=======
        expect(fn() => $this->transition->sendRecipientNotification(null))->not->toThrow(Exception::class);
>>>>>>> 3fbbf1f5 (.)
=======
>>>>>>> 399f46d3 (.)
=======
        expect(fn() => $this->transition->sendRecipientNotification(null))->not->toThrow(Exception::class);
>>>>>>> ca9324a4 (.)
=======
>>>>>>> 7131bd09 (.)
=======
=======
        expect(fn() => $this->transition->sendRecipientNotification(null))->not->toThrow(Exception::class);
>>>>>>> 73eab74 (.)
>>>>>>> 88ea7103 (.)
=======
        expect(fn() => $this->transition->sendRecipientNotification(null))->not->toThrow(Exception::class);
>>>>>>> 3310e9c6 (.)
=======
>>>>>>> 17684f52 (.)
=======
        expect(fn() => $this->transition->sendRecipientNotification(null))->not->toThrow(Exception::class);
>>>>>>> 9db27d12 (.)
    });
=======
=======
        expect(fn () => $this->transition->sendRecipientNotification($this->record))->not->toThrow(Exception::class);
=======
<<<<<<< HEAD
<<<<<<< HEAD
        /* @phpstan-ignore-next-line property.notFound */
        expect(fn () => $this->transition->sendRecipientNotification($recipientData, []))->not->toThrow(Exception::class);
    });

>>>>>>> b7afadf9 (.)
    it('processes recipients correctly in sendNotifications', function (): void {
        // Create a test model
        /* @phpstan-ignore-next-line new.internalClass */
        $mockModel = new TestModelForTransition;
<<<<<<< HEAD
>>>>>>> cc7fb225 (.)

    it('processes recipients correctly in sendNotifications', function () {
        // Mock recipients with mixed types
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        $transition = new class extends XotBaseTransition
        {
=======
=======
>>>>>>> 3fbbf1f5 (.)
=======
=======
>>>>>>> 399f46d3 (.)
=======
>>>>>>> 17684f52 (.)
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> b93ef594b4 (.)
>>>>>>> 6cba4fe (.)
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 399f46d3 (.)
=======
>>>>>>> ca9324a4 (.)
=======
>>>>>>> ed734516 (.)
=======
=======
>>>>>>> 73eab74 (.)
>>>>>>> 21348520 (.)
=======
>>>>>>> 3fbbf1f5 (.)
=======
>>>>>>> 399f46d3 (.)
=======
>>>>>>> ca9324a4 (.)
=======
>>>>>>> 7131bd09 (.)
=======
=======
>>>>>>> 73eab74 (.)
>>>>>>> 88ea7103 (.)
=======
>>>>>>> 3310e9c6 (.)
=======
>>>>>>> 17684f52 (.)
=======
>>>>>>> 9db27d12 (.)
        $transition = new class extends XotBaseTransition {
>>>>>>> 5a14301c (.)
=======
        $transition = new class extends XotBaseTransition {
>>>>>>> 5a14301c (.)
            public static string $name = 'test_mixed_transition';

            #[Override]
            public function getNotificationRecipients(): array
            {
                return [
<<<<<<< HEAD
<<<<<<< HEAD
                    'valid_user' => new class extends Model implements UserContract
                    {
=======
                    'valid_user' => new class extends Model implements UserContract {
>>>>>>> 5a14301c (.)
=======
                    'valid_user' => new class extends Model implements UserContract {
>>>>>>> 5a14301c (.)
                        protected $table = 'test_users';

                        public function getAuthIdentifierName(): string
                        {
                            return 'id';
                        }

                        public function getAuthIdentifier(): mixed
                        {
                            return 1;
                        }

                        public function getAuthPassword(): string
                        {
                            return '';
                        }

<<<<<<< HEAD
<<<<<<< HEAD
                        public function getRememberToken(): ?string
=======
                        public function getRememberToken(): null|string
>>>>>>> 5a14301c (.)
=======
                        public function getRememberToken(): null|string
>>>>>>> 5a14301c (.)
                        {
                            return null;
                        }

<<<<<<< HEAD
<<<<<<< HEAD
                        public function setRememberToken($value): void {}
=======
                        public function setRememberToken($value): void
                        {
                        }
>>>>>>> 5a14301c (.)
=======
                        public function setRememberToken($value): void
                        {
                        }
>>>>>>> 5a14301c (.)

                        public function getRememberTokenName(): string
                        {
                            return 'remember_token';
                        }
                    },
                    'null_user' => null,
                ];
            }

            #[Override]
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
            public function sendRecipientNotification(?UserContract $recipient): void
=======
            public function sendRecipientNotification(null|UserContract $recipient): void
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 5a14301c (.)
=======
            public function sendRecipientNotification(null|UserContract $recipient): void
>>>>>>> 3fbbf1f5 (.)
=======
=======
>>>>>>> 399f46d3 (.)
=======
>>>>>>> 17684f52 (.)
=======
<<<<<<< HEAD

<<<<<<< HEAD
<<<<<<< HEAD
            #[Override]
            public function sendRecipientNotification(null|UserContract $recipient): void
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 399f46d3 (.)
=======
>>>>>>> 17684f52 (.)
=======
            public function sendRecipientNotification(?UserContract $recipient): void
>>>>>>> a12f125f4a (.)
=======
            #[Override]
            public function sendRecipientNotification(null|UserContract $recipient): void
>>>>>>> b93ef594b4 (.)
=======
            
            public function sendRecipientNotification(?UserContract $recipient): void
>>>>>>> origin/develop
>>>>>>> 6cba4fe (.)
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 399f46d3 (.)
=======
>>>>>>> ca9324a4 (.)
=======
            public function sendRecipientNotification(null|UserContract $recipient): void
>>>>>>> 5a14301c (.)
=======
=======
            public function sendRecipientNotification(?UserContract $recipient): void
>>>>>>> f1d4085 (.)
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> ed734516 (.)
=======
=======
>>>>>>> 88ea7103 (.)
=======
            #[Override]
            public function sendRecipientNotification(null|UserContract $recipient): void
>>>>>>> 73eab74 (.)
<<<<<<< HEAD
>>>>>>> 21348520 (.)
=======
>>>>>>> 3fbbf1f5 (.)
=======
>>>>>>> 399f46d3 (.)
=======
>>>>>>> ca9324a4 (.)
=======
=======
            public function sendRecipientNotification(?UserContract $recipient): void
>>>>>>> f1d4085 (.)
>>>>>>> 7131bd09 (.)
=======
>>>>>>> 88ea7103 (.)
=======
>>>>>>> 3310e9c6 (.)
=======
>>>>>>> 17684f52 (.)
=======
>>>>>>> 9db27d12 (.)
            {
                // Mock implementation
            }
        };
=======

        // Create transition with concrete model
        $transition = new TestTransitionForTest($mockModel);
>>>>>>> b7afadf9 (.)

        // This should process without errors
        expect($transition->sendNotifications(...))->not->toThrow(Exception::class);
=======
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 300ef70 (.)
        expect(fn() => $this->transition->sendRecipientNotification($this->record))->not->toThrow(Exception::class);
<<<<<<< HEAD
=======
        expect(fn () => $this->transition->sendRecipientNotification($this->record))->not->toThrow(Exception::class);
>>>>>>> 53d6a6ba (.)
=======
>>>>>>> a6ef6dc7 (.)
>>>>>>> b7afadf9 (.)
=======
        expect(fn () => $this->transition->sendRecipientNotification($this->record))->not->toThrow(Exception::class);
>>>>>>> 71586de2 (.)
    });

    it('can send notification to null recipient', function () {
        // This should not throw an exception
        expect(fn () => $this->transition->sendRecipientNotification(null))->not->toThrow(Exception::class);
    });

=======
        expect(fn () => $this->transition->sendRecipientNotification($this->record))->not->toThrow(Exception::class);
    });

    it('can send notification to null recipient', function () {
        // This should not throw an exception
        expect(fn () => $this->transition->sendRecipientNotification(null))->not->toThrow(Exception::class);
    });

>>>>>>> 249a0067 (.)
    it('processes recipients correctly in sendNotifications', function () {
        // Mock recipients with mixed types
        $transition = new class extends XotBaseTransition
        {
            public static string $name = 'test_mixed_transition';

            #[Override]
            public function getNotificationRecipients(): array
            {
                return [
                    'valid_user' => new class extends Model implements UserContract
                    {
                        protected $table = 'test_users';

                        public function getAuthIdentifierName(): string
                        {
                            return 'id';
                        }

                        public function getAuthIdentifier(): mixed
                        {
                            return 1;
                        }

                        public function getAuthPassword(): string
                        {
                            return '';
                        }

                        public function getRememberToken(): ?string
                        {
                            return null;
                        }

                        public function setRememberToken($value): void {}

                        public function getRememberTokenName(): string
                        {
                            return 'remember_token';
                        }
                    },
                    'null_user' => null,
                ];
            }

            #[Override]
            public function sendRecipientNotification(?UserContract $recipient): void
            {
                // Mock implementation
            }
        };

        // This should process without errors
        expect($transition->sendNotifications(...))->not->toThrow(Exception::class);
    });

    it('validates abstract class structure', function () {
        $reflection = new ReflectionClass(XotBaseTransition::class);

        expect($reflection->isAbstract())
            ->toBeTrue()
            ->and($reflection->hasMethod('sendNotifications'))
            ->toBeTrue()
            ->and($reflection->hasMethod('getRecord'))
            ->toBeTrue();
    });

    it('has proper method signatures', function () {
        $reflection = new ReflectionClass(XotBaseTransition::class);

        // Check sendNotifications method
        $sendMethod = $reflection->getMethod('sendNotifications');
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
>>>>>>> 6dcebf8a (.)
<<<<<<< HEAD

        /* @phpstan-ignore-next-line method.notFound, argument.templateType */
>>>>>>> ab8cc3f3 (.)
=======
>>>>>>> 53d6a6ba (.)
=======

        /* @phpstan-ignore-next-line method.notFound, argument.templateType */
>>>>>>> b7afadf9 (.)
=======
>>>>>>> 71586de2 (.)
=======
>>>>>>> 249a0067 (.)
        expect($sendMethod->isPublic())->toBeTrue()->and($sendMethod->getReturnType()?->getName())->toBe('void');

        // Check getRecord method
        $getRecordMethod = $reflection->getMethod('getRecord');
        expect($getRecordMethod->isPublic())->toBeTrue();
    });

    it('handles type checking correctly', function () {
        $recipients = $this->transition->getNotificationRecipients();

        foreach ($recipients as $recipient) {
            if ($recipient !== null) {
                expect($recipient instanceof UserContract || $recipient instanceof Model)->toBeTrue();
            }
        }
    });

    it('has proper documentation', function () {
        $reflection = new ReflectionClass(XotBaseTransition::class);
        $method = $reflection->getMethod('sendNotifications');

        expect($method->isPublic())->toBeTrue();
    });

    it('validates inheritance requirements', function () {
        // Test that concrete implementations must provide required methods
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
>>>>>>> 6dcebf8a (.)
<<<<<<< HEAD
=======
>>>>>>> b7afadf9 (.)
        /* @phpstan-ignore-next-line property.notFound */
=======
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 73eab74 (.)
>>>>>>> d2b0a27 (.)
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> ab8cc3f3 (.)
=======
=======
>>>>>>> 300ef70 (.)
>>>>>>> 6dcebf8a (.)
=======
>>>>>>> 53d6a6ba (.)
=======
=======
>>>>>>> 300ef70 (.)
>>>>>>> b7afadf9 (.)
=======
>>>>>>> 71586de2 (.)
=======
>>>>>>> 249a0067 (.)
        expect(method_exists($this->transition, 'getNotificationRecipients'))
            ->toBeTrue()
            ->and(method_exists($this->transition, 'sendRecipientNotification'))
            ->toBeTrue();
    });
});
