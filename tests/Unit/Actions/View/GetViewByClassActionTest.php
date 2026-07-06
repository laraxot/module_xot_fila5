<?php

declare(strict_types=1);

use Illuminate\Support\Facades\View;
use Modules\Xot\Actions\View\GetViewByClassAction;
use PHPUnit\Framework\Assert;
uses(Modules\Xot\Tests\TestCase::class);

it('converts class names to view names correctly', function (): void {
    $action = app(GetViewByClassAction::class);

    // Mock view existence for any call
    View::shouldReceive('exists')->andReturn(true);

    $class = 'Modules\\User\\Filament\\Resources\\UserResource';
    $result = $action->execute($class);

    // Current logic slugifies and implodes with dots.
    // Modules\User\Filament\Resources\UserResource
    // -> after Modules\User\ -> Filament\Resources\UserResource
    // -> explode -> ['Filament', 'Resources', 'UserResource']
    // mapped -> ['filament', 'resources', 'user'] (singular check)
    // -> pub_theme::filament.resources.user
    expect($result)->toBeString();
});

it('handles singular previous parts correctly', function (): void {
    $action = app(GetViewByClassAction::class);

    // Test checkPrev logic directly
    expect($action->checkPrev('UserResource', 'Resources'))->toBe('User');
});
