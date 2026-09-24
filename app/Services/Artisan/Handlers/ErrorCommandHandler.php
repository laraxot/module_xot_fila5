<?php

declare(strict_types=1);

namespace Modules\Xot\Services\Artisan\Handlers;

use Modules\Xot\Services\Artisan\Contracts\CommandHandlerInterface;
use Modules\Xot\Services\ArtisanService;
use Webmozart\Assert\Assert;

/**
 * Handles error-related artisan commands.
 */
class ErrorCommandHandler implements CommandHandlerInterface
{
    /** @var list<string> */
    private const array ERROR_COMMANDS = ['error', 'error-show', 'error-clear'];

    public function handle(string $moduleName = ''): string
    {
        $command = $this->getCurrentCommand();

<<<<<<< HEAD
        if ($command === 'error-clear') {
<<<<<<< .merge_file_M4mtCd
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_bSE5KC
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
        if ($command === 'error-clear') {
=======
        if ('error-clear' === $command) {
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
        if ('error-clear' === $command) {
>>>>>>> .merge_file_KBd27C
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
        if ('error-clear' === $command) {
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_Ih89Ug
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
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
