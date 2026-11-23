---
title: "Contratti"
type: index
tags: [contracts, actions, interfaces]
created: 2026-11-18
updated: 2026-11-23
---

# Contratti

Cosa promette la superficie pubblica di questo pacchetto: le classi base `XotBase*` che gli altri moduli estendono,
le Action che scrivono dati, chiamano servizi esterni o hanno effetti collaterali, e le interfacce (`app/Contracts`).
Regola: `Modules/Xot/docs/rules/action-behavioral-contract.md`.

## Classi base

- [Contratto delle classi XotBase](xotbase-classes.md) — cosa garantiscono a chi le estende, cosa pretendono in
  cambio, le due trappole note (`registerConfig()` non ricorsiva, `tableUpdate()` che crea la tabella) e come si
  verifica una modifica che le tocca.

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

Il docblock dell'Action rimanda al file con il marker machine-readable
`@contract docs/contracts/<file>.md`. La frase descrittiva legacy può restare,
ma il marker è il collegamento verificato dai test.
Chi cambia il comportamento aggiorna il contratto nello stesso commit.

## Contratti

- [Standard di authoring dei contratti](contract-authoring-standard.md)

