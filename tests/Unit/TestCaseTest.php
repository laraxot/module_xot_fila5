<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Unit;

use Modules\Xot\Providers\XotServiceProvider;
use Modules\Xot\Tests\XotBaseTestCase;

class TestCaseTest extends XotBaseTestCase
{
    public function test_base_test_case_boots_the_xot_service_provider(): void
    {
        $this->assertTrue($this->app->providerIsLoaded(XotServiceProvider::class));
    }

    public function test_app_is_available_in_test(): void
    {
        $this->assertNotNull($this->app);
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
