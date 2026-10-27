<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Links;

/**
 * Ancora HTML di una riga di elenco.
 */
final class RecordAnchor
{
    public const string PREFIX = 'record-';

    public static function id(int|string $key): string
    {
        return self::PREFIX.$key;
    }

    public static function fragment(int|string $key): string
    {
        return '#'.self::id($key);
    }

    public static function appendTo(string $url, int|string $key): string
    {
        if (str_contains($url, '#')) {
            return $url;
        }

        return $url.self::fragment($key);
    }
}
