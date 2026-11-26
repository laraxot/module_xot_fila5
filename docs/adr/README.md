---
title: "Architecture Decision Records"
type: index
tags: [adr, decisioni]
created: 2026-11-18
updated: 2026-11-26
qmd: "xot adr architecture decision records indice metodo harness decisioni"
---

# Architecture Decision Records

## Metodo Harness

Scrivere un ADR solo per una scelta difficile da invertire, sorprendente o fondata su un trade-off reale. Un ADR deve rendere leggibili contesto, driver, alternative, decisione, conseguenze e una conferma ripetibile; non è un diario né una spiegazione retroattiva inventata.

Le decisioni vanno verificate contro codice e test correnti. Una modifica sostanziale crea un nuovo ADR e collega il precedente come superseded/deprecated.

Il **perche'** delle scelte di questo pacchetto: una decisione per file, con le
alternative scartate. **Ogni ADR ha basename `NNNN-slug.md`** (harness MADR);
non si usano date o timestamp nel nome (la data sta nella frontmatter).

Ispirazione obbligatoria:
[harness 0000-template](https://raw.githubusercontent.com/robertogallea/laravelday-harness-workshop/refs/heads/main/docs/adr/0000-template.md)
· copia locale [0000-template.md](./0000-template.md).

Eccezioni al prefisso numerico: `README.md`, `INDEX.md`/`index.md`, `0000-template.md`.

## Formato (MADR breve / harness)

```markdown
---
status: proposed | accepted | rejected | deprecated | superseded by NNNN
date: YYYY-MM-DD
decision-makers:
---

# <!-- problema + soluzione -->

## Context and Problem Statement
## Decision Drivers
## Considered Options
## Decision Outcome
### Consequences
### Confirmation
```

File: `docs/adr/NNNN-titolo-con-trattini.md` (NNNN a 4 cifre, prossimo libero).

## Sezioni obbligatorie e deroghe

Ogni ADR non superseded ha, in questo ordine o equivalente: `## Contesto`, `## Driver della decisione`, `## Alternative scartate`, `## Decisione`, `## Conseguenze`, `## Conferma`. Una sezione può mancare solo con una deroga dichiarata nel file. Il modello breve in stile MADR è [0000-template](0000-template.md) (intestazioni inglesi: lo si adatta alle sezioni italiane qui sopra).

La governance dei contratti comportamentali, collegati agli ADR tramite invarianti con ID stabile e gruppo Pest, è la decisione [0012](0012-behavioral-contract-governance.md); il registro dei contratti è [../contracts/README.md](../contracts/README.md).

## Duplicati e superseded

Un file duplicato non si cancella: riceve `status: superseded by <canonico>.md` nella frontmatter e, in cima al corpo, la riga «Superseded da ...». Il canonico è la versione numerata. Nei nomi file non ci sono date né timestamp.

## Indice degli ADR

Un file per decisione. Colonne: stato dalla frontmatter, scopo (il titolo dell'ADR), tipo di conferma (`test` = esiste un file di test citato, `comando` = un comando eseguibile da `laravel/`, `review` = solo regola di review). [index.md](index.md) elenca gli stessi file con numero e canonico/superseded; i due elenchi devono citare gli stessi file e si aggiornano nello stesso commit.

| ADR | Stato | Scopo | Conferma |
|---|---|---|---|
| [0001-actions-over-services](0001-actions-over-services.md) | accepted | Le operazioni di business nuove si scrivono come Queueable Actions (Stato attuale: il codice contraddice) | test: `ArchitectureTest.php`, `NoServicesTest.php` |
| [00010-no-ticket-logic-in-page-slug-middleware](00010-no-ticket-logic-in-page-slug-middleware.md) | superseded da `0010-no-ticket-logic-in-page-slug-middleware.md` | No ticket logic in PageSlugMiddleware | review |
| [00011-contract-docblock-reference](00011-contract-docblock-reference.md) | superseded da `0011-contract-docblock-reference.md` | @contract docblock reference on Actions | test: `ActionContractsAreCompleteTest.php` |
| [0002-queueable-actions-over-framework-jobs](0002-queueable-actions-over-framework-jobs.md) | accepted | Le operazioni applicative usano Queueable Actions, non Job duplicati | test: `NoJobsTest.php`, `NoServicesTest.php` |
| [0003-pest-as-test-runner](0003-pest-as-test-runner.md) | accepted | Pest e' il formato e il runner dei test applicativi | comando |
| [0004-one-model-one-migration](0004-one-model-one-migration.md) | accepted | Ogni modello persistente ha una migrazione owner | test: `MigrationConventionsTest.php` |
| [0005-owner-local-documentation](0005-owner-local-documentation.md) | accepted | Le decisioni vivono nella documentazione dell'owner | test: `PackagesHaveContractsAndAdrTest.php` |
| [0006-no-standalone-livewire-widgets](0006-no-standalone-livewire-widgets.md) | superseded da `0008-filament-widgets-over-standalone-livewire.md` | Nessun Livewire standalone: usare Filament Widget | test: `AuthSchemaDelegationContractTest.php`, `NoLivewireDirectoriesInModulesTest.php` |
| [0006-xot-base-extension-points](0006-xot-base-extension-points.md) | accepted | I moduli estendono i punti base Xot del framework | test: `ArchitectureTest.php` |
| [0007-module-local-pest-testcase-binding](0007-module-local-pest-testcase-binding.md) | accepted | Il TestCase Pest si lega nel file di test che lo usa | test: `ModulePestBootstrapDoesNotBindTestCaseTest.php` |
| [0008-filament-widgets-over-standalone-livewire](0008-filament-widgets-over-standalone-livewire.md) | accepted | No standalone Livewire, usa Filament widget | test: `NoLivewireDirectoriesInModulesTest.php` |
| [0009-laravel-bootstrap-provider-registry](0009-laravel-bootstrap-provider-registry.md) | accepted | Bootstrap Laravel 13 minimale e discovery dei moduli | comando |
| [0010-no-ticket-logic-in-page-slug-middleware](0010-no-ticket-logic-in-page-slug-middleware.md) | accepted | Ticket logic rimossa da PageSlugMiddleware | comando |
| [0011-contract-docblock-reference](0011-contract-docblock-reference.md) | accepted | @contract docblock reference su Actions | test: `ActionContractsAreCompleteTest.php` |
| [0012-behavioral-contract-governance](0012-behavioral-contract-governance.md) | accepted | Governance dei Behavioral Contract con invarianti verificabili | test: `ActionContractsAreCompleteTest.php`, `PackagesHaveContractsAndAdrTest.php` |
| [0013-dati-sacri-migrazioni-e-test](0013-dati-sacri-migrazioni-e-test.md) | accepted | I dati sono sacri: mai migrate:fresh/reset/rollback/force, mai RefreshDatabase, test solo con .env.testing | test: `GuardTest.php` |
| [0014-merge-misto-ultima-spiaggia](0014-merge-misto-ultima-spiaggia.md) | accepted | La risoluzione mista dei conflitti Git è l'ultima spiaggia, non la strategia | comando |
| [0014-mixed-last-resort](0014-mixed-last-resort.md) | superseded da `0015-mixed-solo-come-ultima-spiaggia.md` | mixed solo come ultima spiaggia | comando |
| [0015-mixed-solo-come-ultima-spiaggia](0015-mixed-solo-come-ultima-spiaggia.md) | accepted | mixed solo come ultima spiaggia: tipi veri, narrowing al confine, motivazione scritta | comando |
| [0016-action-names-get-not-resolve](0016-action-names-get-not-resolve.md) | accepted | I nomi delle Queueable Action non iniziano con Resolve | comando |
| [0018-agent-harness](0018-agent-harness.md) | accepted | Harness minimo per gli agenti: ambiente leggibile, memoria verificabile, guard sulle azioni vietate | test: `GuardTest.php` |
| [0019-architecture-rules-phparkitect](0019-architecture-rules-phparkitect.md) | superseded da `0020-architecture-tests-pest-arch.md` | Le regole architetturali sulle classi si verificano con PHPArkitect, con baseline | review |
| [0020-architecture-tests-pest-arch](0020-architecture-tests-pest-arch.md) | accepted | Le regole di architettura si verificano con Pest arch(), con ambito esplicito e debito dichiarato | comando |
| [0021-auth-register-livewire-tenant-url-defaults](0021-auth-register-livewire-tenant-url-defaults.md) | accepted | La registrazione pubblica non eredita il tenant URL di Filament | test: `SetDefaultTenantForUrlsMiddlewareTest.php` |
| [0022-bashscripts-e-claude-fuori-dal-versionamento](0022-bashscripts-e-claude-fuori-dal-versionamento.md) | accepted | bashscripts e .claude non si versionano nel root | test: `TenantConfigTrackedTest.php` |
| [0028-mixed-is-last-resort](0028-mixed-is-last-resort.md) | superseded da `0015-mixed-solo-come-ultima-spiaggia.md` | mixed solo come ultima spiaggia | review |
| [0029-no-shared-empty-route-file](0029-no-shared-empty-route-file.md) | accepted | Nessun file di route vuoto condiviso in Modules/Xot/routes/empty.php (Stato attuale: il codice contraddice) | test: `NoSharedEmptyRouteFileTest.php`, `CanonicalEmptyRouteEntrypointsTest.php` |
| [0031-one-model-one-migration](0031-one-model-one-migration.md) | superseded da `0004-one-model-one-migration.md` | Un modello persistente, una migrazione di creazione | review |
| [0033-pest-over-phpunit](0033-pest-over-phpunit.md) | superseded da `0003-pest-as-test-runner.md` | Pest come framework di test | comando |
| [0034-pest-testcase-binding-per-file](0034-pest-testcase-binding-per-file.md) | superseded da `0007-module-local-pest-testcase-binding.md` | Il TestCase di modulo si lega in ogni file di test, mai con uses()->in() nel Pest.php del modulo | test: `ModulePestBootstrapDoesNotBindTestCaseTest.php` |
| [0035-queueable-actions-over-jobs](0035-queueable-actions-over-jobs.md) | superseded da `0002-queueable-actions-over-framework-jobs.md` | Queueable Actions al posto di Job duplicati | review |
| [0036-route-entrypoints-canonical-empty](0036-route-entrypoints-canonical-empty.md) | superseded da `0029-no-shared-empty-route-file.md` | Xot — entrypoint route no-op canonico | test: `CanonicalEmptyRouteEntrypointsTest.php` |
| [0037-translation-key-protocol](0037-translation-key-protocol.md) | accepted | Protocollo delle chiavi di traduzione | comando |
| [0039-bmad-stories-use-madr](0039-bmad-stories-use-madr.md) | accepted | Le story BMAD usano MADR (stesso spirito del template ADR dell'harness) | test: `BmadStoriesAreMadrFormatTest.php` |
| [0040-bmad-stories-numbered-filenames](0040-bmad-stories-numbered-filenames.md) | accepted | Le story BMAD usano nomi numerati (NNNN-slug.story.md) | test: `BmadStoriesAreMadrFormatTest.php` |
| [0041-no-docs-archive-folders](0041-no-docs-archive-folders.md) | accepted | Nessuna cartella di archivio nei docs: il ripristino passa da Git (Stato attuale: il codice contraddice) | comando |
| [0042-laravel-day-harness-adoption-boundary](0042-laravel-day-harness-adoption-boundary.md) | accepted | adozione incrementale dell'harness Laravel Day | test: `PackagesHaveContractsAndAdrTest.php`, `GuardTest.php` |
| [0043-github-readme-per-pacchetto](0043-github-readme-per-pacchetto.md) | accepted | Ogni modulo e tema ha `.github/README.md`, generato da fatti verificati | test: `PackagesHaveGithubReadmeTest.php` |

Modello: [0000-template.md](0000-template.md). Regola tipizzazione trasversale (tutti i moduli): [0015 — `mixed` solo come ultima spiaggia](0015-mixed-solo-come-ultima-spiaggia.md) (formulazione estesa superseded: [0014-mixed-last-resort](0014-mixed-last-resort.md)).

## Stato di copertura

Misurato il 2026-11-26 leggendo i file (Pest non eseguito in questa passata).

| Misura | Valore |
|---|---|
| ADR (esclusi README, index, INDEX, template) | 38 |
| di cui canonici (non superseded) | 27 |
| di cui superseded da un altro ADR (alias o duplicati, mai cancellati) | 11 |
| ADR con le sei sezioni (Contesto, Driver, Alternative, Decisione, Conseguenze, Conferma) | 38 / 38 |
| Canonici con conferma che cita un test esistente | 18 / 27 |
| Canonici con conferma solo a comando | 9 / 27 |
| Canonici con conferma solo di review | 0 / 27 |
| ADR con «Stato attuale» (il codice di oggi contraddice la decisione) | 3 (`0001`, `0029`, `0041`) |

Una conferma «test» o «comando» dice che un controllo esiste, non che passa: nessun test è stato eseguito qui.

## Anomalie da conoscere (nessun file spostato o cancellato)

- **Numeri doppi**: 0006, 0014. `0006` = `0006-xot-base-extension-points` (accepted) e `0006-no-standalone-livewire-widgets` (superseded da 0008); `0014` = `0014-merge-misto-ultima-spiaggia` (accepted) e `0014-mixed-last-resort` (superseded da 0015).
- **Alias a cinque cifre**: `00010`, `00011` sono copie superseded di `0010` e `0011` (restano per i link storici).
- **Numeri non usati** (nessun file): 0017, 0023, 0024, 0025, 0026, 0027, 0030, 0032, 0038.
- **Superseded**: `00010` → `0010`, `00011` → `0011`, `0006/no` → `0008`, `0014/mixed` → `0015`, `0019` → `0020`, `0028` → `0015`, `0031` → `0004`, `0033` → `0003`, `0034` → `0007`, `0035` → `0002`, `0036` → `0029`.
- **Non sono decisioni** ma stanno in questa cartella: `README.md`, [index.md](index.md), [INDEX.md](INDEX.md) (puntatore storico a `index.md`), [0000-template.md](0000-template.md). Nessun log o piano da spostare.

## Backlog conferme

Nessun ADR canonico ha oggi una conferma solo di review.

ADR dove la conferma esiste ma è parziale (lo dice il file): `0001` (21 file in `app/Services` contraddicono `NoServicesTest`), `0004` (un solo test, su `ticket_subscribers`), `0006-xot-base-extension-points` (otto famiglie Filament su molte), `0008` (solo l'assenza di cartelle Livewire), `0013` (il guard protegge gli agenti, non la CI), `0014-merge-misto-ultima-spiaggia` (nessuna conferma automatica per la regola 1), `0021` (il caso opposto non è testato), `0029` (due test si contraddicono), `0039`/`0040` (nessun controllo su criteri di accettazione e unicità del numero), `0041` (15 cartelle vietate presenti).


## Decisioni precedenti (formato libero, non ancora ADR)

- module-admin-role-policy-bypass (riferimento non presente in questo checkout)
- security-middleware-csrf-order (riferimento non presente in questo checkout)
