---
title: "database testing rule"
type: note
tags: [documentation]
created: 2026-09-26
updated: 2026-09-26
qmd: "database testing rule"
issues: []
discussions: []
---

# Database testing rule — riferimento canonico

Usare MySQL/MariaDB e database con suffisso `_test`; non usare SQLite, `RefreshDatabase`
né `migrate:fresh`. Il contratto completo e aggiornato, inclusa la gestione sicura delle
credenziali, è nella [strategia database per i test](testing-database-strategy.md).

Gli esempi storici contenuti nelle copie precedenti sono superati e non devono essere usati
come template di configurazione.
