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
        $table = $model->getTable();
        Assert::stringNotEmpty($table);
        Assert::stringNotEmpty($indexName);
        $formManager = app(GetSchemaManagerByModelClassAction::class)->execute($modelClass);
        $doctrineTable = $formManager->introspectTableByUnquotedName($table);
        // $doctrineTable=$formManager->listTableDetails($table);
        // DBAL 4.5: Table::dropIndex() e' deprecato, si passa da edit()/TableEditor.
        // Come prima, la modifica resta sul Table introspezionato: nessun ALTER TABLE.
        $doctrineTable->edit()->dropIndexByUnquotedName($indexName)->create();

        // ALTER TABLE `roles` DROP INDEX `roles_name_guard_name_unique`;
        // dddx(['res'=>$res,'doctrineTable'=>$doctrineTable,'indexName'=>$indexName]);
    }
}
