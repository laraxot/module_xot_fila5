<?php

declare(strict_types=1);

<<<<<<< HEAD
use Illuminate\Support\Collection;
=======
>>>>>>> laraxot/dev
use Illuminate\Support\Facades\Lang;
use Modules\Xot\Actions\Collection\TransCollectionAction;
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

it('translates collection items correctly', function (): void {
    $collection = collect(['apple', 'banana', 'orange.juice']);
    $transKey = 'fruits';

    Lang::addLines([
        'fruits.apple' => 'Mela',
        'fruits.banana' => 'Banana',
        'fruits.orange_juice' => 'Spremuta d\'arancia',
    ], 'it');

    app()->setLocale('it');

    $action = app(TransCollectionAction::class);
<<<<<<< HEAD
    /** @var Collection<int|string, mixed> $collection */
=======
    /** @var Illuminate\Support\Collection<int|string, mixed> $collection */
>>>>>>> laraxot/dev
    $result = $action->execute($collection, $transKey);

    Assert::assertSame([
        'Mela',
        'Banana',
        'Spremuta d\'arancia',
    ], $result->all());
});

it('returns original items if transKey is null', function (): void {
<<<<<<< HEAD
    /** @var Collection<int|string, mixed> $collection */
=======
    /** @var Illuminate\Support\Collection<int|string, mixed> $collection */
>>>>>>> laraxot/dev
    $collection = collect(['a', 1, null]);
    $action = app(TransCollectionAction::class);
    $result = $action->execute($collection, null);

    Assert::assertSame(['a', '1', ''], $result->all());
});

it('returns original item if translation not found', function (): void {
<<<<<<< HEAD
    /** @var Collection<int|string, mixed> $collection */
=======
    /** @var Illuminate\Support\Collection<int|string, mixed> $collection */
>>>>>>> laraxot/dev
    $collection = collect(['unknown']);
    $action = app(TransCollectionAction::class);
    $result = $action->execute($collection, 'missing');

    Assert::assertSame(['unknown'], $result->all());
});
