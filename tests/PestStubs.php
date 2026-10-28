<?php

declare(strict_types=1);
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

namespace Pest\Laravel;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\Response;
use Illuminate\Testing\TestResponse;
use Pest\PendingCalls\AfterEachCall;
use Pest\PendingCalls\BeforeEachCall;
use Pest\PendingCalls\DescribeCall;
use Pest\PendingCalls\TestCall;
use Pest\PendingCalls\UsesCall;

/**
 * Authenticate as a given model or ID.
 *
 * @return TestResponse<Response>
 */
function actingAs(Authenticatable|int|string|null $user = null, ?string $driver = null): TestResponse
{
<<<<<<< .merge_file_YlGmgv
    \xotPestStubFailure('actingAs', $user, $driver);
=======
    throw new \RuntimeException('Stub: This function is meant for static analysis only: '.(is_string($user) ? $user : '').($driver ?? ''));
>>>>>>> .merge_file_sppUoR
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
<<<<<<< .merge_file_YlGmgv
    \xotPestStubFailure('get', $uri, $options);
=======
    throw new \RuntimeException('Stub: This function is meant for static analysis only: '.(is_string($uri) ? $uri : '').count($options));
>>>>>>> .merge_file_sppUoR
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
<<<<<<< .merge_file_YlGmgv
    \xotPestStubFailure('post', $uri, $data, $options);
=======
    throw new \RuntimeException('Stub: This function is meant for static analysis only: '.(is_string($uri) ? $uri : '').count($data).count($options));
>>>>>>> .merge_file_sppUoR
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
<<<<<<< .merge_file_YlGmgv
    \xotPestStubFailure('put', $uri, $data);
=======
    throw new \RuntimeException('Stub: This function is meant for static analysis only: '.(is_string($uri) ? $uri : '').count($data));
>>>>>>> .merge_file_sppUoR
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
<<<<<<< .merge_file_YlGmgv
    \xotPestStubFailure('patch', $uri, $data);
=======
    throw new \RuntimeException('Stub: This function is meant for static analysis only: '.(is_string($uri) ? $uri : '').count($data));
>>>>>>> .merge_file_sppUoR
}

/**
 * Perform a DELETE request.
 *
 * @param  string|array<int|string, mixed>  $uri
 * @return TestResponse<Response>
 */
function delete(string|array $uri): TestResponse
{
<<<<<<< .merge_file_YlGmgv
    \xotPestStubFailure('delete', $uri);
=======
    throw new \RuntimeException('Stub: This function is meant for static analysis only: '.(is_string($uri) ? $uri : ''));
>>>>>>> .merge_file_sppUoR
}

/**
 * Perform a HEAD request.
 *
 * @param  string|array<int|string, mixed>  $uri
 * @return TestResponse<Response>
 */
function head(string|array $uri): TestResponse
{
<<<<<<< .merge_file_YlGmgv
    \xotPestStubFailure('head', $uri);
=======
    throw new \RuntimeException('Stub: This function is meant for static analysis only: '.(is_string($uri) ? $uri : ''));
>>>>>>> .merge_file_sppUoR
}

/**
 * Perform an OPTIONS request.
 *
 * @param  string|array<int|string, mixed>  $uri
 * @return TestResponse<Response>
 */
