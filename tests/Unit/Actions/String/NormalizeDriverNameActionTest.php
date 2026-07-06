<?php

declare(strict_types=1);

use Modules\Xot\Actions\String\NormalizeDriverNameAction;
use PHPUnit\Framework\Assert;

uses(Modules\Xot\Tests\TestCase::class);

it('normalizes driver names correctly', function (): void {
    $action = app(NormalizeDriverNameAction::class);

    expect($action->execute('360-Dialog'))->toBe('360dialog');
    expect($action->execute('My_Driver'))->toBe('mydriver');
    expect($action->execute('Spaces In Name'))->toBe('spacesinname');
    expect($action->execute('UPPERcase'))->toBe('uppercase');
});
