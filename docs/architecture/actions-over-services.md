# Actions Over Services

Regola architetturale canonica del progetto:

- **non usiamo Services**
- usiamo **Actions**
- quando un'azione deve essere invocabile, queueable o riusabile come job applicativo, usiamo **`spatie/laravel-queueable-action`**

## Motivazione

- riduce la proliferazione di classi generiche `*Service`
- rende ogni unita' di business piu' piccola, esplicita e testabile
- si integra bene con container, queue e job orchestration
- mantiene il codice piu' DRY e piu' KISS del classico service layer indefinito

## Regole operative

- niente nuove cartelle `Services/` per logica applicativa di dominio
- le vecchie classi in `app/Services` sono debito legacy da convergere
- la business logic vive in `app/Actions`
- le action devono avere input/output chiari e testabili
- se l'azione deve essere dispatchabile o asincrona, preferire `QueueableAction`

## Impatto sui documenti prodotto

- nei PRD non va richiesto un `service layer`
- roadmap e sprint devono parlare di action, queueable action, contract e test
- se un documento legacy menziona `Services` come obiettivo, va corretto

## Riferimenti

## Struttura delle Directories

```
Modules/
└── ModuleName/
    ├── app/
    │   ├── Actions/             # Queueable Actions
    │   │   ├── Domain1/         # Organizzazione opzionale per dominio
    │   │   │   └── ...
    │   │   └── Domain2/
    │   │       └── ...
    │   ├── Datas/               # Data Objects
    │   └── Services/            # Contiene solo Services legacy non ancora migrati
    └── ...
```

## Convenzioni di Naming

- **Action**: Nome del verbo + "Action" (es. `CreateUserAction`)
- **Data Object**: Nome dell'entità + "Data" (es. `UserData`)

## Esempio di Migrazione

### Service originale (da rimuovere)

```php
<?php

namespace Modules\User\Services;

class UserService
{
    public function createUser(array $data)
    {
        // Logica di creazione utente
    }

    public function updateUser($id, array $data)
    {
        // Logica di aggiornamento utente
    }
}
```

### Migrato a Actions

```php
<?php

namespace Modules\User\Actions;

use Modules\User\Datas\UserData;
use Modules\User\Models\User;
use Spatie\QueueableAction\QueueableAction;

class CreateUserAction
{
    use QueueableAction;

    public function execute(UserData $data): User
    {
        // Logica di creazione utente
    }
}

class UpdateUserAction
{
    use QueueableAction;

    public function execute(User $user, UserData $data): User
    {
        // Logica di aggiornamento utente
    }
}
```

## Uso delle Actions

```php
// In un controller o altrove
public function store(Request $request, CreateUserAction $action)
{
    $userData = UserData::from($request->validated());

    // Esecuzione sincrona
    $user = $action->execute($userData);

    // O in background
    $action->onQueue('users')->execute($userData);
}
```

## Caso Speciale: Filament Widgets

Per i Filament Widgets (specialmente Chart Widgets) con dati demo, **NON usare né Services né Actions**.

### Pattern Self-Contained per Widgets

I widget devono essere completamente autonomi:

```php
<?php

declare(strict_types=1);

namespace Modules\healthcare_app\Filament\Widgets;

use Modules\Xot\Filament\Widgets\XotBaseChartWidget;

class SimpleChartWidget extends XotBaseChartWidget
{
    // Dati come costanti di classe (non in Service)
    private const DEMO_DATA = [1250, 1380, 1520, 1680];
    private const LABELS = ['Gen', 'Feb', 'Mar', 'Apr'];

    protected function getData(): array
    {
        return [
            'datasets' => [['data' => self::DEMO_DATA]],
            'labels' => self::LABELS,
        ];
    }

    // Logica helper come metodo privato
    private function calculateGrowth(float $current, float $previous): float
    {
        return $previous > 0 ? (($current - $previous) / $previous) * 100 : 0.0;
    }
}
```

### Perché Self-Contained per Widget?

1. **No costruttori custom** → Evita problemi di hydration Livewire
2. **Dati immutabili** → Costanti garantiscono coerenza
3. **Un file, una responsabilità** → Facile da mantenere e testare
4. **Nessuna dipendenza esterna** → Zero rischi di autowiring

### Riferimenti

- [Chart Widget Best Practices (healthcare_app)](../../../healthcare_app/docs/chart-widget-best-practices.md)
- [Critical No Services Rule](../critical-no-services-rule.md)
```
