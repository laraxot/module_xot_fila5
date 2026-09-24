<?php

declare(strict_types=1);

<<<<<<< HEAD
use Illuminate\Support\Facades\Http;
use Modules\Xot\Actions\Dummy\GetProductsArrayDummyAction;
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

=======
uses(Modules\Xot\Tests\TestCase::class);
use Illuminate\Support\Facades\Http;
use Modules\Xot\Actions\Dummy\GetProductsArrayDummyAction;
use PHPUnit\Framework\Assert;

>>>>>>> laraxot/dev
it('maps only expected keys for each product', function (): void {
    Http::fake([
        'dummyjson.com/products' => Http::response([
            'products' => [
                [
                    'id' => 1,
                    'title' => 'Phone',
                    'description' => 'Smart phone',
                    'price' => 100,
                    'rating' => 4.5,
                    'brand' => 'Acme',
                    'category' => 'tech',
                    'thumbnail' => 'thumb.jpg',
                    'ignored' => 'x',
                ],
            ],
        ], 200),
    ]);

    $result = app(GetProductsArrayDummyAction::class)->execute();

    Assert::assertSame([
        [
            'id' => 1,
            'title' => 'Phone',
            'description' => 'Smart phone',
            'price' => 100,
            'rating' => 4.5,
            'brand' => 'Acme',
            'category' => 'tech',
            'thumbnail' => 'thumb.jpg',
        ],
    ], $result);
});

it('returns empty item when product entry is not an array', function (): void {
    Http::fake([
        'dummyjson.com/products' => Http::response([
            'products' => [
                'not-an-array',
            ],
        ], 200),
    ]);

    $result = app(GetProductsArrayDummyAction::class)->execute();

    Assert::assertSame([[]], $result);
});
