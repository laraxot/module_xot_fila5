## [2026-06-07] phpstan | DTO factory self per run Modules no-flag

- `cd laravel && ./vendor/bin/phpstan analyse Modules` -> **4993 file, [OK] No errors**.
- DTO Xot concreti: factory `make()` con ritorno `self` e `new self()`, evitando `new static()` e PHPDoc `@var static` usati solo per placare PHPStan.
- Coinvolti: `ArticleData`, `AuthData`, `CookieData`, `FilemanagerData`, `MailData`, `NotificationData`, `OptionData`, `PwaData`, `RouteData`, `SearchEngineData`, `SubscriptionData`.

## [2026-06-07] quality | PHPStan shared Xot patterns

- Full gate root: `cd laravel && ./vendor/bin/phpstan analyse Modules --memory-limit=-1` → **4993 file, zero errori**.
- Pattern Xot: `formClass(): ?class-string` invece di stringa vuota, `getFormFill()` normalizzato a `array<string,mixed>`, `view-string` locale prima di `->view()`, dynamic fillable via hook `getDynamicFillableEnums()`.
- Propagazione: `Client` override hook dynamic fillable; `XotBaseResource::getPages()` evita shape sealed per risorse con pagine extra.

## [2026-06-05] docs | HackerNoon harness — tips 001-022 in wiki locale

- Stub/checklist: second-brain → canon Xot, ai-harness, [hackernoon map](../../../../../docs/wiki/concepts/hackernoon-ai-coding-tips-fixcity-map.md), [llm-wiki.txt](../../../../../bashscripts/tools/prompts/llm-wiki.txt)
- GitHub: [#272](https://github.com/laraxot/base_fixcity_fila5/issues/272) / [D#273](https://github.com/laraxot/base_fixcity_fila5/discussions/273)

---
title: "Activity Log"
module: "Xot"
---

# Activity Log — Xot

## [2026-06-05] docs | AI harness canon + stub moduli allineati

- [ai-harness-xot-discipline.md](concepts/ai-harness-xot-discipline.md) — owner harness PHPStan/XotBase
- Stub second-brain in 9+ moduli puntano a canon Xot + mappa HackerNoon #272

> **Purpose:** Append-only chronological activity record tracking ingests, queries, and lint passes.

## Log Entries

## [2026-04-27] governance | policy module matrix

- aggiunta matrice modulo-per-modulo con base policy consigliata (`XotBasePolicy` vs `UserBasePolicy`).
- inserite priorita' di allineamento per ridurre drift nei moduli ibridi.
- nuova pagina: `docs/wiki/concepts/policy-module-matrix.md`.

## [2026-04-27] governance | policy base strategy across modules

- documentata strategia di base per scegliere tra `XotBasePolicy` e `UserBasePolicy`.
- mantenuta separazione: `XotBasePolicy` come base tecnica cross-modulo, `UserBasePolicy` come specializzazione identity-domain.
- nuovo decision tree operativo in `docs/wiki/concepts/policy-base-strategy.md`.

## [2026-04-23] quality | PHPStan cluster map and false friends

- Documentati i cluster statici ricorrenti emersi da `phpstan analyse Modules` con focus su Xot: `implode`, `array_fill_keys`, `mixed`, funzioni unsafe e mismatch con API Filament.
- Nuova pagina: `docs/wiki/concepts/phpstan-cluster-map-and-false-friends.md`.

## [2026-04-23] governance | XotBaseField calculated view rule

- Formalizzata la regola corretta per i componenti che estendono `XotBaseField`: niente `protected string $view` nei singoli field, ma risoluzione centralizzata via `getDefaultView()` nel base class.
- Verifica runtime eseguita sulla URL reale `tests/segnalazione-crea`: dopo il fix `CoordinatePicker` torna a renderizzare correttamente.

## [2026-04-22] ops | context-mode + QMD per story BMAD

- **regola root**: `docs/wiki/concepts/context-compression-discipline.md`
- **scope Xot**: base classes e documentazione framework vanno recuperate tramite QMD/context-mode con snippet minimi quando uno skill BMAD rischia il limite `131072 tokens`.
- **verifica**: context-mode plugin/MCP connessi; QMD indicizza moduli/temi/root/bashscripts.

## [2026-05-12] ops | opencode compaction overflow hardening

- installato `@tarquinen/opencode-dcp@latest` nel config globale OpenCode.
- creato `opencode.json` al git root con `compaction.auto=true`, `compaction.prune=true`, `compaction.reserved=40000`.
- chiarito che il punto operativo corretto e' il git root, non `laravel/opencode.json`.
- aggiornata la source wiki `sources/context-compression-and-retrieval.md` per riflettere il nuovo setup stabile.

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

## [2026-04-27] cross-reference | Policy Decision
- Linked: ../User/docs/wiki/concepts/policy-inheritance-boundary.md
- Decision: Mantenere separazione XotBasePolicy (foundation) vs UserBasePolicy (application)
- XotBasePolicy: zero dipendenze, system processes, API token
- UserBasePolicy: Spatie Permission, user-authenticated, RBAC
- Commit: docs: add cross-reference to policy boundary decision
