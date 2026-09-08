<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Cast;

<<<<<<< HEAD
use InvalidArgumentException;
use Throwable;
use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;

use function Safe\json_decode;

=======
use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;

>>>>>>> c7fd73eb (.)
/**
 * Action per gestire in modo sicuro l'accesso alle proprietà degli oggetti generici.
 *
 * Questa action centralizza la logica di accesso sicuro alle proprietà per evitare:
 * - Uso di property_exists() con oggetti che potrebbero avere magic methods
 * - Errori di tipo con accesso diretto alle proprietà
 * - Duplicazione di logica di verifica proprietà
 *
 * Principi applicati:
 * - DRY: Evita duplicazione di logica di accesso proprietà
 * - KISS: Metodi semplici e diretti
 * - Robustezza: Gestisce tutti i casi edge e mantiene type safety
 * - Sicurezza: Previene errori di accesso a proprietà inesistenti
 * - Assert: Utilizza webmozart/assert per validazioni robuste
<<<<<<< HEAD
 *
 * @package Modules\Xot\Actions\Cast
=======
>>>>>>> c7fd73eb (.)
 */
class SafeObjectCastAction
{
    use QueueableAction;

    /**
     * Verifica se un oggetto ha una proprietà specifica.
     *
<<<<<<< HEAD
     * @param object $object L'oggetto da verificare
     * @param string $property Il nome della proprietà
     *
=======
     * @param  object  $object  L'oggetto da verificare
     * @param  string  $property  Il nome della proprietà
>>>>>>> c7fd73eb (.)
     * @return bool True se l'oggetto ha la proprietà
     */
    public function hasProperty(object $object, string $property): bool
    {
<<<<<<< HEAD
        Assert::object($object);
=======
>>>>>>> c7fd73eb (.)
        Assert::stringNotEmpty($property);

        return isset($object->{$property});
    }

