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
<<<<<<< .merge_file_Xjv0VT
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< .merge_file_BwiCaM
=======
>>>>>>> da9ae01a0 (.)
 * <<<<<<< HEAD
 *
=======
<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
 * @property string                $id
 * @property string                $email
 * @property string                $slug
 * @property string                $user_id
 * @property int|null              $matr
 * @property Collection<int, Role> $roles
 * @property int|null              $roles_count
 * @property UserContract          $user
<<<<<<< HEAD
<<<<<<< HEAD
 *                                              =======
 *                                              <<<<<<< .merge_file_BwiCaM
 *                                              =======
 *                                              <<<<<<< HEAD
 *                                              <<<<<<< .merge_file_cgjHyn
 *                                              >>>>>>> .merge_file_2826Tr
 * @property string                $id
 * @property string                $email
 * @property string                $slug
 * @property string                $user_id
 * @property int|null              $matr
 * @property Collection<int, Role> $roles
 * @property int|null              $roles_count
 * @property UserContract          $user
 *                                              <<<<<<< .merge_file_BwiCaM
 *                                              =======
=======
<<<<<<< .merge_file_BwiCaM
=======
>>>>>>> da9ae01a0 (.)
 *                                              =======
 *                                              <<<<<<< .merge_file_HZq9W3
 * @property string                $id
 * @property string                $email
 * @property string                $slug
 * @property string                $user_id
 * @property int|null              $matr
 * @property Collection<int, Role> $roles
 * @property int|null              $roles_count
 * @property UserContract          $user
 *                                              =======
 *                                              <<<<<<< HEAD
 * @property string                $id
 * @property string                $email
 * @property string                $slug
 * @property string                $user_id
 * @property int|null              $matr
 * @property Collection<int, Role> $roles
 * @property int|null              $roles_count
 * @property UserContract          $user
 *                                              =======
 * @property string                $id
 * @property string                $email
 * @property string                $slug
 * @property string                $user_id
 * @property int|null              $matr
 * @property Collection<int, Role> $roles
 * @property int|null              $roles_count
 * @property UserContract          $user
 *                                              >>>>>>> laraxot/dev
 *                                              >>>>>>> .merge_file_N0JFzs
 *                                              >>>>>>> .merge_file_yWRyNw
 *                                              =======
 * @property string                $id
 * @property string                $email
 * @property string                $slug
 * @property string                $user_id
 * @property int|null              $matr
 * @property Collection<int, Role> $roles
 * @property int|null              $roles_count
 * @property UserContract          $user
 *                                              >>>>>>> 9e11d472 (Fix merge conflicts in PHPDoc comments across multiple action classes and contracts, ensuring consistent parameter annotations and removing redundant lines.)
<<<<<<< HEAD
 *                                              >>>>>>> .merge_file_2826Tr
 *                                              >>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
 * @property string $id
 * @property string $email
 * @property string $slug
 * @property string $user_id
 * @property int|null $matr
 * @property Collection<int, Role> $roles
 * @property int|null $roles_count
 * @property UserContract $user
>>>>>>> .merge_file_4CQ0rG
=======
>>>>>>> .merge_file_2826Tr
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
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
<<<<<<< .merge_file_Xjv0VT
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< .merge_file_BwiCaM
=======
>>>>>>> da9ae01a0 (.)
     * <<<<<<< HEAD
     *
     * @param string|int|array<int|string>|Permission|SupportCollection<int, Permission> $permissions
     *                                                                                                =======
     *                                                                                                <<<<<<< .merge_file_BwiCaM
     *                                                                                                =======
     *                                                                                                <<<<<<< HEAD
     *                                                                                                <<<<<<< .merge_file_cgjHyn
     *                                                                                                >>>>>>> .merge_file_2826Tr
     * @param string|int|array<int|string>|Permission|SupportCollection<int, Permission> $permissions
     *
     * <<<<<<< .merge_file_BwiCaM
     * =======
     * >>>>>>> laraxot/dev
     *
     * >>>>>>> .merge_file_N0JFzs
     *
     * >>>>>>> .merge_file_yWRyNw
     *
     * =======
     * @param string|int|array<int|string>|Permission|SupportCollection<int, Permission> $permissions
     *                                                                                                >>>>>>> 9e11d472 (Fix merge conflicts in PHPDoc comments across multiple action classes and contracts, ensuring consistent parameter annotations and removing redundant lines.)
     *
