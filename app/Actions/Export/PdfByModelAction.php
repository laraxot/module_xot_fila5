<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Export;

<<<<<<< HEAD
// use Modules\Xot\Services\ArrayService;
=======
>>>>>>> c7fd73eb (.)
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Spatie\QueueableAction\QueueableAction;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class PdfByModelAction
{
    use QueueableAction;

    public function execute(
        Model $model,
        string $filename = 'my_doc.pdf',
        string $disk = 'cache',
        string $out = 'download',
    ): string|BinaryFileResponse {
        $model_class = $model::class;
        $model_name = class_basename($model_class);
        $model_name_low = mb_strtolower($model_name);
        $module = Str::between($model_class, 'Modules\\', '\Models');
        $module_low = mb_strtolower($module);
        /**
         * @var non-falsy-string&view-string
         */
<<<<<<< HEAD
        $view_name = $module_low . '::' . Str::kebab($model_name) . '.show.pdf';
=======
        $view_name = $module_low.'::'.Str::kebab($model_name).'.show.pdf';
>>>>>>> c7fd73eb (.)

        $view_params = [
            'view' => $view_name,
            'row' => $model,
<<<<<<< HEAD
            'transKey' => $module_low . '::' . Str::plural($model_name_low) . '.fields',
        ];
=======
            'transKey' => $module_low.'::'.Str::plural($model_name_low).'.fields',
        ];

>>>>>>> c7fd73eb (.)
        $view = view($view_name, $view_params);

        $html = $view->render();

        return app(PdfByHtmlAction::class)->execute($html, $filename, $disk, $out);
    }
}
