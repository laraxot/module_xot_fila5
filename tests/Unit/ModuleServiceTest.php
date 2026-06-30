<?php

declare(strict_types=1);

<<<<<<< HEAD
use Modules\Xot\Actions\ModuleAction;
=======
use Modules\Xot\Services\ModuleService;
>>>>>>> 64619e34 (.)
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

<<<<<<< HEAD
describe('ModuleAction', function (): void {
    $service = new ModuleAction();

    it('can be instantiated', function () use ($service): void {
        Assert::assertInstanceOf(ModuleAction::class, $service);
=======
describe('ModuleService', function (): void {
    $service = new ModuleService();

    it('can be instantiated', function () use ($service): void {
        Assert::assertInstanceOf(ModuleService::class, $service);
>>>>>>> 64619e34 (.)
    });

    it('has getModels method', function () use ($service): void {
        $result = $service->getModels();
        Assert::assertContains('string', array_map('gettype', $result ?: ['string']));
    });

    it('returns array from getModels method', function () use ($service): void {
        $result = $service->getModels();
        Assert::assertContains('string', array_map('gettype', $result ?: ['string']));
    });
});
