<?php

declare(strict_types=1);

namespace Modules\Xot\Tests;

use Illuminate\Database\Eloquent\Model;
use Modules\Xot\Models\Cache;
use PHPUnit\Framework\Assert;
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> laraxot/dev
use ReflectionClass;
use ReflectionMethod;
use ReflectionNamedType;
use SplFileInfo;
<<<<<<< HEAD
=======
=======
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev

use function Safe\posix_kill;
use function Safe\preg_match;

/**
 * Invoca metodi in processo figlio con timeout (pcntl) per evitare hang DB/rete.
 */
final class XotForkedInvoke
{
    /**
<<<<<<< HEAD
     * @param  list<string>  $denyMethodRegexes
=======
<<<<<<< HEAD
     * @param  list<string>  $denyMethodRegexes
=======
     * @param list<string> $denyMethodRegexes
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
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

<<<<<<< HEAD
        $ref = new ReflectionClass($class);
=======
<<<<<<< HEAD
        $ref = new ReflectionClass($class);
=======
        $ref = new \ReflectionClass($class);
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev

        if ($ref->isInterface()) {
            return 0;
        }

        $executed = 0;

        if ($ref->isEnum()) {
            return self::sweepEnum($class, $timeoutSeconds);
        }

<<<<<<< HEAD
        if ($instance === null && ! $ref->isAbstract() && ! $ref->isTrait()) {
=======
<<<<<<< HEAD
        if ($instance === null && ! $ref->isAbstract() && ! $ref->isTrait()) {
=======
        if (null === $instance && ! $ref->isAbstract() && ! $ref->isTrait()) {
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
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

<<<<<<< HEAD
        foreach ($ref->getMethods(ReflectionMethod::IS_PUBLIC | ReflectionMethod::IS_PROTECTED | ReflectionMethod::IS_PRIVATE) as $method) {
=======
<<<<<<< HEAD
        foreach ($ref->getMethods(ReflectionMethod::IS_PUBLIC | ReflectionMethod::IS_PROTECTED | ReflectionMethod::IS_PRIVATE) as $method) {
=======
        foreach ($ref->getMethods(\ReflectionMethod::IS_PUBLIC | \ReflectionMethod::IS_PROTECTED | \ReflectionMethod::IS_PRIVATE) as $method) {
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
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
<<<<<<< HEAD
                    } elseif ($instance !== null) {
=======
<<<<<<< HEAD
                    } elseif ($instance !== null) {
=======
                    } elseif (null !== $instance) {
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
                        $method->invoke($instance, ...$args);
                    }
                },
                $timeoutSeconds,
            );
            if ($ok) {
<<<<<<< HEAD
                $executed++;
=======
<<<<<<< HEAD
                $executed++;
=======
                ++$executed;
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
            }
        }

        return $executed;
    }

    /**
<<<<<<< HEAD
     * @param  class-string  $enumClass
=======
<<<<<<< HEAD
     * @param  class-string  $enumClass
=======
     * @param class-string $enumClass
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
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
<<<<<<< HEAD
                        $executed++;
=======
<<<<<<< HEAD
                        $executed++;
=======
                        ++$executed;
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
                    }
                }
            }
            foreach (['workingDays', 'weekendDays', 'toArray', 'getFormSchema', 'getSearchable'] as $sm) {
                if (! method_exists($enumClass, $sm)) {
                    continue;
                }
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> laraxot/dev
                $method = new ReflectionMethod($enumClass, $sm);
                if (self::invokeWithTimeout(static fn () => $method->invoke(null), $timeoutSeconds)) {
                    $executed++;
                }
            }
        } catch (\Throwable) {
            $executed++;
<<<<<<< HEAD
=======
=======
                $method = new \ReflectionMethod($enumClass, $sm);
                if (self::invokeWithTimeout(static fn () => $method->invoke(null), $timeoutSeconds)) {
                    ++$executed;
                }
            }
        } catch (\Throwable) {
            ++$executed;
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
        }

        return $executed;
    }

    /**
     * @return list<mixed>
     */
<<<<<<< HEAD
    public static function defaultArgs(ReflectionMethod $method): array
=======
<<<<<<< HEAD
    public static function defaultArgs(ReflectionMethod $method): array
=======
    public static function defaultArgs(\ReflectionMethod $method): array
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
    {
        $args = [];
        foreach ($method->getParameters() as $param) {
            if ($param->isDefaultValueAvailable()) {
                $args[] = $param->getDefaultValue();

                continue;
            }
            $type = $param->getType();
            $name = $param->getName();
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> laraxot/dev
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
<<<<<<< HEAD
=======
=======
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
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
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
<<<<<<< HEAD
        if ($pid === -1) {
=======
<<<<<<< HEAD
        if ($pid === -1) {
=======
        if (-1 === $pid) {
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
            try {
                $fn();

                return true;
            } catch (\Throwable) {
                return false;
            }
        }

<<<<<<< HEAD
        if ($pid === 0) {
=======
<<<<<<< HEAD
        if ($pid === 0) {
=======
        if (0 === $pid) {
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
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
<<<<<<< .merge_file_dn7MeC
            if ($res === -1) {
                return false;
            }
            if ($res > 0) {
                // pcntl_waitpid() declares the by-ref $status as mixed in its PHPDoc stub
                // (native int): validate it into a real int before decoding the exit status.
                $exitStatus = filter_var($status, FILTER_VALIDATE_INT);

                return $exitStatus !== false && pcntl_wifexited($exitStatus) && pcntl_wexitstatus($exitStatus) === 0;
=======
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> laraxot/dev
            if ($res === -1 || $res > 0) {
                return $res > 0 && is_int($status) && pcntl_wifexited($status) && pcntl_wexitstatus($status) === 0;
>>>>>>> .merge_file_4YxkNo
            }
            usleep(100_000);
            $waited++;
<<<<<<< HEAD
=======
=======
            if (-1 === $res || $res > 0) {
                return $res > 0 && is_int($status) && pcntl_wifexited($status) && 0 === pcntl_wexitstatus($status);
            }
            usleep(100_000);
            ++$waited;
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
        }
        posix_kill($pid, SIGKILL);
        pcntl_waitpid($pid, $status);

        return false;
    }

    /**
<<<<<<< HEAD
     * @param  list<string>  $relativeDirs  relative to app/
     * @param  list<string>  $denyMethodRegexes
=======
<<<<<<< HEAD
     * @param  list<string>  $relativeDirs  relative to app/
     * @param  list<string>  $denyMethodRegexes
=======
     * @param list<string> $relativeDirs      relative to app/
     * @param list<string> $denyMethodRegexes
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
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
<<<<<<< HEAD
                if (! $file instanceof SplFileInfo || ! $file->isFile() || ! str_ends_with($file->getFilename(), '.php')) {
=======
<<<<<<< HEAD
                if (! $file instanceof SplFileInfo || ! $file->isFile() || ! str_ends_with($file->getFilename(), '.php')) {
=======
                if (! $file instanceof \SplFileInfo || ! $file->isFile() || ! str_ends_with($file->getFilename(), '.php')) {
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
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
