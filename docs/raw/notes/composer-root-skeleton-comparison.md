---
<<<<<<< HEAD
<<<<<<< HEAD
title: "Confronto composer root <nome progetto> vs Predict"
=======
title: "Confronto composer root FixCity vs Predict"
>>>>>>> laraxot/dev
=======
title: "Confronto composer root FixCity vs Predict"
>>>>>>> laraxot/dev
type: raw-note
module: Xot
created: 2026-06-30
updated: 2026-07-15
tags: [composer, nwidart, laravel-modules, ptv, predict]
source:
<<<<<<< HEAD
<<<<<<< HEAD
  - /var/www/_bases/<repo progetto>/laravel/composer.json
  - /var/www/_bases/<repo progetto>/laravel/composer.json
---

# Confronto composer root <nome progetto> vs Predict

<nome progetto> (`<repo progetto>/laravel/composer.json`) e' il riferimento storico nwidart:
=======
=======
>>>>>>> laraxot/dev
  - /var/www/_bases/base_ptv_fila5/laravel/composer.json
  - /var/www/_bases/base_predict_fila5/laravel/composer.json
---

# Confronto composer root FixCity vs Predict

FixCity (`base_ptv_fila5/laravel/composer.json`) e' il riferimento storico nwidart:
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> laraxot/dev

- `require`: `php`, `laravel/framework`, `nwidart/laravel-modules`
- merge solo `Modules/*/composer.json`
- autoload: `App\\` + `Database\\Seeders\\`

<<<<<<< HEAD
<<<<<<< HEAD
## Debito <nome progetto> (non replicare in Predict)
=======
## Debito FixCity (non replicare in Predict)
>>>>>>> laraxot/dev
=======
## Debito FixCity (non replicare in Predict)
>>>>>>> laraxot/dev

- dipendenze funzionali nel root (`livewire/livewire`, `spatie/laravel-permission`, `tallstackui/tallstackui`, `phpmd/phpmd`, `laravel/tinker`)
- `Modules\\` nell'autoload root
- merge di `Themes/*/composer.json`
- configurazione merge-plugin piu' ampia del necessario

## Stato Predict (canonico 2026-06-30)

<<<<<<< HEAD
<<<<<<< HEAD
Root allineato e piu' stretto di <nome progetto>:
=======
Root allineato e piu' stretto di FixCity:
>>>>>>> laraxot/dev
=======
Root allineato e piu' stretto di FixCity:
>>>>>>> laraxot/dev

- `require` solo tre package skeleton
- autoload solo `App\\` e `Tests\\`
- nessun merge `Themes/*/composer.json`
- temi/seeders: runtime PSR-4 Xot

Vedi [composer-root-skeleton-modular.md](../wiki/concepts/composer-root-skeleton-modular.md).
