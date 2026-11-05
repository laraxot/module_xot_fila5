---
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

```php
<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
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
        });
    }
};
```

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
