<?php

declare(strict_types=1);

namespace Modules\Xot\Actions;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Nwidart\Modules\Facades\Module;
use Spatie\QueueableAction\QueueableAction;

/**
 * Class ModuleAction.
 */
class ModuleAction
{
    use QueueableAction;

    public string $name = '';

    private static ?self $_instance = null;

    public function __construct(string $name = '')
    {
        $this->name = $name;
    }

    public static function getInstance(): self
    {
        if (! self::$_instance instanceof self) {
<<<<<<< HEAD
<<<<<<< .merge_file_l6JogP
<<<<<<< HEAD
<<<<<<< HEAD
            self::$_instance = new self;
=======
=======
<<<<<<< HEAD
>>>>>>> da9ae01a0 (.)
<<<<<<< .merge_file_6TJIo6
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
            self::$_instance = new self();
=======
<<<<<<< HEAD
            self::$_instance = new self();
=======
            self::$_instance = new self;
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
            self::$_instance = new self();
>>>>>>> .merge_file_cPuAL8
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
            self::$_instance = new self();
>>>>>>> 3792da0d (Check & fix styling)
=======
            self::$_instance = new self;
>>>>>>> .merge_file_mdCtfb
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
        }

        return self::$_instance;
    }

    public static function make(): self
    {
        return static::getInstance();
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return array<string, class-string>
     */
    public function getModels(): array
    {
        $mod = Module::find($this->name);
        if (! $mod instanceof \Nwidart\Modules\Module) {
            return [];
        }

        $mod_path = $mod->getPath().'/Models';
        $mod_path = str_replace(['\\', '/'], [\DIRECTORY_SEPARATOR, \DIRECTORY_SEPARATOR], $mod_path);

        $files = File::files($mod_path);
        $data = [];
        $ns = 'Modules\\'.$mod->getName().'\\Models';
        foreach ($files as $file) {
            $filename = $file->getRelativePathname();
            $ext = '.php';
            if (Str::endsWith($filename, $ext)) {
<<<<<<< HEAD
<<<<<<< .merge_file_l6JogP
<<<<<<< HEAD
<<<<<<< HEAD
                $tmp = new \stdClass;
=======
=======
<<<<<<< HEAD
>>>>>>> da9ae01a0 (.)
<<<<<<< .merge_file_6TJIo6
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
                $tmp = new \stdClass();
=======
<<<<<<< HEAD
                $tmp = new \stdClass();
=======
                $tmp = new \stdClass;
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
                $tmp = new \stdClass();
>>>>>>> .merge_file_cPuAL8
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
                $tmp = new \stdClass();
>>>>>>> 3792da0d (Check & fix styling)
=======
                $tmp = new \stdClass;
>>>>>>> .merge_file_mdCtfb
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)

                $name = mb_substr($filename, 0, -mb_strlen($ext));

                /**
                 * @var class-string
                 */
                $class = $ns.'\\'.$name;
                $tmp->class = $class;
                $name = Str::snake($name);
                $tmp->name = $name;

                try {
                    $reflection_class = new \ReflectionClass($tmp->class);
                    if (! $reflection_class->isAbstract()) {
                        $data[$tmp->name] = $tmp->class;
                    }
                } catch (\Exception) {
<<<<<<< HEAD
                    // Skip files whose class name does not resolve to an existing/valid class.
=======
>>>>>>> 3792da0d (Check & fix styling)
                }
            }
        }

        return $data;
    }

<<<<<<< HEAD
<<<<<<< .merge_file_l6JogP
<<<<<<< HEAD
<<<<<<< HEAD
    public function execute(): void {}
=======
=======
<<<<<<< HEAD
>>>>>>> da9ae01a0 (.)
<<<<<<< .merge_file_6TJIo6
    public function execute(): void {}
=======
    public function execute(): void
    {
    }
>>>>>>> .merge_file_cPuAL8
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
    public function execute(): void
    {
    }
>>>>>>> 3792da0d (Check & fix styling)
=======
    public function execute(): void {}
>>>>>>> .merge_file_mdCtfb
=======
=======
    public function execute(): void {}
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
}
