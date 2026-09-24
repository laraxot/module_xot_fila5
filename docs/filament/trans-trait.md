# TransTrait

## Descrizione
Questo trait fornisce funzionalità di traduzione per i componenti Filament, implementando le best practices di Laraxot per la gestione multilingua.

## Funzionalità
1. Traduzione automatica di etichette e placeholder
2. Supporto per chiavi di traduzione nidificate
3. Fallback a valori predefiniti
4. Cache delle traduzioni
5. Supporto per namespace di traduzione personalizzati

## Metodi Principali
```php
trait TransTrait
{
    public function getTranslationKey(string $key): string;
    public function trans(string $key, array $parameters = []): string;
    public function transChoice(string $key, int $number, array $parameters = []): string;
    public function hasTranslation(string $key): bool;
}
```

## Best Practices
1. Utilizzo di strict types
2. Gestione cache efficiente
3. Supporto per PHPStan livello 9
4. Integrazione con Filament
5. Conforme alle convenzioni Laraxot/<nome progetto>

## Esempi di Utilizzo
```php
use Modules\Xot\Filament\Traits\TransTrait;

class MyResource
{
    use TransTrait;

    public function getLabel(): string
    {
        return $this->trans('resource.label');
    }
}
```

## Collegamenti
- [Filament Best Practices](../filament-best-practices.md)
<<<<<<< .merge_file_gRaQ6z
<<<<<<< HEAD
<<<<<<< HEAD
- [Translation Guidelines](translations-best-practices.md)
- [PHPStan Level 9 Guide](phpstan-level9-guide.md)
=======
<<<<<<< HEAD
<<<<<<< HEAD
- [Translation Guidelines](translations-best-practices.md)
- [PHPStan Level 9 Guide](phpstan-level9-guide.md)
=======
- [Translation Guidelines](../TRANSLATIONS-BEST-PRACTICES.md)
- [PHPStan Level 9 Guide](../PHPSTAN-LEVEL9-GUIDE.md)
>>>>>>> laraxot/dev
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
- [Translation Guidelines](../TRANSLATIONS-BEST-PRACTICES.md)
- [PHPStan Level 9 Guide](../PHPSTAN-LEVEL9-GUIDE.md)
>>>>>>> 3792da0d (Check & fix styling)
=======
- [Translation Guidelines](translations-best-practices.md)
- [PHPStan Level 9 Guide](phpstan-level9-guide.md)
>>>>>>> .merge_file_n3tgCw
=======
=======
- [Translation Guidelines](../TRANSLATIONS-BEST-PRACTICES.md)
- [PHPStan Level 9 Guide](../PHPSTAN-LEVEL9-GUIDE.md)
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
- [Translation Guidelines](../translations-best-practices.md)
- [PHPStan Level 9 Guide](../phpstan-level9-guide.md)