<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Cast;

final class SafeNullableStringCastAction
{
    public function execute(mixed $value): ?string
    {
        $stringValue = SafeStringCastAction::cast($value);

<<<<<<< HEAD
<<<<<<< HEAD
        return $stringValue !== '' ? $stringValue : null;
=======
        return '' !== $stringValue ? $stringValue : null;
>>>>>>> laraxot/dev
=======
        return $stringValue !== '' ? $stringValue : null;
>>>>>>> laraxot/dev
    }

    public static function cast(mixed $value): ?string
    {
        return app(self::class)->execute($value);
    }
}
