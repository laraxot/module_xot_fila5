---
title: "[STORY] Sync del 2026-11-19: merge a storie non correlate committato nel root, riparazione e prevenzione"
type: story
module: Xot
bmad: true
status: in-progress
priority: critical
created: 2026-11-19
updated: 2026-11-19
tags: [sync, merge, marker-conflitto, regressioni, phpstan, pest, forward-only]
qmd: "sync merge_remote_repo_2 allow-unrelated-histories marker regressioni file resuscitati blob antenato comune phpstan pest binding"
related:
  - ./module-sync-stale-snapshot-and-phpstan-zero.story.md
  - ../../../../../bashscripts/docs/sync-repair-tools.md
  - ../../../../../docs/wiki/rules/merge-conflict-marker-resolution.md
---

# Sync del 2026-11-19: riparazione e prevenzione

Seconda volta in tre giorni (la prima: [story del 2026-11-17](./module-sync-stale-snapshot-and-phpstan-zero.story.md)).

## Cosa è successo

Alle 11:46–11:57 è stato eseguito `bashscripts/git/subtrees/merge_remote_repo_2.sh`, marcato
"DEPRECATO — NON eseguire" dal 2026-09-15 ma senza nulla che lo impedisse. In ogni pacchetto ha
fatto `git init` (branch `master`), `commit -am .` e `merge laraxot/dev --allow-unrelated-histories`,
e ha pushato al remoto. Il commit del root `4a268e3c78 "."` ha poi preso tutto:

| Danno | Quanti | Effetto |
|---|---|---|
| file con marker | 2.424 in 19 pacchetti (~6.650 blocchi) | PHPStan non partiva (`unexpected token "<<"`) |
| file tornati a versioni di set/ott | 633 | es. `Rating/app/Datas/RatingData.php` senza `formFieldLabel()` |
| file che il root aveva cancellato | 438 | `app/Services/*`, `lang/*/.php`, report `ULTIMATE_*`, nomi con date |
| dipendenze perse | `neuron-core/neuron-ai`, `laravel/mcp` in AI | 44 `class.notFound` |

Il remoto stesso era già regredito: i mirror di massa del 17/11 ("Marco Xot .") lo avevano
riportato a blob vecchi, e alle 12:00–12:02 la stessa sync ha pushato i marker anche lì.

## Riparazione (commit `efeec2ebd3`, `137b8fbf25`)

Metodo e strumenti: [sync-repair-tools](../../../../../bashscripts/docs/sync-repair-tools.md).
- marker: fast-forward / merge a 3 vie sul blob antenato comune per ~2.300 file; casi meccanici;
  107 `.md` e 3 test fusi a mano per significato (4 subagenti, numeri verificati sul codice);
- regressioni ripristinate alla versione pre-sync, file resuscitati tolti di nuovo;
- `Comment/tests/Support/CanCommentStub.php`: doppione incompleto di
  `Tests/Fixtures/Concerns/InteractsWithCommentsContractStub`, faceva morire PHPStan
  (`Model::getKey()` senza tipo contro `CanComment::getKey(): mixed`), tolto;
- dipendenze AI e Notify allineate (lock + vendor);
- Pest: il binding `uses()->in()` nei `Pest.php` di Cms, Tenant e Rating non gira col runner di
  root (che legge solo `laravel/tests/Pest.php`) e con `--test-directory` raddoppia il binding
  (`TestCaseAlreadyInUse`). Tolto; 53 file che usavano il TestCase senza legarlo ora lo legano:
  110 test che non partivano passano. Restano 74 fallimenti di debito già noto (tabella
  `tenants` assente nei DB `_test`, route Folio, componenti Livewire `auth.*`);
- 8 copie in minuscolo dei test di `Cms/tests/Feature/Auth` tolte (PSR-4); per `LoginVolt` e
  `PasswordConfirmation` il contenuto vero ha sostituito i segnaposto `skip`.

## Seconda passata: lavoro esistito solo sul remoto

