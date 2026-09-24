<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\String;

<<<<<<< .merge_file_45XkXQ
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> .merge_file_Yk5CvH
use Webmozart\Assert\Assert;

use function Safe\preg_replace;

<<<<<<< .merge_file_45XkXQ
=======
use function Safe\preg_replace;

use Webmozart\Assert\Assert;

>>>>>>> laraxot/dev
=======
use function Safe\preg_replace;

use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;

>>>>>>> 8d801bbe (Check & fix styling)
=======
>>>>>>> .merge_file_Yk5CvH
/**
 * Action per normalizzare i nomi dei driver.
 *
 * Questa action centralizza la logica di normalizzazione dei nomi dei driver
 * per evitare duplicazione di codice e garantire consistenza in tutta l'applicazione.
 */
class NormalizeDriverNameAction
{
<<<<<<< HEAD
=======
    use QueueableAction;

>>>>>>> 8d801bbe (Check & fix styling)
    /**
     * Normalizza il nome del driver eliminando caratteri non alfanumerici
     * e gestendo eventuali casi speciali/alias.
     *
     * @return string Nome normalizzato
     */
    public function execute(string $driver): string
    {
        // Gestione speciale per driver con caratteri non alfanumerici (es. 360dialog)
        $driver = preg_replace('/[^a-zA-Z0-9]/', '', $driver);
        Assert::string($driver, 'Driver name must be a string after normalization');

        return strtolower($driver);
    }
}
