<?php

declare(strict_types=1);

namespace Modules\Xot\Contracts;

<<<<<<< HEAD
use DateTime;
use BackedEnum;
use Filament\Models\Contracts\FilamentUser;
use Filament\Support\Contracts\HasLabel;
use Illuminate\Contracts\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Support\Collection;
use Laravel\Passport\Token;
use Modules\User\Contracts\HasTeamsContract;
use Modules\User\Models\Tenant;
use Override;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\MediaCollections\FileAdder;
use Spatie\Permission\Contracts\Permission;
use Spatie\Permission\Contracts\Role;
use Spatie\Permission\Exceptions\GuardDoesNotMatch;
use Spatie\Permission\Exceptions\PermissionDoesNotExist;

// use Filament\Models\Contracts\HasTenants;
/**
 * Modules\User\Contracts\UserContract.
 *
 * @property ProfileContract|null $profile
 * @property string $id
 * @property string $handle
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string|null $full_name
 * @property BackedEnum&HasLabel $type
 * @property string|null $password
 * @property string|int|null $current_team_id
 * @property string|null $phone
 * @property string|null $email
 * @property DateTime|null $email_verified_at
 * @property \Illuminate\Database\Eloquent\Collection<int, \Modules\User\Models\Role> $roles
 * @property \Illuminate\Database\Eloquent\Collection<int, Tenant> $tenants
 *
 * @method FileAdder addMediaFromDisk(string $key, ?string $disk = null)
 * @method bool canAccessSocialite()
=======
use Filament\Models\Contracts\HasName;
use Filament\Models\Contracts\HasTenants;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Support\Carbon;
use Laravel\Passport\Contracts\OAuthenticatable;
use Laravel\Passport\PersonalAccessTokenResult;
use Laravel\Passport\Token;
use Laravel\Passport\TransientToken;
use Modules\User\Contracts\TeamContract;
use Modules\User\Models\Role as UserRole;
use Modules\User\Models\Team;
use Modules\User\Models\Tenant;
use Nwidart\Modules\Laravel\Module;
use Spatie\MediaLibrary\HasMedia;
use Spatie\Permission\Contracts\Permission;
use Spatie\Permission\Exceptions\PermissionDoesNotExist;
use Spatie\Permission\Traits\HasRoles;

/**
 * Modules\Xot\Contracts\UserContract.
 *
 * @property string|null               $id
 * @property string|null               $email
 * @property Carbon|null               $email_verified_at
 * @property string|null               $first_name
 * @property string|null               $last_name
 * @property string|null               $full_name
 * @property string|null               $name
 * @property string|null               $phone
 * @property string|null               $type
 * @property string|null               $current_team_id
 * @property TeamContract              $currentTeam
 * @property ProfileContract|null      $profile
 * @property Collection<int, UserRole> $roles
 * @property Collection<int, Team>     $membershipTeams
 * @property Collection<int, Team>     $teams
 * @property Collection<int, Tenant>   $tenants
>>>>>>> c7fd73eb (.)
 *
 * @phpstan-require-extends Model
 *
 * @mixin \Eloquent
 */
