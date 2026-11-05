<?php

declare(strict_types=1);

namespace Modules\Xot\Models\Traits;

<<<<<<< HEAD
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\File;
use Modules\Xot\Contracts\ProfileContract;
use Modules\Xot\Database\Factories\LogFactory;
use Sushi\Sushi;

trait LogMutators
{
    function getFileContentAttribute(?string $value): ?string
        {
            return $this->getFileContent();
        }

    function getFileContent(): string
        {
            return File::get(storage_path('logs/'.$this->id.'.log'));
        }

=======
use Illuminate\Support\Facades\File;

trait LogMutators
{
    public function getFileContentAttribute(?string $value): ?string
    {
        return $this->getFileContent();
    }

    public function getFileContent(): string
    {
        return File::get(storage_path('logs/'.$this->id.'.log'));
    }
>>>>>>> laraxot/dev
}
