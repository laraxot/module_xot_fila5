<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Artisan;

<<<<<<< HEAD
use Illuminate\Support\Facades\Route;
use Spatie\QueueableAction\QueueableAction;
=======
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Route;
use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;
>>>>>>> laraxot/dev

/**
 * Replaces Modules\Xot\Services\ArtisanService::showRouteList().
 */
class ShowArtisanRouteListAction
{
    use QueueableAction;

    public function execute(): string
    {
        $routeCollection = Route::getRoutes();

<<<<<<< HEAD
        /**
         * @phpstan-var view-string
         */
=======
>>>>>>> laraxot/dev
        $view = 'xot::acts.artisan.show_route_list';
        $view_params = [
            'view' => $view,
            'routeCollection' => $routeCollection,
            'lang' => app()->getLocale(),
        ];

<<<<<<< HEAD
        return view($view, $view_params)->render();
=======
        $result = view($view, $view_params);
        Assert::isInstanceOf($result, View::class);

        return $result->render();
>>>>>>> laraxot/dev
    }
}
