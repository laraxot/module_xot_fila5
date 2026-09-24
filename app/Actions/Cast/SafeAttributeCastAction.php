<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Cast;

use Illuminate\Database\Eloquent\Model;
use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;

/**
 * Action per gestire in modo sicuro l'accesso agli attributi dei modelli Eloquent.
 *
 * Questa action centralizza la logica di accesso sicuro agli attributi per evitare:
 * - Uso di property_exists() con modelli Eloquent (anti-pattern)
 * - Errori di tipo con getAttribute() che restituisce mixed
 * - Duplicazione di logica di verifica attributi
 *
 * Principi applicati:
 * - DRY: Evita duplicazione di logica di accesso attributi
 * - KISS: Metodi semplici e diretti
 * - Robustezza: Gestisce tutti i casi edge e mantiene type safety
 * - Laravel Way: Rispetta l'architettura Eloquent
 * - Assert: Utilizza webmozart/assert per validazioni robuste
 */
class SafeAttributeCastAction
{
    use QueueableAction;

    /**
     * Verifica se un attributo esiste e ha un valore non null su un modello.
     *
<<<<<<< .merge_file_xtA8px
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  Model  $model  Il modello Eloquent
     * @param  string  $attribute  Il nome dell'attributo
=======
     * @param Model  $model     Il modello Eloquent
     * @param string $attribute Il nome dell'attributo
     *
>>>>>>> laraxot/dev
=======
     * @param Model  $model     Il modello Eloquent
     * @param string $attribute Il nome dell'attributo
     *
>>>>>>> 3792da0d (Check & fix styling)
=======
     * @param  Model  $model  Il modello Eloquent
     * @param  string  $attribute  Il nome dell'attributo
>>>>>>> .merge_file_u2YBH2
     * @return bool True se l'attributo esiste e ha un valore non null
     */
    public function hasAttribute(Model $model, string $attribute): bool
    {
        Assert::stringNotEmpty($attribute);

<<<<<<< .merge_file_xtA8px
<<<<<<< HEAD
<<<<<<< HEAD
        return $model->getAttribute($attribute) !== null;
=======
        return null !== $model->getAttribute($attribute);
>>>>>>> laraxot/dev
=======
        return null !== $model->getAttribute($attribute);
>>>>>>> 3792da0d (Check & fix styling)
=======
        return $model->getAttribute($attribute) !== null;
>>>>>>> .merge_file_u2YBH2
    }

    /**
     * Verifica se un attributo esiste e ha un valore non vuoto su un modello.
     *
<<<<<<< .merge_file_xtA8px
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  Model  $model  Il modello Eloquent
     * @param  string  $attribute  Il nome dell'attributo
=======
     * @param Model  $model     Il modello Eloquent
     * @param string $attribute Il nome dell'attributo
     *
>>>>>>> laraxot/dev
=======
     * @param Model  $model     Il modello Eloquent
     * @param string $attribute Il nome dell'attributo
     *
>>>>>>> 3792da0d (Check & fix styling)
=======
     * @param  Model  $model  Il modello Eloquent
     * @param  string  $attribute  Il nome dell'attributo
>>>>>>> .merge_file_u2YBH2
     * @return bool True se l'attributo esiste e ha un valore non vuoto
     */
    public function hasNonEmptyAttribute(Model $model, string $attribute): bool
    {
        Assert::stringNotEmpty($attribute);

        $value = $model->getAttribute($attribute);

<<<<<<< .merge_file_xtA8px
<<<<<<< HEAD
<<<<<<< HEAD
        return $value !== null && $value !== '';
=======
        return null !== $value && '' !== $value;
>>>>>>> laraxot/dev
=======
        return null !== $value && '' !== $value;
>>>>>>> 3792da0d (Check & fix styling)
=======
        return $value !== null && $value !== '';
>>>>>>> .merge_file_u2YBH2
    }

