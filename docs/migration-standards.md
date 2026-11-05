---
<<<<<<< HEAD
title: "Standard per le Migrazioni in"
type: note
status: draft
updated: 2026-10-18
tags: [docs, xot]
qmd: "standard per le migrazioni in xot"
---
# Standard per le Migrazioni in

## Introduzione

Questo documento definisce gli standard e le best practices da seguire per tutte le migrazioni nei moduli di . Questi standard sono fondamentali per garantire la coerenza e la correttezza delle migrazioni in tutto il progetto.
# Standard per le Migrazioni in <nome progetto>

## Introduzione

Questo documento definisce gli standard e le best practices da seguire per tutte le migrazioni nei moduli di <nome progetto>. Questi standard sono fondamentali per garantire la coerenza e la correttezza delle migrazioni in tutto il progetto.
# Standard per le Migrazioni in <nome progetto>
# Standard per le Migrazioni in <nome progetto>

## Introduzione
## Introduzione

Questo documento definisce gli standard e le best practices da seguire per tutte le migrazioni nei moduli di <nome progetto>. Questi standard sono fondamentali per garantire la coerenza e la correttezza delle migrazioni in tutto il progetto.
Questo documento definisce gli standard e le best practices da seguire per tutte le migrazioni nei moduli di <nome progetto>. Questi standard sono fondamentali per garantire la coerenza e la correttezza delle migrazioni in tutto il progetto.

## Principi Fondamentali

1. **Estensione della classe base**: Tutte le migrazioni devono estendere `XotBaseMigration`
2. **Proprietà obbligatorie**: Ogni migrazione deve definire le proprietà `$table` e `$connection`
3. **Documentazione completa**: Ogni migrazione deve includere una documentazione che descriva lo scopo della tabella
4. **Verifica delle tabelle correlate**: Prima di creare foreign keys, verificare sempre l'esistenza della tabella correlata
5. **Gestione dei timestamp**: Utilizzare sempre `$this->updateTimestamps()` per gestire i timestamp

## Struttura Standard delle Migrazioni
=======
title: "Convenzioni per le migrazioni Xot"
type: rule
module: Xot
status: active
created: 2026-11-05
updated: 2026-11-05
tags: [migration, database, xot, safety]
qmd: "XotBaseMigration naming model_class schema idempotenza dati migration forward-only"
related:
  - ./migration-base-rules.md
  - ../../Lang/docs/migrations.md
  - ./wiki/rules/migration-filename-from-model-name.md
---
# Convenzioni per le migrazioni Xot

Le migrazioni applicative estendono `Modules\Xot\Database\Migrations\XotBaseMigration`.
Il modello è la fonte di verità per tabella e connessione: non ripetere questi
valori in proprietà `$table` o `$connection`.

## Risoluzione del modello

- Per una migrazione di creazione chiamata
  `YYYY_MM_DD_HHMMSS_create_<table_plurale>_table.php`, `XotBaseMigration`
  singularizza il nome della tabella e ricava il modello dal filename e dal
  modulo. Non dichiarare `$model_class` in questo caso.
- Per ogni altro nome, inclusi `update_*`, `add_*` e `rename_*`, dichiarare
  esplicitamente `protected ?string $model_class = Model::class;`.
- Tutti i filename usano `YYYY_MM_DD_HHMMSS_<azione>_<tabella_plurale>_table.php`;
  per esempio `2026_11_05_100001_update_translations_table.php`. Il nome resta
  quello della tabella owner, senza dettagli delle singole colonne.

## Struttura
>>>>>>> laraxot/dev

