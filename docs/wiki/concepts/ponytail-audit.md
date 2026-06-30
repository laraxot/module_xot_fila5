# Ponytail audit — Xot

**Run:** 2026-06-30

Documento canonico: [ponytail-audit-over-engineering.md](../../ponytail-audit-over-engineering.md)

## Vincoli

- `MetatagData`, `XotData` — **non** DTO passivi
- `spatie/laravel-permission` — resta in `composer.json`
- `helpers/Helper.php` (minuscolo) — autoload `files`

## Top tagli

| Tag | Cosa | Righe ~ |
|-----|------|---------|
| `delete` | `ArtisanService` stack, `RouteDynService` | ~1k |
| `delete` | `Actions/Array/` duplicato, contratti morti | ~700 |
| `shrink` | API morta `MetatagData`, `Helper.php` monolite | fase 2 |

Vedi [xotdata-metatagdata-not-simple-dto.md](../reference/xotdata-metatagdata-not-simple-dto.md).
