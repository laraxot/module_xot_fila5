<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Unit;

<<<<<<< HEAD
use Modules\Xot\Providers\XotServiceProvider;
<<<<<<< HEAD
use Modules\Xot\Tests\TestCase;

uses(TestCase::class);

it('boots the xot service provider', function () {
    expect(app()->providerIsLoaded(XotServiceProvider::class))->toBeTrue();
});

it('has app available in test', function () {
    expect(app())->not->toBeNull();
});

it('generates unique email', function () {
    $email1 = 'test-'.uniqid('', true).'@example.com';
    $email2 = 'test-'.uniqid('', true).'@example.com';

    expect($email1)->toContain('@example.com');
    expect($email2)->toContain('@example.com');
    expect($email1)->not->toEqual($email2);
});
=======
use Modules\Xot\Tests\XotBaseTestCase;

class TestCaseTest extends XotBaseTestCase
{
<<<<<<< HEAD
    public function testBaseTestCaseBootsTheXotServiceProvider(): void
    {
        $this->assertTrue($this->app->providerIsLoaded(XotServiceProvider::class));
=======
    public function testBaseTestCaseInitializes(): void
    {
        $this->assertInstanceOf(XotBaseTestCase::class, $this);
>>>>>>> da9ae01a0 (.)
    }

    public function testAppIsAvailableInTest(): void
    {
        $this->assertNotNull($this->app);
    }

<<<<<<< HEAD
=======
    public function testDatabaseAssertionsAvailable(): void
    {
        $this->assertTrue(method_exists($this, 'assertDatabaseHasRow'));
        $this->assertTrue(method_exists($this, 'assertDatabaseMissingRow'));
    }

    public function testMockServiceAvailable(): void
    {
        $this->assertTrue(method_exists($this, 'mockService'));
    }

>>>>>>> da9ae01a0 (.)
    public function testGenerateUniqueEmail(): void
    {
        $email1 = self::generateUniqueEmail();
        $email2 = self::generateUniqueEmail();

        $this->assertStringContainsString('@example.com', $email1);
        $this->assertStringContainsString('@example.com', $email2);
        $this->assertNotEquals($email1, $email2);
    }
}
<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