```php
<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
<<<<<<< HEAD
use Illuminate\Support\Facades\Schema;
use Modules\Xot\Database\Migrations\XotBaseMigration;

/**
 * Migrazione per [scopo della migrazione].
 *
 * @see docs/standards/migrations.md
 */
return new class extends XotBaseMigration
{
    /**
     * Nome della tabella.
     *
     * @var string
     */
    protected string $table = 'nome_tabella';

    /**
     * Connessione al database.
     *
     * @var string
     */
    protected ?string $connection = 'mysql'; // o altra connessione appropriata

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $this->tableCreate(function (Blueprint $table) {
            $table->id(); // o altro tipo di chiave primaria

            // Definizione dei campi

            // Utilizziamo updateTimestamps per gestire created_at, updated_at e deleted_at
            $this->updateTimestamps($table, true); // true per includere soft delete

            // Verifica se le tabelle correlate esistono prima di creare foreign keys
            if (Schema::connection($this->getConnection())->hasTable('tabella_correlata')) {
                $table->foreign('campo_id')
                    ->references('id')
                    ->on('tabella_correlata')
                    ->onDelete('cascade');
            }

            // Indici
            $table->index('campo_id');
=======
use Modules\Lang\Models\Translation;
use Modules\Xot\Database\Migrations\XotBaseMigration;

return new class extends XotBaseMigration
{
    protected ?string $model_class = Translation::class;

    public function up(): void
    {
        $this->tableUpdate(function (Blueprint $table): void {
            if (! $this->hasColumn('user_id')) {
                $table->uuid('user_id')->nullable()->index();
            }
>>>>>>> laraxot/dev
        });
    }
};
```

<<<<<<< HEAD
## Connessioni al Database

 utilizza diverse connessioni al database per diversi tipi di dati:
 utilizza diverse connessioni al database per diversi tipi di dati:
 utilizza diverse connessioni al database per diversi tipi di dati:
 utilizza diverse connessioni al database per diversi tipi di dati:
 utilizza diverse connessioni al database per diversi tipi di dati:
 utilizza diverse connessioni al database per diversi tipi di dati:
 utilizza diverse connessioni al database per diversi tipi di dati:
 utilizza diverse connessioni al database per diversi tipi di dati:
 utilizza diverse connessioni al database per diversi tipi di dati:
 utilizza diverse connessioni al database per diversi tipi di dati:
 utilizza diverse connessioni al database per diversi tipi di dati:
 utilizza diverse connessioni al database per diversi tipi di dati:
 utilizza diverse connessioni al database per diversi tipi di dati:
 utilizza diverse connessioni al database per diversi tipi di dati:
 utilizza diverse connessioni al database per diversi tipi di dati:
 utilizza diverse connessioni al database per diversi tipi di dati:
 utilizza diverse connessioni al database per diversi tipi di dati:
 utilizza diverse connessioni al database per diversi tipi di dati:
 utilizza diverse connessioni al database per diversi tipi di dati:
 utilizza diverse connessioni al database per diversi tipi di dati:
 utilizza diverse connessioni al database per diversi tipi di dati:
 utilizza diverse connessioni al database per diversi tipi di dati:
 utilizza diverse connessioni al database per diversi tipi di dati:
 utilizza diverse connessioni al database per diversi tipi di dati:
 utilizza diverse connessioni al database per diversi tipi di dati:
<nome progetto> utilizza diverse connessioni al database per diversi tipi di dati:
<nome progetto> utilizza diverse connessioni al database per diversi tipi di dati:
<nome progetto> utilizza diverse connessioni al database per diversi tipi di dati:
<nome progetto> utilizza diverse connessioni al database per diversi tipi di dati:
<nome progetto> utilizza diverse connessioni al database per diversi tipi di dati:
<nome progetto> utilizza diverse connessioni al database per diversi tipi di dati:
<nome progetto> utilizza diverse connessioni al database per diversi tipi di dati:
 utilizza diverse connessioni al database per diversi tipi di dati:
<nome progetto> utilizza diverse connessioni al database per diversi tipi di dati:
 utilizza diverse connessioni al database per diversi tipi di dati:
 utilizza diverse connessioni al database per diversi tipi di dati:
<nome progetto> utilizza diverse connessioni al database per diversi tipi di dati:
<nome progetto> utilizza diverse connessioni al database per diversi tipi di dati:
<nome progetto> utilizza diverse connessioni al database per diversi tipi di dati:
 utilizza diverse connessioni al database per diversi tipi di dati:
