<?php

declare(strict_types=1);

namespace Modules\Xot\Datas;

use Spatie\LaravelData\Data;

/**
 * Class RouteData - Gestisce la configurazione delle rotte per il framework Laraxot.
 *
 * @phpstan-consistent-constructor
 */
class RouteData extends Data
{
    /**
<<<<<<< .merge_file_5Z45Ug
=======
<<<<<<< HEAD
>>>>>>> .merge_file_RcyGek
     * @param  string  $prefix  Prefisso per tutte le rotte
     * @param  array<int, string>  $middleware  Middleware applicati a tutte le rotte
     * @param  string  $namespace  Namespace per i controller
     * @param  bool  $use_passport  Se utilizzare Passport per l'autenticazione API
     * @param  array<int, string>  $except_verify  Rotte eccettuate dalla verifica
     * @param  bool  $enable  Se le rotte sono abilitate
<<<<<<< .merge_file_5Z45Ug
=======
=======
     * @param string             $prefix        Prefisso per tutte le rotte
     * @param array<int, string> $middleware    Middleware applicati a tutte le rotte
     * @param string             $namespace     Namespace per i controller
     * @param bool               $use_passport  Se utilizzare Passport per l'autenticazione API
     * @param array<int, string> $except_verify Rotte eccettuate dalla verifica
     * @param bool               $enable        Se le rotte sono abilitate
>>>>>>> laraxot/dev
>>>>>>> .merge_file_RcyGek
     */
    public function __construct(
        public readonly string $prefix = '',
        public readonly array $middleware = [],
        public readonly string $namespace = '',
        public readonly bool $use_passport = false,
        public readonly array $except_verify = [],
        public readonly bool $enable = true,
<<<<<<< .merge_file_5Z45Ug
    ) {}
=======
<<<<<<< HEAD
    ) {}
=======
    ) {
    }
>>>>>>> laraxot/dev
>>>>>>> .merge_file_RcyGek

    /**
     * Create a new instance of RouteData with default values.
     */
    public static function make(): self
    {
<<<<<<< .merge_file_5Z45Ug
        return new self;
=======
<<<<<<< HEAD
        return new self;
=======
        return new self();
>>>>>>> laraxot/dev
>>>>>>> .merge_file_RcyGek
    }
}
