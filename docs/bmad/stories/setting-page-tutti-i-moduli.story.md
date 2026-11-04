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
  - ./base-setting-page.story.md
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
  `docs/stories/setting-page.story.md`.
- Xot: `tests/Unit/Filament/Pages/EveryModuleHasSettingPageTest.php`.

## Verifica

La verifica strutturale copre 18 moduli: 18 pagine `SettingPage`, 18 Data risolvibili dalla
convenzione della base, traduzioni `it`/`en` e test dedicati. Le Data appena aggiunte sono
vuote, senza campi impliciti (`anni`) che cambino il comportamento di componenti condivisi.

- PHP lint: nessun errore nei file PHP aggiunti o modificati.
- Pint: OK sui file `SettingPage` e Data. Notify e' stato formattato dopo la migrazione.
- Pest mirato: un'esecuzione del guard e dei test Data aveva 76 test verdi / 123 assertion;
  dopo l'ultima modifica delle Data vuote, la nuova esecuzione e' bloccata in bootstrap da
  `Activity/.../ListSnapshots.php:34`, che dichiara `getTableColumns()` contro il metodo
  `final` di `XotBaseListRecords`. Il file e' modificato nel worktree e non appartiene a
  questa story.
- PHPStan mirato: bloccato dallo stesso fatal error nel caricamento dell'applicazione.
- QMD: `qmd update` completato; eseguire un nuovo aggiornamento dopo ogni modifica docs finale.

## Debito gate

La story resta `in-progress` finche' il test guard e i test Data non possono essere rieseguiti
con Pest verde dopo la correzione del fatal bootstrap nel worktree. Sprint root `docs/sprint-status.yaml`
ha un lock attivo preesistente; questa story in Xot e' il tracking BMAD owner disponibile.

## Verifica (stato 2026-11-04, sessione di build)

Verificato:

- Storia prima del codice; test di convenzione scritti prima (RED): guardia in Xot in fallimento
  sulle pagine mancanti.
- File creati per 11 moduli: Data, SettingPage, lang it/en, test, storia di modulo. Notify riceve
  solo `NotifyConfigData` (la sua pagina esisteva). Notify page era rotta: `mount()` falliva per
  assenza della Data.
- Test verdi in esecuzione: guardia `EveryModuleHasSettingPageTest` (54 casi) e
  `PdndConfigDataTest` (56 casi insieme). Convenzione per Activity, Job, Lang: verde.
- Bug trovato dalla revisione ECC (`ecc:code-reviewer`): otto pagine dichiaravano il campo `anni`
  senza la proprieta' nella Data. Il valore non si caricava e il salvataggio lo scartava con
  notifica di successo. Riscritte dal template a schema vuoto. Guardia aggiunta in verifica
  statica (un campo puo' comparire solo se la Data ha proprieta').
- Route: 18 rotte `admin/setting` registrate, una per modulo.
- Pint: verde sui file nuovi.

Non verificato (bloccato):

- Pest: dopo l'ultima modifica ogni run fallisce al boot con
  `Cannot override final method XotBaseListRecords::getTableColumns()` in
  `Modules/Activity/app/Filament/Resources/SnapshotResource/Pages/ListSnapshots.php:34`. File tracciato,
  non toccato da questa sessione. Nel worktree Activity risultano modificati 270 file da un'altra
  sessione, in corso.
- PHPStan livello 10: crasha con lo stesso fatal, quindi nessun risultato sui file nuovi.
- Dopo la correzione del campo `anni` i test delle otto pagine non sono stati rieseguiti.
- Progressioni: `ProgressioniConfigDataTest` fallisce con `Component::$container` (WorkerTypesSection). Non
  toccato da questa sessione.

Stato: le storie di modulo passano a `done` solo dopo una run Pest verde e PHPStan pulito.
