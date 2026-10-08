---
type: decision-log
title: "Decision Log — Xot"
links: {github_issue: #XXX, discussion: #XXX}
---
# Decision Log — Xot

## Decisions

### 2026-10-08: Ripristino file regrediti e contratto HasRecursiveRelationships compatibile con Cms
- **Choose**: Ripristinare dallo stato del monorepo al 06/10 `TypedHasRecursiveRelationships`, `BaseTreeModel`, `XotBaseTreeModel`, `HasRecursiveRelationshipsContract`, `Actions/File/AssetAction` (tornano `isUpToDate()`/`copyAtomically()`), le tabelle `LogsTable` ed `ExtrasTable`, `resources/svg/files/xlsx.svg`. Nel contratto, tipi di ritorno solo nel `@return` (non nativi) sui 12 metodi che il trait vendor `HasRecursiveRelationships` dichiara senza tipo.
- **Over**: Contratto del 06/10 così com'era (con tipi nativi), oppure contratto del sotto-repo senza la riscrittura del 06/10.
- **Because**: Il commit `2dc9faf42` (07/10 13:11, senza genitori, 9633 file) aveva riportato i modelli ad albero alla versione di marzo 2026. La riscrittura del 06/10 (trait Typed, contratto tipizzato) esisteva solo nel monorepo e in commit locali di Xot oggi irraggiungibili (06/10 15:14-18:00). Nel frattempo Cms (`9d61081b`, 06/10 18:48) è passato al trait vendor: con i tipi nativi nel contratto il caricamento di `Cms\Models\Menu` era un errore fatale. Scelta dell'utente: tenere entrambi i lavori; PHPStan legge il `@return`, il trait Typed resta covariante.
- **Verifica**: `php -l`; i cinque modelli ad albero (Cms, Xot, Limesurvey) si caricano; PHPStan su `Modules` senza errori in Xot; test prima/dopo identici.
## Open Questions

