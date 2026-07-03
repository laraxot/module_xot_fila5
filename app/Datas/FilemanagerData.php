<?php

declare(strict_types=1);

namespace Modules\Xot\Datas;

use Spatie\LaravelData\Data;

/**
 * Class FilemanagerData - Gestisce la configurazione del file manager.
 * Utilizzato esclusivamente nell'ambito dell'architettura Filament-first.
 *
 * @phpstan-consistent-constructor
 *
 * @param string             $disk
 * @param array<int, string> $disks
 * @param array<int, string> $allowedExt
 * @param int                $maxSize
 * @param string             $routePrefix
 * @param bool               $enableCrop
 */
final class FilemanagerData extends Data
{
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
    ) {
    }

    /**
     * Create a new instance of FilemanagerData with default values.
     */
    public static function make(): self
    {
        return new self();
    }
}
