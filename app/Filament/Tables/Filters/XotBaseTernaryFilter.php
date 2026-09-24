<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Tables\Filters;

use Filament\Tables\Filters\TernaryFilter as FilamentTernaryFilter;

/**
 * Ternary sì/no/tutti.
 *
 * La variante con ToggleButtons raggruppati (al posto del Select full-width del parent)
 * è al momento disattivata: vedi il blocco commentato in setUp(). Le query boolean del
 * parent restano invariate.
 */
abstract class XotBaseTernaryFilter extends FilamentTernaryFilter
{
    protected function setUp(): void
    {
        parent::setUp();
        /*
        $this->schema(function (): array {
            return [
                \Filament\Forms\Components\ToggleButtons::make('value')
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
                    ->stateCast(app(\Filament\Schemas\Components\StateCasts\BooleanStateCast::class, ['isStoredAsInt' => true])),
            ];
        });
        */
    }
}
