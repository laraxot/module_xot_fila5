<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Traits;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Str;
use Modules\Xot\Actions\GetTransKeyAction;
use Modules\Xot\Actions\Module\GetModulePathByGeneratorAction;
use Nwidart\Modules\Facades\Module;
use Pest\Support\Arr;

/**
 * Subset of TransTrait for navigation labels — avoids trans() collisions when composed with HasXotTable.
 */
trait TransFuncTrait
{
    public static function getKeyTransFunc(string $func): string
    {
        $key = Str::of($func)
            ->after('get')
            ->snake()
            ->replace('_', '.')
            ->toString();
        /** @var string $transKey */
        $transKey = app(GetTransKeyAction::class)->execute(static::class);

        $key = $transKey . '.' . $key;
        $key = Str::of($key)->replace('.cluster.pages.', '.')->toString();
        $key = Str::of($key)->replace('::edit_', '::')->toString();

        return $key;
    }

    public static function transFunc(string $func): string
    {
        
        $key = static::getKeyTransFunc($func);
        $trans = static::getTransFuncValue($key);
        return static::formatTransFuncResult($key, $trans);
    }

    /**
     * @return array<string, mixed>|string|int|null
     *
     * @phpstan-ignore missingType.iterableValue
     */
    protected static function getTransFuncValue(string $key): array|string|int|null
    {
        // use Lang::get to ensure Translator objects are not returned
        /** @var array<string, mixed>|string $trans */
        $trans = Lang::get($key);
        if ($trans != $key) {
            return $trans;
        }
        $moduleName = Str::before($key, '::');
        $item = Str::after($key, $moduleName . '::');
        $module = Module::find($moduleName);
        /** @var array<string, mixed>|string|int|null $res */
        $res = $module->trans($item);
        return $res;
    }

    protected static function formatTransFuncResult(string $key, mixed $trans): string
    {
        if (is_numeric($trans)) {
            return strval($trans);
        }

        if (is_array($trans)) {
            $first = current($trans);
            if (is_string($first) || is_numeric($first)) {
                return is_string($first) ? $first : (string) $first;
            }
        }

        if (is_string($trans)) {
            return $trans;
        }

        return $key;
    }
}
