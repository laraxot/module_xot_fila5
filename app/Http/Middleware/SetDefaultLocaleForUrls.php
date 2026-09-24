<?php

declare(strict_types=1);
<<<<<<< HEAD
=======

>>>>>>> 3792da0d (Check & fix styling)
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
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  \Closure(Request):Response  $next
=======
     * @param \Closure(Request):Response $next
>>>>>>> laraxot/dev
=======
     * @param \Closure(Request):Response $next
>>>>>>> 3792da0d (Check & fix styling)
     */
    public function handle(Request $request, \Closure $next): Response
    {
        $user = $request->user();
        $lang = app()->getLocale();
<<<<<<< HEAD
<<<<<<< HEAD
        if ($user !== null) {
=======
        if (null !== $user) {
>>>>>>> laraxot/dev
=======
        if (null !== $user) {
>>>>>>> 3792da0d (Check & fix styling)
            $lang = $user->lang ?? app()->getLocale();
        }

        URL::defaults(['lang' => $lang]);

        return $next($request);
    }
}
