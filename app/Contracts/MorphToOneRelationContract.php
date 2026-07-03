<?php

declare(strict_types=1);

namespace Modules\Xot\Contracts;

use Fidum\EloquentMorphToOne\MorphToOne;
use Illuminate\Database\Eloquent\Model;

/**
 * Contract for relations that expose MorphToOne-style create().
 *
 * @see MorphToOne when the optional package is installed
 */
interface MorphToOneRelationContract
{
    /**
     * @param  array<string, mixed>  $attributes
     */
    public function create(array $attributes): Model;
}
