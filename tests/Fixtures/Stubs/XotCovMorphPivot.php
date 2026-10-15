<?php

declare(strict_types=1);

namespace Tests\Modules\Xot\Fixtures\Stubs;

use Illuminate\Database\Eloquent\Relations\MorphPivot;

final class XotCovMorphPivot extends MorphPivot
{
    protected $table = 'cache_morph';

    protected $fillable = ['cache_id', 'related_id', 'related_type'];
}
