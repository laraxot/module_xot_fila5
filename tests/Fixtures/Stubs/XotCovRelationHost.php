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
<<<<<<< .merge_file_WiR6be
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_geJ3BZ
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
        return new XotCovPivot;
=======
        return new XotCovPivot();
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
        return new XotCovPivot();
>>>>>>> .merge_file_4jrGYJ
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
        return new XotCovPivot();
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_KTKH4o
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
    }

    public function guessMorphPivot(string $related, ?string $_class = null): MorphPivot
    {
<<<<<<< HEAD
<<<<<<< .merge_file_WiR6be
<<<<<<< HEAD
        return new XotCovMorphPivot;
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_geJ3BZ
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
        return new XotCovMorphPivot;
=======
        return new XotCovMorphPivot();
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
        return new XotCovMorphPivot();
>>>>>>> .merge_file_4jrGYJ
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
        return new XotCovMorphPivot();
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
        return new XotCovMorphPivot;
>>>>>>> .merge_file_KTKH4o
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
    }
}
