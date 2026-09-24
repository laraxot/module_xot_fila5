<?php

declare(strict_types=1);
<<<<<<< HEAD
<<<<<<< .merge_file_nJUPrs

=======
>>>>>>> laraxot/dev
=======
=======
<<<<<<< .merge_file_VreSMc
<<<<<<< HEAD

=======
<<<<<<< HEAD

=======
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======

>>>>>>> .merge_file_SrNGZf
>>>>>>> laraxot/dev
>>>>>>> .merge_file_eO1BcE
/**
 * Guardia a cricchetto sulle collisioni case-insensitive.
 *
 * Perche': due file che differiscono solo per maiuscole/minuscole non possono
 * coesistere su macOS o Windows. Su Linux il repo sembra sano e il clone altrui
 * esplode. Regola: laravel/Modules/Xot/docs/case-sensitivity-rules.md
 *
 * Il test NON pretende zero collisioni: al 2026-09-02 ne restano 333 che
 * richiedono merge di contenuto, non cancellazioni. Pretende che il numero
 * **non cresca**. Ogni bonifica abbassa la baseline; nessuna modifica puo'
 * alzarla senza far fallire la suite.
 *
 * Bonifica: python3 bashscripts/tools/audit/audit-case-collisions.py --fix-identical
 */

<<<<<<< .merge_file_nJUPrs
use Symfony\Component\Process\Process;

=======
<<<<<<< HEAD
use Symfony\Component\Process\Process;

=======
<<<<<<< .merge_file_VreSMc
use Symfony\Component\Process\Process;

=======
>>>>>>> .merge_file_SrNGZf
>>>>>>> laraxot/dev
>>>>>>> .merge_file_eO1BcE
use function Safe\file_get_contents;
use function Safe\file_put_contents;
use function Safe\json_decode;

<<<<<<< .merge_file_nJUPrs
=======
<<<<<<< HEAD
=======
<<<<<<< .merge_file_VreSMc
=======
use Symfony\Component\Process\Process;

>>>>>>> .merge_file_SrNGZf
>>>>>>> laraxot/dev
>>>>>>> .merge_file_eO1BcE
function repoRoot(): string
{
    return \dirname(__DIR__, 5);
}

function collisionGroups(): int
{
    $root = repoRoot();
    $process = new Process(
        ['python3', 'bashscripts/tools/audit/audit-case-collisions.py', '--json'],
        $root,
        null,
        null,
        600.0
    );
    $process->run();

    try {
        /** @var array{identical?: array<mixed>, differing?: array<mixed>} $payload */
        $payload = json_decode($process->getOutput(), true);
<<<<<<< HEAD
<<<<<<< .merge_file_nJUPrs
    } catch (\Throwable) {
=======
    } catch (Throwable) {
=======
    } catch (Throwable) {
=======
<<<<<<< .merge_file_VreSMc
<<<<<<< HEAD
    } catch (\Throwable) {
=======
<<<<<<< HEAD
    } catch (\Throwable) {
=======
    } catch (Throwable) {
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======
    } catch (Throwable) {
>>>>>>> .merge_file_SrNGZf
>>>>>>> .merge_file_eO1BcE
>>>>>>> laraxot/dev
        return -1;
    }

    $identical = $payload['identical'] ?? [];
    $differing = $payload['differing'] ?? [];

    return \count($identical) + \count($differing);
}

it('non introduce nuove collisioni case-insensitive', function (): void {
    $root = repoRoot();
    $baselineFile = $root.'/bashscripts/tools/audit/case-collisions-baseline.txt';

    expect(file_exists($baselineFile))->toBeTrue(
        "Baseline mancante: {$baselineFile}"
    );

    $baseline = (int) trim(file_get_contents($baselineFile));
    $current = collisionGroups();

    expect($current)->toBeGreaterThanOrEqual(0, 'audit-case-collisions.py non ha prodotto JSON valido');

    expect($current)->toBeLessThanOrEqual(
        $baseline,
        sprintf(
            "Collisioni case-insensitive salite da %d a %d.\n".
            "Due file che differiscono solo per case rompono il checkout su macOS/Windows.\n".
            'Elenco: python3 bashscripts/tools/audit/audit-case-collisions.py',
            $baseline,
            $current
        )
    );

    // Cricchetto: quando si scende, si abbassa la baseline, cosi' non si risale.
    if ($current < $baseline) {
        file_put_contents($baselineFile, $current."\n");
    }
});
