<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\String;

<<<<<<< HEAD
use Spatie\QueueableAction\QueueableAction;

use function Safe\preg_replace;

=======
use function Safe\preg_replace;

use Webmozart\Assert\Assert;

>>>>>>> c7fd73eb (.)
/**
 * Action per normalizzare i nomi dei driver.
 *
 * Questa action centralizza la logica di normalizzazione dei nomi dei driver
 * per evitare duplicazione di codice e garantire consistenza in tutta l'applicazione.
 */
class NormalizeDriverNameAction
{
<<<<<<< HEAD
    use QueueableAction;

=======
>>>>>>> c7fd73eb (.)
    /**
     * Normalizza il nome del driver eliminando caratteri non alfanumerici
     * e gestendo eventuali casi speciali/alias.
     *
<<<<<<< HEAD
     * @param  string  $driver  Nome del driver da normalizzare
=======
>>>>>>> c7fd73eb (.)
     * @return string Nome normalizzato
     */
    public function execute(string $driver): string
    {
        // Gestione speciale per driver con caratteri non alfanumerici (es. 360dialog)
<<<<<<< HEAD
        $result = preg_replace('/[^a-zA-Z0-9]/', '', ucfirst(strtolower($driver)));

        // Assicuriamo che il risultato sia sempre una stringa
        return is_string($result) ? $result : '';
=======
        $driver = preg_replace('/[^a-zA-Z0-9]/', '', $driver);
        Assert::string($driver, 'Driver name must be a string after normalization');

        return strtolower($driver);
>>>>>>> c7fd73eb (.)
    }
}
