<?php

declare(strict_types=1);

namespace Modules\Xot\Services;

use Spatie\QueueableAction\QueueableAction;

/**
 * Undocumented class.
 */
class UrlService
{
    use QueueableAction;

    private static null|self $instance = null;

    public function __construct() {}

    public static function getInstance(): self
    {
        if (!(self::$instance instanceof self)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * Undocumented function.
     */
    public static function make(): self
    {
        return static::getInstance();
    }

    public function checkValidUrl(string $url): bool
    {
        return false !== filter_var($url, FILTER_VALIDATE_URL);
    }

    /**
     * QueueableAction execute method for UrlService.
     * Checks if a URL is valid.
     *
     * @param  string  $url
     * @return bool
     */
    public function execute(string $url): bool
    {
        return $this->checkValidUrl($url);
    }
}