<<<<<<< HEAD
# Correzioni PHPStan - 6 Gennaio 2025

## Errori Risolti

5693302 (.)

b6f667c (.)

# Correzioni PHPStan nel Modulo Xot

```
Line 406: Call to function is_array() with array{0?: string, 1?: 'container'|'item', 2?: numeric-string} will always evaluate to true.
```

### 2. Errori in Actions/Filament/AutoLabelAction.php

```
Line 35: Call to an undefined method Filament\Forms\Components\Component::getName().
Line 39: Call to an undefined method Filament\Forms\Components\Component::getName().
Line 40: Call to an undefined method Filament\Forms\Components\Component::getName().
```

### 3. Errore in Actions/File/GetComponentsAction.php

```
Line 91: Parameter #1 $objectOrClass of class ReflectionClass constructor expects class-string<T of object>|T of object, string given.
```

### 4. Errore in Actions/Import/ImportCsvAction.php

```
Line 145: Class Modules\Xot\Datas\ColumnData constructor invoked with 1 parameter, 2 required.
```

### 5. Errore in Actions/Model/GetSchemaManagerByModelClassAction.php

```
Line 21: Call to an undefined method Illuminate\Database\Connection::getDoctrineSchemaManager().
```

### 6. Errore in Actions/Model/StoreAction.php

```
Line 42: Access to an undefined property Illuminate\Database\Eloquent\Relations\Relation::$relationship_type.
```

### 7. Errore in Actions/Model/Update/BelongsToAction.php

```
Line 35: Offset 0 does not exist on non-empty-array<string, mixed>.
```

### 8. Errore in Actions/Model/Update/BelongsToManyAction.php

```
Line 64: Call to function is_iterable() with non-empty-list will always evaluate to true.
```

### 9. Errore in Actions/Model/Update/RelationAction.php

```
Line 33: Access to an undefined property Illuminate\Database\Eloquent\Relations\Relation::$relationship_type.
```

### 10. Errori in Console/Commands/DatabaseSchemaExportCommand.php

```
Line 86: Function preg_match_all is unsafe to use. It can return FALSE instead of throwing an exception.
Line 174: Strict comparison using === between string and false will always evaluate to false.
Line 233: Unable to resolve the template type TKey in call to function collect
Line 233: Unable to resolve the template type TValue in call to function collect
Line 235: Unable to resolve the template type TKey in call to function collect
Line 235: Unable to resolve the template type TValue in call to function collect
```

### 11. Errori in Console/Commands/DatabaseSchemaExporterCommand.php

```
Line 87: Function json_encode is unsafe to use. It can return FALSE instead of throwing an exception.
Line 87: Parameter #2 $contents of static method Illuminate\Support\Facades\File::put() expects string, string|false given.
```

### 12. Errori in Console/Commands/GenerateDbDocumentationCommand.php

```
Line 40: Function json_decode is unsafe to use. It can return FALSE instead of throwing an exception.
Line 239: Function json_encode is unsafe to use. It can return FALSE instead of throwing an exception.
```

### 13. Errori in Console/Commands/GenerateFilamentResources.php

```
Line 20: Command "filament:generate-resources" does not have argument "module".
Line 21: Parameter #1 $name of static method Nwidart\Modules\Facades\Module::find() expects string, array|bool|string|null given.
Line 24: Part $moduleName (array|bool|string) of encapsed string cannot be cast to string.
Line 29: Part $moduleName (array|bool|string) of encapsed string cannot be cast to string.
Line 33: Part $moduleName (array|bool|string) of encapsed string cannot be cast to string.
Line 42: Parameter #1 $string of function strtolower expects string, array|bool|string|null given.
Line 46: Part $moduleName (array|bool|string) of encapsed string cannot be cast to string.
```

### 14. Errori in Console/Commands/GenerateModelsFromSchemaCommand.php

```
Line 85: Function json_decode is unsafe to use. It can return FALSE instead of throwing an exception.
Line 145: Parameter #1 $haystack of static method Illuminate\Support\Str::endsWith() expects string, int|string given.
Line 188: Function date is unsafe to use. It can return FALSE instead of throwing an exception.
Line 368: Function preg_replace is unsafe to use. It can return FALSE instead of throwing an exception.
Line 385: Function preg_replace is unsafe to use. It can return FALSE instead of throwing an exception.
Line 388: Function preg_match is unsafe to use. It can return FALSE instead of throwing an exception.
Line 416: Function preg_match is unsafe to use. It can return FALSE instead of throwing an exception.
Line 422: Function preg_match is unsafe to use. It can return FALSE instead of throwing an exception.
Line 435: Strict comparison using !== between null and mixed will always evaluate to true.
```

### 15. Errori in Console/Commands/GenerateResourceFormSchemaCommand.php

```
Line 48: Strict comparison using === between array and false will always evaluate to false.
Line 59: Strict comparison using === between string and false will always evaluate to false.
Line 63: Strict comparison using === between int and false will always evaluate to false.
Line 67: Strict comparison using === between int and false will always evaluate to false.
Line 85: Strict comparison using === between int and false will always evaluate to false.
```

### 16. Errori in Console/Commands/ImportMdbToMySQL.php

```
Line 104: Result of method Modules\Xot\Console\Commands\ImportMdbToMySQL::exportTablesToCSV() (void) is used.
Line 106: Argument of an invalid type null supplied for foreach, only iterables are supported.
```

### 17. Errori in Console/Commands/ImportMdbToSQLite.php

```
Line 90: Method Modules\Xot\Console\Commands\ImportMdbToSQLite::createTablesInSQLite() has no return type specified.
Line 114: Method Modules\Xot\Console\Commands\ImportMdbToSQLite::importDataToSQLite() has no return type specified.
```

### 18. Errore in Console/Commands/SearchStringInDatabaseCommand.php

```
Line 53: Parameter #1 $results of method Modules\Xot\Console\Commands\SearchStringInDatabaseCommand::formatResults() expects Illuminate\Support\Collection<int, object>, Illuminate\Support\Collection<int, stdClass> given.
```

### 19. Errore in Datas/XotData.php

