<?php

declare(strict_types=1);
<<<<<<< HEAD
<<<<<<< .merge_file_KnmMpH

=======
>>>>>>> laraxot/dev
=======
=======
<<<<<<< .merge_file_Eku2TF
<<<<<<< HEAD

=======
<<<<<<< HEAD

=======
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======

>>>>>>> .merge_file_Gre1C5
>>>>>>> laraxot/dev
>>>>>>> .merge_file_nO3Iz6
use Modules\Xot\Actions\Url\IsValidUrlAction;
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

it('validates correct urls', function (): void {
    $action = app(IsValidUrlAction::class);
    Assert::assertTrue($action->execute('https://google.com'));
    Assert::assertTrue($action->execute('http://localhost'));
    Assert::assertTrue($action->execute('ftp://server.com'));
});

it('invalidates incorrect urls', function (): void {
    $action = app(IsValidUrlAction::class);
    Assert::assertFalse($action->execute('not-a-url'));
    Assert::assertFalse($action->execute('http:///double-slash'));
    Assert::assertFalse($action->execute(''));
});
