<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Unit;

use Illuminate\Support\Facades\Validator;
use Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

/**
 * Il 2026-10-13 si e' visto che in italiano, tedesco e spagnolo il validatore di Laravel restituiva la chiave grezza
 * (`validation.required`) invece del messaggio: la cartella `laravel/lang` non aveva il gruppo `validation` (solo l'inglese, che
 * arriva dal framework) mentre `Modules/Xot/lang/<lingua>/validation.php` ha gia' il set completo. Un cittadino italiano che
 * sbaglia un campo non deve leggere una chiave.
 */
it('translates the validation group instead of returning the raw key', function (string $locale, string $rule, string $value): void {
    app()->setLocale($locale);

    $message = Validator::make(['campo' => $value], ['campo' => $rule])->errors()->first('campo');

    Assert::assertNotSame('', $message);
    Assert::assertStringNotContainsString('validation.', $message, "Messaggio non tradotto in '{$locale}': {$message}");
})->with(function (): array {
    $cases = [];
    foreach (['it', 'en', 'de', 'es'] as $locale) {
        $cases["{$locale} required"] = [$locale, 'required', ''];
        $cases["{$locale} numeric"] = [$locale, 'numeric', 'abc'];
        $cases["{$locale} accepted"] = [$locale, 'accepted', 'no'];
    }

    return $cases;
});
