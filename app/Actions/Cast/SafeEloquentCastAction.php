<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Cast;

use Illuminate\Database\Eloquent\Model;
use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;

/**
 * Action per gestire in modo sicuro i cast degli attributi Eloquent.
 *
 * Questa action sostituisce completamente l'uso di property_exists() con modelli Eloquent
 * fornendo metodi robusti e type-safe per l'accesso agli attributi.
 *
 * Principi applicati:
 * - DRY: Evita duplicazione di logica di cast attributi
 * - KISS: Metodi semplici e diretti
 * - Robustezza: Gestisce tutti i casi edge e mantiene type safety
 * - Laravel Way: Rispetta l'architettura Eloquent
 * - Assert: Utilizza webmozart/assert per validazioni robuste
 * - NO property_exists: Mai utilizzare property_exists con modelli Eloquent
 */
class SafeEloquentCastAction
{
    use QueueableAction;

    /**
     * Verifica se un attributo esiste su un modello Eloquent.
     *
<<<<<<< HEAD
     * @param  Model  $model  Il modello Eloquent
     * @param  string  $attribute  Il nome dell'attributo
=======
     * @param Model  $model     Il modello Eloquent
     * @param string $attribute Il nome dell'attributo
     *
>>>>>>> 7f6cf6be (.)
     * @return bool True se l'attributo esiste
     */
    public function hasAttribute(Model $model, string $attribute): bool
    {
        Assert::stringNotEmpty($attribute);

        // Usa getAttribute invece di property_exists per evitare falsi positivi
<<<<<<< HEAD
        return $model->getAttribute($attribute) !== null;
=======
        return null !== $model->getAttribute($attribute);
>>>>>>> 7f6cf6be (.)
    }

    /**
     * Verifica se un attributo esiste e ha un valore non vuoto.
     *
<<<<<<< HEAD
     * @param  Model  $model  Il modello Eloquent
     * @param  string  $attribute  Il nome dell'attributo
=======
     * @param Model  $model     Il modello Eloquent
     * @param string $attribute Il nome dell'attributo
     *
>>>>>>> 7f6cf6be (.)
     * @return bool True se l'attributo esiste e ha un valore non vuoto
     */
    public function hasNonEmptyAttribute(Model $model, string $attribute): bool
    {
        Assert::stringNotEmpty($attribute);

        $value = $model->getAttribute($attribute);

<<<<<<< HEAD
        return $value !== null && $value !== '';
=======
        return null !== $value && '' !== $value;
>>>>>>> 7f6cf6be (.)
    }

