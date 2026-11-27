---
qmd: "contratto di comportamento action behavioral contract input output invarianti effetti collaterali errori non fa adr verifica harness group pest INV"
title: "Regola — ADR e contratti di comportamento in ogni modulo e tema (harness)"
type: rule
module: Xot
tags: [rule, actions, contract, adr, harness, ai-readability, testing]
created: 2026-11-18
updated: 2026-11-24
status: active
related:
  - ../adr/agent-harness.md
  - ../concepts/agent-harness-guide.md
  - ../../tests/Unit/Docs/ActionContractsAreCompleteTest.php
  - ../../tests/Unit/Docs/PackagesHaveContractsAndAdrTest.php
---

# ADR e contratti di comportamento

Perché esiste (in breve, il resto in [agent-harness-guide](../concepts/agent-harness-guide.md)): un agente AI, e una persona
nuova, copiano **il codice più vicino**, difetti compresi. Quello che non è scritto non esiste per loro, e quello che è
scritto ma non verificato invecchia in silenzio. Per questo ogni modulo e tema ha due cartelle, e un test le controlla:

| Cartella | Risponde a | Si legge quando |
|---|---|---|
| `docs/adr/` | **perché** il codice ha questa forma e non un'altra | devi scegliere tra due forme di codice, o vuoi "semplificare" qualcosa che sembra strano |
| `docs/contracts/` | **cosa promette** un'Action o un'interfaccia (e cosa *non* fa) | prima di chiamare, modificare o imitare un'Action che scrive dati o parla con l'esterno |

Ciascuna ha un `README.md` che spiega il formato ed elenca **tutti** i file della cartella (il test lo verifica).

## ADR

Un ADR solo se la decisione è **difficile da invertire, sorprendente, o frutto di un trade-off reale**. Le convenzioni
ovvie non sono ADR. Nome file = argomento in kebab-case, **mai date né numeri** (`osm-proxy-tile-nominatim.md`).

```markdown
---
title: "ADR — <decisione in una riga>"
type: decision
status: proposed | accepted | superseded | deprecated
created: AAAA-MM-GG
updated: AAAA-MM-GG
---

# ADR: <decisione>

## Contesto        fatti, misure, vincoli, incidenti; chiude con la domanda a cui la decisione risponde
## Decisione       cosa si fa in concreto e dove sta nel codice (path reali)
## Alternative scartate   ogni alternativa seria e perché no
## Conseguenze     buono / cattivo / debito che resta
## Verifica        come una macchina (test, arch(), PHPStan) o una revisione controlla che il codice la rispetti
```

`## Verifica` è il pezzo che trasforma la decisione da prosa in sensore: nomina il test che fallisce se qualcuno la viola
(o, se non c'è ancora, dichiara il debito: "solo revisione: …"). Chi cambia la decisione scrive un nuovo ADR e segna il
vecchio `status: superseded` con `superseded_by:`.

## Contratti di comportamento delle Action

Un file per Action, nome in kebab-case della classe (`create-ticket-action.md`), frontmatter `type: contract` e
`action: "<FQCN>"`, sei sezioni nell'ordine:

```markdown
## Input
## Output
## Invarianti
## Effetti collaterali
## Errori
## Non fa
```

Le **Invarianti** sono una tabella con ID stabile `<PREFISSO>-INV-<N>` (prefisso = modulo + operazione, es. `GEO-TILE-INV-1`):

```markdown
| ID | Regola | Group Pest |
|---|---|---|
| GEO-TILE-INV-1 | Mai più di una richiesta a OSM per tile prima della scadenza. | `GEO-TILE-INV-1` |
| GEO-TILE-INV-2 | User-Agent sempre identificabile. | — |
```

- Colonna `Group Pest` valorizzata → esiste nei `tests/` del pacchetto un test con `->group('<ID>')`; si lancia con
  `vendor/bin/pest Modules/<M>/tests --group=<ID>`. Il test lo verifica.
- `—` = invariante **non ancora coperta**: debito dichiarato, visibile, non nascosto.
- Gli ID non si rinumerano: un'invariante abolita resta in tabella barrata o si toglie, il suo ID non si riusa.

«Non fa» è la sezione che evita più errori: dice dove *non* cercare un comportamento e dove cercarlo, e soprattutto cosa
un agente non deve aggiungere "per completezza".

Il docblock dell'Action rimanda al file, così chi legge il codice lo trova (`@contract` è il marcatore cercato dagli strumenti):

```php
/**
 * Unico punto di creazione di una segnalazione.
 *
 * @contract docs/contracts/create-ticket-action.md
 */
```

Vale anche la forma storica `Contratto di comportamento: docs/contracts/<file>.md`.

Un contratto di codice legacy descrive il comportamento **com'è**, difetti compresi, e lo dice in «Non fa» o in un ADR:
documentare non autorizza a imitare.

## Quando

- Ogni Action nuova o modificata che scrive dati, chiama un servizio esterno o ha effetti collaterali → contratto.
- Le Action pure (formattano, calcolano) possono farne a meno.
- Ogni scelta tra due forme di codice che un revisore potrebbe contestare → ADR.

## Verifica

```bash
cd laravel && vendor/bin/pest Modules/Xot/tests/Unit/Docs/PackagesHaveContractsAndAdrTest.php \
  Modules/Xot/tests/Unit/Docs/ActionContractsAreCompleteTest.php
```

- `PackagesHaveContractsAndAdrTest`: ogni modulo e tema ha `docs/adr/README.md` e `docs/contracts/README.md`; ogni ADR ha
  frontmatter `type: decision` e `status` valido, le cinque sezioni, nessuna data nel nome; ogni README elenca tutti i file.
- `ActionContractsAreCompleteTest`: ogni `type: contract` ha le sei sezioni nell'ordine, la sua `action` esiste, il docblock
  rimanda al file, ogni ID di invariante ha il formato giusto e, se dichiara un group, il group esiste nei test del pacchetto;
  le Action dell'elenco `REQUIRED` hanno il contratto.

Un contratto che non corrisponde più al codice è peggio di nessun contratto: chi cambia il comportamento aggiorna il
contratto nello stesso commit, e il test dell'Action prova le righe del contratto.
