<?php

declare(strict_types=1);
<<<<<<< HEAD
<<<<<<< HEAD
=======

>>>>>>> laraxot/dev
=======
>>>>>>> laraxot/dev
use Illuminate\Support\Facades\Route;

$namespace = '\Modules\Xot\Http\Controllers';
$middleware = [
    'web',
    // \Modules\Xot\Http\Middleware\PanelMiddleware::class,
];

Route::middleware($middleware)
    ->namespace($namespace)
    ->group(static function (): void {
        Route::get('/sitemap.xml', 'SitemapXmlController')->name('sitemap_xml');
    });
