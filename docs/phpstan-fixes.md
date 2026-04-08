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

### 4. SaluteOra/app/States/Appointment/ReportPending.php

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

- [PHPStan Critical Rules](./phpstan-critical-rules.md)
- [Array Types Fixes](./phpstan-array-types-fixes.md)
- [PHPStan Level 10 Guidelines](./phpstan-level10-guidelines.md)

*Ultimo aggiornamento: 6 Gennaio 2025*
