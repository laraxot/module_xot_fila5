---
title: "Regola MySQL/MariaDB per i test"
type: rule
status: canonical-pointer
created: 2026-09-26
updated: 2026-09-26
tags: [testing, mysql, mariadb, database, security]
qmd: "MySQL MariaDB test-only database credentials no SQLite"
issues:
  - "https://github.com/laraxot/base_fixcity_fila5/issues/383"
discussions:
  - "https://github.com/laraxot/base_fixcity_fila5/discussions/392"
---

# Regola MySQL/MariaDB per i test

I test usano MySQL/MariaDB con database `_test`; SQLite è vietato. L'account DB deve essere
dedicato e privo di accesso alle basi di sviluppo. Non copiare segreti da `.env`.

La procedura canonica, il caricamento `.env.testing`, i divieti di `RefreshDatabase` e
`migrate:fresh` sono documentati in
[Strategia database per i test](../testing-database-strategy.md).
