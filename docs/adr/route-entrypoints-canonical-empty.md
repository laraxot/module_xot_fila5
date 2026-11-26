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
title: "Canonicalizzazione degli entrypoint di route vuoti"
type: adr
status: accepted
module: Xot
issue: "#92"
---

# ADR: canonicalizzazione degli entrypoint di route vuoti

## Stato

Accettato per Issue #92.

I moduli caricati da `XotBaseRouteServiceProvider` devono mantenere i propri
file `routes/api.php` e `routes/web.php`, anche quando non espongono route.
Molti di questi file contenevano lo stesso boilerplate o nessuna dichiarazione
attiva, duplicando testo senza aggiungere comportamento.

I soli entrypoint privi di dichiarazioni attive e duplicati tra moduli
delegano a `Modules/Xot/routes/empty.php`. Il provider continua a caricare il
percorso route del modulo; l'entrypoint canonico restituisce un array vuoto e
non registra route.

Le route attive, i file speciali e `Modules/User` restano esclusi da questa
consolidazione.

## Motivazione

- preserva i percorsi attesi dal provider comune;
- elimina il boilerplate duplicato senza cambiare prefissi, middleware o nomi;
- evita di accorpare route di domini diversi in un modulo non owner;
- mantiene separati i contratti attivi di ogni modulo.

- cancellare gli entrypoint: il provider comune li carica per percorso;
- spostare route attive nel modulo Xot: violerebbe l'ownership;
- modificare `XotBaseRouteServiceProvider`: scope più ampio e rischio sui moduli attivi.

- gli entrypoint vuoti restano presenti e continuano a rispettare il contratto
  del provider comune;
- il comportamento delle route attive non cambia, perché la consolidazione
  riguarda solo file senza dichiarazioni attive;
- il test di routing deve restare aggiornato quando nasce un nuovo entrypoint
  vuoto o cambia l'ownership di una route.

## Verifica

`Modules/Xot/tests/Unit/Routing/CanonicalEmptyRouteEntrypointsTest.php`
verifica che ogni entrypoint consolidato deleghi al file canonico e che il file
canonico non registri route.
