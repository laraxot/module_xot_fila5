---
title: SettingPage in tutti i 18 moduli
status: in-progress
module: Xot (owner della base), 11 moduli consumatori
created: 2026-11-04
updated: 2026-11-04
type: story
qmd: "SettingPage tutti i moduli 18 moduli BaseSettingPage ConfigData menu Filament"
repository: "https://github.com/provtv/base_ptv_fila5_mono"
related:
  - ../../stories/base-setting-page.story.md
  - ../../stories/module-setting-pages.epic.md
  - ../../../Notify/docs/bmad/stories/setting-page.story.md
---

# SettingPage in tutti i 18 moduli

## Fase BMAD

Build. Decisione presa dall'utente il 2026-11-04: la pagina Impostazioni va in tutti i moduli.
Questa story supera la sezione "Revisione 2026-11-04" dell'epic `module-setting-pages.epic.md`,
che proponeva di non crearla nei moduli senza impostazioni.

## Intento

Ogni modulo ha `app/Filament/Pages/SettingPage.php` estende `BaseSettingPage`, con la
`{Modulo}ConfigData` che la base richiede (`getConfigDataClass()` fa `Assert::notNull`, quindi
senza Data la pagina va in errore al primo `mount()`).

## Requisiti

1. Dieci moduli senza pagina ricevono: `SettingPage` (form vuoto), `{Modulo}ConfigData` (nessuna
   proprieta', solo `MakesFromTenantConfig`), `lang/{it,en}/setting.php` per navigazione e titolo.
2. Notify ha la pagina ma non la Data: si aggiunge `NotifyConfigData`. Bug esistente: senza
   Data la pagina non si apre.
3. Nessun campo con segreti. Sigma (password di default in `config/sigma.php`) e Pdnd (credenziali
   proxy) ottengono la pagina vuota: nessuna chiave viene esposta.
4. La Data non dichiara proprieta': cosi' il salvataggio non scrive chiavi nei file di config
   tenant condivisi (es. `xot.php`, letto da XotData). Un campo si aggiunge solo quando un
   valore cambia davvero nel tempo.
5. Guardia: `Xot/tests/Unit/Filament/Pages/EveryModuleHasSettingPageTest.php` fallisce se un
   modulo perde la pagina o la Data.

## Decisioni

| Decisione | Perche' |
|-----------|---------|
| Form vuoto invece di nessuna pagina | Richiesta esplicita dell'utente. Il rischio dell'epic (voce di menu senza campi) e' accettato. |
| Data senza proprieta' | Evita di scrivere chiavi nei file tenant condivisi. Il merge di `SaveTenantConfigAction` conserva le chiavi esistenti. |
| Lang con navigazione, titolo e azioni, senza `fields` | Il form non ha campi. `AutoLabelAction` legge le chiavi di navigazione e azioni. |
| Test per modulo + guardia in Xot | La regola "tutti i moduli" resta vera nel tempo solo se un test la controlla. |

## File

- Per modulo: `app/Datas/{Modulo}ConfigData.php`, `app/Filament/Pages/SettingPage.php`,
  `lang/it/setting.php`, `lang/en/setting.php`, `tests/Unit/Datas/{Modulo}ConfigDataTest.php`,
      `docs/bmad/stories/setting-page.story.md`.
- Xot: `tests/Unit/Filament/Pages/EveryModuleHasSettingPageTest.php`.

## Verifica

La verifica copre i 18 moduli: pagine `SettingPage`, Data risolvibili dalla convenzione della
base, traduzioni `it`/`en` e schema coerente con le proprietà della Data. Le Data vuote restano
senza campi impliciti (`anni`), evitando cambiamenti ai componenti condivisi e ai file tenant.

### Risultati

- PHP lint: nessun errore nei file PHP aggiunti o modificati.
- Pint: verde sui file `SettingPage` e Data.
- Pest: guardia e test Data dei moduli eseguiti insieme; esito finale da registrare dopo il run
  corrente.
- PHPStan: gate globale su 10.400/10.400 file, exit 0, `[OK] No errors`; report JSON con
  `totals.errors=0` e `totals.file_errors=0`.
- `php artisan --version`: Laravel Framework 13.38.0.
- QMD: indicizzazione da ripetere dopo questo riordino della story.

La correzione Activity che rimuoveva override incompatibili con gli hook `final` di
`XotBaseListRecords` è stata eseguita e verificata in
[`list-snapshots-table-hooks.story.md`](../../../Activity/docs/bmad/stories/list-snapshots-table-hooks.story.md).

### Decisioni verificate

- Le nuove Data sono vuote e usano `MakesFromTenantConfig`; non dichiarano default di anni né
  campi non visibili nel form.
- Notify conserva `EnvWidget` per le sole chiavi `.env` selezionate; credenziali e segreti non
  vengono copiati nella configurazione tenant.
- Sigma e Pdnd hanno schema vuoto; le loro chiavi tecniche e credenziali non sono esposte.
- Le pagine vuote sono una richiesta esplicita, non pagine di configurazione già pronte per
  valori ipotetici.
