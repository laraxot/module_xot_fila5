<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Arr;

use Spatie\QueueableAction\QueueableAction;

/**
 * ---.
 */
class DiffAssocRecursiveAction
{
    use QueueableAction;

    /**
<<<<<<< .merge_file_hY2TV6
<<<<<<< HEAD
     * <<<<<<< HEAD.
     *
     * @param array<int|string, mixed> $data
     *                                       =======
     * @param array<int|string, mixed> $data
     *
     * >>>>>>> laraxot/dev
     *
=======
     * @param  array<int|string, mixed>  $data
>>>>>>> .merge_file_l6yaXP
     * @return array<int|string, array<int|string, mixed>>
     */
    public static function fixType(array $data): array
    {
<<<<<<< HEAD
        $collection = collect($data)->map(static function (mixed $item) {
=======
<<<<<<< HEAD
     * @param array<string, mixed> $data
     *
     * @return array<string, mixed>
     */
    public static function fixType(array $data): array
    {
        $collection = collect($data)->map(static function ($item) {
>>>>>>> 3792da0d (Check & fix styling)
=======
        $collection = collect($data)->map(static function ($item) {
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
            if (! is_array($item)) {
                throw new \Exception('['.__LINE__.']['.self::class.']');
            }

<<<<<<< HEAD
            return collect($item)->map(static function (mixed $item0) {
=======
            return collect($item)->map(static function ($item0) {
<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
                if (is_numeric($item0)) {
                    $item0 *= 1;
                }

                return $item0;
            })->all();
        });

        return $collection->all();
    }

    /**
<<<<<<< .merge_file_hY2TV6
<<<<<<< HEAD
     * <<<<<<< HEAD.
     *
     * @param array<int|string, mixed> $arr_1
     * @param array<int|string, mixed> $arr_2
     *                                        =======
     * @param array<int|string, mixed> $arr_1
     * @param array<int|string, mixed> $arr_2
     *
     * >>>>>>> laraxot/dev
     *
=======
     * @param  array<int|string, mixed>  $arr_1
     * @param  array<int|string, mixed>  $arr_2
>>>>>>> .merge_file_l6yaXP
     * @return array<int|string, array<int|string, mixed>>
=======
     * @param array<string, mixed> $arr_1
     * @param array<string, mixed> $arr_2
     *
     * @return array<string, mixed>
>>>>>>> 3792da0d (Check & fix styling)
     */
    public function execute(array $arr_1, array $arr_2): array
    {
        $coll_1 = collect(self::fixType($arr_1));
        $arr_2 = self::fixType($arr_2);

<<<<<<< HEAD
        $ris = $coll_1->filter(static function (array $value, int|string $key) use ($arr_2) {
=======
        $ris = $coll_1->filter(static function ($value, $key) use ($arr_2) {
<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
            try {
                return ! \in_array($value, $arr_2, false);
            } catch (\Exception $exception) {
                throw $exception;
            }
        });

        return $ris->all();
    }
}
