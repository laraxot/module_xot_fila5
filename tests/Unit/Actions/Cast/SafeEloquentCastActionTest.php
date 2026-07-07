<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Unit\Actions\Cast;

use Illuminate\Database\Eloquent\Model;
use Modules\Xot\Actions\Cast\SafeEloquentCastAction;

beforeEach(function (): void {
<<<<<<< HEAD
    $this->action = app(SafeEloquentCastAction::class);
    $this->model = new class extends Model {
        protected $guarded = [];
    };
    $this->model->forceFill([
=======
    $action = app(SafeEloquentCastAction::class);
    $model = new class extends Model {
        protected $guarded = [];
    };
    $model->forceFill([
>>>>>>> origin/dev
        'name' => 'Mario',
        'age' => '42',
        'score' => '12.5',
        'active' => '1',
        'meta' => ['k' => 'v'],
        'empty' => '',
    ]);
});

it('checks attribute presence and emptiness', function (): void {
<<<<<<< HEAD
    expect($this->action->hasAttribute($this->model, 'name'))->toBeTrue()
        ->and($this->action->hasAttribute($this->model, 'missing'))->toBeFalse()
        ->and($this->action->hasNonEmptyAttribute($this->model, 'name'))->toBeTrue()
        ->and($this->action->hasNonEmptyAttribute($this->model, 'empty'))->toBeFalse()
        ->and($this->action->hasAttributeValue($this->model, 'name', 'Mario'))->toBeTrue();
});

it('casts typed attribute getters', function (): void {
    expect($this->action->getStringAttribute($this->model, 'name'))->toBe('Mario')
        ->and($this->action->getIntAttribute($this->model, 'age'))->toBe(42)
        ->and($this->action->getFloatAttribute($this->model, 'score'))->toBe(12.5)
        ->and($this->action->getBooleanAttribute($this->model, 'active'))->toBeTrue()
        ->and($this->action->getArrayAttribute($this->model, 'meta'))->toBe(['k' => 'v'])
        ->and($this->action->getStringAttribute($this->model, 'missing', 'fallback'))->toBe('fallback');
});

it('returns defaults for missing attributes by type', function (): void {
    expect($this->action->getIntAttribute($this->model, 'missing', 9))->toBe(9)
        ->and($this->action->getFloatAttribute($this->model, 'missing', 1.5))->toBe(1.5)
        ->and($this->action->getBooleanAttribute($this->model, 'missing', true))->toBeTrue()
        ->and($this->action->getArrayAttribute($this->model, 'missing', ['d']))->toBe(['d']);
});

it('casts generic typed getter and validation helpers', function (): void {
    expect($this->action->getTypedAttribute($this->model, 'name', 'string'))->toBe('Mario')
        ->and($this->action->getTypedAttribute($this->model, 'age', 'int'))->toBe(42)
        ->and($this->action->getTypedAttribute($this->model, 'score', 'float'))->toBe(12.5)
        ->and($this->action->getTypedAttribute($this->model, 'active', 'bool'))->toBeTrue()
        ->and($this->action->getTypedAttribute($this->model, 'meta', 'array'))->toBe(['k' => 'v']);

    $ok = $this->action->getValidatedAttribute($this->model, 'age', 'int', fn (int $v): bool => 42 === $v, 0);
    $ko = $this->action->getValidatedAttribute($this->model, 'age', 'int', fn (int $v): bool => 0 === $v, 0);
=======
    expect($action->hasAttribute($this->model, 'name'))
        ->and($action->hasAttribute($this->model, 'missing'))
        ->and($action->hasNonEmptyAttribute($this->model, 'name'))
        ->and($action->hasNonEmptyAttribute($this->model, 'empty'))
        ->and($action->hasAttributeValue($this->model, 'name', 'Mario'));
});

it('casts typed attribute getters', function (): void {
    expect($action->getStringAttribute($this->model, 'name'))
        ->and($action->getIntAttribute($this->model, 'age'))
        ->and($action->getFloatAttribute($this->model, 'score'))
        ->and($action->getBooleanAttribute($this->model, 'active'))
        ->and($action->getArrayAttribute($this->model, 'meta'))
        ->and($action->getStringAttribute($this->model, 'missing', 'fallback'));
});

it('returns defaults for missing attributes by type', function (): void {
    expect($action->getIntAttribute($this->model, 'missing', 9))
        ->and($action->getFloatAttribute($this->model, 'missing', 1.5))
        ->and($action->getBooleanAttribute($this->model, 'missing', true))
        ->and($action->getArrayAttribute($this->model, 'missing', ['d']));
});

it('casts generic typed getter and validation helpers', function (): void {
    expect($action->getTypedAttribute($this->model, 'name', 'string'))
        ->and($action->getTypedAttribute($this->model, 'age', 'int'))
        ->and($action->getTypedAttribute($this->model, 'score', 'float'))
        ->and($action->getTypedAttribute($this->model, 'active', 'bool'))
        ->and($action->getTypedAttribute($this->model, 'meta', 'array'));

    $ok = $action->getValidatedAttribute($this->model, 'age', 'int', fn (int $v));
    $ko = $action->getValidatedAttribute($this->model, 'age', 'int', fn (int $v));
>>>>>>> origin/dev

    expect($ok)->toBe(42)->and($ko)->toBe(0);
});

it('checks condition and fallback helpers', function (): void {
<<<<<<< HEAD
    $this->model->setAttribute('nickname', 'SuperMario');

    expect($this->action->hasAttributeCondition($this->model, 'age', fn (mixed $v): bool => 42 === (int) $v))->toBeTrue()
        ->and($this->action->hasAttributeCondition($this->model, 'missing', fn (): bool => true))->toBeFalse()
        ->and($this->action->getAttributeWithFallback($this->model, 'missing', 'nickname', 'string', 'n/a'))->toBe('SuperMario')
        ->and($this->action->getAttributeWithFallback($this->model, 'name', 'nickname', 'string', 'n/a'))->toBe('Mario');
});

it('exposes static helper methods', function (): void {
    expect(SafeEloquentCastAction::has($this->model, 'name'))->toBeTrue()
        ->and(SafeEloquentCastAction::get($this->model, 'age', 'int'))->toBe(42);
=======
    $model->setAttribute('nickname', 'SuperMario');

    expect($action->hasAttributeCondition($this->model, 'age', fn (mixed $v)))
        ->and($action->hasAttributeCondition($this->model, 'missing', fn ()))
        ->and($action->getAttributeWithFallback($this->model, 'missing', 'nickname', 'string', 'n/a'))
        ->and($action->getAttributeWithFallback($this->model, 'name', 'nickname', 'string', 'n/a'));
});

it('exposes static helper methods', function (): void {
    expect(SafeEloquentCastAction::has($model, 'name'))
        ->and(SafeEloquentCastAction::get($model, 'age', 'int'));
>>>>>>> origin/dev
});
