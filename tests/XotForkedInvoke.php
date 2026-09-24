<?php

declare(strict_types=1);

namespace Modules\Xot\Tests;

use Illuminate\Database\Eloquent\Model;
use Modules\Xot\Models\Cache;
use PHPUnit\Framework\Assert;
<<<<<<< .merge_file_VtsjQZ
<<<<<<< HEAD
use ReflectionClass;
use ReflectionMethod;
use ReflectionNamedType;
use SplFileInfo;
=======
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_KrOiI6

use function Safe\posix_kill;
use function Safe\preg_match;

/**
 * Invoca metodi in processo figlio con timeout (pcntl) per evitare hang DB/rete.
 */
final class XotForkedInvoke
{
    /**
<<<<<<< .merge_file_VtsjQZ
<<<<<<< HEAD
     * @param  list<string>  $denyMethodRegexes
=======
     * @param list<string> $denyMethodRegexes
>>>>>>> laraxot/dev
=======
     * @param list<string> $denyMethodRegexes
>>>>>>> .merge_file_KrOiI6
     */
    public static function sweepClass(
        string $class,
        int $timeoutSeconds = 3,
        array $denyMethodRegexes = [],
        ?object $instance = null,
    ): int {
        if (! class_exists($class) && ! trait_exists($class) && ! enum_exists($class)) {
            return 0;
        }

<<<<<<< .merge_file_VtsjQZ
<<<<<<< HEAD
        $ref = new ReflectionClass($class);
=======
        $ref = new \ReflectionClass($class);
>>>>>>> laraxot/dev
=======
        $ref = new \ReflectionClass($class);
>>>>>>> .merge_file_KrOiI6

        if ($ref->isInterface()) {
            return 0;
        }

        $executed = 0;

        if ($ref->isEnum()) {
            return self::sweepEnum($class, $timeoutSeconds);
        }

<<<<<<< .merge_file_VtsjQZ
<<<<<<< HEAD
        if ($instance === null && ! $ref->isAbstract() && ! $ref->isTrait()) {
=======
        if (null === $instance && ! $ref->isAbstract() && ! $ref->isTrait()) {
>>>>>>> laraxot/dev
=======
        if (null === $instance && ! $ref->isAbstract() && ! $ref->isTrait()) {
>>>>>>> .merge_file_KrOiI6
            try {
                $instance = $ref->newInstanceWithoutConstructor();
                if ($instance instanceof Model) {
                    $instance->setRawAttributes([
                        'id' => 1,
                        'key' => 'k',
                        'value' => 'v',
                        'name' => 'n',
                        'email' => 'a@b.c',
                    ]);
                }
            } catch (\Throwable) {
                $instance = null;
            }
        }

<<<<<<< .merge_file_VtsjQZ
<<<<<<< HEAD
        foreach ($ref->getMethods(ReflectionMethod::IS_PUBLIC | ReflectionMethod::IS_PROTECTED | ReflectionMethod::IS_PRIVATE) as $method) {
=======
        foreach ($ref->getMethods(\ReflectionMethod::IS_PUBLIC | \ReflectionMethod::IS_PROTECTED | \ReflectionMethod::IS_PRIVATE) as $method) {
>>>>>>> laraxot/dev
=======
        foreach ($ref->getMethods(\ReflectionMethod::IS_PUBLIC | \ReflectionMethod::IS_PROTECTED | \ReflectionMethod::IS_PRIVATE) as $method) {
>>>>>>> .merge_file_KrOiI6
            if ($method->getDeclaringClass()->getName() !== $class) {
                continue;
            }
            if (str_starts_with($method->getName(), '__')) {
                continue;
            }
            $skip = false;
            foreach ($denyMethodRegexes as $rx) {
                if (preg_match($rx, $method->getName())) {
                    $skip = true;
                    break;
                }
            }
            if ($skip) {
                continue;
            }
            if (in_array($method->getName(), [
                'boot', 'booted', 'register', 'booting', 'mount', 'render', 'handle',
                'save', 'delete', 'create', 'update', 'migrate',
            ], true)) {
                continue;
            }
            if ($method->getNumberOfRequiredParameters() > 4) {
                continue;
            }

            $args = self::defaultArgs($method);
            $ok = self::invokeWithTimeout(
                static function () use ($method, $instance, $args): void {
                    $method->setAccessible(true);
                    if ($method->isStatic()) {
                        $method->invoke(null, ...$args);
<<<<<<< .merge_file_VtsjQZ
<<<<<<< HEAD
                    } elseif ($instance !== null) {
=======
                    } elseif (null !== $instance) {
>>>>>>> laraxot/dev
=======
                    } elseif (null !== $instance) {
>>>>>>> .merge_file_KrOiI6
                        $method->invoke($instance, ...$args);
                    }
                },
                $timeoutSeconds,
            );
            if ($ok) {
<<<<<<< .merge_file_VtsjQZ
<<<<<<< HEAD
                $executed++;
=======
                ++$executed;
>>>>>>> laraxot/dev
=======
                ++$executed;
>>>>>>> .merge_file_KrOiI6
            }
        }

        return $executed;
    }

    /**
<<<<<<< .merge_file_VtsjQZ
<<<<<<< HEAD
     * @param  class-string  $enumClass
=======
     * @param class-string $enumClass
>>>>>>> laraxot/dev
=======
     * @param class-string $enumClass
>>>>>>> .merge_file_KrOiI6
     */
    private static function sweepEnum(string $enumClass, int $timeoutSeconds): int
    {
        $executed = 0;
        try {
            if (! is_subclass_of($enumClass, \UnitEnum::class)) {
                return 0;
            }
            foreach ($enumClass::cases() as $case) {
                foreach (['getLabel', 'getColor', 'getIcon', 'getDescription', 'shortLabel', 'isWeekend', 'next'] as $m) {
                    if (! method_exists($case, $m)) {
                        continue;
                    }
                    if (self::invokeWithTimeout(static fn () => $case->{$m}(), $timeoutSeconds)) {
<<<<<<< .merge_file_VtsjQZ
<<<<<<< HEAD
                        $executed++;
=======
                        ++$executed;
>>>>>>> laraxot/dev
=======
                        ++$executed;
>>>>>>> .merge_file_KrOiI6
                    }
                }
            }
            foreach (['workingDays', 'weekendDays', 'toArray', 'getFormSchema', 'getSearchable'] as $sm) {
                if (! method_exists($enumClass, $sm)) {
                    continue;
                }
<<<<<<< .merge_file_VtsjQZ
<<<<<<< HEAD
                $method = new ReflectionMethod($enumClass, $sm);
                if (self::invokeWithTimeout(static fn () => $method->invoke(null), $timeoutSeconds)) {
                    $executed++;
                }
            }
        } catch (\Throwable) {
            $executed++;
=======
=======
>>>>>>> .merge_file_KrOiI6
                $method = new \ReflectionMethod($enumClass, $sm);
                if (self::invokeWithTimeout(static fn () => $method->invoke(null), $timeoutSeconds)) {
                    ++$executed;
                }
            }
        } catch (\Throwable) {
            ++$executed;
<<<<<<< .merge_file_VtsjQZ
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_KrOiI6
        }

        return $executed;
    }

    /**
     * @return list<mixed>
     */
<<<<<<< .merge_file_VtsjQZ
<<<<<<< HEAD
    public static function defaultArgs(ReflectionMethod $method): array
=======
    public static function defaultArgs(\ReflectionMethod $method): array
>>>>>>> laraxot/dev
=======
    public static function defaultArgs(\ReflectionMethod $method): array
>>>>>>> .merge_file_KrOiI6
    {
        $args = [];
        foreach ($method->getParameters() as $param) {
            if ($param->isDefaultValueAvailable()) {
                $args[] = $param->getDefaultValue();

                continue;
            }
            $type = $param->getType();
            $name = $param->getName();
<<<<<<< .merge_file_VtsjQZ
<<<<<<< HEAD
            if ($type instanceof ReflectionNamedType) {
                $tn = $type->getName();
                $args[] = match (true) {
                    $tn === 'string' => str_contains(strtolower($name), 'class')
                        ? Cache::class
                        : (str_contains(strtolower($name), 'email') ? 'a@b.c' : 'test'),
                    $tn === 'array' => [],
                    $tn === 'bool' => true,
                    $tn === 'int' => 1,
                    $tn === 'float' => 1.0,
                    is_a($tn, Model::class, true) => (static function () use ($tn): Model {
                        if ($tn === Model::class || (new ReflectionClass($tn))->isAbstract()) {
                            $m = new Cache;
                        } else {
                            $m = new $tn;
=======
=======
>>>>>>> .merge_file_KrOiI6
            if ($type instanceof \ReflectionNamedType) {
                $tn = $type->getName();
                $args[] = match (true) {
                    'string' === $tn => str_contains(strtolower($name), 'class')
                        ? Cache::class
                        : (str_contains(strtolower($name), 'email') ? 'a@b.c' : 'test'),
                    'array' === $tn => [],
                    'bool' === $tn => true,
                    'int' === $tn => 1,
                    'float' === $tn => 1.0,
                    is_a($tn, Model::class, true) => (static function () use ($tn): Model {
                        if (Model::class === $tn || (new \ReflectionClass($tn))->isAbstract()) {
                            $m = new Cache();
                        } else {
                            $m = new $tn();
<<<<<<< .merge_file_VtsjQZ
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_KrOiI6
                        }
                        $m->setRawAttributes(['id' => 1, 'key' => 'k', 'value' => 'v']);

                        return $m;
                    })(),
                    default => null,
                };
            } else {
                $args[] = null;
            }
        }

        return $args;
    }

    public static function invokeWithTimeout(callable $fn, int $timeoutSeconds = 3): bool
    {
        if (! function_exists('pcntl_fork') || ! function_exists('pcntl_alarm')) {
            try {
                $fn();

                return true;
            } catch (\Throwable) {
                return false;
            }
        }

        $pid = pcntl_fork();
<<<<<<< .merge_file_VtsjQZ
<<<<<<< HEAD
        if ($pid === -1) {
=======
        if (-1 === $pid) {
>>>>>>> laraxot/dev
=======
        if (-1 === $pid) {
>>>>>>> .merge_file_KrOiI6
            try {
                $fn();

                return true;
            } catch (\Throwable) {
                return false;
            }
        }

<<<<<<< .merge_file_VtsjQZ
<<<<<<< HEAD
        if ($pid === 0) {
=======
        if (0 === $pid) {
>>>>>>> laraxot/dev
=======
        if (0 === $pid) {
>>>>>>> .merge_file_KrOiI6
            // child
            pcntl_alarm($timeoutSeconds);
            try {
                $fn();
                exit(0);
            } catch (\Throwable) {
                exit(1);
            }
        }

        // parent
        $status = 0;
        $waited = 0;
        while ($waited < ($timeoutSeconds + 1) * 10) {
            $res = pcntl_waitpid($pid, $status, WNOHANG);
<<<<<<< .merge_file_VtsjQZ
<<<<<<< HEAD
            if ($res === -1 || $res > 0) {
                return $res > 0 && is_int($status) && pcntl_wifexited($status) && pcntl_wexitstatus($status) === 0;
            }
            usleep(100_000);
            $waited++;
=======
            if (-1 === $res || $res > 0) {
                return $res > 0 && is_int($status) && pcntl_wifexited($status) && 0 === pcntl_wexitstatus($status);
            }
            usleep(100_000);
            ++$waited;
>>>>>>> laraxot/dev
=======
            if (-1 === $res) {
                return false;
            }
            if ($res > 0) {
                // pcntl_waitpid() declares the by-ref $status as mixed in its PHPDoc stub
                // (native int): validate it into a real int before decoding the exit status.
                $exitStatus = filter_var($status, FILTER_VALIDATE_INT);

                return false !== $exitStatus && pcntl_wifexited($exitStatus) && 0 === pcntl_wexitstatus($exitStatus);
            }
            usleep(100_000);
            ++$waited;
>>>>>>> .merge_file_KrOiI6
        }
        posix_kill($pid, SIGKILL);
        pcntl_waitpid($pid, $status);

        return false;
    }

    /**
<<<<<<< .merge_file_VtsjQZ
<<<<<<< HEAD
     * @param  list<string>  $relativeDirs  relative to app/
     * @param  list<string>  $denyMethodRegexes
=======
     * @param list<string> $relativeDirs      relative to app/
     * @param list<string> $denyMethodRegexes
>>>>>>> laraxot/dev
=======
     * @param list<string> $relativeDirs      relative to app/
     * @param list<string> $denyMethodRegexes
>>>>>>> .merge_file_KrOiI6
     */
    public static function sweepDirs(
        string $appRoot,
        string $ns,
        array $relativeDirs,
        int $timeoutSeconds = 3,
        array $denyMethodRegexes = [],
        float $budgetSeconds = 60.0,
    ): int {
        $executed = 0;
        $deadline = microtime(true) + $budgetSeconds;
        $denyDefault = [
            '/pdf|exportxls|sendmail|Navigation|EloquentQuery|TableQuery|getNavigation/i',
        ];
        $deny = array_merge($denyDefault, $denyMethodRegexes);

        foreach ($relativeDirs as $dir) {
            if (microtime(true) > $deadline) {
                break;
            }
            $path = $appRoot.'/'.$dir;
            if (! is_dir($path)) {
                continue;
            }
            $iterator = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($path));
            foreach ($iterator as $file) {
                if (microtime(true) > $deadline) {
                    break 2;
                }
<<<<<<< .merge_file_VtsjQZ
<<<<<<< HEAD
                if (! $file instanceof SplFileInfo || ! $file->isFile() || ! str_ends_with($file->getFilename(), '.php')) {
=======
                if (! $file instanceof \SplFileInfo || ! $file->isFile() || ! str_ends_with($file->getFilename(), '.php')) {
>>>>>>> laraxot/dev
=======
                if (! $file instanceof \SplFileInfo || ! $file->isFile() || ! str_ends_with($file->getFilename(), '.php')) {
>>>>>>> .merge_file_KrOiI6
                    continue;
                }
                if (str_contains($file->getFilename(), '.php-cs-fixer') || str_contains($file->getFilename(), '.blade.')) {
                    continue;
                }
                $relative = substr($file->getPathname(), strlen($appRoot) + 1);
                if (str_starts_with($relative, 'Routes/') || str_starts_with($relative, 'Resources/')) {
                    continue;
                }
                $class = $ns.str_replace(['/', '.php'], ['\\', ''], $relative);
                $executed += self::sweepClass($class, $timeoutSeconds, $deny);
            }
        }

        Assert::assertGreaterThanOrEqual(0, $executed);

        return $executed;
    }
}
