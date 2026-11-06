---
title: "Collisioni: riscrivere il file completo, non scegliere un lato"
type: story
module: Xot
status: in-progress
created: 2026-11-06
updated: 2026-11-06
owner: Xot (tooling e regole trasversali; i file toccati appartengono ai moduli indicati)
tags: [merge-collisions, rewrite, bmad, multi-agent, docs-organization]
related:
  - ../bmad/stories/merge-marker-fleet-residue.story.md
  - ../bmad/stories/8.24-merge-conflict-resolution-fleet-swarm.story.md
  - ./dcp-201-nomi-dei-file-md-senza-date-e-senza-suffissi.story.md
  - ./phpstan-modules-zero-errors.story.md
  - ../../../../../docs/wiki/how-to/git-merge-marker-sweep.md
---

# Collisioni: riscrivere il file completo, non scegliere un lato

## Richiesta (ordine dell'utente, 2026-11-06)

«sistema le collisioni non scegliendo una versione o l'altra ma riscrivendo meglio il file completo, fa tutto con bmad + ecc + second brain + costantemente studia aggiorna e migliora e organizza meglio le cartelle docs dentro i moduli e dentro i temi, coordinati e collabora con gli altri agenti ai con bmad + ecc».

## Scopo (il perche')

Una collisione di merge e' un punto in cui due storie dello stesso file si sono incontrate. Scegliere un lato butta via il lavoro dell'altro, e la scelta si rivela sbagliata solo dopo (nello sweep del 2026-11-05 lo stesso metodo ha dato risposte opposte in due file; `BaseTenant` ha perso `HasUuids`). La risoluzione giusta nasce dallo scopo del file: cosa doveva fare, chi lo usa, quale lato porta una funzione voluta e quale una copia stale. Il file riscritto per intero integra il meglio dei due lati e lo migliora (tipi, PHPDoc, duplicazioni, documenti ordinati), cosi' il prossimo sync non ha piu' una regione da ricombinare.

## Misura iniziale (2026-11-06 07:42, dopo il sync delle 07:38-07:39)

