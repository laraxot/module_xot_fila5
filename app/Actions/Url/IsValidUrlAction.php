<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Url;

use Spatie\QueueableAction\QueueableAction;

/**
 * Replaces Modules\Xot\Services\UrlService::checkValidUrl() (archived to .bak).
 */
class IsValidUrlAction
{
    use QueueableAction;

    public function execute(string $url): bool
    {
<<<<<<< .merge_file_DROJ7F
        return filter_var($url, FILTER_VALIDATE_URL) !== false;
=======
<<<<<<< HEAD
        return filter_var($url, FILTER_VALIDATE_URL) !== false;
=======
        return false !== filter_var($url, FILTER_VALIDATE_URL);
>>>>>>> laraxot/dev
>>>>>>> .merge_file_yWopIT
    }
}
