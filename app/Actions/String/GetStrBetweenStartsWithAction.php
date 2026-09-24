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
<<<<<<< .merge_file_XVBydo
<<<<<<< HEAD
<<<<<<< HEAD
        if ($pos === false) {
=======
        if (false === $pos) {
>>>>>>> laraxot/dev
=======
        if (false === $pos) {
>>>>>>> 8d801bbe (Check & fix styling)
=======
        if ($pos === false) {
>>>>>>> .merge_file_liHzxp
            throw new \Exception("Cannot find {$start} in {$body} [".__LINE__.']['.__FILE__.']');
        }
        $pos1 = mb_strpos($body, $close, $pos);

        $length = $pos1 - $pos;
        do {
            $body1 = mb_substr($body, $pos, $length);
            $open_count = mb_substr_count($body1, $open);
            $close_count = mb_substr_count($body1, $close);
<<<<<<< .merge_file_XVBydo
<<<<<<< HEAD
<<<<<<< HEAD
            $length++;
=======
            ++$length;
>>>>>>> laraxot/dev
=======
            ++$length;
>>>>>>> 8d801bbe (Check & fix styling)
=======
            $length++;
>>>>>>> .merge_file_liHzxp
        } while ($open_count !== $close_count);

        return $body1;
    }
}
