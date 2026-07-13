<?php

declare(strict_types=1);

namespace Modules\Xot\Services\Artisan\Handlers;

use Modules\Xot\Services\Artisan\Contracts\CommandHandlerContract;
use Modules\Xot\Services\ArtisanService;
use Webmozart\Assert\Assert;

/**
 * Handles error-related artisan commands.
 */
class ErrorCommandHandler implements CommandHandlerContract
{
    private const ERROR_COMMANDS = ['error', 'error-show', 'error-clear'];

    public function handle(string $moduleName = ''): string
    {
        $command = $this->getCurrentCommand();

        if ('error-clear' === $command) {
            return ArtisanService::errorClear();
        }

        $renderable = ArtisanService::errorShow();

        return $renderable->render();
    }

    public function supports(string $command): bool
    {
        return in_array($command, self::ERROR_COMMANDS, true);
    }

    private function getCurrentCommand(): string
    {
        $command = request()->input('act', '');
        Assert::string($command);

        return $command;
    }
}
