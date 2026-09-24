<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Tables\Filters;

<<<<<<< .merge_file_JX2QGD
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< .merge_file_zj90Sv
>>>>>>> laraxot/dev
=======
>>>>>>> 8d801bbe (Check & fix styling)
=======
>>>>>>> .merge_file_ElMD61
use Filament\Forms\Components\ToggleButtons;
use Filament\Schemas\Components\StateCasts\BooleanStateCast;
use Filament\Tables\Filters\TernaryFilter as FilamentTernaryFilter;

/**
<<<<<<< .merge_file_JX2QGD
<<<<<<< HEAD
<<<<<<< HEAD
 * Ternary 
=======
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 8d801bbe (Check & fix styling)
 * Ternary sì/no/tutti con ToggleButtons raggruppati (non Select full-width).
 *
 * Filament TernaryFilter estende SelectFilter: semanticamente ok, UI pesante per 3 stati.
 * Qui si sostituisce il field con ToggleButtons grouped; le query boolean del parent restano.
 *
 * Deselezionare = stato blank («tutti»), come il placeholder del Select precedente.
<<<<<<< HEAD
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
=======
=======
 * Ternary 
>>>>>>> laraxot/dev
>>>>>>> 8d801bbe (Check & fix styling)
=======
 * Ternary
>>>>>>> .merge_file_ElMD61
 */
abstract class XotBaseTernaryFilter extends FilamentTernaryFilter
{
    protected function setUp(): void
    {
        parent::setUp();
<<<<<<< .merge_file_JX2QGD
<<<<<<< HEAD
<<<<<<< HEAD
        /*
        $this->schema(function (): array {
            return [
                ToggleButtons::make('value')
=======
<<<<<<< .merge_file_zj90Sv
<<<<<<< HEAD

=======
<<<<<<< HEAD
=======
>>>>>>> 8d801bbe (Check & fix styling)

=======
        /*
>>>>>>> laraxot/dev
<<<<<<< HEAD
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
=======
        $this->schema(function (): array {
            return [
                ToggleButtons::make('value')
>>>>>>> 8d801bbe (Check & fix styling)
=======
        /*
        $this->schema(function (): array {
            return [
                ToggleButtons::make('value')
>>>>>>> .merge_file_ElMD61
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
<<<<<<< .merge_file_JX2QGD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> .merge_file_ElMD61
                    ->stateCast(app(BooleanStateCast::class, ['isStoredAsInt' => true])),
            ];
        });
        */
<<<<<<< .merge_file_JX2QGD
=======
<<<<<<< .merge_file_zj90Sv
=======
>>>>>>> 8d801bbe (Check & fix styling)
                    ->stateCast(app(BooleanStateCast::class, ['isStoredAsInt' => true])),
            ];
        });
<<<<<<< HEAD
=======
<<<<<<< HEAD
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
>>>>>>> laraxot/dev
=======
        */
>>>>>>> laraxot/dev
>>>>>>> 8d801bbe (Check & fix styling)
=======
>>>>>>> .merge_file_ElMD61
    }
}
