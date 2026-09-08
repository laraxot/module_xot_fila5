<?php

/**
 * ---.
 */

declare(strict_types=1);

namespace Modules\Xot\Contracts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Passport\PersonalAccessTokenResult;
use Laravel\Passport\Token;
use Laravel\Passport\TransientToken;

/**
<<<<<<< HEAD
 * @propery \Laravel\Passport\Token|\Laravel\Passport\TransientToken|null $accessToken;
 *
=======
>>>>>>> c7fd73eb (.)
 * @phpstan-require-extends Model
 */
interface PassportHasApiTokensContract
{
    /**
     * Get all of the user's registered OAuth clients.
     *
<<<<<<< HEAD
     * @return HasMany
     */
    public function clients();
=======
     * @return HasMany<Model, Model>
     */
    public function clients(): HasMany;
>>>>>>> c7fd73eb (.)

    /**
     * Get all of the access tokens for the user.
     *
<<<<<<< HEAD
     * @return HasMany
     */
    public function tokens();
=======
     * @return HasMany<Model, Model>
     */
    public function tokens(): HasMany;
>>>>>>> c7fd73eb (.)

    /**
     * Get the current access token being used by the user.
     *
     * @return Token|TransientToken|null
     */
    public function token();

    /**
     * Determine if the current API token has a given scope.
<<<<<<< HEAD
     *
     * @param string $scope
     *
     * @return bool
     */
    public function tokenCan($scope);
=======
     */
    public function tokenCan(string $scope): bool;
>>>>>>> c7fd73eb (.)

    /**
     * Create a new personal access token for the user.
     *
<<<<<<< HEAD
     * @param string $name
     *
     * @return PersonalAccessTokenResult
     */
    public function createToken($name, array $scopes = []);
=======
     * @param array<int, string> $scopes
     *
     * @return PersonalAccessTokenResult<Token>
     */
    public function createToken(string $name, array $scopes = []): PersonalAccessTokenResult;
>>>>>>> c7fd73eb (.)

    /**
     * Set the current access token for the user.
     *
     * @return $this
     */
<<<<<<< HEAD
    public function withAccessToken(Token|TransientToken $accessToken);
=======
    public function withAccessToken(Token|TransientToken|null $accessToken): static;
>>>>>>> c7fd73eb (.)
}
