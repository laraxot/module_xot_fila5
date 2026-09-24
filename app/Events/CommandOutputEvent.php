<?php

declare(strict_types=1);

namespace Modules\Xot\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class CommandOutputEvent implements ShouldBroadcast
{
    use Dispatchable;
    use InteractsWithSockets;
    use SerializesModels;

    public function __construct(
        public string $processId,
        public string $output,
        public string $type = 'output',
<<<<<<< .merge_file_MnkF8i
<<<<<<< HEAD
<<<<<<< HEAD
    ) {}
=======
    ) {
    }
>>>>>>> laraxot/dev
=======
    ) {
    }
>>>>>>> 3792da0d (Check & fix styling)
=======
    ) {}
>>>>>>> .merge_file_l4Ph3M

    public function broadcastOn(): array
    {
        return [
            new Channel("command.{$this->processId}"),
        ];
    }

    public function broadcastAs(): string
    {
        return 'CommandOutput';
    }

    /** @return array<string, string> */
    public function broadcastWith(): array
    {
        return [
            'processId' => $this->processId,
            'output' => $this->output,
            'type' => $this->type,
            'timestamp' => now()->toIso8601String(),
        ];
    }
}
