<?php

declare(strict_types=1);

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
use Illuminate\Database\Eloquent\Model;
use Modules\Xot\Models\XotBaseModel;
use Modules\Xot\Traits\Updater;
use Tests\TestCase;
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
=======
<<<<<<< HEAD
>>>>>>> 6cba4fe (.)
>>>>>>> 399f46d3 (.)
=======
>>>>>>> ca9324a4 (.)
=======
>>>>>>> 5a14301c (.)
=======
=======
<<<<<<< HEAD
>>>>>>> 6cba4fe (.)
>>>>>>> 399f46d3 (.)
=======
>>>>>>> ca9324a4 (.)
=======
=======
<<<<<<< HEAD
>>>>>>> 6cba4fe (.)
>>>>>>> 17684f52 (.)
=======
>>>>>>> 9db27d12 (.)
use Tests\TestCase;
use Illuminate\Database\Eloquent\Model;
use Modules\Xot\Models\XotBaseModel;
use Modules\Xot\Traits\Updater;
<<<<<<< HEAD
>>>>>>> 5a14301c (.)
=======
>>>>>>> 5a14301c (.)
=======
<<<<<<< HEAD
=======

use function Safe\file_get_contents;
>>>>>>> a6ef6dc7 (.)
>>>>>>> b7afadf9 (.)
=======
>>>>>>> 71586de2 (.)

uses(TestCase::class);

test('xot base model extends eloquent model', function (): void {
    $reflection = new ReflectionClass(XotBaseModel::class);

    expect($reflection->isSubclassOf(Model::class))->toBeTrue();
});

test('xot base model is abstract', function (): void {
    $reflection = new ReflectionClass(XotBaseModel::class);

    expect($reflection->isAbstract())->toBeTrue();
});

test('xot base model uses updater trait', function (): void {
    $reflection = new ReflectionClass(XotBaseModel::class);
    $traits = $reflection->getTraitNames();

    expect($traits)->toContain(Updater::class);
});

test('xot base model has correct snake attributes setting', function (): void {
    expect(XotBaseModel::$snakeAttributes)->toBeTrue();
});

test('xot base model has correct per page setting', function (): void {
    $reflection = new ReflectionClass(XotBaseModel::class);
    $perPageProperty = $reflection->getProperty('perPage');
    // For protected instance property on abstract class, assert the default value
    $default = $perPageProperty->getDefaultValue();
    expect($default)->toBe(30);
});

test('xot base model has correct namespace', function (): void {
    expect(XotBaseModel::class)->toContain('Modules\Xot\Models');
});

test('xot base model has correct strict types declaration', function (): void {
    $reflection = new ReflectionClass(XotBaseModel::class);
    $filename = $reflection->getFileName();

    if ($filename) {
        $content = file_get_contents($filename);
        expect($content)->toContain('declare(strict_types=1);');
    }
});

test('xot base model has correct use statements', function (): void {
    $reflection = new ReflectionClass(XotBaseModel::class);
    $filename = $reflection->getFileName();

    if ($filename) {
        $content = file_get_contents($filename);
        expect($content)->toContain('use Illuminate\Database\Eloquent\Model;');
        expect($content)->toContain('use Modules\Xot\Traits\Updater;');
    }
});

test('xot base model has correct property types', function (): void {
    $reflection = new ReflectionClass(XotBaseModel::class);

    $snakeAttributesProperty = $reflection->getProperty('snakeAttributes');
    $perPageProperty = $reflection->getProperty('perPage');

    $snakeType = $snakeAttributesProperty->getType();
    $perPageType = $perPageProperty->getType();

    // Some properties may not have explicit type declarations; in that case just ensure defaults are as expected
<<<<<<< HEAD
    if ($snakeType instanceof \ReflectionNamedType) {
=======
    if ($snakeType !== null) {
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        /* @phpstan-ignore-next-line method.notFound, argument.templateType */
>>>>>>> cc7fb225 (.)
=======
>>>>>>> 53d6a6ba (.)
=======
        /* @phpstan-ignore-next-line method.notFound, argument.templateType */
>>>>>>> b7afadf9 (.)
=======
>>>>>>> 71586de2 (.)
=======
>>>>>>> 249a0067 (.)
        expect($snakeType->getName())->toBe('bool');
    } else {
        expect(XotBaseModel::$snakeAttributes)->toBeTrue();
    }

<<<<<<< HEAD
    if ($perPageType instanceof \ReflectionNamedType) {
=======
    if ($perPageType !== null) {
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        /* @phpstan-ignore-next-line method.notFound, argument.templateType */
>>>>>>> cc7fb225 (.)
=======
>>>>>>> 53d6a6ba (.)
=======
        /* @phpstan-ignore-next-line method.notFound, argument.templateType */
>>>>>>> b7afadf9 (.)
=======
>>>>>>> 71586de2 (.)
=======
>>>>>>> 249a0067 (.)
        expect($perPageType->getName())->toBe('int');
    } else {
        expect($perPageProperty->getDefaultValue())->toBe(30);
    }
});

test('xot base model has correct property visibility', function (): void {
    $reflection = new ReflectionClass(XotBaseModel::class);

    $snakeAttributesProperty = $reflection->getProperty('snakeAttributes');
    $perPageProperty = $reflection->getProperty('perPage');

    expect($snakeAttributesProperty->isPublic())->toBeTrue();
    expect($perPageProperty->isProtected())->toBeTrue();
});