<nome progetto> utilizza diverse connessioni al database per diversi tipi di dati:
<nome progetto> utilizza diverse connessioni al database per diversi tipi di dati:
<nome progetto> utilizza diverse connessioni al database per diversi tipi di dati:
<nome progetto> utilizza diverse connessioni al database per diversi tipi di dati:
<nome progetto> utilizza diverse connessioni al database per diversi tipi di dati:
<nome progetto> utilizza diverse connessioni al database per diversi tipi di dati:
<nome progetto> utilizza diverse connessioni al database per diversi tipi di dati:
 utilizza diverse connessioni al database per diversi tipi di dati:
<nome progetto> utilizza diverse connessioni al database per diversi tipi di dati:
<nome progetto> utilizza diverse connessioni al database per diversi tipi di dati:
<nome progetto> utilizza diverse connessioni al database per diversi tipi di dati:
<nome progetto> utilizza diverse connessioni al database per diversi tipi di dati:
<nome progetto> utilizza diverse connessioni al database per diversi tipi di dati:
 utilizza diverse connessioni al database per diversi tipi di dati:
<nome progetto> utilizza diverse connessioni al database per diversi tipi di dati:
<nome progetto> utilizza diverse connessioni al database per diversi tipi di dati:
<nome progetto> utilizza diverse connessioni al database per diversi tipi di dati:
<nome progetto> utilizza diverse connessioni al database per diversi tipi di dati:
<nome progetto> utilizza diverse connessioni al database per diversi tipi di dati:

1. **mysql**: Connessione principale per la maggior parte delle tabelle
2. **user**: Connessione per i dati degli utenti
3. **tenant**: Connessione per i dati specifici dei tenant

È fondamentale specificare la connessione corretta in ogni migrazione in base al tipo di dati che la tabella conterrà.

## Metodi Utili di XotBaseMigration

### tableCreate

Crea una nuova tabella se non esiste già:

```php
$this->tableCreate(function (Blueprint $table) {
    // Definizione dei campi
});
```

### tableUpdate

Aggiorna una tabella esistente:

```php
$this->tableUpdate(function (Blueprint $table) {
    // Aggiornamento dei campi
});
```

### updateTimestamps

Aggiunge i campi `created_at`, `updated_at` e opzionalmente `deleted_at`:

```php
$this->updateTimestamps($table, true); // true per includere soft delete
```

### hasColumn

Verifica se una colonna esiste nella tabella:

```php
if (! $this->hasColumn('nome_colonna')) {
    $table->string('nome_colonna')->nullable();
}
```

### hasIndex

Verifica se un indice esiste nella tabella:

```php
if (! $this->hasIndex('nome_indice')) {
    $table->index('campo', 'nome_indice');
}
```

## Best Practices Specifiche per Modulo

Ogni modulo può avere best practices specifiche per le migrazioni. Consultare la documentazione del modulo per ulteriori dettagli:

