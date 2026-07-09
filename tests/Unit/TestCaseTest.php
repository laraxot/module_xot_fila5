<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Unit;

use Modules\Xot\Tests\XotBaseTestCase;

class TestCaseTest extends XotBaseTestCase
{
    public function test_base_test_case_initializes(): void
    {
        $this->assertInstanceOf(XotBaseTestCase::class, $this);
    }

    public function test_app_is_available_in_test(): void
    {
        $this->assertNotNull($this->app);
    }

    public function test_database_assertions_available(): void
    {
        $this->assertTrue(method_exists($this, 'assertDatabaseHasRow'));
        $this->assertTrue(method_exists($this, 'assertDatabaseMissingRow'));
    }

    public function test_mock_service_available(): void
    {
        $this->assertTrue(method_exists($this, 'mockService'));
    }

    public function test_generate_unique_email(): void
    {
        $email1 = self::generateUniqueEmail();
        $email2 = self::generateUniqueEmail();

        $this->assertStringContainsString('@example.com', $email1);
        $this->assertStringContainsString('@example.com', $email2);
        $this->assertNotEquals($email1, $email2);
    }
}
