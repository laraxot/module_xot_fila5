<?php

<<<<<<< .merge_file_C7x5zn
declare(strict_types=1);
=======
<<<<<<< HEAD
declare(strict_types=1);
=======
>>>>>>> laraxot/dev
>>>>>>> .merge_file_z3ZZ0p
/**
 * @see https://dev.to/jackmiras/laravel-delete-actions-simplified-4h8b
 */

<<<<<<< .merge_file_C7x5zn
=======
<<<<<<< HEAD
=======
declare(strict_types=1);

>>>>>>> laraxot/dev
>>>>>>> .merge_file_z3ZZ0p
namespace Modules\Xot\Exceptions;

use Illuminate\Http\Response;
use Illuminate\Support\Str;

class ModelDeletionException extends ApplicationException
{
    private readonly string $model;

    public function __construct(
        private readonly int $id,
        string $model,
    ) {
        $this->model = Str::afterLast($model, '\\');
    }

    #[\Override]
    public function status(): int
    {
        return Response::HTTP_BAD_REQUEST;
    }

    #[\Override]
    public function help(): string
    {
        $res = trans('exception.model_not_deleted.help');
        if (! \is_string($res)) {
            throw new \Exception('['.__LINE__.']['.class_basename($this).']');
        }

        return $res;
    }

    #[\Override]
    public function error(): string
    {
        $res = trans('exception.model_not_deleted.error', [
            'id' => $this->id,
            'model' => $this->model,
        ]);
        if (! \is_string($res)) {
            throw new \Exception('['.__LINE__.']['.class_basename($this).']');
        }

        return $res;
    }
}
