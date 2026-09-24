<?php

declare(strict_types=1);

namespace Modules\Xot\Datas;

use Spatie\LaravelData\Data;

/**
 * Class FilemanagerData - Gestisce la configurazione del file manager.
 * Utilizzato esclusivamente nell'ambito dell'architettura Filament-first.
 *
 * @phpstan-consistent-constructor
 */
final class FilemanagerData extends Data
{
    /**
<<<<<<< HEAD
     * @param  array<int, string>  $disks
     * @param  array<int, string>  $allowedExt
=======
     * @param array<int, string> $disks
     * @param array<int, string> $allowedExt
>>>>>>> laraxot/dev
     */
    public function __construct(
        public readonly string $disk = 'public',
        public readonly array $disks = ['public'],
        public readonly array $allowedExt = [
            'jpg', 'jpeg', 'png', 'gif', 'pdf', 'doc',
            'docx', 'xls', 'xlsx', 'zip',
        ],
        public readonly int $maxSize = 10,
        public readonly string $routePrefix = 'filemanager',
        public readonly bool $enableCrop = true,
<<<<<<< HEAD
    ) {}
=======
    ) {
    }
>>>>>>> laraxot/dev

    /**
     * Create a new instance of FilemanagerData with default values.
     */
    public static function make(): self
    {
<<<<<<< HEAD
        return new self;
=======
        return new self();
>>>>>>> laraxot/dev
    }
}
