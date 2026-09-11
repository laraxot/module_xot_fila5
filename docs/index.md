---
title: "Xot Module Documentation Index"
module: "Xot"
type: index
created: 2026-06-11
updated: 2026-06-11
---

# 📚 Xot Module - Documentation Index

**Quick Navigation**: [Overview](#overview) | [Setup](#setup) | [Architecture](#architecture) | [Testing](#testing) | [Models](#models) | [Resources](#resources)

---

## Overview

- **Status**: Stable (Core Module)
- **Test Coverage**: Excellent (108 tests: 97 unit + 11 feature)
- **Repository**: `git@github.com:laraxot/module_xot_fila5.git`
- **Last Updated**: 2026-06-11
- **Purpose**: Core module providing base architecture, utilities, and common patterns

**Module Stats**:
- Models: 45
- Test Files: 108
- Documentation Files: 1957

---

## Setup

### Installation
```bash
php artisan module:install Xot
```

### Configuration
Location: `config/xot.php`

Key Settings:
- Module base paths
- Cache configuration
- Service provider settings
- Utility options

---

## Architecture

### Directory Structure
```
Xot/
├── app/
│   ├── Actions/        # Business logic (reusable actions)
│   ├── Models/         # Eloquent models (45 total)
│   ├── Services/       # Domain services
│   ├── Contracts/      # Interfaces
│   ├── Providers/      # Service providers
│   ├── Filament/       # Admin panel integration
│   ├── Support/        # Utility classes
│   └── ...
├── database/
│   ├── migrations/
│   ├── factories/
│   └── seeders/
├── resources/
│   ├── views/
│   └── lang/
├── routes/
├── tests/
│   ├── Unit/           # 97 unit tests
│   └── Feature/        # 11 feature tests
└── docs/              # Module documentation
```

### Core Models (45 Total)

#### Base Patterns
- Base model traits and contracts

#### Domain Models
- Core business entities
- Cross-module references

#### Support Models
- Utility and helper models

---

## Architecture Patterns

### Service Layer
Xot provides reusable service patterns used across modules:
- Repository patterns
- Action classes
- Query builders
- Event handling

### Contract-Based Design
Interfaces defined in `app/Contracts/` for:
- Repository contracts
- Service contracts
- Event contracts

### Trait System
Common traits for:
- Model behaviors
- Query scoping
- Event handling
- Validation

---

## Testing

### Coverage Status
**Current**: Excellent (108 tests)  
- Unit Tests: 97 files
- Feature Tests: 11 files  
**Target**: Maintain 80%+

### Running Tests
```bash
cd laravel
./vendor/bin/pest Modules/Xot/tests/ --coverage
```

### Test Structure
- `tests/Unit/` - Core functionality, models, services
  - 97 unit test files covering models, actions, services
  - Isolated, fast execution
- `tests/Feature/` - Integration tests
  - 11 feature test files for end-to-end scenarios
  - Database interactions, event flows

### Key Test Areas
1. **Model Tests** — 45 models thoroughly tested
2. **Service Tests** — Business logic validation
3. **Action Tests** — Reusable action execution
4. **Query Tests** — Custom query builder methods
5. **Event Tests** — Event dispatching and handling

---

## Models

### Total: 45 Models

Xot models provide core functionality for:
- Base entity definitions
- Relationship patterns
- Trait implementations
- Common attributes
- Query scopes

See `app/Models/` directory for complete list.

---

## Documentation Files

### Primary Documentation
| File | Purpose |
|------|---------|
| [README.md](./README.md) | Quick start guide |
| [CHANGELOG.md](./CHANGELOG.md) | Version history |

### Knowledge Base
- **llm-wiki/** — Comprehensive knowledge base (1957 files)
  - Architecture guides
  - Service patterns
  - Integration examples
  - Best practices
  - Troubleshooting

---

## Key Files Reference

### Configuration
- `config/xot.php` - Main configuration

### Core Classes
- `app/Support/` - Utility classes
- `app/Contracts/` - Interface definitions

### Database
- `database/migrations/` - Schema migrations
- `database/factories/` - Model factories (45 models)
- `database/seeders/` - Data seeders

### Routes
- `routes/api.php` - API routes
- `routes/web.php` - Web routes

### Views
- `resources/views/` - Blade templates
- `resources/views/components/` - Reusable components

---

## Usage Patterns

### Using Xot Models
```php
// Import Xot models
use Xot\Models\YourModel;

// Use built-in traits
class YourModel extends Model {
    use Xot\App\Traits\HasTimestamps;
    use Xot\App\Traits\HasUuid;
}
```

### Using Xot Services
```php
// Inject Xot services
public function __construct(private SomeXotService $service) {}

// Call service methods
$result = $this->service->doSomething();
```

### Using Xot Actions
```php
// Execute reusable actions
$action = app(SomeXotAction::class);
$result = $action->execute($data);
```

---

## Integration Points

### Other Modules Depending on Xot
- **AI** — Uses core utilities
- **Geo** — Extends Xot models
- **Fixcity** — Uses services and traits
- **User** — Extends Xot base models
- **Cms** — Implements Xot patterns
- **Notify** — Uses Xot events
- **Job** — Uses Xot queue patterns

---

## Priority Actions

### For New Developers
1. **Start**: Read [README.md](./README.md)
2. **Explore**: Browse `app/Models/` for core entities
3. **Understand**: Study `app/Contracts/` for interfaces
4. **Learn**: Check `app/Traits/` for common behaviors

### For Contributors
1. Follow base module patterns in Xot
2. Use provided traits and contracts
3. Write tests alongside code (excellent test coverage!)
4. Document new services in llm-wiki

---

## Quick Commands

```bash
# Run all tests (108 total)
./vendor/bin/pest Modules/Xot/tests/ --coverage

# Run only unit tests (97)
./vendor/bin/pest Modules/Xot/tests/Unit/ --coverage

# Run only feature tests (11)
./vendor/bin/pest Modules/Xot/tests/Feature/ --coverage

# Check code quality
./vendor/bin/phpstan analyse Modules/Xot/

# Format code
./vendor/bin/pint Modules/Xot/

# Generate model
php artisan make:model --module=Xot

# Create migration
php artisan make:migration --module=Xot
```

---

## Resources

### External Links
- [GitHub Repository](https://github.com/laraxot/module_xot_fila5)
- [Issues & Discussions](https://github.com/laraxot/module_xot_fila5/issues)
- [Laravel Modules Documentation](https://laravelmodules.com/)

### Internal References
- [Base Module Guide](../../docs/wiki/modules/base-module-guide.md)
- [BMAD Workflow](../../docs/wiki/bmad/workflow.md)
- [Testing Standards](../../docs/wiki/testing/standards.md)
- [Xot Knowledge Base](./llm-wiki/) — 1957 wiki files

---

## Contributing

For contribution guidelines, see [CONTRIBUTING.md](../../CONTRIBUTING.md)

When contributing to Xot:
1. Maintain test coverage (currently excellent at 108 tests)
2. Follow patterns established in core models
3. Update CHANGELOG.md
4. Document in llm-wiki/ if adding new patterns

---

**Module Stats Summary**
- 45 Models (thoroughly documented)
- 108 Tests (97 unit + 11 feature)
- 1957 Documentation files
- 100% Test Coverage Focus

---

**Last Updated**: 2026-06-11  
*Generated by Module Documentation Improver Agent*
<<<<<<< HEAD
=======

## Discussioni architetturali — 2026-09-11

Tre sessioni indipendenti hanno analizzato la stessa domanda (XotBaseManageRelatedRecords
dovrebbe delegare form/table alla Resource correlata, come XotBaseResource fa per se
stessa?) nello stesso giorno. Punto di ingresso unico, in ordine di lettura consigliato:

1. [architecture/xotbasemanagerelatedrecords-convention-over-configuration-brainstorm.md](architecture/xotbasemanagerelatedrecords-convention-over-configuration-brainstorm.md) — censimento delle 8 pagine, verifica dal vivo del confine pannello/modulo, percentuali.
2. [architecture/xotbasemanagerelatedrecords-remove-traits-addendum.md](architecture/xotbasemanagerelatedrecords-remove-traits-addendum.md) — perche' `HasXotTable` non va tolta (fondazione condivisa con `XotBaseResourceTable`).
3. [architecture/xotbasemanagerelatedrecords-form-table-delegation-feasibility.md](architecture/xotbasemanagerelatedrecords-form-table-delegation-feasibility.md) — prova tecnica: un metodo di classe vince su un trait `final`; **corretto 2026-09-11 (bis)**: `$relatedResource` oggi e' quasi inerte per columns/actions perche' `HasXotTable::table()` sovrascrive dopo (vedi vendor trace in `filament/...brainstorming.md`).
4. [filament/manage-related-records-resource-delegation-brainstorming.md](filament/manage-related-records-resource-delegation-brainstorming.md) — traccia vendor completa (`makeTable()` → `configureTable()` → `Resource::table()`); conferma con evidenza di codice che `$this->getResource()` risolve la Resource **proprietaria** (mai quella correlata).
5. Prima bozza, superata: [xotbasemanagerelatedrecords-filament-demo-philosophy.md](xotbasemanagerelatedrecords-filament-demo-philosophy.md).

Story BMAD collegate: [stories/xotbasemanagerelatedrecords-convention-over-configuration.story.md](stories/xotbasemanagerelatedrecords-convention-over-configuration.story.md) (link corretto 2026-09-11: puntava a `11.1.manage-related-records-convention-over-configuration.story.md`, mai esistito — nome giusto senza prefisso numerico), [stories/manage-related-records-convention-over-configuration.story.md](stories/manage-related-records-convention-over-configuration.story.md), [stories/manage-related-records-resource-delegation.story.md](stories/manage-related-records-resource-delegation.story.md). Nessuna implementazione in nessuno dei tre filoni. Aggiornamento 2026-09-11 (v5): [[xotbasemanagerelatedrecords-v5-tutti-gli-hook-non-solo-colonne]] — il contratto va esteso a getTableActions/Filters/BulkActions, non solo colonne. IdColumn/TimestampColumn: [Modules/UI/docs/stories/8.1.id-timestamp-columns-extraction.story.md](../../UI/docs/stories/8.1.id-timestamp-columns-extraction.story.md).

- [XotBaseManageRelatedRecords.php — proposta completa con PHPDoc](app/Filament/Resources/Pages/XotBaseManageRelatedRecords.php.md): delega completa, coordinamento nella story, finding di review e limiti di migrazione.

**Aggiornamento 2026-09-11 (stesso giorno, piu' tardi)**: il link a
`stories/11.1.manage-related-records-convention-over-configuration.story.md`
sopra e' rotto (il file non esiste in `stories/`, solo la versione senza
prefisso numerico) — non corretto qui per non alterare la riga originale,
segnalato. La proposta corrente (quinta direzione, non implementata) e' in
fondo a
[XotBaseManageRelatedRecords.php.md](app/Filament/Resources/Pages/XotBaseManageRelatedRecords.php.md)
("REVISIONE 2026-09-11 (quinta direzione)"): `form()`/`table()` delegano
per intero alla Resource correlata (mai bridge per singolo hook), con
`getTableColumns()`/`getTableHeaderActions()` come unici due override
point per-pagina. Story canonica aggiornata:
[stories/xotbasemanagerelatedrecords-convention-over-configuration.story.md](stories/xotbasemanagerelatedrecords-convention-over-configuration.story.md)
(issue/discussion #115/#117). Esiste anche un secondo filone di tracking
GitHub sullo stesso argomento, issue/discussion #112/#114 (vedi
[stories/manage-related-records-resource-delegation.story.md](stories/manage-related-records-resource-delegation.story.md))
— non riconciliato in un'unica issue per evitare di chiudere tracking
altrui senza conferma, ma i due filoni descrivono la stessa decisione.

**ERRORE CRITICO TROVATO (2026-09-11)**: GetRelatedResourceClassAction fallisce
con "Nessuna Resource correlata risolvibile per ManageContacts". Probabile
causa: ambiguità tra le due ContactResource (Quaeris e Notify) o mancanza
di form/table class. Analisi completa senza implementazione in
[XotBaseManageRelatedRecords.php.md](app/Filament/Resources/Pages/XotBaseManageRelatedRecords.php.md)
sezione "ERRORE CRITICO TROVATO". Story riaperta come 'needs-followup'.
Coordinate GitHub: issue #115, discussion #117.

**Aggiornamento 2026-09-11 (sera) — perche' questa sezione era sparita**:
questo file non era mai stato committato oltre il boilerplate iniziale
("Generated by Module Documentation Improver Agent", HEAD); tutto il
contenuto sopra viveva SOLO come modifica non committata. Un'altra sessione
ha riportato il working tree a HEAD (probabilmente un `git checkout`/reset
non intenzionale sul file), cancellando questa intera sezione senza lasciare
traccia — nessun marcatore di conflitto, nessun errore. Recuperata qui
testuale dal diff locale ancora presente in questa sessione, non da git
(mai committata). Vedi [[git-forward-only]] e memoria second-brain
`xot-index-md-uncommitted-loss-2026-09-11.md`: la lezione e' che un file mai
committato non ha alcuna rete di sicurezza — committare subito, non a fine
sessione, e' l'unica difesa reale contro un reset altrui.

## Discussioni architetturali — 2026-09-11

Tre sessioni indipendenti hanno analizzato la stessa domanda (XotBaseManageRelatedRecords
dovrebbe delegare form/table alla Resource correlata, come XotBaseResource fa per se
stessa?) nello stesso giorno. Punto di ingresso unico, in ordine di lettura consigliato:

1. [architecture/xotbasemanagerelatedrecords-convention-over-configuration-brainstorm.md](architecture/xotbasemanagerelatedrecords-convention-over-configuration-brainstorm.md) — censimento delle 8 pagine, verifica dal vivo del confine pannello/modulo, percentuali.
2. [architecture/xotbasemanagerelatedrecords-remove-traits-addendum.md](architecture/xotbasemanagerelatedrecords-remove-traits-addendum.md) — perche' `HasXotTable` non va tolta (fondazione condivisa con `XotBaseResourceTable`).
3. [architecture/xotbasemanagerelatedrecords-form-table-delegation-feasibility.md](architecture/xotbasemanagerelatedrecords-form-table-delegation-feasibility.md) — prova tecnica: un metodo di classe vince su un trait `final`; **corretto 2026-09-11 (bis)**: `$relatedResource` oggi e' quasi inerte per columns/actions perche' `HasXotTable::table()` sovrascrive dopo (vedi vendor trace in `filament/...brainstorming.md`).
4. [filament/manage-related-records-resource-delegation-brainstorming.md](filament/manage-related-records-resource-delegation-brainstorming.md) — traccia vendor completa (`makeTable()` → `configureTable()` → `Resource::table()`); conferma con evidenza di codice che `$this->getResource()` risolve la Resource **proprietaria** (mai quella correlata).
5. Prima bozza, superata: [xotbasemanagerelatedrecords-filament-demo-philosophy.md](xotbasemanagerelatedrecords-filament-demo-philosophy.md).

Story BMAD collegate: [stories/xotbasemanagerelatedrecords-convention-over-configuration.story.md](stories/xotbasemanagerelatedrecords-convention-over-configuration.story.md) (link corretto 2026-09-11: puntava a `11.1.manage-related-records-convention-over-configuration.story.md`, mai esistito — nome giusto senza prefisso numerico), [stories/manage-related-records-convention-over-configuration.story.md](stories/manage-related-records-convention-over-configuration.story.md), [stories/manage-related-records-resource-delegation.story.md](stories/manage-related-records-resource-delegation.story.md). Nessuna implementazione in nessuno dei tre filoni. Aggiornamento 2026-09-11 (v5): [[xotbasemanagerelatedrecords-v5-tutti-gli-hook-non-solo-colonne]] — il contratto va esteso a getTableActions/Filters/BulkActions, non solo colonne. IdColumn/TimestampColumn: [Modules/UI/docs/stories/8.1.id-timestamp-columns-extraction.story.md](../../UI/docs/stories/8.1.id-timestamp-columns-extraction.story.md).

- [XotBaseManageRelatedRecords.php — proposta completa con PHPDoc](app/Filament/Resources/Pages/XotBaseManageRelatedRecords.php.md): delega completa, coordinamento nella story, finding di review e limiti di migrazione.

**Aggiornamento 2026-09-11 (stesso giorno, piu' tardi)**: il link a
`stories/11.1.manage-related-records-convention-over-configuration.story.md`
sopra e' rotto (il file non esiste in `stories/`, solo la versione senza
prefisso numerico) — non corretto qui per non alterare la riga originale,
segnalato. La proposta corrente (quinta direzione, non implementata) e' in
fondo a
[XotBaseManageRelatedRecords.php.md](app/Filament/Resources/Pages/XotBaseManageRelatedRecords.php.md)
("REVISIONE 2026-09-11 (quinta direzione)"): `form()`/`table()` delegano
per intero alla Resource correlata (mai bridge per singolo hook), con
`getTableColumns()`/`getTableHeaderActions()` come unici due override
point per-pagina. Story canonica aggiornata:
[stories/xotbasemanagerelatedrecords-convention-over-configuration.story.md](stories/xotbasemanagerelatedrecords-convention-over-configuration.story.md)
(issue/discussion #115/#117). Esiste anche un secondo filone di tracking
GitHub sullo stesso argomento, issue/discussion #112/#114 (vedi
[stories/manage-related-records-resource-delegation.story.md](stories/manage-related-records-resource-delegation.story.md))
— non riconciliato in un'unica issue per evitare di chiudere tracking
altrui senza conferma, ma i due filoni descrivono la stessa decisione.

**ERRORE CRITICO TROVATO (2026-09-11)**: GetRelatedResourceClassAction fallisce
con "Nessuna Resource correlata risolvibile per ManageContacts". Probabile
causa: ambiguità tra le due ContactResource (Quaeris e Notify) o mancanza
di form/table class. Analisi completa senza implementazione in
[XotBaseManageRelatedRecords.php.md](app/Filament/Resources/Pages/XotBaseManageRelatedRecords.php.md)
sezione "ERRORE CRITICO TROVATO". Story riaperta come 'needs-followup'.
Coordinate GitHub: issue #115, discussion #117.
>>>>>>> laraxot/dev
