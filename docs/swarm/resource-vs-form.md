<<<<<<< HEAD
=======
---
title: "resource vs form"
type: note
tags: [documentation]
created: 2026-09-26
updated: 2026-09-26
qmd: "resource vs form"
issues: []
discussions: []
---

>>>>>>> laraxot/dev
# SWARM V2 — Regola architetturale + Rimozione getFormSchema da Resource

**Swarm ID:** `swarm-resource-vs-form`
**Trigger:** `XotBaseResource` non deve avere `getFormSchema()`; solo `XotBaseResourceForm` (via `HasXotForm`)
**Regola:** story 25

## Sub-task paralleli

| Agent | Modulo | File da fixare | Story |
|---|---|---|---|
| agent-a1 | Activity | SnapshotResource, StoredEventResource | 25a-activity |
| agent-a2 | Blog | Banner, Category, TextWidget | 25b-blog |
| agent-a3 | Bom | BomResource | 25c-bom |
| agent-a4 | Catalog | 6 file | 25d-catalog |
| agent-a5 | Cms | MenuResource | 25e-cms |

## Algoritmo comune
1. Verifica esistenza `*Form.php` nella cartella `Schemas/` del modulo
2. Rimuovi `getFormSchema()` dalla Resource
3. Rimuovi import inutilizzati (`Webmozart\Assert\Assert`, `Component`, ...)
4. Esegui PHPStan sul modulo
5. Esegui Pest (se test esistenti)
6. `php -l` su ogni file toccato
