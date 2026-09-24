<?php

declare(strict_types=1);
<<<<<<< HEAD
<<<<<<< .merge_file_3p12TE
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
<<<<<<< HEAD
>>>>>>> da9ae01a0 (.)
<<<<<<< .merge_file_erFiBk
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
=======
>>>>>>> 3792da0d (Check & fix styling)

=======
<<<<<<< HEAD

=======
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======

>>>>>>> .merge_file_alEzQk
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_qt0G8Q
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
use Modules\Xot\Tests\TestCase;
use Modules\Xot\Tests\Unit\Support\DummyTestModel;
use Modules\Xot\Tests\Unit\Support\OptionLabelProbeForm;

uses(TestCase::class)->group('no-xot-db');

<<<<<<< HEAD
<<<<<<< .merge_file_3p12TE
<<<<<<< HEAD
<<<<<<< HEAD
/**
=======
=======
<<<<<<< HEAD
>>>>>>> da9ae01a0 (.)
<<<<<<< .merge_file_erFiBk
/**
=======
/*
>>>>>>> .merge_file_alEzQk
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
/**
>>>>>>> 3792da0d (Check & fix styling)
=======
/**
>>>>>>> .merge_file_qt0G8Q
=======
=======
/**
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
 * Regressione: una colonna titolo nulla faceva arrivare `null` a
 * `Filament\Forms\Components\Select::isOptionDisabled(string|Htmlable $label)`
 * e mandava in TypeError l'intera pagina di edit.
 */
describe('etichetta opzione da record', function (): void {
    it('usa la colonna titolo quando e\' valorizzata', function (): void {
<<<<<<< HEAD
<<<<<<< .merge_file_3p12TE
<<<<<<< HEAD
<<<<<<< HEAD
        $record = new DummyTestModel;
=======
=======
<<<<<<< HEAD
>>>>>>> da9ae01a0 (.)
<<<<<<< .merge_file_erFiBk
        $record = new DummyTestModel;
=======
        $record = new DummyTestModel();
>>>>>>> .merge_file_alEzQk
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
        $record = new DummyTestModel;
>>>>>>> 3792da0d (Check & fix styling)
=======
        $record = new DummyTestModel;
>>>>>>> .merge_file_qt0G8Q
=======
=======
        $record = new DummyTestModel;
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
        $record->setAttribute('name', 'Viva Servizi');

        expect(OptionLabelProbeForm::labelFor($record))->toBe('Viva Servizi');
    });

    it('ripiega sulla chiave primaria quando la colonna titolo e\' nulla', function (): void {
<<<<<<< HEAD
<<<<<<< .merge_file_3p12TE
<<<<<<< HEAD
<<<<<<< HEAD
        $record = new DummyTestModel;
=======
=======
<<<<<<< HEAD
>>>>>>> da9ae01a0 (.)
<<<<<<< .merge_file_erFiBk
        $record = new DummyTestModel;
=======
        $record = new DummyTestModel();
>>>>>>> .merge_file_alEzQk
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
        $record = new DummyTestModel;
>>>>>>> 3792da0d (Check & fix styling)
=======
        $record = new DummyTestModel;
>>>>>>> .merge_file_qt0G8Q
=======
=======
        $record = new DummyTestModel;
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
        $record->setAttribute('name', null);
        $record->setAttribute('id', 24);

        expect(OptionLabelProbeForm::labelFor($record))->toBe('#24');
    });

    it('ripiega sulla chiave primaria quando la colonna titolo e\' vuota', function (): void {
<<<<<<< HEAD
<<<<<<< .merge_file_3p12TE
<<<<<<< HEAD
<<<<<<< HEAD
        $record = new DummyTestModel;
=======
=======
<<<<<<< HEAD
>>>>>>> da9ae01a0 (.)
<<<<<<< .merge_file_erFiBk
        $record = new DummyTestModel;
=======
        $record = new DummyTestModel();
>>>>>>> .merge_file_alEzQk
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
        $record = new DummyTestModel;
>>>>>>> 3792da0d (Check & fix styling)
=======
        $record = new DummyTestModel;
>>>>>>> .merge_file_qt0G8Q
=======
=======
        $record = new DummyTestModel;
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
        $record->setAttribute('name', '');
        $record->setAttribute('id', 7);

        expect(OptionLabelProbeForm::labelFor($record))->toBe('#7');
    });

    it('rispetta una colonna titolo diversa da name', function (): void {
<<<<<<< HEAD
<<<<<<< .merge_file_3p12TE
<<<<<<< HEAD
<<<<<<< HEAD
        $record = new DummyTestModel;
=======
=======
<<<<<<< HEAD
>>>>>>> da9ae01a0 (.)
<<<<<<< .merge_file_erFiBk
        $record = new DummyTestModel;
=======
        $record = new DummyTestModel();
>>>>>>> .merge_file_alEzQk
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
        $record = new DummyTestModel;
>>>>>>> 3792da0d (Check & fix styling)
=======
        $record = new DummyTestModel;
>>>>>>> .merge_file_qt0G8Q
=======
=======
        $record = new DummyTestModel;
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
        $record->setAttribute('title', 'Contratto 2026');

        expect(OptionLabelProbeForm::labelFor($record, 'title'))->toBe('Contratto 2026');
    });
});
