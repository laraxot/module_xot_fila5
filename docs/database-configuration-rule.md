---
title: "database configuration rule"
type: note
tags: [documentation]
created: 2026-09-26
updated: 2026-09-26
qmd: "database configuration rule"
issues: []
discussions: []
---

# Database Configuration Rule

Keep module connections under the owning module/provider architecture; do not add ad hoc
module entries to `config/database.php`. Check the actual provider implementation before
assuming connection names or database naming behavior.

Use placeholders or dedicated environment variables for credentials. Never commit real
usernames/passwords or copy development credentials into test configuration. For the current
MySQL/MariaDB test contract, `_test` database isolation, and safe setup, follow
[`testing-database-strategy.md`](testing-database-strategy.md).
