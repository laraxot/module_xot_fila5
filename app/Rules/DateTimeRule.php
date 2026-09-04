<?php

declare(strict_types=1);

namespace Modules\Xot\Rules;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Carbon;
use Illuminate\Translation\PotentiallyTranslatedString;

/**
 * Class DateTimeRule.
 */
class DateTimeRule implements ValidationRule
{
    /**
     * @param  \Closure(string, ?string=): PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, \Closure $fail): void
    {
        if (! is_string($value)) {
            $fail('The :attribute is not a valid datetime');

            return;
        }

        $format = 'd/m/Y H:i';
        try {
            Carbon::createFromFormat($format, $value);
        } catch (\Exception) {
            $fail('The :attribute is not a valid datetime');
        }
    }

    /**
     * @deprecated Implementa {@see ValidationRule} — mantenuto per compatibilità call site legacy.
     */
    public function passes(mixed $attribute, mixed $value): bool
    {
        if (! is_string($value)) {
            return false;
        }

        $format = 'd/m/Y H:i';
        try {
            Carbon::createFromFormat($format, $value);
        } catch (\Exception) {
            return false;
        }

        return true;
    }

    public function message(): string
    {
        return 'The :attribute is not a valid datetime';
    }
}
