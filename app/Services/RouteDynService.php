<?php

declare(strict_types=1);

namespace Modules\Xot\Services;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
<<<<<<< HEAD
<<<<<<< .merge_file_Apwdhh
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
<<<<<<< HEAD
>>>>>>> da9ae01a0 (.)
<<<<<<< .merge_file_4GRpgC
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_r8FQuL
use Webmozart\Assert\Assert;

use function Safe\preg_replace;

<<<<<<< .merge_file_Apwdhh
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
<<<<<<< HEAD
=======
>>>>>>> .merge_file_b3gExn
=======
<<<<<<< HEAD
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)

use function Safe\preg_replace;

use Webmozart\Assert\Assert;

<<<<<<< HEAD
<<<<<<< .merge_file_4GRpgC
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_b3gExn
=======
<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_r8FQuL
=======
>>>>>>> laraxot/dev
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
/**
 * Class RouteDynService.
 */
class RouteDynService
{
    private static string $namespace_start = '';

    // Commentato: La proprietà $curr non viene mai letta, quindi potrebbe essere rimossa
    // private static ?string $curr = null;

    /**
<<<<<<< HEAD
     * @param  array<string, mixed>  $v
<<<<<<< .merge_file_Apwdhh
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_4GRpgC
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
>>>>>>> .merge_file_b3gExn
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
     * @param array<string, mixed> $v
     *
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_r8FQuL
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
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
<<<<<<< .merge_file_Apwdhh
<<<<<<< HEAD
     * @param  array<string, mixed>  $v
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_4GRpgC
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
>>>>>>> .merge_file_b3gExn
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
     * @param array<string, mixed> $v
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
     * @param  array<string, mixed>  $v
>>>>>>> .merge_file_r8FQuL
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
     */
    public static function getPrefix(array $v, ?string $namespace): string
    {
        if (isset($v['prefix'])) {
            Assert::string($prefix = $v['prefix'], __FILE__.':'.__LINE__.' - '.class_basename(__CLASS__));

            return $prefix;
        }

        Assert::string($name = $v['name'], __FILE__.':'.__LINE__.' - '.class_basename(__CLASS__));
        $prefix = mb_strtolower($name);
        $param_name = self::getParamName($v, $namespace);
<<<<<<< HEAD
<<<<<<< .merge_file_Apwdhh
<<<<<<< HEAD
        if ($param_name !== '') {
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_4GRpgC
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
        if ($param_name !== '') {
=======
        if ('' !== $param_name) {
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
        if ('' !== $param_name) {
>>>>>>> .merge_file_b3gExn
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
        if ('' !== $param_name) {
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
        if ($param_name !== '') {
>>>>>>> .merge_file_r8FQuL
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
            return $prefix.'/{'.$param_name.'}';
        }

        return $prefix;
    }

    /**
<<<<<<< HEAD
     * @param  array<string, mixed>  $v
<<<<<<< .merge_file_Apwdhh
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_4GRpgC
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
>>>>>>> .merge_file_b3gExn
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
     * @param array<string, mixed> $v
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_r8FQuL
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
     */
    public static function getAs(array $v, ?string $_namespace): string
    {
        if (isset($v['as'])) {
            Assert::string($as = $v['as'], __FILE__.':'.__LINE__.' - '.class_basename(__CLASS__));

            return $as;
        }

        Assert::string($name = $v['name'], __FILE__.':'.__LINE__.' - '.class_basename(__CLASS__));
        $as = mb_strtolower($name);
        $as = str_replace('/', '.', $as);

        // Assicuriamoci che $as sia una stringa prima di usare preg_replace
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
<<<<<<< .merge_file_Apwdhh
<<<<<<< HEAD
     * @param  array<string, mixed>  $v
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_4GRpgC
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
>>>>>>> .merge_file_b3gExn
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
     * @param array<string, mixed> $v
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
     * @param  array<string, mixed>  $v
>>>>>>> .merge_file_r8FQuL
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
     */
    public static function getNamespace(array $v, ?string $namespace): ?string
    {
        if (isset($v['namespace'])) {
            Assert::string($namespace = $v['namespace'], __FILE__.':'.__LINE__.' - '.class_basename(__CLASS__));

            return $namespace;
        }

        Assert::string($namespace = $v['name'], __FILE__.':'.__LINE__.' - '.class_basename(__CLASS__));
        $namespace = str_replace(['{', '}'], '', $namespace);
<<<<<<< HEAD
        if ($namespace === '') {
<<<<<<< .merge_file_Apwdhh
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_4GRpgC
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
>>>>>>> .merge_file_b3gExn
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
        if ('' === $namespace) {
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_r8FQuL
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
<<<<<<< .merge_file_Apwdhh
<<<<<<< HEAD
     * @param  array<string, mixed>  $v
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_4GRpgC
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
>>>>>>> .merge_file_b3gExn
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
     * @param array<string, mixed> $v
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
     * @param  array<string, mixed>  $v
>>>>>>> .merge_file_r8FQuL
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
     */
    public static function getAct(array $v, ?string $_namespace): string
    {
        if (isset($v['act'])) {
            Assert::string($act = $v['act'], __FILE__.':'.__LINE__.' - '.class_basename(__CLASS__));

            return $act;
        }

        Assert::nullOrString($v['act'] = $v['name']);
        Assert::nullOrString($v['act']);

        // Convertiamo esplicitamente a stringa e gestiamo il caso null
        $act = (string) ($v['act'] ?? '');

        // Applichiamo le trasformazioni in modo sicuro
        $replaced = preg_replace('/{.*}\//', '', $act);
        $act = is_string($replaced) ? $replaced : $act;
        $act = str_replace('/', '_', $act);

        // Assicuriamoci che sia una stringa prima di usare Str::camel
        $camelCase = Str::camel($act);
        $act = str_replace(['{', '}'], '', $camelCase);

        return Str::camel($act);
    }

    /**
<<<<<<< HEAD
<<<<<<< .merge_file_Apwdhh
<<<<<<< HEAD
     * @param  array<string, mixed>  $v
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_4GRpgC
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
>>>>>>> .merge_file_b3gExn
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
     * @param array<string, mixed> $v
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
     * @param  array<string, mixed>  $v
>>>>>>> .merge_file_r8FQuL
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
     */
    public static function getParamName(array $v, ?string $_namespace): string
    {
        if (isset($v['param_name'])) {
            Assert::string($param_name = $v['param_name'], __FILE__.':'.__LINE__.' - '.class_basename(__CLASS__));

            return $param_name;
        }

        Assert::string($name = $v['name'], __FILE__.':'.__LINE__.' - '.class_basename(__CLASS__));
        $param_name = 'id_'.$name;
        $param_name = str_replace(['{', '}'], '', $param_name);

        return mb_strtolower($param_name);
    }

    /**
<<<<<<< HEAD
     * @param  array<string, mixed>  $v
<<<<<<< .merge_file_Apwdhh
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_4GRpgC
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
>>>>>>> .merge_file_b3gExn
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
     * @param array<string, mixed> $v
     *
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_r8FQuL
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
     * @return array<int, string>
     */
    public static function getParamsName(array $v, ?string $namespace): array
    {
        $param_name = self::getParamName($v, $namespace);

        return [$param_name];
    }

    /**
<<<<<<< HEAD
<<<<<<< .merge_file_Apwdhh
<<<<<<< HEAD
     * @param  array<string, mixed>  $v
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_4GRpgC
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
>>>>>>> .merge_file_b3gExn
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
     * @param array<string, mixed> $v
     *
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
     * @param  array<string, mixed>  $v
>>>>>>> .merge_file_r8FQuL
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
     * @return array<string, mixed>
     */
    public static function getResourceOpts(array $v, ?string $namespace): array
    {
        $param_name = self::getParamName($v, $namespace);
        $params_name = self::getParamsName($v, $namespace);
        Assert::isArray($params_name);

        Assert::string($v['name']);

        $opts = [
            'parameters' => [mb_strtolower($v['name']) => implode('}/{', $params_name)],
            'names' => self::prefixedResourceNames(self::getAs($v, $namespace)),
        ];

        if (isset($v['only'])) {
            $opts['only'] = $v['only'];
        }

<<<<<<< HEAD
        if ($param_name === '' && ! isset($opts['only'])) {
<<<<<<< .merge_file_Apwdhh
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_4GRpgC
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
        if ($param_name === '' && ! isset($opts['only'])) {
=======
        if ('' === $param_name && ! isset($opts['only'])) {
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
        if ('' === $param_name && ! isset($opts['only'])) {
>>>>>>> .merge_file_b3gExn
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
        if ('' === $param_name && ! isset($opts['only'])) {
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_r8FQuL
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
            $opts['only'] = ['index'];
        }

        $opts['where'] = array_fill_keys($params_name, '[0-9]+');

        return $opts;
    }

    /**
<<<<<<< HEAD
<<<<<<< .merge_file_Apwdhh
<<<<<<< HEAD
     * @param  array<string, mixed>  $v
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_4GRpgC
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
>>>>>>> .merge_file_b3gExn
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
     * @param array<string, mixed> $v
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
     * @param  array<string, mixed>  $v
>>>>>>> .merge_file_r8FQuL
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
     */
    public static function getController(array $v, ?string $_namespace): string
    {
        if (isset($v['controller'])) {
            Assert::string($controller = $v['controller'], __FILE__.':'.__LINE__.' - '.class_basename(__CLASS__));

            return $controller;
        }

        Assert::string($v['controller'] = $v['name'], __FILE__.':'.__LINE__.' - '.class_basename(__CLASS__));
        $v['controller'] = str_replace(['/', '{', '}'], ['_', '', ''], $v['controller']);
        $v['controller'] = Str::studly($v['controller']);
        $v['controller'] .= 'Controller';

        return $v['controller'];
    }

    /**
<<<<<<< HEAD
     * @param  array<string, mixed>  $v
<<<<<<< .merge_file_Apwdhh
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_4GRpgC
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
>>>>>>> .merge_file_b3gExn
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
     * @param array<string, mixed> $v
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_r8FQuL
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
     */
    public static function getUri(array $v, ?string $_namespace): string
    {
        Assert::string($name = $v['name'], __FILE__.':'.__LINE__.' - '.class_basename(__CLASS__));

        // return mb_strtolower(is_string($v) ? $v : (string) $v['name);
        return $name;
    }

    /**
<<<<<<< HEAD
<<<<<<< .merge_file_Apwdhh
<<<<<<< HEAD
     * @param  array<string, mixed>  $v
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_4GRpgC
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
>>>>>>> .merge_file_b3gExn
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
     * @param array<string, mixed> $v
     *
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
     * @param  array<string, mixed>  $v
>>>>>>> .merge_file_r8FQuL
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
     * @return array<int, string>
     */
    public static function getMethod(array $v, ?string $_namespace): array
    {
        if (isset($v['method'])) {
<<<<<<< HEAD
            /** @var array<int, string> */
<<<<<<< .merge_file_Apwdhh
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_4GRpgC
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
            /** @var array<int, string> */
=======
            /* @var array<int, string> */
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
            /* @var array<int, string> */
>>>>>>> .merge_file_b3gExn
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
            /* @var array<int, string> */
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_r8FQuL
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
            return Arr::wrap($v['method']);
        }

        return ['get', 'post'];
    }

    /**
<<<<<<< HEAD
<<<<<<< .merge_file_Apwdhh
<<<<<<< HEAD
     * @param  array<string, mixed>  $v
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_4GRpgC
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
>>>>>>> .merge_file_b3gExn
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
     * @param array<string, mixed> $v
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
     * @param  array<string, mixed>  $v
>>>>>>> .merge_file_r8FQuL
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
     */
    public static function getUses(array $v, ?string $namespace): string
    {
        $controller = self::getController($v, $namespace);
        $act = self::getAct($v, $namespace);

        return $controller.'@'.$act;
    }

    /**
<<<<<<< HEAD
<<<<<<< .merge_file_Apwdhh
<<<<<<< HEAD
     * @param  array<string, mixed>  $v
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_4GRpgC
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
>>>>>>> .merge_file_b3gExn
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
     * @param array<string, mixed> $v
     *
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
     * @param  array<string, mixed>  $v
>>>>>>> .merge_file_r8FQuL
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
     * @return array<string, mixed>
     */
    public static function getCallback(array $v, ?string $namespace, ?string $curr): array
    {
        Assert::string($name = $v['name'], __FILE__.':'.__LINE__.' - '.class_basename(__CLASS__));
        $as = Str::slug($name);
        $uses = self::getUses($v, $namespace);
<<<<<<< HEAD
        if ($curr !== null) {
<<<<<<< .merge_file_Apwdhh
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_4GRpgC
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
        if ($curr !== null) {
=======
        if (null !== $curr) {
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
        if (null !== $curr) {
>>>>>>> .merge_file_b3gExn
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
        if (null !== $curr) {
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_r8FQuL
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
            $uses = '\\'.self::$namespace_start.'\\'.$curr.'\\'.$uses;
        } else {
            $uses = '\\'.self::$namespace_start.'\\'.$uses;
        }

        return ['as' => $as, 'uses' => $uses];
    }

    /**
<<<<<<< HEAD
<<<<<<< .merge_file_Apwdhh
<<<<<<< HEAD
     * @param  array<int, array<string, mixed>>  $array
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_4GRpgC
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
>>>>>>> .merge_file_b3gExn
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
     * @param array<int, array<string, mixed>> $array
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
     * @param  array<int, array<string, mixed>>  $array
>>>>>>> .merge_file_r8FQuL
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
     */
    public static function dynamic_route(
        array $array,
        ?string $namespace = null,
        ?string $namespace_start = null,
        ?string $curr = null,
    ): void {
        Assert::isArray($array, 'The $array parameter must be an array.');
        Assert::notEmpty($array, 'The $array parameter cannot be empty.');

<<<<<<< HEAD
        if ($namespace_start !== null) {
<<<<<<< .merge_file_Apwdhh
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_4GRpgC
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
        if ($namespace_start !== null) {
=======
        if (null !== $namespace_start) {
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
        if (null !== $namespace_start) {
>>>>>>> .merge_file_b3gExn
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
        if (null !== $namespace_start) {
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_r8FQuL
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
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
<<<<<<< .merge_file_Apwdhh
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
<<<<<<< HEAD
>>>>>>> da9ae01a0 (.)
<<<<<<< .merge_file_4GRpgC
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_r8FQuL
     * @param  array<string, mixed>  $v
     */
    public static function createRouteResource(array $v, ?string $namespace): void
    {
        if ($v['name'] === null) {
<<<<<<< .merge_file_Apwdhh
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
<<<<<<< HEAD
=======
>>>>>>> .merge_file_b3gExn
=======
<<<<<<< HEAD
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
     * @param array<string, mixed> $v
     */
    public static function createRouteResource(array $v, ?string $namespace): void
    {
        if (null === $v['name']) {
<<<<<<< HEAD
<<<<<<< .merge_file_4GRpgC
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_b3gExn
=======
<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_r8FQuL
=======
>>>>>>> laraxot/dev
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
            return;
        }
        Assert::string($name = $v['name'], __FILE__.':'.__LINE__.' - '.class_basename(__CLASS__));
        $opts = self::getResourceOpts($v, $namespace);
        $controller = self::getController($v, $namespace);

        Route::resource($name, $controller, $opts);
    }

    /**
<<<<<<< HEAD
     * @param  array<string, mixed>  $v
<<<<<<< .merge_file_Apwdhh
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_4GRpgC
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
>>>>>>> .merge_file_b3gExn
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
     * @param array<string, mixed> $v
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_r8FQuL
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
     */
    public static function createRouteSubs(array $v, ?string $namespace, ?string $curr): void
    {
        if (! isset($v['subs'])) {
            return;
        }

        $sub_namespace = self::getNamespace($v, $namespace);
<<<<<<< HEAD
        $curr = $curr === null ? $sub_namespace : $curr;
        Assert::isArray($subs = $v['subs']);
        /** @var array<int, array<string, mixed>> $subs */
<<<<<<< .merge_file_Apwdhh
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_4GRpgC
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
        $curr = $curr === null ? $sub_namespace : $curr;
        Assert::isArray($subs = $v['subs']);
        /** @var array<int, array<string, mixed>> $subs */
=======
=======
>>>>>>> 3792da0d (Check & fix styling)
        $curr = null === $curr ? $sub_namespace : $curr;
        Assert::isArray($subs = $v['subs']);
        /* @var array<int, array<string, mixed>> $subs */
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
        $curr = null === $curr ? $sub_namespace : $curr;
        Assert::isArray($subs = $v['subs']);
        /* @var array<int, array<string, mixed>> $subs */
>>>>>>> .merge_file_b3gExn
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_r8FQuL
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
        self::dynamic_route($subs, $sub_namespace, null, $curr);
    }

    /**
<<<<<<< HEAD
<<<<<<< .merge_file_Apwdhh
<<<<<<< HEAD
     * @param  array<string, mixed>  $v
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_4GRpgC
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
>>>>>>> .merge_file_b3gExn
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
     * @param array<string, mixed> $v
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
     * @param  array<string, mixed>  $v
>>>>>>> .merge_file_r8FQuL
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
     */
    public static function createRouteActs(array $v, ?string $namespace, ?string $curr): void
    {
        if (! isset($v['acts']) || ! is_array($v['acts'])) {
            return;
        }

        $controller = self::getController($v, $namespace);
        foreach ($v['acts'] as $v1) {
            Assert::isArray($v1);
<<<<<<< HEAD
            /** @var array<string, mixed> $v1 */
<<<<<<< .merge_file_Apwdhh
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_4GRpgC
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
>>>>>>> .merge_file_b3gExn
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
            /* @var array<string, mixed> $v1 */
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_r8FQuL
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
            $v1['controller'] = $controller;

            $method = self::getMethod($v1, $namespace);
            $uri = self::getUri($v1, $namespace);
            $callback = self::getCallback($v1, $namespace, $curr);
            Route::match($method, $uri, $callback);
        }
    }

    /**
     * @return array<string, string>
     */
    public static function prefixedResourceNames(string $prefix): array
    {
<<<<<<< HEAD
<<<<<<< .merge_file_Apwdhh
<<<<<<< HEAD
        if (mb_substr($prefix, -1) === '.') {
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_4GRpgC
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
>>>>>>> .merge_file_b3gExn
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
        if ('.' === mb_substr($prefix, -1)) {
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
        if (mb_substr($prefix, -1) === '.') {
>>>>>>> .merge_file_r8FQuL
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

    // --------------------------------------------------
}
