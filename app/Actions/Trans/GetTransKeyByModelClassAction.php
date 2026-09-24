<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Trans;

use Illuminate\Support\Str;
use Modules\Xot\Actions\Module\GetModuleNameByModelClassAction;
use Spatie\QueueableAction\QueueableAction;

class GetTransKeyByModelClassAction
{
    use QueueableAction;

    /**
     * ---.
     */
    public function execute(string $model_class, string $suffix): string
    {
        $module = app(GetModuleNameByModelClassAction::class)->execute($model_class);
        $module_low = Str::of($module)->lower()->toString();
        $model_name = class_basename($model_class);
        $model_name = Str::of($model_name)->snake()->toString();

<<<<<<< .merge_file_G9m5v9
<<<<<<< HEAD
=======
<<<<<<< .merge_file_h37USo
=======
<<<<<<< HEAD
>>>>>>> .merge_file_YXunaF
>>>>>>> .merge_file_ywNvDV
        $view=$module_low.'::'.$model_name.$suffix;
        //str_plural ?
        
        
<<<<<<< .merge_file_G9m5v9
=======
<<<<<<< .merge_file_h37USo
=======
>>>>>>> .merge_file_ywNvDV
=======
        $view = $module_low.'::'.$model_name.$suffix;
        // str_plural ?

>>>>>>> laraxot/dev
<<<<<<< .merge_file_G9m5v9
=======
>>>>>>> .merge_file_YXunaF
>>>>>>> .merge_file_ywNvDV
        return $view;
    }
}
