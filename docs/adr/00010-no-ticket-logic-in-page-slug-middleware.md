---
title: "ADR 00010 — No ticket logic in PageSlugMiddleware"
type: decision
status: accepted
created: 2026-11-23
updated: 2026-11-23
issues:
  - "https://github.com/laraxot/module_cms_fila5/issues/ADR-00010"
---

# ADR 00010: No ticket logic in PageSlugMiddleware

## Contesto

Il modulo Cms è il proprietario della risoluzione delle pagine Folio (URL → blade). Il modulo Fixcity è il proprietario della logica di business dei ticket.

In precedenza, il file `laravel/Modules/Cms/app/Http/Middleware/PageSlugMiddleware.php` conteneva logica di reindirizzamento per i ticket (es. `/ticket/{code}` → `/segnalazione/{code}`). Questo violava il principio di separazione dei moduli: il modulo Cms non dovrebbe sapere del modulo Ticket.

## Decisione

**La logica di reindirizzamento dei ticket è stata rimossa da PageSlugMiddleware.** Il reindirizzamento è gestito dal modulo Fixcity tramite il middleware dedicato `RedirectTicketTrackCodeMiddleware`.

### Dove vive ora la logica

- **`laravel/Modules/Fixcity/app/Http/Middleware/RedirectTicketTrackCodeMiddleware.php`** — esegue il reindirizzamento `/ticket/{code}` → `/segnalazione/{code}`
- **`laravel/Modules/Cms/app/Http/Middleware/PageSlugMiddleware.php`** — solo la risoluzione delle pagine CMS

## Alternative scartate

- Importare Ticket o Fixcity nel Cms: invertirebbe la direzione delle dipendenze.
- Lasciare il redirect nel middleware generico: renderebbe il Cms inutilizzabile
  nei progetti privi del modulo Ticket.

## Conseguenze

### Positive
- Separazione chiara dei moduli
- Cms non dipende da Fixcity
- Test più semplici per entrambi i moduli

### Negative
- Due middleware da configurare invece di uno solo
- Possibile duplicazione della logica di reindirizzamento se non gestita correttamente

## Cross-link

- [ADR 0005: Owner local documentation](0005-owner-local-documentation.md)
- [ADR: cms-owns-page-resolution](../Cms/docs/adr/cms-owns-page-resolution.md)
- [FixcityServiceProvider](../Fixcity/app/Providers/FixcityServiceProvider.php)
