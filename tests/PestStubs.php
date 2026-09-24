<?php

<<<<<<< HEAD
declare(strict_types=1);
=======
>>>>>>> 8d801bbe (Check & fix styling)
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
=======
declare(strict_types=1);

>>>>>>> 8d801bbe (Check & fix styling)
namespace Pest\Laravel;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\Response;
use Illuminate\Testing\TestResponse;
<<<<<<< HEAD
use Pest\PendingCalls\AfterEachCall;
use Pest\PendingCalls\BeforeEachCall;
use Pest\PendingCalls\DescribeCall;
use Pest\PendingCalls\TestCall;
use Pest\PendingCalls\UsesCall;
=======
>>>>>>> 8d801bbe (Check & fix styling)

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
<<<<<<< .merge_file_ufX4Vk
<<<<<<< HEAD
 * <<<<<<< HEAD
 *
 * @param string|array<int|string, mixed> $uri
 * @param array<string, mixed>            $options
 *                                                 =======
 * @param string|array<int|string, mixed> $uri
 * @param array<string, mixed>            $options
 *
 * >>>>>>> laraxot/dev
=======
 * @param string|array<int|string, mixed> $uri
 * @param array<string, mixed>            $options
>>>>>>> 8d801bbe (Check & fix styling)
 *
=======
 * @param  string|array<int|string, mixed>  $uri
 * @param  array<string, mixed>  $options
>>>>>>> .merge_file_PIl1fn
 * @return TestResponse<Response>
 */
function get(string|array $uri = '', array $options = []): TestResponse
{
    throw new \RuntimeException('Stub: This function is meant for static analysis only.');
}

/**
 * Perform a POST request.
 *
<<<<<<< .merge_file_ufX4Vk
<<<<<<< HEAD
 * <<<<<<< HEAD
 *
 * @param string|array<int|string, mixed> $uri
 * @param array<string, mixed>            $data
 * @param array<string, mixed>            $options
 *                                                 =======
 * @param string|array<int|string, mixed> $uri
 * @param array<string, mixed>            $data
 * @param array<string, mixed>            $options
 *
 * >>>>>>> laraxot/dev
=======
 * @param string|array<int|string, mixed> $uri
 * @param array<string, mixed>            $data
 * @param array<string, mixed>            $options
>>>>>>> 8d801bbe (Check & fix styling)
 *
=======
 * @param  string|array<int|string, mixed>  $uri
 * @param  array<string, mixed>  $data
 * @param  array<string, mixed>  $options
>>>>>>> .merge_file_PIl1fn
 * @return TestResponse<Response>
 */
function post(string|array $uri, array $data = [], array $options = []): TestResponse
{
    throw new \RuntimeException('Stub: This function is meant for static analysis only.');
}

/**
 * Perform a PUT request.
 *
<<<<<<< .merge_file_ufX4Vk
<<<<<<< HEAD
 * <<<<<<< HEAD
 *
 * @param string|array<int|string, mixed> $uri
 * @param array<string, mixed>            $data
 *                                              =======
 * @param string|array<int|string, mixed> $uri
 * @param array<string, mixed>            $data
 *
 * >>>>>>> laraxot/dev
=======
 * @param string|array<int|string, mixed> $uri
 * @param array<string, mixed>            $data
>>>>>>> 8d801bbe (Check & fix styling)
 *
=======
 * @param  string|array<int|string, mixed>  $uri
 * @param  array<string, mixed>  $data
>>>>>>> .merge_file_PIl1fn
 * @return TestResponse<Response>
 */
function put(string|array $uri, array $data = []): TestResponse
{
    throw new \RuntimeException('Stub: This function is meant for static analysis only.');
}

/**
 * Perform a PATCH request.
 *
<<<<<<< .merge_file_ufX4Vk
<<<<<<< HEAD
 * <<<<<<< HEAD
 *
 * @param string|array<int|string, mixed> $uri
 * @param array<string, mixed>            $data
 *                                              =======
 * @param string|array<int|string, mixed> $uri
 * @param array<string, mixed>            $data
 *
 * >>>>>>> laraxot/dev
=======
 * @param string|array<int|string, mixed> $uri
 * @param array<string, mixed>            $data
>>>>>>> 8d801bbe (Check & fix styling)
 *
=======
 * @param  string|array<int|string, mixed>  $uri
 * @param  array<string, mixed>  $data
>>>>>>> .merge_file_PIl1fn
 * @return TestResponse<Response>
 */
function patch(string|array $uri, array $data = []): TestResponse
{
    throw new \RuntimeException('Stub: This function is meant for static analysis only.');
}

