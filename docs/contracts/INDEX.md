---
title: "INDEX — Xot"
type: index
status: active
created: 2026-11-23
updated: 2026-11-23
decision-makers: []
---

<!-- File: docs/contracts/INDEX.md · formato MADR breve. -->
# <!-- Titolo: indice operativo Xot -->

## Contratti di comportamento

Xot è il modulo base: estende `XotBasePage`, `XotBaseResource`, `XotBaseServiceProvider`,
`XotBaseMigration` e i relativi RelationManager. I contratti qui descritti sono la
superficie di estensione per tutti i moduli figli.

| Operazione | Contract | Classe | Invarianti |
|---|---|---|---|
| Bootstrap provider registry | [bootstrap-provider-registry](bootstrap-provider-registry.md) | `Modules\Xot\Providers\XotServiceProvider` | BOOTSTRAP-PROVIDERS-001..003 |
| XotBase class surface | [xotbase-classes](xotbase-classes.md) | `XotBasePage`, `XotBaseResource`, `XotBaseServiceProvider`, `XotBaseMigration` | XOTBASE-001..004 |
| Behavioral contract authoring | [behavioral-contract-template](behavioral-contract-template.md) | template standard | CONTRACT-AUTHOR-001 |
| Contract authoring standard | [contract-authoring-standard](contract-authoring-standard.md) | standard | CONTRACT-AUTHOR-002 |

(End of file - total 22 lines)