<?php

declare(strict_types=1);

use App\View\Components\Alert;
use App\View\Components\AppLayout;
use App\View\Components\GuestLayout;
use App\View\Components\Header;
use App\View\Components\Input;
use Illuminate\Contracts\View\View as ViewContract;
use Illuminate\Support\Facades\View;
use PHPUnit\Framework\Assert;
use Modules\Xot\Tests\TestCase;

/*
 * Contratto dei componenti Blade di App\View\Components: quale vista sceglie
 * ciascun componente e quali dati passa.
 *
 * Le viste reali stanno nei tema (Themes/One, Themes/Zero) e non sono
 * risolvibili sotto Testbench: il test registra `tests/Unit/fixtures/views`
 * come percorso aggiuntivo, cosi' `view()` risolve senza montare un tema.
 * Nessun accesso al database.
 */

uses(TestCase::class);

beforeEach(function (): void {
    View::addLocation(__DIR__.'/fixtures/views');
});

test('alert component renders the alert view and keeps its payload', function (): void {
    $component = new Alert('danger', 'Qualcosa e andato storto');

    Assert::assertSame('danger', $component->type);
    Assert::assertSame('Qualcosa e andato storto', $component->message);

    $view = $component->render();

    Assert::assertInstanceOf(ViewContract::class, $view);
    Assert::assertSame('components.alert', $view->name());
    Assert::assertSame('components.alert', $view->getData()['view']);
});

test('input component renders the input view', function (): void {
    $view = (new Input)->render();

    Assert::assertInstanceOf(ViewContract::class, $view);
    Assert::assertSame('components.input', $view->name());
    Assert::assertSame('components.input', $view->getData()['view']);
});

test('header component renders the header view', function (): void {
    $view = (new Header)->render();

    Assert::assertInstanceOf(ViewContract::class, $view);
    Assert::assertSame('components.header', $view->name());
    Assert::assertSame('components.header', $view->getData()['view']);
});

test('app layout component renders the app layout', function (): void {
    $view = (new AppLayout)->render();

    Assert::assertSame('layouts.app', $view->name());
});

test('guest layout component renders the guest layout', function (): void {
    $view = (new GuestLayout)->render();

    Assert::assertSame('layouts.guest', $view->name());
});
