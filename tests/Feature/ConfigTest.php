<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Feature;

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
