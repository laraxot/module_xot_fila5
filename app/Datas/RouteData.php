<?php

declare(strict_types=1);

namespace Modules\Xot\Datas;

use Spatie\LaravelData\Data;

/**
 * Class RouteData - Gestisce la configurazione delle rotte per il framework Laraxot.
<<<<<<< HEAD
=======
 *
 * @phpstan-consistent-constructor
>>>>>>> c7fd73eb (.)
 */
class RouteData extends Data
{
    /**
<<<<<<< HEAD
     * @param  string  $prefix  Prefisso per tutte le rotte
     * @param  array<int, string>  $middleware  Middleware applicati a tutte le rotte
     * @param  string  $namespace  Namespace per i controller
     * @param  bool  $use_passport  Se utilizzare Passport per l'autenticazione API
     * @param  array<int, string>  $except_verify  Rotte eccettuate dalla verifica
     * @param  bool  $enable  Se le rotte sono abilitate
=======
     * @param string             $prefix        Prefisso per tutte le rotte
     * @param array<int, string> $middleware    Middleware applicati a tutte le rotte
     * @param string             $namespace     Namespace per i controller
     * @param bool               $use_passport  Se utilizzare Passport per l'autenticazione API
     * @param array<int, string> $except_verify Rotte eccettuate dalla verifica
     * @param bool               $enable        Se le rotte sono abilitate
>>>>>>> c7fd73eb (.)
     */
    public function __construct(
        public readonly string $prefix = '',
        public readonly array $middleware = [],
        public readonly string $namespace = '',
        public readonly bool $use_passport = false,
        public readonly array $except_verify = [],
        public readonly bool $enable = true,
<<<<<<< HEAD
    ) {}
=======
    ) {
    }
>>>>>>> c7fd73eb (.)

    /**
     * Create a new instance of RouteData with default values.
     */
<<<<<<< HEAD
    public static function make(): static
    {
        return new static();
=======
    public static function make(): self
    {
        return new self();
>>>>>>> c7fd73eb (.)
    }
}
