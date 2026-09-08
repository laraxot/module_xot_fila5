<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Array;

<<<<<<< HEAD
use Exception;
=======
>>>>>>> c7fd73eb (.)
use Spatie\QueueableAction\QueueableAction;

/**
 * ---.
 */
class DiffAssocRecursiveAction
{
    use QueueableAction;

    /**
<<<<<<< HEAD
     * Undocumented function.
     */
    public static function fixType(array $data): array
    {
        $collection = collect($data)->map(static function ($item) {
            if (!is_array($item)) {
                throw new Exception('[' . __LINE__ . '][' . __CLASS__ . ']');
            }

            return collect($item)->map(static function ($item0) {
=======
     * @param array<int|string, mixed> $data
     *
     * @return array<int|string, array<int|string, mixed>>
     */
    public static function fixType(array $data): array
    {
        $collection = collect($data)->map(static function (mixed $item) {
            if (! is_array($item)) {
                throw new \Exception('['.__LINE__.']['.self::class.']');
            }

            return collect($item)->map(static function (mixed $item0) {
>>>>>>> c7fd73eb (.)
                if (is_numeric($item0)) {
                    $item0 *= 1;
                }

                return $item0;
            })->all();
        });

        return $collection->all();
    }

    /**
<<<<<<< HEAD
     * ---.
=======
     * @param array<int|string, mixed> $arr_1
     * @param array<int|string, mixed> $arr_2
     *
     * @return array<int|string, array<int|string, mixed>>
>>>>>>> c7fd73eb (.)
     */
    public function execute(array $arr_1, array $arr_2): array
    {
        $coll_1 = collect(self::fixType($arr_1));
        $arr_2 = self::fixType($arr_2);

<<<<<<< HEAD
        $ris = $coll_1->filter(static function ($value, $key) use ($arr_2) {
            try {
                return !\in_array($value, $arr_2, false);
            } catch (Exception $exception) {
                dddx(['err' => $exception->getMessage(), 'value' => $value, 'key' => $key, 'arr_2' => $arr_2]);
=======
        $ris = $coll_1->filter(static function (mixed $value, int|string $key) use ($arr_2) {
            try {
                return ! \in_array($value, $arr_2, false);
            } catch (\Exception $exception) {
                throw $exception;
>>>>>>> c7fd73eb (.)
            }
        });

        return $ris->all();
    }
}
