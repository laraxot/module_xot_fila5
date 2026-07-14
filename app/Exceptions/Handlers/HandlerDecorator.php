<?php

declare(strict_types=1);

namespace Modules\Xot\Exceptions\Handlers;

use Illuminate\Contracts\Debug\ExceptionHandler;
use Symfony\Component\HttpFoundation\Response as SymfonyResponse;

class HandlerDecorator implements ExceptionHandler
{
    protected HandlersRepository $repository;

    public function __construct(
        protected ExceptionHandler $defaultHandler,
        HandlersRepository $repository,
    ) {
        $this->repository = $repository;
    }

    /**
     * @param array<int, mixed> $parameters
     */
    public function __call(string $name, array $parameters): mixed
    {
        /** @var callable */
        $callable = [$this->defaultHandler, $name];

        return \call_user_func_array($callable, $parameters);
    }

    public function report(\Throwable $e): void
    {
        foreach ($this->repository->getReportersByException($e) as $reporter) {
            if (\is_callable($reporter)) {
                $reporter($e);
            }
        }

        $this->defaultHandler->report($e);
    }

    public function render($request, \Throwable $e): SymfonyResponse
    {
        foreach ($this->repository->getRenderersByException($e) as $renderer) {
            if (\is_callable($renderer)) {
                $response = $renderer($e, $request);
                if ($response instanceof SymfonyResponse) {
                    return $response;
                }
            }
        }

        return $this->defaultHandler->render($request, $e);
    }

    /**
     * @phpstan-ignore-next-line
     */
    public function renderForConsole($output, \Throwable $e): void
    {
        foreach ($this->repository->getConsoleRenderersByException($e) as $renderer) {
            if (\is_callable($renderer)) {
                $renderer($e, $output);
            }
        }

        /* @phpstan-ignore-next-line */
        $this->defaultHandler->renderForConsole($output, $e);
    }

    public function reporter(callable $reporter): int
    {
        return $this->repository->addReporter($reporter);
    }

    public function renderer(callable $renderer): int
    {
        return $this->repository->addRenderer($renderer);
    }

    public function consoleRenderer(callable $renderer): int
    {
        return $this->addConsoleRenderer($renderer);
    }

    /**
     * Register a custom handler to report exceptions.
     */
    private function addReporter(callable $reporter): int
    {
        return array_unshift($this->reporters, $reporter);
    }

    /**
     * Register a custom handler to render exceptions.
     */
    private function addRenderer(callable $renderer): int
    {
        return array_unshift($this->renderers, $renderer);
    }

    /**
     * Register a custom handler to render exceptions in console.
     */
    private function addConsoleRenderer(callable $renderer): int
    {
        return array_unshift($this->consoleRenderers, $renderer);
    }

    /**
     * Retrieve all reporters handling the given exception.
     *
     * @return array<int, callable>
     */
    private function getReportersByException(\Throwable $e): array
    {
        return array_filter(
            $this->reporters,
            fn (callable $handler): bool => $this->handlesException($handler, $e),
        );
    }

    /**
     * Retrieve all renderers handling the given exception.
     *
     * @return array<int, callable>
     */
    private function getRenderersByException(\Throwable $e): array
    {
        return array_filter(
            $this->renderers,
            fn (callable $handler): bool => $this->handlesException($handler, $e),
        );
    }

    /**
     * Retrieve all console renderers handling the given exception.
     *
     * @return array<int, callable>
     */
    private function getConsoleRenderersByException(\Throwable $e): array
    {
        return array_filter(
            $this->consoleRenderers,
            fn (callable $handler): bool => $this->handlesException($handler, $e),
        );
    }

    public function shouldReport(\Throwable $e): bool
    {
        return $this->defaultHandler->shouldReport($e);
    }
}