- [Best Practices per le Migrazioni nel Modulo Patient](/laravel/Modules/Patient/docs/MIGRATION_BEST_PRACTICES.md)
- [Best Practices per le Migrazioni nel Modulo Tenant](/laravel/Modules/Tenant/docs/MIGRATION_BEST_PRACTICES.md)
- [Best Practices per le Migrazioni nel Modulo User](/laravel/Modules/User/docs/MIGRATION_BEST_PRACTICES.md)
- [Best Practices per le Migrazioni nel Modulo Patient](/laravel/Modules/Patient/docs/MIGRATION_BEST_PRACTICES.md)
- [Best Practices per le Migrazioni nel Modulo Tenant](/laravel/Modules/Tenant/docs/MIGRATION_BEST_PRACTICES.md)
- [Best Practices per le Migrazioni nel Modulo User](/laravel/Modules/User/docs/MIGRATION_BEST_PRACTICES.md)
- [Best Practices per le Migrazioni nel Modulo Patient](/laravel/Modules/Patient/project_docs/MIGRATION_BEST_PRACTICES.md)
- [Best Practices per le Migrazioni nel Modulo Tenant](/laravel/Modules/Tenant/project_docs/MIGRATION_BEST_PRACTICES.md)
- [Best Practices per le Migrazioni nel Modulo User](/laravel/Modules/User/project_docs/MIGRATION_BEST_PRACTICES.md)
- [Best Practices per le Migrazioni nel Modulo Patient](/laravel/Modules/Patient/docs/MIGRATION_BEST_PRACTICES.md)
- [Best Practices per le Migrazioni nel Modulo Patient](/laravel/Modules/Patient/docs/MIGRATION_BEST_PRACTICES.md)
- [Best Practices per le Migrazioni nel Modulo Tenant](/laravel/Modules/Tenant/docs/MIGRATION_BEST_PRACTICES.md)
- [Best Practices per le Migrazioni nel Modulo Tenant](/laravel/Modules/Tenant/docs/MIGRATION_BEST_PRACTICES.md)
- [Best Practices per le Migrazioni nel Modulo User](/laravel/Modules/User/docs/MIGRATION_BEST_PRACTICES.md)
- [Best Practices per le Migrazioni nel Modulo User](/laravel/Modules/User/docs/MIGRATION_BEST_PRACTICES.md)
- [Best Practices per le Migrazioni nel Modulo Patient](/laravel/Modules/Patient/docs/MIGRATION_BEST_PRACTICES.md)
- [Best Practices per le Migrazioni nel Modulo Patient](/laravel/Modules/Patient/docs/MIGRATION_BEST_PRACTICES.md)
- [Best Practices per le Migrazioni nel Modulo Tenant](/laravel/Modules/Tenant/docs/MIGRATION_BEST_PRACTICES.md)
- [Best Practices per le Migrazioni nel Modulo Tenant](/laravel/Modules/Tenant/docs/MIGRATION_BEST_PRACTICES.md)
- [Best Practices per le Migrazioni nel Modulo User](/laravel/Modules/User/docs/MIGRATION_BEST_PRACTICES.md)
- [Best Practices per le Migrazioni nel Modulo User](/laravel/Modules/User/docs/MIGRATION_BEST_PRACTICES.md)
- [Best Practices per le Migrazioni nel Modulo Patient](/laravel/Modules/Patient/docs/MIGRATION_BEST_PRACTICES.md)
- [Best Practices per le Migrazioni nel Modulo Patient](/laravel/Modules/Patient/docs/MIGRATION_BEST_PRACTICES.md)
- [Best Practices per le Migrazioni nel Modulo Tenant](/laravel/Modules/Tenant/docs/MIGRATION_BEST_PRACTICES.md)
- [Best Practices per le Migrazioni nel Modulo Tenant](/laravel/Modules/Tenant/docs/MIGRATION_BEST_PRACTICES.md)
- [Best Practices per le Migrazioni nel Modulo User](/laravel/Modules/User/docs/MIGRATION_BEST_PRACTICES.md)
- [Best Practices per le Migrazioni nel Modulo User](/laravel/Modules/User/docs/MIGRATION_BEST_PRACTICES.md)
- [Best Practices per le Migrazioni nel Modulo Patient](/laravel/Modules/Patient/docs/MIGRATION_BEST_PRACTICES.md)
- [Best Practices per le Migrazioni nel Modulo Patient](/laravel/Modules/Patient/docs/MIGRATION_BEST_PRACTICES.md)
- [Best Practices per le Migrazioni nel Modulo Tenant](/laravel/Modules/Tenant/docs/MIGRATION_BEST_PRACTICES.md)
- [Best Practices per le Migrazioni nel Modulo Tenant](/laravel/Modules/Tenant/docs/MIGRATION_BEST_PRACTICES.md)
- [Best Practices per le Migrazioni nel Modulo User](/laravel/Modules/User/docs/MIGRATION_BEST_PRACTICES.md)
- [Best Practices per le Migrazioni nel Modulo User](/laravel/Modules/User/docs/MIGRATION_BEST_PRACTICES.md)
- [Best Practices per le Migrazioni nel Modulo Patient](/laravel/Modules/Patient/docs/MIGRATION_BEST_PRACTICES.md)
- [Best Practices per le Migrazioni nel Modulo Patient](/laravel/Modules/Patient/docs/MIGRATION_BEST_PRACTICES.md)
- [Best Practices per le Migrazioni nel Modulo Tenant](/laravel/Modules/Tenant/docs/MIGRATION_BEST_PRACTICES.md)
- [Best Practices per le Migrazioni nel Modulo Tenant](/laravel/Modules/Tenant/docs/MIGRATION_BEST_PRACTICES.md)
- [Best Practices per le Migrazioni nel Modulo User](/laravel/Modules/User/docs/MIGRATION_BEST_PRACTICES.md)
- [Best Practices per le Migrazioni nel Modulo User](/laravel/Modules/User/docs/MIGRATION_BEST_PRACTICES.md)
- [Best Practices per le Migrazioni nel Modulo Patient](/laravel/Modules/Patient/docs/MIGRATION_BEST_PRACTICES.md)
- [Best Practices per le Migrazioni nel Modulo Patient](/laravel/Modules/Patient/docs/MIGRATION_BEST_PRACTICES.md)
- [Best Practices per le Migrazioni nel Modulo Tenant](/laravel/Modules/Tenant/docs/MIGRATION_BEST_PRACTICES.md)
- [Best Practices per le Migrazioni nel Modulo Tenant](/laravel/Modules/Tenant/docs/MIGRATION_BEST_PRACTICES.md)
- [Best Practices per le Migrazioni nel Modulo User](/laravel/Modules/User/docs/MIGRATION_BEST_PRACTICES.md)
- [Best Practices per le Migrazioni nel Modulo User](/laravel/Modules/User/docs/MIGRATION_BEST_PRACTICES.md)

