<?php

declare(strict_types=1);

namespace Tests\Modules\Xot\Unit;

use Modules\Xot\Datas\JsonResponseData;
use Tests\Modules\Xot\TestCase;

uses(TestCase::class)->group('no-xot-db');

test('JSON response data preserves status and domain payload', function (): void {
    $data = JsonResponseData::from([
        'success' => false,
        'message' => 'invalid input',
        'code' => 422,
        'data' => ['field' => 'email'],
        'status' => 422,
    ]);

    $response = $data->response();

    expect($response->getStatusCode())->toBe(422)
        ->and($response->getData(true))->toMatchArray([
            'success' => false,
            'message' => 'invalid input',
            'code' => 422,
            'data' => ['field' => 'email'],
        ]);
});