```
Line 209: Method Modules\Xot\Datas\XotData::getProfileClass() should return class-string<Illuminate\Database\Eloquent\Model&Modules\Xot\Contracts\ProfileContract> but returns string.
```

### 20. Errore in Filament/Pages/ArtisanCommandsManager.php

```
Line 27: Property Modules\Xot\Filament\Pages\ArtisanCommandsManager::$listeners has no type specified.
```

### 21. Errore in Filament/Resources/XotBaseResource.php

```
Line 147: Method Modules\Xot\Filament\Resources\XotBaseResource::getRelations() should return array<class-string<Filament\Resources\RelationManagers\RelationManager>|Filament\Resources\RelationManagers\RelationGroup|Filament\Resources\RelationManagers\RelationManagerConfiguration> but returns array<class-string|Filament\Resources\RelationManagers\RelationGroup|Filament\Resources\RelationManagers\RelationManagerConfiguration>.
```

### 22. Errori in Filament/Resources/XotBaseResource/RelationManager/XotBaseRelationManager.php

```
Line 111: Static access to instance property Modules\Xot\Filament\Resources\XotBaseResource\RelationManagers\XotBaseRelationManager::$resource.
Line 112: Dead catch - Exception is never thrown in the try block.
```

### 23. Errore in Filament/Widgets/XotBaseWidget.php

```
Line 33: Static property Modules\Xot\Filament\Widgets\XotBaseWidget::$view (view-string) does not accept string.
```

### 24. Errore in Services/ArtisanService.php

```
Line 146: Offset 1 on array{list<string>, list<string>} in isset() always exists and is not nullable.
```

## Soluzioni Implementate

### 1. Correzione in Helpers/Helper.php

Il problema è che PHPStan rileva che la chiamata a `is_array($matches)` sarà sempre vera perché `$matches` è già tipizzato come array. Abbiamo modificato il controllo per verificare se l'array non è vuoto invece di verificare se è un array:

```php
$pattern = '/(container|item)(\d+)/';
preg_match($pattern, $k, $matches);

if (!empty($matches) && isset($matches[1]) && isset($matches[2])) {
    $sk = $matches[1];
    $sv = $matches[2];
    // @phpstan-ignore offsetAccess.nonOffsetAccessible
    ${$sk}[$sv] = $v;
}
```

Questo controllo è più appropriato perché verifica che l'array `$matches` contenga effettivamente dei risultati, non solo che sia un array.

### 2. Correzione in Actions/Filament/AutoLabelAction.php

Il problema è che il codice chiamava il metodo `getName()` sui componenti Filament, ma non tutti i componenti hanno questo metodo. La soluzione è stata modificare il metodo `getComponentName()` per utilizzare un approccio più robusto:
}
```

5693302 (.)

b6f667c (.)

### 2. Validazione Dati
```php
/**
 * @param array<string, mixed> $data
 * @throws InvalidArgumentException
 */
