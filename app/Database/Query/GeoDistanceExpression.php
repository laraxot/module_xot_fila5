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
<<<<<<< .merge_file_hl4iES
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
>>>>>>> .merge_file_ceck8P

    public function getValue(Grammar $grammar): string
    {
        $sql = sprintf(
            '(6371 * acos(cos(radians(%F)) * cos(radians(latitude)) * cos(radians(longitude) - radians(%F)) + sin(radians(%F)) * sin(radians(latitude))))',
            $this->latitude,
            $this->longitude,
            $this->latitude,
        );

<<<<<<< .merge_file_hl4iES
<<<<<<< HEAD
<<<<<<< HEAD
        if ($this->alias !== null) {
=======
        if (null !== $this->alias) {
>>>>>>> laraxot/dev
=======
        if (null !== $this->alias) {
>>>>>>> 3792da0d (Check & fix styling)
=======
        if ($this->alias !== null) {
>>>>>>> .merge_file_ceck8P
            $sql .= ' AS '.$this->alias;
        }

        return $sql;
    }
}
