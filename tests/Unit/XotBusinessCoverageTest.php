<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Unit;

<<<<<<< HEAD
use Mockery;
=======
<<<<<<< .merge_file_hANHCq
<<<<<<< HEAD
use Mockery;
=======
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_EPx84w
>>>>>>> laraxot/dev
use Modules\Xot\Tests\ModuleBusinessCoverage;
use Modules\Xot\Tests\TestCase;

uses(TestCase::class)->group('no-xot-db');

afterEach(function (): void {
<<<<<<< HEAD
    Mockery::close();
=======
<<<<<<< .merge_file_hANHCq
<<<<<<< HEAD
    Mockery::close();
=======
    \Mockery::close();
>>>>>>> laraxot/dev
=======
    \Mockery::close();
>>>>>>> .merge_file_EPx84w
>>>>>>> laraxot/dev
});

/** @return array{string, string} */
/** @return list{string, string} */
function xotBusinessContext(): array
{
    return [dirname(__DIR__, 2).'/app', 'Modules\\Xot\\'];
}

describe('Xot business coverage', function (): void {
    test('all policies execute authorization methods', function (): void {
        [$appRoot, $ns] = xotBusinessContext();
        ModuleBusinessCoverage::testAllPolicies($appRoot, $ns);
    });

    test('all models expose table and fillable', function (): void {
        [$appRoot, $ns] = xotBusinessContext();
        ModuleBusinessCoverage::testAllModels($appRoot, $ns);
    });

    test('all actions are resolvable', function (): void {
        [$appRoot, $ns] = xotBusinessContext();
        ModuleBusinessCoverage::testAllActions($appRoot, $ns);
    });

    test('all datas are loadable', function (): void {
        [$appRoot, $ns] = xotBusinessContext();
        ModuleBusinessCoverage::testAllDatas($appRoot, $ns);
    });
});
