---
title: "Standard di authoring dei Behavioral Contract"
type: standard
module: Xot
owner: Xot
status: accepted
created: 2026-11-26
updated: 2026-11-26
qmd: "behavioral contract authoring standard invariants Pest harness receipt"
---

# Standard di authoring dei Behavioral Contract

Questo documento è il riferimento comune per `docs/contracts/` di tutti i moduli e
temi. Il contratto appartiene al package che possiede l'Action o l'interfaccia; non
si crea un catalogo duplicato nel root.

Fonte metodologica: [laravelday-harness-workshop](https://github.com/robertogallea/laravelday-harness-workshop).
FixCity adotta i suoi pattern di separazione fra promessa, prova e receipt senza
copiarne dominio, hook o lifecycle.

## Quando serve

Scrivere un contratto quando una superficie pubblica persiste dati, modifica stato,
chiama un servizio esterno, invia notifiche, tratta dati personali o garantisce
un'invariante di dominio. Una funzione interna di sola composizione non richiede un
contratto autonomo.

## Formato minimo

Il file usa frontmatter con `type: contract`, `action: <FQCN>` (oppure
`interface: <FQCN>`) e contiene queste sezioni, nello stesso ordine:

```markdown
## Input
## Output
## Invarianti
## Effetti collaterali
## Errori
## Non fa
```

Il nome è kebab-case, senza date o timestamp. Gli ID delle invarianti sono stabili,
specifici dell'owner e compaiono anche nel gruppo Pest omonimo, quando esiste una
prova automatica.

## Collegamento al codice e alla prova

La classe implementatrice contiene `@see` verso il documento owner e il marker
machine-readable `@contract docs/contracts/<file>.md`. Il test che dimostra
l'invariante usa `->group('<ID>')`; il comando ripetibile va indicato nell'indice
locale del package. Contratto, codice e test cambiano insieme.

Un contratto può dichiarare `—` per una prova ancora mancante, ma deve descrivere il
debito e il prossimo controllo. Non usare `mixed`, cast o `@phpstan-ignore` per
nascondere una violazione del contratto.

## Verifica con l'harness

La prova minima è source-level e resta eseguibile anche se Laravel non fa bootstrap:

```bash
cd laravel
vendor/bin/pest Modules/Xot/tests/Unit/Docs/ActionContractsAreCompleteTest.php
vendor/bin/pest Modules/Xot/tests/Unit/Docs/PackagesHaveContractsAndAdrTest.php
php ../.harness/bin/verify-facts
```

La story BMAD del modulo owner conserva il perimetro e le decisioni di lavoro; un
ADR registra solo scelte architetturali difficili da invertire. Il receipt completo
del workshop resta opzionale finché non esiste un test owner-local che lo renda
utile.