function options(string|array $uri): TestResponse
{
<<<<<<< .merge_file_YlGmgv
    \xotPestStubFailure('options', $uri);
=======
    throw new \RuntimeException('Stub: This function is meant for static analysis only: '.(is_string($uri) ? $uri : ''));
>>>>>>> .merge_file_sppUoR
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
<<<<<<< .merge_file_YlGmgv
    \xotPestStubFailure('getJson', $uri, $headers);
=======
    throw new \RuntimeException('Stub: This function is meant for static analysis only: '.(is_string($uri) ? $uri : '').count($headers));
>>>>>>> .merge_file_sppUoR
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
<<<<<<< .merge_file_YlGmgv
    \xotPestStubFailure('postJson', $uri, $data, $headers);
=======
    throw new \RuntimeException('Stub: This function is meant for static analysis only: '.(is_string($uri) ? $uri : '').count($data).count($headers));
>>>>>>> .merge_file_sppUoR
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
<<<<<<< .merge_file_YlGmgv
    \xotPestStubFailure('putJson', $uri, $data, $headers);
=======
    throw new \RuntimeException('Stub: This function is meant for static analysis only: '.(is_string($uri) ? $uri : '').count($data).count($headers));
>>>>>>> .merge_file_sppUoR
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
<<<<<<< .merge_file_YlGmgv
    \xotPestStubFailure('patchJson', $uri, $data, $headers);
=======
    throw new \RuntimeException('Stub: This function is meant for static analysis only: '.(is_string($uri) ? $uri : '').count($data).count($headers));
>>>>>>> .merge_file_sppUoR
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
<<<<<<< .merge_file_YlGmgv
    \xotPestStubFailure('deleteJson', $uri, $data, $headers);
=======
    throw new \RuntimeException('Stub: This function is meant for static analysis only: '.(is_string($uri) ? $uri : '').count($data).count($headers));
>>>>>>> .merge_file_sppUoR
}

/**
 * Set the number of redirects to follow.
 *
 * @return TestResponse<Response>
 */
function followingRedirects(int $number = 5): TestResponse
{
<<<<<<< .merge_file_YlGmgv
    \xotPestStubFailure('followingRedirects', $number);
=======
    throw new \RuntimeException('Stub: This function is meant for static analysis only: '.$number);
>>>>>>> .merge_file_sppUoR
}

/**
 * Define a test case.
 */
function test(string $description, ?\Closure $closure = null): TestCall
{
<<<<<<< .merge_file_YlGmgv
    \xotPestStubFailure('test', $description, $closure);
=======
    throw new \RuntimeException('Stub: This function is meant for static analysis only: '.$description.($closure instanceof \Closure ? 'closure' : ''));
>>>>>>> .merge_file_sppUoR
}

/**
 * Define a test case.
 */
function it(string $description, ?\Closure $closure = null): TestCall
{
<<<<<<< .merge_file_YlGmgv
    \xotPestStubFailure('it', $description, $closure);
=======
    throw new \RuntimeException('Stub: This function is meant for static analysis only: '.$description.($closure instanceof \Closure ? 'closure' : ''));
>>>>>>> .merge_file_sppUoR
}

/**
 * Define a test group.
 */
function describe(string $description, \Closure $closure): DescribeCall
{
<<<<<<< .merge_file_YlGmgv
    \xotPestStubFailure('describe', $description, $closure);
=======
    throw new \RuntimeException('Stub: This function is meant for static analysis only: '.$description.spl_object_id($closure));
>>>>>>> .merge_file_sppUoR
}

/**
 * Define a before each hook.
 */
function beforeEach(\Closure $closure): BeforeEachCall
{
<<<<<<< .merge_file_YlGmgv
    \xotPestStubFailure('beforeEach', $closure);
=======
    throw new \RuntimeException('Stub: This function is meant for static analysis only: '.spl_object_id($closure));
>>>>>>> .merge_file_sppUoR
}

/**
 * Define an after each hook.
 */
function afterEach(\Closure $closure): AfterEachCall
{
<<<<<<< .merge_file_YlGmgv
    \xotPestStubFailure('afterEach', $closure);
=======
    throw new \RuntimeException('Stub: This function is meant for static analysis only: '.spl_object_id($closure));
>>>>>>> .merge_file_sppUoR
}

/**
 * Define a test class.
 *
 * @param  class-string  ...$classes
 */
function uses(string ...$classes): UsesCall
{
<<<<<<< .merge_file_YlGmgv
    \xotPestStubFailure('uses', ...$classes);
=======
    throw new \RuntimeException('Stub: This function is meant for static analysis only: '.implode(',', $classes));
>>>>>>> .merge_file_sppUoR
}
