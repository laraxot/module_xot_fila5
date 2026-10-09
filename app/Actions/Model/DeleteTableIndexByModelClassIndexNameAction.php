<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Model;

use Illuminate\Database\Eloquent\Model as EloquentModel;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;

class DeleteTableIndexByModelClassIndexNameAction
{
    use QueueableAction;

    /**
     * Elimina l'indice indicato dalla tabella del model, sulla connessione del model.
     *
     * Passa dal Schema builder di Laravel: il getDoctrineSchemaManager() non e' piu' esposto
     * dalla connessione e Doctrine non quota gli identificatori in dropIndex().
     */
    public function execute(string $modelClass, string $indexName): void
    {
        Assert::isInstanceOf($model = app($modelClass), EloquentModel::class);
        $table = $model->getTable();
        Assert::stringNotEmpty($table);
        Assert::stringNotEmpty($indexName);
<<<<<<< .merge_file_QOF8ym
<<<<<<< .merge_file_VjJecc
        $formManager = app(GetSchemaManagerByModelClassAction::class)->execute($modelClass);
        $doctrineTable = $formManager->introspectTableByUnquotedName($table);
        // $doctrineTable=$formManager->listTableDetails($table);
        // DBAL 4.5: Table::dropIndex() e' deprecato, si passa da edit()/TableEditor.
        // Come prima, la modifica resta sul Table introspezionato: nessun ALTER TABLE.
        $doctrineTable->edit()->dropIndexByUnquotedName($indexName)->create();
=======
>>>>>>> .merge_file_HwmXyS
=======
>>>>>>> .merge_file_iu157y

        Schema::connection($model->getConnectionName())->table(
            $table,
            static function (Blueprint $blueprint) use ($indexName): void {
                $blueprint->dropIndex($indexName);
            },
        );
    }
}
