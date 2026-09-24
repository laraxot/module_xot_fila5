<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Fixtures;

use Illuminate\Database\Eloquent\Model;
use Modules\Xot\States\Transitions\XotBaseTransition;

/**
 * Coppia record + transizione concreta, per i test di XotBaseTransition.
 *
 * Prima era la funzione globale `xotBaseTransitionFixture()` in
 * `tests/Support/helpers.php`. Vedi {@see SafeEloquentCastFixture} per il
 * motivo dello spostamento.
 */
final class XotBaseTransitionFixture
{
    /**
     * @return array{0: Model, 1: XotBaseTransition}
     */
    public static function make(): array
    {
<<<<<<< .merge_file_24U5Mt
<<<<<<< HEAD
        $record = new class extends Model
        {
=======
=======
<<<<<<< .merge_file_HONhe1
        $record = new class extends Model
        {
=======
<<<<<<< HEAD
        $record = new class extends Model
        {
=======
>>>>>>> .merge_file_FZucZe
<<<<<<< .merge_file_tUKVM8
<<<<<<< HEAD
        $record = new class extends Model
        {
=======
        $record = new class extends Model {
>>>>>>> laraxot/dev
=======
        $record = new class extends Model {
>>>>>>> .merge_file_3BlN1b
>>>>>>> laraxot/dev
<<<<<<< .merge_file_24U5Mt
=======
>>>>>>> .merge_file_3UwFvp
>>>>>>> .merge_file_FZucZe
            /** @var string */
            protected $table = 'xot_transition_test';
        };

<<<<<<< .merge_file_24U5Mt
=======
<<<<<<< .merge_file_HONhe1
        $transition = new class($record) extends XotBaseTransition
        {
=======
>>>>>>> .merge_file_FZucZe
<<<<<<< HEAD
        $transition = new class($record) extends XotBaseTransition
        {
=======
<<<<<<< .merge_file_tUKVM8
<<<<<<< HEAD
        $transition = new class($record) extends XotBaseTransition
        {
=======
        $transition = new class($record) extends XotBaseTransition {
>>>>>>> laraxot/dev
=======
        $transition = new class($record) extends XotBaseTransition {
>>>>>>> .merge_file_3BlN1b
>>>>>>> laraxot/dev
<<<<<<< .merge_file_24U5Mt
=======
>>>>>>> .merge_file_3UwFvp
>>>>>>> .merge_file_FZucZe
            public static string $name = 'test_transition';
        };

        return [$record, $transition];
    }
}
