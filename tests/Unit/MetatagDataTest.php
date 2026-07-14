<?php

declare(strict_types=1);

<<<<<<< HEAD
use Modules\Xot\Actions\PaDesignColorsAction;
use Modules\Xot\Datas\MetatagData;
=======
use Modules\Xot\Datas\MetatagData;
<<<<<<< HEAD
use Modules\Xot\Support\PaDesignColors;
>>>>>>> 64619e34 (.)
=======
use Modules\Xot\Actions\PaDesignColorsAction;
>>>>>>> 61938ca4 (delete .claude-audit/)
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;

/*
 * Test che la classe MetatagData possa essere istanziata correttamente.
 * Questo test verifica che la classe possa essere istanziata senza errori.
 */
test('MetatagData può essere istanziata', function () {
    $metatagData = new MetatagData();
    expect($metatagData)->toBeInstanceOf(MetatagData::class);
});

/*
 * Test che il metodo getFilamentColors() restituisca i colori corretti.
 * Questo test verifica che il metodo getFilamentColors() restituisca un array
 * con i colori Filament corretti.
 */
test('getFilamentColors restituisce i colori Filament corretti', function () {
    $metatagData = new MetatagData();
    $colors = $metatagData->getFilamentColors();

    Assert::assertArrayHasKey('danger', $colors);
    Assert::assertArrayHasKey('gray', $colors);
    Assert::assertArrayHasKey('info', $colors);
    Assert::assertArrayHasKey('primary', $colors);
    Assert::assertArrayHasKey('success', $colors);
    Assert::assertArrayHasKey('warning', $colors);
    Assert::assertIsString($colors['primary'][600] ?? null);
<<<<<<< HEAD
<<<<<<< HEAD
    Assert::assertEquals(app(PaDesignColorsAction::class)->filamentPalette(), $colors);
=======
    Assert::assertEquals(PaDesignColors::filamentPalette(), $colors);
>>>>>>> 64619e34 (.)
=======
    Assert::assertEquals(app(PaDesignColorsAction::class)->filamentPalette(), $colors);
>>>>>>> 61938ca4 (delete .claude-audit/)
});

/*
 * Test che il metodo getColors() gestisca correttamente i colori personalizzati.
 * Questo test verifica che il metodo getColors() gestisca correttamente i colori
 * personalizzati quando l'array colors contiene valori personalizzati.
 */
test('getColors gestisce correttamente i colori personalizzati', function () {
    $metatagData = new MetatagData();
    $metatagData->colors = [
        'custom_color' => [
            'key' => 'custom_color',
            'color' => 'custom',
            'hex' => '#FF5500',
        ],
        'primary' => [
            'key' => 'primary',
            'color' => 'amber',
        ],
    ];

    $colors = $metatagData->getColors();

    expect($colors)->toBeArray()->and($colors)->toHaveKey('custom_color')->and($colors)->toHaveKey('primary');
});

/*
 * Test che il metodo getLogoHeight() restituisca il valore corretto.
 * Questo test verifica che il metodo getLogoHeight() restituisca il valore
 * della proprietà logo_height.
 */
test('getLogoHeight restituisce il valore corretto', function () {
    $metatagData = new MetatagData();
    $metatagData->logo_height = '3em';

    expect($metatagData->getLogoHeight())->toBe('3em');
});

/*
 * Test che le proprietà della classe abbiano i valori di default corretti.
 * Questo test verifica che le proprietà della classe abbiano i valori di default
 * corretti quando viene istanziata la classe.
 */
test('Le proprietà hanno i valori di default corretti', function () {
    $metatagData = new MetatagData();

    expect($metatagData->generator)
        ->toBe('xot')
        ->and($metatagData->charset)
        ->toBe('UTF-8')
        ->and($metatagData->author)
        ->toBe('xot')
        ->and($metatagData->logo_height)
        ->toBe('2em')
        ->and($metatagData->favicon)
        ->toBe('/favicon.ico');
});
