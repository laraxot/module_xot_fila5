<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\ModelClass;

use Illuminate\Database\Eloquent\Model;
use Modules\Xot\Models\InformationSchemaTable;
use Spatie\QueueableAction\QueueableAction;

/**
 * Counts records for a given model class using optimized table information.
 */
class UpdateCountAction
{
    use QueueableAction;

    /**
     * Execute the count action for the given model class.
     *
<<<<<<< HEAD
<<<<<<< .merge_file_jVGYZk
<<<<<<< HEAD
     * <<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< .merge_file_1H7f7r
>>>>>>> da9ae01a0 (.)
     *
     * @param class-string<Model> $modelClass The fully qualified model class name
     *                                        =======
     *                                        <<<<<<< .merge_file_1H7f7r
     * @param class-string<Model> $modelClass The fully qualified model class name
     *                                        =======
     *                                        <<<<<<< HEAD
     *                                        <<<<<<< .merge_file_bHhNUl
     * @param class-string<Model> $modelClass The fully qualified model class name
     *                                        =======
     *                                        <<<<<<< .merge_file_7ietVv
     * @param class-string<Model> $modelClass The fully qualified model class name
     *                                        =======
     *                                        <<<<<<< HEAD
     * @param class-string<Model> $modelClass The fully qualified model class name
     *                                        =======
     * @param class-string<Model> $modelClass The fully qualified model class name
     *                                        >>>>>>> laraxot/dev
     *                                        >>>>>>> .merge_file_arlv8Y
     *                                        >>>>>>> .merge_file_P664Zt
     *                                        =======
     * @param class-string<Model> $modelClass The fully qualified model class name
     *                                        >>>>>>> 9e11d472 (Fix merge conflicts in PHPDoc comments across multiple action classes and contracts, ensuring consistent parameter annotations and removing redundant lines.)
<<<<<<< HEAD
     *                                        >>>>>>> .merge_file_NENwf0
     *                                        >>>>>>> laraxot/dev
=======
     * @param class-string<Model> $modelClass The fully qualified model class name
>>>>>>> 3792da0d (Check & fix styling)
=======
     * @param  class-string<Model>  $modelClass  The fully qualified model class name
>>>>>>> .merge_file_ylUci3
=======
>>>>>>> .merge_file_NENwf0
=======
     * @param class-string<Model> $modelClass The fully qualified model class name
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
     */
    public function execute(string $modelClass, int $total): void
    {
        InformationSchemaTable::updateModelCount($modelClass, $total); // Method not implemented
    }
}
