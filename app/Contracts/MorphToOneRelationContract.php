<?php

declare(strict_types=1);

namespace Modules\Xot\Contracts;

use Illuminate\Database\Eloquent\Model;

/**
 * Contract for relations that expose MorphToOne-style create().
 *
 * Optional runtime implementation may come from fidum/laravel-eloquent-morph-to-one.
 */
interface MorphToOneRelationContract
{
    /**
<<<<<<< .merge_file_2E1dgH
     * @param  array<string, mixed>  $attributes
=======
     * <<<<<<< .merge_file_uy89WO.
     *
     * @param array<string, mixed> $attributes
     *                                         =======
     *                                         <<<<<<< HEAD
     * @param array<string, mixed> $attributes
     *                                         =======
     * @param array<string, mixed> $attributes
     *                                         >>>>>>> laraxot/dev
     *                                         >>>>>>> .merge_file_bDJ3Gs
>>>>>>> .merge_file_JwvZ1t
     */
    public function create(array $attributes): Model;
}
