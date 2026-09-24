<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Cast;

/**
 * Action per convertire in modo sicuro un valore mixed in string.
 *
 * Questa action centralizza la logica di cast sicuro per evitare duplicazioni
 * di codice (principio DRY) e garantire comportamento consistente in tutto il codebase.
 */
class SafeStringCastAction
{
    /**
     * Converte in modo sicuro un valore mixed in string.
     * impostare delle eccezzioni ?
     *
<<<<<<< HEAD
<<<<<<< .merge_file_VgX0sv
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< .merge_file_wEm3Js
=======
>>>>>>> da9ae01a0 (.)
     * <<<<<<< HEAD
     *
     * @param mixed $value Il valore da convertire
     *                     =======
     *                     <<<<<<< .merge_file_wEm3Js
     *                     =======
     *                     <<<<<<< HEAD
     *                     <<<<<<< .merge_file_O8nWNS
     *                     >>>>>>> .merge_file_dmjXLI
     * @param mixed $value Il valore da convertire
     *
     * <<<<<<< .merge_file_wEm3Js
     * =======
     * =======
     * @param mixed $value Il valore da convertire
     *                     >>>>>>> 9e11d472 (Fix merge conflicts in PHPDoc comments across multiple action classes and contracts, ensuring consistent parameter annotations and removing redundant lines.)
     *
<<<<<<< HEAD
     * >>>>>>> .merge_file_dmjXLI
     *
     * >>>>>>> laraxot/dev
=======
     * @param mixed $value Il valore da convertire
>>>>>>> 3792da0d (Check & fix styling)
     *
=======
     * @param  mixed  $value  Il valore da convertire
>>>>>>> .merge_file_JkTGvV
=======
>>>>>>> .merge_file_dmjXLI
=======
     * @param mixed $value Il valore da convertire
     *
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
     * @return string Il valore convertito in string
     */
    public function execute(mixed $value): string
    {
        if (is_string($value)) {
            return $value;
        }
        /*
         * if ($value instanceof \BackedEnum) {
         * return $value->value;
         * }
         */

        if (is_null($value)) {
            return '';
        }

        if (is_bool($value)) {
            return $value ? '1' : '0';
        }

        if (is_scalar($value)) {
            return (string) $value;
        }

        // Per array, oggetti e altri tipi non scalari, restituisci stringa vuota
        return '';
    }

    /**
     * Metodo statico di convenienza per chiamate dirette.
     *
<<<<<<< HEAD
<<<<<<< .merge_file_VgX0sv
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< .merge_file_wEm3Js
=======
>>>>>>> da9ae01a0 (.)
     * <<<<<<< HEAD
     *
     * @param mixed $value Il valore da convertire
     *                     =======
     *                     <<<<<<< .merge_file_wEm3Js
     *                     =======
     *                     <<<<<<< HEAD
     *                     <<<<<<< .merge_file_O8nWNS
     *                     >>>>>>> .merge_file_dmjXLI
     * @param mixed $value Il valore da convertire
     *
     * <<<<<<< .merge_file_wEm3Js
     * =======
     * =======
     * @param mixed $value Il valore da convertire
     *                     >>>>>>> 9e11d472 (Fix merge conflicts in PHPDoc comments across multiple action classes and contracts, ensuring consistent parameter annotations and removing redundant lines.)
     *
<<<<<<< HEAD
     * >>>>>>> .merge_file_dmjXLI
     *
     * >>>>>>> laraxot/dev
=======
     * @param mixed $value Il valore da convertire
>>>>>>> 3792da0d (Check & fix styling)
     *
=======
     * @param  mixed  $value  Il valore da convertire
>>>>>>> .merge_file_JkTGvV
=======
>>>>>>> .merge_file_dmjXLI
=======
     * @param mixed $value Il valore da convertire
     *
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
     * @return string Il valore convertito in string
     */
    public static function cast(mixed $value): string
    {
        return app(self::class)->execute($value);
    }
}
