<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Pages;

<<<<<<< HEAD
use LogicException;
use RuntimeException;
use Illuminate\Auth\Access\AuthorizationException;
=======
>>>>>>> c7fd73eb (.)
use Filament\Actions\Action;
use Filament\Facades\Filament;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
<<<<<<< HEAD
use Filament\Pages\Page as FilamentPage;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Modules\Xot\Actions\View\GetViewByClassAction;
use Modules\Xot\Filament\Traits\TransTrait;
use Webmozart\Assert\Assert;
use Filament\Schemas\Schema;

/**
 * Classe base astratta per tutte le pagine Filament non legate a risorse specifiche.
 * Fornisce funzionalità comuni e standardizzate per la gestione delle pagine.
=======
use Filament\Pages\Page;
// use Filament\Resources\Pages\Page;
use Filament\Schemas\Schema;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Modules\Xot\Actions\View\GetViewByClassAction;
use Modules\Xot\Filament\Traits\TransTrait;

/**
 * Classe base astratta per tutte le pagine Filament *standalone* (non legate a risorse specifiche).
 * Fornisce funzionalità comuni e standardizzate per la gestione delle pagine personalizzate.
>>>>>>> c7fd73eb (.)
 *
 * Implementa:
 * - Sistema di traduzioni integrato
 * - Gestione autorizzazioni
 * - Integrazione con form
 * - Rilevamento intelligente modello
 * - Metodi helper comuni
 *
<<<<<<< HEAD
 * @property ?string              $model Il modello associato alla pagina
 * @property array<string, mixed> $data  I dati del form
     * @property \Filament\Schemas\Schema $form Il form della pagina
 *
 * @see \Modules\Xot\docs\xotbasepage_implementation.md Documentazione completa
 */
abstract class XotBasePage extends FilamentPage implements HasForms
{
    use TransTrait;
    use InteractsWithForms;

    /**
     * Vista predefinita per la pagina.
     * Deve essere sovrascritta nelle classi figlie.
     */
    protected string $view = '';
=======
 * @property ?string $model Il modello associato alla pagina
 * @property array<string, mixed> $data I dati del form
 *
 * @see \Modules\Xot\docs\xotbasepage_implementation.md Documentazione completa
 */
abstract class XotBasePage extends Page implements HasForms
{
    use InteractsWithForms;
    use TransTrait;
>>>>>>> c7fd73eb (.)

    /**
     * Modello associato alla pagina.
     * Se non specificato, verrà dedotto automaticamente dal nome della classe.
     *
     * @var class-string<Model>|null
     */
<<<<<<< HEAD
    public static null|string $model = null;
=======
    public static ?string $model = null;
>>>>>>> c7fd73eb (.)

    /**
     * Dati del form.
     * Contiene i dati del form durante la gestione della pagina.
     *
     * @var array<string, mixed>
     */
    public array $data = [];

    /**
<<<<<<< HEAD
=======
     * Vista predefinita per la pagina.
     * Deve essere sovrascritta nelle classi figlie.
     */
    protected string $view = '';

    /**
>>>>>>> c7fd73eb (.)
     * Cache timeout per operazioni di cache (in secondi).
     */
    protected static int $cacheTimeout = 3600;

