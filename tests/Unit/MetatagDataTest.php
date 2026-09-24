<?php

declare(strict_types=1);
<<<<<<< HEAD
use Modules\Xot\Actions\PaDesignColorsAction;
=======

use Modules\Xot\Actions\Design\GetPaFilamentPaletteAction;
>>>>>>> 8d801bbe (Check & fix styling)
use Modules\Xot\Datas\MetatagData;
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

test('MetatagData puo essere istanziata', function () {
<<<<<<< .merge_file_LyKWW5
<<<<<<< HEAD
<<<<<<< HEAD
    $metatagData = new MetatagData;
=======
    $metatagData = new MetatagData();
>>>>>>> laraxot/dev
=======
    $metatagData = new MetatagData();
>>>>>>> 8d801bbe (Check & fix styling)
=======
    $metatagData = new MetatagData;
>>>>>>> .merge_file_bepvJ8
    Assert::assertInstanceOf(MetatagData::class, $metatagData);
});

test('getFilamentColors restituisce i colori Filament corretti', function (): void {
<<<<<<< .merge_file_LyKWW5
<<<<<<< HEAD
<<<<<<< HEAD
    $metatagData = new MetatagData;
=======
    $metatagData = new MetatagData();
>>>>>>> laraxot/dev
=======
    $metatagData = new MetatagData();
>>>>>>> 8d801bbe (Check & fix styling)
=======
    $metatagData = new MetatagData;
>>>>>>> .merge_file_bepvJ8
    $colors = $metatagData->getFilamentColors();

    Assert::assertArrayHasKey('danger', $colors);
    Assert::assertArrayHasKey('gray', $colors);
    Assert::assertArrayHasKey('info', $colors);
    Assert::assertArrayHasKey('primary', $colors);
    Assert::assertArrayHasKey('success', $colors);
    Assert::assertArrayHasKey('warning', $colors);
    Assert::assertIsString($colors['primary'][600] ?? null);
<<<<<<< HEAD
    Assert::assertEquals(app(PaDesignColorsAction::class)->filamentPalette(), $colors);
});

test('getColors gestisce correttamente i colori personalizzati', function () {
    $metatagData = new MetatagData;
<<<<<<< .merge_file_LyKWW5
=======
    $metatagData = new MetatagData();
>>>>>>> laraxot/dev
=======
    Assert::assertEquals(app(GetPaFilamentPaletteAction::class)->execute(), $colors);
});

test('getColors gestisce correttamente i colori personalizzati', function () {
    $metatagData = new MetatagData();
>>>>>>> 8d801bbe (Check & fix styling)
=======
>>>>>>> .merge_file_bepvJ8
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

<<<<<<< HEAD
    $colors = $metatagData->colors;
=======
    $colors = $metatagData->getColors();
>>>>>>> 8d801bbe (Check & fix styling)

    Assert::assertArrayHasKey('custom_color', $colors);
    Assert::assertArrayHasKey('primary', $colors);
});

test('getLogoHeight restituisce il valore corretto', function () {
<<<<<<< .merge_file_LyKWW5
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> .merge_file_bepvJ8
    $metatagData = new MetatagData;
    $metatagData->logo_height = '3em';

    Assert::assertSame('3em', $metatagData->getBrandLogoHeight());
});

test('Le proprieta hanno i valori di default corretti', function () {
    $metatagData = new MetatagData;
<<<<<<< .merge_file_LyKWW5
=======
    $metatagData = new MetatagData();
>>>>>>> laraxot/dev
=======
    $metatagData = new MetatagData();
    $metatagData->logo_height = '3em';

    Assert::assertSame('3em', $metatagData->getLogoHeight());
});

test('Le proprieta hanno i valori di default corretti', function () {
    $metatagData = new MetatagData();
>>>>>>> 8d801bbe (Check & fix styling)
=======
>>>>>>> .merge_file_bepvJ8

    Assert::assertSame('xot', $metatagData->generator);
    Assert::assertSame('UTF-8', $metatagData->charset);
    Assert::assertSame('xot', $metatagData->author);
    Assert::assertSame('2em', $metatagData->logo_height);
    Assert::assertSame('/favicon.ico', $metatagData->favicon);
});
