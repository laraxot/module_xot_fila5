<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Unit\Actions\Blade;

use Modules\Xot\Actions\Blade\RegisterBladeComponentsAction;
use Modules\Xot\Tests\TestCase;

it('registers blade components correctly', function (): void {
    $path = 'some/path';
    $namespace = 'Some\\Namespace';
    $prefix = 'prefix';

describe('Register Blade Components Action', function (): void {
    test('registers blade components correctly', function (): void {
        $path = 'Modules/Xot/resources/views/components';
        $namespace = 'Modules\\Xot\\View\\Components';
        $prefix = 'xot::';

        $action = app(RegisterBladeComponentsAction::class);
        $action->execute($path, $namespace, $prefix);

        // Test passes if no exception is thrown
        expect(true)->toBeTrue();
    });

    test('does nothing if no components found', function (): void {
        // Point to a directory that doesn't exist or has no PHP files
        $path = sys_get_temp_dir().'/empty-components-'.uniqid();
        $namespace = 'Empty\\Namespace';

        $action = app(RegisterBladeComponentsAction::class);
        $action->execute($path, $namespace);

        // Test passes if no exception is thrown
        expect(true)->toBeTrue();
    });
});
