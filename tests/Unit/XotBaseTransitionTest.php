<?php

declare(strict_types=1);
<<<<<<< HEAD
=======

<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
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
>>>>>>> 930f8146 (Check & fix styling)

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
<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
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
<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
    });

    it('can send notifications without errors', function (): void {
        $record = UserFactory::new()->createOne();

<<<<<<< .merge_file_GctMAk
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> .merge_file_mlvtRZ
        $transition = new class($record) extends XotBaseTransition
        {
            public static string $name = 'test_transition';

            public function sendRecipientNotification(RecordNotificationData $recipient, array $data): void {}
<<<<<<< .merge_file_GctMAk
=======
=======
>>>>>>> 3792da0d (Check & fix styling)
        $transition = new class($record) extends XotBaseTransition {
            public static string $name = 'test_transition';

            public function sendRecipientNotification(RecordNotificationData $recipient, array $data): void
            {
            }
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_mlvtRZ
        };

        $transition->sendNotifications();
    });

    it('has getNotificationRecipients method', function (): void {
        [, $transition] = xotBaseTransitionFixture();

<<<<<<< HEAD
        Assert::assertTrue((new ReflectionObject($transition))->hasMethod('getNotificationRecipients'));
=======
        Assert::assertTrue(method_exists($transition, 'getNotificationRecipients'));
<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
    });

    it('returns correct notification recipients structure', function (): void {
        $record = UserFactory::new()->createOne();

<<<<<<< .merge_file_GctMAk
<<<<<<< HEAD
<<<<<<< HEAD
        $transition = new class($record) extends XotBaseTransition
        {
=======
        $transition = new class($record) extends XotBaseTransition {
>>>>>>> laraxot/dev
=======
        $transition = new class($record) extends XotBaseTransition {
>>>>>>> 3792da0d (Check & fix styling)
=======
        $transition = new class($record) extends XotBaseTransition
        {
>>>>>>> .merge_file_mlvtRZ
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
<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
    });

    it('processes recipients correctly in sendNotifications', function (): void {
        $record = UserFactory::new()->createOne();

<<<<<<< .merge_file_GctMAk
<<<<<<< HEAD
<<<<<<< HEAD
        $transition = new class($record) extends XotBaseTransition
        {
=======
        $transition = new class($record) extends XotBaseTransition {
>>>>>>> laraxot/dev
=======
        $transition = new class($record) extends XotBaseTransition {
>>>>>>> 3792da0d (Check & fix styling)
=======
        $transition = new class($record) extends XotBaseTransition
        {
>>>>>>> .merge_file_mlvtRZ
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

<<<<<<< .merge_file_GctMAk
<<<<<<< HEAD
<<<<<<< HEAD
            public function sendRecipientNotification(RecordNotificationData $recipient, array $data): void {}
=======
            public function sendRecipientNotification(RecordNotificationData $recipient, array $data): void
            {
            }
>>>>>>> laraxot/dev
=======
            public function sendRecipientNotification(RecordNotificationData $recipient, array $data): void
            {
            }
>>>>>>> 3792da0d (Check & fix styling)
=======
            public function sendRecipientNotification(RecordNotificationData $recipient, array $data): void {}
>>>>>>> .merge_file_mlvtRZ
        };

        $transition->sendNotifications();
    });
});