/**
 * Perform a DELETE request.
 *
<<<<<<< .merge_file_ufX4Vk
<<<<<<< HEAD
 * <<<<<<< HEAD
 *
 * @param string|array<int|string, mixed> $uri
 *                                             =======
 * @param string|array<int|string, mixed> $uri
 *
 * >>>>>>> laraxot/dev
=======
 * @param string|array<int|string, mixed> $uri
>>>>>>> 8d801bbe (Check & fix styling)
 *
=======
 * @param  string|array<int|string, mixed>  $uri
>>>>>>> .merge_file_PIl1fn
 * @return TestResponse<Response>
 */
function delete(string|array $uri): TestResponse
{
    throw new \RuntimeException('Stub: This function is meant for static analysis only.');
}

/**
 * Perform a HEAD request.
 *
<<<<<<< .merge_file_ufX4Vk
<<<<<<< HEAD
 * <<<<<<< HEAD
 *
 * @param string|array<int|string, mixed> $uri
 *                                             =======
 * @param string|array<int|string, mixed> $uri
 *
 * >>>>>>> laraxot/dev
=======
 * @param string|array<int|string, mixed> $uri
>>>>>>> 8d801bbe (Check & fix styling)
 *
=======
 * @param  string|array<int|string, mixed>  $uri
>>>>>>> .merge_file_PIl1fn
 * @return TestResponse<Response>
 */
function head(string|array $uri): TestResponse
{
    throw new \RuntimeException('Stub: This function is meant for static analysis only.');
}

/**
 * Perform an OPTIONS request.
 *
<<<<<<< .merge_file_ufX4Vk
<<<<<<< HEAD
 * <<<<<<< HEAD
 *
 * @param string|array<int|string, mixed> $uri
 *                                             =======
 * @param string|array<int|string, mixed> $uri
 *
 * >>>>>>> laraxot/dev
=======
 * @param string|array<int|string, mixed> $uri
>>>>>>> 8d801bbe (Check & fix styling)
 *
=======
 * @param  string|array<int|string, mixed>  $uri
>>>>>>> .merge_file_PIl1fn
 * @return TestResponse<Response>
 */
function options(string|array $uri): TestResponse
{
    throw new \RuntimeException('Stub: This function is meant for static analysis only.');
}

/**
 * Perform a JSON GET request.
 *
<<<<<<< .merge_file_ufX4Vk
<<<<<<< HEAD
 * <<<<<<< HEAD
 *
 * @param string|array<int|string, mixed> $uri
 * @param array<string, mixed>            $headers
 *                                                 =======
 * @param string|array<int|string, mixed> $uri
 * @param array<string, mixed>            $headers
 *
 * >>>>>>> laraxot/dev
=======
 * @param string|array<int|string, mixed> $uri
 * @param array<string, mixed>            $headers
>>>>>>> 8d801bbe (Check & fix styling)
 *
=======
 * @param  string|array<int|string, mixed>  $uri
 * @param  array<string, mixed>  $headers
>>>>>>> .merge_file_PIl1fn
 * @return TestResponse<Response>
 */
function getJson(string|array $uri, array $headers = []): TestResponse
{
    throw new \RuntimeException('Stub: This function is meant for static analysis only.');
}

/**
 * Perform a JSON POST request.
 *
<<<<<<< .merge_file_ufX4Vk
<<<<<<< HEAD
 * <<<<<<< HEAD
 *
 * @param string|array<int|string, mixed> $uri
 * @param array<string, mixed>            $data
 * @param array<string, mixed>            $headers
 *                                                 =======
 * @param string|array<int|string, mixed> $uri
 * @param array<string, mixed>            $data
 * @param array<string, mixed>            $headers
 *
 * >>>>>>> laraxot/dev
=======
 * @param string|array<int|string, mixed> $uri
 * @param array<string, mixed>            $data
 * @param array<string, mixed>            $headers
>>>>>>> 8d801bbe (Check & fix styling)
 *
=======
 * @param  string|array<int|string, mixed>  $uri
 * @param  array<string, mixed>  $data
 * @param  array<string, mixed>  $headers
>>>>>>> .merge_file_PIl1fn
 * @return TestResponse<Response>
 */
function postJson(string|array $uri, array $data = [], array $headers = []): TestResponse
{
    throw new \RuntimeException('Stub: This function is meant for static analysis only.');
}

/**
 * Perform a JSON PUT request.
 *
<<<<<<< .merge_file_ufX4Vk
<<<<<<< HEAD
 * <<<<<<< HEAD
 *
 * @param string|array<int|string, mixed> $uri
 * @param array<string, mixed>            $data
 * @param array<string, mixed>            $headers
 *                                                 =======
 * @param string|array<int|string, mixed> $uri
 * @param array<string, mixed>            $data
 * @param array<string, mixed>            $headers
 *
 * >>>>>>> laraxot/dev
=======
 * @param string|array<int|string, mixed> $uri
 * @param array<string, mixed>            $data
 * @param array<string, mixed>            $headers
>>>>>>> 8d801bbe (Check & fix styling)
 *
=======
 * @param  string|array<int|string, mixed>  $uri
 * @param  array<string, mixed>  $data
 * @param  array<string, mixed>  $headers
>>>>>>> .merge_file_PIl1fn
 * @return TestResponse<Response>
 */
