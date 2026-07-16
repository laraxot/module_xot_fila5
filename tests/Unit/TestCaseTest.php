<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Unit;

use Modules\Xot\Providers\XotServiceProvider;
use Modules\Xot\Tests\XotBaseTestCase;

class TestCaseTest extends XotBaseTestCase
{
    public function testBaseTestCaseBootsTheXotServiceProvider(): void
    {
        $this->assertTrue($this->app->providerIsLoaded(XotServiceProvider::class));
    }

    public function testAppIsAvailableInTest(): void
    {
        $this->assertNotNull($this->app);
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
