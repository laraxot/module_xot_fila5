<?php

declare(strict_types=1);
<<<<<<< HEAD
<<<<<<< .merge_file_SRcI5C
=======
<<<<<<< .merge_file_YNlucw
=======
>>>>>>> .merge_file_bv4kYf
use Modules\Xot\Filament\Resources\XotBaseResource;
=======
<<<<<<< .merge_file_5HsDnO
<<<<<<< HEAD

=======
<<<<<<< HEAD
<<<<<<< .merge_file_SRcI5C
=======
>>>>>>> .merge_file_XjPhkK
>>>>>>> .merge_file_bv4kYf

=======
use Modules\Xot\Filament\Resources\XotBaseResource;
>>>>>>> laraxot/dev
<<<<<<< .merge_file_SRcI5C
=======
<<<<<<< .merge_file_YNlucw
=======
>>>>>>> .merge_file_bv4kYf
>>>>>>> laraxot/dev
=======
use Modules\Xot\Filament\Resources\XotBaseResource;
>>>>>>> .merge_file_ErC8vg
>>>>>>> laraxot/dev
<<<<<<< .merge_file_SRcI5C
=======
>>>>>>> .merge_file_XjPhkK
>>>>>>> .merge_file_bv4kYf
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;

use function Safe\file_get_contents;
use function Safe\glob;
use function Safe\preg_match;

uses(TestCase::class);

/*
 * Da quando `XotBaseListRecords` non usa piu' `HasXotTable`, la tabella di una list page
 * la costruisce `XotBaseResource::table()` attraverso `getTableClass()`, che alza
 * `LogicException` se la classe non esiste: una Resource senza `*Table` non degrada a
 * tabella vuota, va in errore a runtime.
 *
 * Questo test tiene il contratto: nessuna list page concreta puo' restare scoperta.
 */

test('ogni list page concreta risolve la sua Table class', function (): void {
    $senzaTable = [];

    /** @var list<string> $files */
    $files = glob(base_path('Modules/*/app/Filament/Resources/*/Pages/*.php')) ?: [];

    foreach ($files as $file) {
        $src = file_get_contents($file);

        if (! preg_match('/extends\s+\w*ListRecords/', $src)) {
            continue;
        }
        if (preg_match('/^abstract class/m', $src)) {
            continue;
        }
        if (! preg_match('/namespace\s+([^;]+);/', $src, $ns)) {
            continue;
        }
        if (! preg_match('/^(?:final\s+)?class\s+(\w+)/m', $src, $className)) {
            continue;
        }

        $page = trim($ns[1]).'\\'.$className[1];
        if (! class_exists($page)) {
            continue;
        }

        try {
<<<<<<< HEAD
<<<<<<< .merge_file_SRcI5C
=======
<<<<<<< .merge_file_YNlucw
=======
>>>>>>> .merge_file_bv4kYf
=======
<<<<<<< .merge_file_5HsDnO
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> laraxot/dev
<<<<<<< .merge_file_SRcI5C
=======
>>>>>>> .merge_file_XjPhkK
>>>>>>> .merge_file_bv4kYf
            /** @var class-string<\Modules\Xot\Filament\Resources\XotBaseResource> $resourceClass */
            $resourceClass = $page::getResource();
            $resourceClass::getTableClass();
        } catch (\Throwable $e) {
<<<<<<< .merge_file_SRcI5C
=======
<<<<<<< .merge_file_YNlucw
=======
=======
>>>>>>> .merge_file_bv4kYf
<<<<<<< HEAD
=======
=======
=======
>>>>>>> .merge_file_ErC8vg
>>>>>>> laraxot/dev
<<<<<<< .merge_file_SRcI5C
=======
>>>>>>> .merge_file_XjPhkK
>>>>>>> .merge_file_bv4kYf
            /** @var class-string<XotBaseResource> $resourceClass */
            $resourceClass = $page::getResource();
            $resourceClass::getTableClass();
        } catch (Throwable $e) {
<<<<<<< .merge_file_SRcI5C
=======
<<<<<<< .merge_file_YNlucw
=======
>>>>>>> .merge_file_bv4kYf
<<<<<<< HEAD
=======
<<<<<<< .merge_file_5HsDnO
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_ErC8vg
<<<<<<< .merge_file_SRcI5C
=======
>>>>>>> .merge_file_XjPhkK
>>>>>>> .merge_file_bv4kYf
>>>>>>> laraxot/dev
            $senzaTable[] = $page.' — '.$e->getMessage();
        }
    }

    Assert::assertSame([], $senzaTable, "List page senza Table class:\n".implode("\n", $senzaTable));
});
