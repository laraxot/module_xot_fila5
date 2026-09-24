<?php

declare(strict_types=1);
<<<<<<< HEAD
use Modules\Xot\Actions\String\NormalizeDriverNameAction;
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);
=======

uses(Modules\Xot\Tests\TestCase::class);
use Modules\Xot\Actions\String\NormalizeDriverNameAction;
use PHPUnit\Framework\Assert;
<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)

it('normalizes driver names correctly', function (): void {
    $action = app(NormalizeDriverNameAction::class);

    Assert::assertSame('360dialog', $action->execute('360-Dialog'));
    Assert::assertSame('mydriver', $action->execute('My_Driver'));
    Assert::assertSame('spacesinname', $action->execute('Spaces In Name'));
    Assert::assertSame('uppercase', $action->execute('UPPERcase'));
});
