<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Model;

use Illuminate\Database\Eloquent\Model as EloquentModel;
use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;

class DeleteTableIndexByModelClassIndexNameAction
{
    use QueueableAction;

    public function execute(string $modelClass, string $indexName): void
    {
        Assert::isInstanceOf($model = app($modelClass), EloquentModel::class);
<<<<<<< HEAD
=======
        Assert::stringNotEmpty($indexName);
>>>>>>> laraxot/dev
        $table = $model->getTable();
        Assert::stringNotEmpty($table);
        $formManager = app(GetSchemaManagerByModelClassAction::class)->execute($modelClass);
        $doctrineTable = $formManager->introspectTableByUnquotedName($table);
        // $doctrineTable=$formManager->listTableDetails($table);
<<<<<<< HEAD
        $doctrineTable->dropIndex($indexName);
=======
        $doctrineTable->edit()->dropIndexByUnquotedName($indexName);
>>>>>>> laraxot/dev

        // ALTER TABLE `roles` DROP INDEX `roles_name_guard_name_unique`;
        // dddx(['res'=>$res,'doctrineTable'=>$doctrineTable,'indexName'=>$indexName]);
    }
}
