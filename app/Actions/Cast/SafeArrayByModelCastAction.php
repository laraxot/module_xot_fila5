<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Cast;

<<<<<<< HEAD
use ValueError;
use Error;
use Exception;
use Doctrine\DBAL\Schema\Index;
=======
>>>>>>> c7fd73eb (.)
use Illuminate\Database\Eloquent\Model;
use Spatie\QueueableAction\QueueableAction;

class SafeArrayByModelCastAction
{
    use QueueableAction;

    /**
     * @return array<string, mixed>
     */
    public function execute(Model $model): array
    {
        try {
<<<<<<< HEAD
            return $model->attributesToArray();
        } catch (ValueError|Error|Exception $e) {
=======
            /** @var array<string, mixed> $res */
            $res = $model->attributesToArray();

            return $res;
        } catch (\ValueError|\Error $e) {
>>>>>>> c7fd73eb (.)
            return $this->safeExecute($model);
        }
    }

<<<<<<< HEAD
=======
    /**
     * @return array<string, mixed>
     */
>>>>>>> c7fd73eb (.)
    public function safeExecute(Model $model): array
    {
        $data = [];
        foreach ($model->getAttributes() as $key => $value) {
            try {
<<<<<<< HEAD
                $data[$key] = $model->$key;

                /** @phpstan-ignore-next-line */
            } catch (ValueError|Error $e) {
=======
                $data[$key] = $model->getAttribute($key);
            } catch (\ValueError|\Error) {
>>>>>>> c7fd73eb (.)
            }
        }

        return $data;
<<<<<<< HEAD


=======
>>>>>>> c7fd73eb (.)
    }
}
