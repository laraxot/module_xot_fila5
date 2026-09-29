---
type: story
tags: [livewire, filament]
issues: []
discussions: []
id: Xot/lw2fw-01
title: "Eliminare Modules/*/app/Http/Livewire — canon Framework: Filament widget"
epic: "livewire-to-filament"
story: "lw2fw-01"
slug: lw2fw-01
status: in_progress
module: Xot
priority: P1
created: 2026-09-29
updated: 2026-09-29
related:
  - ../../../.../User/app/Http/Livewire
  - ../../../.../Job/app/Http/Livewire
  - ../../../.../UI/app/Http/Livewire
  - ../../../.../Lang/app/Http/Livewire
  - ../../../.../Media/app/Http/Livewire
  - ../../../.../Ptv/app/Http/Livewire
  - ../../../.../Xot/app/Http/Livewire
  - ../../../../../bashscripts/ai/wiki/rules/11-forms/no-module-livewire-use-filament-widgets.md
  - ../../../../User/docs/bmad/livewire-inventory.md
qmd: "eliminare Modules app Http Livewire convertire Filament widget XotBaseWidget XotBaseSchemaWidget refactor"
description: "Rimozione totale delle directory Modules/*/app/Http/Livewire (e User/app/Livewire): le classi già convertite in widget Filament vengono ritirate (gemelli SSoT), quelle ancora vive (FO/vista) vengono ritirate se senza punto di montaggio, e viene smontata la registrazione automatica RegisterLivewireComponentsAction."
---

# Story Xot: Eliminare Modules/*/app/Http/Livewire

Status: in_progress

## Story

Come maintainer,
voglio che NON esista piu' alcuna directory `Modules/*/app/Http/Livewire/`
perché al posto dei componenti Livewire usiamo i Filament widget,
così l'autodiscovery/alias degli Http\Livewire non possono resuscitare codice morto.

(La direttiva non elimina Livewire stesso: un widget Filament È un Livewire component
via `XotBaseWidget`/`XotBaseSchemaWidget`.)

## Acceptance Criteria

- [x] Nessuna directory `Modules/*/app/Http/Livewire/` (e `Modules/User/app/Livewire/`) nel tree (lotto B, 2026-09-29; guardia `Xot/tests/Unit/NoLivewireDirectoriesInModulesTest.php`).
- [ ] Le classi con gemello widget Filament sono rimosse (non spostate).
- [ ] Classi FO senza punto di montaggio vivo sono ritirate (debito annotato per `@livewire('edit-firma')` in blade Performance legacy irraggiungibili).
- [x] `RegisterLivewireComponentsAction` rimosso (lotto B: grep su app/config/Modules/*/app = 0 occorrenze, gia' assente) e non più invocato in `XotBaseServiceProvider`.
- [ ] Riferimenti in test/config aggiornati (8 file test + `config/user-filament.php`).
- [ ] Pest verde, PHPStan level max 0 errori, Pint pulito.
- [ ] Regressione nota da annotare: redirect ruolo-based (`getRedirectUrl`) di `Http\Livewire\Auth\Login` non ha equivalente in `LoginWidget` (ora: `route('dashboard')` o `/{locale}`).

## Notes

- SSoT inventario: `laravel/Modules/User/docs/bmad/livewire-inventory.md`.
- 18 moduli hanno la dir; 26 file .php in 6 moduli (User 14, Job 4, UI 2, Lang 2, Media 1, Ptv 2, Xot 1); gli altri 12 solo `.gitkeep`/`_components.json`.
- `Modules/Performance/routes/web.php` è vuoto: le viste legacy che montano `@livewire('edit-firma')` sono irraggiungibili → ritiro `Ptv/EditFirma` sicuro.
- Blocker concorrenza: PID 5418 può sovrascrivere file da snapshot obsoleti (`docs/chat/multi-agent-standing-coordination.md`); utente ha autorizzato a procedere con verifica `git status` dopo ogni lotto.

## Lotto B (2026-09-29, claude-lotto-b)

- Dir residue: solo `User/app/Http/Livewire` (con `_components.json` = `[]`) e `User/app/Livewire` (Logout.php, RegistrationForm.to_widget); le altre 12 dir erano gia' sparite. `git rm -r --cached` + `rm` fatti; 0 file tracciati sotto quei path.
- Consumer di `_components.json`: solo `GetComponentsAction`/`FileAction::getComponents`, chiamati per `Console/Commands` e `View/Components`; nessuno per Livewire, quindi nessun consumer da correggere. Nota: `GetComponentsAction` ricrea la dir se manca sotto `Modules/`, va tenuto lontano da path Livewire.
- Registrazione automatica: `RegisterLivewireComponentsAction` e' assente e `XotBaseServiceProvider` non registra Http/Livewire.
- `Xot/tests/ModuleRemainingCoverage.php`: tolto `Http/Livewire` dall'elenco dir. `User/routes/web_tall.php`: rimosso commento morto `->namespace(...Livewire...)`.
- Guardia: `Xot/tests/Unit/NoLivewireDirectoriesInModulesTest.php`.
- Aperto: `config/user-filament.php:115-116` (chiave `livewire` con path Http/Livewire) era lockato da `opencode-lw2fw` (task lw2fw-final): non toccato, da fare a lock rilasciato. AC "Riferimenti in test/config" resta aperta.
- Osservazione: alle 09:54:14 un'operazione git di un peer ha ripristinato nel working tree le dir Livewire (mtime preservati); rimosse di nuovo, stabili dopo 45s.
