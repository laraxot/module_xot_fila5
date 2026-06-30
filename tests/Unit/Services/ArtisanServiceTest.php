<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Unit\Services;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Request;
<<<<<<< HEAD
use Modules\Xot\Actions\ArtisanAction;
=======
use Modules\Xot\Services\ArtisanService;
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;
>>>>>>> 64619e34 (.)

use function Safe\ob_end_clean;
use function Safe\ob_start;

<<<<<<< HEAD
=======
uses(TestCase::class);

>>>>>>> 64619e34 (.)
beforeEach(function (): void {
    Config::set('database.connections.mysql', [
        'driver' => 'sqlite',
        'database' => ':memory:',
        'prefix' => '',
    ]);
});

test('artisan service act method returns empty string for unknown commands', function (): void {
    Request::replace(['module' => '']);

<<<<<<< HEAD
    $result = ArtisanAction::act('unknown-command');

    expect($result)->toBe('');
=======
    $result = ArtisanService::act('unknown-command');
    Assert::assertSame('', $result);
>>>>>>> 64619e34 (.)
});

test('artisan service act method handles migrate command', function (): void {
    Request::replace(['module' => '']);

    Artisan::shouldReceive('call')->once()->andReturn(0);
    Artisan::shouldReceive('output')->once()->andReturn('Migration completed');

<<<<<<< HEAD
    $result = ArtisanAction::act('migrate');

    expect($result)->toBeString();
    /* @var string $result */
    // @phpstan-ignore-next-line - Pest expectation method
    expect(str_contains($result, 'Migration completed'))->toBeTrue();
=======
    $result = ArtisanService::act('migrate');
    Assert::assertSame('string', gettype($result));
>>>>>>> 64619e34 (.)
});

test('artisan service act method handles module parameter', function (): void {
    Request::replace(['module' => 'TestModule']);

    Artisan::shouldReceive('call')->once()->andReturn(0);
    Artisan::shouldReceive('output')->once()->andReturn('Module migration');

    ob_start();
    $result = ArtisanAction::act('migrate');
    ob_end_clean();
<<<<<<< HEAD

    expect($result)->toBeString();
    /* @var string $result */
    // @phpstan-ignore-next-line - Pest expectation method
    expect(str_contains($result, 'Module migration'))->toBeTrue();
=======
    Assert::assertSame('string', gettype($result));
>>>>>>> 64619e34 (.)
});

test('artisan service handles non-string module parameter', function (): void {
    Request::replace(['module' => ['not', 'a', 'string']]);

    Artisan::shouldReceive('call')->once()->andReturn(0);
    Artisan::shouldReceive('output')->once()->andReturn('Migration');

<<<<<<< HEAD
    $result = ArtisanAction::act('migrate');

    expect($result)->toBeString();
    /* @var string $result */
    // @phpstan-ignore-next-line - Pest expectation method
    expect(str_contains($result, 'Migration'))->toBeTrue();
=======
    $result = ArtisanService::act('migrate');
    Assert::assertSame('string', gettype($result));
>>>>>>> 64619e34 (.)
});
