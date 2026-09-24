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
<<<<<<< .merge_file_mTzFNF
=======
<<<<<<< HEAD
>>>>>>> .merge_file_3Onhci
     * @param  array<int, string>  $types
     * @param  array<int, string>  $categories
     * @param  array<string, string>  $defaultMeta
     * @param  array<string, bool>  $features
<<<<<<< .merge_file_mTzFNF
=======
=======
     * @param array<int, string>    $types
     * @param array<int, string>    $categories
     * @param array<string, string> $defaultMeta
     * @param array<string, bool>   $features
>>>>>>> laraxot/dev
>>>>>>> .merge_file_3Onhci
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
<<<<<<< .merge_file_mTzFNF
    ) {}
=======
<<<<<<< HEAD
    ) {}
=======
    ) {
    }
>>>>>>> laraxot/dev
>>>>>>> .merge_file_3Onhci

    /**
     * Create a new instance of ArticleData with default values.
     */
    public static function make(): self
    {
<<<<<<< .merge_file_mTzFNF
        return new self;
=======
<<<<<<< HEAD
        return new self;
=======
        return new self();
>>>>>>> laraxot/dev
>>>>>>> .merge_file_3Onhci
    }
}
