<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\File;

use Illuminate\Support\Facades\File;
use Spatie\QueueableAction\QueueableAction;

/**
 * Aggiunge la dichiarazione strict_types ai file PHP che ne sono sprovvisti.
 */
class AddStrictTypesDeclarationAction
{
    use QueueableAction;

    /**
     * Aggiunge la dichiarazione strict_types a un file PHP.
     */
    public function execute(string $filePath): void
    {
        if (! File::exists($filePath)) {
            throw new \InvalidArgumentException("Il file {$filePath} non esiste");
        }

        $content = File::get($filePath);

        // Se il file ha già la dichiarazione strict_types, non fare nulla
        if (str_contains($content, 'declare(strict_types=1)')) {
            return;
        }

        // Trova la posizione del tag di apertura PHP
        $phpTagPos = strpos($content, '<?php');
<<<<<<< .merge_file_WRoZ1V
<<<<<<< HEAD
<<<<<<< HEAD
        if ($phpTagPos === false) {
=======
        if (false === $phpTagPos) {
>>>>>>> laraxot/dev
=======
        if (false === $phpTagPos) {
>>>>>>> 3792da0d (Check & fix styling)
=======
        if ($phpTagPos === false) {
>>>>>>> .merge_file_mHAzn4
            throw new \RuntimeException("Il file {$filePath} non ha un tag di apertura PHP valido");
        }

        // Trova la prima riga non vuota dopo il tag PHP
        $lines = explode("\n", $content);
        $firstNonEmptyLine = 0;
        foreach ($lines as $i => $line) {
<<<<<<< .merge_file_WRoZ1V
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> .merge_file_mHAzn4
            if ($i === 0) {
                continue; // Salta la prima riga che contiene <?php
            }
            $trimmedLine = trim($line);
            if ($trimmedLine !== '') {
<<<<<<< .merge_file_WRoZ1V
=======
=======
>>>>>>> 3792da0d (Check & fix styling)
            if (0 === $i) {
                continue; // Salta la prima riga che contiene <?php
            }
            $trimmedLine = trim($line);
            if ('' !== $trimmedLine) {
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_mHAzn4
                $firstNonEmptyLine = $i;
                break;
            }
        }

        // Inserisci la dichiarazione strict_types dopo il tag PHP e una riga vuota
        array_splice($lines, $firstNonEmptyLine, 0, ['declare(strict_types=1);', '']);

        // Salva il file modificato
        File::put($filePath, implode("\n", $lines));
    }
}
