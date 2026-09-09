---
id: pest-coverage-increase
slug: pest-coverage-all-modules
<<<<<<< HEAD
scope: [project:<repo progetto>, modules:All 52]
=======
scope: [project:base_workorder_fila5, modules:All 52]
>>>>>>> laraxot/dev
status: Pending
priority: High
created: 2026-09-06
---

## Problema
Pest coverage non incrementato dopo fix.

## Tool
```bash
vendor/bin/pest Modules/[Module]/tests --coverage
```

## Solution
1. Aumentare coverage per ogni modulo
2. Target: +5% per modulo fixato
3. Git sync

## Acceptance Criteria
- [ ] Coverage aumentato per ogni modulo
