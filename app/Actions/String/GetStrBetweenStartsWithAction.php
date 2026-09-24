<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\String;

use Spatie\QueueableAction\QueueableAction;

class GetStrBetweenStartsWithAction
{
    use QueueableAction;

    public function execute(string $body, string $start, string $open, string $close): string
    {
        $pos = mb_strpos($body, $start);
<<<<<<< .merge_file_a4CsCU
        if ($pos === false) {
=======
<<<<<<< HEAD
        if ($pos === false) {
=======
        if (false === $pos) {
>>>>>>> laraxot/dev
>>>>>>> .merge_file_sHY1bM
            throw new \Exception("Cannot find {$start} in {$body} [".__LINE__.']['.__FILE__.']');
        }
        $pos1 = mb_strpos($body, $close, $pos);

        $length = $pos1 - $pos;
        do {
            $body1 = mb_substr($body, $pos, $length);
            $open_count = mb_substr_count($body1, $open);
            $close_count = mb_substr_count($body1, $close);
<<<<<<< .merge_file_a4CsCU
            $length++;
=======
<<<<<<< HEAD
            $length++;
=======
            ++$length;
>>>>>>> laraxot/dev
>>>>>>> .merge_file_sHY1bM
        } while ($open_count !== $close_count);

        return $body1;
    }
}
