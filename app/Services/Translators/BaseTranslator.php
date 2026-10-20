<?php

declare(strict_types=1);

namespace Modules\Xot\Services\Translators;

use Spatie\QueueableAction\QueueableAction;

abstract class BaseTranslator
{
    use QueueableAction;
    
    /**
     * QueueableAction execute method for translators.
     *
     * @param  string  $text
     * @param  string  $from
     * @param  string  $to
     * @return string
     */
    public function execute(string $text = '', string $from = '', string $to = ''): string
    {
        return $text;
    }
}