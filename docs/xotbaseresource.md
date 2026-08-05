# XotBaseResource

## Panoramica

XotBaseResource è la classe base astratta per tutte le risorse Filament nel sistema. Estende `Filament\Resources\Resource` e implementa funzionalità comuni per la gestione delle risorse.

## Caratteristiche Principali

### Metodi Final

Alcuni metodi sono marcati come `final` e non possono essere sovrascritti nelle classi figlie:

```php
final public static function form(Schema $schema): Schema
{
    $form_class = static::class.'\Schemas\\'.class_basename(static::getModel()).'Form';
    if (class_exists($form_class)) {
        return $form_class::configure($schema);          // rotta preferita
    }

    return $schema->components(static::getFormSchemaOld())
                  ->columns(static::getFormSchemaColumns());
}

final public static function getFormSchema(): array
{
    return static::getFormSchemaOld();
}
```

Questo significa che:
- Non è possibile sovrascrivere né `form()` né `getFormSchema()`: sono entrambi `final`
- Lo schema va messo nella classe `{Resource}\Schemas\{Model}Form`, oppure — per il
  codice non ancora migrato — in `getFormSchemaOld()`
- Tentare di sovrascrivere un metodo `final` causa un **fatal error** che ferma
  PHPStan sull'intero progetto, non un errore sul singolo file

### Metodi Astratti

```php
abstract public static function getFormSchemaOld(): array;
```

Questo metodo DEVE essere implementato in **ogni Resource concreta** e restituisce
un array di componenti del form. Una Resource concreta che non lo dichiara produce
un fatal error (`Class X contains 1 abstract method…`).

> **Il nome `Old` è voluto: è la sede transitoria degli schemi inline.** La rotta di
> destinazione è la classe `*Form`; `getFormSchemaOld()` esiste per il codice non
> ancora migrato e per delegarvi.

### Le due gerarchie da non confondere

| Estendi… | Implementa | File base |
|---|---|---|
| `XotBaseResource` | **`getFormSchemaOld()`** | `Filament/Resources/XotBaseResource.php` |
| `XotBaseResourceForm` | **`getFormSchema()`** | `Filament/Resources/Schemas/XotBaseResourceForm.php` |

Sono alberi separati e senza parentela: il nome quasi identico è l'unica cosa che
li collega. Confonderli è ciò che il 2026-08-05 ha rotto 141 classi `*Form`.
Dettaglio completo: [pattern getFormSchema/getFormSchemaOld](../../../../docs/wiki/filament/xotbaseresource-formschema-old-pattern.md).

## Best Practices

1. **Non Sovrascrivere Metodi Final**
   - Non tentare di sovrascrivere `form()` né `getFormSchema()`
   - Implementare invece `getFormSchemaOld()`, o meglio creare la classe `*Form`
   - Rispettare la struttura definita nella classe base

2. **Gestione delle Table Actions**
   - Se `getTableActions()` restituisce solo ViewAction, EditAction e DeleteAction, rimuoverlo
   - Se presente, deve includere `...parent::getTableActions()`
   - Se `getTableBulkActions()` restituisce solo DeleteBulkAction, rimuoverlo

3. **Label e Traduzioni**
   - Non utilizzare mai `->label('')` direttamente
   - Gestire le label tramite file di traduzione
   - Utilizzare il trait `NavigationLabelTrait`

## Esempio di Implementazione Corretta

Rotta preferita — lo schema vive nella `*Form`, la Resource delega:

```php
namespace Modules\Notify\Filament\Resources;

use Modules\Notify\Filament\Resources\NotificationResource\Schemas\NotificationForm;
use Modules\Notify\Models\Notification;
use Modules\Xot\Filament\Resources\XotBaseResource;

class NotificationResource extends XotBaseResource
{
    protected static ?string $model = Notification::class;

    /**
     * @return array<int|string, \Filament\Schemas\Components\Component>
     */
    #[\Override]
    public static function getFormSchemaOld(): array
    {
        return NotificationForm::getFormSchema();   // ← Form ⇒ getFormSchema
    }

    // Non sovrascrivere form()/getFormSchema(): sono final
    // Non definire getTableActions() se restituisce solo azioni standard
}
```

```php
namespace Modules\Notify\Filament\Resources\NotificationResource\Schemas;

use Filament\Forms\Components\TextInput;
use Modules\Xot\Filament\Resources\Schemas\XotBaseResourceForm;

class NotificationForm extends XotBaseResourceForm
{
    /**
     * @return array<string, \Filament\Schemas\Components\Component>
     */
    public static function getFormSchema(): array   // ← qui NON è "Old"
    {
        return [
            'title' => TextInput::make('title'),
            // Non usare ->label() direttamente: le label stanno nei file di traduzione
        ];
    }
}
```

Le due righe sembrano contraddittorie e non lo sono: `getFormSchemaOld` perché la
classe che lo **dichiara** è una Resource, `getFormSchema` perché la classe che lo
**riceve** è una Form.

## Collegamenti Bidirezionali

### Collegamenti nella Root
- [Architettura Filament](../../../docs/architecture/filament.md)
- [Gestione Risorse](../../../docs/architecture/resources.md)
- [Regole XotBaseResource](../../../docs/regole/xotbaseresource-rules.md)

### Collegamenti ai Moduli
- [Notify Resource](../../Notify/docs/filament-resources.md)
- [User Resource](../../User/docs/filament-resources.md)

## Note Importanti

1. Non sovrascrivere mai metodi marcati come `final`
2. Implementare sempre i metodi astratti richiesti
3. Utilizzare i file di traduzione per le label
4. Evitare override non necessari di metodi
5. Seguire le convenzioni di Filament
