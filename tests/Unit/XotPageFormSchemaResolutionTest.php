<?php

declare(strict_types=1);
<<<<<<< HEAD
=======
<<<<<<< .merge_file_I9UKM4
<<<<<<< HEAD

=======
<<<<<<< HEAD

=======
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======

>>>>>>> .merge_file_fvYDWm
>>>>>>> laraxot/dev
use Filament\Forms\Components\TextInput;
use Modules\Xot\Filament\Pages\XotBasePage;
use Modules\Xot\Tests\TestCase;
use Modules\Xot\Tests\Unit\Fixtures\FormSchemaPageFixture;
use PHPUnit\Framework\Assert;
<<<<<<< HEAD
use ReflectionMethod;
=======
<<<<<<< .merge_file_I9UKM4
use ReflectionMethod;
=======
>>>>>>> .merge_file_fvYDWm
>>>>>>> laraxot/dev

uses(TestCase::class);

test('un override di getFormSchema viene onorato su XotBasePage', function (): void {
<<<<<<< HEAD
    $fixture = new FormSchemaPageFixture;
=======
<<<<<<< .merge_file_I9UKM4
<<<<<<< HEAD
    $fixture = new FormSchemaPageFixture();
=======
<<<<<<< HEAD
    $fixture = new FormSchemaPageFixture();
=======
    $fixture = new FormSchemaPageFixture;
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======
    $fixture = new FormSchemaPageFixture();
>>>>>>> .merge_file_fvYDWm
>>>>>>> laraxot/dev
    $method = new ReflectionMethod($fixture, 'resolveFormSchemaForXotPage');
    $method->setAccessible(true);

    /** @var array<int|string, TextInput> $schema */
    $schema = $method->invoke($fixture);

    Assert::assertArrayHasKey('legacy_field', $schema);
    Assert::assertInstanceOf(TextInput::class, $schema['legacy_field']);
});

test('senza override getFormSchema restituisce schema vuoto', function (): void {
<<<<<<< HEAD
    $fixture = new class extends XotBasePage
    {
=======
<<<<<<< .merge_file_I9UKM4
    $fixture = new class extends XotBasePage
    {
=======
    $fixture = new class extends XotBasePage {
>>>>>>> .merge_file_fvYDWm
>>>>>>> laraxot/dev
        protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-document';

        protected string $view = 'xot::filament.pages.base';
    };

    $method = new ReflectionMethod($fixture, 'resolveFormSchemaForXotPage');
    $method->setAccessible(true);

    Assert::assertSame([], $method->invoke($fixture));
});

test('getXotFormSchema non esiste piu su XotBasePage', function (): void {
    Assert::assertFalse(method_exists(XotBasePage::class, 'getXotFormSchema'));
});
