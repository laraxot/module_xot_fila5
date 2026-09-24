<?php

declare(strict_types=1);

/**
 * Stub file for PHPStan static analysis of merge_translation_files function.
 * This file provides the function signature for static analysis.
 * At runtime, the actual implementation is in Helper.php.
 */
if (! function_exists('merge_translation_files')) {
    /**
     * Merge multiple PHP translation files into a single array.
     *
     * @param string $first   First translation file path
     * @param string ...$rest Additional translation file paths
     *
     * @return array<string, mixed>
     */
    function merge_translation_files(string $first, string ...$rest): array
    {
        $result = (array) require $first;

        foreach ($rest as $file) {
            $result = array_replace_recursive($result, (array) require $file);
        }

        /* @phpstan-ignore return.type */
        return $result;
    }
}
