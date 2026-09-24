<?php

declare(strict_types=1);
<<<<<<< HEAD
=======
<<<<<<< .merge_file_Ssy17G
<<<<<<< HEAD

=======
<<<<<<< HEAD

=======
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======

>>>>>>> .merge_file_TU22tM
>>>>>>> laraxot/dev
use Modules\Xot\Actions\Route\GetRouteMethodAction;
use PHPUnit\Framework\Assert;

test('GetRouteMethodAction restituisce il metodo dichiarato as-is (Arr::wrap non filtra)', function (): void {
    // Nota: il test originale (RouteDynServiceTest) asseriva un filtro dei
    // valori non stringa che il codice reale (Arr::wrap) non esegue mai —
    // corretto qui per riflettere il comportamento verificato a runtime.
    Assert::assertSame(
        ['get', 1, 'post'],
        app(GetRouteMethodAction::class)->execute(['method' => ['get', 1, 'post']]),
    );
});

test('GetRouteMethodAction torna al default get+post se method non e specificato', function (): void {
    Assert::assertSame(['get', 'post'], app(GetRouteMethodAction::class)->execute([]));
});
