<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Filament;

use Filament\Facades\Filament;
use Illuminate\Database\Eloquent\Model;
<<<<<<< HEAD
use LogicException;
<<<<<<< .merge_file_mcHag9
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_SJi0u7
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
use LogicException;
=======
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
>>>>>>> .merge_file_B170dV
=======
<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_GI13qr
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
use Modules\Xot\Filament\Resources\XotBaseResource;
use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;

/**
 * Risolve la Resource canonica registrata nel pannello corrente per un model.
 *
 * Perché: `XotBaseResource::getFormClass()` e `getTableClass()` compongono i FQCN
 * `{Resource}\Schemas\{Model}Form` e `{Resource}\Tables\{Plural}Table`. Quando la
 * Resource su cui gira `static::` non ospita quelle classi (tipico dei moduli che
 * estendono una `Base{Model}Resource` di un altro modulo), il fallback deve partire
 * dalla Resource canonica del model, non da `static::class`.
 *
 * Consumer: `Modules\Xot\Filament\Resources\XotBaseResource`.
 */
class GetResourceClassNameByModelClassAction
{
    use QueueableAction;

    /**
<<<<<<< HEAD
<<<<<<< .merge_file_mcHag9
<<<<<<< HEAD
     * @param  class-string<Model>  $modelClass
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_SJi0u7
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
     * @param  class-string<Model>  $modelClass
=======
     * @param class-string<Model> $modelClass
     *
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
     * @param class-string<Model> $modelClass
     *
>>>>>>> .merge_file_B170dV
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
     * @param class-string<Model> $modelClass
     *
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
     * @param  class-string<Model>  $modelClass
>>>>>>> .merge_file_GI13qr
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
     * @return class-string<XotBaseResource>
     */
    public function execute(string $modelClass): string
    {
        Assert::subclassOf($modelClass, Model::class);

        $resourceClass = Filament::getModelResource($modelClass);

<<<<<<< HEAD
<<<<<<< .merge_file_mcHag9
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
<<<<<<< HEAD
>>>>>>> da9ae01a0 (.)
<<<<<<< .merge_file_SJi0u7
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_GI13qr
        if ($resourceClass === null) {
            throw new LogicException(
                sprintf(
                    '[%s] Nessuna Filament Resource registrata nel pannello corrente per il model [%s].',
                    class_basename($this),
                    $modelClass
                )
            );
<<<<<<< .merge_file_mcHag9
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
        if (null === $resourceClass) {
            throw new \LogicException(sprintf('[%s] Nessuna Filament Resource registrata nel pannello corrente per il model [%s].', class_basename($this), $modelClass));
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
        if (null === $resourceClass) {
            throw new \LogicException(sprintf('[%s] Nessuna Filament Resource registrata nel pannello corrente per il model [%s].', class_basename($this), $modelClass));
>>>>>>> .merge_file_B170dV
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_GI13qr
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
        }

        Assert::subclassOf($resourceClass, XotBaseResource::class);

        return $resourceClass;
    }
}
