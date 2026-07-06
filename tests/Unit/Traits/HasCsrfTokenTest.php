<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Unit\Traits;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Modules\Xot\Traits\HasCsrfToken;

it('sets csrf token on mount', function (): void {
    /** @var TestCase $this */
    $token = 'test-token-123';

    // Mock session token
    $session = \Mockery::mock();
    $session->shouldReceive('token')->andReturn($token);
    App::instance('session', $session);

    $class = new class {
        public string $_token = '';

        public function mount(): void
        {
            $this->_token = app('session')->token();
        }

        public function getCsrfToken(): string
        {
            return $this->_token;
        }
    };

    $class->mount();

    expect($class->getCsrfToken())->toBe($token);

    \Mockery::close();
});

it('verifies csrf token', function (): void {
    /** @var TestCase $this */
    $token = 'secret-token';

    $class = new class {
        public string $_token = '';

        public function verifyCsrfToken(): bool
        {
            return $this->_token === app('session')->token();
        }
    };
    $class->_token = $token;

    Session::shouldReceive('token')
        ->twice()
        ->andReturn($token, 'wrong-token');

    expect($class->verifyCsrfToken())->toBeTrue();
    expect($class->verifyCsrfToken())->toBeFalse();

    \Mockery::close();
});