## Errori Comuni e Come Evitarli

### 1. Mancanza delle Proprietà Obbligatorie

**Errore**:
```php
return new class extends XotBaseMigration
{
    public function up(): void
    {
        // Mancano le proprietà $table e $connection
    }
};
```

**Correzione**:
```php
return new class extends XotBaseMigration
{
    protected string $table = 'nome_tabella';
    protected ?string $connection = 'mysql';

    public function up(): void
    {
        // ...
    }
};
```

### 2. Foreign Key su Tabella Inesistente

**Errore**:
```php
$table->foreign('user_id')
    ->references('id')
    ->on('users')
    ->onDelete('cascade');
```

**Correzione**:
```php
if (Schema::connection($this->getConnection())->hasTable('users')) {
    $table->foreign('user_id')
        ->references('id')
        ->on('users')
        ->onDelete('cascade');
} else {
    $this->outputWarning("La tabella 'users' non esiste nella connessione '{$this->getConnection()}'. La foreign key non è stata creata.");
    // Creiamo solo l'indice senza la foreign key
    $table->index('user_id');
}
```

### 3. Connessione Errata

**Errore**:
```php
protected ?string $connection = 'mysql'; // Ma il modello usa 'user'
```

**Correzione**:
```php
protected ?string $connection = 'user'; // Stessa connessione del modello
```

## Conclusione

