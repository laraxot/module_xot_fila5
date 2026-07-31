<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Model;

use Illuminate\Database\Eloquent\Model;
use Spatie\QueueableAction\QueueableAction;

class GetSicureArrayByModelAction
{
    use QueueableAction;

    /**
     * @return array<string, mixed>
     */
    public function execute(Model $model): array
    {
        try {
            /** @var array<string, mixed> $res */
            $res = $model->attributesToArray(); // "" is not a valid backing value for enum Modules\<main module>\Enums\OccurrenceFrequencyEnum

            return $res;
        } catch (\ValueError|\Error $e) {
            $data = [];
            foreach (array_keys($model->getAttributes()) as $key) {
                try {
                    $data[(string) $key] = $model->getAttribute((string) $key);
                } catch (\ValueError) {
                    // Skip attributes whose accessor/cast cannot resolve the raw value.
                }
            }

            return $data;
        }
    }
}
