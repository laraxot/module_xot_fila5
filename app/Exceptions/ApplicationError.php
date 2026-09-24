<?php

<<<<<<< HEAD
declare(strict_types=1);
=======
<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
/**
 * @see https://dev.to/jackmiras/laravels-exceptions-part-2-custom-exceptions-1367
 */

<<<<<<< HEAD
=======
declare(strict_types=1);

<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
namespace Modules\Xot\Exceptions;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;

use function Safe\json_encode;

/**
 * @implements Arrayable<string, string>
 */
readonly class ApplicationError implements \JsonSerializable, Arrayable, Jsonable
{
    public function __construct(
        private string $help = '',
        private string $error = '',
<<<<<<< .merge_file_I6GCuN
<<<<<<< HEAD
<<<<<<< HEAD
    ) {}
=======
    ) {
    }
>>>>>>> laraxot/dev
=======
    ) {
    }
>>>>>>> 3792da0d (Check & fix styling)
=======
    ) {}
>>>>>>> .merge_file_Aprzzs

    /** @return array<string, string> */
    public function toArray(): array
    {
        return [
            'error' => $this->error,
            'help' => $this->help,
        ];
    }

    /** @return array<string, string> */
    #[\Override]
    public function jsonSerialize(): array
    {
        return $this->toArray();
    }

    public function toJson($options = 0): string
    {
        return json_encode($this->jsonSerialize(), $options);
    }
}
