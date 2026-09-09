---
<<<<<<< HEAD
title: "Confronto composer root <nome progetto> vs Predict"
=======
title: "Confronto composer root FixCity vs Predict"
>>>>>>> laraxot/dev
type: raw-note
module: Xot
created: 2026-06-30
tags: [composer, nwidart, laravel-modules, ptv, predict]
source:
<<<<<<< HEAD
  - /var/www/_bases/<repo progetto>/laravel/composer.json
  - /var/www/_bases/<repo progetto>/laravel/composer.json
---

# Confronto composer root <nome progetto> vs Predict

## Osservazione <nome progetto>

<nome progetto> (`<repo progetto>/laravel/composer.json`) e' il riferimento storico nwidart:
=======
  - /var/www/_bases/base_ptv_fila5/laravel/composer.json
  - /var/www/_bases/base_predict_fila5/laravel/composer.json
---

# Confronto composer root FixCity vs Predict

## Osservazione FixCity

FixCity (`base_ptv_fila5/laravel/composer.json`) e' il riferimento storico nwidart:
>>>>>>> laraxot/dev

- `require`: `php`, `laravel/framework`, `nwidart/laravel-modules`
- merge solo `Modules/*/composer.json`
- autoload: `App\\` + `Database\\Seeders\\`

<<<<<<< HEAD
## Debito <nome progetto> (non replicare in Predict)
=======
## Debito FixCity (non replicare in Predict)
>>>>>>> laraxot/dev

- `spatie/laravel-responsecache` nel root — gia' owner in `Modules/Xot`
- `phpmd/phpmd` in `require-dev` root — usare `.phar` standalone
- `Database\\Seeders\\` in autoload root — in Predict via `RegisterRuntimePsr4NamespacesAction`

## Stato Predict (canonico 2026-06-30)

<<<<<<< HEAD
Root allineato e piu' stretto di <nome progetto>:
=======
Root allineato e piu' stretto di FixCity:
>>>>>>> laraxot/dev

- `require` solo tre package skeleton
- autoload solo `App\\` e `Tests\\`
- nessun merge `Themes/*/composer.json`
- temi/seeders: runtime PSR-4 Xot

## Regola dedotta

Il root deve essere lo skeleton Laravel. I moduli sono package Composer autonomi caricati da `nwidart/laravel-modules` e composti dal merge plugin. Quindi il root non deve possedere ne' autoloadare il codice dei moduli.

## Impatto su PHPStan

Il root `autoload.psr-4.Modules\\ = Modules/` amplia la scansione Composer a tutto l'albero dei moduli e aumenta ambiguita' PSR-4, classi duplicate e provider stale. La correzione e' togliere l'autoload root dei moduli e lasciare che ogni modulo esponga il proprio namespace dal proprio `composer.json`.
