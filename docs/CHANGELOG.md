# Changelog - Modulo Xot

Tutte le modifiche significative al modulo Xot sono documentate in questo file.

Il formato è basato su [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
e questo progetto aderisce a [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased]

### Added
- File Locking Pattern documentazione e implementazione
- Documentation consolidation strategy
- Essential reading guide
- Project best practices 2025

## [1.2.0] - 2025-11-04

### 🎉 Major - Risoluzione Massiva Merge Conflicts

#### Fixed
- **18 file** con merge conflicts massivi che bloccavano `php artisan serve`
  - 13 file modulo Xot (core framework)
  - 3 file modulo User (auth widgets)
  - 2 file modulo Notify (PSR-4)
  - 1 file modulo UI (PSR-4)

#### Changed
- **Namespace PSR-4** corretti in 3 file:
  - `Modules\UI\App\Livewire` → `Modules\UI\Livewire`
  - `Modules\Notify\App\Jobs` → `Modules\Notify\Jobs`
  - `Modules\Notify\App\Services` → `Modules\Notify\Services`

- **Import duplicati** rimossi: 30+ occorrenze
- **Metodi duplicati** rimossi: 25+ occorrenze
- **Proprietà duplicate** rimosse: 15+ occorrenze

#### Added
- **File Locking Pattern** - Nuova regola fondamentale per modifiche sicure
- **Documentazione:**
  - `documentation-consolidation-strategy.md` - Piano riduzione docs
  - `index.md` - Indice navigazione docs
  - `essential-reading.md` - Top 10 docs da leggere

#### Removed
- Centinaia di linee duplicate da merge conflicts
- Git conflict markers (`=======`, `>>>>>>>`)
- Import statements duplicati

### Impact
- ✅ **Server Laravel:** Da BLOCCATO a FUNZIONANTE
- ✅ **Parse Errors:** Da ~50 a 0
- ✅ **PSR-4 Warnings:** Da 5 a 0
- ✅ **Code Quality:** PSR-12 compliant
- ✅ **Application Status:** OPERATIONAL

---

## [1.1.0] - 2025-10-29

### Fixed
- **HasXotTable.php** - Risolti if statement duplicati (3x)
- **XotBaseChartWidget.php** - Rimossi metodi getHeading() duplicati

### Changed
- Script Git Conflicts aggiornato a V6.1

### Added
- Documentazione bugfix per HasXotTable

---

## [1.0.0] - 2025-08-18

### Added
- PHPStan Level 10 achievement
- Comprehensive code analysis
- Type safety improvements (500+ type hints)

### Changed
- Migrazione a Laravel 12.x (superata da Laravel 13.x, vedi [README.md](./README.md))
- Upgrade Filament 4.x (superato da Filament 5.x, vedi [README.md](./README.md))
- Tailwind CSS 4.x implementation

---

## [0.9.0] - 2025-01-06

### Fixed
- Model inheritance audit completato
- Namespace conventions standardizzate
- Service provider architecture refactoring

### Added
- Comprehensive improvement recommendations
- Architecture violations fixes
- Code quality standards documentation

---

## Sessione Fix Critica - 2025-06-04

*(voce cronologicamente precedente alla 1.1.0, conservata per storia: proveniva da un file
`CHANGELOG.MD` che collideva con questo su filesystem case-insensitive, poi assorbito qui.)*

### Fixed
- **HasXotTable.php**: Risolti if duplicati (3x) e array malformati da merge conflict
- **XotBaseChartWidget.php**: Rimossi metodi duplicati e chiusure classe multiple
- **Script git conflicts v6.sh**: Corretti 3 bug critici (P0+P1) — cleanup file
  temporanei, ottimizzazione stat command, cattura exit code robusta (6.0 → 6.1)

### Added
- Documentazione [syntax-errors-mass-fix.md](./syntax-errors-mass-fix.md)
- Pattern identificato: "Triplice Mostro del Merge"

### Documentation
- Aggiornato [laraxot-architecture-rules.md](./laraxot-architecture-rules.md)

---

## Pattern di Versioning

### Major (x.0.0)
- Breaking changes
- Architectural redesign
- Major framework upgrades

### Minor (0.x.0)
- New features
- Significant fixes
- Documentation improvements
- Non-breaking changes

### Patch (0.0.x)
- Bug fixes
- Minor improvements
- Documentation updates
- Typo corrections

## 🔗 Collegamenti

### Documenti Correlati
- [README.md](./README.md) - Entry point
- [File Locking Pattern](./file-locking-pattern.md) - Nuova regola
- [Architecture Rules](./laraxot-architecture-rules.md) - Regole base

### Repository
- **Branch:** dev
- **Laravel:** 13.x
- **PHP:** 8.4
- **Filament:** 5.x

---

**Maintained by:** Team Laraxot
**Format:** [Keep a Changelog](https://keepachangelog.com/)
**Versioning:** [Semantic Versioning](https://semver.org/)

---

*Nota di manutenzione (2026-09-17): questo file conteneva marker di conflitto Git non
risolti (tre copie annidate della stessa sezione "1.2.0 - Risoluzione Massiva Merge
Conflicts", e una sezione "Sessione Fix Critica" duplicata due volte da file
`CHANGELOG.MD`/`changelog.md` con nomi diversi solo per maiuscole). Deduplicato tenendo
un'unica copia di ciascuna sezione, corretti i link `./docs/...` (doppio prefisso: questo
file è già dentro `docs/`) e rimosso il link a
`docs/merge-conflict-resolution-2025-11-04.md`, mai esistito in questo repo (esistono
invece diverse varianti tipo `merge-conflict-resolution.md`,
`merge-conflict-resolution-1.md`, `merge-conflict-resolution-variant.md`: nessuna
identificabile con certezza come quella citata, quindi non collegata a caso). Aggiornati
i valori "Repository" (branch/Laravel/PHP/Filament) ai valori correnti verificati nel
codice al momento di questa modifica; le voci di versione storiche sopra non sono state
alterate. Vedi anche la nota gemella in [README.md](./README.md).*
