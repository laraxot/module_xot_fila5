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
<<<<<<< .merge_file_Gq8VW4
        return new XotCovPivot;
=======
<<<<<<< HEAD
        return new XotCovPivot;
=======
<<<<<<< .merge_file_geJ3BZ
<<<<<<< HEAD
        return new XotCovPivot;
=======
        return new XotCovPivot();
>>>>>>> laraxot/dev
=======
        return new XotCovPivot();
>>>>>>> .merge_file_4jrGYJ
>>>>>>> laraxot/dev
>>>>>>> .merge_file_QNtMNp
    }

    public function guessMorphPivot(string $related, ?string $_class = null): MorphPivot
    {
<<<<<<< .merge_file_Gq8VW4
        return new XotCovMorphPivot;
=======
<<<<<<< HEAD
        return new XotCovMorphPivot;
=======
<<<<<<< .merge_file_geJ3BZ
<<<<<<< HEAD
        return new XotCovMorphPivot;
=======
        return new XotCovMorphPivot();
>>>>>>> laraxot/dev
=======
        return new XotCovMorphPivot();
>>>>>>> .merge_file_4jrGYJ
>>>>>>> laraxot/dev
>>>>>>> .merge_file_QNtMNp
    }
}
