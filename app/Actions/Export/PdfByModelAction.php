<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Export;

<<<<<<< HEAD
=======
// use Modules\Xot\Services\ArrayService;
>>>>>>> laraxot/dev
use Illuminate\Database\Eloquent\Model;
use Modules\Xot\Actions\Trans\GetTransKeyByModelClassAction;
use Modules\Xot\Actions\View\GetViewByModelClassAction;
use Spatie\QueueableAction\QueueableAction;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
<<<<<<< HEAD
use Modules\Xot\Actions\View\GetViewByModelClassAction;
use Modules\Xot\Actions\Trans\GetTransKeyByModelClassAction;
=======
>>>>>>> laraxot/dev

class PdfByModelAction
{
    use QueueableAction;

    public function execute(
        Model $model,
        string $filename = 'my_doc.pdf',
        string $disk = 'cache',
        string $out = 'download',
    ): string|BinaryFileResponse {
<<<<<<< .merge_file_yAB3gL
=======
<<<<<<< HEAD
        /**
         * @var non-falsy-string&view-string
         */
        $view_name = app(GetViewByModelClassAction::class)->execute($model::class,'.show.pdf');

        
        $view_params = [
            'view' => $view_name,
            'row' => $model,
            'transKey' => app(GetTransKeyByModelClassAction::class)->execute($model::class,'.fields'),
=======
        $model_class = $model::class;
        $model_name = class_basename($model_class);
        $model_name_low = mb_strtolower($model_name);
        $module = Str::between($model_class, 'Modules\\', '\Models');
        $module_low = mb_strtolower($module);
>>>>>>> .merge_file_rT0iJx
        /**
         * @var non-falsy-string&view-string
         */
        $view_name = app(GetViewByModelClassAction::class)->execute($model::class, '.show.pdf');

        $view_params = [
            'view' => $view_name,
            'row' => $model,
<<<<<<< .merge_file_yAB3gL
            'transKey' => app(GetTransKeyByModelClassAction::class)->execute($model::class, '.fields'),
=======
            'transKey' => $module_low.'::'.Str::plural($model_name_low).'.fields',
>>>>>>> laraxot/dev
>>>>>>> .merge_file_rT0iJx
        ];

        $view = view($view_name, $view_params);

        $html = $view->render();

        return app(PdfByHtmlAction::class)->execute($html, $filename, $disk, $out);
    }
}
