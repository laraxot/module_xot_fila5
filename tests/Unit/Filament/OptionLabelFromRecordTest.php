<?php

declare(strict_types=1);
<<<<<<< HEAD
<<<<<<< .merge_file_kCi5wP

=======
>>>>>>> laraxot/dev
=======
=======
<<<<<<< .merge_file_erFiBk
<<<<<<< HEAD

=======
<<<<<<< HEAD

=======
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======

>>>>>>> .merge_file_alEzQk
>>>>>>> laraxot/dev
>>>>>>> .merge_file_4CbXGa
use Modules\Xot\Tests\TestCase;
use Modules\Xot\Tests\Unit\Support\DummyTestModel;
use Modules\Xot\Tests\Unit\Support\OptionLabelProbeForm;

uses(TestCase::class)->group('no-xot-db');

<<<<<<< .merge_file_kCi5wP
/**
=======
<<<<<<< HEAD
/**
=======
<<<<<<< .merge_file_erFiBk
/**
=======
/*
>>>>>>> .merge_file_alEzQk
>>>>>>> laraxot/dev
>>>>>>> .merge_file_4CbXGa
 * Regressione: una colonna titolo nulla faceva arrivare `null` a
 * `Filament\Forms\Components\Select::isOptionDisabled(string|Htmlable $label)`
 * e mandava in TypeError l'intera pagina di edit.
 */
describe('etichetta opzione da record', function (): void {
    it('usa la colonna titolo quando e\' valorizzata', function (): void {
<<<<<<< .merge_file_kCi5wP
        $record = new DummyTestModel;
=======
<<<<<<< HEAD
        $record = new DummyTestModel;
=======
<<<<<<< .merge_file_erFiBk
        $record = new DummyTestModel;
=======
        $record = new DummyTestModel();
>>>>>>> .merge_file_alEzQk
>>>>>>> laraxot/dev
>>>>>>> .merge_file_4CbXGa
        $record->setAttribute('name', 'Viva Servizi');

        expect(OptionLabelProbeForm::labelFor($record))->toBe('Viva Servizi');
    });

    it('ripiega sulla chiave primaria quando la colonna titolo e\' nulla', function (): void {
<<<<<<< .merge_file_kCi5wP
        $record = new DummyTestModel;
=======
<<<<<<< HEAD
        $record = new DummyTestModel;
=======
<<<<<<< .merge_file_erFiBk
        $record = new DummyTestModel;
=======
        $record = new DummyTestModel();
>>>>>>> .merge_file_alEzQk
>>>>>>> laraxot/dev
>>>>>>> .merge_file_4CbXGa
        $record->setAttribute('name', null);
        $record->setAttribute('id', 24);

        expect(OptionLabelProbeForm::labelFor($record))->toBe('#24');
    });

    it('ripiega sulla chiave primaria quando la colonna titolo e\' vuota', function (): void {
<<<<<<< .merge_file_kCi5wP
        $record = new DummyTestModel;
=======
<<<<<<< HEAD
        $record = new DummyTestModel;
=======
<<<<<<< .merge_file_erFiBk
        $record = new DummyTestModel;
=======
        $record = new DummyTestModel();
>>>>>>> .merge_file_alEzQk
>>>>>>> laraxot/dev
>>>>>>> .merge_file_4CbXGa
        $record->setAttribute('name', '');
        $record->setAttribute('id', 7);

        expect(OptionLabelProbeForm::labelFor($record))->toBe('#7');
    });

    it('rispetta una colonna titolo diversa da name', function (): void {
<<<<<<< .merge_file_kCi5wP
        $record = new DummyTestModel;
=======
<<<<<<< HEAD
        $record = new DummyTestModel;
=======
<<<<<<< .merge_file_erFiBk
        $record = new DummyTestModel;
=======
        $record = new DummyTestModel();
>>>>>>> .merge_file_alEzQk
>>>>>>> laraxot/dev
>>>>>>> .merge_file_4CbXGa
        $record->setAttribute('title', 'Contratto 2026');

        expect(OptionLabelProbeForm::labelFor($record, 'title'))->toBe('Contratto 2026');
    });
});
