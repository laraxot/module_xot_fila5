<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Fixtures\Stubs;

use Illuminate\Database\Eloquent\Relations\MorphPivot;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Modules\Xot\Models\Cache as CacheModel;

// RelationX arriva già da XotBaseModel via CacheModel: ridichiararla qui fa collidere
// il generic $this del metodo ereditato con quello della classe che lo ridichiara.
final class XotCovRelationHost extends CacheModel
{
    public $timestamps = false;

    public function guessPivot(string $related, ?string $class = null): Pivot
    {
<<<<<<< HEAD
        return new XotCovPivot;
=======
        return new XotCovPivot();
>>>>>>> 7f6cf6be (.)
    }

    public function guessMorphPivot(string $related, ?string $_class = null): MorphPivot
    {
<<<<<<< HEAD
        return new XotCovMorphPivot;
=======
        return new XotCovMorphPivot();
>>>>>>> 7f6cf6be (.)
    }
}
