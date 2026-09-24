<?php

declare(strict_types=1);

namespace Modules\Xot\Actions;

use Spatie\QueueableAction\QueueableAction;

class ArrayAction
{
    use QueueableAction;

    /**
     * @return array{0: int, 1: int}|false
     */
    public static function rangeIntersect(int $a, int $b, int $c, int $d): array|bool
    {
        $maxStart = max($a, $c);
        $minEnd = min($b, $d);

        if ($maxStart <= $minEnd) {
            return [$maxStart, $minEnd];
        }

        return false;
    }

    /**
<<<<<<< .merge_file_BWNm5X
<<<<<<< HEAD
     * @param  array<int|string, mixed>  $array1
     * @param  array<int|string, mixed>  $array2
=======
     * @param array<int|string, mixed> $array1
     * @param array<int|string, mixed> $array2
     *
>>>>>>> laraxot/dev
=======
     * @param array<int|string, mixed> $array1
     * @param array<int|string, mixed> $array2
     *
>>>>>>> .merge_file_fqc4li
     * @return array<int|string, mixed>
     */
    public static function diff_assoc_recursive(array $array1, array $array2): array
    {
        $outputDiff = [];
        foreach ($array1 as $key => $value) {
            if (array_key_exists($key, $array2)) {
                if (is_array($value)) {
                    if (! is_array($array2[$key])) {
                        $outputDiff[$key] = $value;
                    } else {
                        $recursiveDiff = self::diff_assoc_recursive($value, $array2[$key]);
                        if (count($recursiveDiff)) {
                            $outputDiff[$key] = $recursiveDiff;
                        }
                    }
                } else {
                    if ($value !== $array2[$key]) {
                        $outputDiff[$key] = $value;
                    }
                }
            } else {
                $outputDiff[$key] = $value;
            }
        }

        return $outputDiff;
    }

<<<<<<< .merge_file_BWNm5X
<<<<<<< HEAD
    public function execute(): void {}
=======
    public function execute(): void
    {
    }
>>>>>>> laraxot/dev
=======
    public function execute(): void
    {
    }
>>>>>>> .merge_file_fqc4li
}