    /**
     * Ottiene un attributo con cast sicuro a string.
     *
<<<<<<< .merge_file_xtA8px
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  Model  $model  Il modello Eloquent
     * @param  string  $attribute  Il nome dell'attributo
     * @param  string|null  $default  Valore di default se l'attributo non esiste o è null
=======
=======
>>>>>>> 3792da0d (Check & fix styling)
     * @param Model       $model     Il modello Eloquent
     * @param string      $attribute Il nome dell'attributo
     * @param string|null $default   Valore di default se l'attributo non esiste o è null
     *
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
     * @param  Model  $model  Il modello Eloquent
     * @param  string  $attribute  Il nome dell'attributo
     * @param  string|null  $default  Valore di default se l'attributo non esiste o è null
>>>>>>> .merge_file_u2YBH2
     * @return string Il valore dell'attributo convertito in string
     */
    public function getStringAttribute(Model $model, string $attribute, ?string $default = ''): string
    {
        Assert::stringNotEmpty($attribute);

        $value = $model->getAttribute($attribute);

<<<<<<< .merge_file_xtA8px
<<<<<<< HEAD
<<<<<<< HEAD
        if ($value === null) {
=======
        if (null === $value) {
>>>>>>> laraxot/dev
=======
        if (null === $value) {
>>>>>>> 3792da0d (Check & fix styling)
=======
        if ($value === null) {
>>>>>>> .merge_file_u2YBH2
            return $default ?? '';
        }

        return SafeStringCastAction::cast($value);
    }

    /**
     * Ottiene un attributo con cast sicuro a int.
     *
<<<<<<< .merge_file_xtA8px
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  Model  $model  Il modello Eloquent
     * @param  string  $attribute  Il nome dell'attributo
     * @param  int|null  $default  Valore di default se l'attributo non esiste o è null
=======
=======
>>>>>>> 3792da0d (Check & fix styling)
     * @param Model    $model     Il modello Eloquent
     * @param string   $attribute Il nome dell'attributo
     * @param int|null $default   Valore di default se l'attributo non esiste o è null
     *
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
     * @param  Model  $model  Il modello Eloquent
     * @param  string  $attribute  Il nome dell'attributo
     * @param  int|null  $default  Valore di default se l'attributo non esiste o è null
>>>>>>> .merge_file_u2YBH2
     * @return int Il valore dell'attributo convertito in int
     */
    public function getIntAttribute(Model $model, string $attribute, ?int $default = 0): int
    {
        Assert::stringNotEmpty($attribute);

        $value = $model->getAttribute($attribute);

<<<<<<< .merge_file_xtA8px
<<<<<<< HEAD
<<<<<<< HEAD
        if ($value === null) {
=======
        if (null === $value) {
>>>>>>> laraxot/dev
=======
        if (null === $value) {
>>>>>>> 3792da0d (Check & fix styling)
=======
        if ($value === null) {
>>>>>>> .merge_file_u2YBH2
            return $default ?? 0;
        }

        return app(SafeIntCastAction::class)->execute($value, $default);
    }

    /**
     * Ottiene un attributo con cast sicuro a float.
     *
<<<<<<< .merge_file_xtA8px
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  Model  $model  Il modello Eloquent
     * @param  string  $attribute  Il nome dell'attributo
     * @param  float|null  $default  Valore di default se l'attributo non esiste o è null
=======
=======
>>>>>>> 3792da0d (Check & fix styling)
     * @param Model      $model     Il modello Eloquent
     * @param string     $attribute Il nome dell'attributo
     * @param float|null $default   Valore di default se l'attributo non esiste o è null
     *
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
     * @param  Model  $model  Il modello Eloquent
     * @param  string  $attribute  Il nome dell'attributo
     * @param  float|null  $default  Valore di default se l'attributo non esiste o è null
>>>>>>> .merge_file_u2YBH2
     * @return float Il valore dell'attributo convertito in float
     */
    public function getFloatAttribute(Model $model, string $attribute, ?float $default = 0.0): float
    {
        Assert::stringNotEmpty($attribute);

        $value = $model->getAttribute($attribute);

<<<<<<< .merge_file_xtA8px
<<<<<<< HEAD
<<<<<<< HEAD
        if ($value === null) {
=======
        if (null === $value) {
>>>>>>> laraxot/dev
=======
        if (null === $value) {
>>>>>>> 3792da0d (Check & fix styling)
=======
        if ($value === null) {
>>>>>>> .merge_file_u2YBH2
            return $default ?? 0.0;
        }

        return app(SafeFloatCastAction::class)->execute($value, $default);
    }

    /**
     * Ottiene un attributo con cast sicuro a boolean.
     *
<<<<<<< .merge_file_xtA8px
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  Model  $model  Il modello Eloquent
     * @param  string  $attribute  Il nome dell'attributo
     * @param  bool|null  $default  Valore di default se l'attributo non esiste o è null
=======
=======
>>>>>>> 3792da0d (Check & fix styling)
     * @param Model     $model     Il modello Eloquent
     * @param string    $attribute Il nome dell'attributo
     * @param bool|null $default   Valore di default se l'attributo non esiste o è null
     *
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
     * @param  Model  $model  Il modello Eloquent
     * @param  string  $attribute  Il nome dell'attributo
     * @param  bool|null  $default  Valore di default se l'attributo non esiste o è null
>>>>>>> .merge_file_u2YBH2
     * @return bool Il valore dell'attributo convertito in boolean
     */
    public function getBooleanAttribute(Model $model, string $attribute, ?bool $default = false): bool
    {
        Assert::stringNotEmpty($attribute);

        $value = $model->getAttribute($attribute);

<<<<<<< .merge_file_xtA8px
<<<<<<< HEAD
<<<<<<< HEAD
        if ($value === null) {
=======
        if (null === $value) {
>>>>>>> laraxot/dev
=======
        if (null === $value) {
>>>>>>> 3792da0d (Check & fix styling)
=======
        if ($value === null) {
>>>>>>> .merge_file_u2YBH2
            return $default ?? false;
        }

        return app(SafeBooleanCastAction::class)->execute($value, $default);
    }

    /**
     * Ottiene un attributo con cast sicuro a array.
     *
<<<<<<< .merge_file_xtA8px
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  Model  $model  Il modello Eloquent
     * @param  string  $attribute  Il nome dell'attributo
     * @param  array<int|string, mixed>|null  $default  Valore di default se l'attributo non esiste o è null
=======
=======
>>>>>>> 3792da0d (Check & fix styling)
     * @param Model                         $model     Il modello Eloquent
     * @param string                        $attribute Il nome dell'attributo
     * @param array<int|string, mixed>|null $default   Valore di default se l'attributo non esiste o è null
     *
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
     * @param  Model  $model  Il modello Eloquent
     * @param  string  $attribute  Il nome dell'attributo
     * @param  array<int|string, mixed>|null  $default  Valore di default se l'attributo non esiste o è null
>>>>>>> .merge_file_u2YBH2
     * @return array<int|string, mixed> Il valore dell'attributo convertito in array
     */
    public function getArrayAttribute(Model $model, string $attribute, ?array $default = []): array
    {
        Assert::stringNotEmpty($attribute);

        $value = $model->getAttribute($attribute);

<<<<<<< .merge_file_xtA8px
<<<<<<< HEAD
<<<<<<< HEAD
        if ($value === null) {
=======
        if (null === $value) {
>>>>>>> laraxot/dev
=======
        if (null === $value) {
>>>>>>> 3792da0d (Check & fix styling)
=======
        if ($value === null) {
>>>>>>> .merge_file_u2YBH2
            return app(SafeArrayCastAction::class)->execute([], $default);
        }

        return app(SafeArrayCastAction::class)->execute($value, $default);
    }

    /**
     * Ottiene un attributo con cast sicuro a un tipo specifico.
     *
<<<<<<< .merge_file_xtA8px
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> .merge_file_u2YBH2
     * @param  Model  $model  Il modello Eloquent
     * @param  string  $attribute  Il nome dell'attributo
     * @param  string  $type  Il tipo di cast desiderato (string, int, float, bool, array)
     * @param  mixed  $default  Valore di default se l'attributo non esiste o è null
<<<<<<< .merge_file_xtA8px
=======
=======
>>>>>>> 3792da0d (Check & fix styling)
     * @param Model  $model     Il modello Eloquent
     * @param string $attribute Il nome dell'attributo
     * @param string $type      Il tipo di cast desiderato (string, int, float, bool, array)
     * @param mixed  $default   Valore di default se l'attributo non esiste o è null
     *
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_u2YBH2
     * @return mixed Il valore dell'attributo convertito nel tipo specificato
     */
    public function getTypedAttribute(Model $model, string $attribute, string $type, mixed $default = null): mixed
    {
        Assert::stringNotEmpty($attribute);
        Assert::inArray($type, ['string', 'int', 'float', 'bool', 'array']);

        return match ($type) {
            'string' => $this->getStringAttribute($model, $attribute, is_string($default) ? $default : null),
            'int' => $this->getIntAttribute($model, $attribute, is_int($default) ? $default : null),
            'float' => $this->getFloatAttribute($model, $attribute, is_float($default) ? $default : null),
            'bool' => $this->getBooleanAttribute($model, $attribute, is_bool($default) ? $default : null),
            'array' => $this->getArrayAttribute(
                $model,
                $attribute,
                is_array($default) ? app(SafeArrayCastAction::class)->execute($default) : null,
            ),
            default => throw new \InvalidArgumentException("Tipo non supportato: {$type}"),
        };
    }

    /**
     * Verifica se un attributo esiste e ha un valore specifico.
     *
<<<<<<< .merge_file_xtA8px
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  Model  $model  Il modello Eloquent
     * @param  string  $attribute  Il nome dell'attributo
     * @param  mixed  $expectedValue  Il valore atteso
=======
=======
>>>>>>> 3792da0d (Check & fix styling)
     * @param Model  $model         Il modello Eloquent
     * @param string $attribute     Il nome dell'attributo
     * @param mixed  $expectedValue Il valore atteso
     *
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
     * @param  Model  $model  Il modello Eloquent
     * @param  string  $attribute  Il nome dell'attributo
     * @param  mixed  $expectedValue  Il valore atteso
>>>>>>> .merge_file_u2YBH2
     * @return bool True se l'attributo esiste e ha il valore atteso
     */
    public function hasAttributeValue(Model $model, string $attribute, mixed $expectedValue): bool
    {
        Assert::stringNotEmpty($attribute);

        $actualValue = $model->getAttribute($attribute);

        return $actualValue === $expectedValue;
    }

    /**
     * Ottiene un attributo con validazione di tipo e valore.
     *
<<<<<<< .merge_file_xtA8px
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> .merge_file_u2YBH2
     * @param  Model  $model  Il modello Eloquent
     * @param  string  $attribute  Il nome dell'attributo
     * @param  string  $type  Il tipo di cast desiderato
     * @param  callable|null  $validator  Funzione di validazione opzionale
     * @param  mixed  $default  Valore di default se la validazione fallisce
<<<<<<< .merge_file_xtA8px
=======
=======
>>>>>>> 3792da0d (Check & fix styling)
     * @param Model         $model     Il modello Eloquent
     * @param string        $attribute Il nome dell'attributo
     * @param string        $type      Il tipo di cast desiderato
     * @param callable|null $validator Funzione di validazione opzionale
     * @param mixed         $default   Valore di default se la validazione fallisce
     *
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_u2YBH2
     * @return mixed Il valore dell'attributo validato e convertito
     */
    public function getValidatedAttribute(
        Model $model,
        string $attribute,
        string $type,
        ?callable $validator = null,
        mixed $default = null,
    ): mixed {
        Assert::stringNotEmpty($attribute);
        Assert::inArray($type, ['string', 'int', 'float', 'bool', 'array']);

        $value = $this->getTypedAttribute($model, $attribute, $type, $default);

<<<<<<< .merge_file_xtA8px
<<<<<<< HEAD
<<<<<<< HEAD
        if ($validator !== null && ! $validator($value)) {
=======
        if (null !== $validator && ! $validator($value)) {
>>>>>>> laraxot/dev
=======
        if (null !== $validator && ! $validator($value)) {
>>>>>>> 3792da0d (Check & fix styling)
=======
        if ($validator !== null && ! $validator($value)) {
>>>>>>> .merge_file_u2YBH2
            return $default;
        }

        return $value;
    }

    /**
     * Metodo statico per utilizzare hasNonEmptyAttribute.
     */
    public static function hasNonEmpty(Model $model, string $attribute): bool
    {
        return app(self::class)->hasNonEmptyAttribute($model, $attribute);
    }

    /**
     * Metodo statico per utilizzare getStringAttribute.
     */
    public static function getString(Model $model, string $attribute, ?string $default = ''): string
    {
        return app(self::class)->getStringAttribute($model, $attribute, $default);
    }
}
