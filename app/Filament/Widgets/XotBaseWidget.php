<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Widgets;

<<<<<<< HEAD
use Exception;
=======
>>>>>>> c7fd73eb (.)
use Filament\Actions\Action;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Actions\Contracts\HasActions;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
<<<<<<< HEAD
use Filament\Schemas\Components\Component;
use Filament\Schemas\Components\Wizard\Step;
use Filament\Schemas\Schema;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Filament\Widgets\Widget as FilamentWidget;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
=======
use Filament\Schemas\Components\Wizard\Step;
use Filament\Schemas\Schema;
use Filament\Widgets\Widget as FilamentWidget;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Modules\Xot\Actions\Cast\SafeStringCastAction;
use Modules\Xot\Actions\View\GetViewByClassAction;
>>>>>>> c7fd73eb (.)
use Modules\Xot\Filament\Traits\TransTrait;
use Webmozart\Assert\Assert;

/**
 * Classe base astratta per tutti i widget Filament.
 * Fornisce funzionalità comuni e standardizzate per la gestione dei widget.
 *
 * @property bool $shouldRender Indica se il widget deve essere renderizzato
 * @property string $title Titolo del widget
 * @property string $icon Icona del widget
 * @property array<string, mixed>|null $data Dati del form
 * @property Schema $form
 */
abstract class XotBaseWidget extends FilamentWidget implements HasActions, HasForms
{
    use InteractsWithActions;
<<<<<<< HEAD

    // use InteractsWithPageFilters; // Rimosso per evitare conflitto con InteractsWithForms in Filament v4
    // use InteractsWithPageTable;
    use InteractsWithForms;
    use TransTrait;

=======
    use InteractsWithForms;
    use TransTrait;

    public string $title = '';

    public string $icon = '';

    /**
     * Lista degli eventi ascoltati dal widget.
     *
     * @var array<string, string>
     */
    public array $listener = [];

>>>>>>> c7fd73eb (.)
    /**
     * Vista predefinita per widget che estendono XotBaseWidget.
     * Deve essere sovrascritta nelle classi figlie.
     */
    protected string $view = 'xot::filament.widgets.base';

<<<<<<< HEAD
    public string $title = '';

    public string $icon = '';

    protected int|string|array $columnSpan = 'full';

    /**
     * Lista degli eventi ascoltati dal widget.
     *
     * @var array<string, string>
     */
    public array $listener = [
        // 'filters-updated' => 'filtersUpdated', // Rimosso per compatibilità Filament v4
    ];

    /**
     * Dati del form.
     *
     * @var array<string, mixed>
     */
    public ?array $data = [];

    /*
     * public function __construct()
     * {
     * //parent::__construct();//Cannot call constructor
     * $view = app(GetViewByClassAction::class)->execute(static::class);
     * if(view()->exists($view)){
     * $this->view = $view;
     * }
     * }
     */
    /*
     * public function mount(): void
     * {
     * $this->form->fill();
     * }
     */
    /**
     * Ottiene lo schema del form.
     * Deve essere implementato nelle classi figlie.
     *
     * @return array<int|string, Component>
     */
    abstract public function getFormSchema(): array;
=======
    protected int|string|array $columnSpan = 'full';

    public function __construct()
    {
        $this->resolveView();
    }

    /**
     * Schema del form del widget. Vuoto di default per i widget senza form
     * (es. widget di sola visualizzazione); i widget con form lo sovrascrivono.
     *
     * @return array<Htmlable|string>
     */
    public function getFormSchema(): array
    {
        return [];
    }
>>>>>>> c7fd73eb (.)

