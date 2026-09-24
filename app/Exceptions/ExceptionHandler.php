<?php

<<<<<<< .merge_file_77emMl
declare(strict_types=1);
=======
<<<<<<< HEAD
declare(strict_types=1);
=======
>>>>>>> laraxot/dev
>>>>>>> .merge_file_mxtVCB
/**
 * @see https://dev.to/jackmiras/laravels-exceptions-part-2-custom-exceptions-1367
 */

<<<<<<< .merge_file_77emMl
=======
<<<<<<< HEAD
=======
declare(strict_types=1);

>>>>>>> laraxot/dev
>>>>>>> .merge_file_mxtVCB
namespace Modules\Xot\Exceptions;

use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Http\Request;
use Modules\Xot\Actions\View\GetViewPathAction;
use Symfony\Component\HttpKernel\Exception\HttpException;

class ExceptionHandler
{
    /**
     * Configura la gestione delle eccezioni.
     *
<<<<<<< .merge_file_77emMl
     * @param  Exceptions  $exceptions  Configuratore eccezioni Laravel
=======
<<<<<<< HEAD
     * @param  Exceptions  $exceptions  Configuratore eccezioni Laravel
=======
     * @param Exceptions $exceptions Configuratore eccezioni Laravel
>>>>>>> laraxot/dev
>>>>>>> .merge_file_mxtVCB
     */
    public static function handles(Exceptions $exceptions): void
    {
        $exceptions->render(function (HttpException $e, Request $request) {
            $status_code = $e->getStatusCode();
            if ($request->wantsJson()) {
                return response()->json([
                    'message' => $e->getMessage(),
                ], $status_code);
            }

            $view = 'pub_theme::errors.'.$status_code;
            if (! view()->exists($view)) {
                throw new \Exception('view not found: ['.$view.'] view path:'.app(GetViewPathAction::class)->execute($view));
            }
            $view_params = ['exception' => $e];

            return response()->view($view, $view_params, $status_code);
        });
    }
}
