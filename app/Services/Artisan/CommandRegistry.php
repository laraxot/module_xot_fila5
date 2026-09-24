<?php

declare(strict_types=1);

namespace Modules\Xot\Services\Artisan;

use Modules\Xot\Services\Artisan\Contracts\CommandHandlerInterface;
use Modules\Xot\Services\Artisan\Handlers\CacheCommandHandler;
use Modules\Xot\Services\Artisan\Handlers\DebugbarCommandHandler;
use Modules\Xot\Services\Artisan\Handlers\ErrorCommandHandler;
use Modules\Xot\Services\Artisan\Handlers\MigrationCommandHandler;
use Modules\Xot\Services\Artisan\Handlers\ModuleCommandHandler;
use Modules\Xot\Services\Artisan\Handlers\OptimizeCommandHandler;
use Modules\Xot\Services\Artisan\Handlers\QueueCommandHandler;
use Modules\Xot\Services\Artisan\Handlers\RouteCommandHandler;
use Modules\Xot\Services\Artisan\Handlers\ViewCommandHandler;

/**
 * Registry for artisan command handlers.
 */
class CommandRegistry
{
    /**
     * @var array<CommandHandlerInterface>
     */
    private array $handlers = [];

    public function __construct()
    {
        $this->registerDefaultHandlers();
    }

    /**
     * Register a command handler.
     */
    public function register(CommandHandlerInterface $handler): self
    {
        $this->handlers[] = $handler;

        return $this;
    }

    /**
     * Find a handler for the given command.
     */
    public function findHandler(string $command): ?CommandHandlerInterface
    {
        foreach ($this->handlers as $handler) {
            if ($handler->supports($command)) {
                return $handler;
            }
        }

        return null;
    }

    /**
     * Register all default command handlers.
     */
    private function registerDefaultHandlers(): void
    {
<<<<<<< HEAD
<<<<<<< .merge_file_IO6D3o
<<<<<<< HEAD
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_k6GuK7
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
>>>>>>> .merge_file_XHzCYP
=======
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
        $this->register(new MigrationCommandHandler())
            ->register(new CacheCommandHandler())
            ->register(new RouteCommandHandler())
            ->register(new ViewCommandHandler())
            ->register(new ErrorCommandHandler())
            ->register(new ModuleCommandHandler())
            ->register(new OptimizeCommandHandler())
            ->register(new QueueCommandHandler())
            ->register(new DebugbarCommandHandler());
<<<<<<< HEAD
<<<<<<< .merge_file_k6GuK7
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
=======
=======
>>>>>>> laraxot/dev
=======
<<<<<<< HEAD
=======
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_olOP8B
        $this->register(new MigrationCommandHandler)
            ->register(new CacheCommandHandler)
            ->register(new RouteCommandHandler)
            ->register(new ViewCommandHandler)
            ->register(new ErrorCommandHandler)
            ->register(new ModuleCommandHandler)
            ->register(new OptimizeCommandHandler)
            ->register(new QueueCommandHandler)
            ->register(new DebugbarCommandHandler);
<<<<<<< .merge_file_IO6D3o
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
        $this->register(new MigrationCommandHandler())
            ->register(new CacheCommandHandler())
            ->register(new RouteCommandHandler())
            ->register(new ViewCommandHandler())
            ->register(new ErrorCommandHandler())
            ->register(new ModuleCommandHandler())
            ->register(new OptimizeCommandHandler())
            ->register(new QueueCommandHandler())
            ->register(new DebugbarCommandHandler());
>>>>>>> .merge_file_XHzCYP
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_olOP8B
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
    }
}
