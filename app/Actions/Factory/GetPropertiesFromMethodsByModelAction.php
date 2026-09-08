<?php

declare(strict_types=1);

/**
 * @see https://github.com/TheDoctor0/laravel-factory-generator. 24 days ago
 * @see https://github.com/mpociot/laravel-test-factory-helper  on 2 Mar 2020.
 * @see https://github.com/laravel-shift/factory-generator on 10 Aug.
 * @see https://dev.to/marcosgad/make-factory-more-organized-laravel-3c19.
 * @see https://medium.com/@yohan7788/seeders-and-faker-in-laravel-6806084a0c7.
 */

namespace Modules\Xot\Actions\Factory;

<<<<<<< HEAD
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Str;
use ReflectionMethod;
use Spatie\QueueableAction\QueueableAction;
use SplFileObject;
use Webmozart\Assert\Assert;

use function Safe\preg_replace;

=======
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Str;

use function Safe\file;
use function Safe\preg_replace;

use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;

>>>>>>> c7fd73eb (.)
/**
 * Classe per estrarre proprietà dai metodi di relazione di un modello.
 *
 * @see https://github.com/mpociot/laravel-test-factory-helper/blob/master/src/Console/GenerateCommand.php#L213
 */
class GetPropertiesFromMethodsByModelAction
{
    use QueueableAction;

