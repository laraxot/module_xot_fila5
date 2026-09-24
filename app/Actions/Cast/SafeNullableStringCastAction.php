<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Cast;

final class SafeNullableStringCastAction
{
    public function execute(mixed $value): ?string
    {
        $stringValue = SafeStringCastAction::cast($value);

<<<<<<< .merge_file_S6vnq6
<<<<<<< HEAD
<<<<<<< HEAD
        return $stringValue !== '' ? $stringValue : null;
=======
        return '' !== $stringValue ? $stringValue : null;
>>>>>>> laraxot/dev
=======
        return '' !== $stringValue ? $stringValue : null;
>>>>>>> 3792da0d (Check & fix styling)
=======
        return $stringValue !== '' ? $stringValue : null;
>>>>>>> .merge_file_ErvtY8
    }

    public static function cast(mixed $value): ?string
    {
        return app(self::class)->execute($value);
    }
}
