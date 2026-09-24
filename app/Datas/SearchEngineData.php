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
<<<<<<< .merge_file_Ppji9t
=======
<<<<<<< HEAD
>>>>>>> .merge_file_VDB489
     * @param  string  $driver  Driver del motore di ricerca (algolia, meilisearch, ecc.)
     * @param  string  $algolia_app_id  Algolia App ID
     * @param  string  $algolia_secret  Chiave segreta Algolia
     * @param  string  $meili_host  Host MeiliSearch
     * @param  string  $meili_key  Chiave MeiliSearch
     * @param  bool  $enable_local  Abilita la ricerca locale
     * @param  array<int, class-string>  $searchable  Modelli cercabili
<<<<<<< .merge_file_Ppji9t
=======
=======
     * @param string                   $driver         Driver del motore di ricerca (algolia, meilisearch, ecc.)
     * @param string                   $algolia_app_id Algolia App ID
     * @param string                   $algolia_secret Chiave segreta Algolia
     * @param string                   $meili_host     Host MeiliSearch
     * @param string                   $meili_key      Chiave MeiliSearch
     * @param bool                     $enable_local   Abilita la ricerca locale
     * @param array<int, class-string> $searchable     Modelli cercabili
>>>>>>> laraxot/dev
>>>>>>> .merge_file_VDB489
     */
    public function __construct(
        public readonly string $driver = 'local',
        public readonly string $algolia_app_id = '',
        public readonly string $algolia_secret = '',
        public readonly string $meili_host = 'http://localhost:7700',
        public readonly string $meili_key = '',
        public readonly bool $enable_local = true,
        public readonly array $searchable = [],
<<<<<<< .merge_file_Ppji9t
    ) {}
=======
<<<<<<< HEAD
    ) {}
=======
    ) {
    }
>>>>>>> laraxot/dev
>>>>>>> .merge_file_VDB489

    /**
     * Create a new instance of SearchEngineData with default values.
     */
    public static function make(): self
    {
<<<<<<< .merge_file_Ppji9t
        return new self;
=======
<<<<<<< HEAD
        return new self;
=======
        return new self();
>>>>>>> laraxot/dev
>>>>>>> .merge_file_VDB489
    }
}
