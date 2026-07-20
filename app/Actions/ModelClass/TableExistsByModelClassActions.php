<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\ModelClass;

use Spatie\QueueableAction\QueueableAction;

use Illuminate\Database\Eloquent\Model as EloquentModel;
use Illuminate\Support\Facades\Schema;
use Webmozart\Assert\Assert;

class TableExistsByModelClassActions
{
    use QueueableAction;

    public function execute(string $modelClass): bool
    {
        if (! class_exists($modelClass)) {
            return false;
        }

        Assert::isInstanceOf($model = app($modelClass), EloquentModel::class);

        // Controlla se il modello utilizza Sushi
        if (in_array('Sushi\Sushi', class_uses_recursive($modelClass), strict: true) || method_exists($model, 'sushiRows')) {
            return true; // I modelli Sushi sono considerati come se avessero sempre una tabella
        }

        $tableName = $model->getTable();

        return Schema::connection($model->getConnectionName())->hasTable($tableName);
    }
}
