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
<<<<<<< .merge_file_1fSacN
=======
<<<<<<< .merge_file_MgglQ0
=======
>>>>>>> .merge_file_3UFjkG
=======
<<<<<<< .merge_file_k6GuK7
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_XHzCYP
<<<<<<< .merge_file_1fSacN
=======
>>>>>>> .merge_file_ou6xLF
>>>>>>> .merge_file_3UFjkG
        $this->register(new MigrationCommandHandler())
            ->register(new CacheCommandHandler())
            ->register(new RouteCommandHandler())
            ->register(new ViewCommandHandler())
            ->register(new ErrorCommandHandler())
            ->register(new ModuleCommandHandler())
            ->register(new OptimizeCommandHandler())
            ->register(new QueueCommandHandler())
            ->register(new DebugbarCommandHandler());
<<<<<<< .merge_file_1fSacN
=======
<<<<<<< .merge_file_MgglQ0
=======
=======
>>>>>>> .merge_file_3UFjkG
<<<<<<< .merge_file_k6GuK7
<<<<<<< HEAD
=======
=======
>>>>>>> laraxot/dev
<<<<<<< .merge_file_1fSacN
=======
>>>>>>> .merge_file_ou6xLF
>>>>>>> .merge_file_3UFjkG
        $this->register(new MigrationCommandHandler)
            ->register(new CacheCommandHandler)
            ->register(new RouteCommandHandler)
            ->register(new ViewCommandHandler)
            ->register(new ErrorCommandHandler)
            ->register(new ModuleCommandHandler)
            ->register(new OptimizeCommandHandler)
            ->register(new QueueCommandHandler)
            ->register(new DebugbarCommandHandler);
<<<<<<< .merge_file_1fSacN
=======
<<<<<<< .merge_file_MgglQ0
=======
>>>>>>> .merge_file_3UFjkG
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
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
<<<<<<< .merge_file_1fSacN
=======
>>>>>>> .merge_file_ou6xLF
>>>>>>> .merge_file_3UFjkG
>>>>>>> laraxot/dev
    }
}
