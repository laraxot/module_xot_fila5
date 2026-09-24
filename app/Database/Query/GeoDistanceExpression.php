<?php

declare(strict_types=1);

namespace Modules\Xot\Database\Query;

use Illuminate\Contracts\Database\Query\Expression;
use Illuminate\Database\Grammar;

final class GeoDistanceExpression implements Expression
{
    public function __construct(
        private readonly float $latitude,
        private readonly float $longitude,
        private readonly ?string $alias = null,
<<<<<<< .merge_file_qXGxX1
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
>>>>>>> .merge_file_y6vMjA

    public function getValue(Grammar $grammar): string
    {
        $sql = sprintf(
            '(6371 * acos(cos(radians(%F)) * cos(radians(latitude)) * cos(radians(longitude) - radians(%F)) + sin(radians(%F)) * sin(radians(latitude))))',
            $this->latitude,
            $this->longitude,
            $this->latitude,
        );

<<<<<<< .merge_file_qXGxX1
<<<<<<< HEAD
<<<<<<< HEAD
        if ($this->alias !== null) {
=======
        if (null !== $this->alias) {
>>>>>>> laraxot/dev
=======
        if (null !== $this->alias) {
>>>>>>> 8d801bbe (Check & fix styling)
=======
        if ($this->alias !== null) {
>>>>>>> .merge_file_y6vMjA
            $sql .= ' AS '.$this->alias;
        }

        return $sql;
    }
}
