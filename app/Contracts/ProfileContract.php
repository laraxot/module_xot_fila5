<?php

declare(strict_types=1);

namespace Modules\Xot\Contracts;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Collection as SupportCollection;
use Modules\User\Models\Role;
use Spatie\MediaLibrary\HasMedia;
use Spatie\Permission\Contracts\Permission;
use Spatie\Permission\Contracts\Role as RoleContract;
use Spatie\Permission\Exceptions\PermissionDoesNotExist;

/**
 * Modules\Xot\Contracts\ProfileContract.
 *
<<<<<<< HEAD
<<<<<<< HEAD
 *
=======
>>>>>>> laraxot/dev
=======
 *
>>>>>>> laraxot/dev
 * @property string                $id
 * @property string                $email
 * @property string                $slug
 * @property string                $user_id
 * @property int|null              $matr
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
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
     *
     * @param string|int|array<int|string>|Permission|SupportCollection<int, Permission> $permissions
     *
     *
     *
     *
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
=======
>>>>>>> laraxot/dev
     * @param string|int|array<int|string>|Permission|SupportCollection<int, Permission> $permissions
     *
     * @return $this
     */
    public function givePermissionTo(string|int|array|Permission|SupportCollection $permissions = []): static;

    /**
     * Assign the given role to the model.
     *
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
     *
     * @param array<int|string>|string|int|RoleContract|SupportCollection<int, RoleContract> $roles
     *
     *
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
=======
>>>>>>> laraxot/dev
     * @param array<int|string>|string|int|RoleContract|SupportCollection<int, RoleContract> $roles
     *
     * @return $this
     */
    public function assignRole(array|string|int|RoleContract|SupportCollection $roles = []): static;

    /**
     * Determine if the model has (one of) the given role(s).
     *
<<<<<<< HEAD
<<<<<<< HEAD
     *
=======
>>>>>>> laraxot/dev
=======
     *
>>>>>>> laraxot/dev
     * @param string|int|array<int|string>|RoleContract|SupportCollection<int, RoleContract> $roles
     */
    public function hasRole(
        string|int|array|RoleContract|SupportCollection $roles,
        ?string $guard = null,
    ): bool;

    /**
     * Determine if the model has any of the given role(s).
     *
     * Alias to hasRole() but without Guard controls
     *
<<<<<<< HEAD
<<<<<<< HEAD
     *
=======
>>>>>>> laraxot/dev
=======
     *
>>>>>>> laraxot/dev
     * @param string|int|array<int|string>|RoleContract|SupportCollection<int, RoleContract> $roles
     */
    public function hasAnyRole(string|int|array|RoleContract|SupportCollection $roles = []): bool;

    /**
     * Determine if the model may perform the given permission.
     *
     * @throws PermissionDoesNotExist
     */
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
}