La punta di `laraxot/dev` non era una verità affidabile: i commit "." delle 11:50–12:04 sul remoto
hanno "risolto" i loro conflitti cancellando un lato intero (es. `module_ai_fila5` `3a87af7`: ~3.100
righe, il fornitore `local`, i binding degli agenti, le dipendenze). Il confronto giusto è con
l'**ultimo commit remoto prima della sync** (`find_remote_only_losses.py`, `--before`).
Su ~1.400 file diversi, quasi tutti erano blob dei mirror "." del 17/11; filtrando i commit con un
messaggio vero restano **50 file di lavoro reale**: 44 ripristinati (il contenuto attuale era un
loro antenato), 1 fuso a 3 vie, 5 di AI fusi a mano dall'agente insieme alle sue correzioni.
- AI: PHPStan 28 → 0; trovati e corretti due bug runtime che bloccavano ogni run degli agenti
  (binding `MessageStoreInterface`/`PersistenceInterface` persi; `EloquentPersistence` di neuron
  esige `STRICT_TRANS_TABLES`, la connessione `mysql` del tenant è `strict => false`:
  `StrictModeEloquentPersistence`).
- Rating: PHPStan 71 → 0 (dettaglio nella story del modulo `2.3.phpstan-rating-tail-contracts`).
- Gdpr/Lang: recuperati i test di registrazione agnostici e `info_banner`; 32 test Gdpr falliscono
  perché `Gdpr/lang/en/register.php` contiene i testi di un altro progetto ("Start Your Pizza
  Journey"), presenti in tutte le versioni: debito di neutralità del modulo, non una regressione.

## Prevenzione

- `merge_remote_repo_2.sh` usciva con errore senza `ALLOW_DEPRECATED_MERGE=1` (bashscripts
  `6e7813a27`); la guardia è stata tolta alle 12:27 dal commit "." `718a8ae47`. **Decisione
  dell'utente**: rimetterla o sapere perché serve eseguirlo.
- La sync automatica committa il working tree ogni minuto ("." `2f184dec3d`): una modifica a metà
  finisce nella storia.

## Ambiente, trovato durante il lavoro

- Dopo le 12:11 una sessione esterna ha fatto `chown -R www-data` sull'intero repo (git: "dubious
  ownership", `composer.lock` non scrivibile). Ripristinato `marco:www-data` con scrittura di gruppo.
- `public_html/assets/<modulo>` erano cartelle copiate, non symlink: 11 copie identiche sostituite
  dal link. Poi anche `fixcity` (un `images/logo.svg` non referenziato da nessuna parte), `geo` (bundle
  Vite vecchi che il manifest del modulo non usa) e `ui` (screenshot più vecchi di quelli del modulo):
  ora tutti e 14 sono symlink. Tolta `XotAssetTest/`, cartella vuota lasciata da una versione vecchia di
  `AssetActionsTest`. `public_html/assets/.gitignore` ha la voce di ogni modulo con `public/`
  (la guardia `ModulePublicAssetsLinksTest` falliva per 11 moduli).

## Aperto

- [ ] Portare le correzioni nei repo dei pacchetti: i loro `laraxot/dev` contengono marker e
      regressioni, e il prossimo mirror li riporterebbe nel root. I repo annidati sono ancora in
      un merge non concluso su `master`.
- [ ] Debito di nomi per maiuscole, già presente prima della sync: `database/Factories` e
      `factories`, `Migrations`/`migrations`, `Seeders`/`seeders` (Cms, Comment, Tenant),
      `Xot/lang/pt_BR` e `pt_br`, `Notify/.github/ISSUE_CONTENT` e `issue_content`,
      `Notify/config/Config`, `Job/tests/feature`, `Lang/tests/unit`, `Geo/docs/*`. Le migrazioni
      doppie vanno guardate una per una prima di togliere qualcosa.
- [x] PHPStan: `analyse Modules` a zero (commit `6debfe0f72`).
- [x] Binding Pest: ADR `Xot/docs/adr/pest-testcase-binding-per-file.md` + guardia (commit `2d57064ac1`).
