# Queueable Actions — Xot Module Doctrine

> Philosophy: the best code is the code you never wrote. Actions are the only place for business logic. No controllers, no repositories, no inline instantiation of collaborators.

## Panoramica

Le Queueable Actions sono una soluzione elegante per incapsulare la logica di business in classi dedicate che possono essere eseguite sia in modo sincrono che asincrono.

## Vantaggi

- **Incapsulamento**: Logica di business isolata e riutilizzabile
- **Flessibilità**: Esecuzione sincrona o asincrona
- **Testabilità**: Facile da testare in isolamento
- **Dependency Injection**: Supporto completo per DI
- **Job Chaining**: Possibilità di concatenare azioni
- **Middleware**: Supporto per middleware delle code

## Implementazione Base

```php
use Spatie\QueueableAction\QueueableAction;

class ProcessDoctorModerationAction
{
    use QueueableAction;

    public function execute(DoctorRegistrationWorkflow $workflow, bool $approved): void
    {
        // Logica di business
    }
}
```

## Utilizzo

### Esecuzione Sincrona
```php
app(ProcessDoctorModerationAction::class)->execute($workflow, true);
```

### Esecuzione Asincrona
```php
app(ProcessDoctorModerationAction::class)->onQueue()->execute($workflow, true);
```

### Con Dependency Injection
```php
class ProcessDoctorModerationAction
{
    use QueueableAction;

    public function __construct(
        private EmailService $emailService,
        private LogService $logService
    ) {}

    public function execute(DoctorRegistrationWorkflow $workflow, bool $approved): void
    {
        // Accesso ai servizi iniettati
        $this->emailService->send(...);
        $this->logService->log(...);
    }
}
```

## Middleware

```php
class ProcessDoctorModerationAction
{
    use QueueableAction;

    public function middleware(): array
    {
        return [new RateLimited('moderation')];
    }
}
```

## Job Chaining

```php
ProcessDoctorModerationAction::make()
    ->onQueue()
    ->chain([
        new SendEmailJob(),
        new UpdateStatsJob()
    ])
    ->execute($workflow, true);
```

## Testing

```php
class ProcessDoctorModerationActionTest extends TestCase
{
    /** @test */
    public function it_can_process_moderation()
    {
        $action = app(ProcessDoctorModerationAction::class);

        $workflow = DoctorRegistrationWorkflow::factory()->create();

        $action->execute($workflow, true);

        $this->assertTrue($workflow->fresh()->isModerationApproved());
    }
}
```

## Project Rules (non-negotiable)

1. **Every class in `app/Actions/` must be a Queueable Action**
   ```php
   use Spatie\QueueableAction\QueueableAction;

   class DoSomethingAction
   {
       use QueueableAction;

       public function execute(...): mixed { ... }
   }
   ```

2. **The only public entry point is `execute()`**
   - Forbidden: `handle()`, `process()`, `run()`, `recordSubject()`, `log()`.
   - Call actions with `app(DoSomethingAction::class)->execute(...)`.

3. **No repository pattern**
   - Do not create `*Repository` classes.
   - Do not inject repositories.
   - Query logic belongs in small Queueable Actions or model scopes.

4. **No inline instantiation in constructor defaults**
   ```php
   // ❌ Wrong
   public function __construct(
       private ActivityQueryRepository $queryRepository = new ActivityQueryRepository,
       private ActivityMaintenanceAction $maintenanceAction = new ActivityMaintenanceAction,
   ) {}

   // ✅ Correct
   public function __construct(
       private ActivityQueryRepository $queryRepository,
   ) {}
   ```

5. **Retiring files**
   - Never `rm` a migration or source file.
   - Never move files to an `archive/` directory.
   - Rename with `.old` suffix (e.g. `2026_02_13_171410_fix_causer_id_to_uuid.php.old`).

6. **YAGNI / Ponytail**
   - Reuse existing code first.
   - Use stdlib / native Laravel before adding dependencies.
   - One line when one line is enough.
   - Never compromise security, validation, error handling, or accessibility.

## Best Practices

1. **Naming**: Usare nomi descrittivi che indicano l'azione
   ```php
   ProcessDoctorModerationAction
   GenerateInvoiceAction
   SendWelcomeEmailAction
   ```

2. **Single Responsibility**: Ogni action dovrebbe fare una cosa sola
   ```php
   // ❌ Troppa responsabilità
   class ProcessUserRegistrationAction
   {
       public function execute(User $user)
       {
           $this->validateUser($user);
           $this->createProfile($user);
           $this->sendWelcomeEmail($user);
           $this->notifyAdmins($user);
       }
   }

   // ✅ Responsabilità singola
   class ValidateUserAction {}
   class CreateUserProfileAction {}
   class SendUserWelcomeEmailAction {}
   class NotifyAdminsAboutNewUserAction {}
   ```

3. **Dependency Injection**: Iniettare dipendenze nel costruttore
   ```php
   class ProcessDoctorModerationAction
   {
       public function __construct(
           private EmailService $emailService,
           private LogService $logService,
           private NotificationService $notificationService
       ) {}
   }
   ```

4. **Return Types**: Specificare sempre i tipi di ritorno
   ```php
   public function execute(Workflow $workflow): bool
   {
       return true;
   }
   ```

5. **Exception Handling**: Gestire le eccezioni in modo appropriato
   ```php
   public function execute(Workflow $workflow): bool
   {
       try {
           // Logica
           return true;
       } catch (Exception $e) {
           report($e);
           return false;
       }
   }
   ```

## Esempi Reali

### Moderazione Medici
```php
class ProcessDoctorModerationAction
{
    use QueueableAction;

    public function __construct(
        private EmailService $emailService,
        private ActivityLogger $activityLogger
    ) {}

    public function execute(
        DoctorRegistrationWorkflow $workflow,
        bool $approved,
        ?string $notes = null,
        int $moderatorId
    ): bool {
        try {
            // Aggiorna workflow
            $workflow->status = $approved
                ? DoctorRegistrationWorkflow::STATUS_MODERATION_APPROVED
                : DoctorRegistrationWorkflow::STATUS_MODERATION_REJECTED;

            $workflow->moderation_notes = $notes;
            $workflow->moderated_at = now();
            $workflow->moderated_by = $moderatorId;

            if ($approved) {
                $workflow->generateModerationToken();
                $workflow->current_step = 'contacts';
            }

            $workflow->save();

            // Invia email
            $this->emailService->sendModerationResult($workflow);

            // Log attività
            $this->activityLogger->log(
                'doctor_moderation',
                $workflow,
                $moderatorId,
                ['approved' => $approved, 'notes' => $notes]
            );

            return true;
        } catch (Exception $e) {
            report($e);
            return false;
        }
    }

    public function middleware(): array
    {
        return [
            new RateLimited('moderation'),
            new PreventOverlapping($this)
        ];
    }
}
```

## Vedi Anche

- [Laravel Queues](https://laravel.com/docs/queues)
- [Spatie Documentation](https://spatie.be/docs/laravel-queueable-action)
