<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\View;

<<<<<<< HEAD
use Exception;
use Illuminate\Support\Arr;
use Illuminate\View\FileViewFinder;
use Modules\Xot\Datas\XotData;
use Nwidart\Modules\Facades\Module;
use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;
=======
use Nwidart\Modules\Facades\Module;
use Spatie\QueueableAction\QueueableAction;
>>>>>>> c7fd73eb (.)

class GetViewNameSpacePathAction
{
    use QueueableAction;

    /**
<<<<<<< HEAD
     * @throws Exception
     */
    public function execute(null|string $module_name = null): string
=======
     * @throws \Exception
     */
    public function execute(?string $module_name = null): string
>>>>>>> c7fd73eb (.)
    {
        if (null !== $module_name && '' !== $module_name) {
            $module_path = Module::getModulePath($module_name);
            /** @var non-falsy-string $namespace_path */
<<<<<<< HEAD
            $namespace_path = $module_path . 'resources/views';
=======
            $namespace_path = $module_path.'resources/views';
>>>>>>> c7fd73eb (.)
        } else {
            /** @var non-falsy-string $namespace_path */
            $namespace_path = resource_path('views');
        }

        return $namespace_path;
    }
}
