<?php

declare(strict_types=1);
<<<<<<< .merge_file_IpxFJs
<<<<<<< HEAD

=======
<<<<<<< HEAD

=======
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_wgQVYe
/**
 * Stub file for PHPStan static analysis of merge_translation_files function.
 * This file provides the function signature for static analysis.
 * At runtime, the actual implementation is in Helper.php.
 */
if (! function_exists('merge_translation_files')) {
    /**
     * Merge multiple PHP translation files into a single array.
     *
<<<<<<< .merge_file_IpxFJs
<<<<<<< HEAD
     * @param string $first   First translation file path
     * @param string ...$rest Additional translation file paths
     *
=======
<<<<<<< HEAD
     * @param string $first   First translation file path
     * @param string ...$rest Additional translation file paths
     *
=======
     * @param  string  $first  First translation file path
     * @param  string  ...$rest  Additional translation file paths
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======
     * @param string $first   First translation file path
     * @param string ...$rest Additional translation file paths
     *
>>>>>>> .merge_file_wgQVYe
     * @return array<string, mixed>
     */
    function merge_translation_files(string $first, string ...$rest): array
    {
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
}
