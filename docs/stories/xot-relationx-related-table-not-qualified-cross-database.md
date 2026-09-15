---
scope: module:Xot
github_id: module_xot_fila5#84
---

# Story: RelationX::belongsToManyX() — la tabella correlata non viene qualificata cross-database, solo il pivot

Status: ready-for-dev

## Story

As a sviluppatore che usa `belongsToManyX()` per una relazione molti-a-molti tra
model su database diversi,
I want che anche la tabella del model **correlato** (non solo quella pivot) venga
qualificata col nome del proprio database quando serve,
so that una query con un `where()` aggiuntivo su una colonna della tabella
correlata (es. `->where('customers.id', $id)`) non ritorni silenziosamente
vuota, anche quando la relazione stessa funziona.

## Contesto — scoperto lavorando su un'altra story

Trovato mentre si tentava di far girare un test Pest per il fix di sicurezza
tenancy della story
<<<<<<< HEAD
[quaeris-dashboard-v3-snapshot-pdf-controller-to-action](../../laravel/Modules/Quaeris/docs/stories/quaeris-dashboard-v3-snapshot-pdf-controller-to-action.md)
(modulo Quaeris) — non è un difetto introdotto da quella story, ma reso visibile
=======
<<<<<<< HEAD
<<<<<<< HEAD
[<nome progetto>-dashboard-v3-snapshot-pdf-controller-to-action](../../laravel/Modules/<nome progetto>/docs/stories/<nome progetto>-dashboard-v3-snapshot-pdf-controller-to-action.md)
(modulo <nome progetto>) — non è un difetto introdotto da quella story, ma reso visibile
=======
[quaeris-dashboard-v3-snapshot-pdf-controller-to-action](../../laravel/Modules/Quaeris/docs/stories/quaeris-dashboard-v3-snapshot-pdf-controller-to-action.md)
(modulo Quaeris) — non è un difetto introdotto da quella story, ma reso visibile
>>>>>>> laraxot/dev
=======
[quaeris-dashboard-v3-snapshot-pdf-controller-to-action](../../laravel/Modules/Quaeris/docs/stories/quaeris-dashboard-v3-snapshot-pdf-controller-to-action.md)
(modulo Quaeris) — non è un difetto introdotto da quella story, ma reso visibile
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
per la prima volta dal suo test, perché nessun test esistente nel progetto
esercitava questo percorso prima d'ora.

**Non è un fork di lavoro già tracciato.** Esistono già 2 story di hardening su
`RelationX` nel modulo Xot:
- [1-1-relationx-hardening.md](../../laravel/Modules/Xot/docs/stories/1-1-relationx-hardening.md) (STORY-160)
- [story-relationx-pivot-resolution-hardening.md](../../laravel/Modules/Xot/docs/stories/story-relationx-pivot-resolution-hardening.md)

più l'analisi che le fonda,
[relationx-pivot-resolution.md](../../laravel/Modules/Xot/docs/relationx-pivot-resolution.md).
Nessuna delle due copre questo difetto specifico: entrambe trattano
`belongsToManyX()` come il riferimento **corretto** da copiare dentro
`morphToManyX()` (che invece non qualifica proprio nulla). L'analisi esistente
non ha rilevato che anche `belongsToManyX()` — il metodo "buono" — qualifica
**solo** la tabella pivot, mai quella del model correlato, anche quando pure
quella vive su un database diverso dal parent. Story dedicata perché è un difetto
distinto, non un dettaglio delle due story esistenti.

## Difetto verificato (codice + riproduzione reale, non ipotesi)

`Modules/Xot/app/Models/Traits/RelationX.php`, `belongsToManyX()` (righe 51-68):

```php
$table = $pivot->getTable();                                    // riga 51
$pivotDbName = $pivot->getConnection()->getDatabaseName();       // riga 54
$dbName = $this->getConnection()->getDatabaseName();             // riga 55
$relatedDbName = $related_model->getConnection()->getDatabaseName(); // riga 56
if ($pivotDbName !== $dbName || $relatedDbName !== $dbName) {    // riga 58
    if ('sqlite' !== $pivotDriver) {
        $table = $pivotDbName.'.'.$table;                        // riga 63 — qualifica SOLO $table (il pivot)
    }
}
```

La condizione controlla **anche** `$relatedDbName !== $dbName`, ma il ramo che
esegue l'azione qualifica solo `$table` (il pivot) — la tabella del model
correlato, usata da Eloquent nella clausola `FROM` di base, resta senza
qualificazione.

