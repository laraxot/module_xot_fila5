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
<<<<<<< .merge_file_epRIZY
<<<<<<< HEAD
<<<<<<< HEAD
        return filter_var($url, FILTER_VALIDATE_URL) !== false;
=======
        return false !== filter_var($url, FILTER_VALIDATE_URL);
>>>>>>> laraxot/dev
=======
        return false !== filter_var($url, FILTER_VALIDATE_URL);
>>>>>>> 8d801bbe (Check & fix styling)
=======
        return filter_var($url, FILTER_VALIDATE_URL) !== false;
>>>>>>> .merge_file_3ZOWe4
    }
}
