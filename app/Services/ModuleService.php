<?php

declare(strict_types=1);

namespace Modules\Xot\Services;

<<<<<<< .merge_file_vm6MQl
<<<<<<< HEAD
use Exception;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Nwidart\Modules\Facades\Module;
use ReflectionClass;
=======
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Nwidart\Modules\Facades\Module;
>>>>>>> laraxot/dev
=======
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Nwidart\Modules\Facades\Module;
>>>>>>> .merge_file_4KP26r
use stdClass;

// ----------- Requests ----------

/**
 * Class ModuleService.
 */
class ModuleService
{
    public string $name;

    private static ?self $_instance = null;

    /**
     * getInstance.
     *
     * this method will return instance of the class
     */
    public static function getInstance(): self
    {
<<<<<<< .merge_file_vm6MQl
<<<<<<< HEAD
        if (! (self::$_instance instanceof self)) {
            self::$_instance = new self;
=======
        if (! self::$_instance instanceof self) {
            self::$_instance = new self();
>>>>>>> laraxot/dev
=======
        if (! self::$_instance instanceof self) {
            self::$_instance = new self();
>>>>>>> .merge_file_4KP26r
        }

        return self::$_instance;
    }

    /**
     * Undocumented function.
     */
    public static function make(): self
    {
        return static::getInstance();
    }

    /**
     * Undocumented function.
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get models for the module.
     *
     * @return array<string, class-string>
     */
    public function getModels(): array
    {
        /*
         * if (null == $module) {
         * return [];
         * }
         */
        $mod = Module::find($this->name);
<<<<<<< .merge_file_vm6MQl
<<<<<<< HEAD
        if (! ($mod instanceof \Nwidart\Modules\Module)) {
=======
        if (! $mod instanceof \Nwidart\Modules\Module) {
>>>>>>> laraxot/dev
=======
        if (! $mod instanceof \Nwidart\Modules\Module) {
>>>>>>> .merge_file_4KP26r
            return [];
        }

        $mod_path = $mod->getPath().'/Models';
        $mod_path = str_replace(['\\', '/'], [\DIRECTORY_SEPARATOR, \DIRECTORY_SEPARATOR], $mod_path);

        $files = File::files($mod_path);
        $data = [];
        $ns = 'Modules\\'.$mod->getName().'\\Models'; // con la barra davanti non va il search ?
        foreach ($files as $file) {
            $filename = $file->getRelativePathname();
            $ext = '.php';
            // dddx(['ext' => $file->getExtension(), get_class_methods($file)]);
            if (Str::endsWith($filename, $ext)) {
<<<<<<< .merge_file_vm6MQl
<<<<<<< HEAD
                $tmp = new stdClass;
=======
                $tmp = new \stdClass();
>>>>>>> laraxot/dev
=======
                $tmp = new \stdClass();
>>>>>>> .merge_file_4KP26r

                $name = mb_substr($filename, 0, -mb_strlen($ext));

                /**
                 * @var class-string
                 */
                $class = $ns.'\\'.$name;
                // Strict comparison using === between stdClass and null will always evaluate to false.

                // if ($tmp === null) {
                //    continue;
                // }
                $tmp->class = $class;
                $name = Str::snake($name);
                $tmp->name = $name;

                try {
<<<<<<< .merge_file_vm6MQl
<<<<<<< HEAD
                    $reflection_class = new ReflectionClass($tmp->class);
                    if (! $reflection_class->isAbstract()) {
                        $data[$tmp->name] = $tmp->class;
                    }
                } catch (Exception) {
=======
=======
>>>>>>> .merge_file_4KP26r
                    $reflection_class = new \ReflectionClass($tmp->class);
                    if (! $reflection_class->isAbstract()) {
                        $data[$tmp->name] = $tmp->class;
                    }
                } catch (\Exception) {
<<<<<<< .merge_file_vm6MQl
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_4KP26r
                    // Ignore reflection errors
                }
            }
        }

        return $data;
    }
}
