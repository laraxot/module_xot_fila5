---
title: "La registrazione pubblica non eredita il tenant URL di Filament"
type: decision
status: accepted
created: 2026-11-25
updated: 2026-11-26
module: Xot
decision-makers: [team back office]
qmd: "auth register livewire tenant url defaults SetDefaultTenantForUrlsMiddleware referer livewire/update snapshot"
---

# La registrazione pubblica non eredita il tenant URL di Filament

> Comportamento del middleware `SetDefaultTenantForUrlsMiddleware`, valido per tutti i tenant che usano Xot.

## Contesto

La pagina pubblica `/{locale}/auth/register` è resa da Folio (tema Sixteen) e dal widget Filament di registrazione GDPR, il cui runtime tecnico è Livewire; non è un pannello Filament con tenant selezionato. Il middleware globale `SetDefaultTenantForUrlsMiddleware` imposta `URL::defaults(['tenant' => Filament::getTenant()])` per le rotte del pannello. Se quel default sopravvive nella richiesta GET iniziale e di nuovo nell'update Livewire, i due cicli vedono contesti di richiesta diversi e Livewire rifiuta lo snapshot inviato con `CorruptComponentPayloadException`. Come si evita senza toccare il comportamento di Filament e delle API tenant-aware?

## Driver della decisione

- mantenere stabile il contesto tecnico Livewire fra la GET iniziale e il POST di update;
- non modificare il comportamento di Filament o delle API tenant-aware;
- limitare il bypass al solo percorso pubblico dimostrato dai test.

## Alternative scartate

- rimuovere globalmente `URL::defaults(['tenant' => ...])`: romperebbe il pannello;
- risolvere il problema nel widget di registrazione duplicando la logica del middleware;
- disabilitare Livewire o la protezione dello snapshot.

## Decisione

La pagina pubblica `/{locale}/auth/register` e una richiesta `/livewire/update` il cui `Referer` è quella pagina non devono ereditare il default URL del tenant Filament. Il middleware globale azzera solo quel default (`URL::defaults(['tenant' => null])`) per questo flusso; ogni altra richiesta web o API mantiene il comportamento Filament esistente.

Il riconoscimento è ristretto: il path deve corrispondere a `#^/[a-z]{2}(?:-[A-Z]{2})?/auth/register/?$#`, direttamente o come path del `Referer` di `/livewire/update` (`app/Http/Middleware/SetDefaultTenantForUrlsMiddleware.php`: azzeramento a riga 37, `isFrontOfficeRegistrationRequest()` a riga 59, regex a riga 80).

## Conseguenze

- Buono: il ciclo pubblico di registrazione non eredita un tenant del pannello.
- Buono: le altre richieste conservano il comportamento storico.
- Cattivo: il riconoscimento del referer è ristretto e va aggiornato (e ritestato) quando cambiano le rotte auth o il prefisso locale.
- Cattivo: l'eccezione vive in un middleware globale di Xot, quindi vale per tutti i tenant anche se solo FixCity ha quella pagina.

## Conferma

- `cd laravel && vendor/bin/pest Modules/Xot/tests/Unit/Http/Middleware/SetDefaultTenantForUrlsMiddlewareTest.php`: il primo test (righe 14-23) verifica la richiesta iniziale a `/it/auth/register`, il secondo (righe 25-37) l'update `/livewire/update` con `Referer` della registrazione; entrambi si aspettano `tenant` a `null` nei default URL dopo un valore residuo.
- Il test non copre il caso opposto (una richiesta di pannello che conserva il tenant): è una regola di review. Proposta: un terzo test che chiami il middleware su una rotta non di registrazione.
- PHPStan del modulo (`cd laravel && vendor/bin/phpstan analyse Modules/Xot`) come gate sulle firme del middleware.
