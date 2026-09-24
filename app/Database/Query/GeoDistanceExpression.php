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
<<<<<<< HEAD
<<<<<<< HEAD
    ) {
    }
=======
    ) {}
>>>>>>> laraxot/dev
=======
    ) {
    }
>>>>>>> laraxot/dev

    public function getValue(Grammar $grammar): string
    {
        $sql = sprintf(
            '(6371 * acos(cos(radians(%F)) * cos(radians(latitude)) * cos(radians(longitude) - radians(%F)) + sin(radians(%F)) * sin(radians(latitude))))',
            $this->latitude,
            $this->longitude,
            $this->latitude,
        );

<<<<<<< HEAD
<<<<<<< HEAD
        if (null !== $this->alias) {
=======
        if ($this->alias !== null) {
>>>>>>> laraxot/dev
=======
        if (null !== $this->alias) {
>>>>>>> laraxot/dev
            $sql .= ' AS '.$this->alias;
        }

        return $sql;
    }
}
