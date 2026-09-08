<?php

declare(strict_types=1);

namespace Modules\Xot\View\Components\Dashboard;

<<<<<<< HEAD
use Illuminate\Contracts\Support\Renderable;
=======
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\View as ViewFacade;
>>>>>>> c7fd73eb (.)
use Illuminate\View\Component;

// use Modules\Xot\View\Components\XotBaseComponent;

/**
 * Class Field.
 */
class Item extends Component
{
<<<<<<< HEAD
    public function render(): Renderable
    {
        /**
         * @phpstan-var view-string
         */
        $view = 'xot::components.dashboard.item';
=======
    public function render(): View
    {
        /** @var string $view */
        $view = 'xot::components.dashboard.item';
        /** @var array<string, string> $view_params */
>>>>>>> c7fd73eb (.)
        $view_params = [
            'view' => $view,
        ];

<<<<<<< HEAD
        return view($view, $view_params);
=======
        return ViewFacade::make($view, $view_params);
>>>>>>> c7fd73eb (.)
    }
}
