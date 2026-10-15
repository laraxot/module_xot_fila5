<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Fixtures\Stubs;

use Illuminate\Database\Eloquent\Relations\MorphPivot;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Modules\Xot\Models\Cache as CacheModel;

<<<<<<< HEAD
=======
// RelationX arriva già da XotBaseModel via CacheModel: ridichiararla qui fa collidere
// il generic $this del metodo ereditato con quello della classe che lo ridichiara.
>>>>>>> laraxot/dev
final class XotCovRelationHost extends CacheModel
{
    public $timestamps = false;

<<<<<<< HEAD
    public $exists = false;

=======
>>>>>>> laraxot/dev
    public function guessPivot(string $related, ?string $class = null): Pivot
    {
        return new XotCovPivot;
    }

<<<<<<< HEAD
    public function guessPivotFullClass(string $pivot_name, string $related, ?string $class = null): string
    {
        return XotCovPivot::class;
    }

=======
>>>>>>> laraxot/dev
    public function guessMorphPivot(string $related, ?string $_class = null): MorphPivot
    {
        return new XotCovMorphPivot;
    }
<<<<<<< HEAD

    public function forceFill(array $attributes = []): static
    {
        return $this;
    }
=======
>>>>>>> laraxot/dev
}
