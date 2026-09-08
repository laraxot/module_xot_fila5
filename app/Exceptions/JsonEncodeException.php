<?php

/**
 * @see https://dev.to/jackmiras/laravels-exceptions-part-2-custom-exceptions-1367
 */

declare(strict_types=1);

namespace Modules\Xot\Exceptions;

<<<<<<< HEAD
use Override;
use Exception;
=======
>>>>>>> c7fd73eb (.)
use Illuminate\Http\Response;

class JsonEncodeException extends ApplicationException
{
<<<<<<< HEAD
    #[Override]
=======
    #[\Override]
>>>>>>> c7fd73eb (.)
    public function status(): int
    {
        return Response::HTTP_BAD_REQUEST;
    }

<<<<<<< HEAD
    #[Override]
    public function help(): string
    {
        $res = trans('exception.json_not_encoded.help');
        if (!\is_string($res)) {
            throw new Exception('[' . __LINE__ . '][' . class_basename($this) . ']');
=======
    #[\Override]
    public function help(): string
    {
        $res = trans('exception.json_not_encoded.help');
        if (! \is_string($res)) {
            throw new \Exception('['.__LINE__.']['.class_basename($this).']');
>>>>>>> c7fd73eb (.)
        }

        return $res;
    }

<<<<<<< HEAD
    #[Override]
    public function error(): string
    {
        $res = trans('exception.json_not_encoded.error');
        if (!\is_string($res)) {
            throw new Exception('[' . __LINE__ . '][' . class_basename($this) . ']');
=======
    #[\Override]
    public function error(): string
    {
        $res = trans('exception.json_not_encoded.error');
        if (! \is_string($res)) {
            throw new \Exception('['.__LINE__.']['.class_basename($this).']');
>>>>>>> c7fd73eb (.)
        }

        return $res;
    }
}
