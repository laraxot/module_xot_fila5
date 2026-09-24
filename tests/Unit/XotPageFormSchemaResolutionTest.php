<?php

declare(strict_types=1);
<<<<<<< .merge_file_qB8S27
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< .merge_file_I9UKM4
<<<<<<< HEAD
=======
>>>>>>> 3792da0d (Check & fix styling)

=======
<<<<<<< HEAD

=======
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======

>>>>>>> .merge_file_fvYDWm
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_Dlhy5r
use Filament\Forms\Components\TextInput;
use Modules\Xot\Filament\Pages\XotBasePage;
use Modules\Xot\Tests\TestCase;
use Modules\Xot\Tests\Unit\Fixtures\FormSchemaPageFixture;
use PHPUnit\Framework\Assert;
<<<<<<< .merge_file_qB8S27
<<<<<<< HEAD
<<<<<<< HEAD
use ReflectionMethod;
=======
<<<<<<< .merge_file_I9UKM4
use ReflectionMethod;
=======
>>>>>>> .merge_file_fvYDWm
>>>>>>> laraxot/dev
=======
use ReflectionMethod;
>>>>>>> 3792da0d (Check & fix styling)
=======
use ReflectionMethod;
>>>>>>> .merge_file_Dlhy5r

uses(TestCase::class);

test('un override di getFormSchema viene onorato su XotBasePage', function (): void {
<<<<<<< .merge_file_qB8S27
<<<<<<< HEAD
<<<<<<< HEAD
    $fixture = new FormSchemaPageFixture;
=======
<<<<<<< .merge_file_I9UKM4
<<<<<<< HEAD
=======
>>>>>>> 3792da0d (Check & fix styling)
    $fixture = new FormSchemaPageFixture();
=======
<<<<<<< HEAD
    $fixture = new FormSchemaPageFixture();
=======
    $fixture = new FormSchemaPageFixture;
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
    $fixture = new FormSchemaPageFixture();
>>>>>>> .merge_file_fvYDWm
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
    $fixture = new FormSchemaPageFixture;
>>>>>>> .merge_file_Dlhy5r
    $method = new ReflectionMethod($fixture, 'resolveFormSchemaForXotPage');
    $method->setAccessible(true);

    /** @var array<int|string, TextInput> $schema */
    $schema = $method->invoke($fixture);

    Assert::assertArrayHasKey('legacy_field', $schema);
    Assert::assertInstanceOf(TextInput::class, $schema['legacy_field']);
});

test('senza override getFormSchema restituisce schema vuoto', function (): void {
<<<<<<< .merge_file_qB8S27
<<<<<<< HEAD
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
=======
    $fixture = new class extends XotBasePage
    {
>>>>>>> 3792da0d (Check & fix styling)
=======
    $fixture = new class extends XotBasePage
    {
>>>>>>> .merge_file_Dlhy5r
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
