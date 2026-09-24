# Regole Visibilità Metodi Widget - HasXotTable

<<<<<<< .merge_file_x4pDKG
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< .merge_file_WDdGMm
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
<<<<<<< .merge_file_WDdGMm
<<<<<<< HEAD
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
**Data Creazione**: 2025-01-27  
**Ultimo Aggiornamento**: 2026-01-27  
**Ultimo Aggiornamento**: 2026-01-27  
**Status**: ✅ Critico
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 3792da0d (Check & fix styling)

## Regola Fondamentale

Tutti i metodi `getTable*()` nel trait `HasXotTable` sono dichiarati come `protected` per allinearsi a Filament 5 ed evitare conflitti di visibilità con il trait `InteractsWithTable`. Le classi (pagine/widget) che sovrascrivono questi metodi possono continuare a usare `public` per permettere l'accesso cross-component (widening), ma nel trait devono rimanere `protected`.
Tutti i metodi `getTable*()` nel trait `HasXotTable` sono dichiarati come `protected` per allinearsi a Filament 5 ed evitare conflitti di visibilità con il trait `InteractsWithTable`. Le classi (pagine/widget) che sovrascrivono questi metodi possono continuare a usare `public` per permettere l'accesso cross-component (widening), ma nel trait devono rimanere `protected`.
Tutti i metodi `getTable*()` in `HasXotTable` sono dichiarati come `public` perché vengono chiamati da Filament/Livewire dall'esterno della classe. I widget che sovrascrivono questi metodi **DEVONO** mantenere la stessa visibilità `public`.

<<<<<<< HEAD
=======
>>>>>>> da9ae01a0 (.)
=======
**Status**: Critico
**Ultimo aggiornamento**: 2026-09-03
=======
=======
=======
>>>>>>> .merge_file_wil4Jd
**Status**: Critico
**Ultimo aggiornamento**: 2026-09-03

## Regola Fondamentale

Tutti i metodi `getTable*()` in `HasXotTable` sono dichiarati come `public` perché vengono chiamati da Filament/Livewire dall'esterno della classe. I widget che sovrascrivono questi metodi **DEVONO** mantenere la stessa visibilità `public`.

In Filament 5, i metodi deprecati `getTableColumns`, `getTableFilters`, `getTableActions`, `getTableBulkActions` devono essere migrati verso `table(Table $table): Table`. La regola `resolve*` non esiste come metodo: usare sempre `get*`.

<<<<<<< .merge_file_x4pDKG
<<<<<<< HEAD
=======
=======
<<<<<<< .merge_file_WDdGMm
=======
>>>>>>> laraxot/dev
**Status**: Critico
**Ultimo aggiornamento**: 2026-09-03
=======
**Data Creazione**: 2025-01-27  
**Ultimo Aggiornamento**: 2026-01-27  
**Ultimo Aggiornamento**: 2026-01-27  
**Status**: ✅ Critico
>>>>>>> .merge_file_K6IqQn
=======
>>>>>>> 930f8146 (Check & fix styling)

## Regola Fondamentale

Tutti i metodi `getTable*()` nel trait `HasXotTable` sono dichiarati come `protected` per allinearsi a Filament 5 ed evitare conflitti di visibilità con il trait `InteractsWithTable`. Le classi (pagine/widget) che sovrascrivono questi metodi possono continuare a usare `public` per permettere l'accesso cross-component (widening), ma nel trait devono rimanere `protected`.
Tutti i metodi `getTable*()` nel trait `HasXotTable` sono dichiarati come `protected` per allinearsi a Filament 5 ed evitare conflitti di visibilità con il trait `InteractsWithTable`. Le classi (pagine/widget) che sovrascrivono questi metodi possono continuare a usare `public` per permettere l'accesso cross-component (widening), ma nel trait devono rimanere `protected`.
Tutti i metodi `getTable*()` in `HasXotTable` sono dichiarati come `public` perché vengono chiamati da Filament/Livewire dall'esterno della classe. I widget che sovrascrivono questi metodi **DEVONO** mantenere la stessa visibilità `public`.

<<<<<<< HEAD
<<<<<<< .merge_file_WDdGMm
In Filament 5, i metodi deprecati `getTableColumns`, `getTableFilters`, `getTableActions`, `getTableBulkActions` devono essere migrati verso `table(Table $table): Table`. La regola `resolve*` non esiste come metodo: usare sempre `get*`.

<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
=======
>>>>>>> .merge_file_K6IqQn
>>>>>>> laraxot/dev
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_wil4Jd
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
## Metodi che Devono Essere Public

| Metodo | Visibilità Richiesta | Motivo |
|--------|---------------------|--------|
| `getTableHeading()` | `public` | Chiamato da Filament per heading |
| `getTableHeaderActions()` | `public` | Chiamato da Filament per azioni header |
| `getTableActions()` | `public` | Chiamato da Filament per azioni riga |
| `getTableBulkActions()` | `public` | Chiamato da Filament per azioni bulk |
| `getTableFilters()` | `public` | Chiamato da Filament per filtri |
| `getTableSearch()` | `public` | Chiamato da ListRecords per ricerca |

## Metodi che Possono Essere Protected

