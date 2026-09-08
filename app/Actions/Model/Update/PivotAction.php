<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Model\Update;

use Illuminate\Database\Eloquent\Model;
<<<<<<< HEAD
use Illuminate\Database\Eloquent\Relations\Pivot;
use Modules\Xot\Datas\RelationData as RelationDTO;
use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;
=======
use Modules\Xot\Datas\RelationData as RelationDTO;
use Spatie\QueueableAction\QueueableAction;
>>>>>>> c7fd73eb (.)

class PivotAction
{
    use QueueableAction;

    /**
     * Undocumented function.
     */
    public function execute(Model $_model, RelationDTO $relationDTO): void
    {
<<<<<<< HEAD
        Assert::isInstanceOf($rows = $relationDTO->rows, Pivot::class);
=======
        $rows = $relationDTO->rows;
        // $rows is already typed as Relation in RelationDTO
>>>>>>> c7fd73eb (.)
        dddx('wip');

        /*
         *
         * $parent_panel = $this->panel->getParent();
         * if (null !== $parent_panel) {
         * $parent_row = $parent_panel->getRow();
         * $panel_name = $this->panel->getName();
         * $parent_row->{$panel_name}()->updateExistingPivot($model->getKey(), $data);
         * }
         *
         *
         */
    }
}