- **24 file con marcatori** `<<<<<<< .merge_file_*` committati dal sync: User 14 (13 modelli PHP piu' `docs/`), Tenant 2 (`TenantSetting`, `TenantSubscription`), Cms 3, Activity 2, AI 2, Xot 1. Zero `.merge_file_*` come file.
- **14 nomi `.md` doppi** (`X.md` accanto a `X-1.md`, `-2`, `-2-1`): User archive e bug-fixes, Xot consolidated e laragon, docs/chat/swarm, Media. Dettaglio e regole in [dcp-201](./dcp-201-nomi-dei-file-md-senza-date-e-senza-suffissi.story.md).
- Causa radice invariata: `merge_remote_repo_2.sh` (`git merge -s resolve`, `git add -A && git commit -am .`) committa i marcatori rimasti e non gestisce le rinomine.

## Metodo (vale per ogni file)

1. Leggere il file intero e le due versioni intere; ricostruire lo stato pulito prima del sync (`git show dc34e53d6:<path>` nel parent).
2. Capire lo scopo e i chiamanti (`rg`, story, test, docs del modulo owner).
3. **Riscrivere il file completo**: integrare cio' che serve da entrambi i lati e migliorarlo (tipi senza `mixed`, generics, `casts()`, `Safe\`, niente duplicazioni; per i documenti: un solo testo ordinato con front matter valido).
4. Provare sul vendor installato i workaround ereditati (un alias su un metodo inesistente e' un fatal in autoload).
5. Verificare: marcatori 0, `php -l`, classe caricata con Reflection, Pint, PHPStan sul modulo; Pest dichiarato non eseguibile (`.env.testing` senza `DB_USERNAME`).
6. Registrare qui la propria sezione (scopo, preso da A/B, migliorato, verifica) e allineare le docs del modulo owner.

## Acceptance criteria

- [ ] AC1: zero marcatori di merge in tutti i tipi di file (esclusi vendor, node_modules, .git, storage).
- [ ] AC2: `python3 -I bashscripts/tools/docs/md-filenames.py check` esce 0.
- [ ] AC3: nessun file e' stato risolto per "ours"/"theirs" in blocco: ogni sezione sotto dichiara cosa e' stato preso da ciascun lato e cosa e' stato migliorato.
- [ ] AC4: ogni classe PHP riscritta si carica (Reflection su bootstrap reale) e `analyse Modules` non peggiora (baseline 71 errori, solo Cms e Geo).
- [ ] AC5: documenti riscritti con front matter valido, link relativi funzionanti, nomi senza date ne' suffissi.
- [ ] AC6: nessun commit fatto da agenti di questa story; nessun lock lasciato; nessun file in `bmad-output/`.

## Ripartizione fra agenti (file disgiunti, lock per file)

| Agente | File | Proprietario |
|---|---|---|
| A | User: `Authentication`, `AuthenticationLog`, `BaseTeam`, `BaseTeamUser`, `BaseTenant`; Tenant: `TenantSetting`, `TenantSubscription` | User, Tenant |
| B | User: `Device`, `DeviceUser`, `OauthPersonalAccessClient`, `Profile`, `Role` | User |
| C | User: `SocialiteUser`, `SsoProvider`, `TeamInvitation`, `TeamPermission` | User |
| D | `.gitattributes` e `.gitignore` di Activity, AI, Cms; `AI/docs/index.md`; `Cms/docs/00-index.md`; `Cms/docs/stories/docs-organization-cms.story.md` | Activity, AI, Cms |
| E1 | Nomi doppi in `User/docs/archive`, `User/docs/bug-fixes` | User |
| E2 | Nomi doppi in `Xot/docs/consolidated`, `Xot/docs/laragon`, `docs/chat/swarm`, `Media/docs` | Xot, Media |
| Coordinatore | `Xot/docs/stories/phpstan-modules-zero-errors.story.md`, questa story, wiki, memoria, run PHPStan intero | Xot |

## Coordinamento con Codex (rilevato 2026-11-06 ~07:47)

`codex` ha acquisito alle 07:44:56 i lock del task `collision-rewrite-20261106` su 16 file di questa story: `User/app/Models/{Authentication,AuthenticationLog,BaseTeam,BaseTeamUser,BaseTenant,Device,DeviceUser,OauthPersonalAccessClient,Role,SocialiteUser,SsoProvider,TeamInvitation,TeamPermission}.php`, `AI/docs/index.md`, `Cms/docs/00-index.md`, `Cms/docs/stories/docs-organization-cms.story.md`, piu' `Xot/docs/stories/phpstan-modules-zero-errors.story.md`.

Regola di collaborazione (protocollo `bashscripts/lock/README.md`): un lock vivo non si ruba e non si duplica il lavoro. Quindi:

- **Codex riscrive** i 16 file qui sopra. I file restano suoi finche' il lock non e' rilasciato; un lock oltre 60 minuti di un agente morto e' stale e si segnala, non si forza.
- **Gli agenti Claude riscrivono i file liberi:** `User/app/Models/Profile.php`, `Tenant/app/Models/{TenantSetting,TenantSubscription}.php`, i quattro file di config (`Activity/.gitattributes`, `Activity/.gitignore`, `AI/.gitattributes`, `Cms/.gitattributes`) e le 14 collisioni di nome `.md`.
- **Revisione indipendente:** per i file di Codex gli agenti A, B, C, D preparano un dossier (scopo, differenze fra i lati, requisiti, script di verifica) e, a lock rilasciato e marcatori a zero, eseguono la verifica e riportano i difetti senza modificare. Il criterio e' quello degli AC sopra, in particolare AC3 (nessun "ours"/"theirs" in blocco) e la prova sul vendor dei workaround (`BaseTenant`: un alias su un metodo inesistente e' un fatal in autoload che `php -l` non vede).
- **Richiesta a Codex:** a fine lavoro appendere qui sotto il proprio record (per file: scopo, preso da A/B, migliorato, verifica) e rilasciare i lock; se preferisce dividere, rilasciare i file che non intende toccare.

## Record degli agenti

(Ogni agente appende qui la propria sezione: lock, append, unlock.)

### Agente A (Claude), 2026-11-06 07:50-07:58

Perimetro dopo il cambio del coordinatore: riscrittura dei due file Tenant liberi; revisione in sola lettura dei cinque modelli User che Codex aveva lockato (`Authentication`, `AuthenticationLog`, `BaseTeam`, `BaseTeamUser`, `BaseTenant`). Lock presi e rilasciati: i due file Tenant e questa story.

Nota di stato trovata all'avvio: nei due repo di modulo (User, Tenant) il sync delle 07:44-07:47 era in corso (`MERGE_HEAD`, file `UU`); il working tree dei sette file non aveva piu' marcatori e `git show dc34e53d6:<path>` (parent) conteneva ancora marcatori nei sette file, quindi `dc34e53d6` non e' uno stato pulito per questi file (lo e' `88cc11900` nel repo User). Per i lati si sono usati gli stage dell'indice e poi i commit `88cc11900` (A) e `98e3cd53e` (B) del repo User, `5333afc` e `8f9becce` (B) del repo Tenant.

