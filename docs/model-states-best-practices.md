<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> laraxot/dev
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
<<<<<<< HEAD
=======
=======
  - [README.md centrale](../../../docs/README.md)
---
module: theme
topic: model-states-best-practices
canonical: ../../../Themes/docs/shared-components/model-states-best-practices-1.md
---

See canonical documentation: ../../../Themes/docs/shared-components/model-states-best-practices-1.md
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
