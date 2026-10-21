<?php

declare(strict_types=1);

namespace Modules\Xot\Models;

use Modules\Xot\Contracts\HasRecursiveRelationshipsContract;
use Modules\Xot\Models\Traits\TypedHasRecursiveRelationships;

abstract class XotBaseTreeModel extends XotBaseModel implements HasRecursiveRelationshipsContract
{
    use TypedHasRecursiveRelationships;
}