    /**
     * Ottiene un attributo con cast sicuro a string.
     *
<<<<<<< HEAD
     * @param  Model  $model  Il modello Eloquent
     * @param  string  $attribute  Il nome dell'attributo
     * @param  string|null  $default  Valore di default se l'attributo non esiste o è null
=======
     * @param Model       $model     Il modello Eloquent
     * @param string      $attribute Il nome dell'attributo
     * @param string|null $default   Valore di default se l'attributo non esiste o è null
     *
>>>>>>> 7f6cf6be (.)
     * @return string Il valore dell'attributo convertito in string
     */
    public function getStringAttribute(Model $model, string $attribute, ?string $default = ''): string
    {
        Assert::stringNotEmpty($attribute);

        $value = $model->getAttribute($attribute);

<<<<<<< HEAD
        if ($value === null) {
=======
        if (null === $value) {
>>>>>>> 7f6cf6be (.)
            return $default ?? '';
        }

        return SafeStringCastAction::cast($value);
    }

    /**
     * Ottiene un attributo con cast sicuro a int.
     *
<<<<<<< HEAD
     * @param  Model  $model  Il modello Eloquent
     * @param  string  $attribute  Il nome dell'attributo
     * @param  int|null  $default  Valore di default se l'attributo non esiste o è null
=======
     * @param Model    $model     Il modello Eloquent
     * @param string   $attribute Il nome dell'attributo
     * @param int|null $default   Valore di default se l'attributo non esiste o è null
     *
>>>>>>> 7f6cf6be (.)
     * @return int Il valore dell'attributo convertito in int
     */
    public function getIntAttribute(Model $model, string $attribute, ?int $default = 0): int
    {
        Assert::stringNotEmpty($attribute);

        $value = $model->getAttribute($attribute);

<<<<<<< HEAD
        if ($value === null) {
=======
        if (null === $value) {
>>>>>>> 7f6cf6be (.)
            return $default ?? 0;
        }

        return app(SafeIntCastAction::class)->execute($value, $default);
    }

    /**
     * Ottiene un attributo con cast sicuro a float.
     *
<<<<<<< HEAD
     * @param  Model  $model  Il modello Eloquent
     * @param  string  $attribute  Il nome dell'attributo
     * @param  float|null  $default  Valore di default se l'attributo non esiste o è null
=======
     * @param Model      $model     Il modello Eloquent
     * @param string     $attribute Il nome dell'attributo
     * @param float|null $default   Valore di default se l'attributo non esiste o è null
     *
>>>>>>> 7f6cf6be (.)
     * @return float Il valore dell'attributo convertito in float
     */
    public function getFloatAttribute(Model $model, string $attribute, ?float $default = 0.0): float
    {
        Assert::stringNotEmpty($attribute);

        $value = $model->getAttribute($attribute);

<<<<<<< HEAD
        if ($value === null) {
=======
        if (null === $value) {
>>>>>>> 7f6cf6be (.)
            return $default ?? 0.0;
        }

        return app(SafeFloatCastAction::class)->execute($value, $default);
    }

    /**
     * Ottiene un attributo con cast sicuro a boolean.
     *
<<<<<<< HEAD
     * @param  Model  $model  Il modello Eloquent
     * @param  string  $attribute  Il nome dell'attributo
     * @param  bool|null  $default  Valore di default se l'attributo non esiste o è null
=======
     * @param Model     $model     Il modello Eloquent
     * @param string    $attribute Il nome dell'attributo
     * @param bool|null $default   Valore di default se l'attributo non esiste o è null
     *
>>>>>>> 7f6cf6be (.)
     * @return bool Il valore dell'attributo convertito in boolean
     */
    public function getBooleanAttribute(Model $model, string $attribute, ?bool $default = false): bool
    {
        Assert::stringNotEmpty($attribute);

        $value = $model->getAttribute($attribute);

<<<<<<< HEAD
        if ($value === null) {
=======
        if (null === $value) {
>>>>>>> 7f6cf6be (.)
            return $default ?? false;
        }

        return app(SafeBooleanCastAction::class)->execute($value, $default);
    }

    /**
     * Ottiene un attributo con cast sicuro a array.
     *
<<<<<<< HEAD
     * @param  Model  $model  Il modello Eloquent
     * @param  string  $attribute  Il nome dell'attributo
     * @param  array<int|string, mixed>|null  $default  Valore di default se l'attributo non esiste o è null
=======
     * @param Model                         $model     Il modello Eloquent
     * @param string                        $attribute Il nome dell'attributo
     * @param array<int|string, mixed>|null $default   Valore di default se l'attributo non esiste o è null
     *
>>>>>>> 7f6cf6be (.)
     * @return array<int|string, mixed> Il valore dell'attributo convertito in array
     */
    public function getArrayAttribute(Model $model, string $attribute, ?array $default = []): array
    {
        Assert::stringNotEmpty($attribute);

        $value = $model->getAttribute($attribute);

<<<<<<< HEAD
        if ($value === null) {
=======
        if (null === $value) {
>>>>>>> 7f6cf6be (.)
            return app(SafeArrayCastAction::class)->execute([], $default);
        }

        return app(SafeArrayCastAction::class)->execute($value, $default);
    }

    /**
     * Ottiene un attributo con cast sicuro a un tipo specifico.
     *
<<<<<<< HEAD
     * @param  Model  $model  Il modello Eloquent
     * @param  string  $attribute  Il nome dell'attributo
     * @param  string  $type  Il tipo di cast desiderato (string, int, float, bool, array)
     * @param  mixed  $default  Valore di default se l'attributo non esiste o è null
=======
     * @param Model  $model     Il modello Eloquent
     * @param string $attribute Il nome dell'attributo
     * @param string $type      Il tipo di cast desiderato (string, int, float, bool, array)
     * @param mixed  $default   Valore di default se l'attributo non esiste o è null
     *
>>>>>>> 7f6cf6be (.)
     * @return mixed Il valore dell'attributo convertito nel tipo specificato
     */
    public function getTypedAttribute(Model $model, string $attribute, string $type, mixed $default = null): mixed
    {
        Assert::stringNotEmpty($attribute);
        Assert::inArray($type, ['string', 'int', 'float', 'bool', 'array']);

        return match ($type) {
            'string' => $this->getStringAttribute($model, $attribute, is_string($default) ? $default : ''),
            'int' => $this->getIntAttribute($model, $attribute, is_int($default) ? $default : 0),
            'float' => $this->getFloatAttribute($model, $attribute, is_float($default) ? $default : 0.0),
            'bool' => $this->getBooleanAttribute($model, $attribute, is_bool($default) ? $default : false),
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
<<<<<<< HEAD
     * @param  Model  $model  Il modello Eloquent
     * @param  string  $attribute  Il nome dell'attributo
     * @param  mixed  $expectedValue  Il valore atteso
=======
     * @param Model  $model         Il modello Eloquent
     * @param string $attribute     Il nome dell'attributo
     * @param mixed  $expectedValue Il valore atteso
     *
>>>>>>> 7f6cf6be (.)
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
<<<<<<< HEAD
     * @param  Model  $model  Il modello Eloquent
     * @param  string  $attribute  Il nome dell'attributo
     * @param  string  $type  Il tipo di cast desiderato
     * @param  callable|null  $validator  Funzione di validazione opzionale
     * @param  mixed  $default  Valore di default se la validazione fallisce
=======
     * @param Model         $model     Il modello Eloquent
     * @param string        $attribute Il nome dell'attributo
     * @param string        $type      Il tipo di cast desiderato
     * @param callable|null $validator Funzione di validazione opzionale
     * @param mixed         $default   Valore di default se la validazione fallisce
     *
>>>>>>> 7f6cf6be (.)
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

<<<<<<< HEAD
        if ($validator !== null && ! $validator($value)) {
=======
        if (null !== $validator && ! $validator($value)) {
>>>>>>> 7f6cf6be (.)
            return $default;
        }

        return $value;
    }

    /**
     * Verifica se un attributo esiste e soddisfa una condizione.
     *
<<<<<<< HEAD
     * @param  Model  $model  Il modello Eloquent
     * @param  string  $attribute  Il nome dell'attributo
     * @param  callable  $condition  La condizione da verificare
=======
     * @param Model    $model     Il modello Eloquent
     * @param string   $attribute Il nome dell'attributo
     * @param callable $condition La condizione da verificare
     *
>>>>>>> 7f6cf6be (.)
     * @return bool True se l'attributo esiste e soddisfa la condizione
     */
    public function hasAttributeCondition(Model $model, string $attribute, callable $condition): bool
    {
        Assert::stringNotEmpty($attribute);

        $value = $model->getAttribute($attribute);

<<<<<<< HEAD
        if ($value === null) {
=======
        if (null === $value) {
>>>>>>> 7f6cf6be (.)
            return false;
        }

        return (bool) $condition($value);
    }

    /**
     * Ottiene un attributo con fallback a un altro attributo se il primo è null.
     *
<<<<<<< HEAD
     * @param  Model  $model  Il modello Eloquent
     * @param  string  $primaryAttribute  L'attributo primario
     * @param  string  $fallbackAttribute  L'attributo di fallback
     * @param  string  $type  Il tipo di cast desiderato
     * @param  mixed  $default  Valore di default se entrambi gli attributi sono null
=======
     * @param Model  $model             Il modello Eloquent
     * @param string $primaryAttribute  L'attributo primario
     * @param string $fallbackAttribute L'attributo di fallback
     * @param string $type              Il tipo di cast desiderato
     * @param mixed  $default           Valore di default se entrambi gli attributi sono null
     *
>>>>>>> 7f6cf6be (.)
     * @return mixed Il valore dell'attributo primario o di fallback
     */
    public function getAttributeWithFallback(
        Model $model,
        string $primaryAttribute,
        string $fallbackAttribute,
        string $type,
        mixed $default = null,
    ): mixed {
        Assert::stringNotEmpty($primaryAttribute);
        Assert::stringNotEmpty($fallbackAttribute);
        Assert::inArray($type, ['string', 'int', 'float', 'bool', 'array']);

        $primaryValue = $model->getAttribute($primaryAttribute);

<<<<<<< HEAD
        if ($primaryValue !== null) {
=======
        if (null !== $primaryValue) {
>>>>>>> 7f6cf6be (.)
            return $this->getTypedAttribute($model, $primaryAttribute, $type, $default);
        }

        return $this->getTypedAttribute($model, $fallbackAttribute, $type, $default);
    }

    /**
     * Metodo di convenienza per ottenere attributi con cast sicuro.
     *
<<<<<<< HEAD
     * @param  Model  $model  Il modello Eloquent
     * @param  string  $attribute  Il nome dell'attributo
     * @param  string  $type  Il tipo di cast desiderato
     * @param  mixed  $default  Valore di default
=======
     * @param Model  $model     Il modello Eloquent
     * @param string $attribute Il nome dell'attributo
     * @param string $type      Il tipo di cast desiderato
     * @param mixed  $default   Valore di default
     *
>>>>>>> 7f6cf6be (.)
     * @return mixed Il valore dell'attributo convertito
     */
    public static function get(Model $model, string $attribute, string $type, mixed $default = null): mixed
    {
        return app(self::class)->getTypedAttribute($model, $attribute, $type, $default);
    }

    /**
     * Metodo di convenienza per verificare l'esistenza di attributi.
     *
<<<<<<< HEAD
     * @param  Model  $model  Il modello Eloquent
     * @param  string  $attribute  Il nome dell'attributo
=======
     * @param Model  $model     Il modello Eloquent
     * @param string $attribute Il nome dell'attributo
     *
>>>>>>> 7f6cf6be (.)
     * @return bool True se l'attributo esiste
     */
    public static function has(Model $model, string $attribute): bool
    {
        return app(self::class)->hasAttribute($model, $attribute);
    }
}