Seguire questi standard per le migrazioni è fondamentale per garantire la coerenza e la correttezza del database in . Assicurarsi di consultare sempre la documentazione specifica del modulo prima di creare o modificare una migrazione.
Seguire questi standard per le migrazioni è fondamentale per garantire la coerenza e la correttezza del database in . Assicurarsi di consultare sempre la documentazione specifica del modulo prima di creare o modificare una migrazione.
Seguire questi standard per le migrazioni è fondamentale per garantire la coerenza e la correttezza del database in . Assicurarsi di consultare sempre la documentazione specifica del modulo prima di creare o modificare una migrazione.
Seguire questi standard per le migrazioni è fondamentale per garantire la coerenza e la correttezza del database in . Assicurarsi di consultare sempre la documentazione specifica del modulo prima di creare o modificare una migrazione.
Seguire questi standard per le migrazioni è fondamentale per garantire la coerenza e la correttezza del database in . Assicurarsi di consultare sempre la documentazione specifica del modulo prima di creare o modificare una migrazione.
Seguire questi standard per le migrazioni è fondamentale per garantire la coerenza e la correttezza del database in . Assicurarsi di consultare sempre la documentazione specifica del modulo prima di creare o modificare una migrazione.
Seguire questi standard per le migrazioni è fondamentale per garantire la coerenza e la correttezza del database in . Assicurarsi di consultare sempre la documentazione specifica del modulo prima di creare o modificare una migrazione.
Seguire questi standard per le migrazioni è fondamentale per garantire la coerenza e la correttezza del database in . Assicurarsi di consultare sempre la documentazione specifica del modulo prima di creare o modificare una migrazione.
Seguire questi standard per le migrazioni è fondamentale per garantire la coerenza e la correttezza del database in . Assicurarsi di consultare sempre la documentazione specifica del modulo prima di creare o modificare una migrazione.
Seguire questi standard per le migrazioni è fondamentale per garantire la coerenza e la correttezza del database in . Assicurarsi di consultare sempre la documentazione specifica del modulo prima di creare o modificare una migrazione.
Seguire questi standard per le migrazioni è fondamentale per garantire la coerenza e la correttezza del database in . Assicurarsi di consultare sempre la documentazione specifica del modulo prima di creare o modificare una migrazione.
Seguire questi standard per le migrazioni è fondamentale per garantire la coerenza e la correttezza del database in . Assicurarsi di consultare sempre la documentazione specifica del modulo prima di creare o modificare una migrazione.
Seguire questi standard per le migrazioni è fondamentale per garantire la coerenza e la correttezza del database in . Assicurarsi di consultare sempre la documentazione specifica del modulo prima di creare o modificare una migrazione.
Seguire questi standard per le migrazioni è fondamentale per garantire la coerenza e la correttezza del database in . Assicurarsi di consultare sempre la documentazione specifica del modulo prima di creare o modificare una migrazione.
Seguire questi standard per le migrazioni è fondamentale per garantire la coerenza e la correttezza del database in . Assicurarsi di consultare sempre la documentazione specifica del modulo prima di creare o modificare una migrazione.
Seguire questi standard per le migrazioni è fondamentale per garantire la coerenza e la correttezza del database in . Assicurarsi di consultare sempre la documentazione specifica del modulo prima di creare o modificare una migrazione.
Seguire questi standard per le migrazioni è fondamentale per garantire la coerenza e la correttezza del database in . Assicurarsi di consultare sempre la documentazione specifica del modulo prima di creare o modificare una migrazione.
Seguire questi standard per le migrazioni è fondamentale per garantire la coerenza e la correttezza del database in . Assicurarsi di consultare sempre la documentazione specifica del modulo prima di creare o modificare una migrazione.
Seguire questi standard per le migrazioni è fondamentale per garantire la coerenza e la correttezza del database in . Assicurarsi di consultare sempre la documentazione specifica del modulo prima di creare o modificare una migrazione.
Seguire questi standard per le migrazioni è fondamentale per garantire la coerenza e la correttezza del database in . Assicurarsi di consultare sempre la documentazione specifica del modulo prima di creare o modificare una migrazione.
Seguire questi standard per le migrazioni è fondamentale per garantire la coerenza e la correttezza del database in . Assicurarsi di consultare sempre la documentazione specifica del modulo prima di creare o modificare una migrazione.
Seguire questi standard per le migrazioni è fondamentale per garantire la coerenza e la correttezza del database in . Assicurarsi di consultare sempre la documentazione specifica del modulo prima di creare o modificare una migrazione.
Seguire questi standard per le migrazioni è fondamentale per garantire la coerenza e la correttezza del database in . Assicurarsi di consultare sempre la documentazione specifica del modulo prima di creare o modificare una migrazione.
Seguire questi standard per le migrazioni è fondamentale per garantire la coerenza e la correttezza del database in <nome progetto>. Assicurarsi di consultare sempre la documentazione specifica del modulo prima di creare o modificare una migrazione.
Seguire questi standard per le migrazioni è fondamentale per garantire la coerenza e la correttezza del database in <nome progetto>. Assicurarsi di consultare sempre la documentazione specifica del modulo prima di creare o modificare una migrazione.
Seguire questi standard per le migrazioni è fondamentale per garantire la coerenza e la correttezza del database in <nome progetto>. Assicurarsi di consultare sempre la documentazione specifica del modulo prima di creare o modificare una migrazione.
Seguire questi standard per le migrazioni è fondamentale per garantire la coerenza e la correttezza del database in <nome progetto>. Assicurarsi di consultare sempre la documentazione specifica del modulo prima di creare o modificare una migrazione.
Seguire questi standard per le migrazioni è fondamentale per garantire la coerenza e la correttezza del database in <nome progetto>. Assicurarsi di consultare sempre la documentazione specifica del modulo prima di creare o modificare una migrazione.
Seguire questi standard per le migrazioni è fondamentale per garantire la coerenza e la correttezza del database in <nome progetto>. Assicurarsi di consultare sempre la documentazione specifica del modulo prima di creare o modificare una migrazione.
Seguire questi standard per le migrazioni è fondamentale per garantire la coerenza e la correttezza del database in <nome progetto>. Assicurarsi di consultare sempre la documentazione specifica del modulo prima di creare o modificare una migrazione.
Seguire questi standard per le migrazioni è fondamentale per garantire la coerenza e la correttezza del database in . Assicurarsi di consultare sempre la documentazione specifica del modulo prima di creare o modificare una migrazione.
Seguire questi standard per le migrazioni è fondamentale per garantire la coerenza e la correttezza del database in <nome progetto>. Assicurarsi di consultare sempre la documentazione specifica del modulo prima di creare o modificare una migrazione.
Seguire questi standard per le migrazioni è fondamentale per garantire la coerenza e la correttezza del database in . Assicurarsi di consultare sempre la documentazione specifica del modulo prima di creare o modificare una migrazione.
Seguire questi standard per le migrazioni è fondamentale per garantire la coerenza e la correttezza del database in . Assicurarsi di consultare sempre la documentazione specifica del modulo prima di creare o modificare una migrazione.
Seguire questi standard per le migrazioni è fondamentale per garantire la coerenza e la correttezza del database in <nome progetto>. Assicurarsi di consultare sempre la documentazione specifica del modulo prima di creare o modificare una migrazione.
Seguire questi standard per le migrazioni è fondamentale per garantire la coerenza e la correttezza del database in <nome progetto>. Assicurarsi di consultare sempre la documentazione specifica del modulo prima di creare o modificare una migrazione.
Seguire questi standard per le migrazioni è fondamentale per garantire la coerenza e la correttezza del database in <nome progetto>. Assicurarsi di consultare sempre la documentazione specifica del modulo prima di creare o modificare una migrazione.
Seguire questi standard per le migrazioni è fondamentale per garantire la coerenza e la correttezza del database in . Assicurarsi di consultare sempre la documentazione specifica del modulo prima di creare o modificare una migrazione.
Seguire questi standard per le migrazioni è fondamentale per garantire la coerenza e la correttezza del database in <nome progetto>. Assicurarsi di consultare sempre la documentazione specifica del modulo prima di creare o modificare una migrazione.
Seguire questi standard per le migrazioni è fondamentale per garantire la coerenza e la correttezza del database in <nome progetto>. Assicurarsi di consultare sempre la documentazione specifica del modulo prima di creare o modificare una migrazione.
Seguire questi standard per le migrazioni è fondamentale per garantire la coerenza e la correttezza del database in <nome progetto>. Assicurarsi di consultare sempre la documentazione specifica del modulo prima di creare o modificare una migrazione.
Seguire questi standard per le migrazioni è fondamentale per garantire la coerenza e la correttezza del database in <nome progetto>. Assicurarsi di consultare sempre la documentazione specifica del modulo prima di creare o modificare una migrazione.
Seguire questi standard per le migrazioni è fondamentale per garantire la coerenza e la correttezza del database in <nome progetto>. Assicurarsi di consultare sempre la documentazione specifica del modulo prima di creare o modificare una migrazione.
Seguire questi standard per le migrazioni è fondamentale per garantire la coerenza e la correttezza del database in . Assicurarsi di consultare sempre la documentazione specifica del modulo prima di creare o modificare una migrazione.
Seguire questi standard per le migrazioni è fondamentale per garantire la coerenza e la correttezza del database in . Assicurarsi di consultare sempre la documentazione specifica del modulo prima di creare o modificare una migrazione.
Seguire questi standard per le migrazioni è fondamentale per garantire la coerenza e la correttezza del database in <nome progetto>. Assicurarsi di consultare sempre la documentazione specifica del modulo prima di creare o modificare una migrazione.
Seguire questi standard per le migrazioni è fondamentale per garantire la coerenza e la correttezza del database in . Assicurarsi di consultare sempre la documentazione specifica del modulo prima di creare o modificare una migrazione.
Seguire questi standard per le migrazioni è fondamentale per garantire la coerenza e la correttezza del database in <nome progetto>. Assicurarsi di consultare sempre la documentazione specifica del modulo prima di creare o modificare una migrazione.
Seguire questi standard per le migrazioni è fondamentale per garantire la coerenza e la correttezza del database in <nome progetto>. Assicurarsi di consultare sempre la documentazione specifica del modulo prima di creare o modificare una migrazione.
Seguire questi standard per le migrazioni è fondamentale per garantire la coerenza e la correttezza del database in <nome progetto>. Assicurarsi di consultare sempre la documentazione specifica del modulo prima di creare o modificare una migrazione.
Seguire questi standard per le migrazioni è fondamentale per garantire la coerenza e la correttezza del database in <nome progetto>. Assicurarsi di consultare sempre la documentazione specifica del modulo prima di creare o modificare una migrazione.
Seguire questi standard per le migrazioni è fondamentale per garantire la coerenza e la correttezza del database in <nome progetto>. Assicurarsi di consultare sempre la documentazione specifica del modulo prima di creare o modificare una migrazione.
Seguire questi standard per le migrazioni è fondamentale per garantire la coerenza e la correttezza del database in . Assicurarsi di consultare sempre la documentazione specifica del modulo prima di creare o modificare una migrazione.
Seguire questi standard per le migrazioni è fondamentale per garantire la coerenza e la correttezza del database in <nome progetto>. Assicurarsi di consultare sempre la documentazione specifica del modulo prima di creare o modificare una migrazione.
Seguire questi standard per le migrazioni è fondamentale per garantire la coerenza e la correttezza del database in <nome progetto>. Assicurarsi di consultare sempre la documentazione specifica del modulo prima di creare o modificare una migrazione.
Seguire questi standard per le migrazioni è fondamentale per garantire la coerenza e la correttezza del database in <nome progetto>. Assicurarsi di consultare sempre la documentazione specifica del modulo prima di creare o modificare una migrazione.
Seguire questi standard per le migrazioni è fondamentale per garantire la coerenza e la correttezza del database in <nome progetto>. Assicurarsi di consultare sempre la documentazione specifica del modulo prima di creare o modificare una migrazione.
Seguire questi standard per le migrazioni è fondamentale per garantire la coerenza e la correttezza del database in <nome progetto>. Assicurarsi di consultare sempre la documentazione specifica del modulo prima di creare o modificare una migrazione.
=======
Usare `tableCreate()` per la creazione e `tableUpdate()` per gli aggiornamenti.
Verificare colonne e indici prima di aggiungerli, così l'operazione può essere
rieseguita in modo controllato. Usare `updateTimestamps()` quando il modello
prevede le colonne di audit.

