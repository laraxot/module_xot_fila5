<?php

declare(strict_types=1);

namespace Modules\Xot\Http\Middleware;

<<<<<<< HEAD
use Closure;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
=======
use Illuminate\Http\Request;
use Illuminate\Http\Response;
>>>>>>> c7fd73eb (.)

class Cors
{
    /**
     * Handle an incoming request.
<<<<<<< HEAD
     *
     * @return Response
     */
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        // @phpstan-ignore property.nonObject
        $headers = $response->headers;

        // @phpstan-ignore method.nonObject
        $headers->set('Access-Control-Allow-Origin', '*');
        // @phpstan-ignore method.nonObject
        $headers->set('Access-Control-Allow-Methods', 'POST, GET, OPTIONS, PUT, DELETE');
        // @phpstan-ignore method.nonObject
        $headers->set('Access-Control-Allow-Headers', 'Content-Type, X-Auth-Token, Origin, Authorization');

        // @phpstan-ignore return.type
=======
     */
    public function handle(Request $request, \Closure $next): Response
    {
        /** @var Response $response */
        $response = $next($request);

        $response->headers->set('Access-Control-Allow-Origin', '*');
        $response->headers->set('Access-Control-Allow-Methods', 'POST, GET, OPTIONS, PUT, DELETE');
        $response->headers->set('Access-Control-Allow-Headers', 'Content-Type, X-Auth-Token, Origin, Authorization');

>>>>>>> c7fd73eb (.)
        return $response;
    }
}
