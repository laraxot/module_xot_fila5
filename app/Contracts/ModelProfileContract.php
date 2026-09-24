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
<<<<<<< HEAD
     *
     * @param string|int|array<int, string|int|Permission>|Permission|Collection<int, Permission> $permissions
     *
     *
=======
     * @param string|int|array<int, string|int|Permission>|Permission|Collection<int, Permission> $permissions
     *
>>>>>>> laraxot/dev
     * @return $this
     */
    public function givePermissionTo(string|int|array|Permission|Collection $permissions = []);

    /**
     * Assign the given role to the model.
     *
<<<<<<< HEAD
     *
     * @param array<int, string|int|Role>|string|int|Role|Collection<int, Role> $roles
     *
     *
=======
     * @param array<int, string|int|Role>|string|int|Role|Collection<int, Role> $roles
     *
>>>>>>> laraxot/dev
     * @return $this
     */
    public function assignRole(array|string|int|Role|Collection $roles = [
    ]);

    /**
     * Determine if the model has (one of) the given role(s).
     *
<<<<<<< HEAD
     *
=======
>>>>>>> laraxot/dev
     * @param string|int|array<int, string|int|Role>|Role|Collection<int, Role> $roles
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
<<<<<<< HEAD
     *
=======
>>>>>>> laraxot/dev
     * @param string|int|array<int, string|int|Role>|Role|Collection<int, Role> $roles
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
<<<<<<< HEAD
     *
     * @param Builder<Model> $query
     *
     *
=======
     * @param Builder<Model> $query
     *
>>>>>>> laraxot/dev
     * @return Builder<Model>
     */
    public function newEloquentBuilder(Builder $query): Builder;
}
