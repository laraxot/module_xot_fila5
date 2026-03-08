<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Model\Store;

use Illuminate\Database\Eloquent\Model;
use Modules\Xot\Datas\RelationData as RelationDTO;
use Spatie\QueueableAction\QueueableAction;

class PivotAction
{
    use QueueableAction;

    public function execute(Model $_model, RelationDTO $_relationDTO): void
    {
        // Assert::isInstanceOf($rows = $relationDTO->rows, MorphToOne::class);
        dddx('wip');

        /*
         *
         * $parent_panel = // @var mixed panel->getParent(;
         * if (null !== $parent_panel) {
         * $parent_row = $parent_panel->getRow();
         * $panel_name = // @var mixed panel->getName(;
         * $parent_row->{$panel_name}()->updateExistingPivot($model->getKey(), $data);
         * }
         *
         *
         */
    }
}
