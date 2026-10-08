---
title: "error formatter contract"
type: note
tags: [documentation]
created: 2026-09-26
updated: 2026-09-26
qmd: "error formatter contract"
issues: []
discussions: []
---

# ErrorFormatterContract

## Descrizione
Questa interfaccia definisce il contratto per i formattatori di errori nel sistema Laraxot.

## Struttura
```php
interface ErrorFormatterContract
{
    public function __construct(\Throwable $exception);

    /**
     * @return array<string, mixed>
     */
    public function format(): array;
}
```

## Funzionalità
1. Definizione del contratto per la formattazione degli errori
2. Standardizzazione dell'output degli errori
3. Supporto per:
   - Formattazione consistente
   - Gestione eccezioni
   - Metadati personalizzati

## Implementazioni
- `WebhookErrorFormatter`: Formatta gli errori per l'invio tramite webhook
- Altri formattatori personalizzati

## Best Practices
1. Utilizzo di strict types
2. Documentazione PHPDoc completa
3. Supporto per PHPStan livello 9
4. Conforme alle convenzioni Laraxot/<nome progetto>

## Collegamenti
- [Error Handling Guidelines](../EXCEPTION-HANDLING-GUIDE.md)
- [Error Formatters](../exceptions/formatters/README.md)
- [PHPStan Level 9 Guide](../PHPSTAN-LEVEL9-GUIDE.md)
