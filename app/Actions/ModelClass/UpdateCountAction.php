<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\ModelClass;

use Illuminate\Database\Eloquent\Model;
<<<<<<< HEAD
use Illuminate\Support\Facades\DB;
use Modules\Xot\Models\InformationSchemaTable;
use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;
=======
use Modules\Xot\Models\InformationSchemaTable;
use Spatie\QueueableAction\QueueableAction;
>>>>>>> c7fd73eb (.)

/**
 * Counts records for a given model class using optimized table information.
 */
class UpdateCountAction
{
    use QueueableAction;

    /**
     * Execute the count action for the given model class.
     *
     * @param class-string<Model> $modelClass The fully qualified model class name
<<<<<<< HEAD
     *
=======
>>>>>>> c7fd73eb (.)
     */
    public function execute(string $modelClass, int $total): void
    {
        InformationSchemaTable::updateModelCount($modelClass, $total); // Method not implemented
    }
}
