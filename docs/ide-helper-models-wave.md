---
title: "ide helper models wave"
type: note
tags: [documentation]
created: 2026-09-26
updated: 2026-09-26
qmd: "ide helper models wave"
issues: []
discussions: []
---

# IDE Helper Models Wave - 2026-03-10

## Scopo

`php artisan ide-helper:models -W` va usato per sincronizzare i PHPDoc dei modelli con lo stato reale del dominio.

## Regola operativa

- eseguire il comando solo dopo aver studiato docs e hotspot di modello;
- leggere il diff generato, non accettarlo ciecamente;
- se emergono annotazioni sbagliate o rumorose, correggerle con fix forward-only e documentati;
- dopo la wave rilanciare quality gate e aggiornare tracking GitHub.

## Nota importante

Il comando non sostituisce:

- il design del modello;
- la chiarezza delle relazioni;
- i fix manuali su wrapper upstream o modelli con comportamento dinamico.
