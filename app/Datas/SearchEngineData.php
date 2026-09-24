<?php

declare(strict_types=1);

namespace Modules\Xot\Datas;

use Spatie\LaravelData\Data;

/**
 * Class SearchEngineData - Gestisce la configurazione dei motori di ricerca per il framework Laraxot.
 * Utilizzato esclusivamente nell'ambito dell'architettura Filament-first.
 *
 * @phpstan-consistent-constructor
 */
class SearchEngineData extends Data
{
    /**
<<<<<<< .merge_file_CvsF2i
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> .merge_file_2SKuc9
     * @param  string  $driver  Driver del motore di ricerca (algolia, meilisearch, ecc.)
     * @param  string  $algolia_app_id  Algolia App ID
     * @param  string  $algolia_secret  Chiave segreta Algolia
     * @param  string  $meili_host  Host MeiliSearch
     * @param  string  $meili_key  Chiave MeiliSearch
     * @param  bool  $enable_local  Abilita la ricerca locale
     * @param  array<int, class-string>  $searchable  Modelli cercabili
<<<<<<< .merge_file_CvsF2i
=======
=======
>>>>>>> 8d801bbe (Check & fix styling)
     * @param string                   $driver         Driver del motore di ricerca (algolia, meilisearch, ecc.)
     * @param string                   $algolia_app_id Algolia App ID
     * @param string                   $algolia_secret Chiave segreta Algolia
     * @param string                   $meili_host     Host MeiliSearch
     * @param string                   $meili_key      Chiave MeiliSearch
     * @param bool                     $enable_local   Abilita la ricerca locale
     * @param array<int, class-string> $searchable     Modelli cercabili
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 8d801bbe (Check & fix styling)
=======
>>>>>>> .merge_file_2SKuc9
     */
    public function __construct(
        public readonly string $driver = 'local',
        public readonly string $algolia_app_id = '',
        public readonly string $algolia_secret = '',
        public readonly string $meili_host = 'http://localhost:7700',
        public readonly string $meili_key = '',
        public readonly bool $enable_local = true,
        public readonly array $searchable = [],
<<<<<<< .merge_file_CvsF2i
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
>>>>>>> 8d801bbe (Check & fix styling)
=======
    ) {}
>>>>>>> .merge_file_2SKuc9

    /**
     * Create a new instance of SearchEngineData with default values.
     */
    public static function make(): self
    {
<<<<<<< .merge_file_CvsF2i
<<<<<<< HEAD
<<<<<<< HEAD
        return new self;
=======
        return new self();
>>>>>>> laraxot/dev
=======
        return new self();
>>>>>>> 8d801bbe (Check & fix styling)
=======
        return new self;
>>>>>>> .merge_file_2SKuc9
    }
}