## Integrità e sicurezza dei dati

- Le migrazioni sono forward-only: non riscrivere una migrazione già rilasciata
  e non eliminare o ricreare tabelle per correggere uno schema.
- Una conversione di tipo deve preservare i dati. Se i valori esistenti non
  possono essere convertiti senza un mapping verificabile, interrompere la
  migrazione con un errore esplicito; non convertire né scartare i valori in
  silenzio.
- Non usare `migrate:fresh`, `RefreshDatabase` o comandi distruttivi. Non
  eseguire migrazioni forzate. I database sono dati sacri.
- Prima di aggiungere una foreign key, verificare che tabella, colonna e
  connessione siano compatibili. La connessione viene risolta dal modello.
- Non aggiungere `$connection` per correggere una connessione sbagliata: fissare
  la configurazione del modello owner.

## Verifiche

1. Controllare nome, modello owner e chiamanti prima di introdurre la migrazione.
2. Eseguire `php -l` sul file e PHPStan sul modulo interessato.
3. Eseguire i test Pest mirati con la configurazione di test verificata; non
   collegarli a un database di produzione.
4. Aggiornare story BMAD e documentazione owner con esito, rischio dati e gate.

Per i dettagli specifici di Lang vedere [le sue migrazioni](../../Lang/docs/migrations.md).
>>>>>>> laraxot/dev
