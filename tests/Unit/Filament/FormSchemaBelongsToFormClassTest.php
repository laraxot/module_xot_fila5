<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Unit\Filament;

use Modules\Xot\Filament\Resources\Schemas\XotBaseResourceForm;
use Modules\Xot\Filament\Resources\XotBaseResource;
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;
<<<<<<< HEAD
<<<<<<< .merge_file_yN8Rog
=======
use ReflectionClass;
use Webmozart\Assert\Assert as WebmozartAssert;
=======
<<<<<<< .merge_file_jvO4OZ
<<<<<<< HEAD
use Webmozart\Assert\Assert as WebmozartAssert;
use ReflectionClass;
=======
<<<<<<< HEAD
>>>>>>> .merge_file_eE7w0b
use Webmozart\Assert\Assert as WebmozartAssert;
use ReflectionClass;
=======
use ReflectionClass;
use Webmozart\Assert\Assert as WebmozartAssert;
>>>>>>> laraxot/dev
<<<<<<< .merge_file_yN8Rog
=======
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_edfXpR
>>>>>>> laraxot/dev
>>>>>>> .merge_file_eE7w0b

use function Safe\file_get_contents;
use function Safe\glob;
use function Safe\preg_match;
use function Safe\preg_replace;

<<<<<<< .merge_file_yN8Rog
=======
<<<<<<< HEAD
=======
<<<<<<< .merge_file_jvO4OZ
=======
use Webmozart\Assert\Assert as WebmozartAssert;

>>>>>>> .merge_file_edfXpR
>>>>>>> laraxot/dev
>>>>>>> .merge_file_eE7w0b
uses(TestCase::class);

/**
 * Lo schema del form sta nella Form class, mai sulla Resource.
 *
 * `XotBaseResource::form()` arriva sempre a `Schemas\{Model}Form` via `getFormClass()`:
 * un `getFormSchema()` dichiarato su una Resource non viene mai chiamato. Il 2026-09-08
 * ce n'erano 49, e da quando il metodo sulla base e' `final` mandavano la classe in
 * fatal error al load — non un errore PHPStan, un `Cannot override final method`.
 *
 * La guardia esiste perche' la regola e' gia' regredita una volta: la story 18.19 l'ha
 * chiusa il 2026-09-07 con "0 violazioni residue", il giorno dopo erano ~50. Una regola
 * senza test torna indietro al primo merge.
 *
 * File scritto da due sessioni: i primi tre test da `base-ptvx-fila5-be [8397b5]`,
 * gli ultimi tre da `base-ptvx-fila5-92 [6a95f1]`.
 *
 * @see docs/wiki/rules/form-schema-lives-on-form-class.md
 * @see laravel/Modules/Xot/docs/stories/18.21.getformschema-ownership-regressione-e-guardia.story.md
 */

/**
 * @return list<string>
 */
function resourceFiles(): array
{
    // `Safe\glob()` è dichiarato `@return list` senza tipo dell'elemento: per
    // l'analisi statica sono valori ignoti. Non si tappa con un `mixed` nella nostra
    // firma — si **verifica** che siano stringhe, così se un giorno non lo fossero il
    // test lo direbbe invece di stringificare in silenzio.
    $files = glob(base_path('Modules/*/app/Filament/**/*Resource.php'));
    WebmozartAssert::allString($files);

    return array_values($files);
}

