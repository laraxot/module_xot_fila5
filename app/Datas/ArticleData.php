<?php

declare(strict_types=1);

namespace Modules\Xot\Datas;

use Spatie\LaravelData\Data;

/**
 * Class ArticleData - Gestisce la configurazione degli articoli.
 * Utilizzato esclusivamente nell'ambito dell'architettura Filament-first.
 *
 * @phpstan-consistent-constructor
 */
final class ArticleData extends Data
{
    /**
<<<<<<< .merge_file_rZ0o1z
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> .merge_file_SHPXHT
     * @param  array<int, string>  $types
     * @param  array<int, string>  $categories
     * @param  array<string, string>  $defaultMeta
     * @param  array<string, bool>  $features
<<<<<<< .merge_file_rZ0o1z
=======
=======
>>>>>>> 3792da0d (Check & fix styling)
     * @param array<int, string>    $types
     * @param array<int, string>    $categories
     * @param array<string, string> $defaultMeta
     * @param array<string, bool>   $features
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_SHPXHT
     */
    public function __construct(
        public readonly array $types = ['post', 'page', 'news'],
        public readonly array $categories = [],
        public readonly string $editor = 'markdown',
        public readonly array $defaultMeta = [
            'title' => '',
            'description' => '',
            'keywords' => '',
        ],
        public readonly array $features = [
            'enable_comments' => true,
            'moderate_comments' => true,
            'enable_rating' => false,
            'show_author' => true,
            'show_date' => true,
            'show_reading_time' => true,
        ],
<<<<<<< .merge_file_rZ0o1z
<<<<<<< HEAD
<<<<<<< HEAD
    ) {}
=======
    ) {
    }
>>>>>>> laraxot/dev
=======
    ) {
    }
>>>>>>> 3792da0d (Check & fix styling)
=======
    ) {}
>>>>>>> .merge_file_SHPXHT

    /**
     * Create a new instance of ArticleData with default values.
     */
    public static function make(): self
    {
<<<<<<< .merge_file_rZ0o1z
<<<<<<< HEAD
<<<<<<< HEAD
        return new self;
=======
        return new self();
>>>>>>> laraxot/dev
=======
        return new self();
>>>>>>> 3792da0d (Check & fix styling)
=======
        return new self;
>>>>>>> .merge_file_SHPXHT
    }
}
