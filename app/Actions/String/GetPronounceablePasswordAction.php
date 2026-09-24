<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\String;

use Spatie\QueueableAction\QueueableAction;

class GetPronounceablePasswordAction
{
    use QueueableAction;

    /**
     * Genera una password pronunciabile con caratteri speciali e numeri.
     *
<<<<<<< .merge_file_rHgY0b
     * @param  int  $length  Lunghezza minima della password (default: 12)
=======
<<<<<<< HEAD
     * @param  int  $length  Lunghezza minima della password (default: 12)
=======
     * @param int $length Lunghezza minima della password (default: 12)
     *
>>>>>>> laraxot/dev
>>>>>>> .merge_file_SmD9yv
     * @return string Password generata
     */
    public function execute(int $length = 12): string
    {
        $vowels = ['a', 'e', 'i', 'o', 'u'];
        $consonants = [
            'b',
            'c',
            'd',
            'f',
            'g',
            'h',
            'j',
            'k',
            'l',
            'm',
            'n',
            'p',
            'r',
            's',
            't',
            'v',
            'w',
            'x',
            'y',
            'z',
        ];

        $password = '';
        $useConsonant = true;

        // Costruisci la parte pronunciabile alternando consonanti e vocali
        while (strlen($password) < $length - 4) {
            $char = $useConsonant ? $consonants[array_rand($consonants)] : $vowels[array_rand($vowels)];
            $password .= $char;
            $useConsonant = ! $useConsonant;
        }

        // Verifica che la password non sia vuota prima di accedere agli offset
<<<<<<< .merge_file_rHgY0b
        if (strlen($password) === 0) {
=======
<<<<<<< HEAD
        if (strlen($password) === 0) {
=======
        if (0 === strlen($password)) {
>>>>>>> laraxot/dev
>>>>>>> .merge_file_SmD9yv
            // Fallback: genera almeno una consonante e una vocale
            $password = $consonants[array_rand($consonants)].$vowels[array_rand($vowels)];
        }

        // Aggiungi almeno:
        // - 1 maiuscola
        // - 1 cifra
        // - 1 speciale
        $passwordLength = strlen($password);
        $randomIndex = rand(0, $passwordLength - 1);
        $uppercase = strtoupper($password[$randomIndex]);
        $digit = strval(rand(0, 9));
        $specials = '!#*-_=+:?';
        $special = $specials[rand(0, strlen($specials) - 1)];

        // Evita duplicazioni semplici: aggiungi un'altra minuscola casuale
        $password .= $uppercase.$digit.$special;

        // Shuffle finale per rendere la password meno prevedibile
        $shuffled = str_shuffle($password);

        return trim($shuffled);
    }
}
