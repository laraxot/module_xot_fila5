<?php

<<<<<<< .merge_file_oIs0Pe
declare(strict_types=1);
=======
<<<<<<< HEAD
declare(strict_types=1);
=======
>>>>>>> laraxot/dev
>>>>>>> .merge_file_f2udau
/**
 * @see https://dev.to/jackmiras/laravels-exceptions-part-2-custom-exceptions-1367
 */

<<<<<<< .merge_file_oIs0Pe
=======
<<<<<<< HEAD
=======
declare(strict_types=1);

>>>>>>> laraxot/dev
>>>>>>> .merge_file_f2udau
namespace Modules\Xot\Exceptions;

use Illuminate\Http\Response;

class JsonEncodeException extends ApplicationException
{
    #[\Override]
    public function status(): int
    {
        return Response::HTTP_BAD_REQUEST;
    }

    #[\Override]
    public function help(): string
    {
        $res = trans('exception.json_not_encoded.help');
        if (! \is_string($res)) {
            throw new \Exception('['.__LINE__.']['.class_basename($this).']');
        }

        return $res;
    }

    #[\Override]
    public function error(): string
    {
        $res = trans('exception.json_not_encoded.error');
        if (! \is_string($res)) {
            throw new \Exception('['.__LINE__.']['.class_basename($this).']');
        }

        return $res;
    }
}
