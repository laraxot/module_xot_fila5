<?php

declare(strict_types=1);

namespace Modules\Xot\Actions;

use Illuminate\Support\Str;
use Modules\Xot\Actions\File\FixPathAction;
use Spatie\QueueableAction\QueueableAction;

class GetViewAction
{
    use QueueableAction;

    /**
     * Summary of execute.
     *
<<<<<<< .merge_file_kuvbis
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> .merge_file_fKZXbd
     *
     * @return view-string
     *
     * @throws \Exception
     */
    public function execute(string $tpl = '', string $file0 = ''): string
    {
        if ($file0 === '') {
<<<<<<< .merge_file_kuvbis
=======
=======
>>>>>>> 8d801bbe (Check & fix styling)
     * @throws \Exception
     *
     * @return view-string
     */
    public function execute(string $tpl = '', string $file0 = ''): string
    {
        if ('' === $file0) {
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 8d801bbe (Check & fix styling)
=======
>>>>>>> .merge_file_fKZXbd
            $backtrace = debug_backtrace();
            $file0 = app(FixPathAction::class)->execute($backtrace[0]['file'] ?? '');
        }

        $file0 = Str::after($file0, base_path());
        $arr = explode(DIRECTORY_SEPARATOR, $file0);
<<<<<<< .merge_file_kuvbis
<<<<<<< HEAD
<<<<<<< HEAD
        if ($arr[0] === '') {
=======
        if ('' === $arr[0]) {
>>>>>>> laraxot/dev
=======
        if ('' === $arr[0]) {
>>>>>>> 8d801bbe (Check & fix styling)
=======
        if ($arr[0] === '') {
>>>>>>> .merge_file_fKZXbd
            $arr = array_slice($arr, 1);
            $arr = array_values($arr);
        }

        $mod = $arr[1];
        // $tmp = array_slice($arr, 3);//senza "app"
        $tmp = array_slice($arr, 4); // con "app"

        $tmp = collect($tmp)
<<<<<<< HEAD
            ->map(static function (string $item) {
=======
            ->map(static function ($item) {
>>>>>>> 8d801bbe (Check & fix styling)
                $item = str_replace('.php', '', $item);

                return Str::slug(Str::snake($item));
            })
            ->implode('.');

        $pub_view = 'pub_theme::'.$tmp;
        // $pub_view è sempre stringa perché costruita da stringhe

<<<<<<< .merge_file_kuvbis
<<<<<<< HEAD
<<<<<<< HEAD
        if ($tpl !== '') {
=======
        if ('' !== $tpl) {
>>>>>>> laraxot/dev
=======
        if ('' !== $tpl) {
>>>>>>> 8d801bbe (Check & fix styling)
=======
        if ($tpl !== '') {
>>>>>>> .merge_file_fKZXbd
            $pub_view .= '.'.$tpl;
        }
        // PHPStan: $pub_view è sempre non-falsy-string, Assert ridondante rimosso
        if (view()->exists($pub_view)) {
            return $pub_view;
        }

        $view = Str::lower($mod).'::'.$tmp;

<<<<<<< .merge_file_kuvbis
<<<<<<< HEAD
<<<<<<< HEAD
        if ($tpl !== '') {
=======
        if ('' !== $tpl) {
>>>>>>> laraxot/dev
=======
        if ('' !== $tpl) {
>>>>>>> 8d801bbe (Check & fix styling)
=======
        if ($tpl !== '') {
>>>>>>> .merge_file_fKZXbd
            $view .= '.'.$tpl;
        }

        // if (inAdmin()) {
        if (Str::contains($view, '::panels.actions.')) {
            $to = '::'.(inAdmin() ? 'admin.' : '').'home.acts.';
            $view = Str::replace('::panels.actions.', $to, $view);
            $view = Str::replace('-action', '', $view);
        }

        // }
        // $view è sempre stringa perché costruita da stringhe
        if (! view()->exists($view)) {
            throw new \Exception('View ['.$view.'] not found');
        }

        return $view;
    }
}
