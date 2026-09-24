<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Arr;

<<<<<<< HEAD
use Spatie\QueueableAction\QueueableAction;

use function Safe\file_put_contents;

=======
use function Safe\file_put_contents;

use Spatie\QueueableAction\QueueableAction;

>>>>>>> laraxot/dev
/**
 * Persiste un array PHP con **una chiave per riga** (mai array annidati inline).
 *
 * Perché: Symfony VarExporter compatta i nested (`'nav' => ['a' => 1, 'b' => 2]`),
 * e `SaveTransAction` riscrive i lang così — viola la convenzione clean-code del repo
 * (ordine utente 2026-09-16; SSoT `.codestyle-preferences.md` + memoria
 * `php-array-one-key-per-line.md`).
 */
class SavePhpArrayAction
{
    use QueueableAction;

    /**
<<<<<<< HEAD
     * @param  array<int|string, mixed>  $data
=======
     * @param array<int|string, mixed> $data
>>>>>>> laraxot/dev
     */
    public function execute(array $data, string $filename): bool
    {
        $exported = $this->exportArray($data, 0);
        $content = "<?php\n\ndeclare(strict_types=1);\n\nreturn ".$exported.";\n";

        return (bool) file_put_contents($filename, $content);
    }

    /**
<<<<<<< HEAD
     * @param  array<int|string, mixed>  $data
     */
    private function exportArray(array $data, int $depth): string
    {
        if ($data === []) {
=======
     * @param array<int|string, mixed> $data
     */
    private function exportArray(array $data, int $depth): string
    {
        if ([] === $data) {
>>>>>>> laraxot/dev
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
<<<<<<< HEAD
            /** @var array<int|string, mixed> $value */
=======
            /* @var array<int|string, mixed> $value */
>>>>>>> laraxot/dev
            return $this->exportArray($value, $depth);
        }

        return var_export($value, true);
    }
}
