<?php

<<<<<<< HEAD
=======
declare(strict_types=1);
>>>>>>> laraxot/dev
/**
 * Pest Laravel helper stubs for PHPStan.
 *
 * This file provides the missing `Pest\Laravel\*` functions that PHPStan
 * cannot resolve from the Pest extension alone.
 *
 * IMPORTANT:
 * - Do not call these functions in production code.
 * - This file is only for static analysis and test helper convenience.
 */

<<<<<<< HEAD
declare(strict_types=1);

=======
>>>>>>> laraxot/dev
namespace Pest\Laravel;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\Response;
use Illuminate\Testing\TestResponse;
<<<<<<< HEAD
=======
use Pest\PendingCalls\AfterEachCall;
use Pest\PendingCalls\BeforeEachCall;
use Pest\PendingCalls\DescribeCall;
use Pest\PendingCalls\TestCall;
use Pest\PendingCalls\UsesCall;
>>>>>>> laraxot/dev

/**
 * Authenticate as a given model or ID.
 *
 * @return TestResponse<Response>
 */
function actingAs(Authenticatable|int|string|null $user = null, ?string $driver = null): TestResponse
{
    throw new \RuntimeException('Stub: This function is meant for static analysis only.');
}

/**
 * Perform a GET request.
 *
 * @param  string|array<int|string, mixed>  $uri
 * @param  array<string, mixed>  $options
 * @return TestResponse<Response>
 */
function get(string|array $uri = '', array $options = []): TestResponse
{
    throw new \RuntimeException('Stub: This function is meant for static analysis only.');
}

/**
 * Perform a POST request.
 *
 * @param  string|array<int|string, mixed>  $uri
 * @param  array<string, mixed>  $data
 * @param  array<string, mixed>  $options
 * @return TestResponse<Response>
 */
function post(string|array $uri, array $data = [], array $options = []): TestResponse
{
    throw new \RuntimeException('Stub: This function is meant for static analysis only.');
}

/**
 * Perform a PUT request.
 *
 * @param  string|array<int|string, mixed>  $uri
 * @param  array<string, mixed>  $data
 * @return TestResponse<Response>
 */
function put(string|array $uri, array $data = []): TestResponse
{
    throw new \RuntimeException('Stub: This function is meant for static analysis only.');
}

/**
 * Perform a PATCH request.
 *
 * @param  string|array<int|string, mixed>  $uri
 * @param  array<string, mixed>  $data
 * @return TestResponse<Response>
 */
function patch(string|array $uri, array $data = []): TestResponse
{
    throw new \RuntimeException('Stub: This function is meant for static analysis only.');
}

/**
 * Perform a DELETE request.
 *
 * @param  string|array<int|string, mixed>  $uri
 * @return TestResponse<Response>
 */
function delete(string|array $uri): TestResponse
{
    throw new \RuntimeException('Stub: This function is meant for static analysis only.');
}

/**
 * Perform a HEAD request.
 *
 * @param  string|array<int|string, mixed>  $uri
 * @return TestResponse<Response>
 */
function head(string|array $uri): TestResponse
{
    throw new \RuntimeException('Stub: This function is meant for static analysis only.');
}

/**
 * Perform an OPTIONS request.
 *
 * @param  string|array<int|string, mixed>  $uri
 * @return TestResponse<Response>
 */
function options(string|array $uri): TestResponse
{
    throw new \RuntimeException('Stub: This function is meant for static analysis only.');
}

/**
 * Perform a JSON GET request.
 *
 * @param  string|array<int|string, mixed>  $uri
 * @param  array<string, mixed>  $headers
 * @return TestResponse<Response>
 */
function getJson(string|array $uri, array $headers = []): TestResponse
{
    throw new \RuntimeException('Stub: This function is meant for static analysis only.');
}

/**
 * Perform a JSON POST request.
 *
 * @param  string|array<int|string, mixed>  $uri
 * @param  array<string, mixed>  $data
 * @param  array<string, mixed>  $headers
 * @return TestResponse<Response>
 */
function postJson(string|array $uri, array $data = [], array $headers = []): TestResponse
{
    throw new \RuntimeException('Stub: This function is meant for static analysis only.');
}

/**
 * Perform a JSON PUT request.
 *
 * @param  string|array<int|string, mixed>  $uri
 * @param  array<string, mixed>  $data
 * @param  array<string, mixed>  $headers
 * @return TestResponse<Response>
 */
function putJson(string|array $uri, array $data = [], array $headers = []): TestResponse
{
    throw new \RuntimeException('Stub: This function is meant for static analysis only.');
}

/**
 * Perform a JSON PATCH request.
 *
 * @param  string|array<int|string, mixed>  $uri
 * @param  array<string, mixed>  $data
 * @param  array<string, mixed>  $headers
 * @return TestResponse<Response>
 */
function patchJson(string|array $uri, array $data = [], array $headers = []): TestResponse
{
    throw new \RuntimeException('Stub: This function is meant for static analysis only.');
}

/**
 * Perform a JSON DELETE request.
 *
 * @param  string|array<int|string, mixed>  $uri
 * @param  array<string, mixed>  $data
 * @param  array<string, mixed>  $headers
 * @return TestResponse<Response>
 */
function deleteJson(string|array $uri, array $data = [], array $headers = []): TestResponse
{
    throw new \RuntimeException('Stub: This function is meant for static analysis only.');
}

/**
 * Set the number of redirects to follow.
 *
 * @return TestResponse<Response>
 */
function followingRedirects(int $number = 5): TestResponse
{
    throw new \RuntimeException('Stub: This function is meant for static analysis only.');
}

/**
 * Define a test case.
 */
<<<<<<< HEAD
function test(string $description, ?\Closure $closure = null): mixed
=======
function test(string $description, ?\Closure $closure = null): TestCall
>>>>>>> laraxot/dev
{
    throw new \RuntimeException('Stub: This function is meant for static analysis only.');
}

/**
 * Define a test case.
 */
<<<<<<< HEAD
function it(string $description, ?\Closure $closure = null): mixed
=======
function it(string $description, ?\Closure $closure = null): TestCall
>>>>>>> laraxot/dev
{
    throw new \RuntimeException('Stub: This function is meant for static analysis only.');
}

/**
 * Define a test group.
 */
<<<<<<< HEAD
function describe(string $description, \Closure $closure): mixed
=======
function describe(string $description, \Closure $closure): DescribeCall
>>>>>>> laraxot/dev
{
    throw new \RuntimeException('Stub: This function is meant for static analysis only.');
}

/**
 * Define a before each hook.
 */
<<<<<<< HEAD
function beforeEach(\Closure $closure): mixed
=======
function beforeEach(\Closure $closure): BeforeEachCall
>>>>>>> laraxot/dev
{
    throw new \RuntimeException('Stub: This function is meant for static analysis only.');
}

/**
 * Define an after each hook.
 */
<<<<<<< HEAD
function afterEach(\Closure $closure): mixed
=======
function afterEach(\Closure $closure): AfterEachCall
>>>>>>> laraxot/dev
{
    throw new \RuntimeException('Stub: This function is meant for static analysis only.');
}

/**
 * Define a test class.
 *
 * @param  class-string  ...$classes
 */
<<<<<<< HEAD
function uses(string ...$classes): mixed
=======
function uses(string ...$classes): UsesCall
>>>>>>> laraxot/dev
{
    throw new \RuntimeException('Stub: This function is meant for static analysis only.');
}
