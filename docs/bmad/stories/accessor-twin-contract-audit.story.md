---
title: "Audit e applicazione del contratto accessor gemello"
type: story
module: Xot
status: in-progress
created: 2026-11-05
updated: 2026-11-05
tags: [eloquent, accessor, mutator, audit, quality]
<<<<<<< HEAD
qmd: "Eloquent accessor gemello contratto public raw value delega get calcolo puro inventario moduli temi"
related:
  - ../../../../Sigma/docs/bmad/stories/accessor-twin-contract-audit.story.md
=======
qmd: "Eloquent accessor gemello get Attribute stesso file trait mutator relazioni modello tableMorphMany MyLog id_tbl tbl morphToManyX pivot PHPStan Pest Modules Themes"
related:
  - ../../../../Sigma/docs/bmad/stories/accessor-twin-contract-audit.story.md
  - ../../wiki/rules/table-morph-many.md
>>>>>>> laraxot/dev
references:
  - ../../../../Sigma/docs/bmad/accessor-twin-method.md
  - ../../../../Ptv/docs/bmad/accessor-twin-method.md
  - ../../wiki/rules/accessor-twin-method.md
  - ../../../../bashscripts/ai/wiki/rules/accessor-twin-method.md
---

# Audit e applicazione del contratto accessor gemello

## Obiettivo

Rendere verificabile e coerente il contratto PTVX degli accessor Eloquent legacy in
Modules e Themes. Ogni `get{Nome}Attribute()` deve avere `get{Nome}()` dichiarato
nello stesso file e nello stesso tipo PHP. L'accessor è pubblico, riceve il valore
grezzo tipizzato `$value`, conserva la semantica di cache/persistenza del dominio e
delega il calcolo al gemello pubblico senza effetti collaterali.

La revisione include anche la struttura dei modelli: accessor/mutator con i
relativi metodi di appoggio e relazioni Eloquent dichiarati direttamente nel
modello vanno spostati in trait dedicati del modulo owner. Il modello resta il
punto di composizione; nomi, visibilità, tipi, cache e comportamento relazionale
devono restare invariati.

## Criteri di accettazione

<<<<<<< HEAD
- [ ] La regola canonica spiega same-file/same-type, firma, visibilità, valore grezzo, delega, purezza,
=======
- [x] La regola canonica spiega same-file/same-type, firma, visibilità, valore grezzo, delega, purezza,
>>>>>>> laraxot/dev
  cache/persistenza, attributi virtuali ed eccezioni motivate.
- [ ] Inventario completo dei candidati in `laravel/Modules/*` e
  `laravel/Themes/*`, con classificazione dei falsi positivi e dei trait shadowed.
- [x] `EnteMatrAnnoMutator::getGgParttimevertAnnoAttribute()` è pubblico, riceve
  `?float $value` e delega a `getGgParttimevertAnno()` nello stesso trait/file.
- [ ] Tutti i finding confermati sono corretti preservando risultati, cache e
  scritture di dominio; nessun wrapper cieco maschera relazioni o ricalcola dati
  già presenti.
- [ ] Accessor/mutator con i relativi helper sono collocati in trait dedicati; i
  metodi di relazione Eloquent sono collocati in trait di relazioni dedicati.
  Ogni estrazione conserva firme, visibilità, PHPDoc, risoluzione dei trait e
  comportamento osservabile dei consumer.
- [ ] L'inventario distingue relazioni vere e metodi omonimi non relazionali; ogni
  eccezione (codice vendor/generato o override intenzionale) è motivata nel doc
  del modulo owner.
<<<<<<< HEAD
=======
- [ ] Relazioni log legacy con `id_tbl` e `tbl` sono rilevate e usano l'helper
  uno-a-molti `tableMorphMany()`. `morphToManyX()` è riservato ai pivot molti-a-molti;
  le due semantiche non vanno confuse.
