<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Export;

<<<<<<< .merge_file_P6VgWm
<<<<<<< HEAD
<<<<<<< HEAD
=======
// use Modules\Xot\Services\ArrayService;
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_xWO5kF
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Spatie\QueueableAction\QueueableAction;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
<<<<<<< HEAD
use Modules\Xot\Actions\View\GetViewByModelClassAction;
use Modules\Xot\Actions\Trans\GetTransKeyByModelClassAction;
<<<<<<< .merge_file_P6VgWm
=======
// use Modules\Xot\Services\ArrayService;
use Illuminate\Database\Eloquent\Model;
<<<<<<< HEAD
use Modules\Xot\Actions\Trans\GetTransKeyByModelClassAction;
use Modules\Xot\Actions\View\GetViewByModelClassAction;
=======
use Illuminate\Support\Str;
>>>>>>> 930f8146 (Check & fix styling)
use Spatie\QueueableAction\QueueableAction;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_xWO5kF

class PdfByModelAction
{
    use QueueableAction;

    public function execute(
        Model $model,
        string $filename = 'my_doc.pdf',
        string $disk = 'cache',
        string $out = 'download',
    ): string|BinaryFileResponse {
<<<<<<< HEAD
        /**
         * @var non-falsy-string&view-string
         */
        $view_name = app(GetViewByModelClassAction::class)->execute($model::class,'.show.pdf');

        
        $view_params = [
            'view' => $view_name,
            'row' => $model,
            'transKey' => app(GetTransKeyByModelClassAction::class)->execute($model::class,'.fields'),
<<<<<<< .merge_file_P6VgWm
=======
        $view_name = app(GetViewByModelClassAction::class)->execute($model::class, '.show.pdf');
=======
        $model_class = $model::class;
        $model_name = class_basename($model_class);
        $model_name_low = mb_strtolower($model_name);
        $module = Str::between($model_class, 'Modules\\', '\Models');
        $module_low = mb_strtolower($module);
        /**
         * @var non-falsy-string&view-string
         */
        $view_name = $module_low.'::'.Str::kebab($model_name).'.show.pdf';
<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)

        $view_params = [
            'view' => $view_name,
            'row' => $model,
<<<<<<< HEAD
            'transKey' => app(GetTransKeyByModelClassAction::class)->execute($model::class, '.fields'),
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
            'transKey' => $module_low.'::'.Str::plural($model_name_low).'.fields',
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_xWO5kF
=======
=======
            'transKey' => $module_low.'::'.Str::plural($model_name_low).'.fields',
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
        ];

        $view = view($view_name, $view_params);

        $html = $view->render();

        return app(PdfByHtmlAction::class)->execute($html, $filename, $disk, $out);
    }
}
