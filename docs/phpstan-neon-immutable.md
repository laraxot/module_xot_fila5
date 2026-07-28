---
title: "phpstan.neon immutabile (Xot bridge)"
type: concept
tags: [phpstan, neon, immutable, agents]
created: 2026-06-11
updated: 2026-07-22
qmd: "phpstan neon immutabile solo utente laravel phpstan no temp"
issues:
  - "https://github.com/provtv/base_ptv_fila5/issues/180"
related:
  - "../../../../docs/wiki/guidelines/phpstan-config-immutability.md"
  - "../../../../docs/wiki/memories/phpstan-neon-immutable-agents.md"
---

# phpstan.neon immutabile

## Regola critica (sacro)

`laravel/phpstan.neon` è l'**unico** config PHPStan. **Solo l'utente** lo modifica.

## Vietato

- Modificare `laravel/phpstan.neon`
- Creare `phpstan.neon.dist` / neon temp / `-c` verso altri file
- Bypass `excludePaths` con clone di config

## Comando

```bash
cd laravel
./vendor/bin/phpstan analyse Modules --memory-limit=-1
```

## Canon root

- [phpstan-config-immutability.md](../../../../docs/wiki/guidelines/phpstan-config-immutability.md)
- [phpstan-neon-immutable-agents.md](../../../../docs/wiki/memories/phpstan-neon-immutable-agents.md)
- `.cursor/rules/phpstan-neon-immutable.mdc`