    /**
     * Configura il form del widget.
     *
     * @param  Schema  $schema  Il form da configurare
     * @return Schema Il form configurato
     */
    public function form(Schema $schema): Schema
    {
        $schema = $schema->components($this->getFormSchema());
        $schema->statePath('data');
<<<<<<< HEAD
        $data = $this->getFormFill();
=======
>>>>>>> c7fd73eb (.)

        $model = $this->getFormModel();
        if ($model !== null) {
            // Ensure model is compatible with Schema::model()
<<<<<<< HEAD
            if (is_string($model)) {
                if (class_exists($model) && is_subclass_of($model, Model::class)) {
                    /** @var class-string<Model> $model */
=======
            if (\is_string($model)) {
                if (class_exists($model) && is_subclass_of($model, Model::class)) {
                    /* @var class-string<Model> $model */
>>>>>>> c7fd73eb (.)
                    $schema->model($model);
                }
            } else {
                // $model is an instance of Model
                $schema->model($model);
            }
        }
<<<<<<< HEAD
        if (! empty($data)) {
            // $form->fill($data);
            // $this->data=$data;
        }
=======
>>>>>>> c7fd73eb (.)

        return $schema;
    }

<<<<<<< HEAD
=======
    /** @return array<string, mixed> */
>>>>>>> c7fd73eb (.)
    public function getFormFill(): array
    {
        $model = $this->getFormModel();
        if ($model === null) {
            return [];
        }
<<<<<<< HEAD
        if (is_string($model)) {
=======
        if (\is_string($model)) {
>>>>>>> c7fd73eb (.)
            Assert::isInstanceOf($model = app($model), Model::class);
        }

        // Se il modello ha un ID, significa che è stato trovato nel database
        if ($model->exists) {
            try {
<<<<<<< HEAD
                // dddx($model->getArrayableRelations());
=======
>>>>>>> c7fd73eb (.)
                $res = $model->toArray();

                if (method_exists($model, 'getDataDefaults')) {
                    /** @var array<string, mixed> $defaults */
                    $defaults = $model->getDataDefaults();
                    $merge1 = array_merge($defaults, $res);
<<<<<<< HEAD
                    $merge1 = Arr::map($merge1, function ($value, string|int $key) use ($defaults) {
=======
                    $merge1 = Arr::map($merge1, static function (mixed $value, string|int $key) use ($defaults) {
>>>>>>> c7fd73eb (.)
                        if ($value === null) {
                            $value = Arr::get($defaults, $key, null);
                        }

                        return $value;
                    });
<<<<<<< HEAD
                    $res = $merge1;
                }

                return $res;

                // dddx($model->with('studio')->relationsToArray());
            } catch (Exception $e) {
                // Se toArray() fallisce (problemi con enum), usa getAttributes()
                // Log::warning("Errore in toArray() per modello {$this->model}: " . $e->getMessage());
                $attributes = $model->getAttributes();

                // Gestisci specificamente gli enum se presenti
                // if (isset($attributes['type']) && $model->type instanceof \BackedEnum) {
                //    $attributes['type'] = $model->type->value;
                // }

                return $attributes;
=======
                    $res = [];
                    foreach ($merge1 as $key => $value) {
                        $res[(string) $key] = $value;
                    }
                }

                return self::normalizeFormFill($res);
            } catch (\Exception $e) {
                // Se toArray() fallisce (problemi con enum), usa getAttributes()
                return self::normalizeFormFill($model->getAttributes());
>>>>>>> c7fd73eb (.)
            }
        }

        // Se è un nuovo modello, restituisci solo i campi fillable con valori null
        $fillable = $model->getFillable();
        $appends = $model->getAppends();
        $attributes = $model->attributesToArray();

        $fields = array_merge($fillable, $appends);
<<<<<<< HEAD
        $fields = array_fill_keys($fields, null);
=======
        $fields = array_fill_keys(array_map(static fn (mixed $f): string => SafeStringCastAction::cast($f), $fields), null);
>>>>>>> c7fd73eb (.)
        $fields = array_merge($fields, $attributes);
        if (method_exists($model, 'getDataDefaults')) {
            /** @var array<string, mixed> $defaults */
            $defaults = $model->getDataDefaults();
            $fields = array_merge($fields, $defaults);
        }

<<<<<<< HEAD
        return $fields;
=======
        return self::normalizeFormFill($fields);
    }

    /**
     * Salva i dati del form.
     * Override nelle classi figlie se necessario.
     */
    public function save(): void
    {
        // Implementare nelle classi figlie
    }

    public static function getNavigationLabel(): string
    {
        return static::transFunc(__FUNCTION__);
    }

    public function getWizardSubmitAction(): Action
    {
        /** @var view-string $submit_view */
        $submit_view = 'pub_theme::filament.wizard.submit-button';

        if (! view()->exists($submit_view)) {
            throw new \Exception("View {$submit_view} does not exist");
        }

        return Action::make('submit')
            ->submit('save')
            ->view((string) $submit_view);
>>>>>>> c7fd73eb (.)
    }

    /**
     * Ottiene le azioni del form.
     *
     * @return array<int|string, Action>
     */
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

    /**
     * Ottiene il modello per il form.
     * Può essere sovrascritto nelle classi figlie per fornire un modello specifico.
     */
    protected function getFormModel(): Model|string|null
    {
        return null;
    }

<<<<<<< HEAD
    /**
     * Salva i dati del form.
     * Override nelle classi figlie se necessario.
     */
    public function save(): void
    {
        // Implementare nelle classi figlie
    }

    /**
     * Eseguito quando i filtri vengono aggiornati.
     * Rimosso per compatibilità Filament v4 - da reimplementare se necessario
     */
    // public function filtersUpdated(): void
    // {
    //     $this->reset('data');
    // }

    public static function getNavigationLabel(): string
    {
        /*
         * return (string) (static::$navigationLabel ?? (string) str(static::getLabel())
         * ->headline());
         */
        return static::transFunc(__FUNCTION__);
    }

    protected function getStepByName(string $name): Step
    {
        $form = Str::of($name)
=======
    protected function getStepByName(string $name): Step
    {
        $schema = Str::of($name)
>>>>>>> c7fd73eb (.)
            ->snake()
            ->studly()
            ->prepend('get')
            ->append('Schema')
            ->toString();

<<<<<<< HEAD
        /** @var array<Htmlable|string> $formComponents */
        $formComponents = $this->$form();

        return Step::make($name)->schema($formComponents);
    }

    public function getWizardSubmitAction(): Action
    {
        /** @var view-string $submit_view */
        $submit_view = 'pub_theme::filament.wizard.submit-button';

        if (! view()->exists($submit_view)) {
            throw new Exception("View {$submit_view} does not exist");
        }

        return Action::make('submit')
            ->label(__('filament-panels::resources/pages/edit-record.form.actions.save.label'))
            ->submit('save')
            ->view((string) $submit_view);
=======
        /** @var array<Htmlable|string> $schemaComponents */
        $schemaComponents = $this->$schema();

        return Step::make($name)->schema($schemaComponents);
    }

    private function resolveView(): void
    {
        $defaultView = 'xot::filament.widgets.base';

        if ($this->view !== $defaultView && view()->exists($this->view)) {
            return;
        }

        try {
            $view = app(GetViewByClassAction::class)->execute(static::class);
            if (view()->exists($view)) {
                $this->view = $view;
            }
        } catch (\Exception $e) {
            if (! view()->exists($this->view)) {
                throw $e;
            }
        }
    }

    /**
     * @param  array<int|string, mixed>  $data
     * @return array<string, mixed>
     */
    protected static function normalizeFormFill(array $data): array
    {
        $normalized = [];
        foreach ($data as $key => $value) {
            $normalized[(string) $key] = $value;
        }

        return $normalized;
>>>>>>> c7fd73eb (.)
    }
}
