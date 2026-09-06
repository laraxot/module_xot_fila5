<?php

declare(strict_types=1);

use Modules\Xot\Actions\PaDesignColorsAction;
use Modules\Xot\Datas\MetatagData;
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;

<<<<<<< HEAD
uses(TestCase::class);

test('MetatagData puo essere istanziata', function () {
    $metatagData = new MetatagData;
=======
uses(\Modules\Xot\Tests\TestCase::class);

test('MetatagData puo essere istanziata', function () {
    $metatagData = new MetatagData();
>>>>>>> 7f6cf6be (.)
    Assert::assertInstanceOf(MetatagData::class, $metatagData);
});

test('getFilamentColors restituisce i colori Filament corretti', function (): void {
<<<<<<< HEAD
    $metatagData = new MetatagData;
=======
    $metatagData = new MetatagData();
>>>>>>> 7f6cf6be (.)
    $colors = $metatagData->getFilamentColors();

    Assert::assertArrayHasKey('danger', $colors);
    Assert::assertArrayHasKey('gray', $colors);
    Assert::assertArrayHasKey('info', $colors);
    Assert::assertArrayHasKey('primary', $colors);
    Assert::assertArrayHasKey('success', $colors);
    Assert::assertArrayHasKey('warning', $colors);
    Assert::assertIsString($colors['primary'][600] ?? null);
    Assert::assertEquals(app(PaDesignColorsAction::class)->filamentPalette(), $colors);
});

test('getColors gestisce correttamente i colori personalizzati', function () {
<<<<<<< HEAD
    $metatagData = new MetatagData;
=======
    $metatagData = new MetatagData();
>>>>>>> 7f6cf6be (.)
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
>>>>>>> 7f6cf6be (.)

    Assert::assertArrayHasKey('custom_color', $colors);
    Assert::assertArrayHasKey('primary', $colors);
});

test('getLogoHeight restituisce il valore corretto', function () {
<<<<<<< HEAD
    $metatagData = new MetatagData;
    $metatagData->logo_height = '3em';

    Assert::assertSame('3em', $metatagData->getBrandLogoHeight());
});

test('Le proprieta hanno i valori di default corretti', function () {
    $metatagData = new MetatagData;
=======
    $metatagData = new MetatagData();
    $metatagData->logo_height = '3em';

    Assert::assertSame('3em', $metatagData->getLogoHeight());
});

test('Le proprieta hanno i valori di default corretti', function () {
    $metatagData = new MetatagData();
>>>>>>> 7f6cf6be (.)

    Assert::assertSame('xot', $metatagData->generator);
    Assert::assertSame('UTF-8', $metatagData->charset);
    Assert::assertSame('xot', $metatagData->author);
    Assert::assertSame('2em', $metatagData->logo_height);
    Assert::assertSame('/favicon.ico', $metatagData->favicon);
});
