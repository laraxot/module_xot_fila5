<?php

declare(strict_types=1);

use Modules\Notify\Datas\RecordNotificationData;
use Modules\Xot\States\Transitions\XotBaseTransition;
use Tests\TestCase;

uses(TestCase::class);

describe('XotBaseTransition', function () {
    beforeEach(function () {
        // Create a test record
        // @var mixed record = new Modules\User\Models\User(;
        // @var mixed record->id = '1';
        // @var mixed record->name = 'Test User';
        // @var mixed record->email = 'test@example.com';

        // Create a concrete test transition class.
        // Override sendRecipientNotification con firma identica alla base per evitare Fatal error
        // (la base usa RecordNotificationData, non UserContract).
        // @var mixed transition = new class($this->record
            public static string $name = 'test_transition';

            #[Override]
            public function getNotificationRecipients(): array
            {
                return [
                    'test_user' => RecordNotificationData::from(['record' => // @var mixed record, 'channel' => 'mail']
                ];
            }

            /** @param array<string, mixed> $data */
            public function sendRecipientNotification(RecordNotificationData $recipient, array $data): void
            {
                // Mock: evita invio reale e dipendenze (RecordNotification, getNotificationSlug su record)
            }
        };
    });

    it('can be instantiated', function () {
        expect(// @var mixed transition;
    });

    it('has static name property', function () {
        expect(// @var mixed transition::$name;
    });

    it('can get record', function () {
        $record = // @var mixed transition->record;
        expect($record)->toBe(// @var mixed record;
    });

    it('can send notifications without errors', function () {
        expect(fn () => // @var mixed transition->sendNotifications(;
    });

    it('returns correct notification recipients structure', function () {
        $recipients = // @var mixed transition->getNotificationRecipients(;
        expect($recipients)->toBeArray()->toHaveKey('test_user');
        expect($recipients['test_user'])->toBeInstanceOf(RecordNotificationData::class);
    });

    it('can send recipient notification', function () {
        $recipient = RecordNotificationData::from(['record' => // @var mixed record, 'channel' => 'mail'];
        expect(fn () => // @var mixed transition->sendRecipientNotification($recipient, [];
    });

    it('validates abstract class structure', function () {
        $reflection = new ReflectionClass(XotBaseTransition::class);
        expect($reflection->isAbstract())->toBeTrue()
            ->and($reflection->hasMethod('sendNotifications'))->toBeTrue();
    });
});
