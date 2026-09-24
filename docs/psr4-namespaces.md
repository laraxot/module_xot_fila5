<<<<<<< .merge_file_opsoUd
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_4jZo9c
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
# Regola PSR-4 Namespace per Moduli Laravel

## Quando
- Crei o modifichi file in `Modules/<Modulo>/app/...`

## Allora
- Il namespace deve essere sempre `Modules\\<Modulo>\\<Sottocartella>`, **mai** `Modules\\<Modulo>\\app\\<Sottocartella>`.
- Gli use statement devono seguire la stessa regola.

## Perché
- PSR-4 richiede che il namespace corrisponda esattamente al path dopo il mapping in composer.json.
- Namespace errati causano errori di autoloading, test falliti e problemi in produzione.

## Esempio

```php
// File: Modules/Patient/app/States/Active.php

// CORRETTO
namespace Modules\Patient\States;

// ERRATO
namespace Modules\Patient\app\States;
```

## Checklist
- [ ] Nessun namespace contiene `app` dopo il nome del modulo
- [ ] Tutti gli use statement sono coerenti con la struttura delle cartelle
- [ ] Dopo ogni modifica, esegui `composer dump-autoload`
<<<<<<< HEAD
<<<<<<< .merge_file_opsoUd
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
=======
=======
=======
>>>>>>> 3792da0d (Check & fix styling)
---
module: theme
topic: psr4-namespaces
canonical: ../../../Themes/docs/shared-components/psr4-namespaces.md
---

<<<<<<< HEAD
See canonical documentation: ../../../Themes/docs/shared-components/psr4-namespaces.md
>>>>>>> laraxot/dev
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
See canonical documentation: ../../../Themes/docs/shared-components/psr4-namespaces.md
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_4jZo9c
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
