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
<<<<<<< HEAD
<<<<<<< .merge_file_zYMUw8
<<<<<<< HEAD
     * <<<<<<< HEAD.
=======
<<<<<<< HEAD
<<<<<<< .merge_file_mDfU0I
>>>>>>> da9ae01a0 (.)
     *
     * @param array<string, mixed> $attributes
     *                                         =======
     *                                         <<<<<<< .merge_file_mDfU0I.
     * @param array<string, mixed> $attributes
     *                                         =======
     *                                         <<<<<<< HEAD
     *                                         <<<<<<< .merge_file_2E1dgH.
     * @param array<string, mixed> $attributes
     *                                         =======
     *                                         <<<<<<< .merge_file_uy89WO.
     * @param array<string, mixed> $attributes
     *                                         =======
     *                                         <<<<<<< HEAD
     * @param array<string, mixed> $attributes
     *                                         =======
     * @param array<string, mixed> $attributes
     *                                         >>>>>>> laraxot/dev
     *                                         >>>>>>> .merge_file_bDJ3Gs
     *                                         >>>>>>> .merge_file_JwvZ1t
     *                                         =======
     * @param array<string, mixed> $attributes
     *                                         >>>>>>> 9e11d472 (Fix merge conflicts in PHPDoc comments across multiple action classes and contracts, ensuring consistent parameter annotations and removing redundant lines.)
<<<<<<< HEAD
     *                                         >>>>>>> .merge_file_UnoXtl
     *                                         >>>>>>> laraxot/dev
=======
     * @param array<string, mixed> $attributes
>>>>>>> 3792da0d (Check & fix styling)
=======
     * @param  array<string, mixed>  $attributes
>>>>>>> .merge_file_gHiVok
=======
>>>>>>> .merge_file_UnoXtl
=======
     * @param array<string, mixed> $attributes
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
     */
    public function create(array $attributes): Model;
}