>>>>>>> laraxot/dev
- [ ] L'analizzatore automatico copre file, tipo PHP, firma e delega, è registrato in Artisan e
  produce lo stesso inventario ripetibile.
- [ ] Story, documentazione per i moduli owner, `docs/sprint-status.yaml` e second
  brain riportano l'esito effettivo.
- [ ] Gate PHP/Pest dei moduli toccati eseguiti e documentati secondo le regole
  locali; nessun test su host `10.100.200.15`.

## Evidenza iniziale

- Il finding segnalato dall'utente è stato corretto nel commit Sigma `04089bb`
  di `marco76tv`: accessor pubblico con `?float $value`, delega al gemello nello
  stesso file e calcolo puro separato. Evidenza: `git log -S`.
- Le guide Sigma e Ptv documentano accessor + gemello puro, ma non fissano in modo
  uniforme il requisito same-file/same-type, la visibilità pubblica dell'accessor
  e la firma con `$value`.
- `php artisan xot:check-accessor-twins --module=Sigma --fail-on-missing` è
  registrato. Reflection ha contato 78 accessor su 289 classi e 41 coppie senza
  gemello; il comando non verifica file/tipo di dichiarazione, visibilità,
  parametro o delega.
- Il comando globale ha contato 2.372 accessor su 520 classi e 254 coppie mancanti.
  I totali includono ereditarietà e ripetizioni, quindi non sono un inventario di
  metodi sorgente unici.
- I primi audit AST hanno prodotto candidati; gli audit paralleli vengono
  ripetuti col criterio letterale same-file/same-type prima di congelare l'elenco.

## Vincolo di coordinamento

Le modifiche a Sigma, Ptv e a eventuali moduli leaf hanno story owner e lock
separati. `docs/sprint-status.yaml` ha un lock attivo di un'altra sessione e resta
intatto finché il lock non viene rilasciato.

## Claim aggiornato

- Ambito aggiunto su richiesta utente: estrazione in trait dei mutator/accessor
  con helper e delle relazioni Eloquent dichiarate nelle classi modello.
- Owner coordinatore: Xot. I worker mantengono scope per modulo e lock per file;
  i documenti owner e lo sprint status si aggiornano con i rispettivi lock.
<<<<<<< HEAD
=======

## Esito intermedio

- Il PHPStan full-tree richiesto dall'utente è stato eseguito con configurazione
  `phpstan.neon`: 10.565 file analizzati, `[OK] No errors`.
- Themes: zero metodi applicativi `get*Attribute()` trovati.
- Lang, Tenant, Job, Notify e Xot: 49 metodi mutator/helper e relazioni trasferiti
  in trait dedicati; checker accessor zero gemelli mancanti, PHPStan verde nei cinque
  moduli.
- Incentivi e IndennitaCondizioniLavoro: 42 accessor auditati, zero casi senza
  gemello/delega; 34 relazioni trasferite da 19 modelli. PHPStan verde in entrambi.
- Sigma: 79 accessor, zero gemelli mancanti; 26 relazioni in 14 classi modellate
  in trait dedicati. PHPStan verde; Pest modulo ancora in esecuzione al momento
  dell'ultimo aggiornamento.
- User e Media: accessori e helper del `BaseUser`/`MediaConvert` sono già separati
  in trait dedicati; l'audit delle altre relazioni User è in corso.
- Relazioni log con `id_tbl`/`tbl`: la scansione non trova più la forma inline
  `hasMany(MyLog::class, 'id_tbl', 'id')->where(...)`; i consumer usano
  `tableMorphMany()`. `morphToManyX()` resta riservato alle relazioni many-to-many
  con pivot e nome morph.
- La migrazione Lang per `translations.user_id` è in verifica sotto lock owner.
  `migrate --pretend` ha mostrato che `tableUpdate()` emette una creazione vuota
  se la tabella target manca: va aggiunta una guardia esplicita prima della chiusura.
>>>>>>> laraxot/dev
