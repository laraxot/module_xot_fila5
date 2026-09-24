<?php

declare(strict_types=1);

namespace Modules\Xot\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

use function Safe\glob;
use function Safe\preg_match;

/**
 * Verifica la regola "accessor + gemello".
 *
 * Ogni metodo `get{Nome}Attribute()` deve avere un gemello `get{Nome}()` sulla stessa classe:
 * l'accessor gestisce cache/coercizione/persistenza, il gemello contiene il calcolo puro,
 * invocabile ed analizzabile staticamente.
 *
 * @see docs/wiki/rules/accessor-twin-method.md
 */
class CheckAccessorTwinsCommand extends Command
{
    protected $signature = 'xot:check-accessor-twins
                            {--module= : Analizza solo il modulo indicato}
                            {--orphans : Elenca invece i gemelli orfani: get*() su una colonna, senza accessor e senza chiamanti}
                            {--fail-on-missing : Esce con codice 1 se trova accessor senza gemello}';

    protected $description = 'Verifica la coppia accessor/gemello: get*Attribute() senza get*(), oppure (--orphans) calcoli mai invocati';

    public function handle(): int
    {
        $module = $this->option('module');
<<<<<<< HEAD
        $pattern = base_path('Modules/'.(is_string($module) && $module !== '' ? $module : '*').'/app/Models/*.php');

        if ($this->option('orphans') === true) {
=======
<<<<<<< HEAD
        $pattern = base_path('Modules/'.(is_string($module) && $module !== '' ? $module : '*').'/app/Models/*.php');

        if ($this->option('orphans') === true) {
=======
        $pattern = base_path('Modules/'.(is_string($module) && '' !== $module ? $module : '*').'/app/Models/*.php');

        if (true === $this->option('orphans')) {
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
            return $this->reportOrphanTwins($pattern);
        }

        /** @var array<string, list<string>> $missing */
        $missing = [];
        $accessors = 0;
        $analyzed = 0;

        foreach (glob($pattern) as $file) {
            if (! is_string($file)) {
                continue;
            }

            $class = $this->classFromPath($file);
<<<<<<< HEAD
            if ($class === null) {
=======
<<<<<<< HEAD
            if ($class === null) {
=======
            if (null === $class) {
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
                continue;
            }

            $reflection = new \ReflectionClass($class);

            if ($reflection->isAbstract() || ! $reflection->isSubclassOf(Model::class)) {
                continue;
            }

<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> laraxot/dev
            $analyzed++;

            foreach ($reflection->getMethods() as $method) {
                $twin = $this->twinName($method);
                if ($twin === null) {
                    continue;
                }

                $accessors++;
<<<<<<< HEAD
=======
=======
            ++$analyzed;

            foreach ($reflection->getMethods() as $method) {
                $twin = $this->twinName($method);
                if (null === $twin) {
                    continue;
                }

                ++$accessors;
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev

                if (! $reflection->hasMethod($twin)) {
                    $missing[$class][] = $method->getName();
                }
            }
        }

        $missingCount = array_sum(array_map('count', $missing));

        foreach ($missing as $class => $methods) {
            $this->line($class);
            foreach (array_unique($methods) as $method) {
                $this->line('  - '.$method.'()  =>  manca '.$this->twinLabel($method).'()');
            }
        }

        $this->info(sprintf(
            'Classi analizzate: %d | accessor: %d | senza gemello: %d',
            $analyzed,
            $accessors,
            $missingCount
        ));

<<<<<<< HEAD
        if ($missingCount > 0 && $this->option('fail-on-missing') === true) {
=======
<<<<<<< HEAD
        if ($missingCount > 0 && $this->option('fail-on-missing') === true) {
=======
        if ($missingCount > 0 && true === $this->option('fail-on-missing')) {
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
            return self::FAILURE;
        }

        return self::SUCCESS;
    }

    /**
     * Gemelli orfani: `get{X}()` dove `{x}` e' una colonna della tabella, senza `get{X}Attribute()`.
     *
     * Sono calcoli che nessuno esegue: la colonna non viene mai valorizzata da quel codice. Non e' l'inverso della
     * regola accessor => gemello (generare accessor dai gemelli e' dannoso: maschera le relazioni e ignora il
     * valore gia' in DB), ma il segnale che un calcolo e' rimasto scollegato.
     *
     * @see Modules/Ptv/docs/orphan-twin-methods.md
     */
    private function reportOrphanTwins(string $pattern): int
    {
        $orphans = 0;
        $analyzed = 0;

        foreach (glob($pattern) as $file) {
            if (! is_string($file)) {
                continue;
            }

            $class = $this->classFromPath($file);
<<<<<<< HEAD
            if ($class === null) {
=======
<<<<<<< HEAD
            if ($class === null) {
=======
            if (null === $class) {
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
                continue;
            }

            $reflection = new \ReflectionClass($class);
            if ($reflection->isAbstract() || ! $reflection->isSubclassOf(Model::class)) {
                continue;
            }

            /** @var Model $model */
            $model = app($class);

            try {
                $columns = Schema::connection($model->getConnectionName())->getColumnListing($model->getTable());
            } catch (\Throwable) {
                continue; // connection non raggiungibile in questo ambiente
            }

<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> laraxot/dev
            if ($columns === []) {
                continue;
            }

            $analyzed++;
<<<<<<< HEAD
=======
=======
            if ([] === $columns) {
                continue;
            }

            ++$analyzed;
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
            $found = [];

            foreach ($reflection->getMethods() as $method) {
                $name = $method->getName();

<<<<<<< HEAD
                if (preg_match('/^get([A-Z].*)$/', $name, $matches) !== 1) {
=======
<<<<<<< HEAD
                if (preg_match('/^get([A-Z].*)$/', $name, $matches) !== 1) {
=======
                if (1 !== preg_match('/^get([A-Z].*)$/', $name, $matches)) {
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
                    continue;
                }
                if (str_ends_with($name, 'Attribute') || $method->getNumberOfRequiredParameters() > 0) {
                    continue;
                }

                // Metodi del framework (es. Authenticatable::getRememberToken()): non sono gemelli di dominio.
                $declaredIn = (string) $method->getDeclaringClass()->getFileName();
<<<<<<< HEAD
                if ($declaredIn === '' || str_contains($declaredIn, '/vendor/')) {
=======
<<<<<<< HEAD
                if ($declaredIn === '' || str_contains($declaredIn, '/vendor/')) {
=======
                if ('' === $declaredIn || str_contains($declaredIn, '/vendor/')) {
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
                    continue;
                }

                $suffix = $matches[1] ?? '';
<<<<<<< HEAD
                if ($suffix === '') {
=======
<<<<<<< HEAD
                if ($suffix === '') {
=======
                if ('' === $suffix) {
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
                    continue;
                }

                $column = Str::snake($suffix);
                if (! in_array($column, $columns, true) || $reflection->hasMethod($name.'Attribute')) {
                    continue;
                }

                $found[$column] = $name;
            }

<<<<<<< HEAD
            if ($found === []) {
=======
<<<<<<< HEAD
            if ($found === []) {
=======
            if ([] === $found) {
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
                continue;
            }

            $this->line($class);
            foreach ($found as $column => $name) {
                $this->line('  - '.$name.'()  =>  colonna `'.$column.'` senza accessor: calcolo mai invocato');
<<<<<<< HEAD
                $orphans++;
=======
<<<<<<< HEAD
                $orphans++;
=======
                ++$orphans;
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
            }
        }

        $this->info(sprintf('Classi analizzate: %d | gemelli orfani: %d', $analyzed, $orphans));

<<<<<<< HEAD
        if ($orphans > 0 && $this->option('fail-on-missing') === true) {
=======
<<<<<<< HEAD
        if ($orphans > 0 && $this->option('fail-on-missing') === true) {
=======
        if ($orphans > 0 && true === $this->option('fail-on-missing')) {
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
            return self::FAILURE;
        }

        return self::SUCCESS;
    }

    /**
     * Nome del gemello atteso, null se il metodo non e' un accessor.
     */
    private function twinName(\ReflectionMethod $method): ?string
    {
<<<<<<< HEAD
        if (preg_match('/^get(.+)Attribute$/', $method->getName(), $matches) !== 1) {
=======
<<<<<<< HEAD
        if (preg_match('/^get(.+)Attribute$/', $method->getName(), $matches) !== 1) {
=======
        if (1 !== preg_match('/^get(.+)Attribute$/', $method->getName(), $matches)) {
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
            return null;
        }

        $name = $matches[1] ?? '';
<<<<<<< HEAD
        if ($name === '') {
=======
<<<<<<< HEAD
        if ($name === '') {
=======
        if ('' === $name) {
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
            return null;
        }

        return 'get'.$name;
    }

    private function twinLabel(string $accessor): string
    {
        return (string) substr($accessor, 0, -\strlen('Attribute'));
    }

    /**
     * @return class-string<Model>|null
     */
    private function classFromPath(string $file): ?string
    {
        $relative = str_replace(base_path('Modules').\DIRECTORY_SEPARATOR, '', $file);
        $parts = explode(\DIRECTORY_SEPARATOR, $relative);

        if (\count($parts) < 2) {
            return null;
        }

        $class = 'Modules\\'.$parts[0].'\\Models\\'.basename($file, '.php');

        if (! class_exists($class) || ! is_subclass_of($class, Model::class)) {
            return null;
        }

        return $class;
    }
}
