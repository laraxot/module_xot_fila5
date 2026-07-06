<?php

declare(strict_types=1);

use Modules\Xot\Actions\GetTransKeyAction;
use PHPUnit\Framework\Assert;
uses(Modules\Xot\Tests\TestCase::class);

it('generates translation keys correctly', function (): void {
    $action = app(GetTransKeyAction::class);

    // Test with Action suffix
    $key = $action->execute('Modules\Activity\Actions\LogActivityAction');
    expect($key)->toBe('activity::log_activity');

    // Test with RelationManager
    $key = $action->execute('Modules\User\Filament\Resources\UserResource\RelationManagers\ProfilesRelationManager');
    expect($key)->toBe('user::profile');
});
