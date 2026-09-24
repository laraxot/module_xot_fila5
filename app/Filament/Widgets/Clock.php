<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Widgets;

<<<<<<< .merge_file_2cwAT4
<<<<<<< HEAD
<<<<<<< HEAD
=======
// use Symfony\Component\Console\Output\BufferedOutput;

>>>>>>> laraxot/dev
=======
// use Symfony\Component\Console\Output\BufferedOutput;

>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_Nc6kyF
class Clock extends XotBaseWidget
{
    public string $start = '';

<<<<<<< HEAD
    /** @var view-string */
=======
    /** @phpstan-ignore property.defaultValue */
>>>>>>> 3792da0d (Check & fix styling)
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
<<<<<<< .merge_file_2cwAT4
<<<<<<< HEAD
<<<<<<< HEAD
            if ($this->start === 'impossible') {
=======
            if ('impossible' === $this->start) {
>>>>>>> laraxot/dev
=======
            if ('impossible' === $this->start) {
>>>>>>> 3792da0d (Check & fix styling)
=======
            if ($this->start === 'impossible') {
>>>>>>> .merge_file_Nc6kyF
                $cond = false;
            }
        }
    }
}
