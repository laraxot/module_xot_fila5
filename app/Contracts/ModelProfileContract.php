<?php

declare(strict_types=1);

namespace Modules\Xot\Contracts;

<<<<<<< HEAD
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Modules\User\Models\Role;
use Spatie\Permission\Contracts\Permission;
=======
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Spatie\Permission\Contracts\Permission;
use Spatie\Permission\Contracts\Role;
>>>>>>> c7fd73eb (.)
use Spatie\Permission\Exceptions\PermissionDoesNotExist;

/**
 * Modules\Xot\Contracts\ModelProfileContract.
 *
<<<<<<< HEAD
 * @property string $id
 * @property string $email
 * @property Collection<int, Role> $roles
 * @property int|null $roles_count
 *
=======
>>>>>>> c7fd73eb (.)
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
     * @param  string|int|array<int, string|int|Permission>|Permission|\Illuminate\Support\Collection<int, Permission>  $permissions
     * @return $this
     */
    public function givePermissionTo(string|int|array|Permission|\Illuminate\Support\Collection $permissions = []);
=======
     * @param string|int|array<int, string|int|Permission>|Permission|Collection<int, Permission> $permissions
     *
     * @return $this
     */
    public function givePermissionTo(string|int|array|Permission|Collection $permissions = []);
>>>>>>> c7fd73eb (.)

    /**
     * Assign the given role to the model.
     *
<<<<<<< HEAD
     * @param  array<int, string|int|\Spatie\Permission\Contracts\Role>|string|int|\Spatie\Permission\Contracts\Role|\Illuminate\Support\Collection<int, \Spatie\Permission\Contracts\Role>  $roles
     * @return $this
     */
    public function assignRole(array|string|int|\Spatie\Permission\Contracts\Role|\Illuminate\Support\Collection $roles = [
=======
     * @param array<int, string|int|Role>|string|int|Role|Collection<int, Role> $roles
     *
     * @return $this
     */
    public function assignRole(array|string|int|Role|Collection $roles = [
>>>>>>> c7fd73eb (.)
    ]);

    /**
     * Determine if the model has (one of) the given role(s).
     *
<<<<<<< HEAD
     * @param  string|int|array<int, string|int|\Spatie\Permission\Contracts\Role>|\Spatie\Permission\Contracts\Role|\Illuminate\Support\Collection<int, \Spatie\Permission\Contracts\Role>  $roles
     */
    public function hasRole(
        string|int|array|\Spatie\Permission\Contracts\Role|\Illuminate\Support\Collection $roles,
        null|string $guard = null,
=======
     * @param string|int|array<int, string|int|Role>|Role|Collection<int, Role> $roles
     */
    public function hasRole(
        string|int|array|Role|Collection $roles,
        ?string $guard = null,
>>>>>>> c7fd73eb (.)
    ): bool;

    /**
     * Determine if the model has any of the given role(s).
     *
     * Alias to hasRole() but without Guard controls
     *
<<<<<<< HEAD
     * @param  string|int|array<int, string|int|\Spatie\Permission\Contracts\Role>|\Spatie\Permission\Contracts\Role|\Illuminate\Support\Collection<int, \Spatie\Permission\Contracts\Role>  $roles
     */
    public function hasAnyRole(string|int|array|\Spatie\Permission\Contracts\Role|\Illuminate\Support\Collection $roles = [
=======
     * @param string|int|array<int, string|int|Role>|Role|Collection<int, Role> $roles
     */
    public function hasAnyRole(string|int|array|Role|Collection $roles = [
>>>>>>> c7fd73eb (.)
    ]): bool;

    /**
     * Determine if the model may perform the given permission.
     *
     * @throws PermissionDoesNotExist
     */
<<<<<<< HEAD
    public function hasPermissionTo(string|int|Permission $permission, null|string $guardName = null): bool;
=======
    public function hasPermissionTo(string|int|Permission $permission, ?string $guardName = null): bool;
>>>>>>> c7fd73eb (.)

    /**
     * Create a new Eloquent query builder for the model.
     *
<<<<<<< HEAD
     * @param  Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder|static
     */
    public function newEloquentBuilder($query);
=======
     * @param Builder<Model> $query
     *
     * @return Builder<Model>
     */
    public function newEloquentBuilder(Builder $query): Builder;
>>>>>>> c7fd73eb (.)
}
