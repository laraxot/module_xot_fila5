# BMAD: Livewire-to-Filament Conversion

## Purpose

Eliminare completamente le directory `app/Http/Livewire/` da tutti i moduli Laraxot e
convertire i componenti non ancora migrati in Filament widget (`XotBaseSchemaWidget`).
Utilizziamo Filament v5 widget al posto di Livewire component.

## Context

- Laravel 13 + Filament 5, architettura Laraxot modulare
- `registerXotLivewireComponents()` in `XotServiceProvider` è **disabilitato** (commentato debug)
- `RegisterLivewireComponentsAction` non è mai chiamato da nessun provider
- I componenti Livewire sono registrati SOLO via cache `_components.json` (stale)
- I Filament widget sono registrati via `Livewire::addComponent(WidgetClass::class)` in providers

## Components Inventory

### Already converted (widget esiste)
- **User**: LoginWidget, RegisterWidget, LogoutWidget, SocialLoginWidget,
  ForgotPasswordWidget, ResetPasswordWidget, PasswordResetConfirmWidget,
  PasswordExpiredWidget, PrivacyPolicyWidget, TermsOfServiceWidget,
  AuthLogoutWidget, Profile/DeleteAccountWidget, Profile/SuperAdminWidget,
  Team/TeamChangeWidget + others
- **Lang**: LanguageSwitcherWidget (replace Switcher + Change)
- **UI**: DarkModeSwitcherWidget (replace DarkModeSwitcher)
- **Ptv**: FirmaStabiReparWidget, FirmaValutatoreWidget

### Need conversion (no widget yet)
- **Media**: `Card/Video/Clip.php`
- **Job**: `Schedule/Status.php`, `Schedule/Crud.php`, `Job/Status.php`, `Broad.php`
- **UI**: `Toast.php`
- **Xot**: `XotBaseComponent.php` (abstract, nothing extends → dead code)

### Empty dirs (just delete)
Notify, Sigma, IndennitaCondizioniLavoro, Incentivi, Tenant, Activity,
Activity/Activity, Pdnd, Progressioni, IndennitaResponsabilita, Performance,
Rating, User

## Blade refs to update

| Current | Replace with |
|---|---|
| `@livewire('socialite.buttons')` | `@livewire(\\Modules\\User\\Filament\\Widgets\\Auth\\SocialLoginWidget::class)` |
| `@livewire('team.change')` | `@livewire(\\Modules\\User\\Filament\\Widgets\\Team\\TeamChangeWidget::class)` |
| `@livewire('profile.super-admin')` | `@livewire(\\Modules\\User\\Filament\\Widgets\\Profile\\SuperAdminWidget::class)` |
| `@livewire('nav.stabi-repar-anno')` | Dead — remove view or convert |
| `@livewire('edit-firma')` in Performance/Indennita views | Check if dead or convert |
| `@livewire('manage_lang_module')` in Xot views | Dead or convert |
| `@livewire('rate.single')`, `@livewire('rate_single')` | Dead or convert |
| `@livewire('test')` | Dead or convert |
| `@livewire('notifications')` | Standard Laravel — KEPT |
| `@livewire('switchable-team')` | Filament builtin — KEPT |

## Acceptance Criteria

1. Zero `app/Http/Livewire/` dirs in any module
2. Zero `_components.json` cache files in Livewire dirs
3. Zero `RegisterLivewireComponentsAction` references
4. Zero string-based `@livewire('alias')` refs (except Laravel/Filament builtins)
5. PHPStan level max passes on all affected modules
6. Pint code style passes

## Execution Order

1. Lock affected files
2. Create Filament widgets for unconverted components (parallel)
3. Update blade refs (parallel)
4. Update provider registrations (parallel)
5. Update/remove tests (parallel)
6. Delete Livewire dirs + cache files
7. PHPStan + pint verification

## Correzione 2026-09-29 (sessione Ptv/Lang/Media/UI, claude-ptv-agent)

Due affermazioni sopra sono verificate FALSE su disco, con evidenza puntuale:

1. **"`RegisterLivewireComponentsAction` non è mai chiamato da nessun provider" è falso.**
   `Modules/Xot/app/Providers/XotBaseServiceProvider.php:44` chiama
   `$this->registerLivewireComponents()` **incondizionatamente dentro `boot()`**, che a sua
   volta (riga 143) fa `app(RegisterLivewireComponentsAction::class)->execute($this->module_dir.'/../Http/Livewire', ...)`.
   Poiché `XotBaseServiceProvider` è la classe base di ogni ServiceProvider di modulo,
   questo significa che **ogni modulo** ri-scansiona la propria `Http/Livewire/` e
   registra via `Livewire::component($alias, $fqcn)` ad ogni boot — non è un meccanismo
   inerte. Il metodo realmente disabilitato (commentato, "Temporaneamente disabilitato per
   debug") è un ALTRO metodo con nome quasi identico:
   `Modules\Xot\Providers\XotServiceProvider::registerXotLivewireComponents()` (riga 299),
   che registra solo `ModulesOverviewWidget` per il modulo Xot — la doc ha confuso i due.
   Conseguenza pratica: `GetComponentsAction` (chiamata da `RegisterLivewireComponentsAction`)
   usa `_components.json` come cache **solo se il contenuto ha lo schema corrente**
   (`name`/`class`/`ns` tutti presenti e non vuoti) — altrimenti riscansiona il filesystem
   e riscrive il json. Una cache con lo schema corrente ma che referenzia una classe
   già cancellata **non viene invalidata automaticamente**: va vuotata a mano (`[]`) ad
   ogni ritiro di classe Http/Livewire, esattamente come fatto per Ptv/Lang/Media/UI in
   questa campagna.
2. **"Ptv: FirmaStabiReparWidget, FirmaValutatoreWidget" sotto "Already converted" è
   fuorviante.** Quei due widget non sono i gemelli di `Http\Livewire\EditFirma` e
   `Http\Livewire\Nav\StabiReparAnno` — sono widget preesistenti e non correlati.
   Il vero ritiro di `EditFirma`→`EditFirmaWidget` e `Nav\StabiReparAnno`→`StabiReparAnnoWidget`
   è avvenuto in questa sessione (2026-09-29), non prima. Story:
   `laravel/Modules/Ptv/docs/stories/12.1.retire-ptv-http-livewire.story.md`.
3. Di conseguenza anche le due righe della tabella "Blade refs to update" per
   `@livewire('nav.stabi-repar-anno')` ("Dead — remove view or convert") e
   `@livewire('edit-firma')` ("Check if dead or convert") erano sbagliate: **non erano
   morte**, avevano 15 chiamanti reali in 4 moduli (Ptv, IndennitaCondizioniLavoro,
   IndennitaResponsabilita, Performance), tutti ora convertiti a `@livewire(FQCN::class)`.
   Vedi anche la correzione gemella in `docs/bmad/stories/lw2fw-01.livewire-to-filament.story.md`
   sulla premessa "routes vuoto → irraggiungibile", che era la causa della sottostima.
