<?php

declare(strict_types=1);

namespace Modules\Xot\Actions;

use Illuminate\Support\Arr;
<<<<<<< .merge_file_M7YkOy
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> .merge_file_7Yh1iK
use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;

use function Safe\preg_match_all;

<<<<<<< .merge_file_M7YkOy
=======
=======
>>>>>>> 3792da0d (Check & fix styling)

use function Safe\preg_match_all;

use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;

<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_7Yh1iK
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
<<<<<<< .merge_file_M7YkOy
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  string  $str  The page range string to parse
=======
     * @param string $str The page range string to parse
     *
>>>>>>> laraxot/dev
=======
     * @param string $str The page range string to parse
     *
>>>>>>> 3792da0d (Check & fix styling)
=======
     * @param  string  $str  The page range string to parse
>>>>>>> .merge_file_7Yh1iK
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
<<<<<<< .merge_file_M7YkOy
<<<<<<< HEAD
<<<<<<< HEAD
        if ($matches[0] === []) {
=======
        if ([] === $matches[0]) {
>>>>>>> laraxot/dev
=======
        if ([] === $matches[0]) {
>>>>>>> 3792da0d (Check & fix styling)
=======
        if ($matches[0] === []) {
>>>>>>> .merge_file_7Yh1iK
            throw new \InvalidArgumentException('No valid page numbers found');
        }

        /** @var list<string> $matches0 */
        $matches0 = $matches[0];
        $matchCount = count($matches0);
        $res = [];

<<<<<<< .merge_file_M7YkOy
<<<<<<< HEAD
<<<<<<< HEAD
        for ($i = 0; $i < $matchCount; $i++) {
=======
        for ($i = 0; $i < $matchCount; ++$i) {
>>>>>>> laraxot/dev
=======
        for ($i = 0; $i < $matchCount; ++$i) {
>>>>>>> 3792da0d (Check & fix styling)
=======
        for ($i = 0; $i < $matchCount; $i++) {
>>>>>>> .merge_file_7Yh1iK
            $firstNumber = Arr::get($matches, "1.{$i}");
            $secondNumber = Arr::get($matches, "2.{$i}");

            Assert::string($firstNumber, 'First number must be a string');
            Assert::string($secondNumber, 'Second number must be a string');

<<<<<<< .merge_file_M7YkOy
<<<<<<< HEAD
<<<<<<< HEAD
            if ($secondNumber === '') {
=======
            if ('' === $secondNumber) {
>>>>>>> laraxot/dev
=======
            if ('' === $secondNumber) {
>>>>>>> 3792da0d (Check & fix styling)
=======
            if ($secondNumber === '') {
>>>>>>> .merge_file_7Yh1iK
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
<<<<<<< .merge_file_M7YkOy
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  int  $from  Starting number
     * @param  int  $to  Ending number
=======
     * @param int $from Starting number
     * @param int $to   Ending number
     *
>>>>>>> laraxot/dev
=======
     * @param int $from Starting number
     * @param int $to   Ending number
     *
>>>>>>> 3792da0d (Check & fix styling)
=======
     * @param  int  $from  Starting number
     * @param  int  $to  Ending number
>>>>>>> .merge_file_7Yh1iK
     * @return array<int> Array of sequential numbers
     */
    public static function fromTo(int $from, int $to): array
    {
        Assert::greaterThanEq($to, $from, 'End number must be greater than or equal to start number');

        return range($from, $to);
    }
}
