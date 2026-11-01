---
title: "INDEX"
type: index
tags: [documentation, xot, filament, base-resource]
created: 2026-10-15
updated: 2026-10-28
qmd: "xot modulo docs indice canonico base resource filament phpstan"
issues: []
discussions: []
status: active
---

# Xot: documentazione canonica

Indice aggiornato 2026-10-28. Un solo file canonico per tema; i duplicati sono
marcati `superseded` o `stale`, non cancellati (regola BMAD).

## Canonici (SSoT)

| Tema | File | Stato |
|------|------|-------|
| Base Resource (contratto Filament Xot) | [xot-base-resource.md](./filament/resources/xot-base-resource.md) | active |
| PHPStan stato vivo | [bmad/phpstan-status.md](./bmad/phpstan-status.md) | active |
| ECC per Codex e integrazione PTVX | [ecc/00-index.md](./ecc/00-index.md) | active |

## Storie correlate

- [Configurazione ECC e gate PHPStan](./bmad/stories/ecc-codex-plugin-setup.story.md)
- [Pagine operative e scrittura di `.env` riservate al super-admin](./stories/superadmin-only-operational-pages.story.md)
- [Niente testi fissi nelle Blade (it, en, de, es)](./stories/blade-i18n-no-hardcoded-text.story.md)
- [IDColumn, ancora di riga e ritorno alla lista (`return_to`)](./stories/idcolumn-record-anchor-return-to.story.md)

## Non toccare

- `phpstan.neon` (sacro, solo utente).
