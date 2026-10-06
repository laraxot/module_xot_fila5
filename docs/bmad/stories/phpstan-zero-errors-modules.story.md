---
title: "PHPStan zero errori su Modules"
status: in_progress
epic: code-quality
acceptance_criteria:
  - PHPStan `analyse Modules` riporta 0 errori
  - Tutte le modifiche rispettano le convenzioni del progetto
  - Docs moduli riorganizzate/aggiornate
references:
  - /tmp/phpstan-full-output.txt
---

# PHPStan zero errori su Modules

## Contesto
PHPStan è stato eseguito e ha riportato 531 errori. L'obiettivo è risolverli tutti
senza aggiungere `@phpstan-ignore`, baseline o cast silenziatori.

## Note
- Non modificare `vendor/`
- Non aggiungere `@phpstan-ignore` a meno che non sia l'unica opzione valida
- Dopo ogni modulo sistemato, rieseguire PHPStan per verificare
- Aggiornare/organizzare le `docs/` del modulo se presenti
