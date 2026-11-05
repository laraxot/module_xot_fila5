---
title: "Metodi Eloquent nei trait dedicati"
type: rule
module: Xot
status: active
created: 2026-11-05
updated: 2026-11-05
tags: [eloquent, model, traits, mutators, relationships, architecture]
qmd: "Eloquent model mutator helper relationship methods dedicated traits Models Traits Mutators Relationships extraction"
related:
  - ../index.md
  - ../../bmad/stories/model-methods-traits-extraction.story.md
  - ./accessor-twin-method.md
---
# Metodi Eloquent nei trait dedicati

## Regola

Le classi modello mantengono la composizione e la configurazione del modello. I metodi
che implementano mutazioni o calcoli di attributi, i relativi helper e le relazioni
Eloquent non restano nel corpo della classe modello: vanno estratti in trait dedicati
sotto `app/Models/Traits/`:

- mutatori, accessor e helper di mutazione in `Mutators/`;
- `belongsTo`, `hasMany`, `morph*` e gli altri metodi di relazione in `Relationships/`.

Il modello importa i trait con `use` e mantiene lo stesso nome e la stessa firma dei
metodi, così la superficie Eloquent per i chiamanti non cambia. Ogni trait ha una
responsabilità chiara e un nome specifico del modello o del comportamento; evitare un
unico `CommonTrait` che accumula logiche non correlate.

Quando un accessor `get{X}Attribute()` ha un gemello `get{X}()`, estrarre entrambi
insieme nello stesso file. L'accessor deve invocare il gemello locale. Non spostare la
coppia in due trait diversi: la regola di co-locazione del [gemello accessor](./accessor-twin-method.md)
è parte del contratto.

## Perché

- Una classe modello piccola rende visibile quali capacità compone.
- Il trait assegna ownership e testabilità alla logica di mutazione e alle relazioni.
- La co-locazione evita helper dichiarati in un file diverso dall'accessor e riduce
  divergenze tra calcolo chiamabile e calcolo eseguito da Eloquent.
- Tenere metodi di relazione nello stesso gruppo semplifica l'analisi delle dipendenze,
  degli eager load e dei trait che possono fare shadowing.

## Procedura di estrazione

1. Verificare i chiamanti, i trait già usati e ogni dichiarazione omonima prima di
   spostare un metodo.
2. Creare o riusare il trait owner in `app/Models/Traits/Mutators/` oppure
   `app/Models/Traits/Relationships/`.
3. Spostare il metodo e il suo helper in un'unica operazione, mantenendo namespace,
   PHPDoc, visibilità, tipo di ritorno e logica.
4. Importare il trait nel modello e rimuovere la dichiarazione originale; non lasciare
   un override duplicato nel modello.
5. Verificare la reflection del modello composto, le relazioni effettive, i test e
   PHPStan del modulo.

Gli scope Eloquent, i casts, le proprietà di configurazione e gli accessor moderni
`Attribute` non si spostano automaticamente: decidere per responsabilità e verificare
le convenzioni specifiche del modulo.

## Riferimenti

- Story cross-modulo: [estrazione dei metodi modello in trait](../../bmad/stories/model-methods-traits-extraction.story.md).
- Pattern esistente: [co-locazione getter/accessor Sigma](../../../../Sigma/docs/wiki/concepts/scheda-mutator-getter-colocation.md).
