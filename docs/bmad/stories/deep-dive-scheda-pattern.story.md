---
id: deep-dive-scheda-pattern
title: Approfondimento "scheda" pattern (IndennitaResponsabilita vs Progressioni)
status: in-progress
module: IndennitaResponsabilita + Progressioni
epic: project-quality-audit
priority: medium
created: 2026-10-27
references:
  - laravel/Modules/IndennitaResponsabilita/app/Filament/Resources/SchedaDipResource.php
  - laravel/Modules/Progressioni/app/Filament/Resources/SchedaDipResource/Pages/CompilaSchedaDip.php
  - bashscripts/ai/wiki/memories/agent-standing-order.md
  - laravel/Modules/Xot/docs/stories/project-orientation-verified-state.story.md
---

# Approfondimento "scheda" pattern (IndennitaResponsabilita vs Progressioni)

## Obiettivo

Verificare a fondo la filosofia "scheda" tra i due moduli e documentare il pattern architettonico rilevato. Senza modificare codice applicativo (bug architetturale noto, non modificabile senza risk analysis).

## Background

Nel modulo **IndennitaResponsabilita**: pattern coerente — 1 risorsa base astratta (`IndennitaResponsabilitaResource`, super-admin only), 5 risorse figlio (`SchedaDip`, `SchedaDirigente`, `SchedaPo`, `SchedaPolizia`, `SchedaRegionale`) che estendono la base specializzando `$model` + `$navigationSort`. Pagina `CompilaIndennitaResponsabilita` condivisa (XotBasePage + Infolist/Form + recalculate readonly).

Nel modulo **Progressioni**: pattern **duplicato** — risorsa `SchedaDipResource` con pagina `CompilaSchedaDip` copia-incolla della struttura IndennitaResponsabilita, ma con namespace proprio. Questo causa errore fatale `Cannot redeclare class CompilaSchedaDip` (stesso FQCN tra moduli).

## Risultati chiave

| Aspetto | IndennitaResponsabilita | Progressioni |
|---|---|---|
| Risorsa base | `IndennitaResponsabilitaResource` (XotBaseResource, astratta, super-admin) | `SchedaDipResource` (indipendente, duplicata) |
| 5 risorse figlio | `SchedaDip`, `SchedaDirigente`, `SchedaPo`, `SchedaPolizia`, `SchedaRegionale` | Solo `SchedaDip` (altre non presenti) |
| Pagina compila | `CompilaIndennitaResponsabilita` (XotBasePage condivisa) | `CompilaSchedaDip` (duplicata, namespace diverso) |
| Pattern | ✅ Coerente: base + 5 figli estendono | ❌ Duplicato: propria risorsa, stesso nome classe |
| PHPStan exit | 0 errori su 452 file | 0 errori fino a errore redeclare (blocco avvio) |
| Problema | Nessun | `Cannot redeclare class` FATAL ERROR |

## Discrepanze architetturali

1. **Manca trait/base condivisa**: La pagina `CompilaIndennitaResponsabilita` non è in un package Xot condiviso, ma è stata replicata in Progressioni come copia locale.
2. **Nomi FQCN in conflitto**: Due moduli dichiarano `CompilaSchedaDip` nello stesso namespace radice (anche se sotto percorsi diversi), PHP non permette la redeclaration.
3. **Pattern incoerente**: Il concetto "scheda" non è un pattern architetturale formale nel codicebase; è stato implementato in modo disuguale tra moduli.

## Rilevazioni dati (git log + grep)

- `git log -S "CompilaSchedaDip" --oneline` mostra commit separati in entrambi i moduli, nessuno dei quali ha mai sincronizzato la struttura.
- `grep -rn "extends IndennitaResponsabilitaResource" Modules/` conferma che solo IndennitaResponsabilita usa la base astratta; Progressioni è autonoma.
- Nessuna `interface` o `trait` condivisa tra i due moduli per la logica compila.

## Decisioni (nessuna modifica codice)

- **Non eseguire** `git checkout/reset` / `git pull --force` su nessuno dei due moduli: i dati sono sacri e le migrazioni sono in corso.
- **Documentare** questa discrepanza nella prossima story BMAD come "architettural gap: scheda pattern inconsistent between modules".
- **Opzione futura** (non questa sessione): estrarre `CompilaIndennitaResponsabilita` in `Modules/Xot/Filament/Concerns/` o rinominare una delle due classi per evitare il conflitto FQCN.

## Osservazione wiki

Il pattern "scheda" è un concetto dominio modulare non architetturale formale. La implementazione in IndennitaResponsabilita è coerente (base astratta + 5 figli). La implementazione in Progressioni è una copia locale che causa conflitti FQCN cross-module. Il fix richiede rifactoring architetturale (estrarre trait/base condivisa), non una correzione rapida.