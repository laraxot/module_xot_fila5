<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Artisan;

use Illuminate\Contracts\Support\Renderable;
<<<<<<< HEAD
use Illuminate\Support\Facades\File;
use Spatie\QueueableAction\QueueableAction;
=======
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\File;
use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;
>>>>>>> laraxot/dev

use function Safe\preg_match_all;

/**
 * Replaces Modules\Xot\Services\ArtisanService::errorShow().
 */
class ShowArtisanErrorLogAction
{
    use QueueableAction;

    public function execute(): Renderable
    {
<<<<<<< HEAD
        /**
         * @phpstan-var view-string
         */
=======
        /** @var view-string $view */
>>>>>>> laraxot/dev
        $view = 'xot::acts.artisan.error-show';
        $files = File::files(storage_path('logs'));
        $log = request('log', '');
        if (! is_string($log)) {
            $log = '';
        }
        $content = '';
        if ($log !== '' && File::exists(storage_path('logs/'.$log))) {
            $content = File::get(storage_path('logs/'.$log));
        }

        $pattern = '/url":"([^"]*)"/';
<<<<<<< HEAD
        preg_match_all($pattern, $content, $matches);

        $urls = array_unique($matches[1]);
=======
        $matches = [];
        preg_match_all($pattern, $content, $matches);

        $urls = array_values(array_unique($matches[1]));
>>>>>>> laraxot/dev
        $view_params = [
            'view' => $view,
            'lang' => app()->getLocale(),
            'files' => $files,
            'content' => $content,
            'urls' => $urls,
        ];

<<<<<<< HEAD
        return view($view, $view_params);
=======
        $result = view($view, $view_params);
        Assert::isInstanceOf($result, View::class);

        return $result;
>>>>>>> laraxot/dev
    }
}
