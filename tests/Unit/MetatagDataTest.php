<?php

declare(strict_types=1);

use Modules\Xot\Datas\MetatagData;
use PHPUnit\Framework\Assert;

test('getThemeColors restituisce i colori configurati', function () {
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

    $colors = $metatagData->getThemeColors();

    Assert::assertArrayHasKey('custom_color', $colors);
    Assert::assertArrayHasKey('primary', $colors);
});

test('getBrandLogoHeight restituisce il valore corretto', function () {
    $metatagData = new MetatagData();
    $metatagData->logo_height = '3em';

    Assert::assertSame('3em', $metatagData->getBrandLogoHeight());
});

test('Le proprietà hanno i valori di default corretti', function () {
    $metatagData = new MetatagData();

    Assert::assertSame('xot', $metatagData->generator);
    Assert::assertSame('UTF-8', $metatagData->charset);
    Assert::assertSame('xot', $metatagData->author);
    Assert::assertSame('2em', $metatagData->logo_height);
    Assert::assertSame('/favicon.ico', $metatagData->favicon);
});
