---
title: "PHPStan level: max su tutti i moduli — cleanup finale workorder"
type: story
status: completed
created: 2026-10-15
updated: 2026-10-15
module: Xot
tags: [phpstan, cleanup, final, dead-code]
---

# PHPStan level: max su tutti i moduli — cleanup finale workorder

## Richiesta
`phpstan analyse Modules` non partiva a causa di un PHP Fatal error (`Cannot override final method`).
L'obiettivo era far passare l'analisi a `level: max` con **zero error** su tutti i moduli.

## Analisi
La radice era un ponte di dismissione (`getFormSchemaOld()` in `XotBaseResource`, `final`) che 7 Resource avevano ancora
in override. I due Resource Geo avevano uno schema reale solo in quel metodo (i loro `*Form` erano stub).

## Modifiche (vedi story figlie)
- Gdpr: rimozione override in 6 Resource (`ConsentResource`, `EventResource`, `TreatmentResource`, `ProfileResource`,
  `Clusters/Profile/Resources/ConsentResource`, `Clusters/Profile/Resources/ProfileResource`).
- Geo: migrazione schema in `AddressForm` e `LocationForm`; rimozione override in `AddressResource` e `LocationResource`.
- Fixcity: rimozione override in `TicketResource`.
- Sixteen: rimozione include cookiebar duplicate nei due footer; fix duplicate HTML nei due `delete-user-form`;
  redirect del test cookiebar su `cookie-consent::index`; flash message account_deleted.

## Verifica
```bash
php -d memory_limit=2048M vendor/bin/phpstan analyse --configuration=phpstan.neon --no-progress
# [OK] No errors
```

## Decisioni
- **D-1**: `getFormSchemaOld()` rimane `final` in `XotBaseResource` — nessun Resource lo override più.
- **D-2**: la sorgente di verità del form è sempre il `*Form` (DCP-184).
- **D-3**: `getSearchStep()` in `AddressResource` è una funzionalità distinta (ricerca geografica a cascata) e non è un
  duplicato del form.

## Aperto
- Nessuno. PHPStan level: max = 0 error su tutti i moduli.