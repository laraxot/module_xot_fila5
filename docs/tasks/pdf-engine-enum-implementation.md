---
title: "Task: PdfEngineEnum Implementation"
module: "Xot"
type: concept
tags: [pdf, engine, enum, implementation]
created: 2026-07-14
updated: 2026-07-14
qmd: "pdf engine enum implementation"
related:
  - "./eloquent-magic-properties-rule.md"
---
# Task: PdfEngineEnum Implementation

**Modulo**: Xot  
**Fase**: 1 - Completamento Funzionalità Core  
**Priorità**: Media  
**Stima**: 2-4 ore

## Obiettivo

Implementare enum completo per PDF engines. Attualmente in `app/Actions/Pdf/PdfEngineEnum.php` è presente uno stub temporaneo.

## Sottotask

- [ ] Analizzare engines PDF disponibili nel progetto (Html2Pdf, Spatie, ecc.)
- [ ] Definire casi enum e valori
- [ ] Implementare metodi helper (label, config, driver)
- [ ] Aggiungere test unitari per l'enum
- [ ] Aggiornare documentazione modulo

## Dipendenze

Nessuna.

## Collegamenti

- [Roadmap Xot](roadmap.md)
- [Lista task Xot](tasks-index.md)
