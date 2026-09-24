<?php

declare(strict_types=1);
<<<<<<< HEAD
=======

>>>>>>> 3792da0d (Check & fix styling)
use Illuminate\Support\Facades\Route;

// custom route finche' siamo legati ai modelli
// lista e' index, mostrare un elemento e' show ..

Route::get('{lang}/feed/{item}', 'RssFeedController@feed');
Route::get('/sitemap.xml', 'SiteMapController@index');
Route::get('{lang}/sitemap', 'SiteMapController@index');
