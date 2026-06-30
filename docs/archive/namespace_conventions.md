# convenzioni per i namespace nei moduli

## regola assoluta e inviolabile

il namespace base di ogni modulo è **sempre e solo** `Modules\{ModuleName}` (dove ModuleName è il nome del modulo con la prima lettera maiuscola).

### errore comune da evitare assolutamente

**MAI** includere `App` o `app` nel namespace, anche se i file sono fisicamente nella cartella `app/`.

Questo è l'errore più comune e grave nelle convenzioni di namespace:

```php
// GRAVEMENTE ERRATO
<<<<<<< HEAD
namespace Modules\<nome progetto>\App\Controllers;

// CORRETTO
namespace Modules\<nome progetto>\Controllers;
=======
namespace Modules\ModuloEsempio\App\Controllers;

// CORRETTO
namespace Modules\ModuloEsempio\Controllers;
>>>>>>> 64619e34 (.)
```

## esempi corretti vs errati

### corretti ✓
```php
namespace Modules\Xot\Console\Commands;
<<<<<<< HEAD
namespace Modules\<nome progetto>\Models;
namespace Modules\User\Services;
namespace Modules\Tenant\Repositories;
namespace Modules\<nome progetto>\Filament\Resources;
=======
namespace Modules\ModuloEsempio\Models;
namespace Modules\User\Services;
namespace Modules\Tenant\Repositories;
namespace Modules\ModuloEsempio\Filament\Resources;
>>>>>>> 64619e34 (.)
```

### errati ✗
```php
namespace Modules\Xot\app\Console\Commands;       // errato: 'app' nel namespace
<<<<<<< HEAD
namespace Modules\<nome progetto>\App\Models;           // errato: 'App' nel namespace
namespace Modules\User\App\Services;              // errato: 'App' nel namespace
namespace Modules\Tenant\app\Repositories;        // errato: 'app' nel namespace
namespace App\Modules\<nome progetto>\Controllers;      // errato: struttura completamente sbagliata
=======
namespace Modules\ModuloEsempio\App\Models;           // errato: 'App' nel namespace
namespace Modules\User\App\Services;              // errato: 'App' nel namespace
namespace Modules\Tenant\app\Repositories;        // errato: 'app' nel namespace
namespace App\Modules\ModuloEsempio\Controllers;      // errato: struttura completamente sbagliata
>>>>>>> 64619e34 (.)
```

## struttura fisica vs namespace

### importante: separazione tra percorso fisico e namespace

Anche se i file sono fisicamente collocati in una directory `app/`, il namespace **non deve mai riflettere** questa struttura.

```
<<<<<<< HEAD
Percorso fisico:    /Modules/<nome progetto>/app/Models/Patient.php
Namespace corretto: namespace Modules\<nome progetto>\Models;
=======
Percorso fisico:    /Modules/ModuloEsempio/app/Models/Patient.php
Namespace corretto: namespace Modules\ModuloEsempio\Models;
>>>>>>> 64619e34 (.)
```

### mappatura corretta percorso-namespace

| percorso fisico | namespace corretto |
|-----------------|--------------------|
<<<<<<< HEAD
| `/Modules/<nome progetto>/app/Models/Patient.php` | `Modules\<nome progetto>\Models` |
| `/Modules/<nome progetto>/app/Filament/Resources/PatientResource.php` | `Modules\<nome progetto>\Filament\Resources` |
=======
| `/Modules/ModuloEsempio/app/Models/Patient.php` | `Modules\ModuloEsempio\Models` |
| `/Modules/ModuloEsempio/app/Filament/Resources/PatientResource.php` | `Modules\ModuloEsempio\Filament\Resources` |
>>>>>>> 64619e34 (.)
| `/Modules/Xot/app/Providers/XotServiceProvider.php` | `Modules\Xot\Providers` |

### struttura directory completa

