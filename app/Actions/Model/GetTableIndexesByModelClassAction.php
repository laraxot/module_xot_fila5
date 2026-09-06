<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Model;

use Doctrine\DBAL\Schema\Index;
use Illuminate\Database\Eloquent\Model;
use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;

class GetTableIndexesByModelClassAction
{
    use QueueableAction;

    /**
     * @return array<Index>
     */
    public function execute(string $modelClass): array
    {
        Assert::isInstanceOf($model = app($modelClass), Model::class);
        $table = $model->getTable();
<<<<<<< HEAD
        Assert::stringNotEmpty($table);
        $formManager = app(GetSchemaManagerByModelClassAction::class)->execute($modelClass);

        return $formManager->introspectTableIndexesByUnquotedName($table);
=======
        $formManager = app(GetSchemaManagerByModelClassAction::class)->execute($modelClass);

        return $formManager->listTableIndexes($table);
>>>>>>> 7f6cf6be (.)
    }
}
