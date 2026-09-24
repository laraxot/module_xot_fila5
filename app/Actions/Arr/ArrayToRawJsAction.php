<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Arr;

use Filament\Support\RawJs;
use Modules\Xot\Actions\Cast\SafeStringCastAction;
<<<<<<< .merge_file_aA1mr1
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> .merge_file_nm9M2c
use Spatie\QueueableAction\QueueableAction;

use function Safe\preg_match;

<<<<<<< .merge_file_aA1mr1
=======
=======
>>>>>>> 3792da0d (Check & fix styling)

use function Safe\preg_match;

use Spatie\QueueableAction\QueueableAction;

<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_nm9M2c
/**
 * Converte un array PHP in RawJs (oggetto JavaScript) sicuro per attributi HTML.
 *
 * Usa virgolette singole per stringhe e chiavi non-identificatore, così l'output
 * può essere usato dentro x-data="..." senza spezzare l'attributo.
 * I valori RawJs vengono emessi raw (es. formatter function per Chart.js).
 */
class ArrayToRawJsAction
{
    use QueueableAction;

    /**
     * Converte l'array in una stringa JavaScript (oggetto letterale) e restituisce RawJs.
     *
<<<<<<< .merge_file_aA1mr1
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  array<int|string, mixed>  $array  Array associativo (anche annidato); valori RawJs restano raw
=======
     * @param array<int|string, mixed> $array Array associativo (anche annidato); valori RawJs restano raw
>>>>>>> laraxot/dev
=======
     * @param array<string|mixed, mixed> $array Array associativo (anche annidato); valori RawJs restano raw
>>>>>>> 3792da0d (Check & fix styling)
=======
     * @param  array<int|string, mixed>  $array  Array associativo (anche annidato); valori RawJs restano raw
>>>>>>> .merge_file_nm9M2c
     */
    public function execute(array $array): RawJs
    {
        $parts = [];
        foreach ($array as $key => $value) {
            $k = $this->jsKey((string) $key);
            if ($value instanceof RawJs) {
                $parts[] = $k.': '.$value->toHtml();
            } elseif (is_array($value)) {
                $parts[] = $k.': '.$this->execute($value)->toHtml();
            } else {
                $parts[] = $k.': '.$this->jsValue($value);
            }
        }

        return RawJs::make('{'.implode(', ', $parts).'}');
    }

    /** Chiave JS sicura per attributo HTML: identificatore o 'key'. */
    private function jsKey(string $key): string
    {
        return preg_match('/^[a-zA-Z_][a-zA-Z0-9_]*$/', $key) ? $key : "'".str_replace("'", "\\'", $key)."'";
    }

    /** Valore JS sicuro per attributo HTML: niente virgolette doppie. */
    private function jsValue(mixed $value): string
    {
        if (is_bool($value)) {
            return $value ? 'true' : 'false';
        }
        if (is_null($value)) {
            return 'null';
        }
        if (is_numeric($value)) {
            return (string) $value;
        }

        return "'".str_replace(['\\', "'"], ['\\\\', "\\'"], SafeStringCastAction::cast($value))."'";
    }
}
