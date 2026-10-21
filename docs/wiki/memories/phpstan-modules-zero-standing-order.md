---
title: "PHPStan Modules a zero — ordine permanente"
type: memory
module: Xot
status: active
created: 2026-10-20
updated: 2026-10-20
qmd: "phpstan analyse Modules zero ordine permanente senza conferma catena source fix swarm bmad docs prompts boy scout turn non banale"
related:
  - ./phpstan-single-neon-config.md
  - ./index.md
  - ../../bmad/decision-log.md
  - ../../../../../../bashscripts/docs/prompts/00-start.md
  - ../../../../../../bashscripts/docs/prompts/11-phpstan.md
---

# PHPStan `Modules` a zero — ordine permanente

## Scopo e perche'

Il monorepo ha **un** gate statico condiviso da umano, CI e swarm. L'ordine
permanente evita di trattare PHPStan come task opzionale: ogni sessione che
tocca qualita' misura o ripara verso zero **senza chiedere conferma**, perche'
altre sessioni modificano lo stesso tree in parallelo e un "0" letto in chat o
in Hindsight non e' prova del presente.

## Catena (sempre, stesso ordine)

1. **PHPStan** — `cd laravel && ./vendor/bin/phpstan analyse Modules` (lane: perimetro assegnato; coordinatore: `Modules` intero a swarm fermo).
2. **Sorgente** — scopo, chiamanti, causa radice; mai ignore, baseline o neon alternativo.
3. **Swarm** — scope disgiunti se il perimetro e' ampio; ordine random solo tra task indipendenti.
4. **BMAD + second brain** — story owner, Hindsight/QMD (Hindsight down non blocca).
5. **Docs** — `laravel/Modules/<M>/docs/`, `laravel/Themes/<T>/docs/`.
6. **Prompt** — correggi il canonico in `bashscripts/docs/prompts/` se un fatto verificato lo smentisce.
7. **A zero → boy scout** — Services→Actions, miglioramenti locali; lo zero statico non chiude il lavoro.

## Vittoria verificata

Contano **entrambe**: json `totals.file_errors` e `totals.errors` a `0`, piu'
banner `[OK] No errors` nello stesso run del coordinatore.

## Collegamenti

- Prompt router: [00-start.md](../../../../../bashscripts/docs/prompts/00-start.md#ordine-permanente-dellutente)
- Metodo PHPStan: [11-phpstan.md](../../../../../bashscripts/docs/prompts/11-phpstan.md)
- Neon unico: [phpstan-single-neon-config](./phpstan-single-neon-config.md)
- Decisione Xot: [decision-log](../../bmad/decision-log.md) (2026-10-20)
