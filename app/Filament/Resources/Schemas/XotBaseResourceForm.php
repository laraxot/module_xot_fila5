<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Resources\Schemas;

use Filament\Schemas\Components\Component;
use Filament\Schemas\Components\Wizard\Step;
use Filament\Schemas\Schema;
<<<<<<< HEAD
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class XotBaseResourceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components(static::getFormSchema())
            ->columns(static::getFormSchemaColumns());
    }

    public static function getFormSchemaColumns(): int
    {
        return 1;
=======
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Modules\Xot\Filament\Resources\XotBaseResource;
use Modules\Xot\Filament\Traits\HasXotForm;
use Webmozart\Assert\Assert;

abstract class XotBaseResourceForm
{
    use HasXotForm;

    public static function configure(Schema $schema): Schema
    {
        if (static::class === self::class) {
            throw new \LogicException('XotBaseResourceForm::configure() must be called on a concrete form class.');
        }

        $instance = app(static::class);
        Assert::isInstanceOf($instance, self::class);

        return $instance->form($schema);
    }

    /**
     * Lo schema del form vive qui: e' l'unico posto in cui il progetto lo dichiara.
     * `XotBaseResource::form()` arriva sempre a questa classe via `getFormClass()`,
     * quindi una Resource che dichiara `getFormSchema()` scrive codice morto.
     *
     * @return array<string, Component>
     */
    abstract public function getFormSchema(): array;

    /**
     * La Resource proprietaria, dedotta dal namespace `{Resource}\Schemas\{Model}Form`.
     *
     * @return class-string<XotBaseResource>
     */
    public static function getResource(): string
    {
        $resource = Str::of(static::class)->before('\\Schemas\\')->toString();
        Assert::classExists($resource);
        Assert::subclassOf($resource, XotBaseResource::class);

        return $resource;
    }

    /**
     * Traduzione con le chiavi della Resource proprietaria: un form non ha
     * un proprio spazio di traduzione, usa quello della Resource.
     *
     * @param  array<string, bool|float|int|string|null>  $params
     */
    public static function trans(string $key, array $params = []): string
    {
        return static::getResource()::trans($key, false, $params);
>>>>>>> laraxot/dev
    }

    /**
     * @return array<string, Component>
     */
<<<<<<< HEAD
    public static function getFormSchema(): array
    {
        return [
        ];
    }

    /**
     * Elenco degli step Wizard per form multi‑passaggio (nome ufficiale allineato a Filament **`HasWizard::getSteps()`**).
     * I form lineari lo lasciano vuoto.
     *
     * @return array<string, Step>
     */
    public static function getSteps(): array
=======
    public function getSteps(): array
>>>>>>> laraxot/dev
    {
        return [];
    }

<<<<<<< HEAD
    /**
     * Costruisce il callback usato da `Select::getOptionLabelUsing()`.
     *
     * Regressione: una colonna titolo nulla o vuota faceva arrivare `null` a
     * `Filament\Forms\Components\Select::isOptionDisabled(string|Htmlable $label)`
     * mandando in TypeError l'intera pagina di edit. Se la colonna titolo e'
     * vuota si ripiega su `#{chiave primaria}`.
     *
     * @return \Closure(Model): string
     */
=======
>>>>>>> laraxot/dev
    protected static function optionLabelFromRecord(string $titleAttribute = 'name'): \Closure
    {
        return static function (Model $record) use ($titleAttribute): string {
            $title = $record->getAttribute($titleAttribute);

            if (\is_string($title) && $title !== '') {
                return $title;
            }

            $key = $record->getKey();

            return '#'.(\is_scalar($key) ? (string) $key : '');
        };
    }

    protected static function getStepByName(string $name): Step
    {
        $methodName = Str::of($name)
            ->snake()
            ->studly()
            ->prepend('get')
            ->append('Schema')
            ->toString();

        if (method_exists(static::class, $methodName)) {
            $schemaResult = static::$methodName();
<<<<<<< HEAD
            /** @var array<Htmlable|string> $schemaComponents */
=======
            /** @var array<int, Component> $schemaComponents */
>>>>>>> laraxot/dev
            $schemaComponents = \is_array($schemaResult) ? array_values($schemaResult) : [];

            return Step::make($name)->schema($schemaComponents);
        }
<<<<<<< HEAD
        dddx($methodName);

        return Step::make($name)->schema([]);
=======

        /** @var array<int, Component> $emptyComponents */
        $emptyComponents = [];

        return Step::make($name)->schema($emptyComponents);
>>>>>>> laraxot/dev
    }
}
