<?php

declare(strict_types=1);

use Modules\Xot\Tests\Fixtures\Traits\BreadcrumbProbe;
use Modules\Xot\Tests\Fixtures\Traits\ModelLabelFromModelNameProbe;
use Modules\Xot\Tests\Fixtures\Traits\ModelLabelFromPropertyProbe;
use Modules\Xot\Tests\Fixtures\Traits\NavigationLabelFromPluralProbe;
use Modules\Xot\Tests\Fixtures\Traits\NavigationLabelFromPropertyProbe;
use Modules\Xot\Tests\Fixtures\Traits\PluralModelLabelFromPropertyProbe;
use Modules\Xot\Tests\Fixtures\Traits\PluralModelLabelFromSingularProbe;
use PHPUnit\Framework\Assert;

uses(Modules\Xot\Tests\TestCase::class);

it('gets model label from property', function (): void {
    $class = new class {
        use HasCustomModelLabel;

        public static string $modelLabel = 'Custom Label';

        public static function getModel(): string
        {
            return 'App\Models\User';
        }
    };

    expect($class::getModelLabel())->toBe('Custom Label');
});

it('gets model label from model name', function (): void {
    $class = new class {
        use HasCustomModelLabel;

        public static function getModel(): string
        {
            return 'App\Models\UserInvitation';
        }
    };

    // Str::title(Str::snake('UserInvitation', ' ')) -> 'User Invitation'
    expect($class::getModelLabel())->toBe('User Invitation');
});

it('gets plural model label from property', function (): void {
    $class = new class {
        use HasCustomModelLabel;

        public static string $pluralModelLabel = 'Plural Labels';

        public static function getModelLabel(): string
        {
            return 'Label';
        }
    };

    expect($class::getPluralModelLabel())->toBe('Plural Labels');
});

it('gets plural model label from singular label', function (): void {
    $class = new class {
        use HasCustomModelLabel;

        public static function getModelLabel(): string
        {
            return 'Category';
        }
    };

    expect($class::getPluralModelLabel())->toBe('Categories');
});

it('gets navigation label', function (): void {
    $class = new class {
        use HasCustomModelLabel;

        public static string $navigationLabel = 'Nav Label';

        public static function getPluralModelLabel(): string
        {
            return 'Plurals';
        }
    };

    expect($class::getNavigationLabel())->toBe('Nav Label');

    $classNoNav = new class {
        use HasCustomModelLabel;

        public static function getPluralModelLabel(): string
        {
            return 'Plurals';
        }
    };
    expect($classNoNav::getNavigationLabel())->toBe('Plurals');
});

it('gets breadcrumb', function (): void {
    $class = new class {
        use HasCustomModelLabel;

        public static function getModelLabel(): string
        {
            return 'Bread';
        }
    };

    expect($class::getBreadcrumb())->toBe('Bread');
});
