---
title: "Remediation PHPStan globale dei moduli"
status: in-progress
qmd: "phpstan Modules errori 23 source-first swarm BMAD"
---

# Story: remediation PHPStan globale dei moduli

## Obiettivo

Portare `cd laravel && ./vendor/bin/phpstan analyse Modules` a zero errori,
correggendo i contratti alla sorgente e preservando il comportamento di dominio.

## Acceptance criteria

- [ ] Gate globale PHPStan eseguito in una sola lane isolata, exit 0.
- [ ] Errori raggruppati per causa e corretti senza baseline, ignore o cast cosmetici.
- [ ] Test/gate Pest dello scope modificato eseguito oppure blocco documentato.
- [ ] QMD/second brain aggiornato e diff controllato.
- [ ] Commit tracciabile con soli file di questa story; sincronizzazione Git verificata.

## Evidenza iniziale

Il gate esclusivo del 2026-11-23 ha rilevato 23 errori su 8 file: numerici,
deprecated PhpSpreadsheet, chiavi array nullable, confronto nullo in mutator,
ritorno nullable nel mixin e assert già ristrette nel test FeatureFlags.

## Piano swarm

- Cluster Performance: assegnazione numerica di `importo_totale`.
- Cluster Ptv: foglio deprecated, chiavi array e confronto nullo nel mutator.
- Cluster Xot: export PhpSpreadsheet e ritorno nullable del PanelMixin.
- Cluster test Xot: assert ridondanti, preservando le verifiche comportamentali.

## Verifica

In attesa dei fix e del gate finale. Il risultato iniziale è stato salvato in
`/tmp/phpstan-current-unique/result.json`; nessun processo concorrente deve
essere usato come evidenza del gate.

## Riferimenti

- `laravel/phpstan.neon`
- `bashscripts/lock/`
- `laravel/Modules/Xot/docs/ecc/00-index.md`
- `bashscripts/ai/wiki/memories/source-first-before-fix.md`