```
Modules/
<<<<<<< HEAD
  <nome progetto>/
    app/                        // directory fisica
      Console/
        Commands/
          ImportPatient.php     // namespace Modules\<nome progetto>\Console\Commands;
      Models/
        Patient.php            // namespace Modules\<nome progetto>\Models;
      Filament/
        Resources/
          PatientResource.php  // namespace Modules\<nome progetto>\Filament\Resources;
=======
  ModuloEsempio/
    app/                        // directory fisica
      Console/
        Commands/
          ImportPatient.php     // namespace Modules\ModuloEsempio\Console\Commands;
      Models/
        Patient.php            // namespace Modules\ModuloEsempio\Models;
      Filament/
        Resources/
          PatientResource.php  // namespace Modules\ModuloEsempio\Filament\Resources;
>>>>>>> 64619e34 (.)
```

## come verificare i namespace

### verifica manuale

Prima di committare un file, verifica sempre che:

1. Il namespace **non** contenga `app` o `App`
2. Il namespace inizi sempre con `Modules\NomeModulo\`
3. Il resto del namespace rifletta la struttura logica delle classi

### uso di phpstan

Utilizza phpstan per verificare automaticamente i namespace:

```bash
<<<<<<< HEAD
php artisan phpstan:analyse --level=1 Modules/<nome progetto>
=======
php artisan phpstan:analyse --level=1 Modules/ModuloEsempio
>>>>>>> 64619e34 (.)
```

## motivazione di questa convenzione
- Mantiene i namespace puliti e coerenti
- Evita confusione con la struttura delle directory
- Facilita l'autoloading e la navigazione del codice
- Segue le best practice di Laravel per i moduli

## Note Importanti
- Questa convenzione si applica a TUTTI i moduli del framework
- Non ci sono eccezioni a questa regola
- I file possono essere fisicamente in `app/` ma il namespace non deve rifletterlo
- Questa convenzione è obbligatoria per mantenere la compatibilità con il framework

## Errori Comuni

### Pattern di Errore: Inclusione di `App` nel Namespace

Un errore comune è includere `App` nel namespace:

```php
// ERRATO ❌
<<<<<<< HEAD
namespace Modules\<nome progetto>\App\Console\Commands;

// CORRETTO ✓
namespace Modules\<nome progetto>\Console\Commands;
=======
namespace Modules\ModuloEsempio\App\Console\Commands;

// CORRETTO ✓
namespace Modules\ModuloEsempio\Console\Commands;
>>>>>>> 64619e34 (.)
```

### Conseguenze dell'Errore
- Class not found exceptions
- Problemi con l'autoloading
- Errori di binding resolution nel container Laravel
- Failure nei comandi artisan
- Errori di tipo "Target class does not exist"

## Strumenti di Verifica e Prevenzione

### Verifica Manuale
Utilizzare grep per trovare tutti i file con namespace errato:

```bash
<<<<<<< HEAD
grep -r "namespace Modules\\\\.*\\\\App\\\\" /var/www/html/<nome progetto>/laravel/Modules
=======
grep -r "namespace Modules\\\\.*\\\\App\\\\" /var/www/html/base_ptvx/laravel/Modules
>>>>>>> 64619e34 (.)
```

### PHP Stan
Configurare PHP Stan per verificare i namespace corretti:

```yaml

# phpstan.neon
parameters:
  checkMissingIterableValueType: false
  checkGenericClassInNonGenericObjectType: false
  checkAlwaysTrueInstanceof: false
  rules:
    - Modules\Xot\Rules\CorrectNamespaceRule
```

### IDE Configuration
Configurare il tuo IDE (PhpStorm, VSCode) per applicare automaticamente le convenzioni di namespace quando si creano nuovi file.

## Come Correggere

1. Individuare tutti i file con namespace errato
2. Correggere il namespace rimuovendo `App\` dal percorso
3. Aggiornare eventuali riferimenti a queste classi in altri file
4. Pulire la cache dell'applicazione dopo le modifiche

```bash
php artisan cache:clear
php artisan config:clear
php artisan view:clear
```
