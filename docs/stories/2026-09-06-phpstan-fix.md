---
title: "2026 09 06 phpstan fix"
type: note
tags: [documentation]
created: 2026-09-26
updated: 2026-09-26
qmd: "2026 09 06 phpstan fix"
issues: []
discussions: []
---

# BMAD Story — PHPStan Fix Xot Module

## Understand
- 53 errori PHPStan nel modulo Xot
- Principali categorie:
  1. Cannot cast mixed (~40 errori)
  2. Offset access array|null (~10 errori)
  3. Parameter type errors (~3 errori)

## Plan
1. Analizzare errori per priorità
2. Fix cast mixed -> tipi specifici
3. Fix offset access array|null
4. Verificare con phpstan + phpmd + phpinsights + pest

## Implement
- Usare type check espliciti invece di cast
- Usare null coalescing per accessi array

## Verify
- phpstan Modules/Xot
- phpmd ./tools
- phpinsights ./tools
- pest

## Status
- Branch: dev
- Module: Xot
- Next: Analizza e fixa errori
