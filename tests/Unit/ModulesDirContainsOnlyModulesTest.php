<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Unit;

use PHPUnit\Framework\Assert;

use function Safe\glob;

/**
 * `laravel/Modules/` contiene solo moduli: ogni cartella ha un `module.json`.
 * Una cartella senza (`test`, `docs`, `x`, `Config`...) e' scritta a runtime da un test o da un tool:
 * il 2026-08-24 sette di queste finirono in git.
 *
 * @see docs/chat/moduli-fantasma-scritti-dai-test-2026-08-24.md
 */
/**
 * @return list<string>
 */
function modulesWithoutManifest(): array
{
    $modulesRoot = dirname(__DIR__, 3);
    $dirs = glob($modulesRoot.'/*', GLOB_ONLYDIR);
    return array_values(array_filter(
        array_map(static fn (string $dir): string => basename($dir), $dirs),
        static function (string $name) use ($modulesRoot): bool {
            return ! is_file($modulesRoot.'/'.$name.'/module.json');
        },
    ));
}

it('Modules contiene solo moduli con module.json', function (): void {
    Assert::assertSame(
        [],
        modulesWithoutManifest(),
        'Cartelle in laravel/Modules senza module.json (non sono moduli): '.implode(', ', modulesWithoutManifest()),
    );
});
