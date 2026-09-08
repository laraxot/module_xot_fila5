<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Cast;

use Spatie\QueueableAction\QueueableAction;

/**
 * Action per convertire in modo sicuro un valore mixed in array.
 *
 * Questa action centralizza la logica di cast sicuro per evitare duplicazioni
 * di codice (principio DRY) e garantire comportamento consistente in tutto il codebase.
 *
 * Principi applicati:
 * - DRY: Evita duplicazione di logica di cast array in tutto il progetto
 * - KISS: Logica semplice e diretta, facile da comprendere e mantenere
 * - Sicurezza: Gestisce tutti i casi edge e previene errori di cast
 *
 * Casi d'uso tipici:
 * - Conversione di valori da API esterne
 * - Parsing di dati da file CSV/JSON
 * - Gestione di input utente
 * - Risoluzione errori PHPStan "Cannot cast mixed to array"
 *
 * @example
 * // Uso base
 * $array = SafeArrayCastAction::cast($mixedValue);
 *
 * // Con default personalizzato
 * $array = SafeArrayCastAction::cast($mixedValue, ['default']);
 *
 * // Con validazione di struttura
 * $array = SafeArrayCastAction::castWithKeys($mixedValue, ['required_key']);
 */
class SafeArrayCastAction
{
    use QueueableAction;

