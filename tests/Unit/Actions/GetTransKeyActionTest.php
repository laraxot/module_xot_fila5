<?php

declare(strict_types=1);
<<<<<<< HEAD
use Modules\Xot\Actions\GetTransKeyAction;
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);
=======

uses(Modules\Xot\Tests\TestCase::class);
use Modules\Xot\Actions\GetTransKeyAction;
use PHPUnit\Framework\Assert;
<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)

it('generates translation keys correctly', function (): void {
    $action = app(GetTransKeyAction::class);

    // Test with Action suffix
    $key = $action->execute('Modules\Activity\Actions\LogActivityAction');
    Assert::assertSame('activity::log_activity', $key);
    // Test with RelationManager
    $key = $action->execute('Modules\User\Filament\Resources\UserResource\RelationManagers\ProfilesRelationManager');
    Assert::assertSame('user::profile', $key);
});
