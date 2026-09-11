<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Unit\Support;

use Illuminate\Database\Eloquent\Model;
use Modules\Xot\Filament\Resources\Schemas\XotBaseResourceForm;

/**
 * Espone il callback protetto di XotBaseResourceForm per i test.
 */
class OptionLabelProbeForm extends XotBaseResourceForm
{
<<<<<<< HEAD
    public static function labelFor(Model $record, string $titleAttribute = 'name'): string
    {
=======
    public function getFormSchema(): array
    {
        return [];
    }

    public static function labelFor(Model $record, string $titleAttribute = 'name'): string
    {
        /** @var \Closure(Model $record): string $callback */
>>>>>>> laraxot/dev
        $callback = static::optionLabelFromRecord($titleAttribute);

        return $callback($record);
    }
}
