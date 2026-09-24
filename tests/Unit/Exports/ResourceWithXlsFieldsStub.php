<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Unit\Exports;

/**
 * Resource fake: espone il contratto `getXlsFields()` con formato misto
 * (chiave intera => percorso, chiave stringa => percorso con label esplicita).
 */
class ResourceWithXlsFieldsStub
{
    /**
     * <<<<<<< .merge_file_JCJjsQ.
     *
     * @param array<array-key, mixed> $data
     *                                      =======
     *                                      <<<<<<< .merge_file_ARVwq6.
     * @param array<array-key, mixed> $data
     *                                      =======
     *                                      <<<<<<< HEAD
     * @param array<array-key, mixed> $data
     *                                      =======
     * @param array<array-key, mixed> $data
     *
     * >>>>>>> laraxot/dev
     *
     * >>>>>>> .merge_file_VDF7Hc
     *
     * >>>>>>> .merge_file_kG4HSa
     *
     * @return array<int|string, string>
     */
    public static function getXlsFields(array $data): array
    {
        return [
            'id',
            'matr',
            'ratings_by_id.52.pivot.value' => 'Obiettivo A',
        ];
    }
}
