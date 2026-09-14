# PHPStan zero: stato del gate Modules

## Correzioni applicate

- Le conversioni da `Services` usano Action risolte dal container e invocate tramite `execute()`.
- Il contratto dei widget di `XotBaseDashboard` rispecchia il contratto Filament: classi `Widget` o `WidgetConfiguration` indicizzate numericamente.
- Gli allegati Notify condividono un unico shape tipizzato, inclusi contenuto binario, alias e MIME opzionali.
<<<<<<< HEAD
<<<<<<< HEAD
- I generatori PDF Notify e <nome progetto> delegano a `HtmlToPdfAction` invece di riferirsi al rimosso `HtmlService`.
=======
- I generatori PDF Notify e Quaeris delegano a `HtmlToPdfAction` invece di riferirsi al rimosso `HtmlService`.
>>>>>>> laraxot/dev
=======
- I generatori PDF Notify e Quaeris delegano a `HtmlToPdfAction` invece di riferirsi al rimosso `HtmlService`.
>>>>>>> laraxot/dev
- Fixture e test obsoleti sono stati riallineati alle classi realmente disponibili.

## Verifica

<<<<<<< HEAD
<<<<<<< HEAD
I moduli che comparivano nell'ultimo report completo (`AI`, `Activity`, `Geo`, `Notify`, `<nome progetto>`, `Xot`) passano PHPStan quando analizzati singolarmente. I test mirati modificati passano.
=======
I moduli che comparivano nell'ultimo report completo (`AI`, `Activity`, `Geo`, `Notify`, `Quaeris`, `Xot`) passano PHPStan quando analizzati singolarmente. I test mirati modificati passano.
>>>>>>> laraxot/dev
=======
I moduli che comparivano nell'ultimo report completo (`AI`, `Activity`, `Geo`, `Notify`, `Quaeris`, `Xot`) passano PHPStan quando analizzati singolarmente. I test mirati modificati passano.
>>>>>>> laraxot/dev

Il comando globale `vendor/bin/phpstan analyse Modules` viene terminato dall'ambiente dopo circa 25 secondi senza errori PHPStan né codice di uscita, anche con `memory_limit=3072M` e con `--debug` (parallelismo disattivato). Il blocco residuo è quindi infrastrutturale: il processo non raggiunge il riepilogo finale. Il gate va rieseguito in un runner privo di questo limite temporale.

## Regole operative

- Non modificare `phpstan.neon` e non introdurre baseline o ignore.
- Correggere il contratto reale prima della sua annotazione.
- Verificare prima il file, poi il modulo, infine l'intero insieme `Modules`.
