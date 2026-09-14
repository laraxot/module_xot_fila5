<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Unit\Docs;

use Modules\Xot\Tests\TestCase;

use function Safe\file_get_contents;
use function Safe\preg_match_all;

uses(TestCase::class);

/**
 * I docs di un modulo non nominano il progetto ospite.
 *
 * Un modulo gira in più progetti: una frase che nomina un'installazione specifica
 * è falsa ovunque tranne che lì, e nessuno se ne accorge finché il modulo non
 * viene riusato.
 *
 * Il debito è enorme e storico, quindi la guardia non pretende zero: fissa un
 * tetto che **può solo scendere**. Impedisce che un file nuovo aggiunga
 * occorrenze, che è la parte applicabile subito.
 *
 * @see docs/wiki/rules/project-agnostic.md
 */

/**
 * Nomi di installazioni note. Vivono qui e non nel wiki: elencarli in un documento
 * agnostico sarebbe la violazione che il documento vieta.
 *
<<<<<<< HEAD
 * Una guardia che cerca il **placeholder** non e' una guardia: fino al 2026-09-09 questo
 * array conteneva `['<nome progetto>', '<nome progetto>']`, cioe' proprio la stringa con
 * cui si bonifica. Contava la cura invece della malattia, e lasciava passare qualunque
 * nome vero. Un file di test non e' documentazione di modulo: qui i nomi ci devono stare,
 * altrimenti non c'e' niente da cercare.
 *
=======
>>>>>>> laraxot/dev
 * @return list<string>
 */
function hostProjectNames(): array
{
<<<<<<< HEAD
    return [
        'fixcity',
        'ptvx',
        'saluteora',
        'quaeris',
        'techplanner',
        'laravelpizza',
    ];
}

/**
 * Gli stessi nomi, ma solo nei README.
 *
 * @return array<string, int> percorso relativo => occorrenze
 */
function moduleReadmesWithHostProjectName(): array
{
    return array_filter(
        moduleDocsWithHostProjectName(),
        static fn (string $path): bool => str_ends_with($path, '/README.md'),
        ARRAY_FILTER_USE_KEY
    );
=======
    return ['fixcity', 'quaeris'];
>>>>>>> laraxot/dev
}

/**
 * @return array<string, int> percorso relativo => occorrenze
 */
function moduleDocsWithHostProjectName(): array
{
    $hits = [];
    $pattern = '/'.implode('|', array_map(
        static fn (string $name): string => preg_quote($name, '/'),
        hostProjectNames()
    )).'/i';

    foreach ([base_path('Modules'), base_path('Themes')] as $root) {
        if (! is_dir($root)) {
            continue;
        }

        $iterator = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator($root, \FilesystemIterator::SKIP_DOTS)
        );

        foreach ($iterator as $fileInfo) {
            if (! $fileInfo instanceof \SplFileInfo || $fileInfo->getExtension() !== 'md') {
                continue;
            }

            $path = $fileInfo->getPathname();

<<<<<<< HEAD
            // Ogni .md del modulo, non solo quelli sotto /docs/: il README e' il primo
            // file che si legge quando il modulo viene riusato altrove, ed era fuori
            // dal perimetro. Misurati 17 README con un nome di installazione dentro.
            if (str_contains($path, '/vendor/') || str_contains($path, '/node_modules/') || str_contains($path, '/graphify-out/')) {
=======
            if (! str_contains($path, '/docs/')) {
>>>>>>> laraxot/dev
                continue;
            }

            $count = preg_match_all($pattern, file_get_contents($path));

            if ($count > 0) {
                $hits[str_replace(base_path().'/', '', $path)] = $count;
            }
        }
    }

    return $hits;
}

/**
<<<<<<< HEAD
 * Tetto rimisurato il 2026-09-09 dopo aver aggiunto `techplanner` e `laravelpizza`
 * all'elenco: 1286 file. Il salto da 1125 non e' un peggioramento del repo, e' il
 * rilevatore che vede due installazioni che prima ignorava — 178 file le nominavano
 * gia'. Un tetto si rialza solo cosi': allargando il perimetro, mai per far passare
 * una violazione nuova. Scende con la bonifica, e quando bonifichi lo abbassi: un
 * ratchet che non scende torna verde per inerzia.
 */
const MODULE_DOCS_HOST_NAME_FILE_BASELINE = 1286;
=======
 * Tetto misurato il 2026-09-08. Scende con la bonifica, non sale mai.
 * Quando bonifichi, abbassalo: un ratchet che non scende torna verde per inerzia.
 */
const MODULE_DOCS_HOST_NAME_FILE_BASELINE = 1642;
>>>>>>> laraxot/dev

test('nessun documento nuovo di modulo nomina il progetto ospite', function (): void {
    $hits = moduleDocsWithHostProjectName();

    expect(count($hits))->toBeLessThanOrEqual(
        MODULE_DOCS_HOST_NAME_FILE_BASELINE,
        "Un documento di modulo nomina un'installazione specifica. Un modulo gira in "
<<<<<<< HEAD
        .'più progetti: il dato specifico sta nella configurazione del progetto, non qui. '
=======
        ."più progetti: il dato specifico sta nella configurazione del progetto, non qui. "
>>>>>>> laraxot/dev
        .'Vedi docs/wiki/rules/project-agnostic.md'
    );
});

<<<<<<< HEAD
/**
 * Sui README il tetto e' ZERO, e non e' un inasprimento arbitrario.
 *
 * Il ratchet globale misura un totale: finche' il totale non sale, un singolo file puo'
 * tenersi la sua violazione per sempre. Il 2026-09-09 e' successo esattamente questo —
 * `Modules/Rating/README.md` chiudeva con «Laraxot / FixCity Platform» dentro il repo di
 * un altro progetto, contato fra i 1125 e quindi verde.
 *
 * Il README e' il primo file che si legge quando un modulo viene riusato altrove: se
 * mente li', mente prima di ogni altra cosa. Sono pochi e sono stati bonificati tutti
 * (17 il 2026-09-09), quindi qui zero e' sostenibile — dove il debito e' enorme resta il
 * ratchet, dove e' finito si chiude la porta.
 */
test('nessun README di modulo o tema nomina il progetto ospite', function (): void {
    $hits = moduleReadmesWithHostProjectName();

    expect($hits)->toBe(
        [],
        "Un README di modulo/tema nomina un'installazione specifica. Il README e' il primo "
        .'file che legge chi riusa il modulo in un altro progetto: il nome del progetto '
        .'ospite sta nella sua configurazione, non qui. Vedi docs/wiki/rules/project-agnostic.md'
    );
});

=======
>>>>>>> laraxot/dev
test('il tetto resta allineato al debito, cosi la guardia continua a misurare', function (): void {
    $hits = moduleDocsWithHostProjectName();

    expect(count($hits))->toBeGreaterThan(
        MODULE_DOCS_HOST_NAME_FILE_BASELINE - 100,
        'Sono stati bonificati più di 100 file: abbassa MODULE_DOCS_HOST_NAME_FILE_BASELINE '
        .'al numero attuale ('.count($hits).').'
    );
});
