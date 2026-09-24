<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Route;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
<<<<<<< HEAD
<<<<<<< .merge_file_1HTg7c
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
<<<<<<< HEAD
>>>>>>> da9ae01a0 (.)
<<<<<<< .merge_file_4coui0
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_XSoipm
use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;

use function Safe\preg_replace;

<<<<<<< .merge_file_1HTg7c
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
<<<<<<< HEAD
=======
>>>>>>> .merge_file_HM2Wfa
=======
<<<<<<< HEAD
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)

use function Safe\preg_replace;

use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;

<<<<<<< HEAD
<<<<<<< .merge_file_4coui0
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_HM2Wfa
=======
<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_XSoipm
=======
>>>>>>> laraxot/dev
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
/**
 * Replaces Modules\Xot\Services\RouteDynService::dynamic_route() and its
 * private helpers.
 *
 * Kind A: the original service exposed ~18 static methods, but all of them
 * (besides getMethod(), moved to its own GetRouteMethodAction — it is a
 * standalone pure helper independently tested) are internal, mutually
 * recursive steps of a single cohesive operation: compiling a route DSL
 * array into Route::group()/resource()/match() calls. Forcing each parsing
 * step into its own QueueableAction would require an app()->execute() call
 * for every recursive step of one algorithm, which is not what the
 * Action-per-independent-operation shape is for. They are kept as private
 * methods of this single execute() entrypoint instead.
 */
class RegisterDynamicRoutesAction
{
    use QueueableAction;

    private string $namespaceStart = '';

