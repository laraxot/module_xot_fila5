<?php

declare(strict_types=1);

namespace Modules\Xot\Actions;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
<<<<<<< HEAD

use function Safe\preg_replace;

use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;

=======
use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;

use function Safe\preg_replace;

>>>>>>> laraxot/dev
/**
 * Class RouteDynAction.
 */
class RouteDynAction
{
    use QueueableAction;

    private static string $namespace_start = '';

    /**
<<<<<<< HEAD
     * @param array<string, mixed> $v
=======
     * @param  array<string, mixed>  $v
>>>>>>> laraxot/dev
     */
    private static function requireStringValue(array $v, string $key): string
    {
        Assert::keyExists($v, $key);
        Assert::string($value = $v[$key], __FILE__.':'.__LINE__.' - '.class_basename(self::class));

        return $value;
    }

    /**
<<<<<<< HEAD
     * @param array<string, mixed> $v
     *
=======
     * @param  array<string, mixed>  $v
>>>>>>> laraxot/dev
     * @return array<string, mixed>
     */
    public static function getGroupOpts(array $v, ?string $namespace): array
    {
        return [
            'prefix' => self::getPrefix($v, $namespace),
            'namespace' => self::getNamespace($v, $namespace),
            'as' => self::getAs($v, $namespace),
        ];
    }

