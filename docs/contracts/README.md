---
title: "Contratti"
type: index
tags: [contracts, actions, interfaces]
created: 2026-11-18
<<<<<<< .merge_file_qPKU6s
updated: 2026-11-18
=======
<<<<<<< .merge_file_PYF7hJ
updated: 2026-11-19
=======
updated: 2026-11-18
>>>>>>> .merge_file_4E9PIE
>>>>>>> .merge_file_9Qmr6V
---

# Contratti

<<<<<<< .merge_file_qPKU6s
Cosa promette la superficie pubblica di questo pacchetto: le Action che scrivono dati, chiamano servizi esterni o hanno
effetti collaterali, e le interfacce (`app/Contracts`). Regola: `Modules/Xot/docs/rules/action-behavioral-contract.md`.
=======
<<<<<<< .merge_file_PYF7hJ
Cosa promette la superficie pubblica di questo pacchetto: le classi base `XotBase*` che gli altri moduli estendono,
le Action che scrivono dati, chiamano servizi esterni o hanno effetti collaterali, e le interfacce (`app/Contracts`).
Regola: `Modules/Xot/docs/rules/action-behavioral-contract.md`.

## Classi base

- [Contratto delle classi XotBase](xotbase-classes.md) — cosa garantiscono a chi le estende, cosa pretendono in
  cambio, le due trappole note (`registerConfig()` non ricorsiva, `tableUpdate()` che crea la tabella) e come si
  verifica una modifica che le tocca.
=======
Cosa promette la superficie pubblica di questo pacchetto: le Action che scrivono dati, chiamano servizi esterni o hanno
effetti collaterali, e le interfacce (`app/Contracts`). Regola: `Modules/Xot/docs/rules/action-behavioral-contract.md`.
>>>>>>> .merge_file_4E9PIE
>>>>>>> .merge_file_9Qmr6V

## Contratto di comportamento di un'Action

Un file per Action, nome in kebab-case della classe (`create-ticket-action.md`), frontmatter `type: contract` e
`action: <FQCN>`, e queste sei sezioni nell'ordine:

```markdown
## Input
## Output
## Invarianti
## Effetti collaterali
## Errori
## Non fa
```

Il docblock dell'Action rimanda al file con la riga `Contratto di comportamento: docs/contracts/<file>.md`.
Chi cambia il comportamento aggiorna il contratto nello stesso commit.

## Contratti

