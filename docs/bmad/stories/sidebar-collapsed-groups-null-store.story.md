---
title: "Sidebar admin vuota al primo accesso: store collapsedGroups a null"
status: done
created: 2026-10-21
updated: 2026-10-21
module: Xot
supersedes_hypothesis_in: docs/bmad/stories/phpstan-docs-prompts-campaign.story.md
---

# Sidebar admin vuota al primo accesso: store collapsedGroups a null

## Sintomo

Dopo il login su `http://127.0.0.1:8000/admin`, la colonna di sinistra non mostra
i moduli. Restano visibili solo la dashboard. Nella console compaiono errori
Alpine ripetuti: `Cannot read properties of null (reading 'includes')`.

## Obiettivo del menu

Il gruppo "Modules" elenca un link per ogni modulo attivo, generato da
`GetModulesNavigationItems` e aggiunto con `navigationItems()` in
`XotBaseMainPanelProvider`. Il suo scopo e' dare accesso rapido alla
sezione admin di ogni modulo. Se il gruppo non si apre, l'accesso e' perso
anche se i link esistono nel DOM.

## Causa radice (verificata nel browser)

Lo store `sidebar` di Filament 5.10.3 (`vendor/filament/filament/resources/js/stores/sidebar.js`)
persiste `collapsedGroups` con default `null`:

```js
collapsedGroups: window.Alpine.$persist(null).as('filament:sidebar:collapsed_groups'),
```

`groupIsCollapsed(group)` e `toggleCollapsedGroup(group)` chiamano
`this.collapsedGroups.includes(group)` senza controllo. Al primo accesso di un
browser la chiave non esiste in localStorage, quindi il valore resta `null` e
ogni gruppo, incluso "Modules", lancia un TypeError. Alpine interrompe
l'inizializzazione della sidebar e i gruppi restano nascosti.

Prova sperimentale, stessa macchina e stesso account:

| Condizione | Voci visibili | Errori JS |
|---|---|---|
| Browser nuovo, nessun seed | 1 di 19 | 4 |
| Chiave impostata a `[]` prima del caricamento | 19 di 19 | 0 |

## Correzione

Script in `<head>` che imposta la chiave a `[]` solo se manca o vale `null`,
senza toccare preferenze gia' valide. Implementato in
`Modules/Xot/app/Actions/Filament/GetSidebarStateScriptAction.php` e registrato
come render hook `PanelsRenderHook::HEAD_END` in:

- `Modules/Xot/app/Providers/Filament/XotBasePanelProvider.php` (38 provider figli)
- `Modules/Xot/app/Providers/Filament/XotBaseMainPanelProvider.php` (pannello `/admin`, `app/Providers/Filament/AdminPanelProvider.php`)

Non si modifica `vendor/`. Il fix sta nel progetto, quindi sopravvive a `composer update`.

## Ipotesi scartata

La story `phpstan-docs-prompts-campaign.story.md` (sezione "Errore front-end
confermato") attribuiva l'errore a un `label` nullo causato da moduli senza
`config/config.php`. Il `label: null` che compare nei log e' il gruppo senza
etichetta della dashboard, comportamento normale. Il vero difetto e' lo store.

## Verifica

- `php -l` sui tre file PHP modificati: nessun errore di sintassi.
- Login in browser con un contesto pulito (nessun seed): vedi risultato nel
  report di chiusura di questa story.
- Il server locale e' sotto carico elevato (load average 40-50, altri run
  PHPStan in parallelo): i tempi di risposta sono alti, non c'e' un errore applicativo.

## Limiti

- Il fix dipende dalla chiave `filament:sidebar:collapsed_groups`. Se Filament
  la rinomina in un aggiornamento, lo script va aggiornato.
- Se il browser blocca localStorage (modalita' privata), lo store non e'
  persistente e il bug non si presenta.
