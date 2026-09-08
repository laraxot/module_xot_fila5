<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Geo;

use Illuminate\Contracts\Database\Query\Expression;
<<<<<<< HEAD
use Illuminate\Support\Facades\DB;
=======
use Modules\Xot\Database\Query\GeoDistanceExpression;
>>>>>>> c7fd73eb (.)
use Spatie\QueueableAction\QueueableAction;

/**
 * Action per generare l'espressione SQL per il calcolo della distanza.
 *
 * Questa action centralizza la logica di generazione dell'espressione SQL
 * per il calcolo della distanza tra due punti geografici.
 */
class GetDistanceExpressionAction
{
    use QueueableAction;

    /**
     * Genera l'espressione SQL per calcolare la distanza tra due punti.
     *
<<<<<<< HEAD
     * @param float $latitude Latitudine del punto di riferimento
     * @param float $longitude Longitudine del punto di riferimento
     * @param string|null $alias Alias per l'espressione (opzionale)
=======
     * @param  float  $latitude  Latitudine del punto di riferimento
     * @param  float  $longitude  Longitudine del punto di riferimento
     * @param  string|null  $alias  Alias per l'espressione (opzionale)
>>>>>>> c7fd73eb (.)
     * @return Expression Espressione SQL per il calcolo della distanza
     */
    public function execute(
        float $latitude,
        float $longitude,
<<<<<<< HEAD
        null|string $alias = null,
    ): Expression {
        $sql = "
            (6371 * acos(
                cos(radians({$latitude})) *
                cos(radians(latitude)) *
                cos(radians(longitude) - radians({$longitude})) +
                sin(radians({$latitude})) *
                sin(radians(latitude))
            ))
        ";

        if (null !== $alias) {
            $sql .= " AS {$alias}";
        }

        return DB::raw($sql);
=======
        ?string $alias = null,
    ): Expression {
        return new GeoDistanceExpression($latitude, $longitude, $alias);
>>>>>>> c7fd73eb (.)
    }
}
