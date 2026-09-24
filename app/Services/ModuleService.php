<?php

declare(strict_types=1);

namespace Modules\Xot\Services;

<<<<<<< HEAD
<<<<<<< .merge_file_aULcGz
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
<<<<<<< HEAD
>>>>>>> da9ae01a0 (.)
<<<<<<< .merge_file_vm6MQl
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_cK9ab4
use Exception;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Nwidart\Modules\Facades\Module;
use ReflectionClass;
<<<<<<< .merge_file_aULcGz
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Nwidart\Modules\Facades\Module;
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Nwidart\Modules\Facades\Module;
>>>>>>> .merge_file_4KP26r
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_cK9ab4
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
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
<<<<<<< HEAD
        if (! (self::$_instance instanceof self)) {
            self::$_instance = new self;
<<<<<<< .merge_file_aULcGz
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_vm6MQl
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
        if (! (self::$_instance instanceof self)) {
            self::$_instance = new self;
=======
        if (! self::$_instance instanceof self) {
            self::$_instance = new self();
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
        if (! self::$_instance instanceof self) {
            self::$_instance = new self();
>>>>>>> .merge_file_4KP26r
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
        if (! self::$_instance instanceof self) {
            self::$_instance = new self();
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_cK9ab4
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
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
<<<<<<< HEAD
<<<<<<< .merge_file_aULcGz
<<<<<<< HEAD
        if (! ($mod instanceof \Nwidart\Modules\Module)) {
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_vm6MQl
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
        if (! ($mod instanceof \Nwidart\Modules\Module)) {
=======
        if (! $mod instanceof \Nwidart\Modules\Module) {
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
        if (! $mod instanceof \Nwidart\Modules\Module) {
>>>>>>> .merge_file_4KP26r
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
        if (! $mod instanceof \Nwidart\Modules\Module) {
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
        if (! ($mod instanceof \Nwidart\Modules\Module)) {
>>>>>>> .merge_file_cK9ab4
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
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
<<<<<<< HEAD
<<<<<<< .merge_file_aULcGz
<<<<<<< HEAD
                $tmp = new stdClass;
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_vm6MQl
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
                $tmp = new stdClass;
=======
                $tmp = new \stdClass();
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
                $tmp = new \stdClass();
>>>>>>> .merge_file_4KP26r
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
                $tmp = new \stdClass();
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
                $tmp = new stdClass;
>>>>>>> .merge_file_cK9ab4
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)

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
<<<<<<< HEAD
<<<<<<< .merge_file_aULcGz
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
<<<<<<< HEAD
>>>>>>> da9ae01a0 (.)
<<<<<<< .merge_file_vm6MQl
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_cK9ab4
                    $reflection_class = new ReflectionClass($tmp->class);
                    if (! $reflection_class->isAbstract()) {
                        $data[$tmp->name] = $tmp->class;
                    }
                } catch (Exception) {
<<<<<<< .merge_file_aULcGz
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
<<<<<<< HEAD
=======
>>>>>>> .merge_file_4KP26r
=======
<<<<<<< HEAD
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
                    $reflection_class = new \ReflectionClass($tmp->class);
                    if (! $reflection_class->isAbstract()) {
                        $data[$tmp->name] = $tmp->class;
                    }
                } catch (\Exception) {
<<<<<<< HEAD
<<<<<<< .merge_file_vm6MQl
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_4KP26r
=======
<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_cK9ab4
=======
>>>>>>> laraxot/dev
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
                    // Ignore reflection errors
                }
            }
        }

        return $data;
    }
}
