<?php

declare(strict_types=1);

namespace Tests\Modules\Xot\Fixtures\Models;

use Modules\Xot\Models\BaseMorphPivot;

class TestConcreteMorphPivot extends BaseMorphPivot
{
    protected $table = 'test_morph_pivots';
}
