<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Route;

use Spatie\QueueableAction\QueueableAction;

class BuildLanguageUrlAction
{
    use QueueableAction;

    /** @param array<string, mixed> $_params */
    public function execute(array $_params = []): string
    {
        return '?';
    }
}
