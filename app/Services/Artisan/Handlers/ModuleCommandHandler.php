<?php

declare(strict_types=1);

namespace Modules\Xot\Services\Artisan\Handlers;

use Modules\Xot\Services\Artisan\Contracts\CommandHandlerInterface;
use Modules\Xot\Services\ArtisanService;
use Webmozart\Assert\Assert;

/**
 * Handles module-related artisan commands.
 */
class ModuleCommandHandler implements CommandHandlerInterface
{
    /** @var list<string> */
    private const array MODULE_COMMANDS = ['module-list', 'module-disable', 'module-enable'];

    public function handle(string $moduleName = ''): string
    {
        return match ($this->getCurrentCommand()) {
            'module-list' => $this->listModules(),
            'module-disable' => $this->disableModule($moduleName),
            'module-enable' => $this->enableModule($moduleName),
            default => '',
        };
    }

    public function supports(string $command): bool
    {
        return in_array($command, self::MODULE_COMMANDS, true);
    }

    private function getCurrentCommand(): string
    {
        $command = request()->input('act', '');
        Assert::string($command);

        return $command;
    }

    private function listModules(): string
    {
        return ArtisanService::exe('module:list');
    }

    private function disableModule(string $moduleName): string
    {
        return ArtisanService::exe('module:disable '.$moduleName);
    }

    private function enableModule(string $moduleName): string
    {
        return ArtisanService::exe('module:enable '.$moduleName);
    }
}
