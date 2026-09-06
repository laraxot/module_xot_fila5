<?php

declare(strict_types=1);

use Filament\Facades\Filament;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Illuminate\Testing\TestResponse;
use Modules\Xot\Actions\Cast\SafeStringCastAction;
use Modules\Xot\Actions\Factory\GetFactoryAction;
use Modules\Xot\Actions\File\FixPathAction;
<<<<<<< HEAD
use Webmozart\Assert\Assert;
=======
>>>>>>> 7f6cf6be (.)

use function Safe\define;
use function Safe\preg_match;

<<<<<<< HEAD
=======
use Webmozart\Assert\Assert;

>>>>>>> 7f6cf6be (.)
if (! function_exists('isRunningTestBench')) {
    function isRunningTestBench(): bool
    {
        $path = app(FixPathAction::class)->execute('\vendor\orchestra\testbench-core\laravel');
        $base = app(FixPathAction::class)->execute(base_path());

        return Str::endsWith($base, $path);
    }
}

if (! function_exists('dddx')) {
    function dddx(mixed $params): void
    {
        $tmp = debug_backtrace();
        $start = defined('LARAVEL_START') ? (float) LARAVEL_START : microtime(true);
        if (! defined('LARAVEL_START')) {
            define('LARAVEL_START', $start);
        }
        $data = [
            '_' => $params,
            'line' => $tmp[0]['line'] ?? 'line-unknows',
            'file' => app(FixPathAction::class)->execute($tmp[0]['file'] ?? 'file-unknown'),
            'time' => microtime(true) - $start,
            'memory_taken' => round(memory_get_peak_usage() / (1024 * 1024), 2).' MB',
        ];

        if (File::exists($data['file']) && Str::startsWith($data['file'], app(FixPathAction::class)->execute(storage_path('framework/views')))) {
            $content = File::get($data['file']);
            $data['view_file'] = app(FixPathAction::class)->execute(Str::between($content, '/**PATH ', ' ENDPATH**/'));
        }

        dd($data);
    }
}

if (! function_exists('in_admin')) {
    /** @param array<string, mixed> $params */
    function in_admin(array $params = []): bool
    {
        return inAdmin($params);
    }
}

