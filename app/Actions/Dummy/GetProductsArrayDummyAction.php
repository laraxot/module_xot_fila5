<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Dummy;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;
use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;

class GetProductsArrayDummyAction
{
    use QueueableAction;

    /**
     * Execute the function with the given model class.
     *
     * @throws \Exception Generating Factory [factory_class] press [F5] to refresh page [__LINE__][__FILE__]
     */
    /**
     * @return array<int, array<string, mixed>>
     */
    public function execute(): array
    {
        // API
        $response = Http::get('https://dummyjson.com/products');

<<<<<<< HEAD
        Assert::isInstanceOf($response, Response::class);
        $products = $response->json();
        Assert::isArray($products);
=======
        /* @var Response $response */
        Assert::isArray($products = $response->json());
<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
        Assert::isArray($products['products']);

        // filtering some attributes
        /** @var array<int, array<string, mixed>> $mapped */
<<<<<<< HEAD
        $mapped = array_values(Arr::map($products['products'], function (mixed $item) {
=======
        $mapped = array_values(Arr::map($products['products'], function ($item) {
<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
            // Verifichiamo che $item sia un array prima di usare Arr::only
            if (! is_array($item)) {
                return []; // Restituiamo un array vuoto se $item non è un array
            }

            return Arr::only($item, [
                'id',
                'title',
                'description',
                'price',
                'rating',
                'brand',
                'category',
                'thumbnail',
            ]);
        }));

        return $mapped;
    }
}
