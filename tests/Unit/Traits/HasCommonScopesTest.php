<?php

declare(strict_types=1);
<<<<<<< HEAD
=======

<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
/*
 * Isolated unit tests for HasCommonScopes.
 *
 * Deliberately does NOT use Modules\Xot\Tests\TestCase: that base class
 * opens transactions on the app's configured mysql/sqlite connections
 * during setUp(), which is unrelated to what this trait needs and depends
 * on env wiring outside this test's control. Instead we boot a throwaway
 * in-memory SQLite connection via Eloquent's Capsule, so these tests are
 * fast, deterministic, and independent of the app's database config.
 */

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Support\Carbon;
use Modules\Xot\Tests\Fixtures\Models\HasCommonScopesProbe;
<<<<<<< HEAD
use PHPUnit\Framework\Assert;
=======
>>>>>>> 930f8146 (Check & fix styling)

beforeEach(function (): void {
<<<<<<< .merge_file_LCb7vH
<<<<<<< HEAD
<<<<<<< HEAD
    $capsule = new Capsule;
=======
    $capsule = new Capsule();
>>>>>>> laraxot/dev
=======
    $capsule = new Capsule();
>>>>>>> 3792da0d (Check & fix styling)
=======
    $capsule = new Capsule;
>>>>>>> .merge_file_0LbL6n
    $capsule->addConnection([
        'driver' => 'sqlite',
        'database' => ':memory:',
        'prefix' => '',
    ]);
    $capsule->setAsGlobal();
    $capsule->bootEloquent();
});

it('builds correct sql for scopeActive', function (): void {
    $sql = HasCommonScopesProbe::query()->active()->toSql();

<<<<<<< HEAD
    Assert::assertSame('select * from "has_common_scopes_probes" where "is_active" = ?', $sql);
=======
    expect($sql)->toBe('select * from "has_common_scopes_probes" where "is_active" = ?');
>>>>>>> 930f8146 (Check & fix styling)
});

it('builds correct sql for scopeInactive', function (): void {
    $query = HasCommonScopesProbe::query()->inactive();

<<<<<<< HEAD
    Assert::assertSame('select * from "has_common_scopes_probes" where "is_active" = ?', $query->toSql());
    Assert::assertSame([false], $query->getBindings());
=======
    expect($query->toSql())->toBe('select * from "has_common_scopes_probes" where "is_active" = ?')
        ->and($query->getBindings())->toBe([false]);
>>>>>>> 930f8146 (Check & fix styling)
});

it('builds correct sql for scopePublished', function (): void {
    $sql = HasCommonScopesProbe::query()->published()->toSql();

<<<<<<< HEAD
    Assert::assertSame('select * from "has_common_scopes_probes" where "published_at" is not null and "published_at" <= ?', $sql);
=======
    expect($sql)->toBe('select * from "has_common_scopes_probes" where "published_at" is not null and "published_at" <= ?');
>>>>>>> 930f8146 (Check & fix styling)
});

it('builds correct sql for scopeDraft', function (): void {
    $sql = HasCommonScopesProbe::query()->draft()->toSql();

<<<<<<< HEAD
    Assert::assertSame('select * from "has_common_scopes_probes" where ("published_at" is null or "published_at" > ?)', $sql);
=======
    expect($sql)->toBe('select * from "has_common_scopes_probes" where ("published_at" is null or "published_at" > ?)');
>>>>>>> 930f8146 (Check & fix styling)
});

it('builds correct sql for scopeCreatedAfter/Before and updatedAfter/createdBy', function (): void {
    $date = '2026-01-01';

<<<<<<< HEAD
    Assert::assertSame([$date], HasCommonScopesProbe::query()->createdAfter($date)->getBindings());
    Assert::assertSame([$date], HasCommonScopesProbe::query()->createdBefore($date)->getBindings());
    Assert::assertSame([$date], HasCommonScopesProbe::query()->updatedAfter($date)->getBindings());
    Assert::assertSame([42], HasCommonScopesProbe::query()->createdBy(42)->getBindings());
=======
    expect(HasCommonScopesProbe::query()->createdAfter($date)->getBindings())->toBe([$date])
        ->and(HasCommonScopesProbe::query()->createdBefore($date)->getBindings())->toBe([$date])
        ->and(HasCommonScopesProbe::query()->updatedAfter($date)->getBindings())->toBe([$date])
        ->and(HasCommonScopesProbe::query()->createdBy(42)->getBindings())->toBe([42]);
>>>>>>> 930f8146 (Check & fix styling)
});

it('reports isPublished true when published_at is in the past', function (): void {
    $model = new HasCommonScopesProbe(['published_at' => Carbon::now()->subDay()]);

<<<<<<< HEAD
    Assert::assertTrue($model->isPublished());
    Assert::assertFalse($model->isDraft());
=======
    expect($model->isPublished())->toBeTrue()
        ->and($model->isDraft())->toBeFalse();
>>>>>>> 930f8146 (Check & fix styling)
});

it('reports isPublished false when published_at is null', function (): void {
    $model = new HasCommonScopesProbe(['published_at' => null]);

<<<<<<< HEAD
    Assert::assertFalse($model->isPublished());
    Assert::assertTrue($model->isDraft());
=======
    expect($model->isPublished())->toBeFalse()
        ->and($model->isDraft())->toBeTrue();
>>>>>>> 930f8146 (Check & fix styling)
});

it('reports isPublished false when published_at is in the future', function (): void {
    $model = new HasCommonScopesProbe(['published_at' => Carbon::now()->addDay()]);

<<<<<<< HEAD
    Assert::assertFalse($model->isPublished());
    Assert::assertTrue($model->isDraft());
=======
    expect($model->isPublished())->toBeFalse()
        ->and($model->isDraft())->toBeTrue();
>>>>>>> 930f8146 (Check & fix styling)
});

it('reports isActive correctly based on is_active flag', function (): void {
    $active = new HasCommonScopesProbe(['is_active' => true]);
    $inactive = new HasCommonScopesProbe(['is_active' => false]);
<<<<<<< .merge_file_LCb7vH
<<<<<<< HEAD
<<<<<<< HEAD
    $unset = new HasCommonScopesProbe;
=======
    $unset = new HasCommonScopesProbe();
>>>>>>> laraxot/dev
=======
    $unset = new HasCommonScopesProbe();
>>>>>>> 3792da0d (Check & fix styling)
=======
    $unset = new HasCommonScopesProbe;
>>>>>>> .merge_file_0LbL6n

<<<<<<< HEAD
    Assert::assertTrue($active->isActive());
    Assert::assertFalse($inactive->isActive());
    Assert::assertFalse($unset->isActive());
=======
    expect($active->isActive())->toBeTrue()
        ->and($inactive->isActive())->toBeFalse()
        ->and($unset->isActive())->toBeFalse();
>>>>>>> 930f8146 (Check & fix styling)
});