    /**
     * Verifica se un oggetto ha una proprietà con valore non null.
     *
<<<<<<< HEAD
     * @param object $object L'oggetto da verificare
     * @param string $property Il nome della proprietà
     *
=======
     * @param  object  $object  L'oggetto da verificare
     * @param  string  $property  Il nome della proprietà
>>>>>>> c7fd73eb (.)
     * @return bool True se l'oggetto ha la proprietà con valore non null
     */
    public function hasNonNullProperty(object $object, string $property): bool
    {
<<<<<<< HEAD
        Assert::object($object);
        Assert::stringNotEmpty($property);

        $hasProperty = isset($object->{$property});
        $isNotNull = $hasProperty && null !== $object->{$property};

        Assert::true(
            !$hasProperty || $isNotNull,
            __FILE__ . ':' . __LINE__ . ' - ' . class_basename(__CLASS__) . ' - Property null check should be consistent with isset result'
=======
        Assert::stringNotEmpty($property);

        $hasProperty = isset($object->{$property});
        $isNotNull = $hasProperty && $object->{$property} !== null;

        Assert::true(
            ! $hasProperty || $isNotNull,
            __FILE__.':'.__LINE__.' - '.class_basename(self::class).' - Property null check should be consistent with isset result'
>>>>>>> c7fd73eb (.)
        );

        return $hasProperty && $isNotNull;
    }

    /**
     * Verifica se un oggetto ha una proprietà con valore non vuoto.
     *
<<<<<<< HEAD
     * @param object $object L'oggetto da verificare
     * @param string $property Il nome della proprietà
     *
=======
     * @param  object  $object  L'oggetto da verificare
     * @param  string  $property  Il nome della proprietà
>>>>>>> c7fd73eb (.)
     * @return bool True se l'oggetto ha la proprietà con valore non vuoto
     */
    public function hasNonEmptyProperty(object $object, string $property): bool
    {
<<<<<<< HEAD
        Assert::object($object);
        Assert::stringNotEmpty($property);

        if (!isset($object->{$property})) {
=======
        Assert::stringNotEmpty($property);

        if (! isset($object->{$property})) {
>>>>>>> c7fd73eb (.)
            return false;
        }

        $value = $object->{$property};
<<<<<<< HEAD
=======

>>>>>>> c7fd73eb (.)
        return $value !== '';
    }

    /**
     * Ottiene una proprietà con cast sicuro a string.
     *
<<<<<<< HEAD
     * @param object $object L'oggetto da cui ottenere la proprietà
     * @param string $property Il nome della proprietà
     * @param string|null $default Valore di default se la proprietà non esiste o è null
     *
     * @return string Il valore della proprietà convertito in string
     */
    public function getStringProperty(object $object, string $property, null|string $default = ''): string
    {
        Assert::object($object);
        Assert::stringNotEmpty($property);

        if (!isset($object->{$property})) {
=======
     * @param  object  $object  L'oggetto da cui ottenere la proprietà
     * @param  string  $property  Il nome della proprietà
     * @param  string|null  $default  Valore di default se la proprietà non esiste o è null
     * @return string Il valore della proprietà convertito in string
     */
    public function getStringProperty(object $object, string $property, ?string $default = ''): string
    {
        Assert::stringNotEmpty($property);

        if (! isset($object->{$property})) {
>>>>>>> c7fd73eb (.)
            return $default ?? '';
        }

        $value = $object->{$property};
<<<<<<< HEAD
        return (string) $value;
=======

        return SafeStringCastAction::cast($value);
>>>>>>> c7fd73eb (.)
    }

    /**
     * Ottiene una proprietà con cast sicuro a int.
     *
<<<<<<< HEAD
     * @param object $object L'oggetto da cui ottenere la proprietà
     * @param string $property Il nome della proprietà
     * @param int|null $default Valore di default se la proprietà non esiste o è null
     *
     * @return int Il valore della proprietà convertito in int
     */
    public function getIntProperty(object $object, string $property, null|int $default = 0): int
    {
        Assert::object($object);
        Assert::stringNotEmpty($property);

        if (!isset($object->{$property})) {
=======
     * @param  object  $object  L'oggetto da cui ottenere la proprietà
     * @param  string  $property  Il nome della proprietà
     * @param  int|null  $default  Valore di default se la proprietà non esiste o è null
     * @return int Il valore della proprietà convertito in int
     */
    public function getIntProperty(object $object, string $property, ?int $default = 0): int
    {
        Assert::stringNotEmpty($property);

        if (! isset($object->{$property})) {
>>>>>>> c7fd73eb (.)
            return $default ?? 0;
        }

        $value = $object->{$property};
<<<<<<< HEAD
=======

>>>>>>> c7fd73eb (.)
        return app(SafeIntCastAction::class)->execute($value, $default);
    }

    /**
     * Ottiene una proprietà con cast sicuro a float.
     *
<<<<<<< HEAD
     * @param object $object L'oggetto da cui ottenere la proprietà
     * @param string $property Il nome della proprietà
     * @param float|null $default Valore di default se la proprietà non esiste o è null
     *
     * @return float Il valore della proprietà convertito in float
     */
    public function getFloatProperty(object $object, string $property, null|float $default = 0.0): float
    {
        Assert::object($object);
        Assert::stringNotEmpty($property);

        if (!isset($object->{$property})) {
=======
     * @param  object  $object  L'oggetto da cui ottenere la proprietà
     * @param  string  $property  Il nome della proprietà
     * @param  float|null  $default  Valore di default se la proprietà non esiste o è null
     * @return float Il valore della proprietà convertito in float
     */
    public function getFloatProperty(object $object, string $property, ?float $default = 0.0): float
    {
        Assert::stringNotEmpty($property);

        if (! isset($object->{$property})) {
>>>>>>> c7fd73eb (.)
            return $default ?? 0.0;
        }

        $value = $object->{$property};
<<<<<<< HEAD
=======

>>>>>>> c7fd73eb (.)
        return app(SafeFloatCastAction::class)->execute($value, $default);
    }

    /**
     * Ottiene una proprietà con cast sicuro a boolean.
     *
<<<<<<< HEAD
     * @param object $object L'oggetto da cui ottenere la proprietà
     * @param string $property Il nome della proprietà
     * @param bool|null $default Valore di default se la proprietà non esiste o è null
     *
     * @return bool Il valore della proprietà convertito in boolean
     */
    public function getBooleanProperty(object $object, string $property, null|bool $default = false): bool
    {
        Assert::object($object);
        Assert::stringNotEmpty($property);

        if (!isset($object->{$property})) {
=======
     * @param  object  $object  L'oggetto da cui ottenere la proprietà
     * @param  string  $property  Il nome della proprietà
     * @param  bool|null  $default  Valore di default se la proprietà non esiste o è null
     * @return bool Il valore della proprietà convertito in boolean
     */
    public function getBooleanProperty(object $object, string $property, ?bool $default = false): bool
    {
        Assert::stringNotEmpty($property);

        if (! isset($object->{$property})) {
>>>>>>> c7fd73eb (.)
            return $default ?? false;
        }

        $value = $object->{$property};
<<<<<<< HEAD
=======

>>>>>>> c7fd73eb (.)
        return app(SafeBooleanCastAction::class)->execute($value, $default);
    }

    /**
     * Ottiene una proprietà con cast sicuro a array.
     *
<<<<<<< HEAD
     * @param object $object L'oggetto da cui ottenere la proprietà
     * @param string $property Il nome della proprietà
     * @param array|null $default Valore di default se la proprietà non esiste o è null
     *
     * @return array Il valore della proprietà convertito in array
     */
    public function getArrayProperty(object $object, string $property, null|array $default = []): array
    {
        Assert::object($object);
        Assert::stringNotEmpty($property);

        if (!isset($object->{$property})) {
            return $default ?? [];
        }

        $value = $object->{$property};
=======
     * @param  object  $object  L'oggetto da cui ottenere la proprietà
     * @param  string  $property  Il nome della proprietà
     * @param  array<int|string, mixed>|null  $default  Valore di default se la proprietà non esiste o è null
     * @return array<int|string, mixed> Il valore della proprietà convertito in array
     */
    public function getArrayProperty(object $object, string $property, ?array $default = []): array
    {
        Assert::stringNotEmpty($property);

        if (! isset($object->{$property})) {
            return app(SafeArrayCastAction::class)->execute([], $default);
        }

        $value = $object->{$property};

>>>>>>> c7fd73eb (.)
        return app(SafeArrayCastAction::class)->execute($value, $default);
    }

    /**
     * Ottiene una proprietà con cast sicuro a un tipo specifico.
     *
<<<<<<< HEAD
     * @param object $object L'oggetto da cui ottenere la proprietà
     * @param string $property Il nome della proprietà
     * @param string $type Il tipo di cast desiderato (string, int, float, bool, array)
     * @param mixed $default Valore di default se la proprietà non esiste o è null
     *
=======
     * @param  object  $object  L'oggetto da cui ottenere la proprietà
     * @param  string  $property  Il nome della proprietà
     * @param  string  $type  Il tipo di cast desiderato (string, int, float, bool, array)
     * @param  mixed  $default  Valore di default se la proprietà non esiste o è null
>>>>>>> c7fd73eb (.)
     * @return mixed Il valore della proprietà convertito nel tipo specificato
     */
    public function getTypedProperty(object $object, string $property, string $type, mixed $default = null): mixed
    {
<<<<<<< HEAD
        Assert::object($object);
=======
>>>>>>> c7fd73eb (.)
        Assert::stringNotEmpty($property);
        Assert::inArray($type, ['string', 'int', 'float', 'bool', 'array']);

        return match ($type) {
            'string' => $this->getStringProperty($object, $property, is_string($default) ? $default : null),
            'int' => $this->getIntProperty($object, $property, is_int($default) ? $default : null),
            'float' => $this->getFloatProperty($object, $property, is_float($default) ? $default : null),
            'bool' => $this->getBooleanProperty($object, $property, is_bool($default) ? $default : null),
<<<<<<< HEAD
            'array' => $this->getArrayProperty($object, $property, is_array($default) ? $default : null),
            default => throw new InvalidArgumentException("Tipo non supportato: {$type}"),
=======
            'array' => $this->getArrayProperty(
                $object,
                $property,
                is_array($default) ? app(SafeArrayCastAction::class)->execute($default) : null,
            ),
            default => throw new \InvalidArgumentException("Tipo non supportato: {$type}"),
>>>>>>> c7fd73eb (.)
        };
    }

    /**
     * Verifica se un oggetto ha una proprietà con valore specifico.
     *
<<<<<<< HEAD
     * @param object $object L'oggetto da verificare
     * @param string $property Il nome della proprietà
     * @param mixed $expectedValue Il valore atteso
     *
=======
     * @param  object  $object  L'oggetto da verificare
     * @param  string  $property  Il nome della proprietà
     * @param  mixed  $expectedValue  Il valore atteso
>>>>>>> c7fd73eb (.)
     * @return bool True se l'oggetto ha la proprietà con il valore atteso
     */
    public function hasPropertyValue(object $object, string $property, mixed $expectedValue): bool
    {
<<<<<<< HEAD
        Assert::object($object);
        Assert::stringNotEmpty($property);

        if (!isset($object->{$property})) {
=======
        Assert::stringNotEmpty($property);

        if (! isset($object->{$property})) {
>>>>>>> c7fd73eb (.)
            return false;
        }

        $actualValue = $object->{$property};
<<<<<<< HEAD
=======

>>>>>>> c7fd73eb (.)
        return $actualValue === $expectedValue;
    }

    /**
     * Ottiene una proprietà con validazione di tipo e valore.
     *
<<<<<<< HEAD
     * @param object $object L'oggetto da cui ottenere la proprietà
     * @param string $property Il nome della proprietà
     * @param string $type Il tipo di cast desiderato
     * @param callable|null $validator Funzione di validazione opzionale
     * @param mixed $default Valore di default se la validazione fallisce
     *
=======
     * @param  object  $object  L'oggetto da cui ottenere la proprietà
     * @param  string  $property  Il nome della proprietà
     * @param  string  $type  Il tipo di cast desiderato
     * @param  callable|null  $validator  Funzione di validazione opzionale
     * @param  mixed  $default  Valore di default se la validazione fallisce
>>>>>>> c7fd73eb (.)
     * @return mixed Il valore della proprietà validato e convertito
     */
    public function getValidatedProperty(
        object $object,
        string $property,
        string $type,
<<<<<<< HEAD
        null|callable $validator = null,
        mixed $default = null,
    ): mixed {
        Assert::object($object);
=======
        ?callable $validator = null,
        mixed $default = null,
    ): mixed {
>>>>>>> c7fd73eb (.)
        Assert::stringNotEmpty($property);
        Assert::inArray($type, ['string', 'int', 'float', 'bool', 'array']);

        $value = $this->getTypedProperty($object, $property, $type, $default);

<<<<<<< HEAD
        if ($validator !== null && !$validator($value)) {
=======
        if ($validator !== null && ! $validator($value)) {
>>>>>>> c7fd73eb (.)
            return $default;
        }

        return $value;
    }

    /**
     * Verifica se un oggetto ha un metodo specifico.
     *
<<<<<<< HEAD
     * @param object $object L'oggetto da verificare
     * @param string $method Il nome del metodo
     *
=======
     * @param  object  $object  L'oggetto da verificare
     * @param  string  $method  Il nome del metodo
>>>>>>> c7fd73eb (.)
     * @return bool True se l'oggetto ha il metodo
     */
    public function hasMethod(object $object, string $method): bool
    {
<<<<<<< HEAD
        Assert::object($object);
=======
>>>>>>> c7fd73eb (.)
        Assert::stringNotEmpty($method);

        return method_exists($object, $method);
    }

    /**
     * Esegue un metodo su un oggetto in modo sicuro.
     *
<<<<<<< HEAD
     * @param object $object L'oggetto su cui eseguire il metodo
     * @param string $method Il nome del metodo
     * @param array $parameters I parametri del metodo
     * @param mixed $default Valore di default se il metodo non esiste o fallisce
     *
=======
     * @param  object  $object  L'oggetto su cui eseguire il metodo
     * @param  string  $method  Il nome del metodo
     * @param  array<mixed>  $parameters  I parametri del metodo
     * @param  mixed  $default  Valore di default se il metodo non esiste o fallisce
>>>>>>> c7fd73eb (.)
     * @return mixed Il risultato del metodo o il valore di default
     */
    public function callMethodSafely(
        object $object,
        string $method,
        array $parameters = [],
        mixed $default = null,
    ): mixed {
<<<<<<< HEAD
        Assert::object($object);
        Assert::stringNotEmpty($method);

        if (!method_exists($object, $method)) {
=======
        Assert::stringNotEmpty($method);

        if (! method_exists($object, $method)) {
>>>>>>> c7fd73eb (.)
            return $default;
        }

        try {
            return $object->{$method}(...$parameters);
<<<<<<< HEAD
        } catch (Throwable $e) {
=======
        } catch (\Throwable $e) {
>>>>>>> c7fd73eb (.)
            return $default;
        }
    }
}
