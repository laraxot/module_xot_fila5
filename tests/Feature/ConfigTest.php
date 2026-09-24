<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Feature;

<<<<<<< HEAD
use Modules\Xot\Tests\TestCase;

uses(TestCase::class);

it('loads xot config correctly', function () {
    $config = config('xot');

    expect($config)->toBeArray();
    expect($config)->not->toBeEmpty();
});

it('has expected keys in xot config', function () {
    $config = config('xot');

    // Verify some base structure exists
    expect($config)->toBeArray();
});

it('loads database config', function () {
    $config = config('database');

    expect($config)->toBeArray();
    expect($config)->toHaveKey('default');
});
=======
use Modules\Xot\Tests\XotBaseTestCase;

class ConfigTest extends XotBaseTestCase
{
    public function testXotConfigLoadsCorrectly(): void
    {
        $config = config('xot');

        $this->assertIsArray($config);
        $this->assertNotEmpty($config);
    }

    public function testXotConfigHasExpectedKeys(): void
    {
        $config = config('xot');

        // Verify some base structure exists
        $this->assertIsArray($config);
    }

    public function testDatabaseConfigLoads(): void
    {
        $config = config('database');

        $this->assertIsArray($config);
        $this->assertArrayHasKey('default', $config);
    }
}
>>>>>>> laraxot/dev
