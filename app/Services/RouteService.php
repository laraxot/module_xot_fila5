<?php

declare(strict_types=1);

namespace Modules\Xot\Services;

<<<<<<< .merge_file_uhoPNa
<<<<<<< HEAD
use Exception;
=======
=======
<<<<<<< .merge_file_VHRdI0
use Exception;
=======
<<<<<<< HEAD
use Exception;
=======
>>>>>>> .merge_file_CV7gq2
<<<<<<< .merge_file_UwaLub
<<<<<<< HEAD
use Exception;
=======
use function count;

>>>>>>> laraxot/dev
=======
use function count;

>>>>>>> .merge_file_4ZCbTA
>>>>>>> laraxot/dev
<<<<<<< .merge_file_uhoPNa
=======
>>>>>>> .merge_file_hWACuT
>>>>>>> .merge_file_CV7gq2
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

<<<<<<< .merge_file_uhoPNa
<<<<<<< HEAD
use function count;

=======
<<<<<<< .merge_file_UwaLub
<<<<<<< HEAD
use function count;

=======
=======
<<<<<<< .merge_file_VHRdI0
use function count;

=======
<<<<<<< HEAD
use function count;

=======
<<<<<<< .merge_file_UwaLub
<<<<<<< HEAD
use function count;

=======
>>>>>>> .merge_file_CV7gq2
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_4ZCbTA
>>>>>>> laraxot/dev
<<<<<<< .merge_file_uhoPNa
=======
>>>>>>> .merge_file_hWACuT
>>>>>>> .merge_file_CV7gq2
/**
 * Class RouteService.
 * Modules\Xot\Services\RouteService.
 *
 * @method string urlAct($params)
 */
