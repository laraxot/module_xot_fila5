<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Arrays;

use Filament\Support\RawJs;
use Modules\Xot\Actions\Cast\SafeStringCastAction;
<<<<<<< HEAD
<<<<<<< .merge_file_VvlzCl
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
<<<<<<< HEAD
>>>>>>> da9ae01a0 (.)
<<<<<<< .merge_file_0YG7ku
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_Frfp55
use Spatie\QueueableAction\QueueableAction;

use function Safe\preg_match;

<<<<<<< .merge_file_VvlzCl
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
<<<<<<< HEAD
=======
>>>>>>> .merge_file_LycDYE
=======
<<<<<<< HEAD
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)

use function Safe\preg_match;

use Spatie\QueueableAction\QueueableAction;

<<<<<<< HEAD
<<<<<<< .merge_file_0YG7ku
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_LycDYE
=======
<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_Frfp55
=======
>>>>>>> laraxot/dev
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
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
<<<<<<< HEAD
<<<<<<< .merge_file_VvlzCl
<<<<<<< HEAD
     * @param  array<int|string, mixed>  $array  Array associativo (anche annidato); valori RawJs restano raw
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_0YG7ku
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
     * @param  array<int|string, mixed>  $array  Array associativo (anche annidato); valori RawJs restano raw
=======
     * @param array<int|string, mixed> $array Array associativo (anche annidato); valori RawJs restano raw
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
     * @param array<int|string, mixed> $array Array associativo (anche annidato); valori RawJs restano raw
>>>>>>> .merge_file_LycDYE
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
     * @param array<int|string, mixed> $array Array associativo (anche annidato); valori RawJs restano raw
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
     * @param  array<int|string, mixed>  $array  Array associativo (anche annidato); valori RawJs restano raw
>>>>>>> .merge_file_Frfp55
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
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
