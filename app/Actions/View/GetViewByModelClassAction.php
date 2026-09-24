<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\View;

use Illuminate\Support\Str;
use Modules\Xot\Actions\Module\GetModuleNameByModelClassAction;
use Spatie\QueueableAction\QueueableAction;

class GetViewByModelClassAction
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

<<<<<<< .merge_file_G2pbzG
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> .merge_file_lPBCZY
        $view=$module_low.'::'.$model_name.$suffix;
        
        if(!view()->exists($view)){
            throw new \Exception('view ['.$view.'] not Exists');
        }
        
        return $view;
=======
        return $module_low.'::'.$model_name.$suffix;
>>>>>>> 3792da0d (Check & fix styling)
    }
}
