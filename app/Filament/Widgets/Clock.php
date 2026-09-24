<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Widgets;

<<<<<<< HEAD
<<<<<<< HEAD
=======
// use Symfony\Component\Console\Output\BufferedOutput;

>>>>>>> laraxot/dev
class Clock extends XotBaseWidget
{
    public string $start = '';

    /** @var view-string */
=======
// use Symfony\Component\Console\Output\BufferedOutput;

use Filament\Widgets\Widget;

class Clock extends Widget
{
    public string $start = '';

>>>>>>> 8d801bbe (Check & fix styling)
    protected string $view = 'xot::filament.widgets.clock';

    public function begin(): void
    {
        // while ($this->start >= 0) {
        $cond = true;
        while ($cond) {
            // Stream the current count to the browser...
            $this->stream(
                to: 'count',
                content: $this->start,
                replace: true,
            );

            // Pause for 1 second between numbers...
            // sleep(1);

            // Decrement the counter...
            // $this->start = $this->start - 1;
            $this->start = (string) now();
<<<<<<< HEAD
<<<<<<< HEAD
            if ($this->start === 'impossible') {
=======
            if ('impossible' === $this->start) {
>>>>>>> laraxot/dev
=======
            if ('impossible' === $this->start) {
>>>>>>> 8d801bbe (Check & fix styling)
                $cond = false;
            }
        }
    }
}
