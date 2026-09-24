<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Cast;

<<<<<<< HEAD
final class SafeNullableStringCastAction
{
=======
use Spatie\QueueableAction\QueueableAction;

final class SafeNullableStringCastAction
{
    use QueueableAction;

>>>>>>> 8d801bbe (Check & fix styling)
    public function execute(mixed $value): ?string
    {
        $stringValue = SafeStringCastAction::cast($value);

<<<<<<< .merge_file_yGqPYe
<<<<<<< HEAD
<<<<<<< HEAD
        return $stringValue !== '' ? $stringValue : null;
=======
        return '' !== $stringValue ? $stringValue : null;
>>>>>>> laraxot/dev
=======
        return '' !== $stringValue ? $stringValue : null;
>>>>>>> 8d801bbe (Check & fix styling)
=======
        return $stringValue !== '' ? $stringValue : null;
>>>>>>> .merge_file_K81nUi
    }

    public static function cast(mixed $value): ?string
    {
        return app(self::class)->execute($value);
    }
}
