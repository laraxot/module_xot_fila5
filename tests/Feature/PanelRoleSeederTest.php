<?php

declare(strict_types=1);
use Filament\Facades\Filament;
use Modules\User\Models\Role;
use Modules\Xot\Database\Seeders\PanelRoleSeeder;
use Modules\Xot\Tests\TestCase;

uses(TestCase::class);

<<<<<<< .merge_file_4iUzLQ
<<<<<<< HEAD
/**
=======
/*
>>>>>>> laraxot/dev
=======
<<<<<<< .merge_file_0aTTqU
/**
=======
<<<<<<< HEAD
/**
=======
/*
>>>>>>> laraxot/dev
>>>>>>> .merge_file_dyFe4G
>>>>>>> .merge_file_06nJZo
 * `BaseUser::canAccessPanel()` apre un pannello a chi ha il ruolo omonimo al suo
 * id. Finche' nessuno creava quei ruoli, ogni pannello verticale rispondeva 403
 * su un database appena migrato: 23 test lo dimostravano e nessuno leggeva il
 * perche'. Questo test tiene fermo il patto fra le due meta'.
 */
it('crea un ruolo per ogni pannello registrato', function (): void {
    $this->prepareSharedSqliteForTesting();

    $panelIds = array_keys(Filament::getPanels());

    expect($panelIds)->not->toBeEmpty();

    Role::query()->whereIn('name', $panelIds)->delete();

<<<<<<< .merge_file_4iUzLQ
=======
<<<<<<< .merge_file_0aTTqU
    (new PanelRoleSeeder)->run();
=======
>>>>>>> .merge_file_06nJZo
<<<<<<< HEAD
    (new PanelRoleSeeder)->run();
=======
    (new PanelRoleSeeder())->run();
>>>>>>> laraxot/dev
<<<<<<< .merge_file_4iUzLQ
=======
>>>>>>> .merge_file_dyFe4G
>>>>>>> .merge_file_06nJZo

    foreach ($panelIds as $panelId) {
        expect(Role::query()->where('name', $panelId)->exists())
            ->toBeTrue("manca il ruolo del pannello [{$panelId}]");
    }
});

it('non duplica i ruoli se gira due volte', function (): void {
    $this->prepareSharedSqliteForTesting();

<<<<<<< .merge_file_4iUzLQ
=======
<<<<<<< .merge_file_0aTTqU
    $seeder = new PanelRoleSeeder;
=======
>>>>>>> .merge_file_06nJZo
<<<<<<< HEAD
    $seeder = new PanelRoleSeeder;
=======
    $seeder = new PanelRoleSeeder();
>>>>>>> laraxot/dev
<<<<<<< .merge_file_4iUzLQ
=======
>>>>>>> .merge_file_dyFe4G
>>>>>>> .merge_file_06nJZo
    $seeder->run();
    $seeder->run();

    $panelId = array_key_first(Filament::getPanels());

    expect(Role::query()->where('name', $panelId)->count())->toBe(1);
});
