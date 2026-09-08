<?php

declare(strict_types=1);

namespace Modules\Xot\Contracts;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
<<<<<<< HEAD
use Illuminate\Database\Query\Builder;
use Modules\User\Models\Role;
use Spatie\MediaLibrary\HasMedia;
use Spatie\Permission\Contracts\Permission;
=======
use Illuminate\Support\Collection as SupportCollection;
use Modules\User\Models\Role;
use Spatie\MediaLibrary\HasMedia;
use Spatie\Permission\Contracts\Permission;
use Spatie\Permission\Contracts\Role as RoleContract;
>>>>>>> c7fd73eb (.)
use Spatie\Permission\Exceptions\PermissionDoesNotExist;

/**
 * Modules\Xot\Contracts\ProfileContract.
 *
<<<<<<< HEAD
 * @property string $id
 * @property string $email
 * @property string $slug
 * @property string $user_id
=======
 * @property string                $id
 * @property string                $email
 * @property string                $slug
 * @property string                $user_id
 * @property int|null              $matr
>>>>>>> c7fd73eb (.)
 * @property Collection<int, Role> $roles
 * @property int|null              $roles_count
 * @property UserContract          $user
 *
 * @phpstan-require-extends Model
 *
 * @mixin \Eloquent
 */
interface ProfileContract extends HasMedia
{
    /**
     * Grant the given permission(s) to a role.
     *
<<<<<<< HEAD
     * @return $this
     */
    public function givePermissionTo(string|int|array|Permission|\Illuminate\Support\Collection $permissions = []);
=======
     * @param string|int|array<int|string>|Permission|SupportCollection<int, Permission> $permissions
     *
     * @return $this
     */
    public function givePermissionTo(string|int|array|Permission|SupportCollection $permissions = []): static;
>>>>>>> c7fd73eb (.)

    /**
     * Assign the given role to the model.
     *
<<<<<<< HEAD
     * @return $this
     */
    public function assignRole(array|string|int|\Spatie\Permission\Contracts\Role|\Illuminate\Support\Collection $roles = [
    ]);

    /**
     * Determine if the model has (one of) the given role(s).
     */
    public function hasRole(
        string|int|array|\Spatie\Permission\Contracts\Role|\Illuminate\Support\Collection $roles,
        null|string $guard = null,
=======
     * @param array<int|string>|string|int|RoleContract|SupportCollection<int, RoleContract> $roles
     *
     * @return $this
     */
    public function assignRole(array|string|int|RoleContract|SupportCollection $roles = []): static;

    /**
     * Determine if the model has (one of) the given role(s).
     *
     * @param string|int|array<int|string>|RoleContract|SupportCollection<int, RoleContract> $roles
     */
    public function hasRole(
        string|int|array|RoleContract|SupportCollection $roles,
        ?string $guard = null,
>>>>>>> c7fd73eb (.)
    ): bool;

    /**
     * Determine if the model has any of the given role(s).
     *
     * Alias to hasRole() but without Guard controls
<<<<<<< HEAD
     */
    public function hasAnyRole(string|int|array|\Spatie\Permission\Contracts\Role|\Illuminate\Support\Collection $roles = [
    ]): bool;
=======
     *
     * @param string|int|array<int|string>|RoleContract|SupportCollection<int, RoleContract> $roles
     */
    public function hasAnyRole(string|int|array|RoleContract|SupportCollection $roles = []): bool;
>>>>>>> c7fd73eb (.)

    /**
     * Determine if the model may perform the given permission.
     *
     * @throws PermissionDoesNotExist
     */
<<<<<<< HEAD
    public function hasPermissionTo(string|int|Permission $permission, null|string $guardName = null): bool;

    /**
     * Create a new Eloquent query builder for the model.
     *
     * @param Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder|static
     */
    public function newEloquentBuilder($query);

    /**
     * Undocumented function.
     */
    public function toggleSuperAdmin(): void;

    /**
     * ---return BelongsTo<UserContract, self>.
     */
    public function user(): BelongsTo;

    /**
     * --.
     */
    public function isSuperAdmin(): bool;
=======
    public function hasPermissionTo(string|int|Permission $permission, ?string $guardName = null): bool;

    public function toggleSuperAdmin(): void;

    /**
     * @return BelongsTo<Model&UserContract, Model>
     */
    public function user(): BelongsTo;

    public function isSuperAdmin(): bool;

    /**
     * Get the URL of the user's avatar.
     */
    public function getAvatarUrl(): ?string;
>>>>>>> c7fd73eb (.)
}
