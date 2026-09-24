<?php

declare(strict_types=1);

namespace Modules\Xot\Contracts;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Spatie\Permission\Contracts\Permission;
use Spatie\Permission\Contracts\Role;
use Spatie\Permission\Exceptions\PermissionDoesNotExist;

/**
 * Modules\Xot\Contracts\ModelProfileContract.
 *
 * @phpstan-require-extends Model
 *
 * @mixin \Eloquent
 */
interface ModelProfileContract extends ModelContract
{
    /**
     * Grant the given permission(s) to a role.
     *
     * <<<<<<< .merge_file_6LAhwq
     * <<<<<<< HEAD
     *
     * @param string|int|array<int, string|int|Permission>|Permission|Collection<int, Permission> $permissions
     *                                                                                                         =======
     *                                                                                                         <<<<<<< .merge_file_DMxry3
     *                                                                                                         =======
     *                                                                                                         <<<<<<< HEAD
     *                                                                                                         <<<<<<< .merge_file_7zavuJ
     *                                                                                                         >>>>>>> .merge_file_55oZz4
     * @param string|int|array<int, string|int|Permission>|Permission|Collection<int, Permission> $permissions
     *                                                                                                         =======
     *                                                                                                         <<<<<<< HEAD
     * @param string|int|array<int, string|int|Permission>|Permission|Collection<int, Permission> $permissions
     *                                                                                                         =======
     *                                                                                                         <<<<<<< .merge_file_DMxry3
     *                                                                                                         =======
     *                                                                                                         <<<<<<< HEAD
     *                                                                                                         <<<<<<< .merge_file_7zavuJ
     *                                                                                                         >>>>>>> .merge_file_55oZz4
     * @param string|int|array<int, string|int|Permission>|Permission|Collection<int, Permission> $permissions
     *                                                                                                         >>>>>>> .merge_file_GpNqRG
     *
     * <<<<<<< .merge_file_DMxry3
     * =======
     * =======
     * @param string|int|array<int, string|int|Permission>|Permission|Collection<int, Permission> $permissions
     *                                                                                                         >>>>>>> 9e11d472 (Fix merge conflicts in PHPDoc comments across multiple action classes and contracts, ensuring consistent parameter annotations and removing redundant lines.)
     *
     * >>>>>>> .merge_file_55oZz4
     *
     * <<<<<<< .merge_file_6LAhwq
     * >>>>>>> laraxot/dev
     * =======
     * >>>>>>> laraxot/dev
     *
     * >>>>>>> .merge_file_GpNqRG
     *
     * @return $this
     */
    public function givePermissionTo(string|int|array|Permission|Collection $permissions = []);

    /**
     * Assign the given role to the model.
     *
     * <<<<<<< .merge_file_6LAhwq
     * <<<<<<< HEAD
     *
     * @param array<int, string|int|Role>|string|int|Role|Collection<int, Role> $roles
     *                                                                                 =======
     *                                                                                 <<<<<<< .merge_file_DMxry3
     *                                                                                 =======
     *                                                                                 <<<<<<< HEAD
     *                                                                                 <<<<<<< .merge_file_7zavuJ
     *                                                                                 >>>>>>> .merge_file_55oZz4
     * @param array<int, string|int|Role>|string|int|Role|Collection<int, Role> $roles
     *                                                                                 =======
     *                                                                                 <<<<<<< HEAD
     * @param array<int, string|int|Role>|string|int|Role|Collection<int, Role> $roles
     *                                                                                 =======
     *                                                                                 <<<<<<< .merge_file_DMxry3
     *                                                                                 =======
     *                                                                                 <<<<<<< HEAD
     *                                                                                 <<<<<<< .merge_file_7zavuJ
     *                                                                                 >>>>>>> .merge_file_55oZz4
     * @param array<int, string|int|Role>|string|int|Role|Collection<int, Role> $roles
     *                                                                                 >>>>>>> .merge_file_GpNqRG
     *
     * <<<<<<< .merge_file_DMxry3
     * =======
     * =======
     * @param array<int, string|int|Role>|string|int|Role|Collection<int, Role> $roles
     *                                                                                 >>>>>>> 9e11d472 (Fix merge conflicts in PHPDoc comments across multiple action classes and contracts, ensuring consistent parameter annotations and removing redundant lines.)
     *
     * >>>>>>> .merge_file_55oZz4
     *
     * <<<<<<< .merge_file_6LAhwq
     * >>>>>>> laraxot/dev
     * =======
     * >>>>>>> laraxot/dev
     *
     * >>>>>>> .merge_file_GpNqRG
     *
     * @return $this
     */
    public function assignRole(array|string|int|Role|Collection $roles = [
    ]);

