---
title: "Architecture Decision Records"
type: index
tags: [adr, decisioni]
created: 2026-11-18
updated: 2026-11-18
---

# Architecture Decision Records

Il **perche'** delle scelte di questo pacchetto: una decisione per file, con le
alternative scartate. I numeri sequenziali sono ammessi per gli ADR canonici;
non si usano date o timestamp nel nome (la data sta nella frontmatter).

## Formato

```markdown
---
title: "ADR — <decisione in una riga>"
type: decision
status: proposed | accepted | superseded | deprecated
created: AAAA-MM-GG
updated: AAAA-MM-GG
issues: []
---

# ADR: <decisione>

## Contesto
Fatti e vincoli che hanno reso necessaria la scelta (misure, norme, policy, incidenti).

## Driver della decisione
Vincoli e forze che pesano sulla scelta.

## Decisione
Cosa si fa, in concreto, e dove sta nel codice.

## Alternative scartate
Ogni alternativa seria, con il motivo per cui non e' stata scelta.

## Conseguenze
Pro, contro, debito che resta, cosa misurare. Chi cambia la decisione scrive un nuovo ADR e segna questo `superseded`.

## Conferma
Test, audit o controllo ripetibile che dimostra il rispetto della decisione.
```

## Decisioni

- [0001-actions-over-services](0001-actions-over-services.md) — logica di business nuova in Actions
- [0002-queueable-actions-over-framework-jobs](0002-queueable-actions-over-framework-jobs.md) — QueueableAction come unico ingresso di business
- [0003-pest-as-test-runner](0003-pest-as-test-runner.md) — Pest come formato e runner applicativo
- [0004-one-model-one-migration](0004-one-model-one-migration.md) — ownership dello schema e una migrazione owner per modello
- [0005-owner-local-documentation](0005-owner-local-documentation.md) — decisioni e contratti nella documentazione dell'owner
- [agent-harness](agent-harness.md) — harness e guard per il lavoro coordinato
- [architecture-tests-pest-arch](architecture-tests-pest-arch.md) — regole di architettura con Pest arch(): ambito esplicito, debito dichiarato, cinque trappole chiuse
- [architecture-rules-phparkitect](architecture-rules-phparkitect.md) — PHPArkitect con baseline (superseded dal precedente)
- [pest-testcase-binding-per-file](pest-testcase-binding-per-file.md) — il TestCase Pest del modulo si lega nel file che lo usa

## Alias storici

I file semantici non numerati `queueable-actions-over-jobs.md`,
`pest-over-phpunit.md` e `one-model-one-migration.md` sono stati mantenuti
come riferimenti compatibili con link già esistenti. Il set canonico e' quello
numerato sopra: una decisione nuova aggiorna il canonico e non crea una terza
copia.

## Decisioni precedenti (formato libero, non ancora ADR)

- [module-admin-role-policy-bypass](../wiki/decisions/module-admin-role-policy-bypass.md)
- [security-middleware-csrf-order](../wiki/decisions/security-middleware-csrf-order.md)