| Metodo | Visibilità | Motivo |
|--------|-----------|--------|
| `getDefaultTableSortColumn()` | `protected` | Chiamato internamente da `table()` |
| `getDefaultTableSortDirection()` | `protected` | Chiamato internamente da `table()` |
| `getTablePaginated()` | `protected` | Chiamato internamente da `table()` |
| `getTablePollInterval()` | `protected` | Chiamato internamente da `table()` |

## Esempio Corretto

```php
<?php

declare(strict_types=1);

<<<<<<< .merge_file_x4pDKG
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
namespace Modules\healthcare_app\Filament\Widgets;
=======
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< .merge_file_WDdGMm
<<<<<<< HEAD
namespace Modules\healthcare_app\Filament\Widgets;
=======
=======
>>>>>>> .merge_file_K6IqQn
namespace Modules\Quaeris\Filament\Widgets;
=======
namespace Modules\healthcare_app\Filament\Widgets;
>>>>>>> laraxot/dev
=======
>>>>>>> laraxot/dev
namespace Modules\Quaeris\Filament\Widgets;
>>>>>>> laraxot/dev
=======
namespace Modules\healthcare_app\Filament\Widgets;
<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
=======
namespace Modules\Quaeris\Filament\Widgets;
>>>>>>> .merge_file_wil4Jd
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)

use Modules\Xot\Filament\Widgets\XotBaseTableWidget;

class MyWidget extends XotBaseTableWidget
{
    /**
     * CRITICO: Deve essere public.
     *
     * @return array<string, \Filament\Actions\Action>
     */
    public function getTableHeaderActions(): array
    {
        return [
            // Azioni
        ];
    }

    /**
     * CRITICO: Deve essere public.
     *
     * @return array<string, \Filament\Tables\Filters\Filter>
     */
    public function getTableFilters(): array
    {
        return [
            // Filtri
        ];
    }

    /**
     * Può essere protected (chiamato internamente).
     */
    protected function getDefaultTableSortColumn(): ?string
    {
        return 'created_at';
    }
}
```

## Errori Comuni

### Errore: Access level must be public

```
<<<<<<< .merge_file_x4pDKG
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
PHP Fatal error: Access level to Widget::getTableHeaderActions() 
=======
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< .merge_file_WDdGMm
<<<<<<< HEAD
PHP Fatal error: Access level to Widget::getTableHeaderActions() 
=======
=======
>>>>>>> .merge_file_K6IqQn
PHP Fatal error: Access level to Widget::getTableHeaderActions()
=======
PHP Fatal error: Access level to Widget::getTableHeaderActions() 
>>>>>>> laraxot/dev
=======
>>>>>>> laraxot/dev
PHP Fatal error: Access level to Widget::getTableHeaderActions()
>>>>>>> laraxot/dev
=======
PHP Fatal error: Access level to Widget::getTableHeaderActions() 
<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
=======
PHP Fatal error: Access level to Widget::getTableHeaderActions()
>>>>>>> .merge_file_wil4Jd
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
must be public (as in class HasXotTable)
```

**Causa**: Metodo dichiarato come `protected` invece di `public`

**Soluzione**: Cambiare visibilità a `public`

<<<<<<< .merge_file_x4pDKG
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< .merge_file_WDdGMm
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
<<<<<<< .merge_file_WDdGMm
<<<<<<< HEAD
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
## Riferimenti

- [HasXotTable Trait Source](../../../Modules/Xot/app/Filament/Traits/HasXotTable.php)
- [Widget Table Configuration](../../../Modules/Xot/docs/filament/widget-table-configuration.md)

*Ultimo aggiornamento: 2025-01-27*
<<<<<<< HEAD
- [Widget Table Configuration](../../../modules/xot/docs/filament/widget-table-configuration.md)
=======
<<<<<<< HEAD
=======
=======
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_K6IqQn
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_wil4Jd
## Convenzioni di Naming

- `get*()` (mai `resolve*`, `getXot*`): convention Filament/Livewire standard
- Prefisso `Xot` solo per classi/trait (mai per metodi) - es. `XotBaseTableWidget`, `HasXotTable`
- `getTable*()` per hook tabella Filament, `getHeaderActions()` per azioni header pagina

## Riferimenti

- [HasXotTable Trait Source](../../../Modules/Xot/app/Filament/Traits/HasXotTable.php)
- [Filament 5 Migration Guide](https://filamentphp.com/docs/5.x/tables/upgrade-guide)
<<<<<<< .merge_file_x4pDKG
<<<<<<< HEAD
=======
<<<<<<< .merge_file_WDdGMm
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
=======
=======
## Riferimenti

- [HasXotTable Trait Source](../../../Modules/Xot/app/Filament/Traits/HasXotTable.php)
- [Widget Table Configuration](../../../Modules/Xot/docs/filament/widget-table-configuration.md)

*Ultimo aggiornamento: 2025-01-27*
- [Widget Table Configuration](../../../modules/xot/docs/filament/widget-table-configuration.md)
>>>>>>> .merge_file_K6IqQn
>>>>>>> laraxot/dev
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
- [Widget Table Configuration](../../../modules/xot/docs/filament/widget-table-configuration.md)
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_wil4Jd
=======
=======
- [Widget Table Configuration](../../../modules/xot/docs/filament/widget-table-configuration.md)
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
