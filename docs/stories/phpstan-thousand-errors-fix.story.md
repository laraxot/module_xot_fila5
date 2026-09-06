# BMAD Story — PHPStan 1000+ Errors Systematic Fix

## Understand
- **Problema**: PHPStan ha ~1000+ errori dopo l'aggiornamento a larastan v3.11.0
- **Causa root**: Codice con tipi mancanti o imprecisi in vari moduli
- **Regola**: `phpstan.neon` non si modifica; `mixed` sostituito con tipi concreti; `User` -> `UserContract` / `XotData`

## Plan
1. Analizzare errori per modulo
2. Categorizzare per tipo (method.nonObject, staticMethod.notFound, etc.)
3. Sistematizzare fix - agire sulle cause comuni
4. Verificare con phpstan + phpmd + phpinsights + pest
5. Git sync per ogni modulo

## Error Types Identified
- `method.nonObject`: chiamate a metodi su mixed
- `staticMethod.notFound`: metodi statici non definiti (factory)
- `Call to an undefined static method`: factory mancanti

## Implement
### Step 1: Analisi per modulo
```bash
./vendor/bin/phpstan analyse Modules --error-format=table 2>&1 | grep -E "Line|error" | head -100
```

### Step 2: Errori comuni - factory mancanti
Molti errori sono in seeder con `::factory()` non definito. Soluzione:
- Aggiungere `HasFactory` trait ai modelli
- O creare factory mancanti

### Step 3: Errori mixed - cast/implicit conversion
Usare `Assert::*` per narrowing o cast action

## Verify
- [ ] `./vendor/bin/phpstan analyse Modules` < 100 errori
- [ ] `./tools/phpmd.sh Modules/*/app`
- [ ] `./tools/phpinsights.sh`
- [ ] `./vendor/bin/pest`

## Document
- Aggiornare docs con errori comuni e soluzioni

## Status
- [ ] Da iniziare
