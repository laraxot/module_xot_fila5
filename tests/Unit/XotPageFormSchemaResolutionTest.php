<?php

declare(strict_types=1);
<<<<<<< HEAD
<<<<<<< .merge_file_qB8S27
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
<<<<<<< HEAD
>>>>>>> da9ae01a0 (.)
<<<<<<< .merge_file_I9UKM4
=======
>>>>>>> 930f8146 (Check & fix styling)
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
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_Dlhy5r
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
use Filament\Forms\Components\TextInput;
use Modules\Xot\Filament\Pages\XotBasePage;
use Modules\Xot\Tests\TestCase;
use Modules\Xot\Tests\Unit\Fixtures\FormSchemaPageFixture;
use PHPUnit\Framework\Assert;
<<<<<<< HEAD
<<<<<<< .merge_file_qB8S27
<<<<<<< HEAD
<<<<<<< HEAD
use ReflectionMethod;
=======
=======
<<<<<<< HEAD
>>>>>>> da9ae01a0 (.)
<<<<<<< .merge_file_I9UKM4
use ReflectionMethod;
=======
>>>>>>> .merge_file_fvYDWm
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
use ReflectionMethod;
>>>>>>> 3792da0d (Check & fix styling)
=======
use ReflectionMethod;
>>>>>>> .merge_file_Dlhy5r
=======
=======
use ReflectionMethod;
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)

uses(TestCase::class);

test('un override di getFormSchema viene onorato su XotBasePage', function (): void {
<<<<<<< HEAD
<<<<<<< .merge_file_qB8S27
<<<<<<< HEAD
<<<<<<< HEAD
    $fixture = new FormSchemaPageFixture;
=======
=======
<<<<<<< HEAD
>>>>>>> da9ae01a0 (.)
<<<<<<< .merge_file_I9UKM4
=======
>>>>>>> 930f8146 (Check & fix styling)
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
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
    $fixture = new FormSchemaPageFixture;
>>>>>>> .merge_file_Dlhy5r
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
    $method = new ReflectionMethod($fixture, 'resolveFormSchemaForXotPage');
    $method->setAccessible(true);

    /** @var array<int|string, TextInput> $schema */
    $schema = $method->invoke($fixture);

    Assert::assertArrayHasKey('legacy_field', $schema);
    Assert::assertInstanceOf(TextInput::class, $schema['legacy_field']);
});

test('senza override getFormSchema restituisce schema vuoto', function (): void {
<<<<<<< HEAD
<<<<<<< .merge_file_qB8S27
<<<<<<< HEAD
<<<<<<< HEAD
    $fixture = new class extends XotBasePage
    {
=======
=======
<<<<<<< HEAD
>>>>>>> da9ae01a0 (.)
<<<<<<< .merge_file_I9UKM4
    $fixture = new class extends XotBasePage
    {
=======
    $fixture = new class extends XotBasePage {
>>>>>>> .merge_file_fvYDWm
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
    $fixture = new class extends XotBasePage
    {
>>>>>>> 3792da0d (Check & fix styling)
=======
    $fixture = new class extends XotBasePage
    {
>>>>>>> .merge_file_Dlhy5r
=======
=======
    $fixture = new class extends XotBasePage
    {
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
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
