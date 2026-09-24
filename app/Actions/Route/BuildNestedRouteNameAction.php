<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Route;

use Spatie\QueueableAction\QueueableAction;

class BuildNestedRouteNameAction
{
    use QueueableAction;

    /** @param array<string, mixed> $params */
    public function execute(array $params): string
    {
        $depth = is_numeric($params['n'] ?? null) ? (int) $params['n'] : 0;
        $action = is_string($params['act'] ?? null) ? $params['act'] : 'show';
        $parts = inAdmin($params) ? ['admin'] : [];

<<<<<<< HEAD
<<<<<<< .merge_file_5KJ8cn
<<<<<<< HEAD
<<<<<<< HEAD
        for ($i = 0; $i <= $depth; $i++) {
=======
=======
<<<<<<< HEAD
>>>>>>> da9ae01a0 (.)
<<<<<<< .merge_file_wxWbGQ
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
        for ($i = 0; $i <= $depth; $i++) {
=======
        for ($i = 0; $i <= $depth; ++$i) {
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
        for ($i = 0; $i <= $depth; ++$i) {
>>>>>>> .merge_file_ZbC2mV
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
        for ($i = 0; $i <= $depth; ++$i) {
>>>>>>> 3792da0d (Check & fix styling)
=======
        for ($i = 0; $i <= $depth; $i++) {
>>>>>>> .merge_file_8qQzjE
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
            $parts[] = 'container'.$i;
        }

        $parts[] = $action;

        return implode('.', $parts);
    }
}
