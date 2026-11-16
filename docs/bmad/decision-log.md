---
title: "Decision log — Xot"
type: decision-log
status: review
updated: 2026-11-16
module: Xot
qmd: "decision log ADR Xot audit policy confini"
---

# Decision log — Xot

## Audit source-first 2026-11-16

Decisioni proposte dall'audit. Formato: ADR breve (stato, impatto, decisione, perché, evidenza).

### ADR-XOT-01 — Il core non dipende dai moduli feature

- **Data:** 2026-11-16
- **Stato:** PROPOSTA (da approvare dal titolare del modulo; nessun codice cambiato dall'audit)
- **Impatto:** Alto
- **Decisione:** Xot espone contratti (`UserContract`, `TenantContract`, `PanelContract`) e riceve le implementazioni dal container; ogni `use Modules\<feature>` in `Xot/app` diventa debito con story. `module.json` elenca le dipendenze reali finché non sono rimosse.
- **Perché:** Il kernel deve essere avviabile e testabile da solo; i cicli Xot↔feature rendono ogni rename un incidente.
- **Evidenza:** [audits/xot-audit.md](./audits/xot-audit.md)

### ADR-XOT-02 — `XotBasePolicy::before()` senza `once()`

- **Data:** 2026-11-16
- **Stato:** PROPOSTA (da approvare dal titolare del modulo; nessun codice cambiato dall'audit)
- **Impatto:** Basso
- **Decisione:** Rimuovere `once()`: ogni verifica costa 2 `hasRole` già memoizzati da Spatie. Il bypass `{modulo}::admin` resta (ADR `module-admin-role-policy-bypass`) ma le policy di sicurezza (Role/Permission/Team) lo sovrascrivono: vedi [User](../../../User/docs/bmad/audits/user-audit.md).
- **Perché:** Complessità senza beneficio; evitare id oggetto riusati in worker lunghi.
- **Evidenza:** [audits/xot-audit.md](./audits/xot-audit.md)

### ADR-XOT-03 — Guardie dati sacri confermate come invarianti

- **Data:** 2026-11-16
- **Stato:** PROPOSTA (da approvare dal titolare del modulo; nessun codice cambiato dall'audit)
- **Impatto:** Alto
- **Decisione:** `TestDatabaseGuard` (DB `*_test`), `XotBaseTestCase` (no `migrate:fresh`/`RefreshDatabase`), `Application::publicPath()` → `public_html`, `BuildTestSqliteCommand` riscrive ogni connessione su SQLite prima di `migrate --force`. Non si toccano senza ADR.
- **Perché:** Sono le uniche barriere meccaniche contro la distruzione di dati e contro il path sbagliato degli asset.
- **Evidenza:** [audits/xot-audit.md](./audits/xot-audit.md)

### ADR-XOT-04 — Services/trait morti: cancellare

- **Data:** 2026-11-16
- **Stato:** PROPOSTA (da approvare dal titolare del modulo; nessun codice cambiato dall'audit)
- **Impatto:** Medio
- **Decisione:** `RouteService`, `ModuleCommandHandler`, 9 trait `@phpstan-ignore trait.unused` e `HandleArtisanActRequestAction` si convertono in Action usata o si cancellano (git ricorda). `EnumIntegerTrait` resta (API di piattaforma motivata).
- **Perché:** Actions-over-Services; "errori corretti, non ignorati".
- **Evidenza:** [audits/xot-audit.md](./audits/xot-audit.md)

