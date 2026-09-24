<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Route;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
<<<<<<< .merge_file_2WBiLC
=======
<<<<<<< .merge_file_HTnb9U
=======
>>>>>>> .merge_file_t34Vnk
<<<<<<< HEAD
=======
<<<<<<< .merge_file_4coui0
<<<<<<< HEAD
>>>>>>> laraxot/dev
<<<<<<< .merge_file_2WBiLC
=======
>>>>>>> .merge_file_O5DBQE
>>>>>>> .merge_file_t34Vnk
use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;

use function Safe\preg_replace;

<<<<<<< .merge_file_2WBiLC
=======
<<<<<<< .merge_file_HTnb9U
=======
>>>>>>> .merge_file_t34Vnk
<<<<<<< HEAD
=======
=======
=======
>>>>>>> .merge_file_HM2Wfa

use function Safe\preg_replace;

use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;

<<<<<<< .merge_file_4coui0
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_HM2Wfa
>>>>>>> laraxot/dev
<<<<<<< .merge_file_2WBiLC
=======
>>>>>>> .merge_file_O5DBQE
>>>>>>> .merge_file_t34Vnk
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
<<<<<<< .merge_file_2WBiLC
=======
<<<<<<< .merge_file_HTnb9U
     * @param  array<int, array<string, mixed>>  $array
=======
>>>>>>> .merge_file_t34Vnk
<<<<<<< HEAD
     * @param  array<int, array<string, mixed>>  $array
=======
<<<<<<< .merge_file_4coui0
<<<<<<< HEAD
     * @param  array<int, array<string, mixed>>  $array
=======
     * @param array<int, array<string, mixed>> $array
>>>>>>> laraxot/dev
=======
     * @param array<int, array<string, mixed>> $array
