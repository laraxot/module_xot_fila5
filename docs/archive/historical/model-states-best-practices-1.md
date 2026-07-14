---
title: "Best Practices per Model States e Transizioni Custom"
module: "Xot"
type: concept
tags: [model, states, best, practices]
created: 2026-07-14
updated: 2026-07-14
qmd: "model states best practices 1"
related:
  - "./eloquent-magic-properties-rule.md"
---
# Best Practices per Model States e Transizioni Custom

## Parametri aggiuntivi nelle transizioni custom

- **Regola**: Se una transizione custom richiede parametri aggiuntivi (es. motivazione), tutte le chiamate a `transitionTo` devono fornire tali parametri.
- **Motivazione**: Evita errori di runtime (ArgumentCountError) e garantisce la tracciabilità delle motivazioni delle transizioni.
- **Checklist**:
  - [ ] La firma del costruttore della transizione è coerente con le chiamate
  - [ ] Tutte le chiamate a `transitionTo` forniscono i parametri richiesti
  - [ ] La documentazione delle transizioni specifica i parametri richiesti
- **Collegamenti**:
  - [Errori comuni nelle transizioni custom (<nome progetto>)](../../<nome progetto>/docs/model-states-errors.md)
  - [README.md centrale](../../../docs/README.md)
