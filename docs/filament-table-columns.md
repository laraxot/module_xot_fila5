<<<<<<< .merge_file_utiLtB
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< .merge_file_0Tgqx5
<<<<<<< HEAD
=======
=======
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_POTMkK
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_HqUMQM
---
title: "Regola Generale: Metodo getTableColumns per Filament Table (Xot)"
module: "Xot"
type: concept
tags: [filament, table, columns]
created: 2026-07-14
updated: 2026-07-14
qmd: "filament table columns"
related:
  - "./eloquent-magic-properties-rule.md"
---
<<<<<<< .merge_file_utiLtB
<<<<<<< HEAD
=======
<<<<<<< .merge_file_0Tgqx5
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_POTMkK
=======
>>>>>>> laraxot/dev
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_HqUMQM
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
# Regola Generale: Metodo getTableColumns per Filament Table (Xot)

## Regola
Tutte le Filament Table (Pages, RelationManagers, ecc.) nei moduli devono usare il metodo `getTableColumns` per definire le colonne della tabella.

- **Non usare più:** `getListTableColumns`
- **Usare sempre:** `getTableColumns`

## Motivazione
- Uniformità con lo standard Filament
- Migliore leggibilità e manutenibilità
- Facilità di upgrade e adozione di nuove versioni

## Esempio
```php
// Corretto
public function getTableColumns(): array
{
    return [ ... ];
}
```

## Applicazione
- Obbligatorio per tutti i moduli
- Ogni modulo deve documentare l'adozione nella sua docs/
- Aggiornare override, chiamate e test

<<<<<<< .merge_file_utiLtB
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> .merge_file_HqUMQM
=======
>>>>>>> da9ae01a0 (.)
**Nota:** Nei moduli come Performance, la logica tabellare (colonne, filtri, azioni) va sempre nelle pagine (che estendono `Modules\Xot\Filament\Resources\Pages\XotBaseListRecords`), non nelle Resource. Vedi esempio e motivazione nella [documentazione Performance](../../Performance/docs/filament-resources.md).

## Collegamenti
- [Esempio e Applicazione - Modulo User](filament_table_columns.md)
<<<<<<< .merge_file_utiLtB
>>>>>>> laraxot/dev
<<<<<<< HEAD
- [Regola Globale - Root Docs](../../../../docs/filament-table-columns.md)
=======
=======
- [Esempio e Applicazione - Modulo User](filament_table_columns.md)
>>>>>>> laraxot/dev
=======
- [Esempio e Applicazione - Modulo User](filament_table_columns.md)
>>>>>>> .merge_file_POTMkK
- [Regola Globale - Root Docs](../../../../docs/filament-table-columns.md)
=======
=======
>>>>>>> 3792da0d (Check & fix styling)
**Nota:** Nei moduli come Performance, la logica tabellare (colonne, filtri, azioni) va sempre nelle pagine (che estendono `Modules\Xot\Filament\Resources\Pages\XotBaseListRecords`), non nelle Resource. Vedi esempio e motivazione nella [documentazione Performance](../../performance/docs/filament-resources.md).

## Collegamenti
- [Esempio e Applicazione - Modulo User](../../../user/docs/filament/filament_table_columns.md)
=======
>>>>>>> 930f8146 (Check & fix styling)
**Nota:** Nei moduli come Performance, la logica tabellare (colonne, filtri, azioni) va sempre nelle pagine (che estendono `Modules\Xot\Filament\Resources\Pages\XotBaseListRecords`), non nelle Resource. Vedi esempio e motivazione nella [documentazione Performance](../../Performance/docs/filament-resources.md).

## Collegamenti
- [Esempio e Applicazione - Modulo User](../../../User/docs/filament/FILAMENT_TABLE_COLUMNS.md)
- [Regola Globale - Root Docs](../../../../docs/filament-table-columns.md)
<<<<<<< HEAD
- [Regola Globale - Root Docs](../../../../../docs/filament-table-columns.md)
<<<<<<< HEAD
>>>>>>> laraxot/dev
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
- [Regola Globale - Root Docs](../../../../docs/filament-table-columns.md)
>>>>>>> .merge_file_HqUMQM
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)

## Nota storica: correzione XotBaseManageRelatedRecords

- La classe XotBaseManageRelatedRecords è stata aggiornata per rispettare PHPStan livello 10.
- Tutti i metodi pubblici sono ora tipizzati e documentati con PHPDoc.
- Uso sistematico di Assert e fallback robusti.
- Vietato l'uso di return impliciti, mixed o cast forzati.
- Il metodo per le colonne della tabella è sempre getTableColumns.

**Collegamento:** Vedi anche [filament_components.md](./filament_components.md)

---

**Ultimo aggiornamento:** 2025-05-13

<<<<<<< .merge_file_utiLtB
<<<<<<< HEAD
<<<<<<< HEAD
**Link bidirezionale:** Aggiornare anche la root docs e la docs dei moduli coinvolti.
=======
<<<<<<< HEAD
<<<<<<< HEAD
**Link bidirezionale:** Aggiornare anche la root docs e la docs dei moduli coinvolti.
=======
**Link bidirezionale:** Aggiornare anche la root docs e la docs dei moduli coinvolti.
>>>>>>> laraxot/dev
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
**Link bidirezionale:** Aggiornare anche la root docs e la docs dei moduli coinvolti.
>>>>>>> 3792da0d (Check & fix styling)
=======
**Link bidirezionale:** Aggiornare anche la root docs e la docs dei moduli coinvolti.
>>>>>>> .merge_file_HqUMQM
=======
=======
**Link bidirezionale:** Aggiornare anche la root docs e la docs dei moduli coinvolti.
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
