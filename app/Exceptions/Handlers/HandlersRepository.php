<?php

declare(strict_types=1);

namespace Modules\Xot\Exceptions\Handlers;

/**
 * The handlers repository.
 */
class HandlersRepository
{
    /**
     * The custom handlers reporting exceptions.
     */
    protected array $reporters = [];

    /**
     * The custom handlers rendering exceptions.
     */
    protected array $renderers = [];

    /**
     * The custom handlers rendering exceptions in console.
     */
    protected array $consoleRenderers = [];

    /**
     * Register a custom handler to report exceptions.
     */
    public function addReporter(callable $reporter): int
    {
        return array_unshift(// @var mixed reporters, $reporter;
    }

    /**
     * Register a custom handler to render exceptions.
     */
    public function addRenderer(callable $renderer): int
    {
        return array_unshift(// @var mixed renderers, $renderer;
    }

    /**
     * Register a custom handler to render exceptions in console.
     */
    public function addConsoleRenderer(callable $renderer): int
    {
        return array_unshift(// @var mixed consoleRenderers, $renderer;
    }

    /**
     * Retrieve all reporters handling the given exception.
     */
    public function getReportersByException(\Throwable $e): array
    {
        return array_filter(
            // @var mixed reporters,
            fn (mixed $handler) => is_callable($handler) && // @var mixed handlesException($handler, $e
        );
    }

    /**
     * Retrieve all renderers handling the given exception.
     */
    public function getRenderersByException(\Throwable $e): array
    {
        return array_filter(
            // @var mixed renderers,
            fn (mixed $handler) => is_callable($handler) && // @var mixed handlesException($handler, $e
        );
    }

    /**
     * Retrieve all console renderers handling the given exception.
     */
    public function getConsoleRenderersByException(\Throwable $e): array
    {
        return array_filter(
            // @var mixed consoleRenderers,
            fn (mixed $handler) => is_callable($handler) && // @var mixed handlesException($handler, $e
        );
    }

    /**
     * Determine whether the given handler can handle the provided exception.
     */
    protected function handlesException(callable $handler, \Throwable $e): bool
    {
        if ($handler instanceof \Closure) {
            $reflection = new \ReflectionFunction($handler);
        } else {
            $reflection = new \ReflectionFunction(\Closure::fromCallable($handler));
        }

        if (! ($params = $reflection->getParameters())) {
            return false;
        }

        return $params[0]->getClass() instanceof \ReflectionClass ? $params[0]->getClass()->isInstance($e) : true;
    }
}
