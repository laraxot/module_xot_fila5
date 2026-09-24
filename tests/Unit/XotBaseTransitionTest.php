<?php

declare(strict_types=1);

use Modules\Notify\Datas\RecordNotificationData;
use Modules\User\Database\Factories\UserFactory;
use Modules\Xot\States\Transitions\XotBaseTransition;
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);
<<<<<<< HEAD
=======
// Laraxot module file — see docs/wiki for domain contract.
// Laraxot module file — see docs/wiki for domain contract.
// Laraxot module file — see docs/wiki for domain contract.
>>>>>>> laraxot/dev

describe('XotBaseTransition', function (): void {
    it('can be instantiated', function (): void {
        [, $transition] = xotBaseTransitionFixture();

        Assert::assertInstanceOf(XotBaseTransition::class, $transition);
    });

    it('has static name property', function (): void {
        [, $transition] = xotBaseTransitionFixture();

        Assert::assertTrue(property_exists($transition, 'name'));
    });

    it('has record property', function (): void {
        [, $transition] = xotBaseTransitionFixture();

<<<<<<< HEAD
        Assert::assertTrue((new ReflectionObject($transition))->hasProperty('record'));
=======
        Assert::assertTrue(property_exists($transition, 'record'));
>>>>>>> laraxot/dev
    });

    it('can get record', function (): void {
        [$record, $transition] = xotBaseTransitionFixture();

        Assert::assertSame($record, $transition->record);
    });

    it('has sendNotifications method', function (): void {
        [, $transition] = xotBaseTransitionFixture();

<<<<<<< HEAD
        Assert::assertTrue((new ReflectionObject($transition))->hasMethod('sendNotifications'));
=======
        Assert::assertTrue(method_exists($transition, 'sendNotifications'));
>>>>>>> laraxot/dev
    });

    it('can send notifications without errors', function (): void {
        $record = UserFactory::new()->createOne();

<<<<<<< HEAD
        $transition = new class($record) extends XotBaseTransition
        {
            public static string $name = 'test_transition';

            public function sendRecipientNotification(RecordNotificationData $recipient, array $data): void {}
=======
        $transition = new class($record) extends XotBaseTransition {
            public static string $name = 'test_transition';

            public function sendRecipientNotification(RecordNotificationData $recipient, array $data): void
            {
            }
>>>>>>> laraxot/dev
        };

        $transition->sendNotifications();
    });

    it('has getNotificationRecipients method', function (): void {
        [, $transition] = xotBaseTransitionFixture();

<<<<<<< HEAD
        Assert::assertTrue((new ReflectionObject($transition))->hasMethod('getNotificationRecipients'));
=======
        Assert::assertTrue(method_exists($transition, 'getNotificationRecipients'));
>>>>>>> laraxot/dev
    });

    it('returns correct notification recipients structure', function (): void {
        $record = UserFactory::new()->createOne();

<<<<<<< HEAD
        $transition = new class($record) extends XotBaseTransition
        {
=======
        $transition = new class($record) extends XotBaseTransition {
>>>>>>> laraxot/dev
            public static string $name = 'test_transition';
        };

        $recipients = $transition->getNotificationRecipients();

        Assert::assertArrayHasKey('me_mail', $recipients);
        Assert::assertInstanceOf(RecordNotificationData::class, $recipients['me_mail']);
    });

    it('has sendRecipientNotification method', function (): void {
        [, $transition] = xotBaseTransitionFixture();

<<<<<<< HEAD
        Assert::assertTrue((new ReflectionObject($transition))->hasMethod('sendRecipientNotification'));
=======
        Assert::assertTrue(method_exists($transition, 'sendRecipientNotification'));
>>>>>>> laraxot/dev
    });

    it('processes recipients correctly in sendNotifications', function (): void {
        $record = UserFactory::new()->createOne();

<<<<<<< HEAD
        $transition = new class($record) extends XotBaseTransition
        {
=======
        $transition = new class($record) extends XotBaseTransition {
>>>>>>> laraxot/dev
            public static string $name = 'test_mixed_transition';

            /**
             * @return array<string, RecordNotificationData>
             */
            public function getNotificationRecipients(): array
            {
                return [
                    'valid_recipient' => RecordNotificationData::from(['record' => $this->record, 'channel' => 'mail']),
                ];
            }

<<<<<<< HEAD
            public function sendRecipientNotification(RecordNotificationData $recipient, array $data): void {}
=======
            public function sendRecipientNotification(RecordNotificationData $recipient, array $data): void
            {
            }
>>>>>>> laraxot/dev
        };

        $transition->sendNotifications();
    });
});
