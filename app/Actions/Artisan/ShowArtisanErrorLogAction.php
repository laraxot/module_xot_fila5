<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Artisan;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\File;
<<<<<<< HEAD
=======
<<<<<<< .merge_file_apVbWZ
<<<<<<< HEAD
>>>>>>> laraxot/dev
use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;

use function Safe\preg_match_all;

<<<<<<< HEAD
=======
=======
=======
>>>>>>> .merge_file_6SIgjt

use function Safe\preg_match_all;

use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;

<<<<<<< .merge_file_apVbWZ
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_6SIgjt
>>>>>>> laraxot/dev
/**
 * Replaces Modules\Xot\Services\ArtisanService::errorShow().
 */
class ShowArtisanErrorLogAction
{
    use QueueableAction;

    public function execute(): Renderable
    {
        /** @var view-string $view */
        $view = 'xot::acts.artisan.error-show';
        $files = File::files(storage_path('logs'));
        $log = request('log', '');
        if (! is_string($log)) {
            $log = '';
        }
        $content = '';
<<<<<<< HEAD
        if ($log !== '' && File::exists(storage_path('logs/'.$log))) {
=======
<<<<<<< .merge_file_apVbWZ
<<<<<<< HEAD
        if ($log !== '' && File::exists(storage_path('logs/'.$log))) {
=======
        if ('' !== $log && File::exists(storage_path('logs/'.$log))) {
>>>>>>> laraxot/dev
=======
        if ('' !== $log && File::exists(storage_path('logs/'.$log))) {
>>>>>>> .merge_file_6SIgjt
>>>>>>> laraxot/dev
            $content = File::get(storage_path('logs/'.$log));
        }

        $pattern = '/url":"([^"]*)"/';
        $matches = [];
        preg_match_all($pattern, $content, $matches);

        $urls = array_values(array_unique($matches[1]));
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
