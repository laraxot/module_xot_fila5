<?php

declare(strict_types=1);
<<<<<<< HEAD
=======

>>>>>>> laraxot/dev
/**
 * Stub file for PHPStan static analysis of merge_translation_files function.
 * This file provides the function signature for static analysis.
 * At runtime, the actual implementation is in Helper.php.
 */
if (! function_exists('merge_translation_files')) {
    /**
     * Merge multiple PHP translation files into a single array.
     *
<<<<<<< HEAD
     * @param  string  $first  First translation file path
     * @param  string  ...$rest  Additional translation file paths
=======
     * @param string $first   First translation file path
     * @param string ...$rest Additional translation file paths
     *
>>>>>>> laraxot/dev
     * @return array<string, mixed>
     */
    function merge_translation_files(string $first, string ...$rest): array
    {
<<<<<<< HEAD
        $result = load_translation_array($first);

        foreach ($rest as $file) {
            /** @var array<string, mixed> $result */
            $result = array_replace_recursive($result, load_translation_array($file));
        }

        return $result;
    }

    /**
     * Load a translation file and guarantee a string-keyed array.
     *
     * @return array<string, mixed>
     */
    function load_translation_array(string $file): array
    {
        $content = require $file;

        return is_array($content) ? array_filter($content, 'is_string', ARRAY_FILTER_USE_KEY) : [];
    }
=======
        $result = (array) require $first;

        foreach ($rest as $file) {
            $result = array_replace_recursive($result, (array) require $file);
        }

        /* @phpstan-ignore return.type */
        return $result;
    }
>>>>>>> laraxot/dev
}
