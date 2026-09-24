<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Cast;

final class SafeNullableStringCastAction
{
    public function execute(mixed $value): ?string
    {
        $stringValue = SafeStringCastAction::cast($value);

<<<<<<< .merge_file_IdqCNo
        return $stringValue !== '' ? $stringValue : null;
=======
<<<<<<< HEAD
        return $stringValue !== '' ? $stringValue : null;
=======
        return '' !== $stringValue ? $stringValue : null;
>>>>>>> laraxot/dev
>>>>>>> .merge_file_TC13zX
    }

    public static function cast(mixed $value): ?string
    {
        return app(self::class)->execute($value);
    }
}
