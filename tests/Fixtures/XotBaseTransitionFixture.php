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
=======
<<<<<<< HEAD
        $record = new class extends Model
        {
=======
        $record = new class extends Model {
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
            /** @var string */
            protected $table = 'xot_transition_test';
        };

<<<<<<< HEAD
        $transition = new class($record) extends XotBaseTransition
        {
=======
<<<<<<< HEAD
        $transition = new class($record) extends XotBaseTransition
        {
=======
        $transition = new class($record) extends XotBaseTransition {
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
            public static string $name = 'test_transition';
        };

        return [$record, $transition];
    }
}
