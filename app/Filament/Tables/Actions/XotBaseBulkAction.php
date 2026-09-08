<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Tables\Actions;

<<<<<<< HEAD
use Filament\Actions\BulkAction;
=======
use Filament\Actions\BulkAction as FilamentBulkAction;
>>>>>>> c7fd73eb (.)
use Illuminate\Database\Eloquent\Model;

/**
 * @property ?Model $record
 *
 * @method ?Model getRecord()
 */
<<<<<<< HEAD
abstract class XotBaseBulkAction extends BulkAction
{
=======
abstract class XotBaseBulkAction extends FilamentBulkAction
{
    /**
     * Nome di default dell'action.
     *
     * Questo nome viene utilizzato come chiave nell'array delle actions
     * e per la generazione automatica delle traduzioni tramite LangServiceProvider.
     */
    public static function getDefaultName(): ?string
    {
        return class_basename(static::class);
    }
>>>>>>> c7fd73eb (.)
}