    /**
     * Estrae le proprietà dai metodi di relazione del modello.
     *
<<<<<<< HEAD
     * @param  Model  $model  Il modello da analizzare
=======
     * @param Model $model Il modello da analizzare
     *
>>>>>>> c7fd73eb (.)
     * @return array<string, string> Dati estratti dalle relazioni
     */
    public function execute(Model $model): array
    {
<<<<<<< HEAD
        Assert::isInstanceOf($model, Model::class, 'Il parametro deve essere un\'istanza di Model');

        $methods = get_class_methods($model);
        Assert::isArray($methods, 'get_class_methods deve restituire un array');

        $data = [];

        foreach ($methods as $method) {
            Assert::string($method, 'Il nome del metodo deve essere una stringa');

=======
        $data = [];
        $methods = get_class_methods($model);

        foreach ($methods as $method) {
>>>>>>> c7fd73eb (.)
            // Ignoriamo i metodi che iniziano con "get" e quelli ereditati da Model
            if (Str::startsWith($method, 'get') || method_exists(Model::class, $method)) {
                continue;
            }

            // Utilizziamo la reflection per ispezionare il codice
            try {
<<<<<<< HEAD
                $reflection = new ReflectionMethod($model, $method);
                $filename = $reflection->getFileName();

                if ($filename === false) {
=======
                $reflection = new \ReflectionMethod($model, $method);
                $filename = $reflection->getFileName();

                if (false === $filename) {
>>>>>>> c7fd73eb (.)
                    continue; // Saltiamo i metodi senza file (es. metodi interni)
                }

                Assert::fileExists($filename, "Il file {$filename} non esiste");

                // Leggiamo il contenuto del metodo
<<<<<<< HEAD
                $file = new SplFileObject($filename);
                Assert::isInstanceOf(
                    $file,
                    SplFileObject::class,
                    'Errore nella creazione dell\'oggetto SplFileObject',
                );
=======
                $file = new \SplFileObject($filename);
>>>>>>> c7fd73eb (.)

                $file->seek($reflection->getStartLine() - 1);
                $startLine = $file->key();
                $endLine = $reflection->getEndLine();

                Assert::greaterThanEq(
                    $endLine,
                    $startLine,
                    'La linea finale deve essere maggiore o uguale a quella iniziale',
                );

                // Leggiamo il contenuto del metodo
                $code = '';
                while ($file->key() < $endLine) {
                    $currentLine = $file->current();

                    // Assicuriamoci che la linea corrente sia una stringa
                    Assert::string($currentLine, 'La linea corrente deve essere una stringa');
                    $code .= $currentLine;

                    $file->next();
                }

                // Normalizziamo e analizziamo il codice
                Assert::stringNotEmpty($code, 'Il codice del metodo non può essere vuoto');
                $replaced = preg_replace('/\s\s+/', '', $code);
                $codeStr = is_string($replaced) ? trim($replaced) : trim($code);

                // Estrazione del corpo della funzione
                $begin = mb_strpos($codeStr, 'function(');
<<<<<<< HEAD
                $begin = $begin !== false ? $begin : 0;

                $end = mb_strrpos($codeStr, '}');
                $end = $end !== false ? $end : mb_strlen($codeStr);

                $length = ($end - $begin) + 1;
=======
                $begin = false !== $begin ? $begin : 0;

                $end = mb_strrpos($codeStr, '}');
                $end = false !== $end ? $end : mb_strlen($codeStr);

                $length = $end - $begin + 1;
>>>>>>> c7fd73eb (.)
                Assert::greaterThan($length, 0, 'La lunghezza del corpo della funzione deve essere positiva');

                $codeStr = mb_substr($codeStr, $begin, $length);
                Assert::stringNotEmpty($codeStr, 'Il corpo della funzione non può essere vuoto');

                // Cerchiamo relazioni belongsTo
                $this->extractBelongsToRelations($codeStr, $model, $method, $data);
<<<<<<< HEAD
            } catch (Exception $e) {
=======
            } catch (\Exception $e) {
>>>>>>> c7fd73eb (.)
                // Se c'è un errore nell'analisi del metodo, lo ignoriamo e passiamo al successivo
                continue;
            }
        }

        return $data;
    }

    /**
     * Estrae le relazioni belongsTo dal codice.
     *
<<<<<<< HEAD
     * @param  string  $codeStr  Il codice da analizzare
     * @param  Model  $model  Il modello
     * @param  string  $method  Il nome del metodo
     * @param  array<string, string>  &$data  L'array in cui salvare i dati estratti
=======
     * @param string                $codeStr Il codice da analizzare
     * @param Model                 $model   Il modello
     * @param string                $method  Il nome del metodo
     * @param array<string, string> &$data   L'array in cui salvare i dati estratti
>>>>>>> c7fd73eb (.)
     */
    private function extractBelongsToRelations(string $codeStr, Model $model, string $method, array &$data): void
    {
        $search = '$this->belongsTo(';
        $pos = mb_stripos($codeStr, $search);

<<<<<<< HEAD
        if ($pos === false) {
=======
        if (false === $pos) {
>>>>>>> c7fd73eb (.)
            return; // Il metodo non contiene una relazione belongsTo
        }

        try {
            // Chiamiamo il metodo per ottenere la relazione
            $relationObj = $model->$method();

            // Verifichiamo che sia effettivamente una relazione
<<<<<<< HEAD
            if (! ($relationObj instanceof Relation)) {
=======
            if (! $relationObj instanceof Relation) {
>>>>>>> c7fd73eb (.)
                return;
            }

            // Verifichiamo che il metodo getForeignKeyName esista
            if (! method_exists($relationObj, 'getForeignKeyName')) {
<<<<<<< HEAD
                throw new Exception('Il metodo getForeignKeyName non esiste nella relazione');
=======
                throw new \Exception('Il metodo getForeignKeyName non esiste nella relazione');
>>>>>>> c7fd73eb (.)
            }

            // Otteniamo il nome della chiave esterna
            $foreignKeyName = $relationObj->getForeignKeyName();
            Assert::string($foreignKeyName, 'Il nome della chiave esterna deve essere una stringa');

            // Otteniamo la classe relazionata
            $relatedClass = get_class($relationObj->getRelated());
<<<<<<< HEAD
            Assert::classExists($relatedClass, "La classe relazionata {$relatedClass} non esiste");

            // Chiamiamo GetFakerAction con parametri corretti
            $fakerAction = app(GetFakerAction::class);
            Assert::isCallable([$fakerAction, 'execute'], 'GetFakerAction::execute deve essere chiamabile');

            $type = 'factory('.$relatedClass.'::class)';
            $data[$foreignKeyName] = $fakerAction->execute($foreignKeyName, $type, null);
        } catch (Exception $e) {
=======

            // Chiamiamo GetFakerAction con parametri corretti
            $fakerAction = app(GetFakerAction::class);
            // Assert::isCallable rimosso - metodo verificato a compile time

            $type = 'factory('.$relatedClass.'::class)';
        } catch (\Exception $e) {
>>>>>>> c7fd73eb (.)
            // In caso di errore, ignoriamo la relazione
            return;
        }
    }
}
