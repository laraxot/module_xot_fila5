---
title: "GenerateResourceFormSchemaCommand"
module: "Xot"
type: concept
tags: [generate, resource, form, schema]
created: 2026-07-14
updated: 2026-07-14
qmd: "generate resource form schema"
related:
  - "./eloquent-magic-properties-rule.md"
---
# GenerateResourceFormSchemaCommand

## Descrizione
Questo comando genera lo schema del form per una risorsa Filament, utilizzando le best practices di Laraxot e supportando la validazione PHPStan.

## Utilizzo
```bash
php artisan xot:generate-resource-form-schema {resource} {--output=}
```

### Parametri
- `resource`: Il nome della risorsa Filament (obbligatorio)
- `--output`: Il percorso di output per il file schema (opzionale)

## Funzionalità
1. Generazione automatica dello schema del form
2. Supporto per:
   - Campi di input standard
   - Relazioni
   - Validazione
   - Componenti personalizzati
3. Integrazione con:
   - Filament Forms
   - Spatie Data
   - Laravel Validation

## Schema Generato
```php
use Filament\Forms\Components;
use Spatie\LaravelData\Optional;

return [
    'schema' => [
        Components\TextInput::make('name')
            ->required()
            ->maxLength(255),
        Components\Select::make('status')
            ->options([
                'draft' => 'Bozza',
                'published' => 'Pubblicato',
            ])
            ->required(),
        // ...
    ],
];
```

## Best Practices
1. Utilizzo di strict types
2. Gestione errori robusta
3. Supporto per PHPStan livello 9
4. Conforme alle convenzioni Laraxot/<nome progetto>
5. Documentazione inline completa

## Collegamenti
- [Filament Best Practices](../filament-best-practices.md)
- [Form Components](../COMPONENTI_PERSONALIZZATI.md)
- [PHPStan Level 9 Guide](../PHPSTAN-LEVEL9-GUIDE.md)
