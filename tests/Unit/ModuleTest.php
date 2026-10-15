<?php
namespace Modules\Xot\Tests\Unit;

use Modules\Xot\Tests\TestCase;
use Modules\Xot\Models\Module;

it('has main model class', function () {
    expect(class_exists(Module::class))->toBeTrue();
});
