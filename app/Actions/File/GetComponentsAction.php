<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\File;

<<<<<<< HEAD
use Exception;
use ReflectionClass;
use function Safe\json_encode;
=======
>>>>>>> c7fd73eb (.)
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Modules\Xot\Datas\ComponentFileData;
use Spatie\LaravelData\DataCollection;
use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;

use function Safe\json_decode;
<<<<<<< HEAD
=======
use function Safe\json_encode;
>>>>>>> c7fd73eb (.)

class GetComponentsAction
{
    use QueueableAction;

    /**
     * Undocumented function.
     *
<<<<<<< HEAD
     * @return DataCollection<ComponentFileData>
=======
     * @return DataCollection<int, ComponentFileData>
>>>>>>> c7fd73eb (.)
     */
    public function execute(
        string $path,
        string $namespace,
        string $prefix,
        bool $force_recreate = false,
    ): DataCollection {
        Assert::string(
            $namespace = Str::replace('/', '\\', $namespace),
<<<<<<< HEAD
            '[' . __LINE__ . '][' . class_basename(static::class) . ']',
        );
        $components_json = $path . '/_components.json';
=======
            '['.__LINE__.']['.class_basename(static::class).']',
        );
        $components_json = $path.'/_components.json';
>>>>>>> c7fd73eb (.)
        $components_json = app(FixPathAction::class)->execute($components_json);

        $path = app(FixPathAction::class)->execute($path);

<<<<<<< HEAD
        if (!File::exists($path)) {
=======
        if (! File::exists($path)) {
>>>>>>> c7fd73eb (.)
            if (Str::startsWith($path, base_path('Modules'))) {
                File::makeDirectory($path, 0o755, true, true);
            }
        }

        $exists = File::exists($components_json);

<<<<<<< HEAD
        if ($exists && !$force_recreate) {
            Assert::string(
                $content = File::get($components_json),
                '[' . __LINE__ . '][' . class_basename(static::class) . ']',
            );
            $comps = json_decode($content, false);
            if (!is_array($comps)) {
                $comps = [];
            }
            return ComponentFileData::collection($comps);
=======
        if ($exists && ! $force_recreate) {
            Assert::string(
                $content = File::get($components_json),
                '['.__LINE__.']['.class_basename(static::class).']',
            );
            $decoded = json_decode($content, true);
            /** @var array<int, array<string, mixed>> $comps */
            $comps = is_array($decoded) ? array_values($decoded) : [];

            if ($this->hasCurrentSchema($comps)) {
                return ComponentFileData::collection($comps);
            }

            // Cache scritta da uno schema precedente (name/class/ns rinominati o
            // mancanti): rigenerare invece di far fallire il boot dell'app con
            // "Typed property ...::$name must not be accessed before
            // initialization" alla prima lettura di un DTO incompleto.
>>>>>>> c7fd73eb (.)
        }

        $files = File::allFiles($path);
        $comps = [];

        foreach ($files as $file) {
<<<<<<< HEAD
            if ('php' !== $file->getExtension()) {
=======
            if ($file->getExtension() !== 'php') {
>>>>>>> c7fd73eb (.)
                continue;
            }

            $class_name = $file->getFilenameWithoutExtension();
            $relative_path = $file->getRelativePath();
            Assert::string(
                $relative_path = Str::replace('/', '\\', $relative_path),
<<<<<<< HEAD
                '[' . __LINE__ . '][' . class_basename(static::class) . ']',
            );

            $comp_name = Str::slug(Str::snake(Str::replace('\\', ' ', $class_name)));
            $comp_name = $prefix . $comp_name;
            $comp_ns = $namespace . '\\' . $class_name;

            if ('' !== $relative_path) {
                $comp_name = '';
                $piece = collect(explode('\\', $relative_path))
                    ->map(fn($item) => Str::slug(Str::snake($item)))
                    ->implode('.');

                $comp_name = $prefix . $piece . '.' . Str::slug(Str::snake(Str::replace('\\', ' ', $class_name)));
                $comp_ns = $namespace . '\\' . $relative_path . '\\' . $class_name;
                $class_name = $relative_path . '\\' . $class_name;
            }

            try {
                if (!class_exists($comp_ns)) {
                    throw new Exception("La classe {$comp_ns} non esiste");
                }

                /** @var class-string<object> $comp_ns */
                $reflection = new ReflectionClass($comp_ns);
=======
                '['.__LINE__.']['.class_basename(static::class).']',
            );

            $comp_name = Str::slug(Str::snake(Str::replace('\\', ' ', $class_name)));
            $comp_name = $prefix.$comp_name;
            $comp_ns = $namespace.'\\'.$class_name;

            if ($relative_path !== '') {
                $comp_name = '';
                $piece = collect(explode('\\', $relative_path))
                    ->map(fn (string $item) => Str::slug(Str::snake($item)))
                    ->implode('.');

                $comp_name = $prefix.$piece.'.'.Str::slug(Str::snake(Str::replace('\\', ' ', $class_name)));
                $comp_ns = $namespace.'\\'.$relative_path.'\\'.$class_name;
                $class_name = $relative_path.'\\'.$class_name;
            }

            try {
                if (! class_exists($comp_ns)) {
                    throw new \Exception("La classe {$comp_ns} non esiste");
                }

                /** @var class-string<object> $comp_ns */
                $reflection = new \ReflectionClass($comp_ns);
>>>>>>> c7fd73eb (.)
                if ($reflection->isAbstract()) {
                    continue;
                }

                $comps[] = ComponentFileData::from([
                    'name' => $comp_name,
                    'class' => $class_name,
                    'ns' => $comp_ns,
                ])->toArray();
<<<<<<< HEAD
            } catch (Exception $e) {
=======
            } catch (\Exception $e) {
>>>>>>> c7fd73eb (.)
                /*
                 * dddx([
                 * 'comp_name' => $comp_name,
                 * 'class_name' => $class_name,
                 * 'comp_ns' => $comp_ns,
                 * 'path' => $path,
                 * 'namespace' => $namespace,
                 * 'prefix' => $prefix,
                 * 'message' => $e->getMessage(),
                 * ]);
                 */
                throw $e;
            }
        }

        $content = json_encode($comps, JSON_THROW_ON_ERROR);
        $old_content = File::exists($components_json) ? File::get($components_json) : '';

        if ($old_content !== $content) {
            File::put($components_json, $content);
        }

        return ComponentFileData::collection($comps);
    }
<<<<<<< HEAD
=======

    /**
     * @param  array<int, array<string, mixed>>  $comps
     */
    private function hasCurrentSchema(array $comps): bool
    {
        foreach ($comps as $comp) {
            if (
                ! isset($comp['name'], $comp['class'], $comp['ns'])
                || ! is_string($comp['name']) || '' === $comp['name']
                || ! is_string($comp['class']) || '' === $comp['class']
                || ! is_string($comp['ns']) || '' === $comp['ns']
            ) {
                return false;
            }
        }

        return true;
    }
>>>>>>> c7fd73eb (.)
}
