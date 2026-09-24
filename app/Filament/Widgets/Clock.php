<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Widgets;

<<<<<<< HEAD
=======
// use Symfony\Component\Console\Output\BufferedOutput;

>>>>>>> laraxot/dev
class Clock extends XotBaseWidget
{
    public string $start = '';

<<<<<<< HEAD
    /** @var view-string */
=======
    /** @phpstan-ignore property.defaultValue */
>>>>>>> laraxot/dev
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
<<<<<<< .merge_file_Jwxqoa
            if ($this->start === 'impossible') {
=======
<<<<<<< HEAD
            if ($this->start === 'impossible') {
=======
            if ('impossible' === $this->start) {
>>>>>>> laraxot/dev
>>>>>>> .merge_file_rOPwXD
                $cond = false;
            }
        }
    }
}
