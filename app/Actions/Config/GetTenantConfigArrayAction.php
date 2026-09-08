<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Config;

use Illuminate\Support\Facades\File;
use Spatie\QueueableAction\QueueableAction;

class GetTenantConfigArrayAction
{
    use QueueableAction;

<<<<<<< HEAD
=======
    /**
     * @return array<string, mixed>
     */
>>>>>>> c7fd73eb (.)
    public function execute(string $name): array
    {
        $path = app(GetTenantConfigPathAction::class)->execute($name);

        if (! File::exists($path)) {
            return [];
        }

        $content = File::getRequire($path);

        if (! is_array($content)) {
            return [];
        }

<<<<<<< HEAD
        return $content;
=======
        $result = [];
        foreach ($content as $key => $value) {
            if (is_string($key)) {
                $result[$key] = $value;
            }
        }

        return $result;
>>>>>>> c7fd73eb (.)
    }
}
