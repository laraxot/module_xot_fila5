<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\String;

<<<<<<< HEAD
use Illuminate\Support\Str;
use Spatie\QueueableAction\QueueableAction;

=======
>>>>>>> c7fd73eb (.)
use function Safe\preg_replace;

class SanitizeAction
{
<<<<<<< HEAD
    use QueueableAction;

=======
>>>>>>> c7fd73eb (.)
    public function execute(string $str): string
    {
        $str = strip_tags($str);
        $str = html_entity_decode($str);
<<<<<<< HEAD
        $str = trim($str);

        $replaced = preg_replace('/\s+/', ' ', $str);
        $str = is_string($replaced) ? $replaced : $str;

        if (Str::startsWith($str, '-')) {
            $afterStr = Str::after($str, '-');
            // $afterStr è sempre una stringa perché Str::after restituisce sempre una stringa
            $str = $this->execute($afterStr);
        }

        return $str;
=======

        return trim($str);
>>>>>>> c7fd73eb (.)
    }
}

/*
 * $string = trim($item);
 *
 *
 * // Convert special characters to HTML entities
 * $string = htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
 *
 * // Remove potentially dangerous tags or attributes (like <script>)
 * $string = strip_tags($string);
 *
 * // Additional removal of non-printable characters
 * $string = preg_replace('/[\x00-\x1F\x7F]/u', '', $string);
 */