<<<<<<< HEAD
     * >>>>>>> .merge_file_2826Tr
     *
     * >>>>>>> laraxot/dev
=======
     * @param string|int|array<int|string>|Permission|SupportCollection<int, Permission> $permissions
>>>>>>> 3792da0d (Check & fix styling)
     *
=======
     * @param  string|int|array<int|string>|Permission|SupportCollection<int, Permission>  $permissions
>>>>>>> .merge_file_4CQ0rG
=======
>>>>>>> .merge_file_2826Tr
=======
     * @param string|int|array<int|string>|Permission|SupportCollection<int, Permission> $permissions
     *
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
     * @return $this
     */
    public function givePermissionTo(string|int|array|Permission|SupportCollection $permissions = []): static;

    /**
     * Assign the given role to the model.
     *
<<<<<<< HEAD
<<<<<<< .merge_file_Xjv0VT
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< .merge_file_BwiCaM
=======
>>>>>>> da9ae01a0 (.)
     * <<<<<<< HEAD
     *
     * @param array<int|string>|string|int|RoleContract|SupportCollection<int, RoleContract> $roles
     *                                                                                              =======
     *                                                                                              <<<<<<< .merge_file_BwiCaM
     *                                                                                              =======
     *                                                                                              <<<<<<< HEAD
     *                                                                                              <<<<<<< .merge_file_cgjHyn
     *                                                                                              >>>>>>> .merge_file_2826Tr
     * @param array<int|string>|string|int|RoleContract|SupportCollection<int, RoleContract> $roles
     *
     * <<<<<<< .merge_file_BwiCaM
     * =======
     * >>>>>>> .merge_file_yWRyNw
     *
     * =======
     * @param array<int|string>|string|int|RoleContract|SupportCollection<int, RoleContract> $roles
     *                                                                                              >>>>>>> 9e11d472 (Fix merge conflicts in PHPDoc comments across multiple action classes and contracts, ensuring consistent parameter annotations and removing redundant lines.)
     *
<<<<<<< HEAD
     * >>>>>>> .merge_file_2826Tr
     *
     * >>>>>>> laraxot/dev
=======
     * @param array<int|string>|string|int|RoleContract|SupportCollection<int, RoleContract> $roles
>>>>>>> 3792da0d (Check & fix styling)
     *
=======
     * @param  array<int|string>|string|int|RoleContract|SupportCollection<int, RoleContract>  $roles
>>>>>>> .merge_file_4CQ0rG
=======
>>>>>>> .merge_file_2826Tr
=======
     * @param array<int|string>|string|int|RoleContract|SupportCollection<int, RoleContract> $roles
     *
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
     * @return $this
     */
    public function assignRole(array|string|int|RoleContract|SupportCollection $roles = []): static;

    /**
     * Determine if the model has (one of) the given role(s).
     *
<<<<<<< HEAD
<<<<<<< .merge_file_Xjv0VT
<<<<<<< HEAD
     * <<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< .merge_file_BwiCaM
>>>>>>> da9ae01a0 (.)
     *
     * @param string|int|array<int|string>|RoleContract|SupportCollection<int, RoleContract> $roles
     *                                                                                              =======
     *                                                                                              <<<<<<< .merge_file_BwiCaM
     * @param string|int|array<int|string>|RoleContract|SupportCollection<int, RoleContract> $roles
     *                                                                                              =======
     *                                                                                              <<<<<<< HEAD
     *                                                                                              <<<<<<< .merge_file_cgjHyn
     * @param string|int|array<int|string>|RoleContract|SupportCollection<int, RoleContract> $roles
     *                                                                                              =======
     *                                                                                              <<<<<<< .merge_file_HZq9W3
     * @param string|int|array<int|string>|RoleContract|SupportCollection<int, RoleContract> $roles
     *                                                                                              =======
     *                                                                                              <<<<<<< HEAD
     * @param string|int|array<int|string>|RoleContract|SupportCollection<int, RoleContract> $roles
     *                                                                                              =======
     * @param string|int|array<int|string>|RoleContract|SupportCollection<int, RoleContract> $roles
     *                                                                                              >>>>>>> laraxot/dev
     *                                                                                              >>>>>>> .merge_file_N0JFzs
     *                                                                                              >>>>>>> .merge_file_yWRyNw
     *                                                                                              =======
     * @param string|int|array<int|string>|RoleContract|SupportCollection<int, RoleContract> $roles
     *                                                                                              >>>>>>> 9e11d472 (Fix merge conflicts in PHPDoc comments across multiple action classes and contracts, ensuring consistent parameter annotations and removing redundant lines.)
<<<<<<< HEAD
     *                                                                                              >>>>>>> .merge_file_2826Tr
     *                                                                                              >>>>>>> laraxot/dev
=======
     * @param string|int|array<int|string>|RoleContract|SupportCollection<int, RoleContract> $roles
>>>>>>> 3792da0d (Check & fix styling)
=======
     * @param  string|int|array<int|string>|RoleContract|SupportCollection<int, RoleContract>  $roles
>>>>>>> .merge_file_4CQ0rG
=======
>>>>>>> .merge_file_2826Tr
=======
     * @param string|int|array<int|string>|RoleContract|SupportCollection<int, RoleContract> $roles
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
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
<<<<<<< .merge_file_Xjv0VT
<<<<<<< HEAD
     * <<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< .merge_file_BwiCaM
>>>>>>> da9ae01a0 (.)
     *
     * @param string|int|array<int|string>|RoleContract|SupportCollection<int, RoleContract> $roles
     *                                                                                              =======
     *                                                                                              <<<<<<< .merge_file_BwiCaM
     * @param string|int|array<int|string>|RoleContract|SupportCollection<int, RoleContract> $roles
     *                                                                                              =======
     *                                                                                              <<<<<<< HEAD
     *                                                                                              <<<<<<< .merge_file_cgjHyn
     * @param string|int|array<int|string>|RoleContract|SupportCollection<int, RoleContract> $roles
     *                                                                                              =======
     *                                                                                              <<<<<<< .merge_file_HZq9W3
     * @param string|int|array<int|string>|RoleContract|SupportCollection<int, RoleContract> $roles
     *                                                                                              =======
     *                                                                                              <<<<<<< HEAD
     * @param string|int|array<int|string>|RoleContract|SupportCollection<int, RoleContract> $roles
     *                                                                                              =======
     * @param string|int|array<int|string>|RoleContract|SupportCollection<int, RoleContract> $roles
     *                                                                                              >>>>>>> laraxot/dev
     *                                                                                              >>>>>>> .merge_file_N0JFzs
     *                                                                                              >>>>>>> .merge_file_yWRyNw
     *                                                                                              =======
     * @param string|int|array<int|string>|RoleContract|SupportCollection<int, RoleContract> $roles
     *                                                                                              >>>>>>> 9e11d472 (Fix merge conflicts in PHPDoc comments across multiple action classes and contracts, ensuring consistent parameter annotations and removing redundant lines.)
<<<<<<< HEAD
     *                                                                                              >>>>>>> .merge_file_2826Tr
     *                                                                                              >>>>>>> laraxot/dev
=======
     * @param string|int|array<int|string>|RoleContract|SupportCollection<int, RoleContract> $roles
>>>>>>> 3792da0d (Check & fix styling)
=======
     * @param  string|int|array<int|string>|RoleContract|SupportCollection<int, RoleContract>  $roles
>>>>>>> .merge_file_4CQ0rG
=======
>>>>>>> .merge_file_2826Tr
=======
     * @param string|int|array<int|string>|RoleContract|SupportCollection<int, RoleContract> $roles
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
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