<<<<<<< HEAD
interface UserContract extends Authenticatable, Authorizable, CanResetPassword, FilamentUser, HasMedia, HasTeamsContract, ModelContract, MustVerifyEmail, PassportHasApiTokensContract
=======
interface UserContract extends Authenticatable, HasMedia, HasName, HasTenants, MustVerifyEmail, OAuthenticatable
>>>>>>> c7fd73eb (.)
{
    /*
     * public function isSuperAdmin();
     * public function name();
     * public function areas();
     * public function avatar();
     */
<<<<<<< HEAD
    public function profile(): HasOne;

    /**
     * Update the model in the database.
     *
     * @return bool
     */
    /**
     * Get a relationship.
     *
     * @param  string  $key
     * @return mixed|null
     */
    public function getRelationValue($key);

    /**
     * Create a new instance of the given model.
     *
     * @param  array  $attributes
     * @param  bool  $exists
     * @return static
     */
    public function newInstance($attributes = [], $exists = false);

    /**
     * Get the value of the model's primary key.
     *
     * @return mixed|int|string
     */
    #[Override]
    public function getKey();

    /**
     * Determine if the model has (one of) the given role(s).
     */
    public function hasRole(
        string|int|array|Role|Collection $roles,
=======
    /**
     * @return HasOne<Model&ProfileContract, Model&static>
     */
    public function profile(): HasOne;

    /**
     * Get the access token currently associated with the user.
     *
     * @return Token|TransientToken|null
     */
    public function token();

    /**
     * Create a new personal access token for the user.
     *
     * @param array<int, string> $scopes
     *
     * @return PersonalAccessTokenResult<Token>
     */
    public function createToken(string $name, array $scopes = []): PersonalAccessTokenResult;

    /**
     * Passport API tokens support.
     */
    /**
     * Determine if the model has (one of) the given role(s).
     */
    /**
     * @param string|int|array<int|string>|UserRole|Collection<int, UserRole> $roles
     */
    public function hasRole(
        string|int|array|UserRole|Collection $roles,
>>>>>>> c7fd73eb (.)
        ?string $guard = null,
    ): bool;

    /**
     * Assign the given role to the model.
     *
<<<<<<< HEAD
     * @return $this
     */
    public function assignRole(array|string|int|Role|Collection $roles = []);
=======
     * @param array<int|string>|string|int|UserRole|Collection<int, UserRole> $roles
     *
     * @return $this
     */
    public function assignRole(array|string|int|UserRole|Collection $roles = []): static;

    /**
     * Remove all current roles and set the given ones.
     *
     * @param array<int|string>|string|int|UserRole|Collection<int, UserRole> $roles
     *
     * @return $this
     */
    public function syncRoles(array|string|int|UserRole|Collection $roles = []): static;

    /**
     * Determine if the model has (one of) the given permission(s).
     *
     * @throws PermissionDoesNotExist
     */
    public function hasPermissionTo(string|int|Permission $permission, ?string $guardName = null): bool;

    /**
     * Check if the user can access Socialite.
     */
    public function canAccessSocialite(): bool;

    /**
     * Get the user's roles.
     */
    /** @return BelongsToMany<Model, Model> */
    public function roles(): BelongsToMany;

    /**
     * Spatie Permission — team pivot for role scoping ({@see HasRoles::teams()}).
     *
     * @return BelongsToMany<Model, Model&static>
     */
    public function teams(): BelongsToMany;

    /**
     * Laraxot team membership (Jetstream-style pivot).
     *
     * @return BelongsToMany<Model&TeamContract, Model&static, Pivot, 'pivot'>
     */
    public function membershipTeams(): BelongsToMany;

    /**
     * Get the user's tenants.
     *
     * @return BelongsToMany<Model, Model&static>
     */
    public function tenants(): BelongsToMany;
>>>>>>> c7fd73eb (.)

    /**
     * Revoke the given role from the model.
     *
<<<<<<< HEAD
     * @param  string|int|Role|BackedEnum  $role
     * @return self
     */
    public function removeRole($role);

    /**
     * Get the current access token being used by the user.
     *
     * @return Token|\Laravel\Passport\TransientToken|null
     */
    // public function token();

    /**
     * A model may have multiple roles.
     */
    public function roles(): BelongsToMany;

    /**
     * Get all of the tenants the user belongs to.
     */
    public function tenants(): BelongsToMany;

    // public function canAccessSocialite(): bool;
    /**
     * Get all consents for the model (polymorphic).
     */
    // public function consents(): MorphMany;
    /**
     * Determine if the role may perform the given permission.
     *
     * @param  string|int|Permission|BackedEnum  $permission
     *
     * @throws PermissionDoesNotExist|GuardDoesNotMatch
     */
    public function hasPermissionTo($permission, ?string $guardName = null): bool;
=======
     * @param string|int|array<int|string>|UserRole|Collection<int, UserRole>|\BackedEnum ...$role
     *
     * @return $this
     */
    public function removeRole(...$role);

    /**
     * Determine if the user owns the given team.
     */
    public function ownsTeam(TeamContract $team): bool;

    /**
     * Determine if the user belongs to the given team.
     */
    public function belongsToTeam(TeamContract $team): bool;

    /**
     * Determine if the user has the given permission on the given team.
     */
    public function hasTeamPermission(TeamContract $team, string $permission): bool;

    /**
     * Switch the user's context to the given team.
     */
    public function switchTeam(TeamContract $team): bool;

    /**
     * @return array<string, Module>
     */
    public function getModules(): array;

    /**
     * Find the user instance for the given username (Passport).
     */
    public static function findForPassport(string $username): ?self;

    /**
     * Validate the password of the user for the given password (Passport).
     */
    public function validateForPassportPasswordGrant(string $password): bool;
>>>>>>> c7fd73eb (.)
}
