<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Request;
<<<<<<< HEAD
<<<<<<< HEAD
use Modules\Xot\Actions\ArtisanAction;
=======
use Modules\Xot\Services\ArtisanService;
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;
>>>>>>> 64619e34 (.)
=======
use Modules\Xot\Actions\ArtisanAction;
>>>>>>> 61938ca4 (delete .claude-audit/)

use function Safe\ob_end_clean;
use function Safe\ob_start;

<<<<<<< HEAD
<<<<<<< HEAD
=======
uses(TestCase::class);

>>>>>>> 64619e34 (.)
=======
>>>>>>> 61938ca4 (delete .claude-audit/)
beforeEach(function (): void {
    // Configure mysql connection for tests (required by ArtisanService)
    Config::set('database.connections.mysql', [
        'driver' => 'sqlite',
        'database' => ':memory:',
        'prefix' => '',
    ]);
});

test('artisan service act method returns empty string for unknown commands', function (): void {
    Request::replace(['module' => '']);

<<<<<<< HEAD
<<<<<<< HEAD
    $result = ArtisanAction::act('unknown-command');

    // @phpstan-ignore-next-line - Pest expectation method
    expect($result)->toBe('');
=======
    $result = ArtisanService::act('unknown-command');
    Assert::assertSame('', $result);
>>>>>>> 64619e34 (.)
=======
    $result = ArtisanAction::act
('unknown-command');

    // @phpstan-ignore-next-line - Pest expectation method
    expect($result)->toBe('');
>>>>>>> 61938ca4 (delete .claude-audit/)
});

test('artisan service act method handles migrate command', function (): void {
    Request::replace(['module' => '']);

    // Mock Artisan facade - DB::purge() and DB::reconnect() work with configured connection
    Artisan::shouldReceive('call')->once()->andReturn(0);
    Artisan::shouldReceive('output')->once()->andReturn('Migration completed');

<<<<<<< HEAD
<<<<<<< HEAD
    $result = ArtisanAction::act('migrate');
=======
    $result = ArtisanAction::act
('migrate');
>>>>>>> 61938ca4 (delete .claude-audit/)

    // @phpstan-ignore-next-line - Pest expectation method
    expect($result)->toBeString();
    // @phpstan-ignore-next-line - Pest expectation method
    expect(str_contains($result, 'Migration completed'))->toBeTrue();
<<<<<<< HEAD
=======
    $result = ArtisanService::act('migrate');
    Assert::assertSame('string', gettype($result));
>>>>>>> 64619e34 (.)
=======
>>>>>>> 61938ca4 (delete .claude-audit/)
});

test('artisan service act method handles module parameter', function (): void {
    Request::replace(['module' => 'TestModule']);

    Artisan::shouldReceive('call')->once()->andReturn(0);
    Artisan::shouldReceive('output')->once()->andReturn('Module migration');

    ob_start();
<<<<<<< HEAD
    $result = ArtisanAction::act('migrate');
    ob_end_clean();
<<<<<<< HEAD
=======
    $result = ArtisanAction::act
('migrate');
    ob_end_clean();
>>>>>>> 61938ca4 (delete .claude-audit/)

    // @phpstan-ignore-next-line - Pest expectation method
    expect($result)->toBeString();
    // @phpstan-ignore-next-line - Pest expectation method
    expect(str_contains($result, 'Module migration'))->toBeTrue();
<<<<<<< HEAD
=======
    Assert::assertSame('string', gettype($result));
>>>>>>> 64619e34 (.)
=======
>>>>>>> 61938ca4 (delete .claude-audit/)
});

test('artisan service handles non-string module parameter', function (): void {
    Request::replace(['module' => ['not', 'a', 'string']]);

    Artisan::shouldReceive('call')->once()->andReturn(0);
    Artisan::shouldReceive('output')->once()->andReturn('Migration');

<<<<<<< HEAD
<<<<<<< HEAD
    $result = ArtisanAction::act('migrate');
=======
    $result = ArtisanAction::act
('migrate');
>>>>>>> 61938ca4 (delete .claude-audit/)

    // @phpstan-ignore-next-line - Pest expectation method
    expect($result)->toBeString();
    // @phpstan-ignore-next-line - Pest expectation method
    expect(str_contains($result, 'Migration'))->toBeTrue();
<<<<<<< HEAD
=======
    $result = ArtisanService::act('migrate');
    Assert::assertSame('string', gettype($result));
>>>>>>> 64619e34 (.)
=======
>>>>>>> 61938ca4 (delete .claude-audit/)
});
