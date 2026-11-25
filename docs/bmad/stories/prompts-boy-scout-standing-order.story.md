---
title: "Boy scout prompt — allineamento standing order"
type: story
module: Xot
status: review
created: 2026-11-24
updated: 2026-11-24
tags: [bmad, prompts, boy-scout, standing-order, flock, filament5, second-brain, source-first, pest-gate]
qmd: "prompts boy scout standing order flock phpstan source-first pest gate public_html filament schema misura iniziale"
related:
  - ./prompts-standing-order-alignment-phpstan-wave.story.md
  - ./docs-prompts-reorganization.story.md
  - ../../../../../../bashscripts/docs/prompts/README.md
---

# prompts-boy-scout-standing-order

## Scopo

Lane docs-guardian: boy-scout sui prompt prioritari (ordine random) senza mass-delete; allineare flock path, Filament 5 Schema, Pest/dati sacri, e togliere riferimenti a tool assenti.

## Fase

`review`

## Lock

`prompts` via `bashscripts/lock/lock.sh prompts`

## Perimetro toccato

| File | Azione |
|---|---|
| `04-swarm-multi-agente.md` | flock path canonico + max-3 in lane |
| `99-closing-ritual.md` | flock/max-3 in verifica reale |
| `36-quality-gates.md` | flock path sotto regole PHPStan |
| `43-audit-modulo.md` | label link obsolete + standing order + flock |
| `39-boy-scout.md` | `/tmp` → `storage/phpstan-runs` + Pest |
| `40-ponytail-audit.md` | standing order + gate se fix |
| `00-master-prompt.md` | anti-thrashing flock max-3 |
| `03-bmad.md` | standing order one-liner |
| `05-second-brain.md` | rimuove `wiki-hygiene.py` assente |
| `24-filament.md` / `28-setting-page.md` / `37-phpstan.md` | Filament 5 Schema vs Form legacy |
| `README.md` / `index.md` | SSoT vs wiki/.agents prompts; related story |
<<<<<<< .merge_file_c0DTr0
| `98`, `44`, `10`, `15`, `17`, `51`, `54`, `56`, `11`, `53`, `16` | wave debito: BMAD path, flock max-3, Filament5 Schema, Pest/host, public_html, link 00-master |
=======
>>>>>>> .merge_file_hFt8VQ

## Criteri

- [x] Nessun mass-delete
- [x] Path flock unico: `laravel/storage/phpstan-runs/phpstan-gate.lock`
- [x] Pest / host `10.100.200.15` / dati sacri richiamati nei prioritari
- [x] Filament 5: `form(Schema)` → `Schemas\*Form::getFormSchema`
- [x] Pest skip: solo markdown (nessun PHP app toccato)
- [x] `qmd update` (lane chiusura)

## Coordinamento

| Quando | Agente | Scope | Nota |
|---|---|---|---|
| 2026-11-24 | docs-guardian | bashscripts/docs/prompts prioritari | lock `prompts`; shuffle swarm→closing→qg→audit→phpstan→boy→pony→master→sb→bmad |
<<<<<<< .merge_file_c0DTr0
| 2026-11-24 | docs-guardian | prompts 10/11/15/16/17/44/51/53/54/56/98 | lock `prompts`; wave debito legacy `docs/stories/` + flock/Filament5/Pest |

## Debito residuo

- Spot-check residui `docs/stories/` fuori da questa wave (altri prompt non in lista).
- `wiki-hygiene.py` citato in story storiche; non ripristinato (assente).
- `bashscripts/ai/wiki/prompts` e `.agents/prompts` restano skill design separate (nessuna fusione).
- `44` e `98` restano lunghi: spezzarli solo se emerge un secondo tema reale.

## Diario

### 2026-11-24 (wave debito legacy)

Boy-scout su 11 prompt non prioritari (shuffle: 98→44→10→15→17→51→54→56→11→53→16). Allineati: BMAD `docs/bmad/stories/` primario; flock `laravel/storage/phpstan-runs/phpstan-gate.lock` max-3; Filament 5 `form(Schema)`→`Schemas\*Form`; Pest + host `10.100.200.15`; `public_html`; `mixed` → link `00-master`; no seconda copia. Nessun `analyse Modules`; Pest skip (solo markdown).

### 2026-11-24 (wave source-first / lessico baseline)

Boy-scout mirato (max 8 file): inventario OK (64 `NN-*`, no date/MAIUSCOLE, FM+qmd ovunque). Allineato lessico **misura iniziale** vs baseline PHPStan vietata in `02`, `09`, `36`, `39`, `44`; `09` ha checklist BMAD + second brain + source-first + Pest gate + ECC; README sezione Inventario. Lock `prompts`. Nessun PHP → Pest skip documentato.
=======

## Debito residuo

- Prompt non prioritari ancora con `docs/stories/` primario (`10`, `15`, `17`, `44`, `98`) — vedi story alignment precedente.
- `wiki-hygiene.py` citato in story storiche; non ripristinato (assente).
- `bashscripts/ai/wiki/prompts` e `.agents/prompts` restano skill design separate (nessuna fusione).
>>>>>>> .merge_file_hFt8VQ
