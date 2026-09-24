<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Pages;

use Filament\Actions\Action;
use Filament\Facades\Filament;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Pages\Page;
// use Filament\Resources\Pages\Page;
<<<<<<< HEAD
use Filament\Schemas\Components\Component;
=======
>>>>>>> 3792da0d (Check & fix styling)
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
 *
 * Implementa:
 * - Sistema di traduzioni integrato
 * - Gestione autorizzazioni
 * - Integrazione con form
 * - Rilevamento intelligente modello
 * - Metodi helper comuni
 *
<<<<<<< .merge_file_DerR7y
<<<<<<< HEAD
<<<<<<< HEAD
 * @property ?string $model Il modello associato alla pagina
 * @property array<string, mixed> $data I dati del form
=======
 * @property ?string              $model Il modello associato alla pagina
 * @property array<string, mixed> $data  I dati del form
>>>>>>> laraxot/dev
=======
 * @property ?string              $model Il modello associato alla pagina
 * @property array<string, mixed> $data  I dati del form
>>>>>>> 3792da0d (Check & fix styling)
=======
 * @property ?string $model Il modello associato alla pagina
 * @property array<string, mixed> $data I dati del form
>>>>>>> .merge_file_4SlkTj
 *
 * @see \Modules\Xot\docs\xotbasepage_implementation.md Documentazione completa
 */
abstract class XotBasePage extends Page implements HasForms
{
    use InteractsWithForms;
    use TransTrait;

    /**
     * Modello associato alla pagina.
     * Se non specificato, verrà dedotto automaticamente dal nome della classe.
     *
     * @var class-string<Model>|null
     */
    public static ?string $model = null;

    /**
     * Dati del form.
     * Contiene i dati del form durante la gestione della pagina.
     *
     * @var array<string, mixed>
     */
    public array $data = [];

    /**
     * Vista predefinita per la pagina.
     * Deve essere sovrascritta nelle classi figlie.
     */
    protected string $view = '';

    /**
     * Cache timeout per operazioni di cache (in secondi).
     */
    protected static int $cacheTimeout = 3600;

