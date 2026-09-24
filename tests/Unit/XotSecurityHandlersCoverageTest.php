<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Unit;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Process;
use Illuminate\Support\Facades\Queue;
<<<<<<< HEAD
use Mockery;
<<<<<<< .merge_file_7f3CCp
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_rvICxF
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
use Mockery;
=======
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
>>>>>>> .merge_file_KdsjYU
=======
<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_eH3zbw
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
use Modules\Xot\Exceptions\Handlers\HandlersRepository;
use Modules\Xot\Http\Middleware\SecurityMiddleware;
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;

uses(TestCase::class)->group('no-xot-db');

afterEach(function (): void {
<<<<<<< HEAD
<<<<<<< .merge_file_7f3CCp
<<<<<<< HEAD
    Mockery::close();
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_rvICxF
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
    Mockery::close();
=======
    \Mockery::close();
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
    \Mockery::close();
>>>>>>> .merge_file_KdsjYU
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
    \Mockery::close();
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
    Mockery::close();
>>>>>>> .merge_file_eH3zbw
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
});

describe('Xot security handlers deep', function (): void {
    test('SecurityMiddleware adds the security headers to a successful response', function (): void {
        config(['cache.default' => 'array']);
        Cache::store('array')->flush();
        Log::shouldReceive('warning')->zeroOrMoreTimes();
        Log::shouldReceive('info')->zeroOrMoreTimes();
        Log::shouldReceive('debug')->zeroOrMoreTimes();
        Log::shouldReceive('error')->zeroOrMoreTimes();

<<<<<<< HEAD
<<<<<<< .merge_file_7f3CCp
<<<<<<< HEAD
        $mw = new SecurityMiddleware;
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_rvICxF
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
        $mw = new SecurityMiddleware;
=======
        $mw = new SecurityMiddleware();
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
        $mw = new SecurityMiddleware();
>>>>>>> .merge_file_KdsjYU
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
        $mw = new SecurityMiddleware();
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
        $mw = new SecurityMiddleware;
>>>>>>> .merge_file_eH3zbw
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
        $next = static fn (Request $r): Response => new Response('ok', 200);
        $response = $mw->handle(Request::create('/health', 'GET'), $next);

        Assert::assertSame('DENY', $response->headers->get('X-Frame-Options'));
        Assert::assertSame('nosniff', $response->headers->get('X-Content-Type-Options'));
        Assert::assertNotNull($response->headers->get('Content-Security-Policy'));
    });

    test('SecurityMiddleware rejects an IP over the endpoint limit', function (): void {
        config(['cache.default' => 'array']);
        Cache::store('array')->flush();
        Log::shouldReceive('warning')->once();

        $ip = '203.0.113.99';
        Cache::put("rate_limit:ip:{$ip}", 60, 60);
        $request = Request::create('/api/flood', 'GET', [], [], [], ['REMOTE_ADDR' => $ip]);

        try {
<<<<<<< HEAD
            (new SecurityMiddleware)->handle($request, static fn (): Response => new Response('ok'));
<<<<<<< .merge_file_7f3CCp
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_rvICxF
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
            (new SecurityMiddleware)->handle($request, static fn (): Response => new Response('ok'));
=======
            (new SecurityMiddleware())->handle($request, static fn (): Response => new Response('ok'));
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
            (new SecurityMiddleware())->handle($request, static fn (): Response => new Response('ok'));
>>>>>>> .merge_file_KdsjYU
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
            (new SecurityMiddleware())->handle($request, static fn (): Response => new Response('ok'));
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_eH3zbw
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
            Assert::fail('The request exceeded the configured IP rate limit.');
        } catch (HttpException $exception) {
            Assert::assertSame(429, $exception->getStatusCode());
            Assert::assertSame('Too Many Requests', $exception->getMessage());
        }
    });

    test('HandlersRepository type-filtered handlers', function (): void {
        Http::fake();
        Mail::fake();
        Queue::fake();
        Process::fake();

<<<<<<< HEAD
<<<<<<< .merge_file_7f3CCp
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
<<<<<<< HEAD
>>>>>>> da9ae01a0 (.)
<<<<<<< .merge_file_rvICxF
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_eH3zbw
        $repo = new HandlersRepository;
        $repo->addReporter(static function (\InvalidArgumentException $e): void {});
        $repo->addReporter(static function (\Throwable $e): void {});
        $repo->addReporter(static function (): void {}); // no params → false
        $repo->addRenderer(static function (\RuntimeException $e): string {
            return 'r';
        });
        $repo->addConsoleRenderer(static function (string $e): void {}); // builtin type → true
<<<<<<< .merge_file_7f3CCp
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
<<<<<<< HEAD
=======
>>>>>>> .merge_file_KdsjYU
=======
<<<<<<< HEAD
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
        $repo = new HandlersRepository();
        $repo->addReporter(static function (\InvalidArgumentException $e): void {
        });
        $repo->addReporter(static function (\Throwable $e): void {
        });
        $repo->addReporter(static function (): void {
        }); // no params → false
        $repo->addRenderer(static function (\RuntimeException $e): string {
            return 'r';
        });
        $repo->addConsoleRenderer(static function (string $e): void {
        }); // builtin type → true
<<<<<<< HEAD
<<<<<<< .merge_file_rvICxF
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_KdsjYU
=======
<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_eH3zbw
=======
>>>>>>> laraxot/dev
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)

        $a = new \InvalidArgumentException('a');
        $b = new \RuntimeException('b');
        Assert::assertNotEmpty($repo->getReportersByException($a));
        Assert::assertNotEmpty($repo->getReportersByException($b));
        Assert::assertNotEmpty($repo->getRenderersByException($b));
        Assert::assertNotEmpty($repo->getConsoleRenderersByException($b));
    });
});