test('nessuna Resource dichiara getFormSchema()', function (): void {
    $offenders = [];

    foreach (resourceFiles() as $file) {
        $src = file_get_contents($file);

<<<<<<< .merge_file_yN8Rog
=======
<<<<<<< HEAD
=======
<<<<<<< .merge_file_jvO4OZ
>>>>>>> laraxot/dev
>>>>>>> .merge_file_eE7w0b
        if (preg_match('/extends\s+XotBaseResource\b/', $src) !== 1) {
            continue;
        }
        if (preg_match('/function\s+getFormSchema\s*\(/', $src) === 1) {
<<<<<<< .merge_file_yN8Rog
=======
<<<<<<< HEAD
=======
=======
        if (1 !== preg_match('/extends\s+XotBaseResource\b/', $src)) {
            continue;
        }
        if (1 === preg_match('/function\s+getFormSchema\s*\(/', $src)) {
>>>>>>> .merge_file_edfXpR
>>>>>>> laraxot/dev
>>>>>>> .merge_file_eE7w0b
            $offenders[] = str_replace(base_path(), '', $file);
        }
    }

    expect($offenders)->toBe([]);
});

test('getFormSchema() e obbligatorio su XotBaseResourceForm', function (): void {
<<<<<<< .merge_file_yN8Rog
    $method = (new ReflectionClass(XotBaseResourceForm::class))->getMethod('getFormSchema');
=======
<<<<<<< HEAD
    $method = (new ReflectionClass(XotBaseResourceForm::class))->getMethod('getFormSchema');
=======
<<<<<<< .merge_file_jvO4OZ
    $method = (new ReflectionClass(XotBaseResourceForm::class))->getMethod('getFormSchema');
=======
    $method = (new \ReflectionClass(XotBaseResourceForm::class))->getMethod('getFormSchema');
>>>>>>> .merge_file_edfXpR
>>>>>>> laraxot/dev
>>>>>>> .merge_file_eE7w0b

    expect($method->isAbstract())->toBeTrue();
    expect($method->isPublic())->toBeTrue();
});

test('getFormSchema() e final su XotBaseResource', function (): void {
    // Il final e' cio' che impedisce a una Resource di riprendersi lo schema:
    // senza, la regola tornerebbe affidata alla buona volonta'.
<<<<<<< .merge_file_yN8Rog
    $method = (new ReflectionClass(XotBaseResource::class))->getMethod('getFormSchema');
=======
<<<<<<< HEAD
    $method = (new ReflectionClass(XotBaseResource::class))->getMethod('getFormSchema');
=======
<<<<<<< .merge_file_jvO4OZ
    $method = (new ReflectionClass(XotBaseResource::class))->getMethod('getFormSchema');
=======
    $method = (new \ReflectionClass(XotBaseResource::class))->getMethod('getFormSchema');
>>>>>>> .merge_file_edfXpR
>>>>>>> laraxot/dev
>>>>>>> .merge_file_eE7w0b

    expect($method->isFinal())->toBeTrue();
});

/*
 * -----------------------------------------------------------------------------
 * Copertura aggiunta. Cosa vede in piu' dello scan sopra:
 *  - la chiusura transitiva vera: un discendente indiretto, o una fixture fuori
 *    da `app/Filament/`, fatalizza esattamente come una Resource di primo
 *    livello, ma sfugge alla glob (`Lang/tests/Fixtures/LangBaseResourceStub.php`);
 *  - il lato positivo della regola: `getFormSchema()` obbligatoria non basta se
 *    torna un array vuoto — la pagina edit si svuota senza un errore e senza una
 *    riga di log;
 *  - l'end-state a runtime: le Resource si caricano davvero e i Form si
 *    costruiscono davvero. Nessuno scan del sorgente vede un
 *    `XotBaseSelect::make()` su una classe astratta.
 * -----------------------------------------------------------------------------
 */

/**
 * Mappa `classe => [parent, file]` di tutte le classi sotto Modules/, letta dal
 * sorgente. Nessun autoload: i file che violano la regola non sono caricabili, e
 * un fatal non e' catturabile — con Reflection il test morirebbe sul primo file
 * rotto invece di elencarli tutti.
 *
 * @return array<string, array{parent: string, file: string}>
 */
function xotClassGraph(): array
{
    /** @var array<string, array{parent: string, file: string}>|null $graph */
    static $graph = null;

<<<<<<< .merge_file_yN8Rog
    if ($graph !== null) {
=======
<<<<<<< HEAD
    if ($graph !== null) {
=======
<<<<<<< .merge_file_jvO4OZ
    if ($graph !== null) {
=======
    if (null !== $graph) {
>>>>>>> .merge_file_edfXpR
>>>>>>> laraxot/dev
>>>>>>> .merge_file_eE7w0b
        return $graph;
    }

    $graph = [];
    $iterator = new \RecursiveIteratorIterator(
        new \RecursiveDirectoryIterator(base_path('Modules'), \FilesystemIterator::SKIP_DOTS)
    );

    foreach ($iterator as $fileInfo) {
<<<<<<< .merge_file_yN8Rog
        if (! $fileInfo instanceof \SplFileInfo || $fileInfo->getExtension() !== 'php') {
=======
<<<<<<< HEAD
        if (! $fileInfo instanceof \SplFileInfo || $fileInfo->getExtension() !== 'php') {
=======
<<<<<<< .merge_file_jvO4OZ
        if (! $fileInfo instanceof \SplFileInfo || $fileInfo->getExtension() !== 'php') {
=======
        if (! $fileInfo instanceof \SplFileInfo || 'php' !== $fileInfo->getExtension()) {
>>>>>>> .merge_file_edfXpR
>>>>>>> laraxot/dev
>>>>>>> .merge_file_eE7w0b
            continue;
        }

        $path = $fileInfo->getPathname();

        if (str_contains($path, '/vendor/') || str_contains($path, '/node_modules/')) {
            continue;
        }

        $source = file_get_contents($path);

        $ns = [];
<<<<<<< .merge_file_yN8Rog
        if (preg_match('/^\s*namespace\s+([^;]+);/m', $source, $ns) !== 1) {
=======
<<<<<<< HEAD
        if (preg_match('/^\s*namespace\s+([^;]+);/m', $source, $ns) !== 1) {
=======
<<<<<<< .merge_file_jvO4OZ
        if (preg_match('/^\s*namespace\s+([^;]+);/m', $source, $ns) !== 1) {
=======
        if (1 !== preg_match('/^\s*namespace\s+([^;]+);/m', $source, $ns)) {
>>>>>>> .merge_file_edfXpR
>>>>>>> laraxot/dev
>>>>>>> .merge_file_eE7w0b
            continue;
        }

        $cls = [];
<<<<<<< .merge_file_yN8Rog
        if (preg_match('/^\s*(?:final\s+|abstract\s+|readonly\s+)*class\s+(\w+)\s+extends\s+([\\\\\w]+)/m', $source, $cls) !== 1) {
=======
<<<<<<< HEAD
        if (preg_match('/^\s*(?:final\s+|abstract\s+|readonly\s+)*class\s+(\w+)\s+extends\s+([\\\\\w]+)/m', $source, $cls) !== 1) {
=======
<<<<<<< .merge_file_jvO4OZ
        if (preg_match('/^\s*(?:final\s+|abstract\s+|readonly\s+)*class\s+(\w+)\s+extends\s+([\\\\\w]+)/m', $source, $cls) !== 1) {
=======
        if (1 !== preg_match('/^\s*(?:final\s+|abstract\s+|readonly\s+)*class\s+(\w+)\s+extends\s+([\\\\\w]+)/m', $source, $cls)) {
>>>>>>> .merge_file_edfXpR
>>>>>>> laraxot/dev
>>>>>>> .merge_file_eE7w0b
            continue;
        }

        $namespace = trim((string) ($ns[1] ?? ''));
        $className = (string) ($cls[1] ?? '');
        $parent = (string) ($cls[2] ?? '');

<<<<<<< .merge_file_yN8Rog
        if ($namespace === '' || $className === '' || $parent === '') {
=======
<<<<<<< HEAD
        if ($namespace === '' || $className === '' || $parent === '') {
=======
<<<<<<< .merge_file_jvO4OZ
        if ($namespace === '' || $className === '' || $parent === '') {
=======
        if ('' === $namespace || '' === $className || '' === $parent) {
>>>>>>> .merge_file_edfXpR
>>>>>>> laraxot/dev
>>>>>>> .merge_file_eE7w0b
            continue;
        }

        // Il parent e' scritto short: risolvilo con lo use statement corrispondente,
        // altrimenti e' nello stesso namespace.
        if (! str_contains($parent, '\\')) {
            $use = [];
            $usePattern = '/^\s*use\s+([\\\\\w]*\\\\'.preg_quote($parent, '/').');/m';
<<<<<<< .merge_file_yN8Rog
            $parent = preg_match($usePattern, $source, $use) === 1
=======
<<<<<<< HEAD
            $parent = preg_match($usePattern, $source, $use) === 1
=======
<<<<<<< .merge_file_jvO4OZ
            $parent = preg_match($usePattern, $source, $use) === 1
=======
            $parent = 1 === preg_match($usePattern, $source, $use)
>>>>>>> .merge_file_edfXpR
>>>>>>> laraxot/dev
>>>>>>> .merge_file_eE7w0b
                ? (string) ($use[1] ?? '')
                : $namespace.'\\'.$parent;
        }

        $graph[$namespace.'\\'.$className] = [
            'parent' => ltrim($parent, '\\'),
            'file' => $path,
        ];
    }

    return $graph;
}

/**
 * Discendenti (diretti o indiretti) di `$ancestor`, dal grafo del sorgente.
 *
 * @return array<string, string> classe => file
 */
function xotDescendantsOf(string $ancestor): array
{
    $graph = xotClassGraph();
    $descendants = [];

    foreach ($graph as $class => $node) {
        $cursor = $class;
        $seen = [];

        while (isset($graph[$cursor])) {
            $parent = $graph[$cursor]['parent'];

            if ($parent === $ancestor) {
                $descendants[$class] = $node['file'];
                break;
            }

            if (isset($seen[$cursor])) {
                break;
            }

            $seen[$cursor] = true;
            $cursor = $parent;
        }
    }

    return $descendants;
}

test('nessun discendente di XotBaseResource dichiara getFormSchema', function (): void {
    $violations = [];

    foreach (xotDescendantsOf(XotBaseResource::class) as $file) {
<<<<<<< .merge_file_yN8Rog
        if (preg_match('/function\s+getFormSchema\s*\(/', file_get_contents($file)) === 1) {
=======
<<<<<<< HEAD
        if (preg_match('/function\s+getFormSchema\s*\(/', file_get_contents($file)) === 1) {
=======
<<<<<<< .merge_file_jvO4OZ
        if (preg_match('/function\s+getFormSchema\s*\(/', file_get_contents($file)) === 1) {
=======
        if (1 === preg_match('/function\s+getFormSchema\s*\(/', file_get_contents($file))) {
>>>>>>> .merge_file_edfXpR
>>>>>>> laraxot/dev
>>>>>>> .merge_file_eE7w0b
            $violations[] = str_replace(base_path().'/', '', $file);
        }
    }

    Assert::assertSame(
        [],
        $violations,
        "getFormSchema() e' final su XotBaseResource: ridichiararla e' un PHP Fatal error all'autoload, ".
        "non un errore di stile. Lo schema va in Schemas/{Model}Form::getFormSchema().\nViolazioni:\n- ".
        implode("\n- ", $violations)
    );
});

/**
 * Corpo di `getFormSchema()` come lo vede davvero il runtime: la classe stessa se
 * la dichiara, altrimenti il primo antenato che la dichiara. Un
 * `class SchedaForm extends BaseSchedaForm {}` vuoto e' legittimo — eredita.
 */
function xotEffectiveFormSchemaBody(string $class): ?string
{
    $graph = xotClassGraph();
    $cursor = $class;
    $seen = [];

    while (isset($graph[$cursor]) && ! isset($seen[$cursor])) {
        $seen[$cursor] = true;
        $match = [];

<<<<<<< .merge_file_yN8Rog
        if (preg_match('/function\s+getFormSchema\s*\([^)]*\)[^{]*\{(.*?)\n    \}/s', file_get_contents($graph[$cursor]['file']), $match) === 1) {
=======
<<<<<<< HEAD
        if (preg_match('/function\s+getFormSchema\s*\([^)]*\)[^{]*\{(.*?)\n    \}/s', file_get_contents($graph[$cursor]['file']), $match) === 1) {
=======
<<<<<<< .merge_file_jvO4OZ
        if (preg_match('/function\s+getFormSchema\s*\([^)]*\)[^{]*\{(.*?)\n    \}/s', file_get_contents($graph[$cursor]['file']), $match) === 1) {
=======
        if (1 === preg_match('/function\s+getFormSchema\s*\([^)]*\)[^{]*\{(.*?)\n    \}/s', file_get_contents($graph[$cursor]['file']), $match)) {
>>>>>>> .merge_file_edfXpR
>>>>>>> laraxot/dev
>>>>>>> .merge_file_eE7w0b
            return trim((string) ($match[1] ?? ''));
        }

        $cursor = $graph[$cursor]['parent'];
    }

    return null;
}

test('ogni discendente di XotBaseResourceForm dichiara getFormSchema non vuoto', function (): void {
    $missing = [];
    $stubs = [];

    foreach (xotDescendantsOf(XotBaseResourceForm::class) as $class => $file) {
        // Una probe di test (es. OptionLabelProbeForm) esiste per esporre un
        // callback protetto, non per disegnare una pagina: lo schema vuoto la'
        // non svuota niente. L'override illegale, invece, fatalizza ovunque —
        // per quello il test sopra non filtra nulla.
        if (str_contains($file, '/tests/')) {
            continue;
        }

        $body = xotEffectiveFormSchemaBody($class);
        $relative = str_replace(base_path().'/', '', $file);

<<<<<<< .merge_file_yN8Rog
        if ($body === null) {
            // Solo una classe astratta puo' lasciare l'obbligo al figlio concreto.
            if (preg_match('/^\s*abstract\s+class\s/m', file_get_contents($file)) !== 1) {
=======
<<<<<<< HEAD
        if ($body === null) {
            // Solo una classe astratta puo' lasciare l'obbligo al figlio concreto.
            if (preg_match('/^\s*abstract\s+class\s/m', file_get_contents($file)) !== 1) {
=======
<<<<<<< .merge_file_jvO4OZ
        if ($body === null) {
            // Solo una classe astratta puo' lasciare l'obbligo al figlio concreto.
            if (preg_match('/^\s*abstract\s+class\s/m', file_get_contents($file)) !== 1) {
=======
        if (null === $body) {
            // Solo una classe astratta puo' lasciare l'obbligo al figlio concreto.
            if (1 !== preg_match('/^\s*abstract\s+class\s/m', file_get_contents($file))) {
>>>>>>> .merge_file_edfXpR
>>>>>>> laraxot/dev
>>>>>>> .merge_file_eE7w0b
                $missing[] = $relative;
            }

            continue;
        }

        // I commenti vanno tolti prima di giudicare: `return [ // Campi del form ];`
        // e' vuoto quanto `return [];`, e senza questo passaggio passa inosservato.
        $body = trim(preg_replace(['#/\*.*?\*/#s', '#//[^\n]*#'], '', $body));

<<<<<<< .merge_file_yN8Rog
        if ($body === '' || preg_match('/^return\s*\[\s*\]\s*;$/', $body) === 1) {
=======
<<<<<<< HEAD
        if ($body === '' || preg_match('/^return\s*\[\s*\]\s*;$/', $body) === 1) {
=======
<<<<<<< .merge_file_jvO4OZ
        if ($body === '' || preg_match('/^return\s*\[\s*\]\s*;$/', $body) === 1) {
=======
        if ('' === $body || 1 === preg_match('/^return\s*\[\s*\]\s*;$/', $body)) {
>>>>>>> .merge_file_edfXpR
>>>>>>> laraxot/dev
>>>>>>> .merge_file_eE7w0b
            $stubs[] = $relative;
        }
    }

    Assert::assertSame([], $missing, "Form senza getFormSchema():\n- ".implode("\n- ", $missing));

    Assert::assertSame(
        [],
        $stubs,
        "Form con getFormSchema() vuoto: la pagina edit si svuota in silenzio, nessun errore, nessun log.\n- ".
        implode("\n- ", $stubs)
    );
});

test('ogni Resource si carica e ogni Form costruisce il proprio schema', function (): void {
    // End-state, non struttura: qui le classi si istanziano davvero. E' l'unico
    // controllo che vede un `XotBaseSelect::make()` su una classe astratta
    // (`Target [...] is not instantiable`), invisibile a qualunque scan statico.
    foreach (array_keys(xotDescendantsOf(XotBaseResource::class)) as $resource) {
        Assert::assertTrue(class_exists($resource), "Resource non caricabile: {$resource}");
    }

    $failures = [];

    foreach (xotDescendantsOf(XotBaseResourceForm::class) as $formClass => $file) {
        if (str_contains($file, '/tests/')) {
            continue;
        }

        Assert::assertTrue(class_exists($formClass), "Form non caricabile: {$formClass}");

<<<<<<< .merge_file_yN8Rog
        if ((new ReflectionClass($formClass))->isAbstract()) {
=======
<<<<<<< HEAD
        if ((new ReflectionClass($formClass))->isAbstract()) {
=======
<<<<<<< .merge_file_jvO4OZ
        if ((new ReflectionClass($formClass))->isAbstract()) {
=======
        if ((new \ReflectionClass($formClass))->isAbstract()) {
>>>>>>> .merge_file_edfXpR
>>>>>>> laraxot/dev
>>>>>>> .merge_file_eE7w0b
            continue;
        }

        try {
            $form = app($formClass);
            Assert::assertInstanceOf(XotBaseResourceForm::class, $form);
            $schema = $form->getFormSchema();
        } catch (\Throwable $e) {
            $failures[] = $formClass.' :: '.$e->getMessage();

            continue;
        }

<<<<<<< .merge_file_yN8Rog
        if ($schema === []) {
=======
<<<<<<< HEAD
        if ($schema === []) {
=======
<<<<<<< .merge_file_jvO4OZ
        if ($schema === []) {
=======
        if ([] === $schema) {
>>>>>>> .merge_file_edfXpR
>>>>>>> laraxot/dev
>>>>>>> .merge_file_eE7w0b
            $failures[] = $formClass.' :: schema vuoto';
        }
    }

    Assert::assertSame([], $failures, "Form che non costruiscono:\n- ".implode("\n- ", $failures));
});
