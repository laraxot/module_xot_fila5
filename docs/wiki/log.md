---
title: "Activity Log"
module: "Xot"
---

# Activity Log — Xot

> **Purpose:** Append-only chronological activity record tracking ingests, queries, and lint passes.

## Log Entries

## [2026-04-22] ops | context-mode + QMD per story BMAD

- **regola root**: `docs/wiki/concepts/context-compression-discipline.md`
- **scope Xot**: base classes e documentazione framework vanno recuperate tramite QMD/context-mode con snippet minimi quando uno skill BMAD rischia il limite `131072 tokens`.
- **verifica**: context-mode plugin/MCP connessi; QMD indicizza moduli/temi/root/bashscripts.

## [2026-04-22] governance | Filament wizard summary via Infolists

- **regola root**: `docs/wiki/concepts/filament-summary-infolist-rule.md`
- **scope Xot**: quando wrapper, trait o base widget espongono/validano `getSummarySchema()`, il summary read-only deve essere modellato con `Filament\Infolists\Components\*`, non con `SchemaView`.
- **fonte ufficiale**: https://filamentphp.com/docs/5.x/infolists/overview

## [2026-04-20] pattern | UnitTestCase senza MySQL per test puri

- **motivo**: `Modules\Geo\Tests\TestCase` richiedeva MySQL anche per 17 test puramente PHP → `PDOException` su ambienti senza DB configurato
- **soluzione**: creato `UnitTestCase` in Geo che usa `CreatesApplication` (Xot) senza `DatabaseTransactions`
- **pages**:
  - `docs/wiki/concepts/unit-test-case-pattern.md` (**NUOVA**): template riutilizzabile per ogni modulo
  - `docs/wiki/index.md`: aggiornato sezione Testing Patterns
- **applicabilità**: pattern replicabile in qualsiasi modulo per test Pest/PHPUnit senza DB

---

_No activity yet. Start by ingesting raw documents._

### Format

```
[YYYY-MM-DD HH:MM:SS UTC] [OPERATION] Description
```

**Operations:**
- `INGEST` — Added raw document to wiki
- `QUERY` — Answered question from wiki
- `LINT` — Maintained wiki quality
- `UPDATE` — Modified existing wiki page

---

**Last Activity:** None  
**Total Operations:** 0
