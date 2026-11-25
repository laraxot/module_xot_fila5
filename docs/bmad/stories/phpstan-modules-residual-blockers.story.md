---
title: "PHPStan Modules: blocchi residui e stato verificato"
type: story
module: Xot
status: blocked
qmd: "phpstan modules residui mailjet composer lock drift test database contratti superseded"
---
# PHPStan Modules: blocchi residui

## Context and Problem Statement

Problema e obiettivo sono descritti nel Decision Outcome (migrazione automatica a MADR).

## Decision Drivers

- Richiesta utente / acceptance criteria della story
- Vincoli BMAD, second brain, Pest gate e dati sacri

## Considered Options

- Status quo (non fare)
- Implementare come descritto nel Decision Outcome

## Decision Outcome

Scelta: **implementare**, perché i driver sopra.

## Obiettivo

Portare `php -d memory_limit=2G ./vendor/bin/phpstan analyse Modules` a zero errori, senza soppressioni, e correggere le cause di fondo trovate durante l'analisi.

## Esito verificato

- Baseline: PHPStan si fermava con un `syntax error` (`ProgressioneVerticale.php` e relativo test con marker di merge non risolti). Risolto: il parse ora passa.
- Errori finali: **3 segnalazioni, tutte in `Modules/Notify/app/Actions/Mail/Mailjet/CreateMailjetTransportAction.php`** (`class.notFound` su `MailjetTransportFactory`). Il resto del perimetro è pulito.
- `Modules/Xot/app/Mixins/PanelMixin.php`: `Module::find()` del facade dichiara il ritorno non-nullable, ma l'interfaccia (`FileRepository::find`) restituisce `?Module`. Lookup spostato su `RepositoryInterface` (tipo onesto). Già presente in HEAD (`69c5e4aaf0`).
- `Modules/Xot/tests/Unit/Docs/ActionContractsAreCompleteTest.php`: foreach su costante vuota (punto di estensione). Ora `actionContractRequired(): list<string>`.
- Contratti `Modules/*/docs/contracts`: 11 violazioni del test `ActionContractsAreCompleteTest` corrette:
  - Frontmatter `action:` puntato a Model/Policy/Trait con FQCN corretto (senza `::class`, senza metodo).
  - Marker `@contract docs/contracts/<file>` aggiunto ai docblock di 7 classi.
  - Tre contratti per Action rimosse (`CopyLastYearAction`, `DocumentDeliveryAction`, `CompilaSchedaAction`) marcati `type: contract-superseded` + `status: superseded`.

## Blocco 1: dipendenze (decisione richiesta)

`composer.json` (HEAD) dichiara `symfony/mailjet-mailer ^8.1` e `maatwebsite/excel ^4.0`, ma `composer.lock` non ha `symfony/mailjet-mailer` e fissa `maatwebsite/excel 3.1.70`. Un `composer update symfony/mailjet-mailer -W --dry-run` rifiuta la risoluzione. Un update mirato dry-run:

- rimuoverebbe decine di pacchetti dev (tra cui pint, boost, phpinsights, testbench),
- farebbe major jump su `maatwebsite/excel` 3→4 e `phpoffice/phpspreadsheet` 1.30→5.12, usati da `Modules/Xot/app/Actions/Export/*`, `Modules/Xot/app/Exports/*`, `Modules/Sigma/app/Services/SigmaService.php`, `Modules/Progressioni/app/Imports/CedDiffImport.php`.

**Non eseguito senza decisione.** Opzioni: (a) allineare lock e composer.json in un commit dedicato con test Export verdi; (b) rimuovere `symfony/mailjet-mailer` e il driver Mailjet se non serve più.

## Blocco 2: test non eseguibili qui

- `.env.testing` punta a `DB_HOST=10.100.200.53` (remoto). `Modules/Xot/tests/Support/TestDatabaseGuard.php` rifiuta correttamente l'host non locale.
- MySQL locale in ascolto su `*:3306`, ma `127.0.0.1:3306` rifiuta la connessione.
- Risultato Pest su `Modules/Xot/tests`: 1437 falliti / 24 passati, causa principale: guard DB. Non è una regressione del codice, ma non è nemmeno un verde.
- Pest del solo `ActionContractsAreCompleteTest`: 2/2 verdi.

## Effetti collaterali ambientali

- `composer dump-autoload` e `php artisan package:discover` rigenerati: l'autoload puntava a `vendor/symfony/mailjet-mailer` assente; la cache `bootstrap/cache/packages.php` elencava un provider Mailjet stale. Entrambe sono file generati e ignorati da git.

## Fuori perimetro, segnalato

- 121 file con marker di conflitto (`<<<<<<<`) in `.md`/`.yml` del repo (soprattutto `docs/wiki/analysis/modules/ui/`). Non risolti automaticamente: il contenuto va letto caso per caso.
- Lock stale `bashscripts/lock/phpstan-modules-swarm-session.lock` (PID 214410 non attivo dal 2026-11-17).

## Acceptance criteria

- [x] PHPStan parse senza `syntax error` su `Modules/`
- [x] Errori Xot/Ptv/Progressioni/Sigma corretti senza `@phpstan-ignore`
- [x] `ActionContractsAreCompleteTest` verde (2/2)
- [ ] Mailjet: dipendenza allineata (decisione richiesta)
- [ ] Suite Pest completa verde (richiede DB di test locale)


### Consequences

- Buono, perché chiude il gap descritto nel Context
- Cattivo, perché richiede write-back docs, lock e quality gate

### Confirmation

Aggiungere prova ripetibile (Pest exit code + conteggio, PHPStan, o skip host documentato).
