<?php

declare(strict_types=1);

namespace Modules\Xot\View\Components;

<<<<<<< HEAD
use InvalidArgumentException;
=======
>>>>>>> c7fd73eb (.)
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Str;
use Illuminate\View\Component as IlluminateComponent;

/**
 * Class XotBaseComponent.
 */
abstract class XotBaseComponent extends IlluminateComponent
{
    /**
     * Undocumented variable.
     *
<<<<<<< HEAD
     * @var array<mixed>
=======
     * @var array<string, mixed>
>>>>>>> c7fd73eb (.)
     */
    public array $attrs = [];

    /**
     * Summary of assets.
     *
     * @var list<string>
     */
    protected static array $assets = [];

    /**
     * Cache for resolved views.
     *
<<<<<<< HEAD
     * @var array<string, view-string>
=======
     * @var array<string, string>
>>>>>>> c7fd73eb (.)
     */
    protected static array $viewCache = [];

    /**
     * Summary of assets.
     *
     * @return list<string>
     */
    public static function assets(): array
    {
        return static::$assets;
    }

    /**
<<<<<<< HEAD
     * Summary of getView.
     *
     * @return view-string
=======
     * Get the view name for this component.
>>>>>>> c7fd73eb (.)
     */
    public function getView(): string
    {
        $class = static::class;

        if (isset(self::$viewCache[$class])) {
            return self::$viewCache[$class];
        }

<<<<<<< HEAD
        $module_name = Str::between($class, 'Modules\\', '\Views\\');
=======
        $module_name = Str::between($class, 'Modules\\', '\\Views\\');
        if ('' === $module_name) {
            throw new \InvalidArgumentException("Unable to determine module name from class [{$class}].");
        }

>>>>>>> c7fd73eb (.)
        $module_name_low = Str::lower($module_name);

        $comp_name = Str::after($class, '\View\Components\\');
        $comp_name = str_replace('\\', '.', $comp_name);
        $comp_name = Str::snake($comp_name);

<<<<<<< HEAD
        $view = $module_name_low . '::components.' . $comp_name;
        $view = str_replace('._', '.', $view);

        if (!view()->exists($view)) {
            throw new InvalidArgumentException("View [{$view}] does not exist.");
        }
=======
        $view = $module_name_low.'::components.'.$comp_name;
        $view = str_replace('._', '.', $view);

        if (! view()->exists($view)) {
            throw new \InvalidArgumentException("View [{$view}] does not exist.");
        }

>>>>>>> c7fd73eb (.)
        self::$viewCache[$class] = $view;

        return $view;
    }

    // ret \Closure|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Support\Htmlable|\Illuminate\Contracts\View\Factory|View|string

    public function render(): Renderable
    {
        $view = $this->getView();
<<<<<<< HEAD
=======
        /** @var view-string $view */
>>>>>>> c7fd73eb (.)
        $view_params = [
            'view' => $view,
        ];

        return view($view, $view_params);
    }
}
