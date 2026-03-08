<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Widgets;

// use Symfony\Component\Console\Output\BufferedOutput;

use Filament\Widgets\Widget;

class Clock extends Widget
{
    public string $start = '';

    protected string $view = 'xot::filament.widgets.clock';

    public function begin(): void
    {
        // while (// @var mixed start >= 0
        $cond = true;
        while ($cond) {
            // Stream the current count to the browser...
            // @var mixed stream(
                to: 'count',
                content: // @var mixed start,
                replace: true,
            );

            // Pause for 1 second between numbers...
            // sleep(1);

            // Decrement the counter...
            // // @var mixed start = $this->start - 1;
            // @var mixed start = (string;
            if ('impossible' === // @var mixed start
                $cond = false;
            }
        }
    }
}
