---
title: "Remove TypedHasRecursiveRelationships wrapper - use vendor HasRecursiveRelationships directly"
type: story
module: Xot
epic: quality
story_id: "2026-10-06-remove-typedhasrecursiverelationships"
status: in_progress
track: quality/refactor
related:
  - 2026-10-06-phpstan-modules-level10.story.md
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
- [x] `HasRecursiveRelationshipsContract` aggiornato con return types `static`
- [ ] Tutti i 4 modelli usano `use Staudenmeir\LaravelAdjacencyList\Eloquent\HasRecursiveRelationships;`
- [ ] PHPStan Level 10 passa su tutti i moduli
- [ ] Test Pest passano (se eseguibili)
- [ ] Story aggiornata con esito

## Diario

- 2026-10-06: Story creata, analisi iniziata
- 2026-10-06: Capito il "perché": il wrapper aggiunge complessità; usando `static` nel contratto + vendor trait diretto, PHPStan inferisce i tipi dal trait vendor (docblock `@return Ancestors<static, static>`) e il contratto è soddisfatto per covarianza di `static`.
- 2026-10-06: Xot (`BaseTreeModel`, `XotBaseTreeModel`) e Cms `BaseTreeModel` usano il
  trait vendor; wrapper cancellato. Cms `Menu` in mano a `codex`: ha un errore di
  sintassi alla riga 81 (`implements ...Contract<Menu>`) che blocca il caricamento
  della classe. I 4 modelli NON sono ancora tutti verificati a runtime.
- 2026-10-06: `php artisan` parte (boot ok), ma PHPStan Level 10 e Pest dei moduli
  non sono stati rieseguiti: Pest Xot si ferma sul tema `BsItalia` mancante in test.

## Note tecniche

Il pattern chiave: in PHP 8.0+, `static` come return type in interface è supportato. Il vendor trait ha docblock `@return Ancestors<static, static>` che PHPStan usa per inferire i tipi. Se il contratto usa `static` (es. `@return Ancestors<static, static>`), la covarianza di `static` rende l'implementazione valida.