    /**
<<<<<<< HEAD
     * @param  array<int, array<string, mixed>>  $array
<<<<<<< .merge_file_1HTg7c
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_4coui0
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
     * @param  array<int, array<string, mixed>>  $array
=======
     * @param array<int, array<string, mixed>> $array
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
     * @param array<int, array<string, mixed>> $array
>>>>>>> .merge_file_HM2Wfa
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
     * @param array<int, array<string, mixed>> $array
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_XSoipm
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
     */
    public function execute(
        array $array,
        ?string $namespace = null,
        ?string $namespaceStart = null,
        ?string $curr = null,
    ): void {
        Assert::notEmpty($array, 'The $array parameter cannot be empty.');

<<<<<<< HEAD
<<<<<<< .merge_file_1HTg7c
<<<<<<< HEAD
        if ($namespaceStart !== null) {
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_4coui0
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
        if ($namespaceStart !== null) {
=======
        if (null !== $namespaceStart) {
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
        if (null !== $namespaceStart) {
>>>>>>> .merge_file_HM2Wfa
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
        if (null !== $namespaceStart) {
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
        if ($namespaceStart !== null) {
>>>>>>> .merge_file_XSoipm
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
            $this->namespaceStart = $namespaceStart;
        }

        foreach ($array as $v) {
            Assert::isArray($v, 'Each item in the array must be an array.');
            $groupOpts = $this->getGroupOpts($v, $namespace);
            $v['group_opts'] = $groupOpts;

            $this->createRouteResource($v, $namespace);

            Route::group($groupOpts, function () use ($v, $namespace, $curr): void {
                $this->createRouteActs($v, $namespace, $curr);
                $this->createRouteSubs($v, $namespace, $curr);
            });
        }
    }

    /**
<<<<<<< HEAD
     * @param  array<string, mixed>  $v
<<<<<<< .merge_file_1HTg7c
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_4coui0
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
     * @param  array<string, mixed>  $v
=======
     * @param array<string, mixed> $v
     *
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
     * @param array<string, mixed> $v
     *
>>>>>>> .merge_file_HM2Wfa
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
     * @param array<string, mixed> $v
     *
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_XSoipm
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
     * @return array<string, mixed>
     */
    private function getGroupOpts(array $v, ?string $namespace): array
    {
        return [
            'prefix' => $this->getPrefix($v, $namespace),
            'namespace' => $this->getNamespace($v, $namespace),
            'as' => $this->getAs($v, $namespace),
        ];
    }

    /**
<<<<<<< HEAD
<<<<<<< .merge_file_1HTg7c
<<<<<<< HEAD
     * @param  array<string, mixed>  $v
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_4coui0
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
     * @param  array<string, mixed>  $v
=======
     * @param array<string, mixed> $v
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
     * @param array<string, mixed> $v
>>>>>>> .merge_file_HM2Wfa
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
     * @param array<string, mixed> $v
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
     * @param  array<string, mixed>  $v
>>>>>>> .merge_file_XSoipm
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
     */
    private function getPrefix(array $v, ?string $namespace): string
    {
        if (isset($v['prefix'])) {
            Assert::string($prefix = $v['prefix']);

            return $prefix;
        }

        Assert::string($name = $v['name']);
        $prefix = mb_strtolower($name);
        $paramName = $this->getParamName($v, $namespace);
<<<<<<< HEAD
        if ($paramName !== '') {
<<<<<<< .merge_file_1HTg7c
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_4coui0
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
        if ($paramName !== '') {
=======
        if ('' !== $paramName) {
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
        if ('' !== $paramName) {
>>>>>>> .merge_file_HM2Wfa
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
        if ('' !== $paramName) {
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_XSoipm
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
            return $prefix.'/{'.$paramName.'}';
        }

        return $prefix;
    }

    /**
<<<<<<< HEAD
<<<<<<< .merge_file_1HTg7c
<<<<<<< HEAD
     * @param  array<string, mixed>  $v
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_4coui0
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
     * @param  array<string, mixed>  $v
=======
     * @param array<string, mixed> $v
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
     * @param array<string, mixed> $v
>>>>>>> .merge_file_HM2Wfa
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
     * @param array<string, mixed> $v
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
     * @param  array<string, mixed>  $v
>>>>>>> .merge_file_XSoipm
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
     */
    private function getAs(array $v, ?string $_namespace): string
    {
        if (isset($v['as'])) {
            Assert::string($as = $v['as']);

            return $as;
        }

        Assert::string($name = $v['name']);
        $as = mb_strtolower($name);
        $as = str_replace('/', '.', $as);

        $replaced = preg_replace('/{.*}./', '', $as);
        $as = is_string($replaced) ? $replaced : $as;
        $as = str_replace(['{', '}'], '', $as);

        return $as.'.';
    }

    /**
<<<<<<< HEAD
     * @param  array<string, mixed>  $v
<<<<<<< .merge_file_1HTg7c
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_4coui0
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
     * @param  array<string, mixed>  $v
=======
     * @param array<string, mixed> $v
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
     * @param array<string, mixed> $v
>>>>>>> .merge_file_HM2Wfa
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
     * @param array<string, mixed> $v
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_XSoipm
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
     */
    private function getNamespace(array $v, ?string $namespace): ?string
    {
        if (isset($v['namespace'])) {
            Assert::string($namespace = $v['namespace']);

            return $namespace;
        }

        Assert::string($namespace = $v['name']);
        $namespace = str_replace(['{', '}'], '', $namespace);
<<<<<<< HEAD
<<<<<<< .merge_file_1HTg7c
<<<<<<< HEAD
        if ($namespace === '') {
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_4coui0
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
        if ($namespace === '') {
=======
        if ('' === $namespace) {
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
        if ('' === $namespace) {
>>>>>>> .merge_file_HM2Wfa
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
        if ('' === $namespace) {
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
        if ($namespace === '') {
>>>>>>> .merge_file_XSoipm
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
            return null;
        }

        return Str::studly($namespace);
    }

    /**
<<<<<<< HEAD
     * @param  array<string, mixed>  $v
<<<<<<< .merge_file_1HTg7c
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_4coui0
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
     * @param  array<string, mixed>  $v
=======
     * @param array<string, mixed> $v
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
     * @param array<string, mixed> $v
>>>>>>> .merge_file_HM2Wfa
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
     * @param array<string, mixed> $v
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_XSoipm
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
     */
    private function getAct(array $v, ?string $_namespace): string
    {
        if (isset($v['act'])) {
            Assert::string($act = $v['act']);

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
<<<<<<< .merge_file_1HTg7c
<<<<<<< HEAD
     * @param  array<string, mixed>  $v
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_4coui0
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
     * @param  array<string, mixed>  $v
=======
     * @param array<string, mixed> $v
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
     * @param array<string, mixed> $v
>>>>>>> .merge_file_HM2Wfa
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
     * @param array<string, mixed> $v
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
     * @param  array<string, mixed>  $v
>>>>>>> .merge_file_XSoipm
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
     */
    private function getParamName(array $v, ?string $_namespace): string
    {
        if (isset($v['param_name'])) {
            Assert::string($paramName = $v['param_name']);

            return $paramName;
        }

        Assert::string($name = $v['name']);
        $paramName = 'id_'.$name;
        $paramName = str_replace(['{', '}'], '', $paramName);

        return mb_strtolower($paramName);
    }

    /**
<<<<<<< HEAD
     * @param  array<string, mixed>  $v
<<<<<<< .merge_file_1HTg7c
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_4coui0
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
     * @param  array<string, mixed>  $v
=======
     * @param array<string, mixed> $v
     *
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
     * @param array<string, mixed> $v
     *
>>>>>>> .merge_file_HM2Wfa
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
     * @param array<string, mixed> $v
     *
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_XSoipm
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
     * @return array<int, string>
     */
    private function getParamsName(array $v, ?string $namespace): array
    {
        $paramName = $this->getParamName($v, $namespace);

        return [$paramName];
    }

    /**
<<<<<<< HEAD
<<<<<<< .merge_file_1HTg7c
<<<<<<< HEAD
     * @param  array<string, mixed>  $v
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_4coui0
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
     * @param  array<string, mixed>  $v
=======
     * @param array<string, mixed> $v
     *
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
     * @param array<string, mixed> $v
     *
>>>>>>> .merge_file_HM2Wfa
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
     * @param array<string, mixed> $v
     *
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
     * @param  array<string, mixed>  $v
>>>>>>> .merge_file_XSoipm
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
     * @return array<string, mixed>
     */
    private function getResourceOpts(array $v, ?string $namespace): array
    {
        $paramName = $this->getParamName($v, $namespace);
        $paramsName = $this->getParamsName($v, $namespace);

        Assert::string($v['name']);

        $opts = [
            'parameters' => [mb_strtolower($v['name']) => implode('}/{', $paramsName)],
            'names' => $this->prefixedResourceNames($this->getAs($v, $namespace)),
        ];

        if (isset($v['only'])) {
            $opts['only'] = $v['only'];
        }

<<<<<<< HEAD
        if ($paramName === '' && ! isset($opts['only'])) {
<<<<<<< .merge_file_1HTg7c
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_4coui0
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
        if ($paramName === '' && ! isset($opts['only'])) {
=======
        if ('' === $paramName && ! isset($opts['only'])) {
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
        if ('' === $paramName && ! isset($opts['only'])) {
>>>>>>> .merge_file_HM2Wfa
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
        if ('' === $paramName && ! isset($opts['only'])) {
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_XSoipm
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
            $opts['only'] = ['index'];
        }

        $opts['where'] = array_fill_keys($paramsName, '[0-9]+');

        return $opts;
    }

    /**
<<<<<<< HEAD
<<<<<<< .merge_file_1HTg7c
<<<<<<< HEAD
     * @param  array<string, mixed>  $v
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_4coui0
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
     * @param  array<string, mixed>  $v
=======
     * @param array<string, mixed> $v
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
     * @param array<string, mixed> $v
>>>>>>> .merge_file_HM2Wfa
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
     * @param array<string, mixed> $v
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
     * @param  array<string, mixed>  $v
>>>>>>> .merge_file_XSoipm
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
     */
    private function getController(array $v, ?string $_namespace): string
    {
        if (isset($v['controller'])) {
            Assert::string($controller = $v['controller']);

            return $controller;
        }

        Assert::string($v['controller'] = $v['name']);
        $v['controller'] = str_replace(['/', '{', '}'], ['_', '', ''], $v['controller']);
        $v['controller'] = Str::studly($v['controller']);
        $v['controller'] .= 'Controller';

        return $v['controller'];
    }

    /**
<<<<<<< HEAD
     * @param  array<string, mixed>  $v
<<<<<<< .merge_file_1HTg7c
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_4coui0
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
     * @param  array<string, mixed>  $v
=======
     * @param array<string, mixed> $v
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
     * @param array<string, mixed> $v
>>>>>>> .merge_file_HM2Wfa
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
     * @param array<string, mixed> $v
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_XSoipm
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
     */
    private function getUri(array $v, ?string $_namespace): string
    {
        Assert::string($name = $v['name']);

        return $name;
    }

    /**
<<<<<<< HEAD
<<<<<<< .merge_file_1HTg7c
<<<<<<< HEAD
     * @param  array<string, mixed>  $v
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_4coui0
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
     * @param  array<string, mixed>  $v
=======
     * @param array<string, mixed> $v
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
     * @param array<string, mixed> $v
>>>>>>> .merge_file_HM2Wfa
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
     * @param array<string, mixed> $v
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
     * @param  array<string, mixed>  $v
>>>>>>> .merge_file_XSoipm
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
     */
    private function getUses(array $v, ?string $namespace): string
    {
        $controller = $this->getController($v, $namespace);
        $act = $this->getAct($v, $namespace);

        return $controller.'@'.$act;
    }

    /**
<<<<<<< HEAD
     * @param  array<string, mixed>  $v
<<<<<<< .merge_file_1HTg7c
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_4coui0
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
     * @param  array<string, mixed>  $v
=======
     * @param array<string, mixed> $v
     *
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
     * @param array<string, mixed> $v
     *
>>>>>>> .merge_file_HM2Wfa
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
     * @param array<string, mixed> $v
     *
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_XSoipm
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
     * @return array<string, mixed>
     */
    private function getCallback(array $v, ?string $namespace, ?string $curr): array
    {
        Assert::string($name = $v['name']);
        $as = Str::slug($name);
        $uses = $this->getUses($v, $namespace);
<<<<<<< HEAD
<<<<<<< .merge_file_1HTg7c
<<<<<<< HEAD
        $uses = $curr !== null
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_4coui0
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
        $uses = $curr !== null
=======
        $uses = null !== $curr
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
        $uses = null !== $curr
>>>>>>> .merge_file_HM2Wfa
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
        $uses = null !== $curr
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
        $uses = $curr !== null
>>>>>>> .merge_file_XSoipm
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
            ? '\\'.$this->namespaceStart.'\\'.$curr.'\\'.$uses
            : '\\'.$this->namespaceStart.'\\'.$uses;

        return ['as' => $as, 'uses' => $uses];
    }

    /**
<<<<<<< HEAD
<<<<<<< .merge_file_1HTg7c
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
<<<<<<< HEAD
>>>>>>> da9ae01a0 (.)
<<<<<<< .merge_file_4coui0
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_XSoipm
     * @param  array<string, mixed>  $v
     */
    private function createRouteResource(array $v, ?string $namespace): void
    {
        if ($v['name'] === null) {
<<<<<<< .merge_file_1HTg7c
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
<<<<<<< HEAD
=======
>>>>>>> .merge_file_HM2Wfa
=======
<<<<<<< HEAD
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
     * @param array<string, mixed> $v
     */
    private function createRouteResource(array $v, ?string $namespace): void
    {
        if (null === $v['name']) {
<<<<<<< HEAD
<<<<<<< .merge_file_4coui0
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_HM2Wfa
=======
<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_XSoipm
=======
>>>>>>> laraxot/dev
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
            return;
        }
        Assert::string($name = $v['name']);
        $opts = $this->getResourceOpts($v, $namespace);
        $controller = $this->getController($v, $namespace);

        Route::resource($name, $controller, $opts);
    }

    /**
<<<<<<< HEAD
<<<<<<< .merge_file_1HTg7c
<<<<<<< HEAD
     * @param  array<string, mixed>  $v
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_4coui0
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
     * @param  array<string, mixed>  $v
=======
     * @param array<string, mixed> $v
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
     * @param array<string, mixed> $v
>>>>>>> .merge_file_HM2Wfa
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
     * @param array<string, mixed> $v
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
     * @param  array<string, mixed>  $v
>>>>>>> .merge_file_XSoipm
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
     */
    private function createRouteSubs(array $v, ?string $namespace, ?string $curr): void
    {
        if (! isset($v['subs'])) {
            return;
        }

        $subNamespace = $this->getNamespace($v, $namespace);
        $curr = $curr ?? $subNamespace;
        Assert::isArray($subs = $v['subs']);
<<<<<<< HEAD
        /** @var array<int, array<string, mixed>> $subs */
<<<<<<< .merge_file_1HTg7c
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_4coui0
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
        /** @var array<int, array<string, mixed>> $subs */
=======
        /* @var array<int, array<string, mixed>> $subs */
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
        /* @var array<int, array<string, mixed>> $subs */
>>>>>>> .merge_file_HM2Wfa
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
        /* @var array<int, array<string, mixed>> $subs */
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_XSoipm
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
        $this->execute($subs, $subNamespace, null, $curr);
    }

    /**
<<<<<<< HEAD
<<<<<<< .merge_file_1HTg7c
<<<<<<< HEAD
     * @param  array<string, mixed>  $v
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_4coui0
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
     * @param  array<string, mixed>  $v
=======
     * @param array<string, mixed> $v
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
     * @param array<string, mixed> $v
>>>>>>> .merge_file_HM2Wfa
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
     * @param array<string, mixed> $v
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
     * @param  array<string, mixed>  $v
>>>>>>> .merge_file_XSoipm
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
     */
    private function createRouteActs(array $v, ?string $namespace, ?string $curr): void
    {
        if (! isset($v['acts']) || ! is_array($v['acts'])) {
            return;
        }

        $controller = $this->getController($v, $namespace);
        foreach ($v['acts'] as $v1) {
            Assert::isArray($v1);
<<<<<<< HEAD
            /** @var array<string, mixed> $v1 */
<<<<<<< .merge_file_1HTg7c
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_4coui0
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
            /** @var array<string, mixed> $v1 */
=======
            /* @var array<string, mixed> $v1 */
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
            /* @var array<string, mixed> $v1 */
>>>>>>> .merge_file_HM2Wfa
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
            /* @var array<string, mixed> $v1 */
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_XSoipm
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
            $v1['controller'] = $controller;

            $method = app(GetRouteMethodAction::class)->execute($v1, $namespace);
            $uri = $this->getUri($v1, $namespace);
            $callback = $this->getCallback($v1, $namespace, $curr);
            Route::match($method, $uri, $callback);
        }
    }

    /**
     * @return array<string, string>
     */
    private function prefixedResourceNames(string $prefix): array
    {
<<<<<<< HEAD
<<<<<<< .merge_file_1HTg7c
<<<<<<< HEAD
        if (mb_substr($prefix, -1) === '.') {
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_4coui0
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
        if (mb_substr($prefix, -1) === '.') {
=======
        if ('.' === mb_substr($prefix, -1)) {
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
        if ('.' === mb_substr($prefix, -1)) {
>>>>>>> .merge_file_HM2Wfa
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
        if ('.' === mb_substr($prefix, -1)) {
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
        if (mb_substr($prefix, -1) === '.') {
>>>>>>> .merge_file_XSoipm
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
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
}
