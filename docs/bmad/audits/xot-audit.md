---
title: "Audit approfondito modulo Xot"
type: audit
status: review
updated: 2026-11-16
module: Xot
qmd: "audit approfondito Xot inventario PHPStan Pest policy Filament Actions"
---

# Audit approfondito — Xot

## Metodo

Source-first (2026-11-16): inventario filesystem, `rg` su policy/marker/label,
lettura purpose esistente, PHPStan globale Modules già a 0 errori. Nessuna UI
inventata. Pest dichiarato solo se eseguito.

## Inventario misurato

| Area | Conteggio |
|---|---:|
| PHP in `app/` | 602 |
| Test PHP | 329 |
| Models (`app/Models/*.php`) | 25 |
| Policy files (approx) | 26 |
| Resource Filament | 7 |
| Actions | 238 |
| Services | 2 |
| Migration | 9 |
| Lang IT files | 298 |
| Marker conflitto | 0 |
| Occorrenze `return true` in Policy | 2 |
| Ratio test/app | 0.55 |

## Scopo (da docs esistenti / codice)

## Lo scopo in una frase **Xot è il fondamento architetturale dell'intera piattaforma: fornisce classi base (`XotBaseModel`, `XotBaseResource`, `XotBasePage`), contract per la type-safety, e pattern riutilizzabili che tutti gli altri 17 moduli estendono.** Nessun modulo estende Filament direttamente. Si estende `XotBaseResource`, `XotBaseListRecords`, `XotBaseWidget`, `XotBaseServiceProvider`, `XotBaseMigration`. Questa è **la** regola fondamentale del progetto, e Xot è il posto dove vive.

## Finding preliminari (da inventario)

- **P1** `2` file sotto `app/Services/`: verificare migrazione ad Actions Queueable (convenzione PTVX).

## Finding approfonditi (codice)

- **P0** `RouteService` (+ `.bak`) residuo anti-pattern; alias Artisan ModuleCommandHandler.
- **P1** Test orfani su Services eliminati (ThemeService/UrlService).
- **P2** Inconsistenza QueueableAction su molte Actions.
- SSoT ok: `AssetAction` + `Application::publicPath` → `public_html`.

## Gate

```bash
cd laravel
php -d memory_limit=2G ./vendor/bin/phpstan analyse Modules/Xot
# Pest solo fuori da 10.100.200.15 e con DB testing raggiungibile
./vendor/bin/pest Modules/Xot/tests --no-coverage
```

PHPStan `Modules` (2026-11-16): **0 errori** sul tree completo.

## Piano

Vedi [piano-miglioramento.md](../piano-miglioramento.md).

## Riferimenti

- [audit.md](../audit.md)
- [ECC](../../ecc/xot-ecc-audit.md)
- [Story](../stories/module-bmad-audit.story.md)
