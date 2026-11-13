<?php

declare(strict_types=1);

use App\Http\Middleware\Authenticate;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Http\Middleware\TrustHosts;
use App\Livewire\Actions\Logout;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use PHPUnit\Framework\Assert;
use Modules\Xot\Tests\TestCase;

/*
 * Middleware e action HTTP dell'applicazione host (App\), non dei moduli.
 *
 * Tutti i collaboratori che toccherebbero il database (guard di Auth, store di
 * sessione) sono sostituiti da mock sulla facade: il test descrive il contratto
 * del middleware, non la persistenza. Nessuna connessione aperta.
 */

uses(TestCase::class);

test('trust hosts trusts every subdomain of the application url', function (): void {
    $hosts = (new TrustHosts(app()))->hosts();

    $appHost = Str::of(Config::string('app.url'))->after('://')->before('/')->value();

    Assert::assertCount(1, $hosts);
    Assert::assertIsString($hosts[0]);
    // Il pattern di Laravel e' `^(.+\.)?<host quotato>$`: verifichiamo che copra
    // sia il dominio nudo sia un suo sottodominio, senza replicarne la stringa.
    Assert::assertMatchesRegularExpression('#'.$hosts[0].'#', $appHost);
    Assert::assertMatchesRegularExpression('#'.$hosts[0].'#', 'admin.'.$appHost);
});

test('authenticate returns no redirect target for json requests', function (): void {
    $request = Request::create('/protected', 'GET', server: ['HTTP_ACCEPT' => 'application/json']);

    $redirectTo = (function (Request $request): ?string {
        return $this->redirectTo($request);
    })->call(new Authenticate(app('auth')), $request);

    Assert::assertNull($redirectTo);
});

test('redirect if authenticated lets a guest through untouched', function (): void {
    $guard = Mockery::mock();
    $guard->shouldReceive('check')->once()->andReturnFalse();
    Auth::shouldReceive('guard')->once()->with(null)->andReturn($guard);

    $request = Request::create('/login');
    $expected = new Response('form di login');

    $response = (new RedirectIfAuthenticated)->handle($request, fn (): Response => $expected);

    Assert::assertSame($expected, $response);
});

test('redirect if authenticated sends an authenticated user home', function (): void {
    $guard = Mockery::mock();
    $guard->shouldReceive('check')->once()->andReturnTrue();
    Auth::shouldReceive('guard')->once()->with('web')->andReturn($guard);

    $response = (new RedirectIfAuthenticated)->handle(
        Request::create('/login'),
        fn (): Response => new Response('non deve arrivarci'),
        'web',
    );

    Assert::assertInstanceOf(RedirectResponse::class, $response);
    Assert::assertSame(url(RouteServiceProvider::HOME), $response->getTargetUrl());
});

test('logout action clears the web guard and the session', function (): void {
    $calls = [];

    $guard = Mockery::mock();
    $guard->shouldReceive('logout')->once()->andReturnUsing(function () use (&$calls): void {
        $calls[] = 'logout';
    });
    Auth::shouldReceive('guard')->once()->with('web')->andReturn($guard);

    Session::shouldReceive('invalidate')->once()->andReturnUsing(function () use (&$calls): bool {
        $calls[] = 'invalidate';

        return true;
    });
    Session::shouldReceive('regenerateToken')->once()->andReturnUsing(function () use (&$calls): void {
        $calls[] = 'regenerateToken';
    });

    (new Logout)();

    Assert::assertSame(['logout', 'invalidate', 'regenerateToken'], $calls);
});
