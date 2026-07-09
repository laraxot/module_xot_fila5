<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Unit;

use Modules\Xot\Tests\XotBaseTestCase;

class TestCaseTest extends XotBaseTestCase
{
    public function testBaseTestCaseInitializes(): void
    {
        $this->assertInstanceOf(XotBaseTestCase::class, $this);
    }

    public function testAppIsAvailableInTest(): void
    {
        $this->assertNotNull($this->app);
    }

    public function testDatabaseAssertionsAvailable(): void
    {
        $this->assertTrue(method_exists($this, 'assertDatabaseHasRow'));
        $this->assertTrue(method_exists($this, 'assertDatabaseMissingRow'));
    }

    public function testMockServiceAvailable(): void
    {
        $this->assertTrue(method_exists($this, 'mockService'));
    }

    public function testGenerateUniqueEmail(): void
    {
        $email1 = self::generateUniqueEmail();
        $email2 = self::generateUniqueEmail();

        $this->assertStringContainsString('@example.com', $email1);
        $this->assertStringContainsString('@example.com', $email2);
        $this->assertNotEquals($email1, $email2);
    }
}
