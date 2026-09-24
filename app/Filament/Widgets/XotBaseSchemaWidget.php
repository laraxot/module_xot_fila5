<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Widgets;

use Filament\Schemas\Components\Component;
use Filament\Schemas\Concerns\InteractsWithSchemas;
use Filament\Schemas\Contracts\HasSchemas;
use Filament\Schemas\Schema;
use Illuminate\Database\Eloquent\Model;
use Modules\Xot\Actions\Cast\SafeStringCastAction;
use Webmozart\Assert\Assert;

/**
 * Widget con form Filament Schemas (v5).
 *
 * Estende {@see XotBaseWidget}. Delega campi a una `*Form` class tramite:
 *  - `formClass(): string`   → FQCN della *Form class (default vuoto = legacy)
 *  - `schemaMethod(): string` → metodo invocato sulla *Form (default `getFormSchema`)
 *
 * Esempio:
 * ```php
 * class LoginWidget extends XotBaseSchemaWidget {
 *     protected static function formClass(): string  { return Schemas\UserForm::class; }
 *     protected static function schemaMethod(): string { return 'getLoginFormSchema'; }
 * }
 * ```
 *
 * Religione: `Schema != Widget`. Il widget orchestra (mount/submit/redirect);
 * validazione campi solo nello schema — submit usa `$this->form->getState()` (mai `validateForm()`).
 * La *Form class è lo spartito (campi + regole + dehydrate). MAI duplicare TextInput nel widget.
 *
<<<<<<< .merge_file_HzWe3T
 * @property Schema $form
=======
<<<<<<< HEAD
 * @property Schema $form
=======
 * @property Schema                    $form
>>>>>>> laraxot/dev
>>>>>>> .merge_file_n0SvYH
 * @property array<string, mixed>|null $data
 */
abstract class XotBaseSchemaWidget extends XotBaseWidget implements HasSchemas
{
    use InteractsWithSchemas;

    /**
     * @var array<string, mixed>|null
     */
    public ?array $data = [];

    /**
     * FQCN *Form (opzionale). Se presente, `form()` delega a `FormClass::{schemaMethod()}`.
     *
     * @return class-string|null
     */
    protected static function formClass(): ?string
    {
        return null;
    }

    /**
     * Metodo schema invocato sulla `formClass()`. Default: `getFormSchema()`.
     * Override per condividere una Form class tra widget che espongono
     * sotto-schema diversi (es. LoginWidget + RegisterWidget che condividono
     * `Schemas\UserForm` ma chiamano `getLoginFormSchema` vs `getRegisterFormSchema`).
     */
    protected static function schemaMethod(): string
    {
        return 'getFormSchema';
    }

    /**
     * Schema form (override nelle sottoclassi). Usato se `formClass()` è vuoto.
     *
     * @return array<int|string, Component>
     */
    public function getFormSchema(): array
    {
        return [];
    }

    public function form(Schema $schema): Schema
    {
        $formClass = static::formClass();

<<<<<<< .merge_file_HzWe3T
        if ($formClass !== null) {
=======
<<<<<<< HEAD
        if ($formClass !== null) {
=======
        if (null !== $formClass) {
>>>>>>> laraxot/dev
>>>>>>> .merge_file_n0SvYH
            $method = static::schemaMethod();

            if (! method_exists($formClass, $method)) {
                throw new \LogicException(sprintf('formClass()=%s must expose method %s() (widget %s).', $formClass, $method, static::class));
            }

            /** @var array<int|string, Component> $components */
            $components = $formClass::$method();

            return $schema->components($components)->statePath('data');
        }

        return $schema->components($this->getFormSchema())->statePath('data');
    }

    /**
<<<<<<< .merge_file_HzWe3T
     * @param  class-string  $formClass  Es. UserForm::class
     * @param  string  $method  Es. getRegisterFormSchema
=======
<<<<<<< HEAD
     * @param  class-string  $formClass  Es. UserForm::class
     * @param  string  $method  Es. getRegisterFormSchema
=======
     * @param class-string $formClass Es. UserForm::class
     * @param string       $method    Es. getRegisterFormSchema
     *
>>>>>>> laraxot/dev
>>>>>>> .merge_file_n0SvYH
     * @return array<int|string, Component>
     */
    protected static function resourceFormSchema(string $formClass, string $method): array
    {
        if (! method_exists($formClass, $method)) {
            throw new \InvalidArgumentException(sprintf('Resource form schema method %s::%s() does not exist.', $formClass, $method));
        }

        /** @var callable(): array<int|string, Component> $callable */
        $callable = [$formClass, $method];

        return $callable();
    }

    /**
     * @return array<string, mixed>
     */
    public function getFormFill(): array
    {
        $model = $this->getFormModel();
<<<<<<< .merge_file_HzWe3T
        if ($model === null) {
=======
<<<<<<< HEAD
        if ($model === null) {
=======
        if (null === $model) {
>>>>>>> laraxot/dev
>>>>>>> .merge_file_n0SvYH
            return [];
        }
        if (\is_string($model)) {
            Assert::isInstanceOf($model = app($model), Model::class);
        }

        if ($model->exists) {
            try {
                /** @var array<string, mixed> $res */
                $res = $model->toArray();

                if (method_exists($model, 'getDataDefaults')) {
                    /** @var array<string, mixed> $defaults */
                    $defaults = $model->getDataDefaults();
                    $res = array_merge($defaults, $res);
                }

                return self::normalizeFormFill($res);
            } catch (\Exception) {
                return self::normalizeFormFill($model->getAttributes());
            }
        }

        $fillable = $model->getFillable();
        $appends = $model->getAppends();
        $attributes = $model->attributesToArray();
        $keys = array_values(array_map(static fn (mixed $f): string => SafeStringCastAction::cast($f), array_merge($fillable, $appends)));
        /** @var array<string, mixed> $fields */
        $fields = array_fill_keys($keys, null);

        return array_merge($fields, $attributes);
    }

    public function mount(): void
    {
        $this->form->fill([]);
    }

<<<<<<< .merge_file_HzWe3T
    public function save(): void {}
=======
<<<<<<< HEAD
    public function save(): void {}
=======
    public function save(): void
    {
    }
>>>>>>> laraxot/dev
>>>>>>> .merge_file_n0SvYH

    protected function getFormModel(): Model|string|null
    {
        return null;
    }
}