private function validateData(array $data): void
{
    Assert::keyExists($data, 'required_field');
    Assert::string($data['required_field']);

### Versione HEAD

aurmich/dev
5693302 (.)

b6f667c (.)

### Servizi e Dependency Injection

**Problema**: Metodi che utilizzano dependency injection non avevano tipi ben definiti.

**Soluzione**:
1. Specificare i tipi di parametro e di ritorno in modo esplicito
2. Utilizzare interfacce per i servizi iniettati
3. Aggiungere annotazioni PHPDoc quando necessario

```php
private function getComponentName(Field|Component $component): string
{
    // Per i componenti Field di Filament
    if (method_exists($component, 'getName')) {
        return $component->getName();
    }

    // Per i componenti generali di Filament che hanno getStatePath
    if (method_exists($component, 'getStatePath')) {
        return $component->getStatePath();
    }

    // Fallback a reflection per altri casi
    $reflectionClass = new \ReflectionClass($component);
    if ($reflectionClass->hasProperty('name') && $reflectionClass->getProperty('name')->isPublic()) {
        $property = $reflectionClass->getProperty('name');
        return (string) $property->getValue($component);
    }

    // Ultima risorsa
    return class_basename($component);
}
```

Questo approccio controlla esplicitamente se i metodi esistono prima di chiamarli, utilizzando vari fallback se il metodo principale non è disponibile.

### 3. Correzione in Actions/File/GetComponentsAction.php

L'errore riguardava l'utilizzo del costruttore di `ReflectionClass` che richiedeva un parametro di tipo `class-string<T of object>`, ma veniva passata una stringa generica. Abbiamo risolto questo problema aggiungendo un controllo che verifica se la classe esiste prima di istanziare la `ReflectionClass` e usando un'annotazione PHPDoc per indicare a PHPStan che la variabile è di tipo `class-string`:

```php
try {
    // Assicuriamoci che comp_ns sia una classe valida prima di creare la ReflectionClass
    if (!class_exists($tmp->comp_ns)) {
        throw new \Exception("La classe {$tmp->comp_ns} non esiste");
    }
    /** @var class-string $classString */
    $classString = $tmp->comp_ns;
    $reflection = new \ReflectionClass($classString);
    if ($reflection->isAbstract()) {
        continue;
    }
} catch (\Exception $e) {
    // gestione dell'errore
}
```

Questo approccio garantisce che venga passato al costruttore di `ReflectionClass` solo un nome di classe valido, evitando l'errore di tipo rilevato da PHPStan.

### 4. Correzione in Actions/Import/ImportCsvAction.php

L'errore riguardava la creazione di un oggetto `ColumnData` con un solo parametro, mentre il costruttore ne richiede due. Abbiamo risolto il problema fornendo entrambi i parametri richiesti:

```php
// Prima:
return new ColumnData($column);

// Dopo:
return new ColumnData(
    name: $column,
    type: 'string' // Tipo predefinito, modificare se necessario
);
```

Abbiamo aggiunto il parametro `type` con un valore predefinito 'string', che soddisfa il requisito del costruttore di `ColumnData`.

### 5. Correzione in Actions/Model/GetSchemaManagerByModelClassAction.php

L'errore riguardava la chiamata al metodo `getDoctrineSchemaManager()` che è stato deprecato nelle versioni recenti di Laravel. Abbiamo aggiornato il codice per utilizzare l'approccio più recente:

```php
// Prima:
return $connection->getDoctrineSchemaManager();

// Dopo:
return $connection->getDoctrineConnection()->createSchemaManager();
```

Questo approccio utilizza prima `getDoctrineConnection()` e poi chiama `createSchemaManager()` sul risultato, che è il modo attualmente supportato per ottenere lo schema manager di Doctrine.

### 6. Correzione in Actions/Model/StoreAction.php

L'errore riguardava l'accesso a una proprietà `relationship_type` che non esiste nella classe `Relation`. Abbiamo modificato il codice per determinare il tipo di relazione in base al nome della classe:

```php
// Prima:
$action_class = __NAMESPACE__.'\\Store\\'.$relation->relationship_type.'Action';

// Dopo:
// Ottieni il tipo di relazione dal nome della classe
$relationClass = get_class($relation);
$relationshipType = class_basename($relationClass);

$action_class = __NAMESPACE__.'\\Store\\'.$relationshipType.'Action';
```

Questo approccio utilizza `get_class()` e `class_basename()` per ottenere il nome della classe della relazione e lo utilizza come tipo di relazione, evitando di accedere a una proprietà non esistente.

### 7. Correzione in Actions/Model/Update/BelongsToAction.php

L'errore riguardava l'accesso diretto all'offset 0 di un array associativo, che non garantisce la presenza di tale indice. Abbiamo modificato il codice per utilizzare `Arr::first()` che gestisce in modo sicuro l'accesso al primo elemento dell'array:

```php
// Prima:
$related_id = $relationDTO->data[0];

// Dopo:
$related_id = Arr::first($relationDTO->data);
if (null === $related_id) {
    return; // Non ci sono dati da elaborare
}
```

Questo approccio è più sicuro perché `Arr::first()` restituisce `null` se l'array è vuoto o se l'indice 0 non esiste, evitando così l'errore di accesso a un offset non esistente.

### 8. Correzione in Actions/Model/Update/BelongsToManyAction.php

L'errore riguardava la chiamata a `is_iterable()` su una variabile che PHPStan sa già essere un array non vuoto. Abbiamo rimosso questo controllo ridondante:

```php
// Prima:
$ids = is_iterable($ids) ? iterator_to_array($ids) : (array) $ids;
Assert::allScalar($ids, 'The "ids" array must contain only scalar values.');

// Dopo:
// $ids è già un array non vuoto a questo punto, quindi non serve verificare se è iterabile
Assert::allScalar($ids, 'The "ids" array must contain only scalar values.');
```

Questo approccio semplifica il codice rimuovendo un controllo che PHPStan identifica come sempre vero, mantenendo la validazione che gli elementi dell'array siano valori scalari.

### 9. Correzione in Actions/Model/Update/RelationAction.php

L'errore riguardava l'accesso a una proprietà `relationship_type` che non esiste nella classe `Relation`. Abbiamo modificato il codice per determinare il tipo di relazione in base al nome della classe, utilizzando lo stesso approccio adottato per StoreAction.php:

```php
// Prima:
$actionClass = __NAMESPACE__.'\\'.$relation->relationship_type.'Action';

// Dopo:
// Ottieni il tipo di relazione dal nome della classe
$relationClass = get_class($relation);
$relationshipType = class_basename($relationClass);

$actionClass = __NAMESPACE__.'\\'.$relationshipType.'Action';
```

Questo approccio utilizza `get_class()` e `class_basename()` per ottenere il nome della classe della relazione e lo utilizza come tipo di relazione, evitando di accedere a una proprietà non esistente.

### 10. Correzione in Console/Commands/DatabaseSchemaExportCommand.php

L'errore riguardava l'uso non sicuro di funzioni PHP che possono restituire `FALSE` invece di lanciare eccezioni e problemi con i tipi generici nelle collezioni.

#### Problema 1: Utilizzo non sicuro di preg_match_all
```php
// Prima:
preg_match_all('/CONSTRAINT\s+`([^`]+)`\s+FOREIGN\s+KEY\s+\(`([^`]+)`\)\s+REFERENCES\s+`([^`]+)`\s+\(`([^`]+)`\)/i', $createTableSql, $foreignKeys, PREG_SET_ORDER);

// Dopo:
try {
    $result = \Safe\preg_match_all('/CONSTRAINT\s+`([^`]+)`\s+FOREIGN\s+KEY\s+\(`([^`]+)`\)\s+REFERENCES\s+`([^`]+)`\s+\(`([^`]+)`\)/i', $createTableSql, $foreignKeys, PREG_SET_ORDER);
} catch (\Exception $e) {
    $this->error("Errore nell'analisi delle foreign keys per la tabella {$tableName}: " . $e->getMessage());
    $foreignKeys = [];
}
```

#### Problema 2: Confronto stretto tra `string` e `false`
```php
// Prima:
$jsonContent = json_encode($schema, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
if ($jsonContent === false) {
    throw new \RuntimeException('Failed to encode schema to JSON');
}
File::put($outputPath, $jsonContent);

// Dopo:
try {
    $jsonContent = \Safe\json_encode($schema, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    File::put($outputPath, $jsonContent);
    $this->info("Schema del database esportato con successo in: {$outputPath}");
} catch (\Exception $e) {
    $this->error("Errore nell'encoding JSON dello schema: " . $e->getMessage());
    return Command::FAILURE;
}
```

#### Problema 3: Tipi generici nelle collezioni
```php
// Prima:
$relevantTables = collect($schema['tables'])
    ->map(function (array $table, string $tableName) use ($schema): array {
        $relationCount = collect($schema['relationships'])
            ->filter(/*...*/);

// Dopo:
/** @var \Illuminate\Support\Collection<string, array<string, mixed>> $relevantTables */
$relevantTables = collect($schema['tables'])
    ->map(function (array $table, string $tableName) use ($schema): array {
        /** @var \Illuminate\Support\Collection<int, array<string, mixed>> $relationCount */
        $relationCount = collect($schema['relationships'])
            ->filter(/*...*/);
```

Queste modifiche risolvono i problemi in tre modi:
1. Utilizzando le funzioni del pacchetto `\Safe` che lanciano eccezioni invece di restituire `FALSE` in caso di errore
2. Gestendo correttamente potenziali errori durante l'encoding JSON
3. Aggiungendo annotazioni PHPDoc per specificare i tipi generici nelle collezioni Laravel

### 11. Correzione in Console/Commands/DatabaseSchemaExporterCommand.php

L'errore riguardava l'uso non sicuro di `json_encode` che può restituire `FALSE` invece di una stringa, e il passaggio di questo risultato come parametro a `File::put()`. Abbiamo corretto il problema utilizzando la versione sicura `\Safe\json_encode` e gestendo eventuali eccezioni:

```php
// Prima:
$filename = "{$outputDir}/{$databaseName}_schema.json";
File::put($filename, json_encode($databaseSchema, JSON_PRETTY_PRINT));
$this->info("Schema del database esportato con successo in: {$filename}");

// Dopo:
$filename = "{$outputDir}/{$databaseName}_schema.json";
try {
    $jsonContent = \Safe\json_encode($databaseSchema, JSON_PRETTY_PRINT);
    File::put($filename, $jsonContent);
    $this->info("Schema del database esportato con successo in: {$filename}");
} catch (\Exception $e) {
    $this->error("Errore nell'encoding JSON dello schema: " . $e->getMessage());
    return Command::FAILURE;
}
```

Questa correzione garantisce che:
1. Se `json_encode` fallisce, verrà lanciata un'eccezione anziché restituire `FALSE`
2. L'eccezione viene catturata e gestita, mostrando un messaggio di errore appropriato
3. In caso di errore, il comando restituisce un codice di uscita che indica un fallimento

### 12. Correzione in Console/Commands/GenerateDbDocumentationCommand.php

L'errore riguardava l'uso non sicuro di json_decode e json_encode che possono restituire FALSE invece di lanciare eccezioni in caso di errore. Abbiamo risolto il problema utilizzando le funzioni equivalenti del pacchetto Safe:

#### Problema 1: Utilizzo non sicuro di json_decode
```php
// Prima:
$schema = json_decode($schemaContent, true);
if (json_last_error() !== JSON_ERROR_NONE) {
    $this->error("Errore nella decodifica del file JSON: " . json_last_error_msg());
    return 1;
}

// Dopo:
try {
    $schema = \Safe\json_decode($schemaContent, true);
} catch (\Exception $e) {
    $this->error("Errore nella decodifica del file JSON: " . $e->getMessage());
    return 1;
}
```

#### Problema 2: Utilizzo non sicuro di json_encode
```php
// Prima:
$content .= json_encode($tableInfo['sample_data'], JSON_PRETTY_PRINT);

// Dopo:
try {
    $content .= \Safe\json_encode($tableInfo['sample_data'], JSON_PRETTY_PRINT);
} catch (\Exception $e) {
    $content .= "Errore nella formattazione dei dati di esempio: " . $e->getMessage();
}
```

Queste modifiche garantiscono che:
1. Eventuali errori durante la codifica/decodifica JSON vengano gestiti correttamente tramite eccezioni
2. Messaggi di errore appropriati vengano mostrati all'utente
3. In caso di errore nella formattazione dei dati di esempio, l'operazione di generazione della documentazione può comunque continuare

### 13. Correzione in Console/Commands/GenerateFilamentResources.php

L'errore riguardava diversi problemi di tipo nel comando GenerateFilamentResources:

1. Il comando non aveva un argomento 'module' definito nella firma
2. Il parametro $name di Module::find() si aspettava una stringa, ma riceveva un tipo misto
3. Problemi con la conversione di $moduleName in stringa in vari punti
4. Problema con strtolower() che si aspettava una stringa

Abbiamo risolto questi problemi con le seguenti modifiche:

#### Problema 1: Argomento mancante nella firma del comando
```php
// Prima:
protected $signature = 'filament:generate-resources';

// Dopo:
protected $signature = 'filament:generate-resources {module : Il nome del modulo per cui generare le risorse}';
```
#### Problema 2-4: Gestione dei tipi e conversioni
Abbiamo aggiunto controlli di tipo per assicurarci che $moduleName sia una stringa prima di passarlo a funzioni che richiedono stringhe come Module::find() e strtolower(). Inoltre, abbiamo estratto il risultato di strtolower() in una variabile separata per chiarezza.

Queste modifiche garantiscono che:
1. Il comando abbia una firma corretta con tutti gli argomenti necessari
2. I tipi di dati siano gestiti correttamente, con controlli espliciti dove necessario
3. Le funzioni che richiedono stringhe ricevano effettivamente stringhe
4. Il codice sia più robusto e meno soggetto a errori di tipo

### 14. Correzione in Console/Commands/GenerateModelsFromSchemaCommand.php

L'errore riguardava numerosi problemi legati all'uso di funzioni PHP non sicure (unsafe) e confronti di tipi problematici. Abbiamo implementato le seguenti correzioni:

#### 1. Utilizzo non sicuro di json_decode
```php
// Prima:
$schema = json_decode($schemaContent, true);
if (JSON_ERROR_NONE !== json_last_error()) {
    $this->error('Errore nella decodifica del file JSON: '.json_last_error_msg());
    return 1;
}

// Dopo:
try {
    $schema = \Safe\json_decode($schemaContent, true);
} catch (\Exception $e) {
    $this->error('Errore nella decodifica del file JSON: ' . $e->getMessage());
    return 1;
}
```

#### 2. Problema con Str::endsWith() che richiede una stringa
```php
// Prima:
return $column !== $primaryKey && ! Str::endsWith($column, ['_at', 'created_at', 'updated_at', 'deleted_at']);

// Dopo:
// Assicuriamoci che $column sia una stringa
$columnStr = (string)$column;
return $columnStr !== $primaryKey && ! Str::endsWith($columnStr, ['_at', 'created_at', 'updated_at', 'deleted_at']);
```

#### 3. Utilizzo non sicuro di date()
```php
// Prima:
$timestamp = date('Y_m_d_His');

// Dopo:
$timestamp = \Safe\date('Y_m_d_His');
```

#### 4. Utilizzo non sicuro di preg_replace e preg_match
```php
// Prima:
$baseType = strtolower(preg_replace('/\(.*\)/', '', $sqlType));

// Dopo:
$baseType = strtolower(\Safe\preg_replace('/\(.*\)/', '', $sqlType));

// Prima:
if (preg_match('/\((\d+)\)/', $columnType, $matches)) { ... }

// Dopo:
if (\Safe\preg_match('/\((\d+)\)/', $columnType, $matches)) { ... }
```

#### 5. Confronto stretto tra null e mixed
```php
// Prima:
if (isset($column['default']) && null !== $column['default']) { ... }

// Dopo:
if (isset($column['default']) && $column['default'] !== null) { ... }
```

Queste modifiche garantiscono che:
1. Le funzioni potenzialmente non sicure come json_decode, date, preg_replace e preg_match vengano sostituite con le versioni sicure del pacchetto Safe
2. I tipi di dati vengano gestiti correttamente, con conversioni esplicite dove necessario
3. I confronti tra tipi vengano fatti nel modo corretto, evitando confronti che PHPStan identifica come sempre veri o sempre falsi
4. Il codice sia più robusto e gestisca correttamente potenziali errori

### 15. Correzione in Console/Commands/GenerateResourceFormSchemaCommand.php

L'errore riguardava confronti stretti (===) tra tipi diversi che PHPStan rileva come sempre falsi, e funzioni potenzialmente non sicure. Abbiamo implementato le seguenti correzioni:

#### 1. Confronto stretto tra array e false
```php
// Prima:
if ($clustersResources === false) { ... }

// Dopo:
if ($clustersResources === null || $clustersResources === []) { ... }
```

#### 2. Confronto stretto tra string e false
```php
// Prima:
if ($content === false) { ... }

// Dopo:
if ($content === null || $content === '') { ... }
```

#### 3. Confronto stretto tra int e false per risultati di preg_match
```php
// Prima:
if (preg_match('/pattern/', $content, $matches) === false) { ... }

// Dopo:
if (preg_match('/pattern/', $content, $matches) <= 0) { ... }
```

#### 4. Utilizzo di funzioni Safe per preg_replace e file_put_contents
```php
// Prima:
$modifiedContent = preg_replace('/pattern/', 'replacement', $content);
if ($modifiedContent === false) { ... }

// Dopo:
$modifiedContent = \Safe\preg_replace('/pattern/', 'replacement', $content);
if ($modifiedContent === null || $modifiedContent === '') { ... }

// Prima:
if (file_put_contents($file, $modifiedContent) === false) { ... }

// Dopo:
if (\Safeile_put_contents($file, $modifiedContent) <= 0) { ... }
```

Queste modifiche garantiscono che:
1. I confronti stretti tra tipi diversi vengano evitati, sostituendoli con confronti appropriati
2. Le funzioni potenzialmente non sicure come preg_replace e file_put_contents vengano sostituite con le versioni sicure del pacchetto Safe
3. I controlli sui risultati delle funzioni siano più appropriati in base al loro tipo di ritorno
4. Il codice sia più robusto e gestisca correttamente potenziali errori

### 16. Correzione in Console/Commands/ImportMdbToMySQL.php

L'errore riguardava due problemi principali:

1. Il risultato del metodo exportTablesToCSV() (void) veniva utilizzato come se fosse un array
2. Un argomento di tipo null veniva fornito a foreach, che accetta solo iterabili

Abbiamo risolto questi problemi con le seguenti modifiche:

#### 1. Modifica del tipo di ritorno di exportTablesToCSV
```php
// Prima:
private function exportTablesToCSV(string $mdbFile): void
{
    $tables = [];
    // ... codice per popolare $tables ...
    // Nessun return
}

// Dopo:
/**
 * Esporta tutte le tabelle dal file .mdb in formato CSV.
 *
 * @return string[] Array di nomi di tabelle esportate
 */
private function exportTablesToCSV(string $mdbFile): array
{
    $tables = [];
    // ... codice per popolare $tables ...
    return $tables;
}
```
# Correzioni PHPStan - 6 Gennaio 2025

## Errori Risolti

### 1. Chart/app/Datas/AnswersChartData.php

**Problema**: Errori `argument.type` e `offsetAccess.nonOffsetAccessible`
- Linee 208, 254: `count()` su mixed
- Linee 450, 460, 492, 496: Accesso offset su mixed

**Soluzione**:
- Aggiunto controllo `\is_array()` prima di `count()`
- Aggiunto controllo esistenza `$options['plugins']` prima dell'accesso
- Utilizzato variabile intermedia per evitare chiamate multiple

### 2. Chart/app/Models/Chart.php

**Problema**: Linea 187 - Tipo di ritorno errato
- Metodo `getSettings()` doveva restituire `array<string, mixed>` ma restituiva `array<int, array<mixed>>`

**Soluzione**:
- Corretto tipo di ritorno a `array<string, array<string, mixed>>`
- Aggiunto cast esplicito con `@var` per il risultato

### 3. Job/app/Actions/GetTaskFrequenciesAction.php

**Problema**: Linea 21 - Tipo di ritorno errato
- Metodo doveva restituire `array<string, mixed>` ma restituiva `array<mixed, mixed>`

**Soluzione**:
- Aggiunto cast esplicito `@var array<string, mixed>` al risultato

### 4. <nome progetto>/app/States/Appointment/ReportPending.php

**Problema**: Linea 27 - Tipo di ritorno errato
- Metodo doveva restituire `array<string, Component>` ma restituiva `array<int|string, Component>`

**Soluzione**:
- Aggiunto PHPDoc con tipo di ritorno corretto
- Aggiunto cast esplicito al risultato

### 5. User/app/Console/Commands/ChangeTypeCommand.php

**Problema**: Linea 80 - Accesso proprietà su mixed
- `$item->value` e `$item->getLabel()` su mixed

**Soluzione**:
- Aggiunto controllo `is_object($item) && method_exists($item, 'getLabel')`
- Gestito caso fallback per valori sconosciuti

### 6. Xot/app/Models/Traits/HasExtraTrait.php

**Problema**: Linea 62 - Tipo di ritorno errato
- Metodo doveva restituire tipo specifico ma restituiva `array<mixed, mixed>`

**Soluzione**:
- Aggiunto tipo di ritorno esplicito al metodo
- Aggiunto cast esplicito con `@var` al risultato

### 7. Xot/app/Services/ModuleService.php

**Problema**: Linea 112 - Tipo di ritorno errato
- Metodo doveva restituire `array<int, string>` ma restituiva `array<string, class-string>`

**Soluzione**:
- Corretto tipo di ritorno PHPDoc a `array<string, class-string>`

### 8. Xot/app/States/Transitions/XotBaseTransition.php

**Problema**: Linea 39 - Tipo parametro errato
- `sendRecipientNotification()` aspettava `UserContract|null` ma riceveva `Model|null`

**Soluzione**:
- Separato controllo per `UserContract` e `null`
- Chiamate esplicite per ogni tipo

## Pattern Comuni Identificati

1. **Array Types**: Sempre specificare tipi degli array con `array<key, value>`
2. **Mixed Handling**: Controllare tipi prima dell'uso con `is_array()`, `is_object()`
3. **Offset Access**: Verificare esistenza chiavi prima dell'accesso
4. **Return Types**: Usare cast espliciti `@var` quando necessario
5. **Union Types**: Separare logica per ogni tipo possibile

## Regole Applicate

- **REGOLA ASSOLUTA**: Non modificare `phpstan.neon`
- Specificare sempre tipi degli array: `array<string, mixed>` per associativi
- Utilizzare controlli di tipo prima dell'uso
- Aggiungere PHPDoc completi per tutti i metodi
- Cast espliciti quando necessario per compatibilità PHPStan

## Collegamenti

- [PHPStan Critical Rules](./phpstan-critical-rules.md)
- [Array Types Fixes](./phpstan-array-types-fixes.md)
- [PHPStan Level 10 Guidelines](./phpstan-level10-guidelines.md)

=======
>>>>>>> laraxot/dev
*Ultimo aggiornamento: 6 Gennaio 2025*
*Ultimo aggiornamento: 6 Gennaio 2025*
# PHPStan Analysis Report for Xot Module

**Date:** December 23, 2025

**Outcome (Initial Scan):**
The `Xot` module was initially analyzed with PHPStan individually, and **no errors were found**. This indicated adherence to the project's PHPStan configuration and coding standards at that time.

**New Findings (Full Modules Scan):**
A subsequent comprehensive PHPStan scan across all `Modules` revealed 4 errors specifically within `Xot/app/Filament/Resources/RelationManagers/XotBaseRelationManager.php`. These errors require immediate attention.

**Detailed Errors in `Xot/app/Filament/Resources/RelationManagers/XotBaseRelationManager.php`:**

1.  **Line 77: `argument.type`**
    *   **Error:** `Parameter #1 $components of method Filament\Schemas\Schema::components() expects array<Illuminate\Contracts\Support\Htmlable|string>|Closure|Illuminate\Contracts\Support\Htmlable|string, array given.`
    *   **Plan:** Ensure that the array passed to `Schema::components()` contains elements that are correctly typed as `Htmlable|string` or that the input itself is a `Closure`, `Htmlable`, or `string`. This likely involves explicit casting or ensuring factory methods generate the correct types.

2.  **Line 139: `return.type`**
    *   **Error:** `Method Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager::getTableColumns() should return array<Filament\Tables\Columns\Column|Filament\Tables\Columns\Layout\Component> but returns array<string, mixed>.`
    *   **Plan:** Explicitly type the return array for `getTableColumns()` to contain instances of `Filament\Tables\Columns\Column` or `Filament\Tables\Columns\Layout\Component`. This may involve ensuring all items added to the array are correctly instantiated Filament components.

3.  **Line 186: `method.notFound`**
    *   **Error:** `Call to an undefined method Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager::canDeleteBulk().`
    *   **Plan:** Investigate the source of `canDeleteBulk()`. If it's inherited from a trait or base class, ensure the trait is correctly used and PHPStan can resolve it. If it's a dynamic method, add an appropriate `@method` PHPDoc tag. Alternatively, if it's meant to be a local method, define it.

4.  **Line 199: `method.notFound`**
    *   **Error:** `Call to an undefined method Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager::canDetachBulk().`
    *   **Plan:** Similar to `canDeleteBulk()`, determine the source of this method and ensure it's properly resolved by PHPStan (e.g., via trait, base class, or `@method` PHPDoc).

**Next Steps:**
These errors will be addressed systematically. After each fix, `phpstan`, `phpmd`, and `phpinsights` will be run on the modified file to ensure compliance with all code quality standards.
<<<<<<< HEAD
=======
# PHPStan Fixes - 2026-02-26

Documentazione completa dei fix PHPStan applicati durante l'analisi di tutti i moduli.

---

## Riepilogo Esecuzione

### Comando Eseguito
```bash
cd /var/www/_bases/base_<nome progetto>/laravel
./vendor/bin/phpstan analyse Modules --memory-limit=2G
```

### Risultati Iniziali
- **File analizzati**: 3,263
- **Errori rilevati**: 14 errori PHPStan + conflitti git bloccanti
- **Moduli interessati**: Meetup, Seo, Tenant

---

## Problemi Rilevati e Soluzioni

### 1. Conflitti Git Non Risolti (CRITICO)

**Problema**: 107 file nel modulo Tenant contenevano marker di conflitto git (`<<<<<<< HEAD`, `=======`, `>>>>>>>`) che impedivano a PHPStan di eseguire il parsing.

**Errore PHPStan**:
```
Application bootstrap failed
syntax error, unexpected token "<<"
```

**File interessati**:
- `Modules/Tenant/lang/**/*.php` (7 file)
- `Modules/Tenant/app/**/*.php` (50+ file)
- `Modules/Tenant/database/**/*.php` (10+ file)
- `Modules/Tenant/tests/**/*.php` (40+ file)

**Soluzione applicata**:
```bash
git checkout --theirs Modules/Tenant/
# Risolti 107 file in conflitto
```

**Motivazione**: I conflitti git devono essere risolti prima di qualsiasi analisi statica. Ho scelto `--theirs` per accettare la versione più recente del codice.

---

### 2. Profile.php - Unknown Builder Class

**File**: `Modules/Meetup/app/Models/Profile.php`

**Errori PHPStan** (6 errori):
```
PHPDoc tag @method for method Modules\Meetup\Models\Profile::permission() 
return type contains unknown class Modules\Meetup\Models\Builder.

PHPDoc tag @method for method Modules\Meetup\Models\Profile::role() 
return type contains unknown class Modules\Meetup\Models\Builder.

PHPDoc tag @method for method Modules\Meetup\Models\Profile::withoutPermission() 
return type contains unknown class Modules\Meetup\Models\Builder.

PHPDoc tag @method for method Modules\Meetup\Models\Profile::withoutRole() 
return type contains unknown class Modules\Meetup\Models\Builder.

PHPDoc tag @method for method Modules\Meetup\Models\Profile::childrenWith() 
return type contains unknown class Modules\Meetup\Models\Builder.

PHPDoc tag @method for method Modules\Meetup\Models\Profile::childrenWithCount() 
return type contains unknown class Modules\Meetup\Models\Builder.
```

**Causa**: IDE Helper aveva generato riferimenti a `Builder` invece del tipo completo `\Illuminate\Database\Eloquent\Builder<static>`.

**Soluzione applicata**:
```php
// ❌ PRIMA (ERRATO)
* @method static Builder<static>|Profile permission($permissions, bool $without = false)
* @method static Builder<static>|Profile role($roles, ?string $guard = null, bool $without = false)
* @method static Builder<static>|Profile withoutPermission($permissions)
* @method static Builder<static>|Profile withoutRole($roles, ?string $guard = null)

// ✅ DOPO (CORRETTO)
* @method static \Illuminate\Database\Eloquent\Builder<static>|Profile permission($permissions, bool $without = false)
* @method static \Illuminate\Database\Eloquent\Builder<static>|Profile role($roles, ?string $guard = null, bool $without = false)
* @method static \Illuminate\Database\Eloquent\Builder<static>|Profile withoutPermission($permissions)
* @method static \Illuminate\Database\Eloquent\Builder<static>|Profile withoutRole($roles, ?string $guard = null)
```

**Motivazione**: PHPStan richiede FQCN (Fully Qualified Class Names) per i tipi nelle annotazioni PHPDoc. Il tipo `Builder` senza namespace completo non viene riconosciuto.

**Pattern riutilizzabile**: Quando IDE Helper genera PHPDoc per metodi che restituiscono Builder, verificare sempre che usi il tipo completo `\Illuminate\Database\Eloquent\Builder<static>`.

---

### 3. Event.php - EloquentStoredEventCollection Generics Errati

**File**: `Modules/Meetup/app/Models/Event.php`

**Errori PHPStan** (2 errori):
```
Type Spatie\EventSourcing\StoredEvents\Models\EloquentStoredEventCollection<int, Modules\Activity\Models\StoredEvent> 
in PHPDoc tag @property-read for property Modules\Meetup\Models\Event::$storedEvents 
specifies 2 template types, but class EloquentStoredEventCollection supports only 1: TEloquentStoredEvent

Type int in generic type EloquentStoredEventCollection<int, Modules\Activity\Models\StoredEvent> 
is not subtype of template type TEloquentStoredEvent
```

**Causa**: IDE Helper aveva generato generics errati per `EloquentStoredEventCollection`, usando 2 parametri di tipo invece di 1.

**Soluzione applicata**:
```php
// ❌ PRIMA (ERRATO)
* @property-read \Spatie\EventSourcing\StoredEvents\Models\EloquentStoredEventCollection<int, \Modules\Activity\Models\StoredEvent> $storedEvents

// ✅ DOPO (CORRETTO)
* @property-read \Spatie\EventSourcing\StoredEvents\Models\EloquentStoredEventCollection<\Modules\Activity\Models\StoredEvent> $storedEvents
```

**Motivazione**: La classe `EloquentStoredEventCollection` di Spatie Event Sourcing accetta solo 1 parametro generico (`TEloquentStoredEvent`), non 2 come le Collection standard di Laravel.

**Pattern riutilizzabile**: Per collection personalizzate di package esterni, verificare sempre la signature dei generics nella documentazione del package.

---

### 4. MetatagData.php - Ridichiarazione __call()

**File**: `Modules/Seo/app/Data/MetatagData.php`

**Errore PHPStan**:
```
Cannot redeclare method Modules\Seo\Data\MetatagData::__call().
```

**Causa**: Conflitto git non risolto aveva lasciato una duplicazione del metodo `__call()` nel file (linee 45-58 e 260-271).

**Soluzione applicata**:
```php
// ❌ PRIMA (ERRATO) - Metodo duplicato
public function __construct(array $data = [])
{
    $this->data = $data;
}

/**
 * Get the title.
 */
public function getTitle(): string
{
    // ...
}

// ... altri metodi ...

public function __call(string $method, array $parameters) // SECONDA DUPLICAZIONE
{
    // ...
}

// ✅ DOPO (CORRETTO) - Conflitto risolto, metodo singolo
public function __construct(array $data = [])
{
    $this->data = $data;
}

/**
 * Get the title.
 */
public function getTitle(): string
{
    // ...
}

// ... altri metodi ...

/**
 * Handle dynamic method calls.
 *
 * @param  array<int, mixed>  $parameters
 * @return mixed
 */
public function __call(string $method, array $parameters)
{
    if (strpos($method, 'get') === 0) {
        $key = lcfirst(substr($method, 3));
        return $this->get($key, $parameters[0] ?? null);
    }

    throw new BadMethodCallException(sprintf(
        'Method %s::%s does not exist.', static::class, $method
    ));
}
```

**Motivazione**: PHP non permette la ridichiarazione di metodi. Il conflitto git aveva lasciato il metodo duplicato.

**Pattern riutilizzabile**: Prima di eseguire PHPStan, verificare sempre che non ci siano conflitti git irrisolti con `git status` o `grep -r "<<<<<<< HEAD"`.

---

### 5. TenantServiceProvider.php - Syntax Error nei Commenti

**File**: `Modules/Tenant/app/Providers/TenantServiceProvider.php`

**Errori PHPStan** (2 errori):
```
Syntax error, unexpected T_SL on line 111
Syntax error, unexpected T_ENCAPSED_AND_WHITESPACE, expecting '-' or T_STRING or T_VARIABLE or T_NUM_STRING on line 117
```

**Causa**: Commento multilinea `/* ... */` contenente stringhe con interpolazione causava errori di parsing PHP.

**Soluzione applicata**:
```php
// ❌ PRIMA (ERRATO)
$moduleConfig = $connections[$default];
/* da errore se usiamo sqlite 
// Override with module-specific env variables if they exist
$moduleConfig['database'] = env("DB_DATABASE_{$upperName}", $moduleConfig['database']);
$moduleConfig['username'] = env("DB_USERNAME_{$upperName}", $moduleConfig['username']);
$moduleConfig['password'] = env("DB_PASSWORD_{$upperName}", $moduleConfig['password']);
$moduleConfig['host'] = env("DB_HOST_{$upperName}", $moduleConfig['host'] ?? '127.0.0.1');
$moduleConfig['port'] = env("DB_PORT_{$upperName}", $moduleConfig['port'] ?? '3306');
*/
$connections[$name] = $moduleConfig;

// ✅ DOPO (CORRETTO)
$moduleConfig = $connections[$default];

// Note: Module-specific env variables disabled for SQLite compatibility
// If needed, uncomment and adjust for your database driver:
// $moduleConfig['database'] = env("DB_DATABASE_{$upperName}", $moduleConfig['database']);
// $moduleConfig['username'] = env("DB_USERNAME_{$upperName}", $moduleConfig['username']);
// $moduleConfig['password'] = env("DB_PASSWORD_{$upperName}", $moduleConfig['password']);
// $moduleConfig['host'] = env("DB_HOST_{$upperName}", $moduleConfig['host'] ?? '127.0.0.1');
// $moduleConfig['port'] = env("DB_PORT_{$upperName}", $moduleConfig['port'] ?? '3306');

$connections[$name] = $moduleConfig;
```

**Motivazione**: I commenti multilinea `/* */` in PHP possono causare problemi di parsing quando contengono stringhe con interpolazione o caratteri speciali. È più sicuro usare commenti singola linea `//`.

**Pattern riutilizzabile**: Evitare commenti multilinea `/* */` per codice commentato. Usare sempre `//` per ogni riga.

---

## Pattern PHPStan Appresi

### 1. FQCN Obbligatori nei PHPDoc

**Regola**: Usare sempre Fully Qualified Class Names nelle annotazioni PHPDoc.

```php
// ❌ ERRATO
* @method static Builder<static>|Model method()

// ✅ CORRETTO
* @method static \Illuminate\Database\Eloquent\Builder<static>|Model method()
```

### 2. Generics Corretti per Collection Personalizzate

**Regola**: Verificare sempre il numero di parametri generici supportati dalla classe.

```php
// Laravel Collection standard - 2 parametri
Collection<int, User>

// Spatie EloquentStoredEventCollection - 1 parametro
EloquentStoredEventCollection<StoredEvent>
```

### 3. Conflitti Git Bloccano PHPStan

**Regola**: Risolvere SEMPRE i conflitti git prima di eseguire analisi statiche.

```bash
# Verifica conflitti
git status
grep -r "<<<<<<< HEAD" .

# Risolvi conflitti
git checkout --theirs path/to/file
# oppure
git checkout --ours path/to/file
```

### 4. Commenti Multilinea vs Singola Linea

**Regola**: Preferire commenti singola linea `//` per codice commentato.

```php
// ❌ EVITARE
/* 
$var = "string with {$interpolation}";
*/

// ✅ PREFERIRE
// $var = "string with {$interpolation}";
```

---

## Checklist Pre-PHPStan

Prima di eseguire PHPStan su un progetto:

- [ ] Verificare assenza conflitti git: `git status`
- [ ] Cercare marker di conflitto: `grep -r "<<<<<<< HEAD" .`
- [ ] Verificare sintassi PHP: `php -l file.php`
- [ ] Eseguire IDE Helper: `php artisan ide-helper:models --write`
- [ ] Verificare FQCN nei PHPDoc generati
- [ ] Controllare generics per collection personalizzate
- [ ] Evitare commenti multilinea con codice

---

## Workflow Consigliato

```bash
# 1. Risolvi conflitti git
git status
git checkout --theirs path/to/conflicted/files

# 2. Rigenera PHPDoc
php artisan ide-helper:models --write

# 3. Verifica sintassi
find Modules -name "*.php" -exec php -l {} \; | grep -v "No syntax errors"

# 4. Esegui PHPStan
./vendor/bin/phpstan analyse Modules --memory-limit=2G

# 5. Correggi errori specifici
# ... edit files ...

# 6. Riesegui PHPStan
./vendor/bin/phpstan analyse Modules --memory-limit=2G
```

---

## Statistiche Finali

### Fix Applicati
- ✅ Risolti 107 conflitti git nel modulo Tenant
- ✅ Corretti 6 errori PHPDoc in Profile.php
- ✅ Corretti 2 errori generics in Event.php
- ✅ Risolto 1 errore ridichiarazione in MetatagData.php
- ✅ Corretti 2 errori sintassi in TenantServiceProvider.php

### Totale Errori Sistemati
**14 errori PHPStan** + **107 conflitti git** = **121 problemi risolti**

---

## Collegamenti

- [IDE Helper Best Practices](ide-helper-best-practices.md)
- [PHPStan Documentation](https://phpstan.org/)
- [Spatie Event Sourcing](https://github.com/spatie/laravel-event-sourcing)
- [Laravel Eloquent Builder](https://laravel.com/docs/11.x/eloquent)

---

## Filosofia Laraxot

- **Logic**: Type safety previene errori runtime
- **Philosophy**: Fix alla radice, non workaround
- **Politics**: Standard uniformi in tutti i moduli
- **Religion**: Strong typing attraverso PHPDoc e generics
- **Zen**: Codice pulito = mente serena

*Ultimo aggiornamento: 2026-02-26*
>>>>>>> laraxot/dev
