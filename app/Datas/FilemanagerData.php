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
<<<<<<< .merge_file_RxGtuV
     * @param  array<int, string>  $disks
     * @param  array<int, string>  $allowedExt
=======
<<<<<<< HEAD
     * @param  array<int, string>  $disks
     * @param  array<int, string>  $allowedExt
=======
     * @param array<int, string> $disks
     * @param array<int, string> $allowedExt
>>>>>>> laraxot/dev
>>>>>>> .merge_file_aRgx69
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
<<<<<<< .merge_file_RxGtuV
    ) {}
=======
<<<<<<< HEAD
    ) {}
=======
    ) {
    }
>>>>>>> laraxot/dev
>>>>>>> .merge_file_aRgx69

    /**
     * Create a new instance of FilemanagerData with default values.
     */
    public static function make(): self
    {
<<<<<<< .merge_file_RxGtuV
        return new self;
=======
<<<<<<< HEAD
        return new self;
=======
        return new self();
>>>>>>> laraxot/dev
>>>>>>> .merge_file_aRgx69
    }
}
