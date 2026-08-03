<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Traits;

use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Str;
use Modules\Xot\Actions\GetTransKeyAction;

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

        $key = $transKey.'.'.$key;
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
     * @return string|array<string, mixed>|null
     *
     * @phpstan-ignore missingType.iterableValue
     */
    protected static function getTransFuncValue(string $key): array|string|null
    {
        // use Lang::get to ensure Translator objects are not returned
        /** @var array<string, mixed>|string $trans */
        $trans = Lang::get($key);

        return $trans;
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
