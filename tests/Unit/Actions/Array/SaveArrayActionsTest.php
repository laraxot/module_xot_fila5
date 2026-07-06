<?php

declare(strict_types=1);

use Illuminate\Support\Facades\File;
use Modules\Xot\Actions\Array\SaveJsonArrayAction;
use Modules\Xot\Actions\Array\SavePhpArrayAction;
use PHPUnit\Framework\Assert;

use function Safe\json_decode;
use function Safe\tempnam;
uses(Modules\Xot\Tests\TestCase::class);

test('save json array action works', function () {
    $data = ['foo' => 'bar'];
    $filename = tempnam(sys_get_temp_dir(), 'test_json').'.json';

    $action = app(SaveJsonArrayAction::class);
    $result = $action->execute($data, $filename);

    expect($result)->toBeTrue()
        ->and(File::exists($filename))->toBeTrue();

    $savedData = json_decode(File::get($filename), true);
    expect($savedData)->toBe($data);

    File::delete($filename);
});

test('save php array action works', function () {
    $data = ['foo' => 'bar'];
    $filename = tempnam(sys_get_temp_dir(), 'test_php').'.php';

    $action = app(SavePhpArrayAction::class);
    $result = $action->execute($data, $filename);

    expect($result)->toBeTrue()
        ->and(File::exists($filename))->toBeTrue();

    $savedData = include $filename;
    expect($savedData)->toBe($data);

    File::delete($filename);
});
