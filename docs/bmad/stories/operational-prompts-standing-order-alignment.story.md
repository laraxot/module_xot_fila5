---
title: "Allineare i prompt operativi agli standing order"
type: story
module: Xot
status: in-progress
created: 2026-11-05
updated: 2026-11-05
tags: [bmad, prompts, standing-order, quality]
qmd: "bashscripts docs prompts BMAD second brain swarm Pest PHPStan forward-only traits accessor conventions"
related:
  - ./migration-standards-correction.story.md
  - ../wiki/rules/accessor-twin-method.md
  - ../wiki/rules/model-methods-to-traits.md
---
# Allineare i prompt operativi agli standing order

## Obiettivo

Rimuovere istruzioni operative in `bashscripts/docs/prompts/` che contraddicono
gli standing order correnti, puntando alle SSoT owner senza duplicarne i dettagli.

## Criteri di accettazione

- [ ] Auditare le incongruenze prioritarie e dividerle in file disgiunti con lock.
- [ ] Riallineare gate Pest, PHPStan, BMAD/sprint, swarm e migrazioni forward-only.
- [ ] Collegare le regole Eloquent owner per accessor, mutator/helper e relazioni.
- [ ] Conservare nomi stabili dei prompt e non spostare documenti di progetto nei prompt.
- [ ] Eseguire `qmd update` e annotare i file bloccati senza aggirare lock attivi.

## Findings iniziali

L'audit read-only ha trovato istruzioni stale su gate Pest, modifiche a migrazioni
già rilasciate, assenso preventivo per schema ordinario, story non tracciate in
`docs/sprint-status.yaml`, swarm opzionale e assenza dei link alle regole Eloquent.
Il prompt `32-model-migration-factory-seeder.md` è già stato riallineato nella
story [migration standards](./migration-standards-correction.story.md).

## Claim

| Owner | File assegnati | Stato |
|---|---|---|
| `opencode_cli_recovery` | `00-master-prompt.md`, `15-bmad.md`, `46-multi-agent-module-swarm.md`, `99-closing-ritual.md` | in corso; un solo prompt alla volta con lock |
| `accessor_audit_other_modules` | `10-test.md`, `35-policies-permissions-audit.md`, `45-full-module-audit.md` | in corso; escludere `09-migrations.md` se resta lockato |
| coordinatore | `32-model-migration-factory-seeder.md` | aggiornato; verifiche e QMD in corso |