function putJson(string|array $uri, array $data = [], array $headers = []): TestResponse
{
    throw new \RuntimeException('Stub: This function is meant for static analysis only.');
}

/**
 * Perform a JSON PATCH request.
 *
<<<<<<< .merge_file_ufX4Vk
<<<<<<< HEAD
 * <<<<<<< HEAD
 *
 * @param string|array<int|string, mixed> $uri
 * @param array<string, mixed>            $data
 * @param array<string, mixed>            $headers
 *                                                 =======
 * @param string|array<int|string, mixed> $uri
 * @param array<string, mixed>            $data
 * @param array<string, mixed>            $headers
 *
 * >>>>>>> laraxot/dev
=======
 * @param string|array<int|string, mixed> $uri
 * @param array<string, mixed>            $data
 * @param array<string, mixed>            $headers
>>>>>>> 8d801bbe (Check & fix styling)
 *
=======
 * @param  string|array<int|string, mixed>  $uri
 * @param  array<string, mixed>  $data
 * @param  array<string, mixed>  $headers
>>>>>>> .merge_file_PIl1fn
 * @return TestResponse<Response>
 */
function patchJson(string|array $uri, array $data = [], array $headers = []): TestResponse
{
    throw new \RuntimeException('Stub: This function is meant for static analysis only.');
}

/**
 * Perform a JSON DELETE request.
 *
<<<<<<< .merge_file_ufX4Vk
<<<<<<< HEAD
 * <<<<<<< HEAD
 *
 * @param string|array<int|string, mixed> $uri
 * @param array<string, mixed>            $data
 * @param array<string, mixed>            $headers
 *                                                 =======
 * @param string|array<int|string, mixed> $uri
 * @param array<string, mixed>            $data
 * @param array<string, mixed>            $headers
 *
 * >>>>>>> laraxot/dev
=======
 * @param string|array<int|string, mixed> $uri
 * @param array<string, mixed>            $data
 * @param array<string, mixed>            $headers
>>>>>>> 8d801bbe (Check & fix styling)
 *
=======
 * @param  string|array<int|string, mixed>  $uri
 * @param  array<string, mixed>  $data
 * @param  array<string, mixed>  $headers
>>>>>>> .merge_file_PIl1fn
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
function test(string $description, ?\Closure $closure = null): TestCall
=======
function test(string $description, ?\Closure $closure = null): mixed
>>>>>>> 8d801bbe (Check & fix styling)
{
    throw new \RuntimeException('Stub: This function is meant for static analysis only.');
}

/**
 * Define a test case.
 */
<<<<<<< HEAD
function it(string $description, ?\Closure $closure = null): TestCall
=======
function it(string $description, ?\Closure $closure = null): mixed
>>>>>>> 8d801bbe (Check & fix styling)
{
    throw new \RuntimeException('Stub: This function is meant for static analysis only.');
}

/**
 * Define a test group.
 */
<<<<<<< HEAD
function describe(string $description, \Closure $closure): DescribeCall
=======
function describe(string $description, \Closure $closure): mixed
>>>>>>> 8d801bbe (Check & fix styling)
{
    throw new \RuntimeException('Stub: This function is meant for static analysis only.');
}

/**
 * Define a before each hook.
 */
<<<<<<< HEAD
function beforeEach(\Closure $closure): BeforeEachCall
=======
function beforeEach(\Closure $closure): mixed
>>>>>>> 8d801bbe (Check & fix styling)
{
    throw new \RuntimeException('Stub: This function is meant for static analysis only.');
}

/**
 * Define an after each hook.
 */
<<<<<<< HEAD
function afterEach(\Closure $closure): AfterEachCall
=======
function afterEach(\Closure $closure): mixed
>>>>>>> 8d801bbe (Check & fix styling)
{
    throw new \RuntimeException('Stub: This function is meant for static analysis only.');
}

/**
 * Define a test class.
 *
<<<<<<< .merge_file_ufX4Vk
<<<<<<< HEAD
 * <<<<<<< HEAD
 *
 * @param class-string ...$classes
 *                                 =======
 * @param class-string ...$classes
 *                                 >>>>>>> laraxot/dev
=======
 * @param  class-string  ...$classes
>>>>>>> .merge_file_PIl1fn
 */
function uses(string ...$classes): UsesCall
=======
 * @param class-string ...$classes
 */
function uses(string ...$classes): mixed
>>>>>>> 8d801bbe (Check & fix styling)
{
    throw new \RuntimeException('Stub: This function is meant for static analysis only.');
}
