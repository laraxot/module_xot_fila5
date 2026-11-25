<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Unit\Docs;

use Symfony\Component\Finder\Finder;

/*
 * Ogni BMAD story usa lo scheletro MADR harness (come gli ADR).
 * Template: Modules/Xot/docs/bmad/stories/0000-template.story.md
 */

it('ogni BMAD story ha le sezioni MADR obbligatorie', function (): void {
    $roots = [
        dirname(__DIR__, 4),
        dirname(__DIR__, 5).'/Themes',
    ];

    $required = [
        '## Context and Problem Statement',
        '## Decision Drivers',
        '## Considered Options',
        '## Decision Outcome',
        '### Consequences',
        '### Confirmation',
    ];

    $skipNames = [
        '0000-template.story.md',
        '0000-story-template.md',
        'README.md',
        'INDEX.md',
        'index.md',
    ];

    $offenders = [];

    foreach ($roots as $root) {
        if (! is_dir($root)) {
            continue;
        }

        foreach (['docs/bmad/stories', 'docs/stories'] as $sub) {
            $dir = $root.'/*/*/'.$sub;
            // Modules/<Name>/docs/... or Themes/<Name>/docs/...
            $dirs = glob($root.'/*/'.$sub, GLOB_ONLYDIR) ?: [];
            // Themes nested one level; Modules one level — also Modules/*/docs
            $dirs = array_merge($dirs, glob($root.'/*/docs/bmad/stories', GLOB_ONLYDIR) ?: []);
            $dirs = array_merge($dirs, glob($root.'/*/docs/stories', GLOB_ONLYDIR) ?: []);
            $dirs = array_values(array_unique($dirs));

            foreach ($dirs as $storiesDir) {
                $finder = Finder::create()
                    ->files()
                    ->in($storiesDir)
                    ->name('*.story.md')
                    ->depth('== 0');

                foreach ($finder as $file) {
                    $name = $file->getFilename();
                    if (in_array($name, $skipNames, true)) {
                        continue;
                    }

                    $contents = $file->getContents();
                    foreach ($required as $heading) {
                        if (! str_contains($contents, $heading)) {
                            $offenders[] = $file->getRelativePathname().' missing '.$heading;
                            break;
                        }
                    }
                }
            }
        }
    }

    expect($offenders)->toBe([]);
});
