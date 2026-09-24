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
<<<<<<< HEAD
     * @param  array<string, mixed>  $v
<<<<<<< .merge_file_om8gXo
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_PLRs1y
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
     * @param  array<string, mixed>  $v
=======
     * @param array<string, mixed> $v
     *
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
     * @param array<string, mixed> $v
     *
>>>>>>> .merge_file_DylFiN
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
     * @param array<string, mixed> $v
     *
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_v3zXIP
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
     * @return array<int, string>
     */
    public function execute(array $v, ?string $namespace = null): array
    {
        if (isset($v['method'])) {
<<<<<<< HEAD
<<<<<<< .merge_file_om8gXo
<<<<<<< HEAD
            /** @var array<int, string> */
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_PLRs1y
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
            /** @var array<int, string> */
=======
            /* @var array<int, string> */
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
            /* @var array<int, string> */
>>>>>>> .merge_file_DylFiN
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
            /* @var array<int, string> */
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
            /** @var array<int, string> */
>>>>>>> .merge_file_v3zXIP
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
            return Arr::wrap($v['method']);
        }

        return ['get', 'post'];
    }
}
