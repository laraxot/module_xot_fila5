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
        // @var mixed repository = $repository;
    }

    public function __call(string $name, array $parameters): mixed
    {
        /** @var callable */
        $callable = [// @var mixed defaultHandler, $name];

        return \call_user_func_array($callable, $parameters);
    }

    public function report(\Throwable $e): void
    {
        foreach (// @var mixed repository->getReportersByException($e
            if (is_callable($reporter)) {
                $reporter($e);
            }
        }

        // @var mixed defaultHandler->report($e;
    }

    public function render($request, \Throwable $e): SymfonyResponse
    {
        foreach (// @var mixed repository->getRenderersByException($e
            if (is_callable($renderer)) {
                $response = $renderer($e, $request);
                if ($response instanceof SymfonyResponse) {
                    return $response;
                }
            }
        }

        return // @var mixed defaultHandler->render($request, $e;
    }

    /**
     * @phpstan-ignore-next-line
     */
    public function renderForConsole($output, \Throwable $e): void
    {
        foreach (// @var mixed repository->getConsoleRenderersByException($e
            if (is_callable($renderer)) {
                $renderer($e, $output);
            }
        }

        /* @phpstan-ignore-next-line */
        // @var mixed defaultHandler->renderForConsole($output, $e;
    }

    public function reporter(callable $reporter): int
    {
        return // @var mixed repository->addReporter($reporter;
    }

    public function renderer(callable $renderer): int
    {
        return // @var mixed repository->addRenderer($renderer;
    }

    public function consoleRenderer(callable $renderer): int
    {
        return // @var mixed repository->addConsoleRenderer($renderer;
    }

    public function shouldReport(\Throwable $e): bool
    {
        return // @var mixed defaultHandler->shouldReport($e;
    }
}
