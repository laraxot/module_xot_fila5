<?php

<<<<<<< .merge_file_EY5KJf
declare(strict_types=1);
=======
<<<<<<< HEAD
declare(strict_types=1);
=======
>>>>>>> laraxot/dev
>>>>>>> .merge_file_KNvdB3
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

<<<<<<< .merge_file_EY5KJf
=======
<<<<<<< HEAD
=======
declare(strict_types=1);

>>>>>>> laraxot/dev
>>>>>>> .merge_file_KNvdB3
namespace Pest\Laravel;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\Response;
use Illuminate\Testing\TestResponse;
<<<<<<< .merge_file_EY5KJf
=======
<<<<<<< HEAD
>>>>>>> .merge_file_KNvdB3
use Pest\PendingCalls\AfterEachCall;
use Pest\PendingCalls\BeforeEachCall;
use Pest\PendingCalls\DescribeCall;
use Pest\PendingCalls\TestCall;
use Pest\PendingCalls\UsesCall;
<<<<<<< .merge_file_EY5KJf
=======
=======
>>>>>>> laraxot/dev
>>>>>>> .merge_file_KNvdB3

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
<<<<<<< HEAD
 * @param  string|array<int|string, mixed>  $uri
 * @param  array<string, mixed>  $options
=======
 * @param string|array<string, mixed> $uri
 * @param array<string, mixed>        $options
 *
>>>>>>> laraxot/dev
 * @return TestResponse<Response>
 */
function get(string|array $uri = '', array $options = []): TestResponse
{
    throw new \RuntimeException('Stub: This function is meant for static analysis only.');
}

/**
 * Perform a POST request.
 *
<<<<<<< HEAD
 * @param  string|array<int|string, mixed>  $uri
 * @param  array<string, mixed>  $data
 * @param  array<string, mixed>  $options
=======
 * @param string|array<string, mixed> $uri
 * @param array<string, mixed>        $data
 * @param array<string, mixed>        $options
 *
>>>>>>> laraxot/dev
 * @return TestResponse<Response>
 */
function post(string|array $uri, array $data = [], array $options = []): TestResponse
{
    throw new \RuntimeException('Stub: This function is meant for static analysis only.');
}

/**
 * Perform a PUT request.
 *
<<<<<<< HEAD
 * @param  string|array<int|string, mixed>  $uri
 * @param  array<string, mixed>  $data
=======
 * @param string|array<string, mixed> $uri
 * @param array<string, mixed>        $data
 *
>>>>>>> laraxot/dev
 * @return TestResponse<Response>
 */
function put(string|array $uri, array $data = []): TestResponse
{
    throw new \RuntimeException('Stub: This function is meant for static analysis only.');
}

/**
 * Perform a PATCH request.
 *
<<<<<<< HEAD
 * @param  string|array<int|string, mixed>  $uri
 * @param  array<string, mixed>  $data
=======
 * @param string|array<string, mixed> $uri
 * @param array<string, mixed>        $data
 *
>>>>>>> laraxot/dev
 * @return TestResponse<Response>
 */
function patch(string|array $uri, array $data = []): TestResponse
{
    throw new \RuntimeException('Stub: This function is meant for static analysis only.');
}

/**
 * Perform a DELETE request.
 *
<<<<<<< HEAD
 * @param  string|array<int|string, mixed>  $uri
=======
 * @param string|array<string, mixed> $uri
 *
>>>>>>> laraxot/dev
 * @return TestResponse<Response>
 */
function delete(string|array $uri): TestResponse
{
    throw new \RuntimeException('Stub: This function is meant for static analysis only.');
}

/**
 * Perform a HEAD request.
 *
<<<<<<< HEAD
 * @param  string|array<int|string, mixed>  $uri
=======
 * @param string|array<string, mixed> $uri
 *
>>>>>>> laraxot/dev
 * @return TestResponse<Response>
 */
function head(string|array $uri): TestResponse
{
    throw new \RuntimeException('Stub: This function is meant for static analysis only.');
}

/**
 * Perform an OPTIONS request.
 *
<<<<<<< HEAD
 * @param  string|array<int|string, mixed>  $uri
=======
 * @param string|array<string, mixed> $uri
 *
>>>>>>> laraxot/dev
 * @return TestResponse<Response>
 */
function options(string|array $uri): TestResponse
{
    throw new \RuntimeException('Stub: This function is meant for static analysis only.');
}

/**
 * Perform a JSON GET request.
 *
<<<<<<< HEAD
 * @param  string|array<int|string, mixed>  $uri
 * @param  array<string, mixed>  $headers
=======
 * @param string|array<string, mixed> $uri
 * @param array<string, mixed>        $headers
 *
>>>>>>> laraxot/dev
 * @return TestResponse<Response>
 */
function getJson(string|array $uri, array $headers = []): TestResponse
{
    throw new \RuntimeException('Stub: This function is meant for static analysis only.');
}

