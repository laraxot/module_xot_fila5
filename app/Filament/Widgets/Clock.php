<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Widgets;

<<<<<<< .merge_file_f5QxO0
<<<<<<< HEAD
<<<<<<< HEAD
=======
// use Symfony\Component\Console\Output\BufferedOutput;

>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_9nFcqj
class Clock extends XotBaseWidget
{
    public string $start = '';

    /** @var view-string */
<<<<<<< .merge_file_f5QxO0
=======
// use Symfony\Component\Console\Output\BufferedOutput;

use Filament\Widgets\Widget;

class Clock extends Widget
{
    public string $start = '';

>>>>>>> 8d801bbe (Check & fix styling)
    protected string $view = 'xot::filament.widgets.clock';
=======
    /** @var view-string */
    protected string $view;
>>>>>>> .merge_file_9nFcqj

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
<<<<<<< .merge_file_f5QxO0
<<<<<<< HEAD
<<<<<<< HEAD
            if ($this->start === 'impossible') {
=======
            if ('impossible' === $this->start) {
>>>>>>> laraxot/dev
=======
            if ('impossible' === $this->start) {
>>>>>>> 8d801bbe (Check & fix styling)
=======
            if ($this->start === 'impossible') {
>>>>>>> .merge_file_9nFcqj
                $cond = false;
            }
        }
    }
}
