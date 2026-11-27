---
title: "STORY — confine di adozione dell'harness Laravel Day"
type: story
status: in-progress
date: 2026-11-26
module: Xot
decision-makers: [utente]
qmd: "harness laravel day adozione contratti adr invarianti group pest receipt hook decisioni aperte"
related:
  - ../adr/0042-laravel-day-harness-adoption-boundary.md
  - ../adr/0018-agent-harness.md
  - ../adr/0012-behavioral-contract-governance.md
  - ./0177-sync-open-merges-markers-reappear.story.md
  - ../../../../../docs/harness-porting.md
---

# Confine di adozione dell'harness Laravel Day

## Context and Problem Statement

Il workshop `robertogallea/laravelday-harness-workshop` mostra un ciclo completo: guard prima del tool, `post-edit` con
feedback mirato, `stop` che scrive il Change Receipt, replay su fixture isolate, checkpoint per il recovery. FixCity ha
già guard, `verify-facts`, `facts`, `lessons` e `progress`, ma non receipt, checkpoint e replay. La richiesta
dell'utente (2026-11-26) è studiare il workshop, capire come adottarlo e, come primo passo, portare `docs/adr` e
`docs/contracts` di **tutti** i moduli e i temi a un livello in cui ogni promessa è leggibile e verificabile.

Domanda a cui risponde la story: quali pezzi del workshop adottiamo adesso, quali no, e come si controlla che un
contratto dica il vero?

## Decision Drivers

- Una modifica plausibile compila e passa test verdi; una corretta rispetta invarianti scritte. Un contratto senza prova
  è una dichiarazione, non una garanzia.
- Moduli e temi sono repository separati e tre agenti (Claude, Codex, Cursor) scrivono sullo stesso albero: ogni
  automatismo condiviso cambia il comportamento di tutti.
- Regola locale: niente branch, niente `reset`, forward-only; i dati non si toccano.
- Xot è condiviso con altri progetti: i suoi test non possono nominare specifiche di FixCity.

## Considered Options

- Copiare l'harness del workshop (hook, receipt, checkpoint, branch didattici): scartata, duplica BMAD e guard e la
  regola locale vieta i branch.
- Solo documentazione (standard e template dei contratti): scartata da sola, perché una promessa senza test si
  deteriora senza che nessuno se ne accorga (è già successo, vedi sotto).
- Adottare il collegamento contratto ↔ `--group=<ID>` con un test che lo controlla, rimandare gli hook: scelta.

## Decision Outcome

Scelta: **collegamento verificabile promessa-prova adesso, hook e receipt dopo una decisione umana**, perché è l'unico
pezzo che previene un fallimento già visto e non cambia il comportamento degli altri agenti.

### Cosa è stato fatto (2026-11-26)

- [x] studiata la struttura del workshop e le implementazioni primarie di guard, post-edit, receipt, stop e replay;
- [x] standard + template in `Modules/Xot/docs/contracts/` e regola `docs/rules/action-behavioral-contract.md`
  (ripristinata: era stata cancellata);
- [x] confine ADR 0042 / 0018 / 0012;
- [x] ogni pacchetto (moduli e temi) ha `docs/adr/` e `docs/contracts/` con indice proprio; ADR con Driver e
  Conferma; audit a zero sui gap ADR;
- [x] contratti a sei sezioni (Input, Output, Invarianti, Effetti collaterali, Errori, Non fa) e `@see` + `@contract` nel
  docblock delle Action che scrivono dati o chiamano servizi esterni;
- [x] `Modules/Xot/tests/Unit/Docs/ContractInvariantsAreProvenTest.php`: ogni invariante dichiarata provata ha un
  `->group('<ID>')` o `#[Group('<ID>')]`; ogni ID è definito da un solo contratto; ogni group `<SCOPE>-INV-<N>` ha la
  riga di contratto;
- [x] causa dei contratti spariti trovata e corretta in locale (`docs-ceiling-100.py`, vedi story 0177);
- [ ] annotare con `->group()` i test che già asseriscono una regola (in corso, per pacchetto);
- [ ] hook SessionStart/PostToolUse/Stop e receipt automatico: **[ATTESA-UMANO]**;
- [ ] checkpoint e replay: da adottare solo dopo una fixture e un fallimento reale nel worktree condiviso.

### Consequences

- Buono, perché una promessa falsa (group dichiarato e non presente, ID doppio, group orfano) ora rompe un test source-level
  senza bootstrap applicativo né database.
- Buono, perché il backlog è onesto: un'invariante «— (non dimostrato)» è elencata nel README dei contratti del pacchetto
  e non conta come errore.