    /**
     * Converte in modo sicuro un valore mixed in array.
     *
<<<<<<< HEAD
     * @param mixed $value Il valore da convertire
     * @param array|null $default Valore di default se la conversione fallisce (default: [])
     *
     * @return array Il valore convertito
     */
    public function execute(mixed $value, null|array $default = []): array
    {
        // Se è già un array, restituiscilo direttamente
        if (is_array($value)) {
            return $value;
=======
     * @param  mixed  $value  Il valore da convertire
     * @param  array<int|string, mixed>|null  $default  Valore di default se la conversione fallisce (default: [])
     * @return array<int|string, mixed> Il valore convertito
     */
    public function execute(mixed $value, ?array $default = []): array
    {
        // Se è già un array, restituiscilo direttamente
        if (is_array($value)) {
            return $this->normalizeArray($value);
>>>>>>> c7fd73eb (.)
        }

        // Se è null, restituisci il default
        if (is_null($value)) {
            return $default ?? [];
        }

        // Se è una Collection Laravel, convertila in array
        if (is_object($value) && method_exists($value, 'toArray')) {
            $result = $value->toArray();
<<<<<<< HEAD
            return is_array($result) ? $result : ($default ?? []);
        }

        // Se è un oggetto stdClass, convertilo in array
        if (is_object($value) && get_class($value) === 'stdClass') {
            return (array) $value;
=======

            return is_array($result) ? $this->normalizeArray($result) : ($default ?? []);
        }

        // Se è un oggetto stdClass, convertilo in array
        if (is_object($value) && $value::class === 'stdClass') {
            return $this->normalizeArray((array) $value);
>>>>>>> c7fd73eb (.)
        }

        // Se è un oggetto con metodo __toArray, usalo
        if (is_object($value) && method_exists($value, '__toArray')) {
            $result = $value->__toArray();
<<<<<<< HEAD
            return is_array($result) ? $result : ($default ?? []);
=======

            return is_array($result) ? $this->normalizeArray($result) : ($default ?? []);
>>>>>>> c7fd73eb (.)
        }

        // Se è un oggetto con proprietà pubbliche, convertilo in array
        if (is_object($value)) {
<<<<<<< HEAD
            return get_object_vars($value);
=======
            return $this->normalizeArray(get_object_vars($value));
>>>>>>> c7fd73eb (.)
        }

        // Se è uno scalare, avvolgilo in un array
        if (is_scalar($value)) {
<<<<<<< HEAD
            return [$value];
=======
            return $this->normalizeArray([$value]);
>>>>>>> c7fd73eb (.)
        }

        // Per tutti gli altri tipi, restituisci il default
        return $default ?? [];
    }

    /**
<<<<<<< HEAD
     * Converte un valore in array con validazione di chiavi richieste.
     *
     * @param mixed $value Il valore da convertire
     * @param array $requiredKeys Chiavi che devono essere presenti
     * @param array|null $default Valore di default se la conversione fallisce
     *
     * @return array Il valore convertito con chiavi validate
     */
    public function executeWithKeys(mixed $value, array $requiredKeys, null|array $default = []): array
=======
     * @param  array<int|string, mixed>  $array
     * @return array<string, mixed>
     */
    private function normalizeArray(array $array): array
    {
        $result = [];

        foreach ($array as $key => $value) {
            $result[(string) $key] = $value;
        }

        return $result;
    }

    /**
     * Converte un valore in array con validazione di chiavi richieste.
     *
     * @param  mixed  $value  Il valore da convertire
     * @param  array<int|string>  $requiredKeys  Chiavi che devono essere presenti
     * @param  array<int|string, mixed>|null  $default  Valore di default se la conversione fallisce
     * @return array<int|string, mixed> Il valore convertito con chiavi validate
     */
    public function executeWithKeys(mixed $value, array $requiredKeys, ?array $default = []): array
>>>>>>> c7fd73eb (.)
    {
        $array = $this->execute($value, $default);

        // Verifica che tutte le chiavi richieste siano presenti
        foreach ($requiredKeys as $key) {
<<<<<<< HEAD
            if (!is_string($key) && !is_int($key)) {
                continue;
            }
            if (!array_key_exists($key, $array)) {
=======
            if (! array_key_exists($key, $array)) {
>>>>>>> c7fd73eb (.)
                return $default ?? [];
            }
        }

        return $array;
    }

    /**
     * Converte un valore in array con filtro di chiavi.
     *
<<<<<<< HEAD
     * @param mixed $value Il valore da convertire
     * @param array $allowedKeys Solo queste chiavi saranno mantenute
     * @param array|null $default Valore di default se la conversione fallisce
     *
     * @return array Il valore convertito con solo le chiavi permesse
     */
    public function executeWithFilter(mixed $value, array $allowedKeys, null|array $default = []): array
=======
     * @param  mixed  $value  Il valore da convertire
     * @param  array<int|string>  $allowedKeys  Solo queste chiavi saranno mantenute
     * @param  array<int|string, mixed>|null  $default  Valore di default se la conversione fallisce
     * @return array<int|string, mixed> Il valore convertito con solo le chiavi permesse
     */
    public function executeWithFilter(mixed $value, array $allowedKeys, ?array $default = []): array
>>>>>>> c7fd73eb (.)
    {
        $array = $this->execute($value, $default);

        // Filtra solo le chiavi permesse
<<<<<<< HEAD
        $flippedKeys = array_flip(array_filter($allowedKeys, fn($key) => is_string($key) || is_int($key)));
=======
        $flippedKeys = array_flip($allowedKeys);

>>>>>>> c7fd73eb (.)
        return array_intersect_key($array, $flippedKeys);
    }

    /**
     * Converte un valore in array con validazione di tipo per i valori.
     *
<<<<<<< HEAD
     * @param mixed $value Il valore da convertire
     * @param string $valueType Tipo richiesto per i valori ('string', 'int', 'float', 'bool')
     * @param array|null $default Valore di default se la conversione fallisce
     *
     * @return array Il valore convertito con valori del tipo richiesto
     */
    public function executeWithValueType(mixed $value, string $valueType, null|array $default = []): array
=======
     * @param  mixed  $value  Il valore da convertire
     * @param  string  $valueType  Tipo richiesto per i valori ('string', 'int', 'float', 'bool')
     * @param  array<int|string, mixed>|null  $default  Valore di default se la conversione fallisce
     * @return array<int|string, mixed> Il valore convertito con valori del tipo richiesto
     */
    public function executeWithValueType(mixed $value, string $valueType, ?array $default = []): array
>>>>>>> c7fd73eb (.)
    {
        $array = $this->execute($value, $default);

        // Converte i valori al tipo richiesto
        switch ($valueType) {
            case 'string':
                return array_map(SafeStringCastAction::cast(...), $array);
            case 'int':
                return array_map(SafeIntCastAction::cast(...), $array);
            case 'float':
                return array_map(SafeFloatCastAction::cast(...), $array);
            case 'bool':
                return array_map(SafeBooleanCastAction::cast(...), $array);
            default:
                return $array;
        }
    }

    /**
     * Verifica se un valore può essere convertito in array.
     *
<<<<<<< HEAD
     * @param mixed $value Il valore da verificare
     *
=======
     * @param  mixed  $value  Il valore da verificare
>>>>>>> c7fd73eb (.)
     * @return bool True se il valore può essere convertito in array
     */
    public function canCast(mixed $value): bool
    {
        return is_array($value) || is_null($value) || is_object($value) || is_scalar($value);
    }

    /**
     * Metodo statico di convenienza per chiamate dirette.
     *
<<<<<<< HEAD
     * @param mixed $value Il valore da convertire
     * @param array|null $default Valore di default se la conversione fallisce (default: [])
     *
     * @return array Il valore convertito in array
     */
    public static function cast(mixed $value, null|array $default = []): array
=======
     * @param  mixed  $value  Il valore da convertire
     * @param  array<int|string, mixed>|null  $default  Valore di default se la conversione fallisce (default: [])
     * @return array<int|string, mixed> Il valore convertito in array
     */
    public static function cast(mixed $value, ?array $default = []): array
>>>>>>> c7fd73eb (.)
    {
        return app(self::class)->execute($value, $default);
    }

    /**
     * Metodo statico per cast con chiavi richieste.
     *
<<<<<<< HEAD
     * @param mixed $value Il valore da convertire
     * @param array $requiredKeys Chiavi che devono essere presenti
     * @param array|null $default Valore di default se la conversione fallisce
     *
     * @return array Il valore convertito con chiavi validate
     */
    public static function castWithKeys(mixed $value, array $requiredKeys, null|array $default = []): array
=======
     * @param  mixed  $value  Il valore da convertire
     * @param  array<int|string>  $requiredKeys  Chiavi che devono essere presenti
     * @param  array<int|string, mixed>|null  $default  Valore di default se la conversione fallisce
     * @return array<int|string, mixed> Il valore convertito con chiavi validate
     */
    public static function castWithKeys(mixed $value, array $requiredKeys, ?array $default = []): array
>>>>>>> c7fd73eb (.)
    {
        return app(self::class)->executeWithKeys($value, $requiredKeys, $default);
    }

    /**
     * Metodo statico per cast con filtro di chiavi.
     *
<<<<<<< HEAD
     * @param mixed $value Il valore da convertire
     * @param array $allowedKeys Solo queste chiavi saranno mantenute
     * @param array|null $default Valore di default se la conversione fallisce
     *
     * @return array Il valore convertito con solo le chiavi permesse
     */
    public static function castWithFilter(mixed $value, array $allowedKeys, null|array $default = []): array
=======
     * @param  mixed  $value  Il valore da convertire
     * @param  array<int|string>  $allowedKeys  Solo queste chiavi saranno mantenute
     * @param  array<int|string, mixed>|null  $default  Valore di default se la conversione fallisce
     * @return array<int|string, mixed> Il valore convertito con solo le chiavi permesse
     */
    public static function castWithFilter(mixed $value, array $allowedKeys, ?array $default = []): array
>>>>>>> c7fd73eb (.)
    {
        return app(self::class)->executeWithFilter($value, $allowedKeys, $default);
    }

    /**
     * Metodo statico per cast con tipo di valore specifico.
     *
<<<<<<< HEAD
     * @param mixed $value Il valore da convertire
     * @param string $valueType Tipo richiesto per i valori
     * @param array|null $default Valore di default se la conversione fallisce
     *
     * @return array Il valore convertito con valori del tipo richiesto
     */
    public static function castWithValueType(mixed $value, string $valueType, null|array $default = []): array
=======
     * @param  mixed  $value  Il valore da convertire
     * @param  string  $valueType  Tipo richiesto per i valori
     * @param  array<int|string, mixed>|null  $default  Valore di default se la conversione fallisce
     * @return array<int|string, mixed> Il valore convertito con valori del tipo richiesto
     */
    public static function castWithValueType(mixed $value, string $valueType, ?array $default = []): array
>>>>>>> c7fd73eb (.)
    {
        return app(self::class)->executeWithValueType($value, $valueType, $default);
    }
}
