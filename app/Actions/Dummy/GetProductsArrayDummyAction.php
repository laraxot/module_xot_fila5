<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Dummy;

<<<<<<< HEAD
use Exception;
=======
use Illuminate\Http\Client\Response;
>>>>>>> c7fd73eb (.)
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
<<<<<<< HEAD
     * @throws Exception Generating Factory [factory_class] press [F5] to refresh page [__LINE__][__FILE__]
=======
     * @throws \Exception Generating Factory [factory_class] press [F5] to refresh page [__LINE__][__FILE__]
     */
    /**
     * @return array<int, array<string, mixed>>
>>>>>>> c7fd73eb (.)
     */
    public function execute(): array
    {
        // API
<<<<<<< HEAD
        Assert::isArray($products = Http::get('https://dummyjson.com/products')->json());
        Assert::isArray($products['products']);
        // filtering some attributes
        $products = Arr::map($products['products'], function ($item) {
            // Verifichiamo che $item sia un array prima di usare Arr::only
            if (!is_array($item)) {
=======
        $response = Http::get('https://dummyjson.com/products');

        Assert::isInstanceOf($response, Response::class);
        $products = $response->json();
        Assert::isArray($products);
        Assert::isArray($products['products']);

        // filtering some attributes
        /** @var array<int, array<string, mixed>> $mapped */
        $mapped = array_values(Arr::map($products['products'], function (mixed $item) {
            // Verifichiamo che $item sia un array prima di usare Arr::only
            if (! is_array($item)) {
>>>>>>> c7fd73eb (.)
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
<<<<<<< HEAD
        });

        return $products;
=======
        }));

        return $mapped;
>>>>>>> c7fd73eb (.)
    }
}