**`Tenant/app/Models/TenantSetting.php`** (riscritto)
- Scopo: impostazione chiave/valore di un tenant (`tenant_settings`, connessione `tenant`); la relazione `tenant()` sta in `TenantSettingRelations`. Chiamanti: `TenantSettingSeeder`, `TenantSettingFactory`, `MultiTenantScopeTest`, `TenantBusinessLogicTest`.
- Da A: nessun import di `BelongsTo` (la relazione e' nel trait), `@mixin \Eloquent` non preso. Da B: `@mixin \Eloquent` tolto (nessun altro modello Tenant lo usa; `TenantDomain` no). I due lati divergevano solo per un import inutilizzato, il `@mixin` e una riga vuota prima della `}`: nessuna funzione persa.
- Migliorato: PHPDoc della classe con scopo e rinvio al trait, `@var list<string>` su `$fillable`, riga ` *` finale del docblock tolta.
- Verifica: marcatori 0, `php -l`, Pint (passed), Reflection su bootstrap reale (parent `BaseModel`, trait `TenantSettingRelations`, `tenant()` e' `BelongsTo` verso `Tenant` con fk `tenant_id`, fillable invariato, tabella `tenant_settings`, connessione `tenant`), `phpstan analyse Modules/Tenant`: 0 errori. Pest non eseguibile (`DB_USERNAME` vuoto).

**`Tenant/app/Models/TenantSubscription.php`** (riscritto)
- Scopo: piano, limiti e fatturazione di un tenant (`tenant_subscriptions`); `tenant()` in `TenantSubscriptionRelations`. Chiamanti: `TenantSubscriptionSeeder`, factory, `TenantStatementCoverageTest` (esige `expires_at` in `getCasts()`), `TenantBusinessLogicTest`.
- Da A: `casts()` che fonde `parent::casts()` con `next_billing_date`/`expires_at` come `datetime`, senza import `BelongsTo`. Da B: nessun `@mixin`. Corpo identico nei due lati.
- Migliorato: PHPDoc di classe, `@var list<string>` su `$fillable`, `@return array<string, string>` su `casts()` (come `BaseModel::casts()`), docblock senza riga ` *` finale. Runtime invariato.
- Verifica: come sopra; Reflection conferma `expires_at` e `next_billing_date` = `datetime`, `created_at` ereditato.
- **PROPOSTO, non fatto** (cambierebbe il runtime): la migrazione definisce `max_storage_gb`, `current_storage_gb` e `billing_amount` come `decimal(12,2)` ma il PHPDoc dice `int|null`/`float|null` e non c'e' alcun cast, quindi Eloquent restituisce stringhe decimali; un cast `decimal:2` allineerebbe tipo e schema. I due trait `*Relations` hanno `tenant()` identico: candidabili a un solo trait condiviso, da decidere con il modulo.

**Revisione dei cinque file di Codex** (nessuna modifica da parte mia; dossier completo in `scratchpad/dossier-A.md` della sessione). A lock FREE e marcatori 0 alle 07:53, working tree uguale a `ca43cd7a2`:
- Passano: `php -l`, Reflection (trait attesi, relazioni dichiarate nei `*RelationsTrait` e costruite con 0 query), guardia `BaseTenantKeyTest` riprodotta a mano, i tre casi di `TenantTest` su `resolveRouteBindingQuery`, `phpstan analyse` sui 5 file: 0 errori.
- Difetti: `BaseTeam` ha l'import `XotData` inutilizzato; `BaseTenant` conserva l'alias morto `resolveRouteBindingQueryFromUuids` (nessun chiamante) e un `instanceof Model` ridondante con tipo di ritorno `Builder` piu' stretto del contratto Laravel; `pint --test` fallisce su tutti e 5 (ordine dei trait, separazione degli attributi di classe, FQN nell'alias).
- Fatto verificato sul vendor installato (laravel 13.34.0, spatie/laravel-sluggable 4.0.3): `resolveRouteBindingQuery` non e' in `HasSlug`, e' in `HasUniqueStringIds` (via `HasUuids`) e in `Model`; nessuna collisione oggi. Non verificabile in locale per 4.0.4 e laravel 13.38.0 (versioni del lock). Un metodo definito nella classe sopprime comunque il conflitto fra trait (provato su PHP 8.3).
- **Decisione aperta per l'utente su `BaseTenant`:** la story `User/docs/stories/tenant-key-string.story.md` (AC4, Dev record del 2026-11-05) vuole la validazione UUID e nessun override; `TenantTest` del lato B (caso `uses_id_for_non_uuid_value`) esige che un id non UUID passi a `where('id', ...)` senza 404, coerente con AC1 ("un id esplicito resta com'e'"). Il codice attuale segue `TenantTest`. Va scelta una delle due semantiche e allineata l'altra (story o test).