/**
 * Perform a JSON POST request.
 *
<<<<<<< HEAD
 * @param  string|array<int|string, mixed>  $uri
 * @param  array<string, mixed>  $data
 * @param  array<string, mixed>  $headers
=======
 * @param string|array<string, mixed> $uri
 * @param array<string, mixed>        $data
 * @param array<string, mixed>        $headers
 *
>>>>>>> laraxot/dev
 * @return TestResponse<Response>
 */
function postJson(string|array $uri, array $data = [], array $headers = []): TestResponse
{
    throw new \RuntimeException('Stub: This function is meant for static analysis only.');
}

/**
 * Perform a JSON PUT request.
 *
<<<<<<< HEAD
 * @param  string|array<int|string, mixed>  $uri
 * @param  array<string, mixed>  $data
 * @param  array<string, mixed>  $headers
=======
 * @param string|array<string, mixed> $uri
 * @param array<string, mixed>        $data
 * @param array<string, mixed>        $headers
 *
>>>>>>> laraxot/dev
 * @return TestResponse<Response>
 */
function putJson(string|array $uri, array $data = [], array $headers = []): TestResponse
{
    throw new \RuntimeException('Stub: This function is meant for static analysis only.');
}

/**
 * Perform a JSON PATCH request.
 *
<<<<<<< HEAD
 * @param  string|array<int|string, mixed>  $uri
 * @param  array<string, mixed>  $data
 * @param  array<string, mixed>  $headers
=======
 * @param string|array<string, mixed> $uri
 * @param array<string, mixed>        $data
 * @param array<string, mixed>        $headers
 *
>>>>>>> laraxot/dev
 * @return TestResponse<Response>
 */
function patchJson(string|array $uri, array $data = [], array $headers = []): TestResponse
{
    throw new \RuntimeException('Stub: This function is meant for static analysis only.');
}

/**
 * Perform a JSON DELETE request.
 *
<<<<<<< HEAD
 * @param  string|array<int|string, mixed>  $uri
 * @param  array<string, mixed>  $data
 * @param  array<string, mixed>  $headers
=======
 * @param string|array<string, mixed> $uri
 * @param array<string, mixed>        $data
 * @param array<string, mixed>        $headers
 *
>>>>>>> laraxot/dev
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
<<<<<<< .merge_file_EY5KJf
function test(string $description, ?\Closure $closure = null): TestCall
=======
<<<<<<< HEAD
function test(string $description, ?\Closure $closure = null): TestCall
=======
function test(string $description, ?\Closure $closure = null): mixed
>>>>>>> laraxot/dev
>>>>>>> .merge_file_KNvdB3
{
    throw new \RuntimeException('Stub: This function is meant for static analysis only.');
}

/**
 * Define a test case.
 */
<<<<<<< .merge_file_EY5KJf
function it(string $description, ?\Closure $closure = null): TestCall
=======
<<<<<<< HEAD
function it(string $description, ?\Closure $closure = null): TestCall
=======
function it(string $description, ?\Closure $closure = null): mixed
>>>>>>> laraxot/dev
>>>>>>> .merge_file_KNvdB3
{
    throw new \RuntimeException('Stub: This function is meant for static analysis only.');
}

/**
 * Define a test group.
 */
<<<<<<< .merge_file_EY5KJf
function describe(string $description, \Closure $closure): DescribeCall
=======
<<<<<<< HEAD
function describe(string $description, \Closure $closure): DescribeCall
=======
function describe(string $description, \Closure $closure): mixed
>>>>>>> laraxot/dev
>>>>>>> .merge_file_KNvdB3
{
    throw new \RuntimeException('Stub: This function is meant for static analysis only.');
}

/**
 * Define a before each hook.
 */
<<<<<<< .merge_file_EY5KJf
function beforeEach(\Closure $closure): BeforeEachCall
=======
<<<<<<< HEAD
function beforeEach(\Closure $closure): BeforeEachCall
=======
function beforeEach(\Closure $closure): mixed
>>>>>>> laraxot/dev
>>>>>>> .merge_file_KNvdB3
{
    throw new \RuntimeException('Stub: This function is meant for static analysis only.');
}

/**
 * Define an after each hook.
 */
<<<<<<< .merge_file_EY5KJf
function afterEach(\Closure $closure): AfterEachCall
=======
<<<<<<< HEAD
function afterEach(\Closure $closure): AfterEachCall
=======
function afterEach(\Closure $closure): mixed
>>>>>>> laraxot/dev
>>>>>>> .merge_file_KNvdB3
{
    throw new \RuntimeException('Stub: This function is meant for static analysis only.');
}

/**
 * Define a test class.
 *
<<<<<<< HEAD
 * @param  class-string  ...$classes
 */
function uses(string ...$classes): UsesCall
<<<<<<< .merge_file_EY5KJf
=======
=======
 * @param class-string ...$classes
 */
function uses(string ...$classes): mixed
>>>>>>> laraxot/dev
>>>>>>> .merge_file_KNvdB3
{
    throw new \RuntimeException('Stub: This function is meant for static analysis only.');
}
