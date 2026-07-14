<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Unit\Actions\File;

use Modules\Xot\Actions\File\GetViewNameSpacePathAction;
use Modules\Xot\Datas\XotData;
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 61938ca4 (delete .claude-audit/)
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);
<<<<<<< HEAD
=======
use PHPUnit\Framework\Assert;
>>>>>>> 64619e34 (.)
=======
>>>>>>> 61938ca4 (delete .claude-audit/)

it('gets view namespace path from theme fallback correctly', function (): void {
    $ns = 'pub_theme';
    $themeName = 'TestTheme';

    $xotData = XotData::from(['pub_theme' => $themeName]);

<<<<<<< HEAD
<<<<<<< HEAD
    $reflection = new \ReflectionClass(XotData::class);
=======
    // Inject it into the singleton instance using reflection
    $reflection = new ReflectionClass(XotData::class);
>>>>>>> 64619e34 (.)
=======
    $reflection = new \ReflectionClass(XotData::class);
>>>>>>> 61938ca4 (delete .claude-audit/)
    $instanceProperty = $reflection->getProperty('instance');
    $instanceProperty->setAccessible(true);
    $instanceProperty->setValue(null, $xotData);

    $action = app(GetViewNameSpacePathAction::class);
    $result = $action->execute($ns);

    Assert::assertSame(base_path('Themes/'.$themeName), $result);
<<<<<<< HEAD
<<<<<<< HEAD
=======
    // Reset instance for other tests
>>>>>>> 64619e34 (.)
=======
>>>>>>> 61938ca4 (delete .claude-audit/)
    $instanceProperty->setValue(null, null);
});
