<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Unit;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\Notify\Datas\RecordNotificationData;
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\States\Transitions\XotBaseTransition;

uses(RefreshDatabase::class);

describe('XotBaseTransition', function () {
    beforeEach(function () {
        // Create a test record
        $this->record = new class extends Model
        {
            protected $table = 'test_records';
            protected $fillable = ['id', 'name'];
        };

        // Create a concrete test transition class
        $this->transition = new class($this->record) extends XotBaseTransition
        {
            public static string $name = 'test_transition';

            #[Override]
            public function getNotificationRecipients(): array
            {
                return [
                    'test_user' => $this->record,
                    'null_user' => null,
                ];
            }

            #[Override]
            public function sendRecipientNotification(?UserContract $recipient): void
            {
                // Mock implementation
            }
        };

        // Create a test record
        $this->record = new class extends Model implements UserContract {
            protected $table = 'test_users';

            protected $fillable = ['name', 'email'];

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

            public function getRememberToken(): ?string
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
    });

    it('can be instantiated', function () {
        expect($this->transition)->toBeInstanceOf(XotBaseTransition::class);
    });

    it('has static name property', function () {
        expect($this->transition::$name)->toBe('test_transition');
    });

    it('has record property', function () {
        expect(property_exists($this->transition, 'record'))->toBeTrue();
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
        expect(fn() => $this->transition->sendNotifications())->not->toThrow(\Exception::class);
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
            ->and($recipients)
            ->toHaveKey('null_user')
            ->and($recipients['null_user'])
            ->toBeNull();
    });

    it('has sendRecipientNotification method', function () {
        expect(method_exists($this->transition, 'sendRecipientNotification'))->toBeTrue();
    });

    it('can send notification to user contract', function () {
        // This should not throw an exception
        expect(fn () => $this->transition->sendRecipientNotification($this->record))->not->toThrow(Exception::class);
    });

    it('can send notification to null recipient', function () {
        // This should not throw an exception
        expect(fn () => $this->transition->sendRecipientNotification(null))->not->toThrow(Exception::class);
    });

    it('processes recipients correctly in sendNotifications', function () {
        // Mock recipients with mixed types
        $transition = new class($this->record) extends XotBaseTransition
        {
            public static string $name = 'test_mixed_transition';

            #[Override]
            public function getNotificationRecipients(): array
            {
                return [
                    'valid_user' => new class extends Model implements UserContract {
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

                        public function setRememberToken($value): void
                        {
                        }

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
        expect(fn() => $transition->sendNotifications())->not->toThrow(\Exception::class);
    });
});
