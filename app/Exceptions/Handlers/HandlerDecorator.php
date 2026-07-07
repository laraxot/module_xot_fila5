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

    public function __call(string $name, array $parameters): mixed
    {
        /** @var callable */
        $callable = [$this->defaultHandler, $name];

        return \call_user_func_array($callable, $parameters);
    }

    public function report(\Throwable $e): void
    {
        foreach ($this->repository->getReportersByException($e) as $reporter) {
<<<<<<< HEAD
            if (\is_callable($reporter)) {
=======
            if (is_callable($reporter)) {
>>>>>>> origin/dev
                $reporter($e);
            }
        }

        $this->defaultHandler->report($e);
    }

    public function render($request, \Throwable $e): SymfonyResponse
    {
        foreach ($this->repository->getRenderersByException($e) as $renderer) {
<<<<<<< HEAD
            if (\is_callable($renderer)) {
=======
            if (is_callable($renderer)) {
>>>>>>> origin/dev
                $response = $renderer($e, $request);
                if ($response instanceof SymfonyResponse) {
                    return $response;
                }
            }
        }

        return $this->defaultHandler->render($request, $e);
    }

<<<<<<< HEAD
    public function renderForConsole($output, \Throwable $e): void
    {
        foreach ($this->repository->getConsoleRenderersByException($e) as $renderer) {
            if (\is_callable($renderer)) {
=======
    /**
     * @phpstan-ignore-next-line
     */
    public function renderForConsole($output, \Throwable $e): void
    {
        foreach ($this->repository->getConsoleRenderersByException($e) as $renderer) {
            if (is_callable($renderer)) {
>>>>>>> origin/dev
                $renderer($e, $output);
            }
        }

<<<<<<< HEAD
        /* @phpstan-ignore method.internal */
=======
        /* @phpstan-ignore-next-line */
>>>>>>> origin/dev
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
        return $this->repository->addConsoleRenderer($renderer);
    }

    public function shouldReport(\Throwable $e): bool
    {
        return $this->defaultHandler->shouldReport($e);
    }
}