    /**
     * Ottiene il nome del modulo dalla classe.
     * Estrae il nome del modulo dal namespace della classe.
     *
<<<<<<< HEAD
     * @return string Il nome del modulo (es. 'SaluteOra', 'User', ecc.)
=======
     * @return string Il nome del modulo (es. '<main module>', 'User', ecc.)
>>>>>>> c7fd73eb (.)
     */
    public static function getModuleName(): string
    {
        $namespace = static::class;
        $moduleName = Str::between($namespace, 'Modules\\', '\\Filament');

<<<<<<< HEAD
        if ('' === $moduleName) {
            throw new LogicException(sprintf('Cannot extract module name from class %s', static::class));
=======
        if ($moduleName === '') {
            throw new \LogicException(sprintf('Cannot extract module name from class %s', static::class));
>>>>>>> c7fd73eb (.)
        }

        return $moduleName;
    }

    /**
<<<<<<< HEAD
     * Ottiene la chiave di traduzione per un dato key.
     * Genera un percorso di traduzione standardizzato basato sul modulo e sul nome della classe.
     *
     * @param string $key La chiave di traduzione specifica
     * @param array<string, bool|float|int|string> $replace Parametri di sostituzione per la traduzione
     * @param string|null $locale Locale da utilizzare (null = locale corrente)
     * @param bool $useFallback Se true, utilizza la chiave come fallback se la traduzione non esiste
     *
     * @return string La stringa tradotta o la chiave originale se non trovata
     */
    public static function trans(
        string $key,
        array $replace = [],
        null|string $locale = null,
        bool $useFallback = true,
    ): string {
        $moduleNameLow = Str::lower(static::getModuleName());
        $p = Str::after(static::class, 'Filament\\Pages\\');
        $p_arr = explode('\\', $p);
        $slug = collect($p_arr)->map(Str::kebab(...))->implode('.');

        $translationKey = $moduleNameLow . '::' . $slug . '.' . $key;
        $translation = __($translationKey, $replace, $locale);

        if ($translation === $translationKey && App::environment('local', 'development', 'testing')) {
            Log::warning("Traduzione mancante: {$translationKey}");

            return $useFallback ? $key : $translationKey;
        }

        return (string) $translation;
    }

    /**
=======
>>>>>>> c7fd73eb (.)
     * Ottiene l'etichetta plurale del modello.
     *
     * @return string L'etichetta plurale del modello
     */
    public static function getPluralModelLabel(): string
    {
        return static::trans('plural_label');
    }

    /**
     * Ottiene il gruppo di navigazione.
     *
<<<<<<< HEAD
     * @return string Il gruppo di navigazione
     */
    public static function getNavigationGroup(): string
=======
     * @return \UnitEnum|string|null Il gruppo di navigazione
     */
    public static function getNavigationGroup(): \UnitEnum|string|null
>>>>>>> c7fd73eb (.)
    {
        return static::transFunc(__FUNCTION__);
    }

    /**
     * Ottiene il modello associato alla pagina.
     * Se non specificato esplicitamente, tenta di dedurlo dal nome della classe.
     *
     * @return class-string<Model> Il namespace completo della classe del modello
     */
    public function getModel(): string
    {
<<<<<<< HEAD
        /** @phpstan-ignore property.staticAccess */
        if (static::$model !== null) {
            /** @var class-string<Model> $model */
            /** @phpstan-ignore property.staticAccess */
            $model = static::$model;

            return $model;
=======
        if (static::$model !== null) {
            /** @var class-string<Model> $modelValue */
            $modelValue = static::$model;

            return $modelValue;
>>>>>>> c7fd73eb (.)
        }

        $moduleName = static::getModuleName();
        $className = class_basename(static::class);

        // Rimuove suffissi comuni per ottenere il nome del modello
        $modelName = Str::of($className)
            ->before('Resource')
            ->before('Page')
            ->before('Dashboard')
            ->before('Report')
            ->trim()
            ->toString();

<<<<<<< HEAD
        if ('' === $modelName) {
            throw new LogicException(sprintf('Cannot determine model name from class %s', static::class));
        }

        $modelNamespace = 'Modules\\' . $moduleName . '\\Models\\' . $modelName;

        // Verifica che la classe del modello esista
        if (!class_exists($modelNamespace)) {
            throw new LogicException("Model class {$modelNamespace} does not exist");
        }
        Assert::classExists($modelNamespace);
        Assert::isInstanceOf($modelNamespace, Model::class);
=======
        if ($modelName === '') {
            throw new \LogicException(sprintf('Cannot determine model name from class %s', static::class));
        }

        $modelNamespace = 'Modules\\'.$moduleName.'\\Models\\'.$modelName;

        // Verifica che la classe del modello esista
        if (! class_exists($modelNamespace) || ! is_subclass_of($modelNamespace, Model::class)) {
            throw new \LogicException("Model class {$modelNamespace} does not exist");
        }

>>>>>>> c7fd73eb (.)
        /* @var class-string<Model> $modelNamespace */
        return $modelNamespace;
    }

<<<<<<< HEAD
=======
    /**
     * Configura il form della pagina.
     * Imposta lo schema e il percorso dello stato per il form.
     *
     * @param  Schema  $schema  Il form da configurare
     * @return Schema Lo schema configurato
     */
    public function schema(Schema $schema): Schema
    {
        $schema = $schema->components($this->resolveFormSchemaForXotPage());

        $schema->statePath('data');

        $debounce = $this->getAutosaveDebounce();
        if ($debounce !== null && method_exists($schema, 'autosaveDebounce')) {
            $schema->autosaveDebounce($debounce);
        }

        return $schema;
    }

    /**
     * Ottiene la vista associata alla pagina.
     *
     * @return string Il percorso della vista
     */
    public function getView(): string
    {
        if ($this->view === '') {
            $view = app(GetViewByClassAction::class)->execute(static::class);
            if (view()->exists($view)) {
                return (string) $view;
            }

            // Se non troviamo una vista, lanciamo un'eccezione
            throw new \RuntimeException('Nessuna vista trovata per la classe: '.static::class);
        }

        return $this->view;
    }

    /**
     * Resolve concrete page schema without invoking deprecated Filament hook directly.
     *
     * @return array<int|string, \Filament\Schemas\Components\Component>
     */
    private function resolveFormSchemaForXotPage(): array
    {
        $method = new \ReflectionMethod($this, 'getFormSchema');
        $declaringClass = $method->getDeclaringClass()->getName();

        if (self::class === $declaringClass || str_starts_with($declaringClass, 'Filament\\')) {
            return [];
        }

        /** @var array<int|string, \Filament\Schemas\Components\Component> $schema */
        $schema = $method->invoke($this);

        return $schema;
    }
>>>>>>> c7fd73eb (.)

    /**
     * Ottiene il tempo di debounce per l'autosave in millisecondi.
     * Sovrascrivere nelle classi figlie per modificare questo valore.
     *
     * @return int|null Il tempo di debounce in millisecondi o null per disabilitare l'autosave
     */
<<<<<<< HEAD
    protected function getAutosaveDebounce(): null|int
=======
    protected function getAutosaveDebounce(): ?int
>>>>>>> c7fd73eb (.)
    {
        return null; // Disabilitato per default
    }

    /**
     * Ottiene l'utente autenticato.
     * Verifica che l'utente sia un'istanza di Model per permettere aggiornamenti.
     *
<<<<<<< HEAD
     * @throws RuntimeException Se l'utente non è autenticato o non è un'istanza di Model
     *
     * @return Authenticatable&Model L'utente autenticato
=======
     *
     * @return Authenticatable&Model L'utente autenticato
     *
     * @throws \RuntimeException Se l'utente non è autenticato o non è un'istanza di Model
>>>>>>> c7fd73eb (.)
     */
    protected function getUser(): Authenticatable&Model
    {
        $user = Filament::auth()->user();

<<<<<<< HEAD
        if (null === $user) {
            throw new RuntimeException('Nessun utente autenticato trovato.');
        }

        if (!($user instanceof Model)) {
            throw new RuntimeException(
                'L\'utente autenticato deve essere un modello Eloquent per permettere aggiornamenti.',
            );
=======
        if ($user === null) {
            throw new \RuntimeException('Nessun utente autenticato trovato.');
        }

        if (! $user instanceof Model) {
            throw new \RuntimeException('L\'utente autenticato deve essere un modello Eloquent per permettere aggiornamenti.');
>>>>>>> c7fd73eb (.)
        }

        /* @var Authenticatable&Model $user */
        return $user;
    }

    /**
     * Verifica se l'utente ha l'accesso alla pagina.
     * Utilizza il sistema di autorizzazioni per controllare l'accesso.
     *
     * @throws AuthorizationException Se l'utente non è autorizzato
     */
    protected function authorizeAccess(): void
    {
        $this->authorize('view', static::class);
    }

    /**
     * Verifica se l'utente ha un permesso specifico.
     * Utile per controlli granulari all'interno delle pagine.
     *
<<<<<<< HEAD
     * @param string $permission Il permesso da verificare
     *
=======
     * @param  string  $permission  Il permesso da verificare
>>>>>>> c7fd73eb (.)
     * @return bool True se l'utente ha il permesso, false altrimenti
     */
    protected function hasPermissionTo(string $permission): bool
    {
        $user = $this->getUser();

<<<<<<< HEAD
        //@phpstan-ignore-next-line
        if (!method_exists($user, 'hasPermissionTo')) {
            throw new RuntimeException('Il modello utente deve implementare il metodo hasPermissionTo');
        }

        // Use method_exists to safely call hasPermissionTo
=======
        // ponytail: $user is Authenticatable&Model, hasPermissionTo is always available via Spatie traits
>>>>>>> c7fd73eb (.)
        return $user->hasPermissionTo($permission);
    }

    /**
<<<<<<< HEAD
     * Ottiene la vista associata alla pagina.
     *
     * @return string Il percorso della vista
     */
    public function getView(): string
    {
        if ('' === $this->view) {
            $view = app(GetViewByClassAction::class)->execute(static::class);
            if (view()->exists($view)) {
                return (string) $view;
            }

            // Se non troviamo una vista, lanciamo un'eccezione
            throw new RuntimeException('Nessuna vista trovata per la classe: ' . static::class);
        }

        return $this->view;
    }

    /**
     * Risolve il percorso della vista.
     *
     * @throws RuntimeException Se la vista non esiste
     *
     * @return string Il percorso della vista
=======
     * Risolve il percorso della vista.
     *
     *
     * @return string Il percorso della vista
     *
     * @throws \RuntimeException Se la vista non esiste
>>>>>>> c7fd73eb (.)
     */
    protected function resolveViewPath(): string
    {
        $view = $this->getView();
        if (view()->exists($view)) {
            return $view;
        }

<<<<<<< HEAD
        throw new RuntimeException("View [{$view}] not found for page: " . static::class);
=======
        throw new \RuntimeException("View [{$view}] not found for page: ".static::class);
>>>>>>> c7fd73eb (.)
    }

    /**
     * Ottiene una query builder per il modello associato alla pagina.
     *
<<<<<<< HEAD
     * @throws LogicException Se il modello non è definito
     *
     * @return Builder<Model>
=======
     *
     * @return Builder<Model>
     *
     * @throws \LogicException Se il modello non è definito
>>>>>>> c7fd73eb (.)
     */
    protected function getQuery(): Builder
    {
        $modelClass = $this->getModel();

<<<<<<< HEAD
        if (!class_exists($modelClass)) {
            throw new LogicException("Model class {$modelClass} does not exist");
        }

        /** @var class-string<Model> $modelClass */
        $instance = new $modelClass();
        if (!($instance instanceof Model)) {
            throw new LogicException("Class {$modelClass} must extend Eloquent Model");
        }

        /** @var Builder<Model> $query */
        $query = $modelClass::query();

        return $query;
=======
        if (! class_exists($modelClass)) {
            throw new \LogicException("Model class {$modelClass} does not exist");
        }

        /** @var class-string<Model> $modelClass */
        $instance = new $modelClass;
        if (! $instance instanceof Model) {
            throw new \LogicException("Class {$modelClass} must extend Eloquent Model");
        }

        return $modelClass::query();
>>>>>>> c7fd73eb (.)
    }

    /**
     * Invalida la cache per il modello specificato.
     *
<<<<<<< HEAD
     * @param class-string<Model>|null $modelClass
     */
    protected function invalidateCache(null|string $modelClass = null, int|string|null $id = null): void
=======
     * @param  class-string<Model>|null  $modelClass
     */
    protected function invalidateCache(?string $modelClass = null, int|string|null $id = null): void
>>>>>>> c7fd73eb (.)
    {
        // Implementazione custom se necessaria
        // Per ora lasciamo vuoto, può essere implementato nelle classi figlie
    }

<<<<<<< HEAD
=======
    /** @return list<Action> */
>>>>>>> c7fd73eb (.)
    protected function getFormActions(): array
    {
        return [
            Action::make('save')
<<<<<<< HEAD
                ->label(__('filament-panels::resources/pages/edit-record.form.actions.save.label'))
=======
>>>>>>> c7fd73eb (.)
                ->submit('save'),
        ];
    }
}
