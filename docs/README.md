<<<<<<< HEAD
---
title: "Xot Module - Updated Documentation (Clean)"
type: documentation
tags: [module, documentation, framework, template]
created: 2026-07-14
updated: 2026-09-17
---

# 🏗️ Xot Module - Il Cuore del Framework Laraxot

[![Laravel 13.x](https://img.shields.io/badge/Laravel-13.x-red.svg)](https://laravel.com/)
[![Filament 5.x](https://img.shields.io/badge/Filament-5.x-blue.svg)](https://filamentphp.com/)
[![PHP 8.4](https://img.shields.io/badge/PHP-8.4-blueviolet.svg)](https://www.php.net/)
[![PHPStan Level 10](https://img.shields.io/badge/PHPStan-Level%2010-brightgreen.svg)](https://phpstan.org/)
[![Modular Architecture](https://img.shields.io/badge/Architecture-Modular%20Monolith-yellow.svg)](https://martinfowler.com/articles/modular-monolith.html)

> **🚀 Xot Module**: Framework base e cuore architetturale di Laraxot.

**Wiki operativo (2026-07-27):** [wiki/index.md](./wiki/index.md) — trinità panel (`config.php` + `AdminPanelProvider` + `Dashboard.php`), tenant `modules_statuses`.

**Indice completo:** [index.md](./index.md) — navigazione per argomento (architettura, PHPStan, Filament, testing).

## 📋 Overview

Il modulo **Xot** è il **framework base** di Laraxot, un ecosistema modulare basato su **Laravel 13** e **Filament 5**, progettato per applicazioni enterprise. Fornisce gli strumenti fondamentali e i pattern architetturali per garantire coerenza, estensibilità e manutenibilità in tutto il progetto.

### Principi Fondamentali

- **Modularità**: Ogni funzionalità è organizzata in moduli indipendenti e autoconsistenti
- **Coerenza**: Adozione di una struttura uniforme, convenzioni di naming e best practice standardizzate
- **Estensibilità**: Progettato per facilitare l'aggiunta di nuovi moduli e l'espansione delle funzionalità esistenti
- **Manutenibilità**: Codice pulito, ben documentato e supportato da strumenti di analisi statica

## 🏗️ Module Directory Structure Standard

To ensure consistent autoloading and architectural integrity, all modules must follow this structure:

```
Modules/ModuleName/
├── app/                              # All PHP code (PSR-4 mapped)
│   ├── Actions/                      # Reusable action classes
│   ├── Models/                       # Eloquent models
│   ├── Filament/
│   │   ├── Resources/
│   │   ├── Pages/
│   │   └── Widgets/
│   ├── Http/
│   │   ├── Controllers/
│   │   └── Requests/
│   ├── Traits/                       # Reusable traits
│   ├── Enums/
│   └── Events/
├── database/                         # Lowercase only (CRITICAL)
│   ├── migrations/
│   ├── factories/
│   └── seeders/
├── resources/
│   ├── views/
│   └── lang/
├── tests/
│   ├── Unit/
│   └── Feature/
├── docs/                             # Documentation
│   └── README.md
├── module.json                       # Module metadata
└── composer.json                     # Module dependencies
```

**FORBIDDEN**: Capitalized directories at root (e.g., `Actions/`, `Database/`). All code must be in `app/`.

> Business logic va in `app/Actions` (Spatie Queueable Actions con `execute()`), non in `app/Services`: vedi [critical-no-services-rule.md](./critical-no-services-rule.md).

## ⚡ Core Architecture

### Base Classes Pattern

Tutti i componenti principali dei moduli devono estendere le classi base fornite da Xot per ereditare funzionalità comuni e garantire coerenza.

```php
// Xot Base Classes (sempre usare)
use Modules\Xot\Models\XotBaseModel;
use Modules\Xot\Filament\Resources\XotBaseResource;
use Modules\Xot\Filament\Actions\XotBaseAction;
use Modules\Xot\Providers\XotBaseServiceProvider;
```

**Example**: Resource Filament
```php
=======
# 🏗️ **Xot Module** - Il Cuore del Framework Laraxot

[![Laravel 12.x](https://img.shields.io/badge/Laravel-12.x-red.svg)](https://laravel.com/)
[![Filament 4.x](https://img.shields.io/badge/Filament-4.x-blue.svg)](https://filamentphp.com/)
[![PHP 8.3](https://img.shields.io/badge/PHP-8.3-blueviolet.svg)](https://www.php.net/)
[![PHPStan Level 10](https://img.shields.io/badge/PHPStan-Level%2010-brightgreen.svg)](https://phpstan.org/)
[![Modular Architecture](https://img.shields.io/badge/Architecture-Modular%20Monolith-yellow.svg)](https://martinfowler.com/articles/modular-monolith.html)

> **🚀 Modulo Xot**: Framework base e cuore architetturale di Laraxot - fornisce classi base, traits, convenzioni e infrastruttura core per tutti i moduli dell'ecosistema.

## 📋 **Panoramica**

Il modulo **Xot** è il **framework base** di Laraxot PTVX, un ecosistema modulare basato su **Laravel 12** e **Filament 4**, progettato per applicazioni enterprise. Fornisce gli strumenti fondamentali e i pattern architetturali per garantire coerenza, estensibilità e manutenibilità in tutto il progetto.

### Principi Fondamentali
- **Modularità**: Ogni funzionalità è organizzata in moduli indipendenti e autoconsistenti.
- **Coerenza**: Adozione di una struttura uniforme, convenzioni di naming e best practice standardizzate.
- **Estensibilità**: Progettato per facilitare l'aggiunta di nuovi moduli e l'espansione delle funzionalità esistenti.
- **Manutenibilità**: Codice pulito, ben documentato e supportato da strumenti di analisi statica.

### 🏗️ **Module Directory Structure Standard**
To ensure consistent autoloading and architectural integrity, all modules must follow this structure:
- **app/**: Contains all PHP code (Actions, Models, etc.). Mapped to `Modules\{Module}\` in `composer.json`.
- **database/**: strictly lowercase.
- **Forbidden**: Capitalized directories at the root level (e.g., `Actions/`, `Database/`) are forbidden.

## 📚 **Quick Navigation**

- **[Architecture Patterns](./architecture-patterns.md)** — Complete design patterns, class hierarchies, traits ecosystem
- **[Documentation Index](./INDEX.md)** — Full table of contents and component reference
- **[XOTBASE_ARCHITECTURE_PHILOSOPHY.md](./XOTBASE_ARCHITECTURE_PHILOSOPHY.md)** — Core design philosophy

---

## ⚡ **Architettura Core**

### 🏗️ **Base Classes Pattern**
Tutti i componenti principali dei moduli devono estendere le classi base fornite da Xot per ereditare funzionalità comuni e garantire coerenza.

```php
// Esempio di una Resource Filament
>>>>>>> laraxot/dev
use Modules\Xot\Filament\Resources\XotBaseResource;

class UserResource extends XotBaseResource
{
    protected static ?string $model = User::class;
<<<<<<< HEAD
    // table() and form() inherited from base
}
```

### Traits Ecosystem

Xot fornisce (direttamente o integrando pacchetti come Spatie/Filament) un ricco ecosistema di Trait per aggiungere funzionalità comuni ai modelli e ad altre classi:

| Trait | Utilizzo | Scopo |
|-------|----------|-------|
| `HasXotTable` | Modelli/Widget | Aggiunge funzionalità avanzate alle tabelle Filament |
| `HasUuid` | Modelli | Gestisce automaticamente UUID come chiavi primarie |
| `HasMedia` | Modelli | Integra Spatie Media Library con convenzioni standard |
| `HasStates` | Modelli | Fornisce gestione degli stati per i modelli |
| `TransTrait` | Modelli/Filament | Semplifica le traduzioni dinamiche |
| `EnumTrait` | Enum | Label/color/icon/tooltip tradotti per gli Enum Filament |
| `InteractsWithForms` | Widget | Gestione form nei widget Filament |

### Service Provider Pattern

I Service Provider di ogni modulo estendono `XotBaseServiceProvider`, che automatizza la registrazione di:

- Migrations, Views, Translations, Config
- Routes (web.php, api.php)
- Filament Resources, Pages, Widgets
- Artisan Commands e Policies

```php
use Modules\Xot\Providers\XotBaseServiceProvider;

class MyModuleServiceProvider extends XotBaseServiceProvider
{
    // Automatically registers migrations, views, routes, etc.
}
```

## 🎯 Core Features

### Actions Framework

Un pattern standardizzato per incapsulare la business logic in classi riutilizzabili e testabili (Spatie Queueable Actions, non Service classes: vedi [critical-no-services-rule.md](./critical-no-services-rule.md)).

```php
use Modules\Xot\Filament\Actions\XotBaseAction;
=======

    // Il metodo table() e form() NON devono essere sovrascritti
    // se non per aggiungere logica specifica, ma la base
    // è già fornita da XotBaseResource.
}
```

### 🔧 **Traits Ecosystem**
Xot fornisce un ricco ecosistema di Trait per aggiungere funzionalità comuni ai modelli e ad altre classi.
- **HasXotTable**: Aggiunge funzionalità avanzate alle tabelle Filament.
- **HasUuid**: Gestisce automaticamente UUID come chiavi primarie.
- **HasMedia**: Integra Spatie Media Library con convenzioni standard.
- **HasStates**: Fornisce una gestione degli stati per i modelli.
- **TransTrait**: Semplifica le traduzioni dinamiche.

### 📦 **Service Provider Pattern**
I Service Provider di ogni modulo estendono `XotBaseServiceProvider`, che automatizza la registrazione di:
- Migrations, Views, Translations, e Config
- Routes (web.php, api.php)
- Filament Resources, Pages, e Widgets
- Comandi Artisan e Policies

## 🎯 **Funzionalità Principali**

### ⚡ **Actions Framework**
Un pattern standardizzato per incapsulare la business logic in classi riutilizzabili e testabili.
```php
use Modules\Xot\Actions\XotBaseAction;
>>>>>>> laraxot/dev

class CreateUserAction extends XotBaseAction
{
    public function execute(array $data): User
    {
        $user = User::create($data);
<<<<<<< HEAD
        event(new UserCreated($user));
=======
        $this->logActivity('user.created', $user); // Logging automatico
        event(new UserCreated($user)); // Dispatching eventi
>>>>>>> laraxot/dev
        return $user;
    }
}
```

<<<<<<< HEAD
### Enums System

Gli Enum di Xot usano `Modules\Xot\Traits\EnumTrait`, che fornisce label/color/icon/tooltip tradotti automaticamente dai file di lingua:

```php
use Filament\Support\Contracts\HasLabel;
use Modules\Xot\Traits\EnumTrait;

enum UserStatus: string implements HasLabel
{
    use EnumTrait;

    case ACTIVE = 'active';
    case INACTIVE = 'inactive';
}
// getLabel() risolve automaticamente xot::enums.user_status.<value> (o l'equivalente
// nel file di lingua del modulo che definisce l'Enum) tramite EnumTrait + TransTrait.
```

### Filament Integration

Xot fornisce wrapper base per tutti i componenti Filament:
- `XotBaseResource`
- `XotBaseWidget` (e varianti `XotBaseChartWidget`, `XotBaseStatsOverviewWidget`, `XotBaseTableWidget`, `XotBaseWizardWidget`)
- `XotBasePage`
- `XotBaseAction`
- `XotBaseListRecords` / `XotBaseCreateRecord` / `XotBaseEditRecord` / `XotBaseViewRecord`
- `XotBasePanelProvider`, `XotBaseLogin`, `XotBaseRegister`, `XotBaseDashboard`

**Rule**: Never extend Filament classes directly. Always use Xot wrappers.

## 🛠️ Development & Quality

### PHPStan Level 10 Compliance

Xot punta alla piena conformità PHPStan Level 10 senza compromessi:

- Nessuna modifica a `phpstan.neon` (config immutabile, vedi [phpstan-neon-immutable.md](./phpstan-neon-immutable.md))
- Solo correzioni reali del codice, mai baseline/ignoreErrors per silenziare

**Analizza con memoria illimitata**:
```bash
php -d memory_limit=-1 ./vendor/bin/phpstan analyse Modules/ --level=max
```

### Quality Standards

| Tool | Standard | Config |
|------|----------|--------|
| **PHPStan** | Level 10 | `laravel/phpstan.neon` |
| **Pest** | Tests in `tests/` | `phpunit.xml` |
| **Pint** | PSR-12 + Laraxot | `.pint.json` |
| **Coverage** | Minimum 80% | Via Pest |

### Convenzioni

- **Namespace**: `Modules\{ModuleName}` (NO `app` segment)
- **Tipizzazione Forte**: `declare(strict_types=1);` in all files
- **Traduzioni**: Structured format `['label' => '...', 'tooltip' => '...']`
- **Migrations**: Anonymous classes only

### Run Quality Gate

```bash
# From project root (laravel/)

# PHPStan
php -d memory_limit=-1 ./vendor/bin/phpstan analyse --level=max

# Pest
./vendor/bin/pest

# Pint
./vendor/bin/pint
```

## 📚 Architecture Patterns

### Module Dependency Graph

```
Xot (foundation)
  ├── User (authentication, authorization)
  ├── Lang (translations)
  ├── Cms (content management)
  ├── Tenant (multi-tenancy)
  ├── Notify (notifications)
  ├── Media (file management)
  ├── Geo (geolocation)
  ├── Activity (activity logging)
  ├── Job (job management)
  └── [Other modules]
```

All modules depend on **Xot**. Never have circular dependencies.

### Key Design Decisions

1. **Service Provider Automation**: Xot's `XotBaseServiceProvider` auto-registers all module components
2. **Trait-Based Composition**: Prefer traits over inheritance for cross-cutting concerns
3. **Enum Internationalization**: Enums handle their own translations
4. **Action Classes**: Business logic encapsulated in reusable action classes
5. **No Log Statements**: Let Laravel's exception handler manage logging

## 🔗 Related Documentation

- [Module Documentation Pattern](../../../../docs/wiki/rules/module-documentation-pattern.md)
- [Architecture Rules](../../../../docs/wiki/rules/)
- [PHPStan Configuration](../../../phpstan.neon)
- [Testing Guidelines](../../../../docs/wiki/standards/)

### Moduli Dipendenti

- [User Module](../../User/docs/README.md) - Authentication & Authorization
- [Cms Module](../../Cms/docs/README.md) - Content Management
- [Tenant Module](../../Tenant/docs/README.md) - Multi-tenancy
- [Lang Module](../../Lang/docs/README.md) - Translations
- [Notify Module](../../Notify/docs/README.md) - Notifications

## 🗺️ Roadmap

1. **✅ Consolidamento Documentazione**: Unificare e semplificare la documentazione di tutti i moduli
2. **📋 Automazione Script di Merge**: Creare script per la gestione automatica dei conflitti comuni
3. **📈 Aumento Test Coverage**: Portare la copertura dei test per i moduli core sopra il 90%
4. **📊 Dashboard Health Check**: Introdurre una dashboard per monitorare lo stato di salute di tutti i moduli

## 🔗 Useful Links

- [CHANGELOG](./CHANGELOG.md)
- [Namespace Conventions](./namespace-conventions.md)
- [Testing Best Practices](./testing.md)

---

## Standard Rules & Workflow

- [BMAD Method](../../../../docs/wiki/concepts/bmad-method.md)
- [Context Engineering](../../../../docs/wiki/concepts/context-engineering.md)
- [LLM Wiki Governance](../../../../docs/wiki/concepts/llm-wiki-governance.md)

---

**Status**: ✅ Production
**Last Updated**: 2026-09-17
**Maintained by**: Laraxot Core Team
**PHPStan Level**: 10 (target, see [phpstan-level10.md](./phpstan-level10.md) for current status)

---

*Nota di manutenzione (2026-09-17): questo file conteneva marker di conflitto Git non risolti
(`<<<<<<<`/`=======`/`>>>>>>>`, quattro merge annidati) committati nella storia del repo,
risultato di più branch che avevano aggiunto in parallelo varianti di questo stesso README
(inclusa una versione "Xot — La Base Sacra di Laraxot" duplicata due volte). Risolto qui
tenendo il contenuto della revisione più recente (`README.md.old`, 2026-07-27, verificato
accurato contro il codice attuale: Filament ^5.0, Laravel 13.x, namespace reali in
`app/Filament/Actions/XotBaseAction.php` e `app/Traits/EnumTrait.php`), correggendo i
riferimenti a classi mai esistite nel codice (`XotBaseService`, `XotBaseEnum`) e un link
morto (`bashscripts/docs/git-conflict-resolution-guide.md`, non presente altrove nel repo).
Il contenuto filosofico/religioso duplicato ("La Base Sacra di Laraxot": non-negoziabili,
gap analysis, proposte di split/merge) non è stato riportato qui: i "10 comandamenti"
equivalenti sono già documentati in modo pulito in
[laraxot-10-commandments-wiki.md](./laraxot-10-commandments-wiki.md) e
[XOTBASE_ARCHITECTURE_PHILOSOPHY.md](./XOTBASE_ARCHITECTURE_PHILOSOPHY.md); la gap analysis
e le proposte di split/merge erano brainstorming speculativo, non recuperate per non
inventare documentazione — vedi la story di follow-up sulla pulizia dei marker di conflitto.
Lo stesso tipo di corruzione è stato trovato in centinaia di altri file di questo `docs/`
(vedi finding dedicato); questa sessione ha corretto solo `README.md`, `README.md.old`,
`readme.md` e `CHANGELOG.md`/`changelog.md`.*
=======
### 🏷️ **Enums System**
Le Enum di Xot implementano `XotBaseEnum`, che fornisce traduzioni automatiche e altri helper.
```php
use Modules\Xot\Enums\XotBaseEnum;

enum UserStatus: string implements XotBaseEnum
{
    case ACTIVE = 'active';
    case INACTIVE = 'inactive';

    public function getLabel(): string
    {
        // Traduzione gestita centralmente
        return __('xot::enums.user_status.'.$this->value);
    }
}
```

### 🛠️ **Sviluppo e Qualità**

### Analisi Statica (PHPStan)
Per garantire la stabilità di tutto l'ecosistema, l'analisi deve essere eseguita con memoria illimitata per evitare crash dei parallel workers:
```bash
php -d memory_limit=-1 ./vendor/bin/phpstan analyse Modules/
```

### Convenzioni
- **Namespace**: I namespace dei moduli **NON** devono includere il segmento `app`.
- **Tipizzazione Forte**: Utilizzo di `declare(strict_types=1);` e type hints rigorosi in tutto il codice.
- **File di Traduzione**: Seguire la struttura espansa `['label' => '...', 'tooltip' => '...']`.

### Strumenti di Qualità
- **PHPStan**: Livello 10. La configurazione è in `phpstan.neon`.
- **Pest**: Utilizzato per i test della business logic nei moduli core.
- **Laravel Pint**: Formattazione del codice secondo lo standard PSR-12 e le convenzioni Laraxot.

Esegui i controlli di qualità dalla root del progetto Laravel:
```bash
./vendor/bin/phpstan analyse Modules/Xot --level=max
./vendor/bin/pest Modules/Xot/tests
./vendor/bin/pint
```

### 🏆 PHPStan Level 10 Compliance (Dicembre 2025)

**Status**: ✅ **0 Errori** (16 → 0)
**Approccio**: Fix, Don't Ignore
**Baseline**: Nessuno

Il modulo Xot ha raggiunto la piena conformità PHPStan Level 10 senza compromessi:
- Zero baseline entries
- Nessuna modifica a phpstan.neon
- Solo correzioni reali del codice
- Type safety al 100%

**Documentazione dettagliata**:
- [PHPStan Patterns Dec 2025](./phpstan-patterns-dec-2025.md)
- [PHPStan Level 10 Success](../../../docs/phpstan-level-10-success.md)

## 🗺️ **Roadmap**
1.  **Consolidamento Documentazione**: Unificare e semplificare la documentazione di tutti i moduli (obiettivo: 500 → 120 file).
2.  **Automazione Script di Merge**: Creare script per la gestione automatica dei conflitti comuni e la validazione pre-commit.
3.  **Aumento Test Coverage**: Portare la copertura dei test per i moduli core sopra il 90%.
4.  **Dashboard Health Check**: Introdurre una dashboard per monitorare lo stato di salute e la compliance di tutti i moduli.

## 🔗 **Link Utili**
- [CHANGELOG](./CHANGELOG.md)
- [Guida alla Risoluzione dei Conflitti Git](../../../bashscripts/docs/git-conflict-resolution-guide.md)
- [Convenzioni sui Namespace](./namespace_conventions.md)
- [Linee Guida per il Testing](./testing.md)
---
title: "Xot Module Documentation"
type: documentation
tags: [module, documentation]
created: 2026-06-05
updated: 2026-06-05
---

# Modulo Xot - Documentazione

## Overview

Il modulo **Xot** è il nucleo fondativo dell'intero progetto [PROJECT_NAME] platform. Fornisce classi base, trait, servizi e configurazioni condivise da tutti gli altri moduli.

## Architettura

### Classi Base Principali

| Classe | Scopo | Estende |
|--------|-------|---------|
| `XotBaseModel` | Modello base per tutti i moduli | `Illuminate\Database\Eloquent\Model` |
| `XotBaseMigration` | Migrazioni anonime standardizzate | `Illuminate\Database\Migrations\Migration` |
| `XotBaseResource` | Risorse Filament base | `Filament\Resources\Resource` |
| `XotBaseServiceProvider` | ServiceProvider modulare | `Illuminate\Support\ServiceProvider` |
| `XotBaseWidget` | Widget Filament base | `Filament\Widgets\Widget` |
| `XotBaseWizardWidget` | Widget con form wizard multi-step (Filament `Wizard` / `Step`) | `XotBaseWidget` |

### Trait Fondamentali

- `HasXotTable`: Gestione tabelle Filament centralizzata
- `InteractsWithForms`: Gestione form nei widget
- `RelationX`: Relazioni many-to-many estese

## Collegamenti
- [Installazione stack LAMP / PHP 8.4 (Debian, repo Sury)](./lamp/install.txt)
- [Vite Configuration](./vite-configuration.md)
- [Theme Assets Workflow](./theme-assets-workflow.md)
- [BMAD Method (progetto)](../../../docs/bmad/setup-guide.md) — processo AI/agile e artefatti `_bmad-output/`

- [Documentazione Root](../../../docs/XOT_MODULE.md)
- [Regole Architettura](./architecture/)
- [PHPStan Configuration](./phpstan/)

## Regole Critiche

1. **MAI estendere direttamente classi Laravel/Filament** - Usare sempre wrapper Xot
2. **Configurazione PHPStan solo in `laravel/phpstan.neon`**
3. **Tutte le migrazioni devono usare classi anonime**

## Backlinks

- [User Module](../User/docs/)
- [UI Module](../UI/docs/)
- [Tenant Module](../Tenant/docs/)

## LLM Wiki Workflow

- Canonical wiki layer: [../../../../docs/wiki/README.md](../../../../docs/wiki/README.md)
- Governance page: [../../../../docs/wiki/concepts/llm-wiki-governance.md](../../../../docs/wiki/concepts/llm-wiki-governance.md)


## Standard Rules & Workflow

- [[BMAD Method](../../../../docs/wiki/concepts/bmad-method.md)]
- [[Context Engineering](../../../../docs/wiki/concepts/context-engineering.md)]
- [[LLM Wiki Governance](../../../../docs/wiki/concepts/llm-wiki-governance.md)]
>>>>>>> laraxot/dev
