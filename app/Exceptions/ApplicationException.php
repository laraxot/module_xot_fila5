<?php

<<<<<<< .merge_file_4WWfZk
declare(strict_types=1);
=======
<<<<<<< HEAD
declare(strict_types=1);
=======
>>>>>>> laraxot/dev
>>>>>>> .merge_file_1pT8mG
/**
 * @see https://dev.to/jackmiras/laravels-exceptions-part-2-custom-exceptions-1367
 */

<<<<<<< .merge_file_4WWfZk
=======
<<<<<<< HEAD
=======
declare(strict_types=1);

>>>>>>> laraxot/dev
>>>>>>> .merge_file_1pT8mG
namespace Modules\Xot\Exceptions;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

abstract class ApplicationException extends \Exception
{
    abstract public function status(): int;

    abstract public function help(): string;

    abstract public function error(): string;

    public function render(Request $_request): Response
    {
        $applicationError = new ApplicationError($this->help(), $this->error());

        return response($applicationError->toArray(), $this->status());
    }
}
