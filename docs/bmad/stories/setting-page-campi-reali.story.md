---
title: SettingPage con campi reali in ogni modulo
status: in-progress
module: Xot (owner della base e della guardia), tutti i moduli consumatori
type: story
created: 2026-11-04
qmd: "SettingPage getFormSchema vuoto campi reali ConfigData tema Cms xra metatag Tenant activitylog Notify AI Gdpr Seo guardia"
related:
  - ./setting-page-tutti-i-moduli.story.md
  - ../../stories/module-setting-pages.epic.md
  - ../../stories/base-setting-page.story.md
---

# SettingPage con campi reali in ogni modulo

## Fase BMAD

Correct course, poi Build. La story [setting-page-tutti-i-moduli](./setting-page-tutti-i-moduli.story.md) ha letto
"la pagina va in tutti i moduli" come "la pagina puo' essere vuota" e ha scritto `return [];` in 13 moduli su 14,
con una guardia che ammette il caso. E' l'errore da correggere.

Richiesta dell'utente (testuale): "nei SettingPage il metodo getFormSchema non puo restituire [] in ogni modulo c'e'
qualcosa da settare.. per esempio nel cms potevi configurare quale tema utilizzare .. percio' devi analizzare e
ragionare molto piu' a fondo". Poi: "crea tutto quello che serve a bmad e ecc per completare il progetto e poi
completalo e controllalo".

## Cosa dice davvero il codice (verificato a runtime, non dedotto)

1. Un file `config/{tenant}/{x}.php` diventa la chiave radice `config('x')`. Prova: `xra.pub_theme` vale `Four` perche'
   lo dice `config/localhost/xra.php`. Quindi un valore salvato da `BaseSettingPage` raggiunge chi legge `config('x.…')`.
2. Le chiavi che nessun file definisce valgono `NULL` e il codice usa il default scritto sul posto: `config('ai.model')`
   e `config('notify.cleanup.enabled')` sono `NULL` oggi. Sono impostazioni vere ma non configurabili.
3. Un file di config *del modulo* e' registrato da `XotBaseServiceProvider::registerConfig` come `config('{mod}.{file}')`
   con `Config::set`, che sostituisce quel ramo: un override del tenant su `gdpr.config.*` non arriverebbe. I lettori di
   Gdpr, Seo e Cms (`gdpr.config.cookie.*`, `seo.config.path_aliases`, `cms.config.*`) vanno spostati sulla Data.
4. `config('job::cache.enabled')` e' `NULL` perche' la chiave con `::` non corrisponde a nessun file: la lettura di
   Job e' morta, non solo non configurabile.
5. Le chiavi di `Lang/config/lang.php` (`available_locales`, `cache.*`, `validation.*`) non sono lette da nessuno.
6. `XotData` e' il modello tipizzato del file `xra`; Cms lo legge direttamente (`XotData::make()->pub_theme`), quindi un
   tema salvato vale al caricamento successivo, senza `config:cache`.
7. `Modules/Xot/config/xot.php` contiene percorsi assoluti di un altro progetto (`base_orisbroker_fila5`): dato morto,
   segnalato, non esposto.
8. Il riferimento ben fatto e' Media: la `ConfigData` e' l'unica fonte dei default e il codice legge con
   `MediaConfigData::make()` (trait `MakesFromTenantConfig`), quindi nessun default duplicato e il valore salvato ha effetto.

## Contratto di una impostazione vera

Un campo entra nella pagina solo se vale tutto questo:

1. **Ha un lettore**: almeno un punto del codice usa quel valore e legge tramite `{Mod}ConfigData::make()`. Un campo senza
   lettore e' una bugia nel menu.
2. **Default = comportamento di oggi**: il valore scritto nel codice diventa il default della proprieta' (una volta sola, nella
   Data); nulla cambia finche' nessuno salva.
3. **Niente segreti**: chiavi API, token, password restano in `.env`/`services`. La config tenant e' un file PHP tracciato.
4. **Non puo' rompere il boot**: niente testo libero dove serve una classe o un tema. Un tema e' una `Select` degli installati.
5. **Non attiva denaro**: nessun flag del live trading si cambia da un form (PRD 2.5f).
6. **Ogni proprieta' ha un campo e viceversa**, con etichetta in `lang/{it,en}/setting.php` (`fields.{campo}.label`).