>>>>>>> .merge_file_HM2Wfa
>>>>>>> laraxot/dev
<<<<<<< .merge_file_2WBiLC
=======
>>>>>>> .merge_file_O5DBQE
>>>>>>> .merge_file_t34Vnk
     */
    public function execute(
        array $array,
        ?string $namespace = null,
        ?string $namespaceStart = null,
        ?string $curr = null,
    ): void {
        Assert::notEmpty($array, 'The $array parameter cannot be empty.');

<<<<<<< .merge_file_2WBiLC
<<<<<<< HEAD
        if ($namespaceStart !== null) {
=======
<<<<<<< .merge_file_4coui0
<<<<<<< HEAD
        if ($namespaceStart !== null) {
=======
=======
<<<<<<< .merge_file_HTnb9U
        if ($namespaceStart !== null) {
=======
<<<<<<< HEAD
        if ($namespaceStart !== null) {
=======
<<<<<<< .merge_file_4coui0
<<<<<<< HEAD
        if ($namespaceStart !== null) {
=======
>>>>>>> .merge_file_t34Vnk
        if (null !== $namespaceStart) {
>>>>>>> laraxot/dev
=======
        if (null !== $namespaceStart) {
>>>>>>> .merge_file_HM2Wfa
>>>>>>> laraxot/dev
<<<<<<< .merge_file_2WBiLC
=======
>>>>>>> .merge_file_O5DBQE
>>>>>>> .merge_file_t34Vnk
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
<<<<<<< .merge_file_2WBiLC
=======
<<<<<<< .merge_file_HTnb9U
     * @param  array<string, mixed>  $v
=======
>>>>>>> .merge_file_t34Vnk
<<<<<<< HEAD
     * @param  array<string, mixed>  $v
=======
<<<<<<< .merge_file_4coui0
<<<<<<< HEAD
     * @param  array<string, mixed>  $v
=======
     * @param array<string, mixed> $v
     *
>>>>>>> laraxot/dev
=======
     * @param array<string, mixed> $v
     *
>>>>>>> .merge_file_HM2Wfa
>>>>>>> laraxot/dev
<<<<<<< .merge_file_2WBiLC
=======
>>>>>>> .merge_file_O5DBQE
>>>>>>> .merge_file_t34Vnk
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
<<<<<<< .merge_file_2WBiLC
=======
<<<<<<< .merge_file_HTnb9U
     * @param  array<string, mixed>  $v
=======
>>>>>>> .merge_file_t34Vnk
<<<<<<< HEAD
     * @param  array<string, mixed>  $v
=======
<<<<<<< .merge_file_4coui0
<<<<<<< HEAD
     * @param  array<string, mixed>  $v
=======
     * @param array<string, mixed> $v
>>>>>>> laraxot/dev
=======
     * @param array<string, mixed> $v
>>>>>>> .merge_file_HM2Wfa
>>>>>>> laraxot/dev
<<<<<<< .merge_file_2WBiLC
=======
>>>>>>> .merge_file_O5DBQE
>>>>>>> .merge_file_t34Vnk
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
<<<<<<< .merge_file_2WBiLC
<<<<<<< HEAD
        if ($paramName !== '') {
=======
=======
<<<<<<< .merge_file_HTnb9U
        if ($paramName !== '') {
=======
<<<<<<< HEAD
        if ($paramName !== '') {
=======
>>>>>>> .merge_file_t34Vnk
<<<<<<< .merge_file_4coui0
<<<<<<< HEAD
        if ($paramName !== '') {
=======
        if ('' !== $paramName) {
>>>>>>> laraxot/dev
=======
        if ('' !== $paramName) {
>>>>>>> .merge_file_HM2Wfa
>>>>>>> laraxot/dev
<<<<<<< .merge_file_2WBiLC
=======
>>>>>>> .merge_file_O5DBQE
>>>>>>> .merge_file_t34Vnk
            return $prefix.'/{'.$paramName.'}';
        }

        return $prefix;
    }

    /**
<<<<<<< .merge_file_2WBiLC
=======
<<<<<<< .merge_file_HTnb9U
     * @param  array<string, mixed>  $v
=======
>>>>>>> .merge_file_t34Vnk
<<<<<<< HEAD
     * @param  array<string, mixed>  $v
=======
<<<<<<< .merge_file_4coui0
<<<<<<< HEAD
     * @param  array<string, mixed>  $v
=======
     * @param array<string, mixed> $v
>>>>>>> laraxot/dev
=======
     * @param array<string, mixed> $v
>>>>>>> .merge_file_HM2Wfa
>>>>>>> laraxot/dev
<<<<<<< .merge_file_2WBiLC
=======
>>>>>>> .merge_file_O5DBQE
>>>>>>> .merge_file_t34Vnk
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
<<<<<<< .merge_file_2WBiLC
<<<<<<< HEAD
     * @param  array<string, mixed>  $v
=======
=======
<<<<<<< .merge_file_HTnb9U
     * @param  array<string, mixed>  $v
=======
<<<<<<< HEAD
     * @param  array<string, mixed>  $v
=======
>>>>>>> .merge_file_t34Vnk
<<<<<<< .merge_file_4coui0
<<<<<<< HEAD
     * @param  array<string, mixed>  $v
=======
     * @param array<string, mixed> $v
>>>>>>> laraxot/dev
=======
     * @param array<string, mixed> $v
>>>>>>> .merge_file_HM2Wfa
>>>>>>> laraxot/dev
<<<<<<< .merge_file_2WBiLC
=======
>>>>>>> .merge_file_O5DBQE
>>>>>>> .merge_file_t34Vnk
     */
    private function getNamespace(array $v, ?string $namespace): ?string
    {
        if (isset($v['namespace'])) {
            Assert::string($namespace = $v['namespace']);

            return $namespace;
        }

        Assert::string($namespace = $v['name']);
        $namespace = str_replace(['{', '}'], '', $namespace);
<<<<<<< .merge_file_2WBiLC
<<<<<<< HEAD
        if ($namespace === '') {
=======
<<<<<<< .merge_file_4coui0
<<<<<<< HEAD
        if ($namespace === '') {
=======
=======
<<<<<<< .merge_file_HTnb9U
        if ($namespace === '') {
=======
<<<<<<< HEAD
        if ($namespace === '') {
=======
<<<<<<< .merge_file_4coui0
<<<<<<< HEAD
        if ($namespace === '') {
=======
>>>>>>> .merge_file_t34Vnk
        if ('' === $namespace) {
>>>>>>> laraxot/dev
=======
        if ('' === $namespace) {
>>>>>>> .merge_file_HM2Wfa
>>>>>>> laraxot/dev
<<<<<<< .merge_file_2WBiLC
=======
>>>>>>> .merge_file_O5DBQE
>>>>>>> .merge_file_t34Vnk
            return null;
        }

        return Str::studly($namespace);
    }

    /**
<<<<<<< .merge_file_2WBiLC
=======
<<<<<<< .merge_file_HTnb9U
     * @param  array<string, mixed>  $v
=======
>>>>>>> .merge_file_t34Vnk
<<<<<<< HEAD
     * @param  array<string, mixed>  $v
=======
<<<<<<< .merge_file_4coui0
<<<<<<< HEAD
     * @param  array<string, mixed>  $v
=======
     * @param array<string, mixed> $v
>>>>>>> laraxot/dev
=======
     * @param array<string, mixed> $v
>>>>>>> .merge_file_HM2Wfa
>>>>>>> laraxot/dev
<<<<<<< .merge_file_2WBiLC
=======
>>>>>>> .merge_file_O5DBQE
>>>>>>> .merge_file_t34Vnk
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
<<<<<<< .merge_file_2WBiLC
<<<<<<< HEAD
     * @param  array<string, mixed>  $v
=======
<<<<<<< .merge_file_4coui0
<<<<<<< HEAD
     * @param  array<string, mixed>  $v
=======
=======
<<<<<<< .merge_file_HTnb9U
     * @param  array<string, mixed>  $v
=======
<<<<<<< HEAD
     * @param  array<string, mixed>  $v
=======
<<<<<<< .merge_file_4coui0
<<<<<<< HEAD
     * @param  array<string, mixed>  $v
=======
>>>>>>> .merge_file_t34Vnk
     * @param array<string, mixed> $v
>>>>>>> laraxot/dev
=======
     * @param array<string, mixed> $v
>>>>>>> .merge_file_HM2Wfa
>>>>>>> laraxot/dev
<<<<<<< .merge_file_2WBiLC
=======
>>>>>>> .merge_file_O5DBQE
>>>>>>> .merge_file_t34Vnk
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
<<<<<<< .merge_file_2WBiLC
<<<<<<< HEAD
     * @param  array<string, mixed>  $v
=======
<<<<<<< .merge_file_4coui0
<<<<<<< HEAD
     * @param  array<string, mixed>  $v
=======
=======
<<<<<<< .merge_file_HTnb9U
     * @param  array<string, mixed>  $v
=======
<<<<<<< HEAD
     * @param  array<string, mixed>  $v
=======
<<<<<<< .merge_file_4coui0
<<<<<<< HEAD
     * @param  array<string, mixed>  $v
=======
>>>>>>> .merge_file_t34Vnk
     * @param array<string, mixed> $v
     *
>>>>>>> laraxot/dev
=======
     * @param array<string, mixed> $v
     *
>>>>>>> .merge_file_HM2Wfa
>>>>>>> laraxot/dev
<<<<<<< .merge_file_2WBiLC
=======
>>>>>>> .merge_file_O5DBQE
>>>>>>> .merge_file_t34Vnk
     * @return array<int, string>
     */
    private function getParamsName(array $v, ?string $namespace): array
    {
        $paramName = $this->getParamName($v, $namespace);

        return [$paramName];
    }

    /**
<<<<<<< .merge_file_2WBiLC
<<<<<<< HEAD
     * @param  array<string, mixed>  $v
=======
<<<<<<< .merge_file_4coui0
<<<<<<< HEAD
     * @param  array<string, mixed>  $v
=======
=======
<<<<<<< .merge_file_HTnb9U
     * @param  array<string, mixed>  $v
=======
<<<<<<< HEAD
     * @param  array<string, mixed>  $v
=======
<<<<<<< .merge_file_4coui0
<<<<<<< HEAD
     * @param  array<string, mixed>  $v
=======
>>>>>>> .merge_file_t34Vnk
     * @param array<string, mixed> $v
     *
>>>>>>> laraxot/dev
=======
     * @param array<string, mixed> $v
     *
>>>>>>> .merge_file_HM2Wfa
>>>>>>> laraxot/dev
<<<<<<< .merge_file_2WBiLC
=======
>>>>>>> .merge_file_O5DBQE
>>>>>>> .merge_file_t34Vnk
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

<<<<<<< .merge_file_2WBiLC
<<<<<<< HEAD
        if ($paramName === '' && ! isset($opts['only'])) {
=======
<<<<<<< .merge_file_4coui0
<<<<<<< HEAD
        if ($paramName === '' && ! isset($opts['only'])) {
=======
=======
<<<<<<< .merge_file_HTnb9U
        if ($paramName === '' && ! isset($opts['only'])) {
=======
<<<<<<< HEAD
        if ($paramName === '' && ! isset($opts['only'])) {
=======
<<<<<<< .merge_file_4coui0
<<<<<<< HEAD
        if ($paramName === '' && ! isset($opts['only'])) {
=======
>>>>>>> .merge_file_t34Vnk
        if ('' === $paramName && ! isset($opts['only'])) {
>>>>>>> laraxot/dev
=======
        if ('' === $paramName && ! isset($opts['only'])) {
>>>>>>> .merge_file_HM2Wfa
>>>>>>> laraxot/dev
<<<<<<< .merge_file_2WBiLC
=======
>>>>>>> .merge_file_O5DBQE
>>>>>>> .merge_file_t34Vnk
            $opts['only'] = ['index'];
        }

        $opts['where'] = array_fill_keys($paramsName, '[0-9]+');

        return $opts;
    }

    /**
<<<<<<< .merge_file_2WBiLC
<<<<<<< HEAD
     * @param  array<string, mixed>  $v
=======
<<<<<<< .merge_file_4coui0
<<<<<<< HEAD
     * @param  array<string, mixed>  $v
=======
=======
<<<<<<< .merge_file_HTnb9U
     * @param  array<string, mixed>  $v
=======
<<<<<<< HEAD
     * @param  array<string, mixed>  $v
=======
<<<<<<< .merge_file_4coui0
<<<<<<< HEAD
     * @param  array<string, mixed>  $v
=======
>>>>>>> .merge_file_t34Vnk
     * @param array<string, mixed> $v
>>>>>>> laraxot/dev
=======
     * @param array<string, mixed> $v
>>>>>>> .merge_file_HM2Wfa
>>>>>>> laraxot/dev
<<<<<<< .merge_file_2WBiLC
=======
>>>>>>> .merge_file_O5DBQE
>>>>>>> .merge_file_t34Vnk
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
<<<<<<< .merge_file_2WBiLC
=======
<<<<<<< .merge_file_HTnb9U
     * @param  array<string, mixed>  $v
=======
>>>>>>> .merge_file_t34Vnk
<<<<<<< HEAD
     * @param  array<string, mixed>  $v
=======
<<<<<<< .merge_file_4coui0
<<<<<<< HEAD
     * @param  array<string, mixed>  $v
=======
     * @param array<string, mixed> $v
>>>>>>> laraxot/dev
=======
     * @param array<string, mixed> $v
>>>>>>> .merge_file_HM2Wfa
>>>>>>> laraxot/dev
<<<<<<< .merge_file_2WBiLC
=======
>>>>>>> .merge_file_O5DBQE
>>>>>>> .merge_file_t34Vnk
     */
    private function getUri(array $v, ?string $_namespace): string
    {
        Assert::string($name = $v['name']);

        return $name;
    }

    /**
<<<<<<< .merge_file_2WBiLC
<<<<<<< HEAD
     * @param  array<string, mixed>  $v
=======
<<<<<<< .merge_file_4coui0
<<<<<<< HEAD
     * @param  array<string, mixed>  $v
=======
=======
<<<<<<< .merge_file_HTnb9U
     * @param  array<string, mixed>  $v
=======
<<<<<<< HEAD
     * @param  array<string, mixed>  $v
=======
<<<<<<< .merge_file_4coui0
<<<<<<< HEAD
     * @param  array<string, mixed>  $v
=======
>>>>>>> .merge_file_t34Vnk
     * @param array<string, mixed> $v
>>>>>>> laraxot/dev
=======
     * @param array<string, mixed> $v
>>>>>>> .merge_file_HM2Wfa
>>>>>>> laraxot/dev
<<<<<<< .merge_file_2WBiLC
=======
>>>>>>> .merge_file_O5DBQE
>>>>>>> .merge_file_t34Vnk
     */
    private function getUses(array $v, ?string $namespace): string
    {
        $controller = $this->getController($v, $namespace);
        $act = $this->getAct($v, $namespace);

        return $controller.'@'.$act;
    }

    /**
<<<<<<< .merge_file_2WBiLC
=======
<<<<<<< .merge_file_HTnb9U
     * @param  array<string, mixed>  $v
=======
>>>>>>> .merge_file_t34Vnk
<<<<<<< HEAD
     * @param  array<string, mixed>  $v
=======
<<<<<<< .merge_file_4coui0
<<<<<<< HEAD
     * @param  array<string, mixed>  $v
=======
     * @param array<string, mixed> $v
     *
>>>>>>> laraxot/dev
=======
     * @param array<string, mixed> $v
     *
>>>>>>> .merge_file_HM2Wfa
>>>>>>> laraxot/dev
<<<<<<< .merge_file_2WBiLC
=======
>>>>>>> .merge_file_O5DBQE
>>>>>>> .merge_file_t34Vnk
     * @return array<string, mixed>
     */
    private function getCallback(array $v, ?string $namespace, ?string $curr): array
    {
        Assert::string($name = $v['name']);
        $as = Str::slug($name);
        $uses = $this->getUses($v, $namespace);
<<<<<<< .merge_file_2WBiLC
=======
<<<<<<< .merge_file_HTnb9U
        $uses = $curr !== null
=======
>>>>>>> .merge_file_t34Vnk
<<<<<<< HEAD
        $uses = $curr !== null
=======
<<<<<<< .merge_file_4coui0
<<<<<<< HEAD
        $uses = $curr !== null
=======
        $uses = null !== $curr
>>>>>>> laraxot/dev
=======
        $uses = null !== $curr
>>>>>>> .merge_file_HM2Wfa
>>>>>>> laraxot/dev
<<<<<<< .merge_file_2WBiLC
=======
>>>>>>> .merge_file_O5DBQE
>>>>>>> .merge_file_t34Vnk
            ? '\\'.$this->namespaceStart.'\\'.$curr.'\\'.$uses
            : '\\'.$this->namespaceStart.'\\'.$uses;

        return ['as' => $as, 'uses' => $uses];
    }

    /**
<<<<<<< .merge_file_2WBiLC
=======
<<<<<<< .merge_file_HTnb9U
=======
>>>>>>> .merge_file_t34Vnk
<<<<<<< HEAD
=======
<<<<<<< .merge_file_4coui0
<<<<<<< HEAD
>>>>>>> laraxot/dev
<<<<<<< .merge_file_2WBiLC
=======
>>>>>>> .merge_file_O5DBQE
>>>>>>> .merge_file_t34Vnk
     * @param  array<string, mixed>  $v
     */
    private function createRouteResource(array $v, ?string $namespace): void
    {
        if ($v['name'] === null) {
<<<<<<< .merge_file_2WBiLC
=======
<<<<<<< .merge_file_HTnb9U
=======
>>>>>>> .merge_file_t34Vnk
<<<<<<< HEAD
=======
=======
=======
>>>>>>> .merge_file_HM2Wfa
     * @param array<string, mixed> $v
     */
    private function createRouteResource(array $v, ?string $namespace): void
    {
        if (null === $v['name']) {
<<<<<<< .merge_file_4coui0
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_HM2Wfa
>>>>>>> laraxot/dev
<<<<<<< .merge_file_2WBiLC
=======
>>>>>>> .merge_file_O5DBQE
>>>>>>> .merge_file_t34Vnk
            return;
        }
        Assert::string($name = $v['name']);
        $opts = $this->getResourceOpts($v, $namespace);
        $controller = $this->getController($v, $namespace);

        Route::resource($name, $controller, $opts);
    }

    /**
<<<<<<< .merge_file_2WBiLC
<<<<<<< HEAD
     * @param  array<string, mixed>  $v
=======
<<<<<<< .merge_file_4coui0
<<<<<<< HEAD
     * @param  array<string, mixed>  $v
=======
=======
<<<<<<< .merge_file_HTnb9U
     * @param  array<string, mixed>  $v
=======
<<<<<<< HEAD
     * @param  array<string, mixed>  $v
=======
<<<<<<< .merge_file_4coui0
<<<<<<< HEAD
     * @param  array<string, mixed>  $v
=======
>>>>>>> .merge_file_t34Vnk
     * @param array<string, mixed> $v
>>>>>>> laraxot/dev
=======
     * @param array<string, mixed> $v
>>>>>>> .merge_file_HM2Wfa
>>>>>>> laraxot/dev
<<<<<<< .merge_file_2WBiLC
=======
>>>>>>> .merge_file_O5DBQE
>>>>>>> .merge_file_t34Vnk
     */
    private function createRouteSubs(array $v, ?string $namespace, ?string $curr): void
    {
        if (! isset($v['subs'])) {
            return;
        }

        $subNamespace = $this->getNamespace($v, $namespace);
        $curr = $curr ?? $subNamespace;
        Assert::isArray($subs = $v['subs']);
<<<<<<< .merge_file_2WBiLC
<<<<<<< HEAD
        /** @var array<int, array<string, mixed>> $subs */
=======
<<<<<<< .merge_file_4coui0
<<<<<<< HEAD
        /** @var array<int, array<string, mixed>> $subs */
=======
=======
<<<<<<< .merge_file_HTnb9U
        /** @var array<int, array<string, mixed>> $subs */
=======
<<<<<<< HEAD
        /** @var array<int, array<string, mixed>> $subs */
=======
<<<<<<< .merge_file_4coui0
<<<<<<< HEAD
        /** @var array<int, array<string, mixed>> $subs */
=======
>>>>>>> .merge_file_t34Vnk
        /* @var array<int, array<string, mixed>> $subs */
>>>>>>> laraxot/dev
=======
        /* @var array<int, array<string, mixed>> $subs */
>>>>>>> .merge_file_HM2Wfa
>>>>>>> laraxot/dev
<<<<<<< .merge_file_2WBiLC
=======
>>>>>>> .merge_file_O5DBQE
>>>>>>> .merge_file_t34Vnk
        $this->execute($subs, $subNamespace, null, $curr);
    }

    /**
<<<<<<< .merge_file_2WBiLC
<<<<<<< HEAD
     * @param  array<string, mixed>  $v
=======
<<<<<<< .merge_file_4coui0
<<<<<<< HEAD
     * @param  array<string, mixed>  $v
=======
=======
<<<<<<< .merge_file_HTnb9U
     * @param  array<string, mixed>  $v
=======
<<<<<<< HEAD
     * @param  array<string, mixed>  $v
=======
<<<<<<< .merge_file_4coui0
<<<<<<< HEAD
     * @param  array<string, mixed>  $v
=======
>>>>>>> .merge_file_t34Vnk
     * @param array<string, mixed> $v
>>>>>>> laraxot/dev
=======
     * @param array<string, mixed> $v
>>>>>>> .merge_file_HM2Wfa
>>>>>>> laraxot/dev
<<<<<<< .merge_file_2WBiLC
=======
>>>>>>> .merge_file_O5DBQE
>>>>>>> .merge_file_t34Vnk
     */
    private function createRouteActs(array $v, ?string $namespace, ?string $curr): void
    {
        if (! isset($v['acts']) || ! is_array($v['acts'])) {
            return;
        }

        $controller = $this->getController($v, $namespace);
        foreach ($v['acts'] as $v1) {
            Assert::isArray($v1);
<<<<<<< .merge_file_2WBiLC
=======
<<<<<<< .merge_file_HTnb9U
            /** @var array<string, mixed> $v1 */
=======
>>>>>>> .merge_file_t34Vnk
<<<<<<< HEAD
            /** @var array<string, mixed> $v1 */
=======
<<<<<<< .merge_file_4coui0
<<<<<<< HEAD
            /** @var array<string, mixed> $v1 */
=======
            /* @var array<string, mixed> $v1 */
>>>>>>> laraxot/dev
=======
            /* @var array<string, mixed> $v1 */
>>>>>>> .merge_file_HM2Wfa
>>>>>>> laraxot/dev
<<<<<<< .merge_file_2WBiLC
=======
>>>>>>> .merge_file_O5DBQE
>>>>>>> .merge_file_t34Vnk
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
<<<<<<< .merge_file_2WBiLC
=======
<<<<<<< .merge_file_HTnb9U
        if (mb_substr($prefix, -1) === '.') {
=======
>>>>>>> .merge_file_t34Vnk
<<<<<<< HEAD
        if (mb_substr($prefix, -1) === '.') {
=======
<<<<<<< .merge_file_4coui0
<<<<<<< HEAD
        if (mb_substr($prefix, -1) === '.') {
=======
        if ('.' === mb_substr($prefix, -1)) {
>>>>>>> laraxot/dev
=======
        if ('.' === mb_substr($prefix, -1)) {
>>>>>>> .merge_file_HM2Wfa
>>>>>>> laraxot/dev
<<<<<<< .merge_file_2WBiLC
=======
>>>>>>> .merge_file_O5DBQE
>>>>>>> .merge_file_t34Vnk
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
