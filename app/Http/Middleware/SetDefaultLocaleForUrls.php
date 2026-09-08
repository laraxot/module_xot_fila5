<?php

declare(strict_types=1);

/**
 * @see https://laravel.com/docs/11.x/urls#default-values
 */

namespace Modules\Xot\Http\Middleware;

<<<<<<< HEAD
use Closure;
=======
>>>>>>> c7fd73eb (.)
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Symfony\Component\HttpFoundation\Response;

class SetDefaultLocaleForUrls
{
    /**
     * Handle an incoming request.
     *
<<<<<<< HEAD
     * @param Closure(Request):Response $next
     */
    public function handle(Request $request, Closure $next): Response
=======
     * @param \Closure(Request):Response $next
     */
    public function handle(Request $request, \Closure $next): Response
>>>>>>> c7fd73eb (.)
    {
        $user = $request->user();
        $lang = app()->getLocale();
        if (null !== $user) {
            $lang = $user->lang ?? app()->getLocale();
        }

        URL::defaults(['lang' => $lang]);

        return $next($request);
    }
}
