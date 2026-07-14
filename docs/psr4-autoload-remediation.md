---
title: "PSR-4 Autoload Remediation (2026-03-09)"
module: "Xot"
type: concept
tags: [psr4, autoload, remediation]
created: 2026-07-14
updated: 2026-07-14
qmd: "psr4 autoload remediation"
related:
  - "./eloquent-magic-properties-rule.md"
---
# PSR-4 Autoload Remediation (2026-03-09)

## Contesto

Durante `composer dump-autoload --no-scripts` sono emersi warning PSR-4 su classi helper nei test.

## Strategia adottata

1. evitare classi helper nominate inline nei test quando non necessarie
2. usare factory function + anonymous class nei test di supporto
3. mantenere namespace test coerente con `Modules\\Xot\\Tests\\`

## Obiettivo

Ridurre warning autoload e mantenere suite test più robusta, senza modificare regole globali (`phpstan.neon` immutabile).

