<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Fixtures\Filament\Resources;

use Filament\Schemas\Components\Wizard\Step;
use Modules\Xot\Filament\Resources\XotBaseResource;

class ProbeResource extends XotBaseResource
{
    protected static string $module = 'Xot';

    protected static ?string $model = null;

<<<<<<< .merge_file_QDBK16
<<<<<<< HEAD
<<<<<<< HEAD
=======
    public function getFormSchemaOld(): array
=======
    public static function getFormSchema(): array
>>>>>>> 3792da0d (Check & fix styling)
    {
        return [];
    }

<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_dVc7lG
    /**
     * @return array<int, string>
     */
    public static function getCustomStepSchema(): array
    {
        return ['ok'];
    }

    public static function callGetKeyTrans(string $key): string
    {
        return static::getKeyTrans($key);
    }

    public static function callGetStepByName(string $name): Step
    {
        return static::getStepByName($name);
    }

    public static function resetModelCache(): void
    {
        static::$model = null;
    }
}
