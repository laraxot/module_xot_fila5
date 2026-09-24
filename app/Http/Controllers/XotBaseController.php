<?php

<<<<<<< HEAD
declare(strict_types=1);
=======
>>>>>>> 8d801bbe (Check & fix styling)
/**
 * ---.
 */

<<<<<<< HEAD
=======
declare(strict_types=1);

>>>>>>> 8d801bbe (Check & fix styling)
namespace Modules\Xot\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as RoutingController;

class XotBaseController extends RoutingController
{
    use AuthorizesRequests;
    use DispatchesJobs;
    use ValidatesRequests;

    /**
     * success response method.
     *
<<<<<<< .merge_file_GQJB7m
<<<<<<< HEAD
     * <<<<<<< HEAD
     *
     * @param array<string, mixed> $result
     *                                     =======
     * @param array<string, mixed> $result
     *                                     >>>>>>> laraxot/dev
=======
     * @param array<string, mixed> $result
>>>>>>> 8d801bbe (Check & fix styling)
=======
     * @param  array<string, mixed>  $result
>>>>>>> .merge_file_R6dL3c
     */
    public function sendResponse(string $message, array $result): JsonResponse
    {
        $response = [
            'success' => true,
            'message' => $message,
            'data' => $result,
        ];

        return response()->json($response, 200);
    }

    /**
     * return error response.
     *
<<<<<<< .merge_file_GQJB7m
<<<<<<< HEAD
     * <<<<<<< HEAD
     *
     * @param array<string, mixed> $errorMessages
     *                                            =======
     * @param array<string, mixed> $errorMessages
     *                                            >>>>>>> laraxot/dev
=======
     * @param array<string, mixed> $errorMessages
>>>>>>> 8d801bbe (Check & fix styling)
=======
     * @param  array<string, mixed>  $errorMessages
>>>>>>> .merge_file_R6dL3c
     */
    public function sendError(string $error, array $errorMessages = [], int $code = 404): JsonResponse
    {
        $response = [
            'success' => false,
            'message' => $error,
            'data' => $errorMessages,
        ];
        // if (! empty($errorMessages)) {
        //    $response['data'] = $errorMessages;
        // }

        return response()->json($response, $code);
    }
}
