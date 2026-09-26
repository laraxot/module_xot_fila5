# Metodi da NON implementare in classi che estendono XotBaseResource

> ⚠️ **Il divieto vale solo per le RESOURCE (metodi `static`).**
> Lo stesso identico metodo `getTableColumns()` è invece **l'hook legittimo e
> consigliato** sulle Page `XotBaseManageRelatedRecords` (dove `table()` è `final` e
> non si può seguire il consiglio di Filament «override `table()`»).
> Se non distingui i due casi, leggi
> [`filament-gettablecolumns-deprecation.md`](../../../../docs/wiki/memories/filament-gettablecolumns-deprecation.md)
> prima di applicare questa regola. [STORY-492](../../../../docs/stories/STORY-492-gettablecolumns-deprecation-guidance.md)

## Regola fondamentale

Le classi che **estendono `XotBaseResource`** (le Resource) **NON DEVONO MAI** implementare
i seguenti metodi:

### Metodi di tabella
- ❌ `getTableColumns()` — **vietato come `static` sulla Resource**. Lo stesso nome è un
  override point valido su `XotBaseManageRelatedRecords`; vedi il box sopra.
- ❌ `getTableFilters()`
- ❌ `getTableActions()`
- ❌ `getTableBulkActions()`
- ❌ `getNavigationGroup()`

### Metodi di form e navigazione
- ❌ `form(Form $form): Form`
- ❌ `table(Table $table): Table`
- ❌ `getPages()` (se contiene solo route standard)
- ❌ `getRelations()` (se restituisce un array vuoto)

## Motivazione architetturale

Questi metodi sono già implementati in `XotBaseResource` e forniscono funzionalità standard ottimizzate per il progetto. Sovrascriverli:

1. **Rompe l'astrazione**: La classe base fornisce un'implementazione standardizzata
2. **Duplica il codice**: Porta a duplicazione non necessaria e difficoltà di manutenzione
3. **Riduce la coerenza**: Crea incoerenze nell'interfaccia utente e nel comportamento
4. **Complica gli aggiornamenti**: Rende più difficile aggiornare il comportamento a livello di sistema

## Pattern corretto

```php
class ProductResource extends XotBaseResource
{
    protected static ?string $model = Product::class;

    // UNICI metodi che dovrebbero essere implementati
<<<<<<< HEAD
    public function getFormSchema(): array
=======
    public function getFormSchema(): array
>>>>>>> laraxot/dev
    {
        return [
            'name' => Forms\Components\TextInput::make('name')
                ->required(),
            // Altri campi...
        ];
    }

    // Solo se è necessario personalizzare la query
    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([SoftDeletingScope::class]);
    }
}
```

## Casi eccezionali

L'implementazione di questi metodi è giustificata **SOLO** in casi rari ed eccezionali, quando:

1. È necessario un comportamento radicalmente diverso da quello standard
2. Il comportamento non può essere ottenuto attraverso altre configurazioni
3. Il team di sviluppo ha esplicitamente approvato questa eccezione

## Verifica automatica

Prima di ogni commit, verificare che le risorse Filament non contengano metodi proibiti:

```bash

# Cerca implementazioni non necessarie
grep -r "public static function getTableColumns" --include="*Resource.php" Modules/
grep -r "public static function getTableFilters" --include="*Resource.php" Modules/
grep -r "public static function getTableActions" --include="*Resource.php" Modules/
grep -r "public static function getTableBulkActions" --include="*Resource.php" Modules/
grep -r "public static function getNavigationGroup" --include="*Resource.php" Modules/
```

## Processo di refactoring

Se questi metodi sono trovati in una classe esistente:

1. Rimuovere completamente il metodo se il comportamento è standard
2. Se contiene personalizzazioni critiche, discutere con il team come ottenere lo stesso risultato usando meccanismi standard
3. Documentare qualsiasi eccezione con commenti dettagliati che spiegano perché è necessaria
