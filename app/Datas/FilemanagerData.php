<?php

declare(strict_types=1);

namespace Modules\Xot\Datas;

use Spatie\LaravelData\Data;

/**
<<<<<<< HEAD
 * Class FilemanagerData - Gestisce la configurazione del file manager per il framework Laraxot.
 * Utilizzato esclusivamente nell'ambito dell'architettura Filament-first.
 */
class FilemanagerData extends Data
{
    /**
     * @param string $disk        Disco di storage predefinito
     * @param array  $disks       Dischi di storage disponibili
     * @param array  $allowed_ext Estensioni file consentite
     * @param int    $max_size    Dimensione massima file in MB
     * @param string $route_prefix Prefisso per le rotte del file manager
     * @param bool   $enable_crop Abilita il crop delle immagini
=======
 * Class FilemanagerData - Gestisce la configurazione del file manager.
 * Utilizzato esclusivamente nell'ambito dell'architettura Filament-first.
 *
 * @phpstan-consistent-constructor
 */
final class FilemanagerData extends Data
{
    /**
     * @param array<int, string> $disks
     * @param array<int, string> $allowedExt
>>>>>>> c7fd73eb (.)
     */
    public function __construct(
        public readonly string $disk = 'public',
        public readonly array $disks = ['public'],
<<<<<<< HEAD
        public readonly array $allowed_ext = ['jpg', 'jpeg', 'png', 'gif', 'pdf', 'doc', 'docx', 'xls', 'xlsx', 'zip'],
        public readonly int $max_size = 10,
        public readonly string $route_prefix = 'filemanager',
        public readonly bool $enable_crop = true,
    ) {}

    /**
     * Create a new instance of FilemanagerData with default values.
     *
     * @return static
     */
    public static function make(): static
    {
        return new static();
=======
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
>>>>>>> c7fd73eb (.)
    }
}
