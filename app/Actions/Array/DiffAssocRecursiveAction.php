<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Array;

use Spatie\QueueableAction\QueueableAction;

/**
 * ---.
 */
class DiffAssocRecursiveAction
{
    use QueueableAction;

    /**
<<<<<<< .merge_file_ceU2L8
=======
<<<<<<< HEAD
>>>>>>> .merge_file_TJ0ljb
     * @param  array<int|string, mixed>  $data
     * @return array<int|string, array<int|string, mixed>>
     */
    public static function fixType(array $data): array
    {
        $collection = collect($data)->map(static function (mixed $item) {
=======
     * @param array<int|string, mixed> $data
     *
     * @return array<int|string, mixed>
     */
    public static function fixType(array $data): array
    {
        $collection = collect($data)->map(static function ($item) {
>>>>>>> laraxot/dev
            if (! is_array($item)) {
                throw new \Exception('['.__LINE__.']['.self::class.']');
            }

<<<<<<< HEAD
            return collect($item)->map(static function (mixed $item0) {
=======
            return collect($item)->map(static function ($item0) {
>>>>>>> laraxot/dev
                if (is_numeric($item0)) {
                    $item0 *= 1;
                }

                return $item0;
            })->all();
        });

        return $collection->all();
    }

    /**
<<<<<<< .merge_file_ceU2L8
     * @param  array<int|string, mixed>  $arr_1
     * @param  array<int|string, mixed>  $arr_2
     * @return array<int|string, array<int|string, mixed>>
=======
<<<<<<< HEAD
     * @param  array<int|string, mixed>  $arr_1
     * @param  array<int|string, mixed>  $arr_2
     * @return array<int|string, array<int|string, mixed>>
=======
     * @param array<int|string, mixed> $arr_1
     * @param array<int|string, mixed> $arr_2
     *
     * @return array<int|string, mixed>
>>>>>>> laraxot/dev
>>>>>>> .merge_file_TJ0ljb
     */
    public function execute(array $arr_1, array $arr_2): array
    {
        $coll_1 = collect(self::fixType($arr_1));
        $arr_2 = self::fixType($arr_2);

<<<<<<< .merge_file_ceU2L8
        $ris = $coll_1->filter(static function (array $value, int|string $key) use ($arr_2) {
=======
<<<<<<< HEAD
        $ris = $coll_1->filter(static function (array $value, int|string $key) use ($arr_2) {
=======
        $ris = $coll_1->filter(static function ($value, $key) use ($arr_2) {
>>>>>>> laraxot/dev
>>>>>>> .merge_file_TJ0ljb
            try {
                return ! \in_array($value, $arr_2, false);
            } catch (\Exception $exception) {
                throw $exception;
            }
        });

        return $ris->all();
    }
}
