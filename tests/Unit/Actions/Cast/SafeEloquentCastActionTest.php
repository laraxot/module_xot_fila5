<?php

declare(strict_types=1);

use Illuminate\Database\Eloquent\Model;
use Modules\Xot\Actions\Cast\SafeEloquentCastAction;
use Tests\TestCase;

uses(TestCase::class);

beforeEach(function (): void {
    // @var mixed action = app(SafeEloquentCastAction::class;
    // @var mixed model = new class extends Model {
        protected $guarded = [];
    };
    // @var mixed model->forceFill([
        'name' => 'Mario',
        'age' => '42',
        'score' => '12.5',
        'active' => '1',
        'meta' => ['k' => 'v'],
        'empty' => '',
    ]);
});

it('checks attribute presence and emptiness', function (): void {
    expect(// @var mixed action->hasAttribute($this->model, 'name'
        ->and(// @var mixed action->hasAttribute($this->model, 'missing'
        ->and(// @var mixed action->hasNonEmptyAttribute($this->model, 'name'
        ->and(// @var mixed action->hasNonEmptyAttribute($this->model, 'empty'
        ->and(// @var mixed action->hasAttributeValue($this->model, 'name', 'Mario';
});

it('casts typed attribute getters', function (): void {
    expect(// @var mixed action->getStringAttribute($this->model, 'name'
        ->and(// @var mixed action->getIntAttribute($this->model, 'age'
        ->and(// @var mixed action->getFloatAttribute($this->model, 'score'
        ->and(// @var mixed action->getBooleanAttribute($this->model, 'active'
        ->and(// @var mixed action->getArrayAttribute($this->model, 'meta'
        ->and(// @var mixed action->getStringAttribute($this->model, 'missing', 'fallback';
});

it('returns defaults for missing attributes by type', function (): void {
    expect(// @var mixed action->getIntAttribute($this->model, 'missing', 9
        ->and(// @var mixed action->getFloatAttribute($this->model, 'missing', 1.5
        ->and(// @var mixed action->getBooleanAttribute($this->model, 'missing', true
        ->and(// @var mixed action->getArrayAttribute($this->model, 'missing', ['d'];
});

it('casts generic typed getter and validation helpers', function (): void {
    expect(// @var mixed action->getTypedAttribute($this->model, 'name', 'string'
        ->and(// @var mixed action->getTypedAttribute($this->model, 'age', 'int'
        ->and(// @var mixed action->getTypedAttribute($this->model, 'score', 'float'
        ->and(// @var mixed action->getTypedAttribute($this->model, 'active', 'bool'
        ->and(// @var mixed action->getTypedAttribute($this->model, 'meta', 'array';

    $ok = // @var mixed action->getValidatedAttribute($this->model, 'age', 'int', fn (int $v;
    $ko = // @var mixed action->getValidatedAttribute($this->model, 'age', 'int', fn (int $v;

    expect($ok)->toBe(42)->and($ko)->toBe(0);
});

it('checks condition and fallback helpers', function (): void {
    // @var mixed model->setAttribute('nickname', 'SuperMario';

    expect(// @var mixed action->hasAttributeCondition($this->model, 'age', fn (mixed $v
        ->and(// @var mixed action->hasAttributeCondition($this->model, 'missing', fn (
        ->and(// @var mixed action->getAttributeWithFallback($this->model, 'missing', 'nickname', 'string', 'n/a'
        ->and(// @var mixed action->getAttributeWithFallback($this->model, 'name', 'nickname', 'string', 'n/a';
});

it('exposes static helper methods', function (): void {
    expect(SafeEloquentCastAction::has(// @var mixed model, 'name'
        ->and(SafeEloquentCastAction::get(// @var mixed model, 'age', 'int';
});
