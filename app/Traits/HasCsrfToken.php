<?php

declare(strict_types=1);

namespace Modules\Xot\Traits;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

<<<<<<< HEAD
=======
/** @phpstan-ignore trait.unused */
>>>>>>> c7fd73eb (.)
trait HasCsrfToken
{
    /**
     * CSRF token for the current request.
<<<<<<< HEAD
     *
     * @var string
=======
>>>>>>> c7fd73eb (.)
     */
    public string $_token;

    /**
     * Mount the component and set the CSRF token.
<<<<<<< HEAD
     *
     * @return void
=======
>>>>>>> c7fd73eb (.)
     */
    public function mount(): void
    {
        $this->_token = App::make('session')->token();
    }

    /**
     * Get the CSRF token.
<<<<<<< HEAD
     *
     * @return string
=======
>>>>>>> c7fd73eb (.)
     */
    public function getCsrfToken(): string
    {
        return $this->_token;
    }

    /**
     * Verify if the CSRF token is valid.
<<<<<<< HEAD
     *
     * @return bool
=======
>>>>>>> c7fd73eb (.)
     */
    public function verifyCsrfToken(): bool
    {
        return Session::token() === $this->_token;
    }
}
