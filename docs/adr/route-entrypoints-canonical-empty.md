---
title: "Xot — entrypoint route no-op canonico"
type: decision
status: accepted
created: 2026-11-23
updated: 2026-11-23
---

# ADR: entrypoint route no-op canonico

## Contesto

Alcuni moduli includono `Modules/Xot/routes/empty.php` quando non espongono route proprie. Senza questo file il bootstrap dell’applicazione fallisce prima dei test e delle richieste HTTP.

## Decisione

Il file esiste in `Modules/Xot/routes/empty.php`, contiene solo il return di un array vuoto e viene riusato dagli entrypoint dei moduli privi di route.

## Alternative scartate

- Duplicare un file vuoto in ogni modulo: crea più fonti di verità.
- Eliminare i `require`: amplia il cambiamento e non risolve il contratto comune degli entrypoint.

## Conseguenze

Il caricamento delle route è deterministico anche per i moduli senza endpoint. Il file non registra route e non produce effetti collaterali.

## Conferma

`php artisan --version` deve completare il boot senza errore di file mancante.
