<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Model\Store;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
<<<<<<< HEAD
use Modules\Xot\Actions\Model\CreateMorphToOneRelatedModelAction;
use Modules\Xot\Datas\RelationData as RelationDTO;
=======
use Modules\Xot\Datas\RelationData as RelationDTO;
use Modules\Xot\Support\MorphToOneRelationSupport;
>>>>>>> 930f8146 (Check & fix styling)
use Spatie\QueueableAction\QueueableAction;

class MorphToOneAction
{
    use QueueableAction;

    public function execute(Model $_model, RelationDTO $relationDTO): void
    {
        // if ($relationDTO === null) {
        //    return;
        // }

        $rows = $relationDTO->rows;

        if (! isset($relationDTO->data['lang'])) {
            $relationDTO->data['lang'] = App::getLocale();
        }

<<<<<<< HEAD
        app(CreateMorphToOneRelatedModelAction::class)->execute($rows, $relationDTO->data);
=======
        MorphToOneRelationSupport::create($rows, $relationDTO->data);
>>>>>>> 930f8146 (Check & fix styling)

        // }
        // } else {
        //    $rows->sync($relation->data);
        // }
        /*
         * dddx([
         * 'message' => 'wip',
         * 'row' => $row,
         * 'relation' => $relation,
         * 'relation_rows' => $relation->rows->exists(),
         * 't' => $row->{$relation->name},
         * ]);
         *
         * dddx('wip');
         */
    }
}
