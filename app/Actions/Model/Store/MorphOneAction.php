<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Model\Store;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Modules\Xot\Datas\RelationData as RelationDTO;
<<<<<<< .merge_file_GLoqEH
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> .merge_file_a2RYM4
use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;

use function Safe\json_decode;

<<<<<<< .merge_file_GLoqEH
=======
=======
>>>>>>> 8d801bbe (Check & fix styling)

use function Safe\json_decode;

use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;

<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 8d801bbe (Check & fix styling)
=======
>>>>>>> .merge_file_a2RYM4
class MorphOneAction
{
    use QueueableAction;

    public function execute(Model $_model, RelationDTO $relationDTO): void
    {
        Assert::isInstanceOf($rows = $relationDTO->rows, MorphOne::class);
        // if (is_string($relation->data) && isJson($relation->data)) {
        //    $relation->data = json_decode($relation->data, true);
        // }

        if ($rows->exists()) {
            $rows->update($relationDTO->data);
        } else {
            $rows->create($relationDTO->data);
        }
    }
}
