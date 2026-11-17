---
title: "RelationX Trait"
type: note
status: draft
updated: 2026-11-17
tags: [docs, xot, traits]
qmd: "relationx trait xot"
---
# RelationX Trait

## Scopo Business
Fornisce metodi estesi per gestire relazioni Eloquent complesse, supportando:
- Relazioni many-to-many cross-database
- Relazioni polimorfiche avanzate
- Auto-detection di pivot tables e campi
- Gestione automatica di timestamps e fillable fields

## Metodi Principali

### belongsToManyX()
Versione estesa di `belongsToMany` che:
- Auto-rileva la pivot table tramite `guessPivot()`
- Supporta relazioni cross-database
- Auto-configura `withPivot()` con i campi fillable
- Aggiunge automaticamente timestamps

**Business Logic:**
- Rileva automaticamente il modello pivot appropriato
- Gestisce connessioni database diverse tra entità correlate
- Configura automaticamente tutti i campi pivot necessari

### morphToManyX()
Versione estesa di `morphToMany` con le stesse funzionalità di `belongsToManyX` per relazioni polimorfiche.

## Vantaggi per la Business Logic
1. **Auto-configurazione**: Riduce errori di configurazione manuale
2. **Cross-database support**: Supporta architetture multi-database
3. **Type safety**: Utilizza strict types e validazione con Assert
4. **Flessibilità**: Supporta sia relazioni standard che polimorfiche

## Utilizzo nei Moduli
Questo trait è utilizzato nei modelli base di tutti i moduli per standardizzare le relazioni complesse e garantire coerenza nell'accesso ai dati.
# RelationX Trait

## Scopo Business
Fornisce metodi estesi per gestire relazioni Eloquent complesse, supportando:
- Relazioni many-to-many cross-database
- Relazioni polimorfiche avanzate
- Auto-detection di pivot tables e campi
- Gestione automatica di timestamps e fillable fields

## Metodi Principali

### belongsToManyX()
Versione estesa di `belongsToMany` che:
- Auto-rileva la pivot table tramite `guessPivot()`
- Supporta relazioni cross-database
- Auto-configura `withPivot()` con i campi fillable
- Aggiunge automaticamente timestamps

**Business Logic:**
- Rileva automaticamente il modello pivot appropriato
- Gestisce connessioni database diverse tra entità correlate
- Configura automaticamente tutti i campi pivot necessari

### morphToManyX()
Versione estesa di `morphToMany` con le stesse funzionalità di `belongsToManyX` per relazioni polimorfiche.

## Vantaggi per la Business Logic
1. **Auto-configurazione**: Riduce errori di configurazione manuale
2. **Cross-database support**: Supporta architetture multi-database
3. **Type safety**: Utilizza strict types e validazione con Assert
4. **Flessibilità**: Supporta sia relazioni standard che polimorfiche

## Utilizzo nei Moduli
Questo trait è utilizzato nei modelli base di tutti i moduli per standardizzare le relazioni complesse e garantire coerenza nell'accesso ai dati.


## Lezione sessione 2026-11-17 — import duplicati

`use Illuminate\Database\Eloquent\Relations\HasMany` era ripetuto due volte nel trait.
In PHP e' un **Fatal** al class-load (`Cannot use ... because the name is already in use`),
non un warning PHPStan. Cascata: ogni model che usa `RelationX`/`XotBaseModel` non carica,
quindi artisan/`package:discover`/PHPStan escono 255.

**Fix:** un solo `use` per simbolo. Prima di PHPStan, eseguire
`bashscripts/quality-gates/class-load-fatals/find-class-load-fatals.sh`.
