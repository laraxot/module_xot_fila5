<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Artisan;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\File;
<<<<<<< HEAD
<<<<<<< .merge_file_ZD4zfl
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
<<<<<<< HEAD
>>>>>>> da9ae01a0 (.)
<<<<<<< .merge_file_apVbWZ
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_tpKeSr
use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;

use function Safe\preg_match_all;

<<<<<<< .merge_file_ZD4zfl
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
<<<<<<< HEAD
=======
>>>>>>> .merge_file_6SIgjt
=======
<<<<<<< HEAD
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)

use function Safe\preg_match_all;

use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;

<<<<<<< HEAD
<<<<<<< .merge_file_apVbWZ
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_6SIgjt
=======
<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_tpKeSr
=======
>>>>>>> laraxot/dev
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
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
<<<<<<< .merge_file_ZD4zfl
<<<<<<< HEAD
        if ($log !== '' && File::exists(storage_path('logs/'.$log))) {
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_apVbWZ
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
        if ($log !== '' && File::exists(storage_path('logs/'.$log))) {
=======
        if ('' !== $log && File::exists(storage_path('logs/'.$log))) {
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
        if ('' !== $log && File::exists(storage_path('logs/'.$log))) {
>>>>>>> .merge_file_6SIgjt
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
        if ('' !== $log && File::exists(storage_path('logs/'.$log))) {
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
        if ($log !== '' && File::exists(storage_path('logs/'.$log))) {
>>>>>>> .merge_file_tpKeSr
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
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
