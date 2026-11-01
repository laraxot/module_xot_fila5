---
title: "Epic: SettingPage nei moduli, solo dove serve davvero"
status: done
module: Xot (owner), Ptv, IndennitaCondizioniLavoro, IndennitaResponsabilita, Incentivi, Performance, Media
created: 2026-10-28
repository: "https://github.com/provtv/base_ptv_fila5_mono"
github_issue: "https://github.com/provtv/base_ptv_fila5_mono/issues"
github_discussion: "https://github.com/provtv/base_ptv_fila5_mono/discussions"
related:
  - ./base-setting-page.story.md
  - ../../../Progressioni/docs/stories/setting-page-config.story.md
  - ../../../Progressioni/docs/stories/setting-page-worker-types.story.md
---

# Epic: SettingPage nei moduli, solo dove serve davvero

## Fase BMAD

Analisi (3 agenti di ricerca in parallelo, sola lettura, 17 moduli) => decisione per modulo =>
pezzi riutilizzabili => una story per modulo.

## Richiesta

"BaseSettingPage puo' essere utile anche negli altri moduli: mettila in tutti, capendone
l'utilizzo migliore e il senso."

## Principio

Una SettingPage esiste se un amministratore deve cambiare nel tempo un valore oggi scritto nel
codice, senza deploy. Una pagina vuota e' rumore nel menu; una pagina che espone chiavi che
rompono il boot (tema, routing, classi) e' un rischio. Default = comportamento attuale.

## Decisione per modulo (evidenze nelle story di modulo)

| Modulo | Decisione | Impostazioni |
|--------|-----------|--------------|
| Ptv | SettingPage | `mail_from_address`, `mail_from_name` (prima fissi su Provincia di Treviso in `SchedaMail` di Ptv e IR), `email_fallback_recipient` (prima `config('ptv.email.fallback_recipient')`, chiave mai definita: valeva sempre l'indirizzo scritto nel codice), `anni` |
| IndennitaCondizioniLavoro | SettingPage | `anni` (upload, prima solo 2023: impossibile caricare il 2024 e oltre; filtro anno/valutatore) |
| IndennitaResponsabilita | SettingPage | `anni` (messaggi; aggiornamento dirigenti da CSV), `worker_types` |
| Incentivi | SettingPage | `anni` (fermi al 2025) |
| Performance | SettingPage | `worker_types` (voci Individuale per tipo) |
| Media | SettingPage | `attachment_max_size_kb` (10240), `attachment_mime_types` (pdf/doc/docx) |
| Progressioni | esistente | migrata sui pezzi comuni |
| Rating | no | motore generico, nessun valore di business |
| Tenant | no | il nome del tenant decide quale file leggere: una pagina nel tenant sarebbe ricorsiva |
| Activity, Job, UI | no | solo costanti tecniche o valori gia' in config standard (activitylog, media-library) |
| User | no | password/OTP e Socialite hanno gia' pagine dedicate (Socialite con segreti fuori da config) |
| Xot | no, rinviata | `xra` contiene chiavi che rompono l'app (main_module, *_class, temi). Bug trovato: il tenant scrive `forcessl`, XotData legge `force_ssl` |
| Lang | no, rinviata | `locales` scritto a mano in 7 punti incluso il routing al boot: prima unificare nel codice |
| Sigma, Pdnd | no, rinviata | parametri tecnici/di sicurezza (purpose id, verify_ssl, endpoint); segreti in chiaro da togliere prima |
| Notify | no | ha gia' `SettingPage` (EnvWidget su .env): nome in collisione, ruolo diverso |

## Decisione emersa durante il lavoro

Per import e aggiornamenti con un anno fisso nel codice (import stabilimenti 2025, dirigenti da CSV
2024) non serve un'impostazione "anno di import": l'anno si **sceglie al clic** tra gli `anni`
del modulo, obbligatorio e **senza default** (sono azioni che scrivono: proporre l'anno piu'
recente fa importare l'anno sbagliato a chi non guarda). Cosi' ogni modulo ha una sola lista.

## Pezzi riutilizzabili

1. `Xot\Datas\Concerns\MakesFromTenantConfig`: `make()` legge `config/{tenant}/{modulo}.php`.
   Il nome del modulo e' il **primo** segmento dopo `Modules\`: `Str::between()` taglia
   all'ultimo separatore (`Progressioni\Datas`) e faceva leggere un file inesistente.
2. `Xot\Datas\Concerns\HasYearsConfig`: `anni`, normalizzazione, `getAnniOptions()`, default per
   modulo (`defaultAnni()`, cioe' l'elenco che c'era nel codice).
3. `Xot\Actions\Config\ResolveModuleConfigDataAction` (classe => `{Modulo}ConfigData`, usata da
   BaseSettingPage) e `GetYearOptionsAction` (anni del modulo in cui gira un componente condiviso,
   altrimenti l'elenco storico del componente). `BaseSettingPage::anniField()` per il campo.
4. `Ptv\Datas\Concerns\HasWorkerTypesConfig` + `Ptv\Contracts\WorkerTypesConfigContract` +
   `Ptv\Filament\Forms\Components\WorkerTypesSection` (etichette una volta sola in
   `ptv::worker_types_section`) + `Ptv\Filament\Resources\Concerns\HasWorkerTypeNavigation`
   (voce nascosta se il tipo e' spento): Progressioni, IndennitaResponsabilita, Performance.

## Segnalazioni di sicurezza (fuori scope, all'utente)

- `config/sigma.php:9`: password di default in chiaro.
- `Pdnd/.../GuzzleProxyPage.php:93`: credenziali proxy in chiaro.
- Pdnd `verifySSL(false)` anche in produzione.

## Incidenti durante il lavoro (lezioni)

- `AutoLabelAction` gira **prima** di `setUp()`: una Section senza intestazione in `make()` scrive
  `sections.empty` nel lang di chi la usa (successo, corretto). WorkerTypesSection ha l'intestazione
  di default in `make()`.
- Spostare campi in un componente condiviso sposta anche le chiavi lang: AutoLabelAction risale
  alla classe del componente (`ptv::worker_types_section`), non alla pagina.
- Un regex su un file lang l'ha lasciato non valido per ~2 minuti: `php -l` dopo ogni modifica.

## Verifica

- PHPStan livello 10 su tutti i file toccati (~45): 0 errori. Pint ok.
- Render in sola lettura delle 7 SettingPage come super-admin: campi e etichette presenti, dati
  = default o file del tenant (Progressioni: 2026, Dirigenti e Regionali spenti); lang invariati
  (md5). Utente non super-admin: `canAccess()` falso su tutte.
- `GetYearOptionsAction`: Progressioni e IR 2026-2023, Incentivi 2025-2021, Sigma (senza Data)
  fallback.
- Menu: Progressioni nasconde Dirigenti e Regionali; IR e Performance tutte visibili (default).
- Media: `maxSize` 10240 e tipi pdf/doc/docx dalla Data.
- Test: `Xot/tests/Unit/Actions/Config/ResolveModuleConfigDataActionTest.php`,
  `Incentivi/tests/Unit/Datas/IncentiviConfigDataTest.php`, casi aggiunti in
  `Progressioni/tests/Unit/Datas/ProgressioniConfigDataTest.php`. Pest saltato: produzione.
