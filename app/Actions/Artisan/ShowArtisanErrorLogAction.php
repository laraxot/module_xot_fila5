<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Artisan;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\File;
use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;

use function Safe\preg_match_all;

/**
 * Replaces Modules\Xot\Services\ArtisanService::errorShow().
 */
class ShowArtisanErrorLogAction
{
    use QueueableAction;

    public function execute(): Renderable
    {
        /** @var string $view */
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
        $matches = [];
        preg_match_all($pattern, $content, $matches);

<<<<<<< .merge_file_2WoJuh
        /** @var array<string, mixed> $urls */
        $urls = array_values(array_unique($matches[1] ?? []));
=======
        /** @var list<string> $urlList */
        $urlList = $matches[1] ?? [];
        $urls = array_values(array_unique($urlList));
>>>>>>> .merge_file_DRUlZL
        $view_params = [
            'view' => $view,
            'lang' => app()->getLocale(),
            'files' => $files,
            'content' => $content,
            'urls' => $urls,
        ];

        $result = view($view, $view_params);
        Assert::isInstanceOf($result, View::class);

        return $result;
    }
}