    /**
     * Ottiene il nome del modulo dalla classe.
     * Estrae il nome del modulo dal namespace della classe.
     *
     * @return string Il nome del modulo (es. '<main module>', 'User', ecc.)
     */
    public static function getModuleName(): string
    {
        $namespace = static::class;
        $moduleName = Str::between($namespace, 'Modules\\', '\\Filament');

<<<<<<< .merge_file_DerR7y
<<<<<<< HEAD
<<<<<<< HEAD
        if ($moduleName === '') {
=======
        if ('' === $moduleName) {
>>>>>>> laraxot/dev
=======
        if ('' === $moduleName) {
>>>>>>> 3792da0d (Check & fix styling)
=======
        if ($moduleName === '') {
>>>>>>> .merge_file_4SlkTj
            throw new \LogicException(sprintf('Cannot extract module name from class %s', static::class));
        }

        return $moduleName;
    }

    /**
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
     * @return \UnitEnum|string|null Il gruppo di navigazione
     */
    public static function getNavigationGroup(): \UnitEnum|string|null
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
<<<<<<< .merge_file_DerR7y
<<<<<<< HEAD
<<<<<<< HEAD
        if (static::$model !== null) {
=======
        if (null !== static::$model) {
>>>>>>> laraxot/dev
=======
        if (null !== static::$model) {
>>>>>>> 3792da0d (Check & fix styling)
=======
        if (static::$model !== null) {
>>>>>>> .merge_file_4SlkTj
            /** @var class-string<Model> $modelValue */
            $modelValue = static::$model;

            return $modelValue;
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

<<<<<<< .merge_file_DerR7y
<<<<<<< HEAD
<<<<<<< HEAD
        if ($modelName === '') {
=======
        if ('' === $modelName) {
>>>>>>> laraxot/dev
=======
        if ('' === $modelName) {
>>>>>>> 3792da0d (Check & fix styling)
=======
        if ($modelName === '') {
>>>>>>> .merge_file_4SlkTj
            throw new \LogicException(sprintf('Cannot determine model name from class %s', static::class));
        }

        $modelNamespace = 'Modules\\'.$moduleName.'\\Models\\'.$modelName;

        // Verifica che la classe del modello esista
        if (! class_exists($modelNamespace) || ! is_subclass_of($modelNamespace, Model::class)) {
            throw new \LogicException("Model class {$modelNamespace} does not exist");
        }

        /* @var class-string<Model> $modelNamespace */
        return $modelNamespace;
    }

    /**
     * Configura il form della pagina.
     * Imposta lo schema e il percorso dello stato per il form.
     *
<<<<<<< .merge_file_DerR7y
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  Schema  $schema  Il form da configurare
=======
     * @param Schema $schema Il form da configurare
     *
>>>>>>> laraxot/dev
=======
     * @param Schema $schema Il form da configurare
     *
>>>>>>> 3792da0d (Check & fix styling)
=======
     * @param  Schema  $schema  Il form da configurare
>>>>>>> .merge_file_4SlkTj
     * @return Schema Lo schema configurato
     */
    public function schema(Schema $schema): Schema
    {
<<<<<<< HEAD
        $schema = $schema->components($this->resolveFormSchemaForXotPage());
=======
        $schema = $schema->components($this->getFormSchema());
>>>>>>> 3792da0d (Check & fix styling)

        $schema->statePath('data');

        $debounce = $this->getAutosaveDebounce();
<<<<<<< .merge_file_DerR7y
<<<<<<< HEAD
<<<<<<< HEAD
        if ($debounce !== null && method_exists($schema, 'autosaveDebounce')) {
=======
        if (null !== $debounce && method_exists($schema, 'autosaveDebounce')) {
>>>>>>> laraxot/dev
=======
        if (null !== $debounce && method_exists($schema, 'autosaveDebounce')) {
>>>>>>> 3792da0d (Check & fix styling)
=======
        if ($debounce !== null && method_exists($schema, 'autosaveDebounce')) {
>>>>>>> .merge_file_4SlkTj
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
<<<<<<< .merge_file_DerR7y
<<<<<<< HEAD
<<<<<<< HEAD
        if ($this->view === '') {
=======
        if ('' === $this->view) {
>>>>>>> laraxot/dev
=======
        if ('' === $this->view) {
>>>>>>> 3792da0d (Check & fix styling)
=======
        if ($this->view === '') {
>>>>>>> .merge_file_4SlkTj
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
<<<<<<< HEAD
     * Resolve concrete page schema without invoking deprecated Filament hook directly.
     *
     * @return array<int|string, Component>
     */
    private function resolveFormSchemaForXotPage(): array
    {
        $method = new \ReflectionMethod($this, 'getFormSchema');
        $declaringClass = $method->getDeclaringClass()->getName();

        if ($declaringClass === self::class || str_starts_with($declaringClass, 'Filament\\')) {
            return [];
        }

        /** @var array<int|string, Component> $schema */
        $schema = $method->invoke($this);

        return $schema;
    }

    /**
=======
>>>>>>> 3792da0d (Check & fix styling)
     * Ottiene il tempo di debounce per l'autosave in millisecondi.
     * Sovrascrivere nelle classi figlie per modificare questo valore.
     *
     * @return int|null Il tempo di debounce in millisecondi o null per disabilitare l'autosave
     */
    protected function getAutosaveDebounce(): ?int
    {
        return null; // Disabilitato per default
    }

    /**
     * Ottiene l'utente autenticato.
     * Verifica che l'utente sia un'istanza di Model per permettere aggiornamenti.
     *
<<<<<<< .merge_file_DerR7y
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> .merge_file_4SlkTj
     *
     * @return Authenticatable&Model L'utente autenticato
     *
     * @throws \RuntimeException Se l'utente non è autenticato o non è un'istanza di Model
<<<<<<< .merge_file_DerR7y
=======
     * @throws \RuntimeException Se l'utente non è autenticato o non è un'istanza di Model
     *
     * @return Authenticatable&Model L'utente autenticato
>>>>>>> laraxot/dev
=======
     * @throws \RuntimeException Se l'utente non è autenticato o non è un'istanza di Model
     *
     * @return Authenticatable&Model L'utente autenticato
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_4SlkTj
     */
    protected function getUser(): Authenticatable&Model
    {
        $user = Filament::auth()->user();

<<<<<<< .merge_file_DerR7y
<<<<<<< HEAD
<<<<<<< HEAD
        if ($user === null) {
=======
        if (null === $user) {
>>>>>>> laraxot/dev
=======
        if (null === $user) {
>>>>>>> 3792da0d (Check & fix styling)
=======
        if ($user === null) {
>>>>>>> .merge_file_4SlkTj
            throw new \RuntimeException('Nessun utente autenticato trovato.');
        }

        if (! $user instanceof Model) {
            throw new \RuntimeException('L\'utente autenticato deve essere un modello Eloquent per permettere aggiornamenti.');
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
<<<<<<< .merge_file_DerR7y
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  string  $permission  Il permesso da verificare
=======
     * @param string $permission Il permesso da verificare
     *
>>>>>>> laraxot/dev
=======
     * @param string $permission Il permesso da verificare
     *
>>>>>>> 3792da0d (Check & fix styling)
=======
     * @param  string  $permission  Il permesso da verificare
>>>>>>> .merge_file_4SlkTj
     * @return bool True se l'utente ha il permesso, false altrimenti
     */
    protected function hasPermissionTo(string $permission): bool
    {
        $user = $this->getUser();

<<<<<<< HEAD
        // ponytail: $user is Authenticatable&Model, hasPermissionTo is always available via Spatie traits
=======
        if (! method_exists($user, 'hasPermissionTo')) {
            throw new \RuntimeException('Il modello utente deve implementare il metodo hasPermissionTo');
        }

        // Use method_exists to safely call hasPermissionTo
>>>>>>> 3792da0d (Check & fix styling)
        return $user->hasPermissionTo($permission);
    }

    /**
     * Risolve il percorso della vista.
     *
<<<<<<< .merge_file_DerR7y
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> .merge_file_4SlkTj
     *
     * @return string Il percorso della vista
     *
     * @throws \RuntimeException Se la vista non esiste
<<<<<<< .merge_file_DerR7y
=======
     * @throws \RuntimeException Se la vista non esiste
     *
     * @return string Il percorso della vista
>>>>>>> laraxot/dev
=======
     * @throws \RuntimeException Se la vista non esiste
     *
     * @return string Il percorso della vista
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_4SlkTj
     */
    protected function resolveViewPath(): string
    {
        $view = $this->getView();
        if (view()->exists($view)) {
            return $view;
        }

        throw new \RuntimeException("View [{$view}] not found for page: ".static::class);
    }

    /**
     * Ottiene una query builder per il modello associato alla pagina.
     *
<<<<<<< .merge_file_DerR7y
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> .merge_file_4SlkTj
     *
     * @return Builder<Model>
     *
     * @throws \LogicException Se il modello non è definito
<<<<<<< .merge_file_DerR7y
=======
     * @throws \LogicException Se il modello non è definito
     *
     * @return Builder<Model>
>>>>>>> laraxot/dev
=======
     * @throws \LogicException Se il modello non è definito
     *
     * @return Builder<Model>
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_4SlkTj
     */
    protected function getQuery(): Builder
    {
        $modelClass = $this->getModel();

        if (! class_exists($modelClass)) {
            throw new \LogicException("Model class {$modelClass} does not exist");
        }

        /** @var class-string<Model> $modelClass */
<<<<<<< .merge_file_DerR7y
<<<<<<< HEAD
<<<<<<< HEAD
        $instance = new $modelClass;
=======
        $instance = new $modelClass();
>>>>>>> laraxot/dev
=======
        $instance = new $modelClass();
>>>>>>> 3792da0d (Check & fix styling)
=======
        $instance = new $modelClass;
>>>>>>> .merge_file_4SlkTj
        if (! $instance instanceof Model) {
            throw new \LogicException("Class {$modelClass} must extend Eloquent Model");
        }

        return $modelClass::query();
    }

    /**
     * Invalida la cache per il modello specificato.
     *
<<<<<<< .merge_file_DerR7y
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  class-string<Model>|null  $modelClass
=======
     * @param class-string<Model>|null $modelClass
>>>>>>> laraxot/dev
=======
     * @param class-string<Model>|null $modelClass
>>>>>>> 3792da0d (Check & fix styling)
=======
     * @param  class-string<Model>|null  $modelClass
>>>>>>> .merge_file_4SlkTj
     */
    protected function invalidateCache(?string $modelClass = null, int|string|null $id = null): void
    {
        // Implementazione custom se necessaria
        // Per ora lasciamo vuoto, può essere implementato nelle classi figlie
    }

    /** @return list<Action> */
    protected function getFormActions(): array
    {
        return [
            Action::make('save')
<<<<<<< .merge_file_DerR7y
<<<<<<< HEAD
<<<<<<< HEAD
=======
                ->label(__('filament-panels::resources/edit-record.form.actions.save.label'))
>>>>>>> laraxot/dev
=======
                ->label(__('filament-panels::resources/edit-record.form.actions.save.label'))
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_4SlkTj
                ->submit('save'),
        ];
    }
}
