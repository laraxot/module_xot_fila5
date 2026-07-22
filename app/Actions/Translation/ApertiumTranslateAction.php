<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Translation;

use Spatie\QueueableAction\QueueableAction;

class ApertiumTranslateAction extends BaseTranslateAction
{
    use QueueableAction;

    public function execute(string $text, string $from, string $to): string
    {
        return '';
    }
}
