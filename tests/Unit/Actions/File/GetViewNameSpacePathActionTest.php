<?php

declare(strict_types=1);

uses(Modules\Xot\Tests\TestCase::class);
use Modules\Xot\Actions\File\GetViewNameSpacePathAction;
use Modules\Xot\Datas\XotData;
<<<<<<< HEAD
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);
=======
use PHPUnit\Framework\Assert;
>>>>>>> 64619e34 (.)

it('gets view namespace path from theme fallback correctly', function (): void {
    /** @var Modules\Xot\Tests\TestCase $this */
    $ns = 'pub_theme';
    $themeName = 'TestTheme';

    // Create a concrete instance of XotData
    $xotData = XotData::from(['pub_theme' => $themeName]);

<<<<<<< HEAD
    $reflection = new \ReflectionClass(XotData::class);
=======
    // Inject it into the singleton instance using reflection
    $reflection = new ReflectionClass(XotData::class);
>>>>>>> 64619e34 (.)
    $instanceProperty = $reflection->getProperty('instance');
    $instanceProperty->setAccessible(true);
    $instanceProperty->setValue(null, $xotData);

    $action = app(GetViewNameSpacePathAction::class);
    $result = $action->execute($ns);

    Assert::assertSame(base_path('Themes/'.$themeName), $result);
<<<<<<< HEAD
=======
    // Reset instance for other tests
>>>>>>> 64619e34 (.)
    $instanceProperty->setValue(null, null);
});
