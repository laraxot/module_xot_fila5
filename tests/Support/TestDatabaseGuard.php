<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Support;

use Illuminate\Contracts\Config\Repository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\ConfigurationUrlParser;
use InvalidArgumentException;
use RuntimeException;

/**
 * Rifiuta di avviare i test se possono raggiungere un database non usa-e-getta.
 *
 * Una sola implementazione, chiamata da `Modules\Xot\Tests\CreatesApplication` (TestCase di modulo)
 * e da `Tests\TestCase` (radice) dopo il boot dell'app e prima di qualunque test.
 * Legge la config EFFETTIVA (anche se in cache), non le variabili d'ambiente.
 *
 * Aborta se l'ambiente non e' `testing`, oppure se una connessione non sqlite ha un database
 * che non finisce per `_test`. sqlite (anche `:memory:`) e' sempre ammesso. Non stampa mai password.
 *
 * @see Modules/Xot/docs/stories/test-database-guard.story.md
 */
final class TestDatabaseGuard
{
    private const string DISPOSABLE_SUFFIX = '_test';

    /** Prefisso dei DB creati e poi eliminati da bashscripts/tools/pest-scratch-db.sh (non finiscono per `_test`). */
    private const string SCRATCH_PREFIX = 'claude_scratch_pest_';

    /**
     * Connessioni escluse dal controllo.
     *
     * `liveuser_general` (config/localhost/database.php) legge DB_DATABASE_LU, che nessun `.env*` definisce:
     * ha quindi il fallback fisso `forge13` anche nel caso normale. L'unico consumatore e' il repository dei
     * token di reset password (`auth.passwords.users.connection`). Senza esclusione la guardia scatterebbe sempre.
     * Da togliere quando `.env.testing` definisce DB_DATABASE_LU=<nome>_test.
     *
     * @var list<string>
     */
    private const array IGNORED_CONNECTIONS = ['liveuser_general'];

    /**
     * Controlla l'app avviata (ambiente e `database.connections` effettivi).
     */
    public static function assertApplication(Application $app): void
    {
        $env = $app->environment();
        $raw = $app->make(Repository::class)->get('database.connections', []);

        $connections = [];
        foreach (is_array($raw) ? $raw : [] as $name => $connection) {
            if (! is_string($name) || ! is_array($connection)) {
                continue;
            }
            $driver = $connection['driver'] ?? null;
            $database = $connection['database'] ?? null;
            $url = $connection['url'] ?? null;
            $connections[$name] = [
                'driver' => is_string($driver) ? $driver : '',
                'database' => is_string($database) ? $database : null,
                'url' => is_string($url) ? $url : null,
            ];
        }

        self::assert(is_string($env) ? $env : '', $connections);
    }

    /**
     * Funzione pura: nessun accesso a Laravel ne' al database.
     *
     * @param  array<string, array{driver?: string, database?: string|null, url?: string|null}>  $connections
     *
     * @throws RuntimeException se l'ambiente non e' `testing` o una connessione punta a un DB non usa-e-getta
     */
    public static function assert(string $env, array $connections): void
    {
        if ($env !== 'testing') {
            throw new RuntimeException(sprintf(
                'Test abortiti: APP_ENV="%s" invece di "testing". Un APP_ENV gia\' esportato nella shell batte phpunit.xml '
                .'e carica .env (DB reale). Fare unset APP_ENV e rilanciare.',
                $env,
            ));
        }

        $offenders = [];
        foreach ($connections as $name => $connection) {
            if (in_array($name, self::IGNORED_CONNECTIONS, true)) {
                continue;
            }
            [$driver, $database] = self::effective($connection);
            if ($driver === 'sqlite' || $database === '' || self::isDisposable($database)) {
                continue;
            }
            $offenders[] = sprintf('"%s" (%s) -> database "%s"', $name, $driver, $database);
        }

        if ($offenders !== []) {
            throw new RuntimeException(
                'Test abortiti: connessioni verso database non usa-e-getta (il nome deve finire per "_test"): '
                .implode('; ', $offenders).'. Cause tipiche: DB_DATABASE* gia\' esportati nella shell, '
                .'.env.testing mancante, DB_URL impostato, bootstrap/cache/config.php obsoleto.',
            );
        }
    }

    /**
     * Driver e database con cui Laravel si connette davvero: se `url` e' valorizzato, schema e path dell'URL
     * vincono su `driver` e `database` (stesso parser del runtime). L'URL non viene mai stampato.
     *
     * @param  array{driver?: string, database?: string|null, url?: string|null}  $connection
     * @return array{string, string}
     */
    private static function effective(array $connection): array
    {
        try {
            $resolved = (new ConfigurationUrlParser)->parseConfiguration($connection);
        } catch (InvalidArgumentException) {
            return [$connection['driver'] ?? '', '<url non analizzabile>'];
        }
        $driver = $resolved['driver'] ?? null;
        $database = $resolved['database'] ?? null;

        return [is_string($driver) ? $driver : '', is_string($database) ? $database : ''];
    }

    private static function isDisposable(string $database): bool
    {
        return str_ends_with($database, self::DISPOSABLE_SUFFIX) || str_starts_with($database, self::SCRATCH_PREFIX);
    }
}
