<?php
declare(strict_types=1);

namespace Modules\Xot\Services\Translators;

use Spatie\QueueableAction\QueueableAction;

class MyMemory extends BaseTranslator
{
    use QueueableAction;
}
