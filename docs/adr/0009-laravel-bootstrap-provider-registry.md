---
title: "ADR 0009 — Bootstrap Laravel 13 minimale e discovery dei moduli"
type: decision
status: accepted
created: 2026-11-23
updated: 2026-11-23
issues:
  - "https://github.com/laraxot/base_fixcity_fila5/issues/ADR-0009"
---

# ADR 0009: Bootstrap Laravel 13 minimale e discovery dei moduli

## Contesto

Laravel 13 introduce il service provider auto-discovery: non è più necessario elencare manualmente tutti i provider del framework in `bootstrap/providers.php`. I provider dei moduli nwidart vengono scoperti automaticamente tramite composer.json (`extra.laravel.providers`) e lo script `post-autoload-dump` che esegue `package:discover`.

Il file `bootstrap/providers.php` precedente elencava manualmente tutti i provider Illuminate (Auth, Cache, Session, ecc.) più i provider dei moduli. Questo è ridondante e fonte di errori.

## Decisione

**`bootstrap/providers.php` contiene solo `AppServiceProvider::class`.** Tutti gli altri provider sono scoperti automaticamente da Laravel 13.

I provider dei moduli sono registrati nei rispettivi `composer.json` tramite la chiave `extra.laravel.providers` e scoperti dal comando `package:discover`.

## Conseguenze

### Positive
- Meno manutenzione: non serve aggiornare il file quando Laravel aggiunge nuovi provider
- Allineamento con il comportamento standard di Laravel 13
- Riduzione della superficie di errore

### Negative
- I provider dei moduli devono essere correttamente registrati nel composer.json
- Il deploy deve eseguire `composer install` (o `composer dump-autoload`) per far funzionare la discovery

## Verifica

```bash
# Verifica che i provider siano scoperti
php artisan package:discover --ansi
php artisan about --only=providers
```

## Cross-link

- [Laravel 13.x bootstrap/providers.php](https://github.com/laravel/laravel/blob/13.x/bootstrap/providers.php)
- [Laravel Package Discovery](https://laravel.com/docs/13.x/packages#package-discovery)
- [nwidart/laravel-modules](https://github.com/nWidart/laravel-modules)