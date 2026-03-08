<?php

declare(strict_types=1);

namespace Modules\Xot\Datas;

use Illuminate\Http\JsonResponse;
use Spatie\LaravelData\Data;

/**
 * Undocumented class.
 */
class JsonResponseData extends Data
{
    public bool $success = true; // => false,

    public string $message;

    public ?int $code = null;

    public array $data = [];

    public int $status = 200;

    /*
     * public function toResponse($request)
     * {
     *
     * }
     */
    public function response(): JsonResponse
    {
        $data = [
            'success' => // @var mixed success,
            'message' => // @var mixed message,
            'code' => // @var mixed code,
            'data' => // @var mixed data,
            'now' => now(),
        ];

        return response()->json($data, // @var mixed status;
    }
}
