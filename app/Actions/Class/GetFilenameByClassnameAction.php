<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Class;

<<<<<<< HEAD
// use Modules\Xot\Services\ArrayService;
use ReflectionClass;
use Exception;
=======
>>>>>>> c7fd73eb (.)
use Spatie\QueueableAction\QueueableAction;

class GetFilenameByClassnameAction
{
    use QueueableAction;

    public function execute(string $class_name): string
    {
        $filename = null;
        try {
            if (class_exists($class_name)) {
<<<<<<< HEAD
                $reflector = new ReflectionClass($class_name);
                $filename = $reflector->getFileName();
            }
        } catch (Exception $e) {
            $filename = str_replace('\\', '/', $class_name);
            $filename = base_path($filename) . '.php';
=======
                $reflector = new \ReflectionClass($class_name);
                $filename = $reflector->getFileName();
            }
        } catch (\Exception $e) {
            $filename = str_replace('\\', '/', $class_name);
            $filename = base_path($filename).'.php';
>>>>>>> c7fd73eb (.)
        }

        if (is_string($filename)) {
            return $filename;
        }
<<<<<<< HEAD
        throw new Exception('[' . __LINE__ . '][' . class_basename($this) . '][' . $class_name . ']');
=======
        throw new \Exception('['.__LINE__.']['.class_basename($this).']['.$class_name.']');
>>>>>>> c7fd73eb (.)
    }
}
