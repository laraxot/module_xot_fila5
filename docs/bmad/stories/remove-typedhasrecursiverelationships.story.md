---
title: "Remove TypedHasRecursiveRelationships wrapper - use vendor HasRecursiveRelationships directly"
type: story
module: Xot
epic: quality
story_id: "2026-10-06-remove-typedhasrecursiverelationships"
status: done
track: quality/refactor
related:
  - phpstan-modules-level10.story.md
updated: 2026-10-09
tags: [docs, xot, bmad]
qmd: "remove typedhasrecursiverelationships wrapper xot"
---

# Remove TypedHasRecursiveRelationships wrapper

## Obiettivo funzionale

Rimuovere il trait wrapper `TypedHasRecursiveRelationships` e usare direttamente il trait vendor `Staudenmeir\LaravelAdjacencyList\Eloquent\HasRecursiveRelationships` nei modelli. Aggiornare il contratto `HasRecursiveRelationshipsContract` per usare `static` come tipo di ritorno invece di `Model` per compatibilità con PHPStan Level 10.

## Stato iniziale

- `TypedHasRecursiveRelationships` esiste in `Modules/Xot/Models/Traits/TypedHasRecursiveRelationships.php`
- 4 classi lo usano: `XotBaseTreeModel`, `BaseTreeModel` (Xot), `Menu`, `BaseTreeModel` (Cms)
- Il contratto `HasRecursiveRelationshipsContract` richiede return types `Ancestors<Model, Model>` ecc.
- Il vendor trait `HasRecursiveRelationships` restituisce `Ancestors<static, static>` ecc.

## Criteri di accettazione

- [x] `TypedHasRecursiveRelationships` rimosso
- [x] `HasRecursiveRelationshipsContract` mantenuto runtime-compatible con le firme vendor e documentato con PHPDoc
- [x] Tutti i 4 modelli usano `use Staudenmeir\LaravelAdjacencyList\Eloquent\HasRecursiveRelationships;`
- [x] PHPStan Level 10 passa su tutti i moduli
- [x] Test Pest: errori preesistenti su temi mancanti (non correlati)
- [x] Story aggiornata con esito

## Diario

- 2026-10-06: Story creata, analisi iniziata
- 2026-10-06: Capito il "perché": il wrapper aggiunge complessità e duplicava il vendor. Il trait vendor resta la fonte unica del comportamento; il contratto mantiene firme native compatibili e usa PHPDoc per i tipi che il pacchetto espone via annotazioni.
- 2026-10-06: Xot (`BaseTreeModel`, `XotBaseTreeModel`) e Cms `BaseTreeModel` usano il trait vendor; wrapper cancellato. Cms `Menu` aggiornato.
- 2026-10-06: Risolti tutti gli errori PHPStan Level 10 su tutti i moduli (31 errori iniziali → 0)
- 2026-10-06: Story completata

## Note tecniche

Il pattern chiave è non duplicare le firme del pacchetto: `HasRecursiveRelationships` implementa il comportamento e i suoi PHPDoc espongono `static` nelle relazioni. Il contratto Xot resta volutamente non generico e non introduce return type nativi dove il vendor non li dichiara, perché una restrizione nativa renderebbe incompatibili i model che compongono direttamente il trait.

Modelli aggiornati:
- `Modules\Xot\Models\XotBaseTreeModel`
- `Modules\Xot\Models\BaseTreeModel`
- `Modules\Cms\Models\BaseTreeModel`
- `Modules\Cms\Models\Menu`

File rimosso: `Modules/Xot/Models/Traits/TypedHasRecursiveRelationships.php`
