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
        $pattern = base_path('Modules/'.(is_string($module) && $module !== '' ? $module : '*').'/app/Models/*.php');

        if ($this->option('orphans') === true) {
<<<<<<< .merge_file_p8FeAV
=======
<<<<<<< HEAD
<<<<<<< .merge_file_J5ASpA
<<<<<<< HEAD
        $pattern = base_path('Modules/'.(is_string($module) && $module !== '' ? $module : '*').'/app/Models/*.php');

        if ($this->option('orphans') === true) {
=======
=======
>>>>>>> 3792da0d (Check & fix styling)
        $pattern = base_path('Modules/'.(is_string($module) && '' !== $module ? $module : '*').'/app/Models/*.php');

        if (true === $this->option('orphans')) {
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
        $pattern = base_path('Modules/'.(is_string($module) && '' !== $module ? $module : '*').'/app/Models/*.php');

        if (true === $this->option('orphans')) {
>>>>>>> .merge_file_dwyqcg
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_b4IqcV
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
<<<<<<< .merge_file_p8FeAV
<<<<<<< HEAD
            if ($class === null) {
=======
<<<<<<< HEAD
<<<<<<< .merge_file_J5ASpA
<<<<<<< HEAD
            if ($class === null) {
=======
            if (null === $class) {
>>>>>>> laraxot/dev
=======
            if (null === $class) {
>>>>>>> .merge_file_dwyqcg
>>>>>>> laraxot/dev
=======
            if (null === $class) {
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
            if ($class === null) {
>>>>>>> .merge_file_b4IqcV
                continue;
            }

            $reflection = new \ReflectionClass($class);

            if ($reflection->isAbstract() || ! $reflection->isSubclassOf(Model::class)) {
                continue;
            }

<<<<<<< .merge_file_p8FeAV
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< .merge_file_J5ASpA
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_b4IqcV
            $analyzed++;

            foreach ($reflection->getMethods() as $method) {
                $twin = $this->twinName($method);
                if ($twin === null) {
                    continue;
                }

                $accessors++;
<<<<<<< .merge_file_p8FeAV
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
=======
>>>>>>> .merge_file_dwyqcg
=======
=======
>>>>>>> 3792da0d (Check & fix styling)
            ++$analyzed;

            foreach ($reflection->getMethods() as $method) {
                $twin = $this->twinName($method);
                if (null === $twin) {
                    continue;
                }

                ++$accessors;
<<<<<<< HEAD
<<<<<<< .merge_file_J5ASpA
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_dwyqcg
=======
>>>>>>> 3792da0d (Check & fix styling)
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_b4IqcV

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

<<<<<<< .merge_file_p8FeAV
<<<<<<< HEAD
        if ($missingCount > 0 && $this->option('fail-on-missing') === true) {
=======
<<<<<<< HEAD
<<<<<<< .merge_file_J5ASpA
<<<<<<< HEAD
        if ($missingCount > 0 && $this->option('fail-on-missing') === true) {
=======
        if ($missingCount > 0 && true === $this->option('fail-on-missing')) {
>>>>>>> laraxot/dev
=======
        if ($missingCount > 0 && true === $this->option('fail-on-missing')) {
>>>>>>> .merge_file_dwyqcg
>>>>>>> laraxot/dev
=======
        if ($missingCount > 0 && true === $this->option('fail-on-missing')) {
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
        if ($missingCount > 0 && $this->option('fail-on-missing') === true) {
>>>>>>> .merge_file_b4IqcV
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
            if ($class === null) {
<<<<<<< .merge_file_p8FeAV
=======
<<<<<<< HEAD
<<<<<<< .merge_file_J5ASpA
<<<<<<< HEAD
            if ($class === null) {
=======
            if (null === $class) {
>>>>>>> laraxot/dev
=======
            if (null === $class) {
>>>>>>> .merge_file_dwyqcg
>>>>>>> laraxot/dev
=======
            if (null === $class) {
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_b4IqcV
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

<<<<<<< .merge_file_p8FeAV
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< .merge_file_J5ASpA
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_b4IqcV
            if ($columns === []) {
                continue;
            }

            $analyzed++;
<<<<<<< .merge_file_p8FeAV
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
=======
>>>>>>> .merge_file_dwyqcg
=======
=======
>>>>>>> 3792da0d (Check & fix styling)
            if ([] === $columns) {
                continue;
            }

            ++$analyzed;
<<<<<<< HEAD
<<<<<<< .merge_file_J5ASpA
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_dwyqcg
=======
>>>>>>> 3792da0d (Check & fix styling)
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_b4IqcV
            $found = [];

            foreach ($reflection->getMethods() as $method) {
                $name = $method->getName();

<<<<<<< .merge_file_p8FeAV
<<<<<<< HEAD
                if (preg_match('/^get([A-Z].*)$/', $name, $matches) !== 1) {
=======
<<<<<<< HEAD
<<<<<<< .merge_file_J5ASpA
<<<<<<< HEAD
                if (preg_match('/^get([A-Z].*)$/', $name, $matches) !== 1) {
=======
                if (1 !== preg_match('/^get([A-Z].*)$/', $name, $matches)) {
>>>>>>> laraxot/dev
=======
                if (1 !== preg_match('/^get([A-Z].*)$/', $name, $matches)) {
>>>>>>> .merge_file_dwyqcg
>>>>>>> laraxot/dev
=======
                if (1 !== preg_match('/^get([A-Z].*)$/', $name, $matches)) {
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
                if (preg_match('/^get([A-Z].*)$/', $name, $matches) !== 1) {
>>>>>>> .merge_file_b4IqcV
                    continue;
                }
                if (str_ends_with($name, 'Attribute') || $method->getNumberOfRequiredParameters() > 0) {
                    continue;
                }

                // Metodi del framework (es. Authenticatable::getRememberToken()): non sono gemelli di dominio.
                $declaredIn = (string) $method->getDeclaringClass()->getFileName();
<<<<<<< .merge_file_p8FeAV
<<<<<<< HEAD
                if ($declaredIn === '' || str_contains($declaredIn, '/vendor/')) {
=======
<<<<<<< HEAD
<<<<<<< .merge_file_J5ASpA
<<<<<<< HEAD
                if ($declaredIn === '' || str_contains($declaredIn, '/vendor/')) {
=======
                if ('' === $declaredIn || str_contains($declaredIn, '/vendor/')) {
>>>>>>> laraxot/dev
=======
                if ('' === $declaredIn || str_contains($declaredIn, '/vendor/')) {
>>>>>>> .merge_file_dwyqcg
>>>>>>> laraxot/dev
=======
                if ('' === $declaredIn || str_contains($declaredIn, '/vendor/')) {
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
                if ($declaredIn === '' || str_contains($declaredIn, '/vendor/')) {
>>>>>>> .merge_file_b4IqcV
                    continue;
                }

                $suffix = $matches[1] ?? '';
                if ($suffix === '') {
<<<<<<< .merge_file_p8FeAV
=======
<<<<<<< HEAD
<<<<<<< .merge_file_J5ASpA
<<<<<<< HEAD
                if ($suffix === '') {
=======
                if ('' === $suffix) {
>>>>>>> laraxot/dev
=======
                if ('' === $suffix) {
>>>>>>> .merge_file_dwyqcg
>>>>>>> laraxot/dev
=======
                if ('' === $suffix) {
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_b4IqcV
                    continue;
                }

                $column = Str::snake($suffix);
                if (! in_array($column, $columns, true) || $reflection->hasMethod($name.'Attribute')) {
                    continue;
                }

                $found[$column] = $name;
            }

<<<<<<< .merge_file_p8FeAV
<<<<<<< HEAD
            if ($found === []) {
=======
<<<<<<< HEAD
<<<<<<< .merge_file_J5ASpA
<<<<<<< HEAD
            if ($found === []) {
=======
            if ([] === $found) {
>>>>>>> laraxot/dev
=======
            if ([] === $found) {
>>>>>>> .merge_file_dwyqcg
>>>>>>> laraxot/dev
=======
            if ([] === $found) {
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
            if ($found === []) {
>>>>>>> .merge_file_b4IqcV
                continue;
            }

            $this->line($class);
            foreach ($found as $column => $name) {
                $this->line('  - '.$name.'()  =>  colonna `'.$column.'` senza accessor: calcolo mai invocato');
<<<<<<< .merge_file_p8FeAV
<<<<<<< HEAD
                $orphans++;
=======
<<<<<<< HEAD
<<<<<<< .merge_file_J5ASpA
<<<<<<< HEAD
                $orphans++;
=======
                ++$orphans;
>>>>>>> laraxot/dev
=======
                ++$orphans;
>>>>>>> .merge_file_dwyqcg
>>>>>>> laraxot/dev
=======
                ++$orphans;
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
                $orphans++;
>>>>>>> .merge_file_b4IqcV
            }
        }

        $this->info(sprintf('Classi analizzate: %d | gemelli orfani: %d', $analyzed, $orphans));

        if ($orphans > 0 && $this->option('fail-on-missing') === true) {
<<<<<<< .merge_file_p8FeAV
=======
<<<<<<< HEAD
<<<<<<< .merge_file_J5ASpA
<<<<<<< HEAD
        if ($orphans > 0 && $this->option('fail-on-missing') === true) {
=======
        if ($orphans > 0 && true === $this->option('fail-on-missing')) {
>>>>>>> laraxot/dev
=======
        if ($orphans > 0 && true === $this->option('fail-on-missing')) {
>>>>>>> .merge_file_dwyqcg
>>>>>>> laraxot/dev
=======
        if ($orphans > 0 && true === $this->option('fail-on-missing')) {
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_b4IqcV
            return self::FAILURE;
        }

        return self::SUCCESS;
    }

    /**
     * Nome del gemello atteso, null se il metodo non e' un accessor.
     */
    private function twinName(\ReflectionMethod $method): ?string
    {
<<<<<<< .merge_file_p8FeAV
<<<<<<< HEAD
        if (preg_match('/^get(.+)Attribute$/', $method->getName(), $matches) !== 1) {
=======
<<<<<<< HEAD
<<<<<<< .merge_file_J5ASpA
<<<<<<< HEAD
        if (preg_match('/^get(.+)Attribute$/', $method->getName(), $matches) !== 1) {
=======
        if (1 !== preg_match('/^get(.+)Attribute$/', $method->getName(), $matches)) {
>>>>>>> laraxot/dev
=======
        if (1 !== preg_match('/^get(.+)Attribute$/', $method->getName(), $matches)) {
>>>>>>> .merge_file_dwyqcg
>>>>>>> laraxot/dev
=======
        if (1 !== preg_match('/^get(.+)Attribute$/', $method->getName(), $matches)) {
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
        if (preg_match('/^get(.+)Attribute$/', $method->getName(), $matches) !== 1) {
>>>>>>> .merge_file_b4IqcV
            return null;
        }

        $name = $matches[1] ?? '';
<<<<<<< .merge_file_p8FeAV
<<<<<<< HEAD
        if ($name === '') {
=======
<<<<<<< HEAD
<<<<<<< .merge_file_J5ASpA
<<<<<<< HEAD
        if ($name === '') {
=======
        if ('' === $name) {
>>>>>>> laraxot/dev
=======
        if ('' === $name) {
>>>>>>> .merge_file_dwyqcg
>>>>>>> laraxot/dev
=======
        if ('' === $name) {
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
        if ($name === '') {
>>>>>>> .merge_file_b4IqcV
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
