---
title: "Convenzioni per Form Schema in Filament"
type: note
status: active
updated: 2026-11-17
module: Xot
tags: [xot, docs, filament, form-schema]
qmd: "Convenzioni per Form Schema in Filament XotBaseResourceForm final instance"
---
# Convenzioni per Form Schema in Filament

## Perché (contratto XotBase)

Lo schema del form **non vive sulla Resource**. Vive sulla classe `Schemas/{Model}Form` che estende `XotBaseResourceForm`.

| Classe | Metodo | Firma | Motivo |
|--------|--------|-------|--------|
| `XotBaseResource` | `getFormSchema()` | `final public function` → `[]` | Blocca override sulla Resource: codice lì è morto perché `form()` delega a `getFormClass()` → `XotBaseResourceForm::configure()` |
| `XotBaseResourceForm` | `getFormSchema()` | `abstract public function` (istanza) | Unico posto in cui si dichiara lo schema; `configure()` fa `app(static::class)->form($schema)` |
| `XotBaseResourceInfolist` | `getInfolistSchema()` | `abstract public function` (istanza) | Stesso pattern via `configure()` + istanza |

### Fatal class-load tipici (da non riprodurre)

1. **`Cannot override final method XotBaseResource::getFormSchema()`** — rimuovere l'override dalla Resource; spostare i campi in `Schemas/{Model}Form`.
2. **`Cannot make non static method …::getFormSchema() static`** — allineare la figlia a metodo di istanza (`public function`, non `public static function`).
3. **`Class … contains 1 abstract method … getFormSchema`** — implementare `public function getFormSchema(): array` (anche `return []` se lo schema reale è in metodi specializzati, es. widget auth FO).

Questi errori interrompono il class loading PHP e quindi bloccano PHPStan/artisan: non sono warning, sono fatal.

## Regola operativa

1. Resource: **non** dichiarare `getFormSchema()`.
2. Form/Infolist: metodo **di istanza**, array associativo con chiavi stringa.
3. Bridge di migrazione: se serve ancora contenuto legacy sulla Resource, usare solo `getFormSchemaOld()` (non final), poi spostarlo nel Form e rimuoverlo.

## Implementazione corretta

```php
// Schemas/ArticleForm.php
final class ArticleForm extends XotBaseResourceForm
{
    /**
     * @return array<string, \Filament\Schemas\Components\Component>
     */
    public function getFormSchema(): array
    {
        return [
            'title' => TextInput::make('title')->required(),
            'content' => RichEditor::make('content')->columnSpan(2),
            'status' => Select::make('status')->options(StatusEnum::class),
        ];
    }
}
```

```php
// Schemas/ArticleInfolist.php
final class ArticleInfolist extends XotBaseResourceInfolist
{
    /**
     * @return array<string, \Filament\Schemas\Components\Component>
     */
    public function getInfolistSchema(): array
    {
        return [
            'title' => TextEntry::make('title'),
            'status' => TextEntry::make('status'),
        ];
    }
}
```

## Implementazioni errate

```php
// Override su Resource (final → fatal al load)
class ArticleResource extends XotBaseResource
{
    public static function getFormSchema(): array { /* … */ }
}

// Static su Form/Infolist (parent è instance → fatal al load)
class ArticleForm extends XotBaseResourceForm
{
    public static function getFormSchema(): array { /* … */ }
}

// Array numerico (rompe convenzione chiavi stringa / PHPStan)
return [TextInput::make('title')];
```

## Widget FO multi-schema

Se una classe estende `XotBaseResourceForm` ma espone più schema specializzati (es. `UserForm::getLoginFormSchema()`), deve comunque implementare l'astratto `getFormSchema()` — tipicamente `return []` — senza mischiare i flussi FO.

## Origine dei campi

I campi devono riflettere modello Eloquent, migration e vincoli di business: non inventare campi assenti.

## Proprietà di navigazione

Nelle Resource che estendono `XotBaseResource` non ridefinire navigation icon/group/sort/label: li gestisce la base.

## Documentazione correlata

- [XotBaseResource](filament/resources/xot-base-resource.md)
- [Array keys rule](wiki/array-keys-rule.md)
- [Compatibilità firme metodi](errors/method-signature-compatibility.md)
- [Lessons learned — form schema sulla Form class](lessons-learned.md)
- [Filament best practices](filament/filament-best-practices.md)