Un modulo la cui impostazione vive in un altro file del tenant (Cms in `xra`, Tenant in `metatag`, Activity in
`activitylog`) fa override di `tenantConfigName()` nella Data e la pagina ne ripete il valore in `getConfigName()`. Il merge
di `SaveTenantConfigAction` conserva le chiavi non gestite, quindi piu' pagine possono scrivere nello stesso file.

## Matrice per modulo

| Modulo | File tenant | Campi | Lasciato fuori, e perche' |
|--------|-------------|-------|---------------------------|
| Cms | `xra` | `pub_theme`, `adm_theme` (Select dei temi in `Themes/`), `register_pub_theme`, `disable_frontend_dynamic_route` | `page_middleware_allowlist`: superficie di sicurezza |
| AI | `ai` | `model`, `chat_model`, `temperature`, `max_tokens`, `timeout`, `retry_attempts`, `openai_base_url` | `openai_api_key`: segreto |
| Notify | `notify` | `tracking.*`, `rate_limiting.*`, `cleanup.*`, `fcm.url`, `preferences_url`, `support_url` | `fcm.server_key`: segreto (resta in `.env`, EnvWidget) |
| Gdpr | `gdpr` | `cookie.consent_lifetime`, `cookie.policy_path`, `cookie.extra` | lettori da spostare sulla Data |
| Seo | `seo` | `path_aliases` | lettori da spostare sulla Data |
| UI | `ui` | `dark_mode_switcher.enabled` | |
| User | `user` | `create_personal_team`, `passport.register_routes`, `passport.enable_password_grant` | token, modelli, scope Passport: strutture di sicurezza; password/OTP e Socialite hanno pagine proprie |
| Activity | `activitylog` | `enabled`, `delete_records_older_than_days` | |
| Job | `job` | `cache.enabled`, `cache.store`, `cache.key` | richiede di correggere i lettori morti `job::cache.*` |
| Lang | `lang` | lingue disponibili, predefinita, di riserva | richiede di unificare i punti che scrivono le lingue a mano |
| Tenant | `metatag` | titolo, sitename, sottotitolo, descrizione, parole chiave, autore, testo alt del logo | |
| Xot | `xra` | `show_trans_key`, `force_ssl`, `login_verified`, `disable_database_notifications`, `disable_admin_dynamic_route`, `main_module` (Select dei moduli) | classi (`team_class`…), `super_admin`: accesso e boot |
| Trade | `trade` | `news.feeds`, `mcp.enabled`; stato di kill switch, live e auto in sola lettura | `live.*`, `kill_switch`, `auto.enabled`: l'app non li attiva |
| Media | `media` | gia' fatto: `attachment_max_size_kb`, `attachment_mime_types` | |

La matrice e' la partenza: ogni modulo la conferma o la corregge nella propria story con le righe di codice dei lettori.

## Guardia (ECC: verifica, non fiducia)

`Xot/tests/Unit/Filament/Pages/EveryModuleHasSettingPageTest.php` oggi dice che un form vuoto va bene. Si ribalta, per
modulo: lo schema ha almeno un campo; i campi sono esattamente le proprieta' pubbliche della Data (esclusa `name`); ogni
campo ha l'etichetta in `it` e `en`; ogni proprieta' ha un lettore fuori da pagina e Data. Si committa quando tutti i
moduli la superano, per non lasciare rosso il gate degli altri agenti.

## Criteri di accettazione

- [ ] Cms (riferimento: tema pubblico e di amministrazione)
- [ ] AI, Notify, UI, User, Activity
- [ ] Gdpr, Seo (con lettori spostati sulla Data)
- [ ] Job, Lang (con correzione dei lettori)
- [ ] Tenant, Xot, Trade
- [ ] guardia ribaltata e verde su tutti i moduli
- [ ] PHPStan livello max e Pint su ogni file toccato; Pest dei test nuovi e della guardia
- [ ] prompt riusabile per aggiungere un campo senza ripetere l'errore, e memoria aggiornata

## Coordinamento

- Codex teneva i lock su AI, Cms, Gdpr, Seo e Trade (SettingPage, Data, lang) dal task
  `SettingPage-every-module-and-phpstan-remediation`: 184 minuti, nessuna modifica pendente, task superato dalla richiesta
  qui sopra. Oltre i 60 minuti il README dei lock li considera obsoleti. Rilasciati uno per uno, solo quelli, e
  ripresi subito a nome di questa story. Codex: se hai lavoro in corso su quei file, scrivilo qui sotto prima di toccarli.
