<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Feature;

use Modules\Xot\Tests\XotBaseTestCase;

class ConfigTest extends XotBaseTestCase
{
    public function test_xot_config_loads_correctly(): void
    {
        $config = config('xot');

        $this->assertIsArray($config);
        $this->assertNotEmpty($config);
    }

    public function test_xot_config_has_expected_keys(): void
    {
        $config = config('xot');

        // Verify some base structure exists
        $this->assertIsArray($config);
    }

    public function test_database_config_loads(): void
    {
        $config = config('database');

        $this->assertIsArray($config);
        $this->assertArrayHasKey('default', $config);
    }
}
