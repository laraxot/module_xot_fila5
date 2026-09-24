<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Unit;

use Modules\Xot\Casts\PhoneCast;
use Modules\Xot\Models\Cache;
use Modules\Xot\Tests\TestCase;
use Modules\Xot\ValueObjects\PhoneValueObject;

uses(TestCase::class)->group('no-xot-db');

test('phone cast round-trips a validated value object', function (): void {
<<<<<<< HEAD
    $cast = new PhoneCast;
    $phone = PhoneValueObject::fromString('+15551234567');
    $model = new Cache;
<<<<<<< .merge_file_RZxV7p
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_cj63PR
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
    $cast = new PhoneCast;
    $phone = PhoneValueObject::fromString('+15551234567');
    $model = new Cache;
=======
=======
>>>>>>> 3792da0d (Check & fix styling)
    $cast = new PhoneCast();
    $phone = PhoneValueObject::fromString('+15551234567');
    $model = new Cache();
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
    $cast = new PhoneCast();
    $phone = PhoneValueObject::fromString('+15551234567');
    $model = new Cache();
>>>>>>> .merge_file_xXfdDi
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_zFlNb6
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)

    expect($cast->set($model, 'phone', $phone, []))->toBe('+15551234567')
        ->and($cast->get($model, 'phone', '+15551234567', [])->toString())->toBe('+15551234567');
});

test('phone cast rejects storage values without the domain type', function (): void {
<<<<<<< HEAD
<<<<<<< .merge_file_RZxV7p
<<<<<<< HEAD
    expect(fn (): string => (new PhoneCast)->set(new Cache, 'phone', null, []))
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_cj63PR
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
    expect(fn (): string => (new PhoneCast)->set(new Cache, 'phone', null, []))
=======
    expect(fn (): string => (new PhoneCast())->set(new Cache(), 'phone', null, []))
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
    expect(fn (): string => (new PhoneCast())->set(new Cache(), 'phone', null, []))
>>>>>>> .merge_file_xXfdDi
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
    expect(fn (): string => (new PhoneCast())->set(new Cache(), 'phone', null, []))
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
    expect(fn (): string => (new PhoneCast)->set(new Cache, 'phone', null, []))
>>>>>>> .merge_file_zFlNb6
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
        ->toThrow(\InvalidArgumentException::class);
});