- Cattivo, perché le invarianti dimostrate sono ancora poche (audit 2026-11-26 10:05, «senza group / totali»): Xot 511/604
  (erano 596 prima dell'annotazione di 85 invarianti in 59 contratti), Notify 170/215, Media 86/117, User 172/208,
  Fixcity 54/147. Il numero cala solo annotando test che asseriscono davvero la regola.
- Cattivo, perché tre Action Fixcity che scrivono non hanno contratto (`SetFixcityEmailNotificationPreferenceAction`,
  `EnsureTicketCitizenRatingDefinitionAction`, `GenerateTicketsAction`) e 10 Action Geo che chiamano geocoder esterni sono
  ancora nel backlog; le altre voci che l'audit segnala per Fixcity, Blog e Comment sono letture o logica pura.
- Cattivo, perché il test non vede un contratto **cancellato**: solo promesse senza prova.

### Difetti di codice trovati scrivendo i contratti (documentati, non corretti)

Elenco completo e ragioni nella memoria di progetto; qui i punti che richiedono una decisione di dominio:

- **Privacy**: log con testo dei cittadini (AI `MakeAIRequestAction`), IP e scelte di consenso (Gdpr), `fiscal_code` e
  `$request->all()` nei controller SPID/CIE, email del destinatario (Fixcity `RecordTicketCommunicationAction`).
- **SPID latente** (Sixteen `SpidAuthAction`): verifica la firma su `SignedInfo` con certificato fissato per impronta, ma
  non il digest di `Reference` né `InResponseTo` (rischio di signature wrapping). `SIXTEEN_SPID_ENABLED` è `false`, nessun
  bottone punta a SPID/CIE: critico solo se si attiva il flag.
- **Autorizzazione**: Media `StreamVideoAction` salta il controllo di proprietà se `$media` è null; Xot
  `ExportTreeXlsAction` e `ExportXlsTableAction` senza `authorize`; `ExecuteArtisanCommandAction` consente `migrate`;
  Lang `SyncTranslationsAction` non valida `$specificModule`.
- **Test contro codice**: `NoSharedEmptyRouteFileTest` (ADR 0029) contraddice `CanonicalEmptyRouteEntrypointsTest`;
  Notify `SendNotificationActionTest.php:94,115` aspettano `bool` da un'Action che ritorna `?Notification`.

### Confirmation

- `bash bashscripts/tools/pest-scratch-db.sh Modules/Xot/tests/Unit/Docs/ContractInvariantsAreProvenTest.php`: 3 passed,
  exit 0 (2026-11-26).
- `cd laravel && ./vendor/bin/phpstan analyse Modules`: exit 0, zero righe di errore (2026-11-26 10:07, dopo l'ultima
  scrittura degli agenti; cache dei risultati attiva). Misura puntuale: altri attori scrivono ancora nell'albero.
- Insieme `ContractInvariantsAreProvenTest`, `StoryNumbersAreUniqueTest`, `AdrFilenamesAreNumberedTest`,
  `ActionContractsAreCompleteTest`, `PackagesHaveContractsAndAdrTest`: 11 passed, exit 0 (runner `pest-scratch-db.sh`).
- Difetti nei test di Xot trovati annotando i group (non corretti): `Assert::fail()` dentro un `try` con `catch (Exception)`
  (`ArrayArrActionsTest.php:41-48`, `GetModelActionsTest.php:28-33,71-76`: `AssertionFailedError` è una `Exception`, il
  test passa anche senza eccezione), `expectNotToPerformAssertions` (`GetAllModelsActionTest.php:60-70`), test tautologici
  o `->todo()` (`PdfActionsTest.php:16-21`, `ParsePrintPageStringActionTest.php:19,26`, `FileActionsTest.php:15-41`).
  L'elenco completo e le motivazioni stanno nel «Backlog test» di `Xot/docs/contracts/README.md`.
- Non verificato: i test annotati dagli agenti con `->group()` non sono stati eseguiti uno per uno; gli intervalli «righe
  N-M» nelle tabelle dei contratti possono avere uno scarto di 1-5 righe; i 236 contratti Xot preesistenti non sono stati
  rivalidati riga per riga.

### Decisioni umane aperte

- **[ATTESA-UMANO]** Hook condivisi del workshop (SessionStart/PostToolUse/Stop, receipt): proposta, solo segnalazione senza
  blocco.
- **[ATTESA-UMANO]** Push in `bashscripts` del fix di `docs-ceiling-100.py` e avviso all'altra macchina (story 0177).
- **[ATTESA-UMANO]** Quale dei due test di rotte tenere (ADR 0029 o `CanonicalEmptyRouteEntrypointsTest`); se `migrate` resta
  tra i comandi consentiti; cancellare `ModuleCommandHandler` e l'alias in `app/Services`.
- **[ATTESA-UMANO]** `app/Services` di Geo (8 file) contro l'ADR 0004; `FolioServiceProvider` di Cms contro l'ADR
  `folio-volt-sole-owner`; retention dei log di AI e Gdpr.
- **[ATTESA-UMANO]** Ruoli di `INDEX.md` e `README.md` nei contratti (Notify ha `index.md` e `INDEX.md`), prefisso `ACT-` o
  `ACTIVITY-` in Activity, Notify ADR 0003 ancora `proposed`.
