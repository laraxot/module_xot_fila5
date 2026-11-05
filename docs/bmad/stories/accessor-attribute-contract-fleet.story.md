---
title: "Contratto uniforme per gli accessor Eloquent legacy"
type: story
status: in-progress
created: 2026-11-05
updated: 2026-11-05
tags: [bmad, eloquent, accessor, mutator, audit, quality]
qmd: "Laravel Eloquent legacy get Attribute public value typed accessor delegates public pure getX twin inventory Modules Themes"
related:
  - ../accessor-attribute-contract-audit.md
  - ../../../../Sigma/docs/bmad/accessor-twin-method.md
  - ../../../../Ptv/docs/bmad/accessor-twin-method.md
---
# Contratto uniforme per gli accessor Eloquent legacy

## Contesto

`EnteMatrAnnoMutator::getGgParttimevertAnnoAttribute()` esegue direttamente lettura del database, calcolo e persistenza; non accetta `$value`, è `protected` e non delega al gemello `getGgParttimevertAnno()`. Questo contraddice il contratto accessor/gemello documentato e rende il comportamento incoerente con gli altri getter usati da `FieldRefreshAction`.

## Contratto da verificare sul codice

Per gli accessor Eloquent legacy `get{Campo}Attribute(?T $value): ?T` adottare la forma pubblica richiesta dal progetto. L'accessor deve trattare `$value` come cache persistita e delegare il calcolo a `public get{Campo}(): ?T`; il gemello contiene il calcolo di dominio e non persiste. Le eccezioni devono essere identificate per semantica (relazioni, computed accessor senza colonna, getter framework, accessor `Attribute` moderno), non dedotte soltanto dal nome.

## Acceptance criteria

- [ ] Inventariare i metodi Eloquent `get*Attribute` in `laravel/Modules/` e `laravel/Themes/`, distinguendo accessor legacy, accessor moderni, metodi omonimi non Eloquent ed eccezioni motivate.
- [ ] Salvare la lista completa dei metodi fuori contratto in un audit Markdown owner Xot con frontmatter, QMD e link dai documenti canonici di modulo interessati.
- [ ] Correggere `EnteMatrAnnoMutator::getGgParttimevertAnnoAttribute()`: visibilità e parametro conformi; delega a `getGgParttimevertAnno()`; calcolo puro separato dalla persistenza.
- [ ] Correggere tutti i casi confermati dall'audit oppure documentare per ciascuno l'eccezione tecnica verificata.
- [ ] Allineare la regola canonica, il controllo automatico e i test alla semantica approvata dal codice e dalla richiesta utente.
- [ ] Eseguire Pest verde e PHPStan sullo scope modificato; riportare conteggi e ogni blocco reale.
- [ ] Aggiornare il second brain e completare la story solo dopo verifiche reali.

## Task

- [ ] Ricostruire il contratto Eloquent e la semantica delle implementazioni esistenti.
- [ ] Generare la lista verificata dei metodi non conformi per modulo/tema.
- [ ] Implementare le correzioni mantenendo lock e ownership per modulo.
- [ ] Aggiornare test, regola, indici e report d'audit.
- [ ] Eseguire i gate richiesti e aggiornare `docs/sprint-status.yaml` con l'esito.

## Riferimenti iniziali

- `laravel/Modules/Sigma/app/Models/Traits/Mutators/EnteMatrAnnoMutator.php`
- `laravel/Modules/Xot/app/Console/Commands/CheckAccessorTwinsCommand.php`
- `laravel/Modules/Sigma/docs/bmad/accessor-twin-method.md`
- `laravel/Modules/Ptv/docs/bmad/accessor-twin-method.md`
