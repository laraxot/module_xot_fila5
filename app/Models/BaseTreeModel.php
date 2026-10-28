<?php

declare(strict_types=1);

namespace Modules\Xot\Models;

use Modules\Xot\Contracts\HasRecursiveRelationshipsContract;
use Modules\Xot\Models\Traits\TypedHasRecursiveRelationships;

/**
 * @template TModel of BaseTreeModel
 * @implements HasRecursiveRelationshipsContract<TModel>
 */
abstract class BaseTreeModel extends BaseModel implements HasRecursiveRelationshipsContract
{
    use TypedHasRecursiveRelationships;
}
