<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Module;

<<<<<<< HEAD
use Exception;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
=======
use Illuminate\Support\Facades\File;
>>>>>>> c7fd73eb (.)
use Spatie\QueueableAction\QueueableAction;

class GetModuleConfigAction
{
    use QueueableAction;

<<<<<<< HEAD
    public function execute(string $moduleName, string $config): array
    {
        $configPath = app(GetModulePathByGeneratorAction::class)->execute($moduleName, 'config');
        $configFile = $configPath . '/' . $config . '.php';
        if (!file_exists($configFile)) {
            throw new Exception('Config file not found: ' . $configFile);
        }
        dddx(File::getRequire($configFile));
        return [];
=======
    /**
     * @return array<string, mixed>
     */
    public function execute(string $moduleName, string $config): array
    {
        $configPath = app(GetModulePathByGeneratorAction::class)->execute($moduleName, 'config');
        $configFile = $configPath.'/'.$config.'.php';
        if (! file_exists($configFile)) {
            throw new \Exception('Config file not found: '.$configFile);
        }

        $loaded = File::getRequire($configFile);
        if (! is_array($loaded)) {
            throw new \Exception('Config file must return array: '.$configFile);
        }

        /** @var array<string, mixed> $normalized */
        $normalized = [];

        foreach ($loaded as $key => $value) {
            if (! is_string($key)) {
                continue;
            }

            /* @var string $key */
            $normalized[$key] = $value;
        }

        /* @var array<string, mixed> $normalized */
        return $normalized;
>>>>>>> c7fd73eb (.)
    }
}
