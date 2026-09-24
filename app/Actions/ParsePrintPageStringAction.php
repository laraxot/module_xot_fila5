<?php

declare(strict_types=1);

namespace Modules\Xot\Actions;

use Illuminate\Support\Arr;
<<<<<<< .merge_file_0Rq2IV
use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;

use function Safe\preg_match_all;

=======
<<<<<<< HEAD
use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;

use function Safe\preg_match_all;

=======

use function Safe\preg_match_all;

use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;

>>>>>>> laraxot/dev
>>>>>>> .merge_file_nq4seS
/**
 * Parses a print page string into an array of page numbers.
 *
 * @example "1-4,6,7,8,11-14" becomes [1,2,3,4,6,7,8,11,12,13,14]
 */
class ParsePrintPageStringAction
{
    use QueueableAction;

    /**
     * Execute the page string parsing.
     *
<<<<<<< .merge_file_0Rq2IV
     * @param  string  $str  The page range string to parse
=======
<<<<<<< HEAD
     * @param  string  $str  The page range string to parse
=======
     * @param string $str The page range string to parse
     *
>>>>>>> laraxot/dev
>>>>>>> .merge_file_nq4seS
     * @return array<int> Array of page numbers
     */
    public static function execute(string $str): array
    {
        $pattern = '/(\d+)(?:(?:-)(\d+))?(?:,(?!$))?/';
        $matches = [];
        preg_match_all($pattern, $str, $matches);

        /**
         * @var array{list<string>, list<numeric-string>, list<''|numeric-string>} $matches
         */
<<<<<<< .merge_file_0Rq2IV
        if ($matches[0] === []) {
=======
<<<<<<< HEAD
        if ($matches[0] === []) {
=======
        if ([] === $matches[0]) {
>>>>>>> laraxot/dev
>>>>>>> .merge_file_nq4seS
            throw new \InvalidArgumentException('No valid page numbers found');
        }

        /** @var list<string> $matches0 */
        $matches0 = $matches[0];
        $matchCount = count($matches0);
        $res = [];

<<<<<<< .merge_file_0Rq2IV
        for ($i = 0; $i < $matchCount; $i++) {
=======
<<<<<<< HEAD
        for ($i = 0; $i < $matchCount; $i++) {
=======
        for ($i = 0; $i < $matchCount; ++$i) {
>>>>>>> laraxot/dev
>>>>>>> .merge_file_nq4seS
            $firstNumber = Arr::get($matches, "1.{$i}");
            $secondNumber = Arr::get($matches, "2.{$i}");

            Assert::string($firstNumber, 'First number must be a string');
            Assert::string($secondNumber, 'Second number must be a string');

<<<<<<< .merge_file_0Rq2IV
            if ($secondNumber === '') {
=======
<<<<<<< HEAD
            if ($secondNumber === '') {
=======
            if ('' === $secondNumber) {
>>>>>>> laraxot/dev
>>>>>>> .merge_file_nq4seS
                $res[] = (int) $firstNumber;
            } else {
                $res = array_merge($res, self::fromTo((int) $firstNumber, (int) $secondNumber));
            }
        }

        return $res;
    }

    /**
     * Generate an array of numbers from start to end inclusive.
     *
<<<<<<< .merge_file_0Rq2IV
     * @param  int  $from  Starting number
     * @param  int  $to  Ending number
=======
<<<<<<< HEAD
     * @param  int  $from  Starting number
     * @param  int  $to  Ending number
=======
     * @param int $from Starting number
     * @param int $to   Ending number
     *
>>>>>>> laraxot/dev
>>>>>>> .merge_file_nq4seS
     * @return array<int> Array of sequential numbers
     */
    public static function fromTo(int $from, int $to): array
    {
        Assert::greaterThanEq($to, $from, 'End number must be greater than or equal to start number');

        return range($from, $to);
    }
}
