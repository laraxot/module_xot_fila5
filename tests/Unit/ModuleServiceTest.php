<?php

declare(strict_types=1);

<<<<<<< HEAD
<<<<<<< HEAD
use Modules\Xot\Actions\ModuleAction;
=======
use Modules\Xot\Services\ModuleService;
>>>>>>> 64619e34 (.)
=======
use Modules\Xot\Actions\ModuleAction;
>>>>>>> 61938ca4 (delete .claude-audit/)
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

<<<<<<< HEAD
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
=======
describe('ModuleAction', function (): void {
    $service = new ModuleAction();

    it('can be instantiated', function () use ($service): void {
        Assert::assertInstanceOf(ModuleAction::class, $service);
>>>>>>> 61938ca4 (delete .claude-audit/)
    });

    it('can be instantiated', function () {
        expect($this->service)->toBeInstanceOf(ModuleService::class);
    });

    it('has getModels method', function () {
        expect(method_exists($this->service, 'getModels'))->toBeTrue();
    });

    it('returns array from getModels method', function () {
        $result = $this->service->getModels();
        expect($result)->toBeArray();
    });
});