    /**
<<<<<<< HEAD
     * @param array<string, mixed> $v
=======
     * @param  array<string, mixed>  $v
>>>>>>> laraxot/dev
     */
    public static function getPrefix(array $v, ?string $namespace): string
    {
        if (isset($v['prefix'])) {
            return self::requireStringValue($v, 'prefix');
        }

        $name = self::requireStringValue($v, 'name');
        $prefix = mb_strtolower($name);
        $param_name = self::getParamName($v, $namespace);
<<<<<<< HEAD
        if ('' !== $param_name) {
=======
        if ($param_name !== '') {
>>>>>>> laraxot/dev
            return $prefix.'/{'.$param_name.'}';
        }

        return $prefix;
    }

    /**
<<<<<<< HEAD
     * @param array<string, mixed> $v
=======
     * @param  array<string, mixed>  $v
>>>>>>> laraxot/dev
     */
    public static function getAs(array $v, ?string $_namespace): string
    {
        if (isset($v['as'])) {
            return self::requireStringValue($v, 'as');
        }

        $name = self::requireStringValue($v, 'name');
        $as = mb_strtolower($name);
        $as = str_replace('/', '.', $as);

        if (is_string($as)) {
            $replaced = preg_replace('/{.*}./', '', $as);
            $as = is_string($replaced) ? $replaced : $as;
            $as = str_replace(['{', '}'], '', $as);

            return $as.'.';
        }

        return '.';
    }

    /**
<<<<<<< HEAD
     * @param array<string, mixed> $v
=======
     * @param  array<string, mixed>  $v
>>>>>>> laraxot/dev
     */
    public static function getNamespace(array $v, ?string $namespace): ?string
    {
        if (isset($v['namespace'])) {
            return self::requireStringValue($v, 'namespace');
        }

        $namespace = self::requireStringValue($v, 'name');
        $namespace = str_replace(['{', '}'], '', $namespace);
<<<<<<< HEAD
        if ('' === $namespace) {
=======
        if ($namespace === '') {
>>>>>>> laraxot/dev
            return null;
        }

        return Str::studly($namespace);
    }

    /**
<<<<<<< HEAD
     * @param array<string, mixed> $v
=======
     * @param  array<string, mixed>  $v
>>>>>>> laraxot/dev
     */
    public static function getAct(array $v, ?string $_namespace): string
    {
        if (isset($v['act'])) {
            Assert::string($act = $v['act'], __FILE__.':'.__LINE__.' - '.class_basename(self::class));

            return $act;
        }

        Assert::nullOrString($v['act'] = $v['name']);
        Assert::nullOrString($v['act']);

        $act = (string) ($v['act'] ?? '');

        $replaced = preg_replace('/{.*}\//', '', $act);
        $act = is_string($replaced) ? $replaced : $act;
        $act = str_replace('/', '_', $act);

        $camelCase = Str::camel($act);
        $act = str_replace(['{', '}'], '', $camelCase);

        return Str::camel($act);
    }

    /**
<<<<<<< HEAD
     * @param array<string, mixed> $v
=======
     * @param  array<string, mixed>  $v
>>>>>>> laraxot/dev
     */
    public static function getParamName(array $v, ?string $_namespace): string
    {
        if (isset($v['param_name'])) {
            return self::requireStringValue($v, 'param_name');
        }

        $name = self::requireStringValue($v, 'name');
        $param_name = 'id_'.$name;
        $param_name = str_replace(['{', '}'], '', $param_name);

        return mb_strtolower($param_name);
    }

    /**
<<<<<<< HEAD
     * @param array<string, mixed> $v
     *
=======
     * @param  array<string, mixed>  $v
>>>>>>> laraxot/dev
     * @return array<int, string>
     */
    public static function getParamsName(array $v, ?string $namespace): array
    {
        $param_name = self::getParamName($v, $namespace);

        return [$param_name];
    }

    /**
<<<<<<< HEAD
     * @param array<string, mixed> $v
     *
=======
     * @param  array<string, mixed>  $v
>>>>>>> laraxot/dev
     * @return array<string, mixed>
     */
    public static function getResourceOpts(array $v, ?string $namespace): array
    {
        $param_name = self::getParamName($v, $namespace);
        $params_name = self::getParamsName($v, $namespace);
        $resourceName = mb_strtolower(self::requireStringValue($v, 'name'));

        $opts = [
            'parameters' => [$resourceName => implode('}/{', $params_name)],
            'names' => self::prefixedResourceNames(self::getAs($v, $namespace)),
        ];

        if (isset($v['only'])) {
            $opts['only'] = $v['only'];
        }

<<<<<<< HEAD
        if ('' === $param_name && ! isset($opts['only'])) {
=======
        if ($param_name === '' && ! isset($opts['only'])) {
>>>>>>> laraxot/dev
            $opts['only'] = ['index'];
        }

        $opts['where'] = array_fill_keys($params_name, '[0-9]+');

        return $opts;
    }

    /**
<<<<<<< HEAD
     * @param array<string, mixed> $v
=======
     * @param  array<string, mixed>  $v
>>>>>>> laraxot/dev
     */
    public static function getController(array $v, ?string $_namespace): string
    {
        if (isset($v['controller'])) {
            return self::requireStringValue($v, 'controller');
        }

        $v['controller'] = self::requireStringValue($v, 'name');
        $v['controller'] = str_replace(['/', '{', '}'], ['_', '', ''], $v['controller']);
        $v['controller'] = Str::studly($v['controller']);
        $v['controller'] .= 'Controller';

        return $v['controller'];
    }

    /**
<<<<<<< HEAD
     * @param array<string, mixed> $v
=======
     * @param  array<string, mixed>  $v
>>>>>>> laraxot/dev
     */
    public static function getUri(array $v, ?string $_namespace): string
    {
        $name = self::requireStringValue($v, 'name');

        return $name;
    }

    /**
<<<<<<< HEAD
     * @param array<string, mixed> $v
     *
=======
     * @param  array<string, mixed>  $v
>>>>>>> laraxot/dev
     * @return array<int, string>
     */
    public static function getMethod(array $v, ?string $_namespace): array
    {
        if (isset($v['method'])) {
            $methods = array_values(array_filter(
                Arr::wrap($v['method']),
                static fn (mixed $method): bool => is_string($method),
            ));

            /* @var array<int, string> $methods */
            return $methods;
        }

        return ['get', 'post'];
    }

    /**
<<<<<<< HEAD
     * @param array<string, mixed> $v
=======
     * @param  array<string, mixed>  $v
>>>>>>> laraxot/dev
     */
    public static function getUses(array $v, ?string $namespace): string
    {
        $controller = self::getController($v, $namespace);
        $act = self::getAct($v, $namespace);

        return $controller.'@'.$act;
    }

    /**
<<<<<<< HEAD
     * @param array<string, mixed> $v
     *
=======
     * @param  array<string, mixed>  $v
>>>>>>> laraxot/dev
     * @return array<string, mixed>
     */
    public static function getCallback(array $v, ?string $namespace, ?string $curr): array
    {
        $name = self::requireStringValue($v, 'name');
        $as = Str::slug($name);
        $uses = self::getUses($v, $namespace);
<<<<<<< HEAD
        if (null !== $curr) {
=======
        if ($curr !== null) {
>>>>>>> laraxot/dev
            $uses = '\\'.self::$namespace_start.'\\'.$curr.'\\'.$uses;
        } else {
            $uses = '\\'.self::$namespace_start.'\\'.$uses;
        }

        return ['as' => $as, 'uses' => $uses];
    }

    /**
<<<<<<< HEAD
     * @param array<int, array<string, mixed>> $array
=======
     * @param  array<int, array<string, mixed>>  $array
>>>>>>> laraxot/dev
     */
    public static function dynamic_route(
        array $array,
        ?string $namespace = null,
        ?string $namespace_start = null,
        ?string $curr = null,
    ): void {
        Assert::notEmpty($array, 'The $array parameter cannot be empty.');

<<<<<<< HEAD
        if (null !== $namespace_start) {
=======
        if ($namespace_start !== null) {
>>>>>>> laraxot/dev
            self::$namespace_start = $namespace_start;
        }

        foreach ($array as $v) {
            Assert::isArray($v, 'Each item in the array must be an array.');
            $group_opts = self::getGroupOpts($v, $namespace);
            $v['group_opts'] = $group_opts;

            self::createRouteResource($v, $namespace);

            Route::group($group_opts, static function () use ($v, $namespace, $curr): void {
                self::createRouteActs($v, $namespace, $curr);
                self::createRouteSubs($v, $namespace, $curr);
            });
        }
    }

    /**
<<<<<<< HEAD
     * @param array<string, mixed> $v
     */
    public static function createRouteResource(array $v, ?string $namespace): void
    {
        if (! array_key_exists('name', $v) || null === $v['name']) {
=======
     * @param  array<string, mixed>  $v
     */
    public static function createRouteResource(array $v, ?string $namespace): void
    {
        if (! array_key_exists('name', $v) || $v['name'] === null) {
>>>>>>> laraxot/dev
            return;
        }
        $name = self::requireStringValue($v, 'name');
        $opts = self::getResourceOpts($v, $namespace);
        $controller = self::getController($v, $namespace);

        Route::resource($name, $controller, $opts);
    }

    /**
<<<<<<< HEAD
     * @param array<string, mixed> $v
=======
     * @param  array<string, mixed>  $v
>>>>>>> laraxot/dev
     */
    public static function createRouteSubs(array $v, ?string $namespace, ?string $curr): void
    {
        if (! isset($v['subs'])) {
            return;
        }

        $sub_namespace = self::getNamespace($v, $namespace);
<<<<<<< HEAD
        $curr = null === $curr ? $sub_namespace : $curr;
=======
        $curr = $curr === null ? $sub_namespace : $curr;
>>>>>>> laraxot/dev
        Assert::isArray($subs = $v['subs']);
        /** @var array<int, array<string, mixed>> $subsList */
        $subsList = array_values($subs);
        self::dynamic_route($subsList, $sub_namespace, null, $curr);
    }

    /**
<<<<<<< HEAD
     * @param array<string, mixed> $v
=======
     * @param  array<string, mixed>  $v
>>>>>>> laraxot/dev
     */
    public static function createRouteActs(array $v, ?string $namespace, ?string $curr): void
    {
        if (! isset($v['acts']) || ! is_array($v['acts'])) {
            return;
        }

        $controller = self::getController($v, $namespace);
        foreach ($v['acts'] as $v1) {
            Assert::isArray($v1);
            /** @var array<string, mixed> $act */
            $act = $v1;
            $act['controller'] = $controller;

            $method = self::getMethod($act, $namespace);
            $uri = self::getUri($act, $namespace);
            $callback = self::getCallback($act, $namespace, $curr);
            Route::match($method, $uri, $callback);
        }
    }

    /**
     * @return array<string, string>
     */
    public static function prefixedResourceNames(string $prefix): array
    {
<<<<<<< HEAD
        if ('.' === mb_substr($prefix, -1)) {
=======
        if (mb_substr($prefix, -1) === '.') {
>>>>>>> laraxot/dev
            $prefix = mb_substr($prefix, 0, -1);
        }

        return [
            'index' => $prefix.'.index',
            'create' => $prefix.'.create',
            'store' => $prefix.'.store',
            'show' => $prefix.'.show',
            'edit' => $prefix.'.edit',
            'update' => $prefix.'.update',
            'destroy' => $prefix.'.destroy',
        ];
    }

<<<<<<< HEAD
    public function execute(): void
    {
    }
=======
    public function execute(): void {}
>>>>>>> laraxot/dev
}
