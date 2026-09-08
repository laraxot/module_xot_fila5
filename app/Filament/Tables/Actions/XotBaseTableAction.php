<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Tables\Actions;

use Filament\Actions\Action;
<<<<<<< HEAD
use Closure;
=======
>>>>>>> c7fd73eb (.)
use Illuminate\Database\Eloquent\Model;

/**
 * @property ?Model $record
<<<<<<< HEAD
=======
 *
>>>>>>> c7fd73eb (.)
 * @method ?Model getRecord()
 */
abstract class XotBaseTableAction extends Action
{
<<<<<<< HEAD
    /**
     * @return Model|null
     */
    public function getRecord(bool $withDefault = true): null|Model
    {
        if ($this->record instanceof Closure) {
=======
    public function getRecord(bool $withDefault = true): ?Model
    {
        if ($this->record instanceof \Closure) {
>>>>>>> c7fd73eb (.)
            return null;
        }

        return $this->record;
    }
}
