---
title: "ADR 0011 — @contract docblock reference su Actions"
type: decision
status: accepted
created: 2026-11-23
updated: 2026-11-23
issues:
  - "https://github.com/laraxot/module_xot_fila5/issues/ADR-0011"
---

# ADR 0011: @contract docblock reference su Actions

## Contesto

Le `Actions` in `Modules/*/app/Actions/` sono classi che contengono logica applicativa da invocare (execute). Molte Action scrivono dati o chiamano servizi esterni, ma mancava una convenzione documentale per riferirsi al contratto comportamentale.

## Decisione

**Ogni Action che scrive dati o chiama servizi esterni deve includere un docblock `@contract` che fa riferimento al file del contratto comportamentale.**

Il docblock segue questo pattern:
```php
/**
 * @see docs/contracts/{NomeAction}.md
 * @param string $paramName La descrizione del parametro
 * @return void
 */
class SaveTicketAction
```

Se l'Action non scrive dati né chiama servizi esterni, non è necessaria la reference `@contract`.

## Alternative scartate

- Aggiungere `@contract` a tutte le Action: over-engineering per Action che sono solo wrapper
- Creare un contratto formale per ogni Action: introduce boilerplate inutile
- Documentare inline solo: non riutilizzabile e perdibile nei refactoring

## Conseguenze

### Positive
- Documentazione automatica: `@contract` punta a file markdown viventi
- Caccia all'ignorato: action senza `@contract` viene segnalata dai test
- Coerenza con il pattern `Actions over Services` di questo progetto

### Negative
- Richiede la creazione o la verifica di file `docs/contracts/{NomeAction}.md`
- Alcune Action esistenti dovranno essere aggiornate con la nuova convenzione

## Cross-link

- `laravel/Modules/*/app/Actions/*.php` — tutte le Action del progetto
- `docs/contracts/` — directory dei contratti comportamentali
- `docs/wiki/rules/actions-over-services.md` — filosofia Actions vs Services
- `laravel/Modules/Xot/tests/Unit/Docs/PackagesHaveContractsAndAdrTest.php` — test di conformità
- `laravel/Modules/Xot/tests/Unit/Docs/ActionContractsAreCompleteTest.php` — test completamento contratti