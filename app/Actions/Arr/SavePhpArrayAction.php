<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Arr;

<<<<<<< .merge_file_97BbYa
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> .merge_file_wVghEZ
use Spatie\QueueableAction\QueueableAction;
<<<<<<< HEAD

use function Safe\file_put_contents;

/**
 * Persiste un array PHP con **una chiave per riga** (mai array annidati inline).
 *
 * Perché: Symfony VarExporter compatta i nested (`'nav' => ['a' => 1, 'b' => 2]`),
 * e `SaveTransAction` riscrive i lang così — viola la convenzione clean-code del repo
 * (ordine utente 2026-09-16; SSoT `.codestyle-preferences.md` + memoria
 * `php-array-one-key-per-line.md`).
 */
=======
<<<<<<< HEAD
use function Safe\file_put_contents;

use Spatie\QueueableAction\QueueableAction;
use Symfony\Component\VarExporter\VarExporter;

>>>>>>> 3792da0d (Check & fix styling)
=======
use Symfony\Component\VarExporter\VarExporter;

>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
class SavePhpArrayAction
{
    use QueueableAction;

    /**
<<<<<<< .merge_file_97BbYa
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> .merge_file_wVghEZ
     * @param  array<int|string, mixed>  $data
     */
    public function execute(array $data, string $filename): bool
    {
<<<<<<< HEAD
        $exported = $this->exportArray($data, 0);
=======
<<<<<<< HEAD
     * @param array<string, mixed> $data
     */
    public function execute(array $data, string $filename): bool
    {
        $exported = VarExporter::export($data);
        // $exported = var_export($data, true);
>>>>>>> 3792da0d (Check & fix styling)
=======
        $exported = VarExporter::export($data);
        // $exported = var_export($data, true);
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
        $content = "<?php\n\ndeclare(strict_types=1);\n\nreturn ".$exported.";\n";

        return (bool) file_put_contents($filename, $content);
    }
<<<<<<< HEAD

    /**
     * @param  array<int|string, mixed>  $data
     */
    private function exportArray(array $data, int $depth): string
    {
        if ($data === []) {
            return '[]';
        }

        $indent = str_repeat('    ', $depth);
        $inner = str_repeat('    ', $depth + 1);
        $lines = ['['];

        foreach ($data as $key => $value) {
            $renderedKey = is_int($key) ? (string) $key : var_export((string) $key, true);
            $lines[] = $inner.$renderedKey.' => '.$this->exportValue($value, $depth + 1).',';
        }

        $lines[] = $indent.']';

        return implode("\n", $lines);
    }

    private function exportValue(mixed $value, int $depth): string
    {
        if (is_array($value)) {
            /** @var array<int|string, mixed> $value */
            return $this->exportArray($value, $depth);
        }

        return var_export($value, true);
    }
=======
<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
}
