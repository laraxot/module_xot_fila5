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
<<<<<<< HEAD
        $record = new class extends Model
        {
<<<<<<< .merge_file_p0I2YE
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_tUKVM8
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
        $record = new class extends Model
        {
=======
        $record = new class extends Model {
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
        $record = new class extends Model {
>>>>>>> .merge_file_3BlN1b
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
        $record = new class extends Model {
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_dzXCVI
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
            /** @var string */
            protected $table = 'xot_transition_test';
        };

<<<<<<< HEAD
<<<<<<< .merge_file_p0I2YE
<<<<<<< HEAD
        $transition = new class($record) extends XotBaseTransition
        {
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_tUKVM8
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
        $transition = new class($record) extends XotBaseTransition
        {
=======
        $transition = new class($record) extends XotBaseTransition {
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
        $transition = new class($record) extends XotBaseTransition {
>>>>>>> .merge_file_3BlN1b
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
        $transition = new class($record) extends XotBaseTransition {
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
        $transition = new class($record) extends XotBaseTransition
        {
>>>>>>> .merge_file_dzXCVI
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
            public static string $name = 'test_transition';
        };

        return [$record, $transition];
    }
}