**Riproduzione concreta** (`Modules\User\Models\Traits\HasTenants::tenants()` →
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
`belongsToManyX(Customer::class)`, con <nome progetto> e User su connessioni/database
diversi — condizione reale del progetto, verificata in `laravel/.env`, non solo
nell'ambiente di test):
```
DB_DATABASE=geek_<nome progetto>_backup_server_23_10_2025   (connessione default, Customer)
=======
=======
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
`belongsToManyX(Customer::class)`, con Quaeris e User su connessioni/database
diversi — condizione reale del progetto, verificata in `laravel/.env`, non solo
nell'ambiente di test):
```
DB_DATABASE=geek_quaeris_backup_server_23_10_2025   (connessione default, Customer)
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
DB_DATABASE_USER=geek_lu                             (connessione 'user', User)
```

SQL generato da `$user->tenants()->where('customers.id', $tenant->id)->exists()`:
```sql
select * from `customers`
<<<<<<< HEAD
inner join `geek_quaeris_backup_server_23_10_2025_test`.`customer_user`
=======
<<<<<<< HEAD
<<<<<<< HEAD
inner join `geek_<nome progetto>_backup_server_23_10_2025_test`.`customer_user`
=======
inner join `geek_quaeris_backup_server_23_10_2025_test`.`customer_user`
>>>>>>> laraxot/dev
=======
inner join `geek_quaeris_backup_server_23_10_2025_test`.`customer_user`
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
  on `customers`.`id` = `...`.`customer_id`
where `...`.`user_id` = ? and `customers`.`id` = ?
```
`customers` non è qualificato. Verificato con query dirette che la riga di
associazione tenant-utente esiste davvero e coi valori corretti (conteggio
passa da 59 a 60 righe dopo `attach()`) — la query della relazione la ignora
comunque, restituendo un risultato vuoto per un tenant genuinamente associato.

## Impatto reale, non teorico

<<<<<<< HEAD
`Modules\Quaeris\Models\Policies\SurveyPdfPolicy::hasCustomerAccess()` (righe
187-194) usa esattamente questo pattern (`$user->tenants()->where('customers.id',
$customerId)->exists()`), chiamato da `view()` e `createContacts()`. Con Quaeris
=======
<<<<<<< HEAD
<<<<<<< HEAD
`Modules\<nome progetto>\Models\Policies\SurveyPdfPolicy::hasCustomerAccess()` (righe
187-194) usa esattamente questo pattern (`$user->tenants()->where('customers.id',
$customerId)->exists()`), chiamato da `view()` e `createContacts()`. Con <nome progetto>
=======
`Modules\Quaeris\Models\Policies\SurveyPdfPolicy::hasCustomerAccess()` (righe
187-194) usa esattamente questo pattern (`$user->tenants()->where('customers.id',
$customerId)->exists()`), chiamato da `view()` e `createContacts()`. Con Quaeris
>>>>>>> laraxot/dev
=======
`Modules\Quaeris\Models\Policies\SurveyPdfPolicy::hasCustomerAccess()` (righe
187-194) usa esattamente questo pattern (`$user->tenants()->where('customers.id',
$customerId)->exists()`), chiamato da `view()` e `createContacts()`. Con Quaeris
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
e User su database separati (condizione reale di questo progetto, non solo di
test), il controllo può **negare falsamente l'accesso a un utente
legittimamente autorizzato sul proprio tenant** — non è una falla di sicurezza
nel senso di accesso non autorizzato concesso, è l'opposto: un diniego
scorretto a chi dovrebbe poter accedere. Va comunque corretto, perché mina
l'affidabilità di qualunque controllo di autorizzazione basato su questo
pattern in tutto il progetto (`HasTenants` è nel modulo User, riusato da più
moduli con architettura multi-database analoga).

**Blocca la verifica end-to-end** di 2 dei 3 scenari Pest nella story
<<<<<<< HEAD
[quaeris-dashboard-v3-snapshot-pdf-controller-to-action](../../laravel/Modules/Quaeris/docs/stories/quaeris-dashboard-v3-snapshot-pdf-controller-to-action.md)
=======
<<<<<<< HEAD
<<<<<<< HEAD
[<nome progetto>-dashboard-v3-snapshot-pdf-controller-to-action](../../laravel/Modules/<nome progetto>/docs/stories/<nome progetto>-dashboard-v3-snapshot-pdf-controller-to-action.md)
=======
[quaeris-dashboard-v3-snapshot-pdf-controller-to-action](../../laravel/Modules/Quaeris/docs/stories/quaeris-dashboard-v3-snapshot-pdf-controller-to-action.md)
>>>>>>> laraxot/dev
=======
[quaeris-dashboard-v3-snapshot-pdf-controller-to-action](../../laravel/Modules/Quaeris/docs/stories/quaeris-dashboard-v3-snapshot-pdf-controller-to-action.md)
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
(Task 7) — non per un difetto del fix di sicurezza li', ma per questo.

## Acceptance Criteria

1. **Given** una relazione `belongsToManyX()` in cui il model correlato vive su
   una connessione/database diverso dal model parent, **When** si esegue una
   query sulla relazione con un `where()` aggiuntivo su una colonna del model
   correlato (es. `->where('customers.id', $id)`), **Then** la query trova
   correttamente le righe attese — non solo `get()`/`attach()` senza filtri
   aggiuntivi, che oggi già funzionano.
2. **And** nessuna regressione sulle relazioni esistenti che già funzionano
   (`Profile::teams`, `Role::permissions`, `User::roles`, coerente con AC9 della
   story `story-relationx-pivot-resolution-hardening.md`).
3. **And** il test Pest bloccato in
<<<<<<< HEAD
   `Modules/Quaeris/tests/Feature/Actions/DashboardSnapshotPdf/TenancyTest.php`
=======
<<<<<<< HEAD
<<<<<<< HEAD
   `Modules/<nome progetto>/tests/Feature/Actions/DashboardSnapshotPdf/TenancyTest.php`
=======
   `Modules/Quaeris/tests/Feature/Actions/DashboardSnapshotPdf/TenancyTest.php`
>>>>>>> laraxot/dev
=======
   `Modules/Quaeris/tests/Feature/Actions/DashboardSnapshotPdf/TenancyTest.php`
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
   (2 scenari su 3, marcati/skippati con riferimento a questa issue) può essere
   riattivato e passa.

## Tasks / Subtasks

- [ ] Task 1: Qualificare anche la tabella del model correlato in
      `belongsToManyX()` quando `$relatedDbName !== $dbName`, con lo stesso
      criterio già usato per il pivot (esclusione SQLite)
  - [ ] Subtask 1.1: verificare se Eloquent permette di qualificare la tabella
        base di una relazione `belongsToMany` già costruita (es. via
        `$relatedInstance->setTable($qualifiedName)` prima di passarla al
        costruttore, o altro punto d'ingresso) — la soluzione non è ovvia
        quanto per il pivot, va verificata con un test reale prima di
        considerarla corretta
  - [ ] Subtask 1.2: applicare lo stesso fix a `morphToManyX()` se nel
        frattempo la story `story-relationx-pivot-resolution-hardening`
        (Task 2 di quella story) ha già portato lì la logica cross-database
        del pivot — altrimenti coordinarsi con quella story per non
        duplicare/confliggere
- [ ] Task 2: Test Pest dedicato in `Modules/Xot/tests/` che riproduce lo
      scenario minimo (2 model factory su connessioni diverse, relazione
      `belongsToManyX`, query con `where()` sulla tabella correlata) — non
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
      dipendente dal dominio <nome progetto>/tenancy, per restare nello scope del
      modulo Xot
- [ ] Task 3: Riattivare i 2 scenari skippati in
      `Modules/<nome progetto>/tests/Feature/Actions/DashboardSnapshotPdf/TenancyTest.php`
      e verificare che passino (commit separato, repo `module_<nome progetto>_fila5`,
=======
=======
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
      dipendente dal dominio Quaeris/tenancy, per restare nello scope del
      modulo Xot
- [ ] Task 3: Riattivare i 2 scenari skippati in
      `Modules/Quaeris/tests/Feature/Actions/DashboardSnapshotPdf/TenancyTest.php`
      e verificare che passino (commit separato, repo `module_quaeris_fila5`,
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
      dopo che il fix in Xot è disponibile)
- [ ] Task 4: Gate — PHPStan (neon, level max) su `Modules/Xot`, Pint

## Dev Notes

- **Non toccare la logica di qualificazione del pivot già esistente** (righe
  51-63) — funziona, è solo incompleta, non sbagliata.
- Coordinarsi con `story-relationx-pivot-resolution-hardening.md` prima di
  toccare `belongsToManyX()`/`morphToManyX()`: quella story tocca gli stessi
  metodi per motivi diversi (parametro `$_table`, timestamps condizionali) —
  rischio di conflitto se sviluppate in parallelo senza coordinamento.
- I dati sono sacri: test su repliche MySQL `*_test` con `DatabaseTransactions`,
  mai `RefreshDatabase`.
- Lock prima di ogni edit: `bash bashscripts/lock/lock.sh <path> <task-id> <agent-id>`.

### Project Structure Notes

- File principale da modificare: `Modules/Xot/app/Models/Traits/RelationX.php`.
- Story collocata in `Modules/Xot/docs/stories/` (scope `module:Xot`): il fix
<<<<<<< HEAD
  vive lì, anche se scoperto e riprodotto lavorando su Quaeris.
=======
<<<<<<< HEAD
<<<<<<< HEAD
  vive lì, anche se scoperto e riprodotto lavorando su <nome progetto>.
=======
  vive lì, anche se scoperto e riprodotto lavorando su Quaeris.
>>>>>>> laraxot/dev
=======
  vive lì, anche se scoperto e riprodotto lavorando su Quaeris.
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev

### References

- [Source: laravel/Modules/Xot/app/Models/Traits/RelationX.php#L51-68] difetto
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
- [Source: laravel/Modules/<nome progetto>/app/Models/Policies/SurveyPdfPolicy.php#L187-194]
  `hasCustomerAccess()`, il consumer reale impattato
- [Source: laravel/Modules/User/app/Models/Traits/HasTenants.php#L54-64]
  `tenants()`, punto di ingresso della relazione
- [Source: laravel/.env#L16,24] connessioni reali diverse per <nome progetto>/User,
=======
=======
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
- [Source: laravel/Modules/Quaeris/app/Models/Policies/SurveyPdfPolicy.php#L187-194]
  `hasCustomerAccess()`, il consumer reale impattato
- [Source: laravel/Modules/User/app/Models/Traits/HasTenants.php#L54-64]
  `tenants()`, punto di ingresso della relazione
- [Source: laravel/.env#L16,24] connessioni reali diverse per Quaeris/User,
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
  condizione non solo di test
- [Source: laravel/Modules/Xot/docs/stories/1-1-relationx-hardening.md] story
  correlata (non sovrapposta)
- [Source: laravel/Modules/Xot/docs/stories/story-relationx-pivot-resolution-hardening.md]
  story correlata (non sovrapposta) — coordinare Task 1 con questa
- [Source: laravel/Modules/Xot/docs/relationx-pivot-resolution.md] analisi che
  tratta `belongsToManyX()` come riferimento corretto — questa story ne
  corregge l'assunzione
<<<<<<< HEAD
- [Source: laravel/Modules/Quaeris/docs/stories/quaeris-dashboard-v3-snapshot-pdf-controller-to-action.md]
  story da cui è emerso il difetto, bloccata su Task 7 (2 scenari su 3)
- [Source: laravel/Modules/Quaeris/tests/Feature/Actions/DashboardSnapshotPdf/TenancyTest.php]
=======
<<<<<<< HEAD
<<<<<<< HEAD
- [Source: laravel/Modules/<nome progetto>/docs/stories/<nome progetto>-dashboard-v3-snapshot-pdf-controller-to-action.md]
  story da cui è emerso il difetto, bloccata su Task 7 (2 scenari su 3)
- [Source: laravel/Modules/<nome progetto>/tests/Feature/Actions/DashboardSnapshotPdf/TenancyTest.php]
=======
- [Source: laravel/Modules/Quaeris/docs/stories/quaeris-dashboard-v3-snapshot-pdf-controller-to-action.md]
  story da cui è emerso il difetto, bloccata su Task 7 (2 scenari su 3)
- [Source: laravel/Modules/Quaeris/tests/Feature/Actions/DashboardSnapshotPdf/TenancyTest.php]
>>>>>>> laraxot/dev
=======
- [Source: laravel/Modules/Quaeris/docs/stories/quaeris-dashboard-v3-snapshot-pdf-controller-to-action.md]
  story da cui è emerso il difetto, bloccata su Task 7 (2 scenari su 3)
- [Source: laravel/Modules/Quaeris/tests/Feature/Actions/DashboardSnapshotPdf/TenancyTest.php]
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
  riproduzione concreta del difetto, da riattivare a fix completato

## Dev Agent Record

### Agent Model Used

Claude Sonnet 5

### Debug Log References

### Completion Notes List

- Scoperto 2026-08-21 durante l'implementazione della story
<<<<<<< HEAD
  quaeris-dashboard-v3-snapshot-pdf-controller-to-action: 2 dei 3 scenari Pest
=======
<<<<<<< HEAD
<<<<<<< HEAD
  <nome progetto>-dashboard-v3-snapshot-pdf-controller-to-action: 2 dei 3 scenari Pest
=======
  quaeris-dashboard-v3-snapshot-pdf-controller-to-action: 2 dei 3 scenari Pest
>>>>>>> laraxot/dev
=======
  quaeris-dashboard-v3-snapshot-pdf-controller-to-action: 2 dei 3 scenari Pest
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
  del fix tenancy fallivano non per un difetto del fix, ma per questo bug
  preesistente in RelationX, confermato con SQL reale e query dirette sul
  database (conteggio pivot 59→60 dopo attach, ma la relazione con `where()`
  aggiuntivo ritorna comunque vuota).

### File List
