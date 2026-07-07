# PHPStan Fixes - 2026-02-26

Documentazione completa dei fix PHPStan applicati durante l'analisi di tutti i moduli.

### 1. Chart/app/Datas/AnswersChartData.php

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

### 4. SaluteOra/app/States/Appointment/ReportPending.php

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

*Ultimo aggiornamento: 6 Gennaio 2025*
