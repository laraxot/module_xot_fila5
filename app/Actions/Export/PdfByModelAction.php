<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Export;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Spatie\QueueableAction\QueueableAction;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
<<<<<<< HEAD
<<<<<<< HEAD
use Modules\Xot\Actions\View\GetViewByModelClassAction;
use Modules\Xot\Actions\Trans\GetTransKeyByModelClassAction;
=======
>>>>>>> laraxot/dev
=======
use Modules\Xot\Actions\View\GetViewByModelClassAction;
use Modules\Xot\Actions\Trans\GetTransKeyByModelClassAction;
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
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
        /**
         * @var non-falsy-string&view-string
         */
        $view_name = app(GetViewByModelClassAction::class)->execute($model::class,'.show.pdf');

        
        $view_params = [
            'view' => $view_name,
            'row' => $model,
            'transKey' => app(GetTransKeyByModelClassAction::class)->execute($model::class,'.fields'),
<<<<<<< HEAD
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

        $view_params = [
            'view' => $view_name,
            'row' => $model,
            'transKey' => $module_low.'::'.Str::plural($model_name_low).'.fields',
>>>>>>> laraxot/dev
=======
>>>>>>> laraxot/dev
        ];

        $view = view($view_name, $view_params);

        $html = $view->render();

        return app(PdfByHtmlAction::class)->execute($html, $filename, $disk, $out);
    }
}
