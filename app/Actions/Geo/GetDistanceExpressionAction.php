<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Geo;

<<<<<<< HEAD
=======
use Illuminate\Contracts\Database\Query\Expression;
use Illuminate\Support\Facades\DB;
>>>>>>> origin/dev
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
     * @param float       $latitude  Latitudine del punto di riferimento
     * @param float       $longitude Longitudine del punto di riferimento
     * @param string|null $alias     Alias per l'espressione (opzionale)
     *
<<<<<<< HEAD
     * @return string Espressione SQL per il calcolo della distanza
=======
     * @return Expression Espressione SQL per il calcolo della distanza
>>>>>>> origin/dev
     */
    public function execute(
        float $latitude,
        float $longitude,
        ?string $alias = null,
<<<<<<< HEAD
    ): string {
=======
    ): Expression {
>>>>>>> origin/dev
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

<<<<<<< HEAD
        return trim($sql);
=======
        return DB::raw($sql);
>>>>>>> origin/dev
    }
}
