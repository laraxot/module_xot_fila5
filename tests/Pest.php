<?php

declare(strict_types=1);

/*
 * Bootstrap Pest — modulo Xot.
 * Helper globali: tests/Support/helpers.php (composer autoload-dev files).
 * Ogni file test dichiara uses(\Modules\Xot\Tests\TestCase::class).
 *
 * Xot e' il modulo base: il bootstrap condiviso vive accanto a questo file,
 * quindi il require punta a `XotBasePest.php` nella stessa cartella e non al
 * path relativo `../../Xot/tests/` usato dagli altri moduli. `XotBasePest.php`
 * carica gia' `PestStubs.php`: nessun require duplicato qui.
 */

require_once __DIR__.'/XotBasePest.php';
