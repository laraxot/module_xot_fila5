<?php

declare(strict_types=1);
<<<<<<< HEAD
=======

>>>>>>> laraxot/dev
/**
 * @see https://laravel.com/docs/11.x/urls#default-values
 */

namespace Modules\Xot\Http\Middleware;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Symfony\Component\HttpFoundation\Response;

class SetDefaultLocaleForUrls
{
    /**
     * Handle an incoming request.
     *
<<<<<<< .merge_file_wVeymh
     * @param  \Closure(Request):Response  $next
=======
<<<<<<< HEAD
     * @param  \Closure(Request):Response  $next
=======
     * @param \Closure(Request):Response $next
>>>>>>> laraxot/dev
>>>>>>> .merge_file_iSIMyU
     */
    public function handle(Request $request, \Closure $next): Response
    {
        $user = $request->user();
        $lang = app()->getLocale();
<<<<<<< .merge_file_wVeymh
        if ($user !== null) {
=======
<<<<<<< HEAD
        if ($user !== null) {
=======
        if (null !== $user) {
>>>>>>> laraxot/dev
>>>>>>> .merge_file_iSIMyU
            $lang = $user->lang ?? app()->getLocale();
        }

        URL::defaults(['lang' => $lang]);

        return $next($request);
    }
}
