<?php

declare(strict_types=1);

namespace Modules\Xot\Actions;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\View as ViewFacade;
use Illuminate\Support\Str;
use Spatie\QueueableAction\QueueableAction;

/**
 * Classe per ottenere una vista basata su una classe.
 */
class GetViewByClassAction
{
    use QueueableAction;

    /**
     * Ottiene una vista basata su una classe.
     *
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  string  $class  Nome della classe
     * @param  array<string, mixed>  $params  Parametri da passare alla vista
     * @param  string|null  $viewName  Nome personalizzato della vista
=======
     * @param string               $class    Nome della classe
     * @param array<string, mixed> $params   Parametri da passare alla vista
     * @param string|null          $viewName Nome personalizzato della vista
>>>>>>> laraxot/dev
=======
     * @param string               $class    Nome della classe
     * @param array<string, mixed> $params   Parametri da passare alla vista
     * @param string|null          $viewName Nome personalizzato della vista
>>>>>>> 8d801bbe (Check & fix styling)
     */
    public function execute(string $class, array $params = [], ?string $viewName = null): View
    {
        $viewName ??= $this->getViewNameFromClass($class);
<<<<<<< HEAD
<<<<<<< HEAD
        /** @var view-string $viewName */
=======
        /* @var view-string $viewName */
>>>>>>> laraxot/dev
=======
        /* @var view-string $viewName */
>>>>>>> 8d801bbe (Check & fix styling)

        return ViewFacade::make($viewName, $params);
    }

    /**
     * Risolve il percorso della view basato sul namespace della classe.
     *
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  string  $class  Il nome completo della classe
=======
     * @param string $class Il nome completo della classe
     *
>>>>>>> laraxot/dev
=======
     * @param string $class Il nome completo della classe
     *
>>>>>>> 8d801bbe (Check & fix styling)
     * @return string Il percorso della view
     */
    public function executeOld(string $class): string
    {
        /** @var list<string> $arr PHPStan knows explode always returns array */
        $arr = explode('\\', $class);

        // Verifica che la classe sia nel namespace Modules
<<<<<<< HEAD
<<<<<<< HEAD
        if ($arr[0] !== 'Modules') {
=======
        if ('Modules' !== $arr[0]) {
>>>>>>> laraxot/dev
=======
        if ('Modules' !== $arr[0]) {
>>>>>>> 8d801bbe (Check & fix styling)
            throw new \InvalidArgumentException('Class must be in Modules namespace');
        }

        $module = $arr[1];
        $module_low = Str::lower($module);

        // Estrai il nome della classe e convertilo in kebab-case
        $class_name = Str::kebab(class_basename($class));

        // Costruisci il percorso della view
        return $module_low.'::pages.'.$class_name;
    }

    /**
     * Ottiene il nome della vista dal nome della classe.
     *
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  string  $class  Nome della classe
=======
     * @param string $class Nome della classe
>>>>>>> laraxot/dev
=======
     * @param string $class Nome della classe
>>>>>>> 8d801bbe (Check & fix styling)
     */
    protected function getViewNameFromClass(string $class): string
    {
        $parts = explode('\\', $class);
        $className = end($parts);

        return Str::kebab($className);
    }
}
