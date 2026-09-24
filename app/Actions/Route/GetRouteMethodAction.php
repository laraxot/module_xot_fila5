<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Route;

use Illuminate\Support\Arr;
use Spatie\QueueableAction\QueueableAction;

/**
 * Replaces Modules\Xot\Services\RouteDynService::getMethod().
 *
 * Standalone pure helper (independently tested), kept as its own Action
 * rather than folded into RegisterDynamicRoutesAction.
 */
class GetRouteMethodAction
{
    use QueueableAction;

    /**
<<<<<<< .merge_file_OXhApR
<<<<<<< HEAD
     * @param  array<string, mixed>  $v
=======
=======
<<<<<<< .merge_file_kYaq7r
     * @param  array<string, mixed>  $v
=======
<<<<<<< HEAD
     * @param  array<string, mixed>  $v
=======
>>>>>>> .merge_file_MwfUbP
<<<<<<< .merge_file_PLRs1y
<<<<<<< HEAD
     * @param  array<string, mixed>  $v
=======
     * @param array<string, mixed> $v
     *
>>>>>>> laraxot/dev
=======
     * @param array<string, mixed> $v
     *
>>>>>>> .merge_file_DylFiN
>>>>>>> laraxot/dev
<<<<<<< .merge_file_OXhApR
=======
>>>>>>> .merge_file_vesQYr
>>>>>>> .merge_file_MwfUbP
     * @return array<int, string>
     */
    public function execute(array $v, ?string $namespace = null): array
    {
        if (isset($v['method'])) {
<<<<<<< .merge_file_OXhApR
=======
<<<<<<< .merge_file_kYaq7r
            /** @var array<int, string> */
=======
>>>>>>> .merge_file_MwfUbP
<<<<<<< HEAD
            /** @var array<int, string> */
=======
<<<<<<< .merge_file_PLRs1y
<<<<<<< HEAD
            /** @var array<int, string> */
=======
            /* @var array<int, string> */
>>>>>>> laraxot/dev
=======
            /* @var array<int, string> */
>>>>>>> .merge_file_DylFiN
>>>>>>> laraxot/dev
<<<<<<< .merge_file_OXhApR
=======
>>>>>>> .merge_file_vesQYr
>>>>>>> .merge_file_MwfUbP
            return Arr::wrap($v['method']);
        }

        return ['get', 'post'];
    }
}
