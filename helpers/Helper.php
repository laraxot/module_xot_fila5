<?php

declare(strict_types=1);
<<<<<<< HEAD
=======

>>>>>>> 8d801bbe (Check & fix styling)
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
<<<<<<< HEAD
use Webmozart\Assert\Assert;
=======
>>>>>>> laraxot/dev
=======
>>>>>>> 8d801bbe (Check & fix styling)

use function Safe\define;
use function Safe\preg_match;

<<<<<<< HEAD
<<<<<<< HEAD
=======
use Webmozart\Assert\Assert;

>>>>>>> laraxot/dev
=======
use Webmozart\Assert\Assert;

>>>>>>> 8d801bbe (Check & fix styling)
if (! function_exists('isRunningTestBench')) {
    function isRunningTestBench(): bool
    {
        $path = app(FixPathAction::class)->execute('\vendor\orchestra\testbench-core\laravel');
        $base = app(FixPathAction::class)->execute(base_path());

        return Str::endsWith($base, $path);
    }
}

if (! function_exists('dddx')) {
<<<<<<< HEAD
    /** @param mixed $params Qualunque valore da dumpare (debug helper) */
=======
>>>>>>> 8d801bbe (Check & fix styling)
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
<<<<<<< HEAD
        if (Request::segment(2) === 'admin') {
=======
        if ('admin' === Request::segment(2)) {
>>>>>>> laraxot/dev
=======
        if ('admin' === Request::segment(2)) {
>>>>>>> 8d801bbe (Check & fix styling)
            return true;
        }

        $segments = Request::segments();

<<<<<<< HEAD
<<<<<<< HEAD
        return (is_countable($segments) ? count($segments) : 0) > 0 && $segments[0] === 'livewire' && session('in_admin') === true;
=======
        return (is_countable($segments) ? count($segments) : 0) > 0 && 'livewire' === $segments[0] && true === session('in_admin');
>>>>>>> laraxot/dev
=======
        return (is_countable($segments) ? count($segments) : 0) > 0 && 'livewire' === $segments[0] && true === session('in_admin');
>>>>>>> 8d801bbe (Check & fix styling)
    }
}

if (! function_exists('params2ContainerItem')) {
    /**
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  array<string, mixed>|null  $params
=======
     * @param array<string, mixed>|null $params
     *
>>>>>>> laraxot/dev
=======
     * @param array<string, mixed>|null $params
     *
>>>>>>> 8d801bbe (Check & fix styling)
     * @return array{0: array<string, mixed>, 1: array<string, mixed>}
     */
    function params2ContainerItem(?array $params = null): array
    {
<<<<<<< HEAD
<<<<<<< HEAD
        if ($params === null) {
=======
        if (null === $params) {
>>>>>>> laraxot/dev
=======
        if (null === $params) {
>>>>>>> 8d801bbe (Check & fix styling)
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
<<<<<<< HEAD
            return $id === null ? null : (string) $id;
=======
            return null === $id ? null : (string) $id;
>>>>>>> laraxot/dev
=======
            return null === $id ? null : (string) $id;
>>>>>>> 8d801bbe (Check & fix styling)
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
<<<<<<< HEAD
            $safeReplace[$k] = (is_scalar($v) || $v === null) ? $v : SafeStringCastAction::cast($v);
=======
            $safeReplace[$k] = (is_scalar($v) || null === $v) ? $v : SafeStringCastAction::cast($v);
>>>>>>> laraxot/dev
=======
            $safeReplace[$k] = (is_scalar($v) || null === $v) ? $v : SafeStringCastAction::cast($v);
>>>>>>> 8d801bbe (Check & fix styling)
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
<<<<<<< HEAD
     * @param  array<string, mixed>  $options
=======
     * @param array<string, mixed> $options
     *
>>>>>>> laraxot/dev
=======
     * @param array<string, mixed> $options
     *
>>>>>>> 8d801bbe (Check & fix styling)
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
<<<<<<< HEAD
     * @param  array<string, mixed>  $data
     * @param  array<string, mixed>  $options
=======
     * @param array<string, mixed> $data
     * @param array<string, mixed> $options
     *
>>>>>>> laraxot/dev
     * @return TestResponse<Response>
     */
    function post(string $uri, array $data = [], array $options = []): TestResponse
=======
     * @param array<string, mixed> $options
     *
     * @return TestResponse<Response>
     */
    function post(string $uri, mixed $data = [], array $options = []): TestResponse
>>>>>>> 8d801bbe (Check & fix styling)
    {
        throw new RuntimeException('Stub: This function is meant for static analysis only.');
    }
}

if (! function_exists('put')) {
    /**
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  array<string, mixed>  $data
=======
     * @param array<string, mixed> $data
     *
>>>>>>> laraxot/dev
     * @return TestResponse<Response>
     */
    function put(string $uri, array $data = []): TestResponse
=======
     * @return TestResponse<Response>
     */
    function put(string $uri, mixed $data = []): TestResponse
>>>>>>> 8d801bbe (Check & fix styling)
    {
        throw new RuntimeException('Stub: This function is meant for static analysis only.');
    }
}

if (! function_exists('patch')) {
    /**
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  array<string, mixed>  $data
=======
     * @param array<string, mixed> $data
     *
>>>>>>> laraxot/dev
     * @return TestResponse<Response>
     */
    function patch(string $uri, array $data = []): TestResponse
=======
     * @return TestResponse<Response>
     */
    function patch(string $uri, mixed $data = []): TestResponse
>>>>>>> 8d801bbe (Check & fix styling)
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
<<<<<<< HEAD
=======
=======
>>>>>>> 8d801bbe (Check & fix styling)
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

<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 8d801bbe (Check & fix styling)
if (! function_exists('xotSeedModelOnce')) {
    /**
     * Idempotent entity seeder — PHPStan-safe factory chain via GetFactoryAction.
     *
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  class-string<Model>  $modelClass
     */
    function xotSeedModelOnce(string $modelClass): void
    {
        (new GetFactoryAction)
=======
=======
>>>>>>> 8d801bbe (Check & fix styling)
     * @param class-string<Model> $modelClass
     */
    function xotSeedModelOnce(string $modelClass): void
    {
        (new GetFactoryAction())
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 8d801bbe (Check & fix styling)
            ->execute($modelClass)
            ->createOne();
    }
}
<<<<<<< HEAD
<<<<<<< HEAD
=======

if (! function_exists('merge_translation_files')) {
    /**
     * Merge multiple PHP translation files into a single array.
     *
     * @param string $first   First translation file path
     * @param string ...$rest Additional translation file paths
     *
     * @return array<string, mixed>
     */
    function merge_translation_files(string $first, string ...$rest): array
    {
        $result = (array) require $first;

        foreach ($rest as $file) {
            $result = array_replace_recursive($result, (array) require $file);
        }

        /* @phpstan-ignore return.type */
        return $result;
    }
}
>>>>>>> laraxot/dev
=======

if (! function_exists('normalize_string_key_array')) {
    /**
     * @param array<mixed, mixed> $array
     *
     * @return array<string, mixed>
     */
    function normalize_string_key_array(array $array): array
    {
        $normalized = [];
        foreach ($array as $key => $value) {
            if (! is_string($key)) {
                throw new InvalidArgumentException('Array keys must be strings.');
            }
            $normalized[$key] = $value;
        }

        return $normalized;
    }
}

if (! function_exists('require_translation_file')) {
    /**
     * @return array<string, mixed>
     */
    function require_translation_file(string $path): array
    {
        $loaded = require $path;
        if (! is_array($loaded)) {
            throw new InvalidArgumentException("Translation file [{$path}] must return array.");
        }

        return normalize_string_key_array($loaded);
    }
}

if (! function_exists('merge_translation_files')) {
    /**
     * @param non-empty-string ...$paths
     *
     * @return array<string, mixed>
     */
    function merge_translation_files(string ...$paths): array
    {
        $merged = [];
        foreach ($paths as $path) {
            $merged = array_merge($merged, require_translation_file($path));
        }

        return $merged;
    }
}
>>>>>>> 8d801bbe (Check & fix styling)