    /**
     * Determine if the model has (one of) the given role(s).
     *
     * <<<<<<< .merge_file_6LAhwq
     * <<<<<<< HEAD
     *
     * @param string|int|array<int, string|int|Role>|Role|Collection<int, Role> $roles
     *                                                                                 =======
     *                                                                                 <<<<<<< .merge_file_DMxry3
     * @param string|int|array<int, string|int|Role>|Role|Collection<int, Role> $roles
     *                                                                                 =======
     *                                                                                 =======
     *                                                                                 <<<<<<< HEAD
     * @param string|int|array<int, string|int|Role>|Role|Collection<int, Role> $roles
     *                                                                                 =======
     *                                                                                 <<<<<<< .merge_file_DMxry3
     * @param string|int|array<int, string|int|Role>|Role|Collection<int, Role> $roles
     *                                                                                 =======
     *                                                                                 >>>>>>> .merge_file_GpNqRG
     *                                                                                 <<<<<<< HEAD
     *                                                                                 <<<<<<< .merge_file_7zavuJ
     * @param string|int|array<int, string|int|Role>|Role|Collection<int, Role> $roles
     *                                                                                 =======
     *                                                                                 <<<<<<< .merge_file_x9kVYp
     * @param string|int|array<int, string|int|Role>|Role|Collection<int, Role> $roles
     *                                                                                 =======
     *                                                                                 <<<<<<< HEAD
     * @param string|int|array<int, string|int|Role>|Role|Collection<int, Role> $roles
     *                                                                                 =======
     * @param string|int|array<int, string|int|Role>|Role|Collection<int, Role> $roles
     *                                                                                 >>>>>>> laraxot/dev
     *                                                                                 >>>>>>> .merge_file_an0rj9
     *                                                                                 >>>>>>> .merge_file_PlLTO3
     *                                                                                 =======
     * @param string|int|array<int, string|int|Role>|Role|Collection<int, Role> $roles
     *                                                                                 >>>>>>> 9e11d472 (Fix merge conflicts in PHPDoc comments across multiple action classes and contracts, ensuring consistent parameter annotations and removing redundant lines.)
     *                                                                                 >>>>>>> .merge_file_55oZz4
     *                                                                                 <<<<<<< .merge_file_6LAhwq
     *                                                                                 >>>>>>> laraxot/dev
     *                                                                                 =======
     *                                                                                 >>>>>>> laraxot/dev
     *                                                                                 >>>>>>> .merge_file_GpNqRG
     */
    public function hasRole(
        string|int|array|Role|Collection $roles,
        ?string $guard = null,
    ): bool;

