<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Model;

use Illuminate\Database\Eloquent\Model;
use Spatie\QueueableAction\QueueableAction;

class GetSicureArrayByModelAction
{
    use QueueableAction;

    /**
     * @return array<string, mixed>
     */
    public function execute(Model $model): array
    {
        // Use getAttributes() directly to avoid potential exceptions from attributesToArray()
        /** @var array<string, mixed> $res */
        $res = $model->getAttributes();

        return $res;
    }
}
