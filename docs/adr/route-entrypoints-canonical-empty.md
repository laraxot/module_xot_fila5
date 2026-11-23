# ADR: canonicalizzazione degli entrypoint di route vuoti

## Stato

Accettato per Issue #92.

## Contesto

I moduli caricati da `XotBaseRouteServiceProvider` devono mantenere i propri
file `routes/api.php` e `routes/web.php`, anche quando non espongono route.
Molti di questi file contenevano lo stesso boilerplate o nessuna dichiarazione
attiva, duplicando testo senza aggiungere comportamento.

## Decisione

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

## Alternative scartate

- cancellare gli entrypoint: il provider comune li carica per percorso;
- spostare route attive nel modulo Xot: violerebbe l'ownership;
- modificare `XotBaseRouteServiceProvider`: scope più ampio e rischio sui moduli attivi.

## Conseguenze

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
