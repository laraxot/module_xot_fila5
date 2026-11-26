---
title: PHPStan Modules zero gate
description: Contratto durevole per mantenere PHPStan verde su tutti i moduli.
---

# PHPStan Modules zero gate

Il gate analizza l'intero albero `laravel/Modules`, inclusi i test. Il bootstrap deve quindi poter caricare `Tests\TestCase`; un conflitto Git o una classe di test non risolvibile produce centinaia di falsi errori a cascata e nasconde gli errori reali di produzione.

## Procedura

1. Eseguire dalla directory `laravel`:

   ```bash
   ./vendor/bin/phpstan analyse Modules
   ```

2. Se il bootstrap fallisce, correggere prima sintassi, conflitti e autoload. Non classificare il report come inventario PHPStan finché l'applicazione non si avvia.
3. Raggruppare gli errori per contratto e correggere la sorgente: tipi nativi per costanti e firme, shape/generics per dati, helper sul `TestCase` proprietario quando il comportamento appartiene al bootstrap dei test.
4. Non aggiungere baseline, ignore, cast o un nuovo file `.neon` per nascondere il problema.

## Correzione durevole applicata

Il gate ha trovato quattro rilievi di `typeCoverage.constantTypeCoverage`: due sulle costanti TTL/lock di `SubmitTicketOnceAction` e due sulle whitelist della guardia database. La soluzione è stata tipizzare le costanti (`int` e `array`) senza alterare la sicurezza del flusso.

Verifica conclusiva: `analyse Modules` termina con exit code `0` usando la configurazione esistente.
