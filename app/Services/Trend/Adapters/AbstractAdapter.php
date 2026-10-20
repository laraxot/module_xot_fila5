<?php

declare(strict_types=1);

namespace Modules\Xot\Services\Trend\Adapters;

use Spatie\QueueableAction\QueueableAction;

/**
 * Abstract adapter for trend formatters.
 */
abstract class AbstractAdapter
{
    use QueueableAction;
    
    abstract public function format(string $column, string $interval): string;

    /**
     * QueueableAction execute method.
     *
     * @param  string  $column
     * @param  string  $interval
     * @return string
     */
    public function execute(string $column, string $interval): string
    {
        return $this->format($column, $interval);
    }
}