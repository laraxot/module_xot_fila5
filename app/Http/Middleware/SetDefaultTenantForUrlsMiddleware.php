<?php

declare(strict_types=1);

namespace Modules\Xot\Http\Middleware;

/*
 * https://laravel.com/docs/8.x/urls#default-values
 */
<<<<<<< HEAD
use Closure;
=======
>>>>>>> c7fd73eb (.)
use Filament\Facades\Filament;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\URL;

/**
 * Class SetDefaultTenantForUrlsMiddleware.
 */
class SetDefaultTenantForUrlsMiddleware
{
    /**
     * Handle the incoming request.
     */
    public function handle(
        Request $request,
<<<<<<< HEAD
        Closure $next,
=======
        \Closure $next,
>>>>>>> c7fd73eb (.)
    ): Response|JsonResponse|\Symfony\Component\HttpFoundation\Response {
        URL::defaults([
            'tenant' => Filament::getTenant(),
            // 'referrer' => url()->previous(),
        ]);

<<<<<<< HEAD
        // @phpstan-ignore return.type
        return $next($request);
=======
        /** @var Response|JsonResponse|\Symfony\Component\HttpFoundation\Response $response */
        $response = $next($request);

        return $response;
>>>>>>> c7fd73eb (.)
    }
}
