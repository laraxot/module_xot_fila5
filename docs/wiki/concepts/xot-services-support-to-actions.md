---
title: "Xot Services/Support → Actions migration"
module: "Xot"
type: concept
tags: [xot, services, support, actions]
created: 2026-07-14
updated: 2026-07-14
qmd: "xot services support to actions"
related:
  - "./eloquent-magic-properties-rule.md"
---
# Xot Services/Support → Actions migration

Deleted dead `app/Services/` and `app/Support/` files that had zero callers or were already replaced by Actions/Adapters.

## Deleted

| Legacy file | Reason |
|-------------|--------|
| `Services/ArtisanService.php` | Untracked duplicate of `Actions/ArtisanAction` |
| `Services/Artisan/CommandRegistry.php` | Untracked, zero callers |
| `Services/Artisan/Handlers/*` (9 files) | Untracked, zero callers, logic in `ArtisanAction::act()` |
| `Services/ArrayService.php` | Untracked, zero callers |
| `Services/ConfigService.php` | Tracked, zero callers |
| `Services/ContextCompressor.php` | Untracked, zero callers |
| `Services/ModuleService.php` | Tracked, zero callers |
| `Services/RouteDynService.php` | Untracked, zero callers |
| `Services/RouteService.php` | Tracked, only caller (`MorphMapConfigResolver`) switched to global `inAdmin()` helper |
| `Services/ThemeService.php` | Tracked, already replaced by `Actions/Theme/*` |
| `Services/UrlService.php` | Tracked, already replaced by `Actions/Url/IsValidUrlAction` |
| `Services/XotService.php` | Tracked, zero callers |
| `Services/Translators/*` (6 files) | Tracked, empty stubs, zero callers |
| `Services/Trend/Adapters/*` (4 files) | Tracked, zero callers |
| `Services/trend.test` / `Trend.test` | Untracked/tracked orphaned fixtures, not real tests |
| `Support/MorphToOneRelationSupport.php` | Tracked, already replaced by `Actions/Model/CreateMorphToOneRelatedModelAction` |
| `Support/PaDesignColors.php` | Tracked, already replaced by `Actions/Design/GetPaFilamentPaletteAction` |
| `Support/PanelModuleResolver.php` | Tracked, already replaced by `Adapters/Filament/PanelModuleAdapter` |
| `Support/PanelModuleSupport.php` | Tracked, dead duplicate |
| `Support/PdfBuilderAdapter.php` | Tracked, already replaced by `Adapters/PdfBuilderAdapter` |

## Updated callers

| File | Change |
|------|--------|
| `Modules/Tenant/app/Services/Config/Resolvers/MorphMapConfigResolver.php` | `RouteService::inAdmin()` → `inAdmin()` |
| `Modules/Xot/tests/Unit/Services/ArtisanServiceTest.php` | `ArtisanService::act` → `ArtisanAction::act` |
| `Modules/Notify/tests/Unit/Actions/NotifyTheme/Attachment/PdfTest.php` | assertion updated for `HtmlAction` import |

## Quality gates

- **phpstan**: pre-existing 58 errors, none introduced by this change
- **pest**: pre-existing failures in unrelated tests (Array, Cast, Model, Query, etc.)
- **phpmd**: phar crashes on codebase (pre-existing)
- **phpinsights**: CLI broken (pre-existing)