class RouteService
{
    /**
<<<<<<< .merge_file_uhoPNa
<<<<<<< HEAD
     * @param  array<string, mixed>  $params
=======
<<<<<<< .merge_file_UwaLub
<<<<<<< HEAD
     * @param  array<string, mixed>  $params
=======
=======
<<<<<<< .merge_file_VHRdI0
     * @param  array<string, mixed>  $params
=======
<<<<<<< HEAD
     * @param  array<string, mixed>  $params
=======
<<<<<<< .merge_file_UwaLub
<<<<<<< HEAD
     * @param  array<string, mixed>  $params
=======
>>>>>>> .merge_file_CV7gq2
     * @param array<string, mixed> $params
     *
>>>>>>> laraxot/dev
=======
     * @param array<string, mixed> $params
     *
>>>>>>> .merge_file_4ZCbTA
>>>>>>> laraxot/dev
<<<<<<< .merge_file_uhoPNa
=======
>>>>>>> .merge_file_hWACuT
>>>>>>> .merge_file_CV7gq2
     * @return bool True se l'utente è in modalità amministrazione, false altrimenti
     */
    public static function inAdmin(array $params = []): bool
    {
        // Se il parametro in_admin è specificato, lo restituiamo direttamente
        if (isset($params['in_admin'])) {
            // Convertiamo qualsiasi valore a booleano
            return (bool) $params['in_admin'];
        }

        // Se il primo segmento dell'URL è 'admin', siamo in modalità amministrazione
<<<<<<< .merge_file_uhoPNa
<<<<<<< HEAD
        if (Request::segment(1) === 'admin') {
=======
<<<<<<< .merge_file_UwaLub
<<<<<<< HEAD
        if (Request::segment(1) === 'admin') {
=======
=======
<<<<<<< .merge_file_VHRdI0
        if (Request::segment(1) === 'admin') {
=======
<<<<<<< HEAD
        if (Request::segment(1) === 'admin') {
=======
<<<<<<< .merge_file_UwaLub
<<<<<<< HEAD
        if (Request::segment(1) === 'admin') {
=======
>>>>>>> .merge_file_CV7gq2
        if ('admin' === Request::segment(1)) {
>>>>>>> laraxot/dev
=======
        if ('admin' === Request::segment(1)) {
>>>>>>> .merge_file_4ZCbTA
>>>>>>> laraxot/dev
<<<<<<< .merge_file_uhoPNa
=======
>>>>>>> .merge_file_hWACuT
>>>>>>> .merge_file_CV7gq2
            return true;
        }

        // Verifichiamo un caso speciale per le richieste Livewire
        $segments = Request::segments();

        // Se abbiamo almeno un segmento, è 'livewire' e la sessione 'in_admin' è true
        return (is_countable($segments) ? \count($segments) : 0) > 0
<<<<<<< .merge_file_uhoPNa
=======
<<<<<<< .merge_file_VHRdI0
=======
>>>>>>> .merge_file_CV7gq2
<<<<<<< HEAD
=======
<<<<<<< .merge_file_UwaLub
<<<<<<< HEAD
>>>>>>> laraxot/dev
<<<<<<< .merge_file_uhoPNa
=======
>>>>>>> .merge_file_hWACuT
>>>>>>> .merge_file_CV7gq2
            && $segments[0] === 'livewire'
            && session('in_admin', false) === true;
    }

    /**
     * @param  array<string,string>  $params
<<<<<<< .merge_file_uhoPNa
=======
<<<<<<< .merge_file_VHRdI0
=======
>>>>>>> .merge_file_CV7gq2
<<<<<<< HEAD
=======
=======
=======
>>>>>>> .merge_file_4ZCbTA
            && 'livewire' === $segments[0]
            && true === session('in_admin', false);
    }

    /**
     * @param array<string,string> $params
<<<<<<< .merge_file_UwaLub
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_4ZCbTA
>>>>>>> laraxot/dev
<<<<<<< .merge_file_uhoPNa
=======
>>>>>>> .merge_file_hWACuT
>>>>>>> .merge_file_CV7gq2
     */
    public static function urlAct(array $params): string
    {
        $query = [];
        $act = 'show';
        $row = (object) [];
        extract($params);
        /*
         * $mutator = $act.'_url';
         * try {
         * $route = $row->$mutator;
         * } catch (\Exception $e) {
         * $route = '#';
         * }
         */
        $route_action = (string) Route::currentRouteAction();
        Str::snake(Str::after($route_action, '@'));
        // Cannot call method getName() on mixed.
        $routename = ''; // Request::route()->getName();
        $old_act_route = last(explode('.', $routename));
        if (! \is_string($old_act_route)) {
<<<<<<< .merge_file_uhoPNa
<<<<<<< HEAD
            throw new Exception('['.__LINE__.']['.class_basename(self::class).']');
=======
<<<<<<< .merge_file_UwaLub
<<<<<<< HEAD
            throw new Exception('['.__LINE__.']['.class_basename(self::class).']');
=======
=======
<<<<<<< .merge_file_VHRdI0
            throw new Exception('['.__LINE__.']['.class_basename(self::class).']');
=======
<<<<<<< HEAD
            throw new Exception('['.__LINE__.']['.class_basename(self::class).']');
=======
<<<<<<< .merge_file_UwaLub
<<<<<<< HEAD
            throw new Exception('['.__LINE__.']['.class_basename(self::class).']');
=======
>>>>>>> .merge_file_CV7gq2
            throw new \Exception('['.__LINE__.']['.class_basename(self::class).']');
>>>>>>> laraxot/dev
=======
            throw new \Exception('['.__LINE__.']['.class_basename(self::class).']');
>>>>>>> .merge_file_4ZCbTA
>>>>>>> laraxot/dev
<<<<<<< .merge_file_uhoPNa
=======
>>>>>>> .merge_file_hWACuT
>>>>>>> .merge_file_CV7gq2
        }

        $routename_act = Str::before($routename, $old_act_route).''.$act;
        $route_current = Route::current();
        $route_params = [];
        if ($route_current instanceof \Illuminate\Routing\Route) {
            $route_params = $route_current->parameters();
            $routename = $route_current->getName();
        }

        /*
         * try {
         * $route_params = optional(\Route::current())->parameters();
         * } catch (\Exception $e) {
         * $route_params = [];
         * }
         */
        if (Route::has($routename_act)) {
            $parz = array_merge($route_params, [$row]);
            $parz = array_merge($parz, $query);

            return route($routename_act, $parz);
        }

        return '#'.$routename_act;
    }

    // se n=0 => 'container0'
    // se n=1 => 'containers.container1'
    /**
<<<<<<< .merge_file_uhoPNa
=======
<<<<<<< .merge_file_VHRdI0
     * @param  array<string,string>  $params
=======
>>>>>>> .merge_file_CV7gq2
<<<<<<< HEAD
     * @param  array<string,string>  $params
=======
<<<<<<< .merge_file_UwaLub
<<<<<<< HEAD
     * @param  array<string,string>  $params
=======
     * @param array<string,string> $params
>>>>>>> laraxot/dev
=======
     * @param array<string,string> $params
>>>>>>> .merge_file_4ZCbTA
>>>>>>> laraxot/dev
<<<<<<< .merge_file_uhoPNa
=======
>>>>>>> .merge_file_hWACuT
>>>>>>> .merge_file_CV7gq2
     */
    public static function getRoutenameN(array $params): string
    {
        // default vars
        $n = 0;
        $act = 'show';
        extract($params);
        $tmp = [];
        // dddx(inAdmin());
        if (inAdmin($params)) {
            $tmp[] = 'admin';
        }

<<<<<<< .merge_file_uhoPNa
<<<<<<< HEAD
        for ($i = 0; $i <= $n; $i++) {
=======
=======
<<<<<<< .merge_file_VHRdI0
        for ($i = 0; $i <= $n; $i++) {
=======
<<<<<<< HEAD
        for ($i = 0; $i <= $n; $i++) {
=======
>>>>>>> .merge_file_CV7gq2
<<<<<<< .merge_file_UwaLub
<<<<<<< HEAD
        for ($i = 0; $i <= $n; $i++) {
=======
        for ($i = 0; $i <= $n; ++$i) {
>>>>>>> laraxot/dev
=======
        for ($i = 0; $i <= $n; ++$i) {
>>>>>>> .merge_file_4ZCbTA
>>>>>>> laraxot/dev
<<<<<<< .merge_file_uhoPNa
=======
>>>>>>> .merge_file_hWACuT
>>>>>>> .merge_file_CV7gq2
            $tmp[] = 'container'.$i;
        }

        $tmp[] = $act;

        return implode('.', $tmp);
    }

    /*
     * public static function urlRelatedPanel(array $params){
     * $act = 'show';
     * extract($params);
     * if (! isset($panel)) {
     * dddx(['err' => 'panel is missing']);
     *
     * return;
     * }
     * if (! isset($related_name)) {
     * dddx(['err' => 'related_name is missing']);
     *
     * return;
     * }
     * $parents = collect([]);
     * $panel_curr = $panel;
     *
     * while (null != $panel_curr->getParent()) {
     * $parents->prepend($panel_curr->getParent());
     * $panel_curr = $panel_curr->getParent();
     * }
     * $container_root = $panel->getRow();
     * if ($parents->count() > 0) {
     *
     * //$tmp='['.$parents->count().']';
     * //foreach($parents as $parent){
     * //    $tmp.=$parent->getRow()->post_type.'-';
     * //}
     * //return $tmp;
     *
     * $container_root = $parents->first()?->row;
     * }
     *
     * //$containers_class = self::getContainersClass();
     * //$n = collect($containers_class)->search(get_class($container_root));
     * //if (null === $n) {
     * //    $n = 0;
     * //}
     *
     * $n = 0;
     *
     * $route_name = self::getRoutenameN(['n' => $n + 1 + $parents->count(), 'act' => $act]);
     * $route_current = \Route::current();
     * $route_params = is_object($route_current) ? $route_current->parameters() : [];
     *
     * $i = 0;
     * foreach ($parents as $parent) {
     * $route_params['container'.($n + $i)] = $parent->postType();
     * $route_params['item'.($n + $i)] = $parent->guid();
     * ++$i;
     * }
     * $route_params['container'.($n + $i)] = $panel->postType();
     * $route_params['item'.($n + $i)] = $panel->guid();
     * ++$i;
     * $route_params['container'.($n + $i)] = $related_name;
     *
     * $route_params['page'] = 1;
     * $route_params['_act'] = '';
     * unset($route_params['_act']);
     * try {
     * $url = str_replace(url(''), '', route($route_name, $route_params));
     * } catch (\Exception $e) {
     * if (request()->input('debug', false)) {
     * dd([
     * 'route_name' => $route_name,
     * 'route_params' => $route_params,
     * 'line' => __LINE__,
     * 'file' => __FILE__,
     * 'e' => $e->getMessage(),
     * ]);
     * }
     *
     * return '#['.__LINE__.']['.class_basename($this).']';
     * }
     *
     * return $url;
     * }
     */
    /**
<<<<<<< .merge_file_uhoPNa
<<<<<<< HEAD
     * @param  array<string,string>  $params
=======
<<<<<<< .merge_file_UwaLub
<<<<<<< HEAD
     * @param  array<string,string>  $params
=======
=======
<<<<<<< .merge_file_VHRdI0
     * @param  array<string,string>  $params
=======
<<<<<<< HEAD
     * @param  array<string,string>  $params
=======
<<<<<<< .merge_file_UwaLub
<<<<<<< HEAD
     * @param  array<string,string>  $params
=======
>>>>>>> .merge_file_CV7gq2
     * @param array<string,string> $params
>>>>>>> laraxot/dev
=======
     * @param array<string,string> $params
>>>>>>> .merge_file_4ZCbTA
>>>>>>> laraxot/dev
<<<<<<< .merge_file_uhoPNa
=======
>>>>>>> .merge_file_hWACuT
>>>>>>> .merge_file_CV7gq2
     */
    public static function urlLang(array $params = []): string
    {
        extract($params);

        return '?';

        /*
         * return '?'.$lang; //da fixare dopo
         * //$row=$this->row;
         * //$row->lang=$lang;
         * //return '/wip'.$this->url();
         * $route_name = \Route::currentRouteName();
         * $route_params = optional(\Route::current())->parameters();
         * $route_params['lang'] = $lang;
         * [$containers, $items] = params2ContainerItem($route_params);
         * $n_items = count($items);
         * //dddx($n_items);//1
         * //dddx($route_name); containers.show
         * for ($i = 0; $i < $n_items; ++$i) {
         * $v = $items[$i];
         * if (method_exists($v, 'postLang')) {
         * $tmp = $v->postLang($lang)->first();
         * if (is_object($tmp)) {
         * $guid = $tmp->guid;
         * } else {
         * $guid = '#';
         * //dddx(app()->getLocale());
         * $v_post = $v->post;
         * if (null == $v_post) {
         * break;
         * }
         * $new_post = $v_post->replicate();
         * $fields = ['title', 'subtitle', 'txt', 'meta_description', 'meta_keywords'];
         * foreach ($fields as $field) {
         * $trans = ImportService::trans(['q' => $new_post->$field, 'from' => app()->getLocale(), 'to' => $lang]);
         *
         * //dddx([
         * //    'from'=>app()->getLocale(),
         * //    'to'=>$lang,
         * //    'trans'=>$trans,
         *
         * //]);
         *
         * $new_post->$field = $trans;
         * }
         * $new_post->lang = $lang;
         * $new_post->save();
         * $guid = $new_post->guid;
         * }
         * } else {
         * $route_key_name = $v->getRouteKeyName();
         * $guid = $v->$route_key_name;
         * }
         *
         * $route_params['item'.$i] = $guid;
         * //dddx($route_params['item'.$i]->guidLang);
         * }
         * //dddx($route_params);
         * //return '/wip['.__LINE__.']['.class_basename($this).']';
         * try {
         * return route($route_name, $route_params);
         * } catch (\Exception $e) {
         * return url($lang);
         * }
         */
    }

    /**
     * Function getAct.
     *
<<<<<<< .merge_file_uhoPNa
<<<<<<< HEAD
     * @throws Exception
=======
<<<<<<< .merge_file_UwaLub
<<<<<<< HEAD
     * @throws Exception
=======
=======
<<<<<<< .merge_file_VHRdI0
     * @throws Exception
=======
<<<<<<< HEAD
     * @throws Exception
=======
<<<<<<< .merge_file_UwaLub
<<<<<<< HEAD
     * @throws Exception
=======
>>>>>>> .merge_file_CV7gq2
     * @throws \Exception
>>>>>>> laraxot/dev
=======
     * @throws \Exception
>>>>>>> .merge_file_4ZCbTA
>>>>>>> laraxot/dev
<<<<<<< .merge_file_uhoPNa
=======
>>>>>>> .merge_file_hWACuT
>>>>>>> .merge_file_CV7gq2
     */
    public static function getAct(): string
    {
        $route_action = Route::currentRouteAction();
<<<<<<< .merge_file_uhoPNa
<<<<<<< HEAD
        if ($route_action === null) {
            throw new Exception('$route_action is null');
=======
<<<<<<< .merge_file_UwaLub
<<<<<<< HEAD
        if ($route_action === null) {
            throw new Exception('$route_action is null');
=======
=======
<<<<<<< .merge_file_VHRdI0
        if ($route_action === null) {
            throw new Exception('$route_action is null');
=======
<<<<<<< HEAD
        if ($route_action === null) {
            throw new Exception('$route_action is null');
=======
<<<<<<< .merge_file_UwaLub
<<<<<<< HEAD
        if ($route_action === null) {
            throw new Exception('$route_action is null');
=======
>>>>>>> .merge_file_CV7gq2
        if (null === $route_action) {
            throw new \Exception('$route_action is null');
>>>>>>> laraxot/dev
=======
        if (null === $route_action) {
            throw new \Exception('$route_action is null');
>>>>>>> .merge_file_4ZCbTA
>>>>>>> laraxot/dev
<<<<<<< .merge_file_uhoPNa
=======
>>>>>>> .merge_file_hWACuT
>>>>>>> .merge_file_CV7gq2
        }

        $act = Str::after($route_action, '@');

        // --- i prossimi 2 if son per i controller con metodo invoke
        if (Str::contains($act, '\\')) {
            $act = Str::afterLast($act, '\\');
        }

        if (Str::endsWith($act, 'Controller')) {
            $act = Str::before($act, 'Controller');
        }

        return Str::snake($act);
    }

    /**
     * Function.
     *
<<<<<<< .merge_file_uhoPNa
=======
<<<<<<< .merge_file_VHRdI0
     * @throws Exception
=======
>>>>>>> .merge_file_CV7gq2
<<<<<<< HEAD
     * @throws Exception
=======
<<<<<<< .merge_file_UwaLub
<<<<<<< HEAD
     * @throws Exception
=======
     * @throws \Exception
>>>>>>> laraxot/dev
=======
     * @throws \Exception
>>>>>>> .merge_file_4ZCbTA
>>>>>>> laraxot/dev
<<<<<<< .merge_file_uhoPNa
=======
>>>>>>> .merge_file_hWACuT
>>>>>>> .merge_file_CV7gq2
     */
    public static function getModuleName(): string
    {
        $route_action = Route::currentRouteAction();
<<<<<<< .merge_file_uhoPNa
<<<<<<< HEAD
        if ($route_action === null) {
            throw new Exception('$route_action is null');
=======
<<<<<<< .merge_file_UwaLub
=======
<<<<<<< .merge_file_VHRdI0
        if ($route_action === null) {
            throw new Exception('$route_action is null');
=======
>>>>>>> .merge_file_CV7gq2
<<<<<<< HEAD
        if ($route_action === null) {
            throw new Exception('$route_action is null');
=======
<<<<<<< .merge_file_uhoPNa
=======
<<<<<<< .merge_file_UwaLub
<<<<<<< HEAD
        if ($route_action === null) {
            throw new Exception('$route_action is null');
=======
>>>>>>> .merge_file_CV7gq2
        if (null === $route_action) {
            throw new \Exception('$route_action is null');
>>>>>>> laraxot/dev
=======
        if (null === $route_action) {
            throw new \Exception('$route_action is null');
>>>>>>> .merge_file_4ZCbTA
>>>>>>> laraxot/dev
<<<<<<< .merge_file_uhoPNa
=======
>>>>>>> .merge_file_hWACuT
>>>>>>> .merge_file_CV7gq2
        }

        return Str::between($route_action, 'Modules\\', '\Http');
    }

    /**
     * Function.
     *
<<<<<<< .merge_file_uhoPNa
=======
<<<<<<< .merge_file_VHRdI0
     * @throws Exception
=======
>>>>>>> .merge_file_CV7gq2
<<<<<<< HEAD
     * @throws Exception
=======
<<<<<<< .merge_file_UwaLub
<<<<<<< HEAD
     * @throws Exception
=======
     * @throws \Exception
>>>>>>> laraxot/dev
=======
     * @throws \Exception
>>>>>>> .merge_file_4ZCbTA
>>>>>>> laraxot/dev
<<<<<<< .merge_file_uhoPNa
=======
>>>>>>> .merge_file_hWACuT
>>>>>>> .merge_file_CV7gq2
     */
    public static function getControllerName(): string
    {
        $route_action = Route::currentRouteAction();
<<<<<<< .merge_file_uhoPNa
=======
<<<<<<< .merge_file_VHRdI0
        if ($route_action === null) {
            throw new Exception('$route_action is null');
=======
>>>>>>> .merge_file_CV7gq2
<<<<<<< HEAD
        if ($route_action === null) {
            throw new Exception('$route_action is null');
=======
<<<<<<< .merge_file_UwaLub
<<<<<<< HEAD
        if ($route_action === null) {
            throw new Exception('$route_action is null');
=======
        if (null === $route_action) {
            throw new \Exception('$route_action is null');
>>>>>>> laraxot/dev
=======
        if (null === $route_action) {
            throw new \Exception('$route_action is null');
>>>>>>> .merge_file_4ZCbTA
>>>>>>> laraxot/dev
<<<<<<< .merge_file_uhoPNa
=======
>>>>>>> .merge_file_hWACuT
>>>>>>> .merge_file_CV7gq2
        }

        return Str::between($route_action, 'Http\Controllers\\', 'Controller');
    }

    public static function getView(): string
    {
        $controllerName = self::getControllerName();
        $tmp_arr = explode('\\', $controllerName);

        $routeCurrent = Route::current();
        /** @var array<string, mixed> $params */
        $params = $routeCurrent instanceof \Illuminate\Routing\Route ? $routeCurrent->parameters() : [];
        [$containers] = params2ContainerItem($params);

        $params['containers'] = implode('.', array_map(
            static fn (mixed $value): string => is_scalar($value) ? (string) $value : '',
            array_values($containers),
        ));

        return collect($tmp_arr)
            ->filter(static fn (string $item): bool => ! \in_array($item, ['Module', 'Item'], false))
            ->map(static function (string $item) use ($params): string {
                $item = Str::snake($item);
                $value = $params[$item] ?? $item;

                return is_scalar($value) ? (string) $value : $item;
            })
            ->implode('.');
    }
}
