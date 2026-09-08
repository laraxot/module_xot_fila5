<?php

declare(strict_types=1);

namespace Modules\Xot\States\Transitions;

<<<<<<< HEAD
use TypeError;
use Webmozart\Assert\InvalidArgumentException;
=======
>>>>>>> c7fd73eb (.)
use Filament\Notifications\Notification as FilamentNotification;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Str;
use Modules\Notify\Datas\RecordNotificationData;
use Modules\Notify\Notifications\RecordNotification;
<<<<<<< HEAD
use Modules\Xot\Contracts\UserContract;
use Spatie\ModelStates\Transition;

abstract class XotBaseTransition extends Transition
{
    public function __construct(
        public Model $record,
        public null|string $message = '',
    ) {}
=======
use Modules\Xot\Actions\Cast\SafeStringCastAction;
use Modules\Xot\Contracts\UserContract;
use Webmozart\Assert\InvalidArgumentException;

abstract class XotBaseTransition
{
    public function __construct(
        public Model $record,
        public ?string $message = '',
    ) {
    }
>>>>>>> c7fd73eb (.)

    public function handle(): Model
    {
        $this->sendNotifications();
        $class = static::class;

        $stateNamespace = Str::of($class)->beforeLast('\Transitions\\')->toString();
        $stateClassName = Str::of($class)->afterLast('To')->toString();
<<<<<<< HEAD
        $newStateClass = $stateNamespace . '\\' . $stateClassName;

        /* @phpstan-ignore-next-line */
        $this->record->state = new $newStateClass($this->record);
=======
        $newStateClass = $stateNamespace.'\\'.$stateClassName;

        $this->record->setAttribute('state', new $newStateClass($this->record));
>>>>>>> c7fd73eb (.)
        $this->record->save();

        return $this->record;
    }

    public function sendNotifications(): void
    {
        $data = $this->getNotificationData();
        $recipients = $this->getNotificationRecipients();
        foreach ($recipients as $recipient) {
            $this->sendRecipientNotification($recipient, $data);
        }
    }

    /**
<<<<<<< HEAD
     * @return  array<string, RecordNotificationData>
=======
     * @return array<string, RecordNotificationData>
>>>>>>> c7fd73eb (.)
     */
    public function getNotificationRecipients(): array
    {
        return [
            // 'me' => $this->record,
            'me_mail' => RecordNotificationData::from(['record' => $this->record, 'channel' => 'mail']),
            // 'patient' => $this->record->patient,
            // 'doctor' => $this->record->doctor,
            // 'patient_mail' => RecordNotificationData::from(['record' => $record->patient, 'channel' => 'mail']),
            // 'doctor_mail' => RecordNotificationData::from(['record' => $record->doctor, 'channel' => 'mail']),
        ];
    }

    /**
<<<<<<< HEAD
     * @return array<int, mixed>
=======
     * Get notification attachments.
     *
     * @return array<int, array{path?: string, data?: mixed, as?: string|null, mime?: string|null}>
>>>>>>> c7fd73eb (.)
     */
    public function getNotificationAttachments(): array
    {
        return [];
    }

    public function getNotificationSlug(UserContract $recipient): string
    {
<<<<<<< HEAD
        $type = $recipient->type->value;
        $slug =
            class_basename($this->record) .
            '-' .
            $type .
            '-' .
=======
        $typeEnum = $recipient->type;
        $type = $typeEnum instanceof \BackedEnum ? SafeStringCastAction::cast($typeEnum->value) : 'unknown';

        $slug =
            class_basename($this->record).
            '-'.
            $type.
            '-'.
>>>>>>> c7fd73eb (.)
            Str::of(class_basename(static::class))->kebab()->toString();
        $slug = Str::slug($slug);

        return $slug;
    }

<<<<<<< HEAD
=======
    /**
     * @param array<string, mixed> $data
     */
>>>>>>> c7fd73eb (.)
    public function sendRecipientNotification(RecordNotificationData $recipient, array $data): void
    {
        $slug = $this->getNotificationSlug($recipient->record);

<<<<<<< HEAD
        $notify = new RecordNotification($this->record, $slug);

        //$data = $this->getNotificationData();
        $notify = $notify->mergeData($data);
        $notify = $notify->addAttachments($this->getNotificationAttachments());

        try {
            Notification::route($recipient->getChannel(), $recipient->getRoute())->notify($notify);
        } catch (TypeError|InvalidArgumentException $e) {
            $message = 'channel :[' . $recipient->getChannel() . '] error: [' . $e->getMessage() . ']';
=======
        if (! class_exists(RecordNotification::class)) {
            return;
        }

        // RecordNotification resolves MailTemplate internally from slug (lazy resolution)
        // No need to pre-load MailTemplate - pass slug directly
        $notify = new RecordNotification($this->record, $slug);
        $mergeData = $data;

        $notify->mergeData($mergeData);

        $attachments = $this->getNotificationAttachments();

        $notify->addAttachments($attachments);

        try {
            Notification::route($recipient->getChannel(), $recipient->getRoute())->notify($notify);
        } catch (\TypeError|InvalidArgumentException $e) {
            $message = 'channel :['.$recipient->getChannel().'] error: ['.$e->getMessage().']';
>>>>>>> c7fd73eb (.)
            FilamentNotification::make()
                ->title('Error')
                ->danger()
                ->body($message)
                ->send();
        }
    }

    /**
     * @return array<string, mixed>
     */
    public function getNotificationData(): array
    {
        return [
            'message' => $this->message,
            // 'appointment_date' => $this->appointment->starts_at?->format('d/m/Y H:i') ?? 'N/A',
            // 'patient_name' => $this->appointment->patient->name ?? 'N/A',
            // 'doctor_name' => $this->appointment->doctor->name ?? 'N/A',
        ];
    }
}
