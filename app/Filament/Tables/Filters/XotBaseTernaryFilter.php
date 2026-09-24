<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Tables\Filters;

<<<<<<< .merge_file_yOOsiU
=======
<<<<<<< HEAD
=======
<<<<<<< .merge_file_zj90Sv
>>>>>>> laraxot/dev
>>>>>>> .merge_file_vK8qWo
use Filament\Forms\Components\ToggleButtons;
use Filament\Schemas\Components\StateCasts\BooleanStateCast;
use Filament\Tables\Filters\TernaryFilter as FilamentTernaryFilter;

/**
<<<<<<< HEAD
<<<<<<< .merge_file_yOOsiU
=======
 * Ternary 
=======
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> laraxot/dev
>>>>>>> .merge_file_vK8qWo
 * Ternary sì/no/tutti con ToggleButtons raggruppati (non Select full-width).
 *
 * Filament TernaryFilter estende SelectFilter: semanticamente ok, UI pesante per 3 stati.
 * Qui si sostituisce il field con ToggleButtons grouped; le query boolean del parent restano.
 *
 * Deselezionare = stato blank («tutti»), come il placeholder del Select precedente.
<<<<<<< .merge_file_yOOsiU
=======
 * Ternary 
>>>>>>> laraxot/dev
=======
<<<<<<< HEAD
=======
=======
 * Ternary 
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======
use Filament\Tables\Filters\TernaryFilter as FilamentTernaryFilter;

/**
 * Ternary sì/no/tutti.
 *
 * La variante con ToggleButtons raggruppati (al posto del Select full-width del parent)
 * è al momento disattivata: vedi il blocco commentato in setUp(). Le query boolean del
 * parent restano invariate.
>>>>>>> .merge_file_UIWvtc
>>>>>>> laraxot/dev
>>>>>>> .merge_file_vK8qWo
 */
abstract class XotBaseTernaryFilter extends FilamentTernaryFilter
{
    protected function setUp(): void
    {
        parent::setUp();
<<<<<<< HEAD
<<<<<<< .merge_file_yOOsiU
=======
        /*
        $this->schema(function (): array {
            return [
                ToggleButtons::make('value')
=======
<<<<<<< .merge_file_zj90Sv
<<<<<<< HEAD

=======
<<<<<<< HEAD
>>>>>>> .merge_file_vK8qWo

=======
        /*
>>>>>>> laraxot/dev
<<<<<<< .merge_file_yOOsiU
        $this->schema(function (): array {
            return [
                ToggleButtons::make('value')
=======
>>>>>>> laraxot/dev
        $this->schema(function (): array {
            return [
                ToggleButtons::make('value')
=======
        /*
        $this->schema(function (): array {
            return [
                \Filament\Forms\Components\ToggleButtons::make('value')
>>>>>>> .merge_file_UIWvtc
>>>>>>> laraxot/dev
>>>>>>> .merge_file_vK8qWo
                    ->hiddenLabel()
                    ->grouped()
                    ->options([
                        1 => $this->getTrueLabel() ?? __('filament-forms::components.select.boolean.true'),
                        0 => $this->getFalseLabel() ?? __('filament-forms::components.select.boolean.false'),
                    ])
                    ->colors([
                        1 => 'success',
                        0 => 'danger',
                    ])
<<<<<<< .merge_file_yOOsiU
=======
<<<<<<< HEAD
                    ->stateCast(app(BooleanStateCast::class, ['isStoredAsInt' => true])),
            ];
        });
        */
=======
<<<<<<< .merge_file_zj90Sv
>>>>>>> .merge_file_vK8qWo
                    ->stateCast(app(BooleanStateCast::class, ['isStoredAsInt' => true])),
            ];
        });
<<<<<<< HEAD
=======
<<<<<<< .merge_file_yOOsiU
        */
=======
<<<<<<< HEAD
=======
        */
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======
                    ->stateCast(app(\Filament\Schemas\Components\StateCasts\BooleanStateCast::class, ['isStoredAsInt' => true])),
            ];
        });
        */
>>>>>>> .merge_file_UIWvtc
>>>>>>> .merge_file_vK8qWo
>>>>>>> laraxot/dev
    }
}