if (! function_exists('inAdmin')) {
    /** @param array<string, mixed> $params */
    function inAdmin(array $params = []): bool
    {
        if (isset($params['in_admin'])) {
            return (bool) $params['in_admin'];
        }

<<<<<<< HEAD
        if (Request::segment(2) === 'admin') {
=======
        if ('admin' === Request::segment(2)) {
>>>>>>> 7f6cf6be (.)
            return true;
        }

        $segments = Request::segments();

<<<<<<< HEAD
        return (is_countable($segments) ? count($segments) : 0) > 0 && $segments[0] === 'livewire' && session('in_admin') === true;
=======
        return (is_countable($segments) ? count($segments) : 0) > 0 && 'livewire' === $segments[0] && true === session('in_admin');
>>>>>>> 7f6cf6be (.)
    }
}

if (! function_exists('params2ContainerItem')) {
    /**
<<<<<<< HEAD
     * @param  array<string, mixed>|null  $params
=======
     * @param array<string, mixed>|null $params
     *
>>>>>>> 7f6cf6be (.)
     * @return array{0: array<string, mixed>, 1: array<string, mixed>}
     */
    function params2ContainerItem(?array $params = null): array
    {
<<<<<<< HEAD
        if ($params === null) {
=======
        if (null === $params) {
>>>>>>> 7f6cf6be (.)
            $params = [];
            $route_current = Route::current();
            if ($route_current instanceof Illuminate\Routing\Route) {
                $params = $route_current->parameters();
            }
        }

        $container = [];
        $item = [];
        foreach ($params as $k => $v) {
            $pattern = '/(container|item)(\d+)/';
            preg_match($pattern, $k, $matches);
            if (count($matches) >= 3) {
                $sk = $matches[1];
                $sv = $matches[2];
                ${$sk}[$sv] = $v;
            }
        }

        return [$container, $item];
    }
}

if (! function_exists('xotModel')) {
    function xotModel(string $name): Model
    {
        $model_class = config('morph_map.'.$name);
        if (! is_string($model_class)) {
            throw new Exception('['.__LINE__.']');
        }

        Assert::isInstanceOf($res = app($model_class), Model::class);

        return $res;
    }
}

if (! function_exists('authId')) {
    function authId(): ?string
    {
        try {
            $id = Filament::auth()->id() ?? auth()->guard()->id();

<<<<<<< HEAD
            return $id === null ? null : (string) $id;
=======
            return null === $id ? null : (string) $id;
>>>>>>> 7f6cf6be (.)
        } catch (Throwable $e) {
            return null;
        }
    }
}

if (! function_exists('trans_string')) {
    /** @param array<string, mixed> $replace */
    function trans_string(string $key, array $replace = [], ?string $locale = null): string
    {
        $safeReplace = [];
        foreach ($replace as $k => $v) {
            if (! is_string($k)) {
                continue;
            }

<<<<<<< HEAD
            $safeReplace[$k] = (is_scalar($v) || $v === null) ? $v : SafeStringCastAction::cast($v);
=======
            $safeReplace[$k] = (is_scalar($v) || null === $v) ? $v : SafeStringCastAction::cast($v);
>>>>>>> 7f6cf6be (.)
        }

        $result = __($key, $safeReplace, $locale);

        return is_string($result) ? $result : $key;
    }
}

if (! function_exists('isJson')) {
    function isJson(string $string): bool
    {
        return json_validate($string);
    }
}

/*
|--------------------------------------------------------------------------
| Pest Laravel Helper Stubs
|--------------------------------------------------------------------------
|
| Stubs for Pest global testing functions.
| These eliminate 'function not found' errors from PHPStan.
|
*/

if (! function_exists('actingAs')) {
    /**
     * @return TestResponse<Response>
     */
    function actingAs(Authenticatable|int|string|null $user = null, ?string $driver = null): TestResponse
    {
        throw new RuntimeException('Stub: This function is meant for static analysis only.');
    }
}

if (! function_exists('get')) {
    /**
<<<<<<< HEAD
     * @param  array<string, mixed>  $options
=======
     * @param array<string, mixed> $options
     *
>>>>>>> 7f6cf6be (.)
     * @return TestResponse<Response>
     */
    function get(string $uri = '', array $options = []): TestResponse
    {
        throw new RuntimeException('Stub: This function is meant for static analysis only.');
    }
}

if (! function_exists('post')) {
    /**
<<<<<<< HEAD
     * @param  array<string, mixed>  $options
=======
     * @param array<string, mixed> $options
     *
>>>>>>> 7f6cf6be (.)
     * @return TestResponse<Response>
     */
    function post(string $uri, mixed $data = [], array $options = []): TestResponse
    {
        throw new RuntimeException('Stub: This function is meant for static analysis only.');
    }
}

if (! function_exists('put')) {
    /**
     * @return TestResponse<Response>
     */
    function put(string $uri, mixed $data = []): TestResponse
    {
        throw new RuntimeException('Stub: This function is meant for static analysis only.');
    }
}

if (! function_exists('patch')) {
    /**
     * @return TestResponse<Response>
     */
    function patch(string $uri, mixed $data = []): TestResponse
    {
        throw new RuntimeException('Stub: This function is meant for static analysis only.');
    }
}

if (! function_exists('delete')) {
    /**
     * @return TestResponse<Response>
     */
    function delete(string $uri): TestResponse
    {
        throw new RuntimeException('Stub: This function is meant for static analysis only.');
    }
}

if (! function_exists('head')) {
    /**
     * @return TestResponse<Response>
     */
    function head(string $uri): TestResponse
    {
        throw new RuntimeException('Stub: This function is meant for static analysis only.');
    }
}

if (! function_exists('options')) {
    /**
     * @return TestResponse<Response>
     */
    function options(string $uri): TestResponse
    {
        throw new RuntimeException('Stub: This function is meant for static analysis only.');
    }
}

if (! function_exists('followingRedirects')) {
    /**
     * @return TestResponse<Response>
     */
    function followingRedirects(int $number = 5): TestResponse
    {
        throw new RuntimeException('Stub: This function is meant for static analysis only.');
    }
}

<<<<<<< HEAD
=======
if (! function_exists('test')) {
    /** @param  string  $title  @param  \Closure  $callback  @return void */
    function test(string $title, Closure $callback): void
    {
        throw new RuntimeException('Stub: This function is meant for static analysis only.');
    }
}

if (! function_exists('describe')) {
    /** @param  string  $title  @param  \Closure  $callback  @return void */
    function describe(string $title, Closure $callback): void
    {
        throw new RuntimeException('Stub: This function is meant for static analysis only.');
    }
}

>>>>>>> 7f6cf6be (.)
if (! function_exists('xotSeedModelOnce')) {
    /**
     * Idempotent entity seeder — PHPStan-safe factory chain via GetFactoryAction.
     *
<<<<<<< HEAD
     * @param  class-string<Model>  $modelClass
     */
    function xotSeedModelOnce(string $modelClass): void
    {
        (new GetFactoryAction)
=======
     * @param class-string<Model> $modelClass
     */
    function xotSeedModelOnce(string $modelClass): void
    {
        (new GetFactoryAction())
>>>>>>> 7f6cf6be (.)
            ->execute($modelClass)
            ->createOne();
    }
}