    /**
     * Determine if the model has any of the given role(s).
     *
     * Alias to hasRole() but without Guard controls
     *
     * <<<<<<< .merge_file_6LAhwq
     * <<<<<<< HEAD
     *
     * @param string|int|array<int, string|int|Role>|Role|Collection<int, Role> $roles
     *                                                                                 =======
     *                                                                                 <<<<<<< .merge_file_DMxry3
     * @param string|int|array<int, string|int|Role>|Role|Collection<int, Role> $roles
     *                                                                                 =======
     *                                                                                 =======
     *                                                                                 <<<<<<< HEAD
     * @param string|int|array<int, string|int|Role>|Role|Collection<int, Role> $roles
     *                                                                                 =======
     *                                                                                 <<<<<<< .merge_file_DMxry3
     * @param string|int|array<int, string|int|Role>|Role|Collection<int, Role> $roles
     *                                                                                 =======
     *                                                                                 >>>>>>> .merge_file_GpNqRG
     *                                                                                 <<<<<<< HEAD
     *                                                                                 <<<<<<< .merge_file_7zavuJ
     * @param string|int|array<int, string|int|Role>|Role|Collection<int, Role> $roles
     *                                                                                 =======
     *                                                                                 <<<<<<< .merge_file_x9kVYp
     * @param string|int|array<int, string|int|Role>|Role|Collection<int, Role> $roles
     *                                                                                 =======
     *                                                                                 <<<<<<< HEAD
     * @param string|int|array<int, string|int|Role>|Role|Collection<int, Role> $roles
     *                                                                                 =======
     * @param string|int|array<int, string|int|Role>|Role|Collection<int, Role> $roles
     *                                                                                 >>>>>>> laraxot/dev
     *                                                                                 >>>>>>> .merge_file_an0rj9
     *                                                                                 >>>>>>> .merge_file_PlLTO3
     *                                                                                 =======
     * @param string|int|array<int, string|int|Role>|Role|Collection<int, Role> $roles
     *                                                                                 >>>>>>> 9e11d472 (Fix merge conflicts in PHPDoc comments across multiple action classes and contracts, ensuring consistent parameter annotations and removing redundant lines.)
     *                                                                                 >>>>>>> .merge_file_55oZz4
     *                                                                                 <<<<<<< .merge_file_6LAhwq
     *                                                                                 >>>>>>> laraxot/dev
     *                                                                                 =======
     *                                                                                 >>>>>>> laraxot/dev
     *                                                                                 >>>>>>> .merge_file_GpNqRG
     */
    public function hasAnyRole(string|int|array|Role|Collection $roles = [
    ]): bool;

    /**
     * Determine if the model may perform the given permission.
     *
     * @throws PermissionDoesNotExist
     */
    public function hasPermissionTo(string|int|Permission $permission, ?string $guardName = null): bool;

    /**
     * Create a new Eloquent query builder for the model.
     *
     * <<<<<<< .merge_file_6LAhwq
     * <<<<<<< HEAD
     *
     * @param Builder<Model> $query
     *                              =======
     *                              <<<<<<< .merge_file_DMxry3
     *                              =======
     *                              <<<<<<< HEAD
     *                              <<<<<<< .merge_file_7zavuJ
     *                              >>>>>>> .merge_file_55oZz4
     * @param Builder<Model> $query
     *                              =======
     *                              <<<<<<< HEAD
     * @param Builder<Model> $query
     *                              =======
     *                              <<<<<<< .merge_file_DMxry3
     *                              =======
     *                              <<<<<<< HEAD
     *                              <<<<<<< .merge_file_7zavuJ
     *                              >>>>>>> .merge_file_55oZz4
     * @param Builder<Model> $query
     *                              >>>>>>> .merge_file_GpNqRG
     *
     * <<<<<<< .merge_file_DMxry3
     * =======
     * =======
     * @param Builder<Model> $query
     *                              >>>>>>> 9e11d472 (Fix merge conflicts in PHPDoc comments across multiple action classes and contracts, ensuring consistent parameter annotations and removing redundant lines.)
     *
     * >>>>>>> .merge_file_55oZz4
     *
     * <<<<<<< .merge_file_6LAhwq
     * >>>>>>> laraxot/dev
     * =======
     * >>>>>>> laraxot/dev
     *
     * >>>>>>> .merge_file_GpNqRG
     *
     * @return Builder<Model>
     */
    public function newEloquentBuilder(Builder $query): Builder;
}
