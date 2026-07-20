# Regole Struttura Directory

## Struttura Base del Progetto

La struttura corretta del progetto il progetto segue questo schema:

```

├── laravel/               # Directory principale per il codice Laravel
│   ├── Modules/          # Moduli dell'applicazione
│   │   ├── Xot/
│   │   ├── Patient/
│   │   └── ...
│   └── Themes/           # Temi dell'applicazione
│       └── One/          # Tema principale
│           ├── resources/
│           │   └── views/
│           └── ...
├── docs/                 # Documentazione generale
└── ...
```

## Regole Fondamentali

1. **Directory Laravel**
   - Tutto il codice Laravel DEVE essere nella directory `laravel/`
   - I percorsi relativi partono da questa directory
   - Non utilizzare mai percorsi che saltano questa directory

2. **Moduli**
   - Tutti i moduli DEVONO essere in `laravel/Modules/`
   - Ogni modulo ha la propria struttura interna
   - I namespace riflettono questa struttura

3. **Temi**
   - Tutti i temi DEVONO essere in `laravel/Themes/`
   - Ogni tema ha la propria struttura di risorse
   - Le views sono in `resources/views/`

## Errori Comuni

### 1. Percorso Errato dei Temi
❌ Errore riscontrato:
```
Themes/One/resources/views/pages/auth/register.blade.php
```

✅ Percorso corretto:
```
Themes/One/resources/views/pages/auth/register.blade.php
```

**Causa dell'errore**: Omissione della directory `laravel/` nel percorso.

**Impatto**:
- File non trovati
- Namespace non corretti
- Errori di caricamento delle view
- Problemi con l'autoloader

**Prevenzione**:
1. Verificare sempre che il percorso inizi con `laravel/`
2. Utilizzare gli helper di Laravel per i percorsi
3. Seguire la struttura standard dei namespace
4. Utilizzare i tool di validazione percorsi

## Best Practices

1. **Uso dei Helper**
```php
resource_path('views/pages/auth/register.blade.php');
```

2. **Namespace Corretti**
```php
namespace Themes\One\View\Components;
```

3. **Validazione Percorsi**
- Utilizzare PHPStan per verificare i percorsi
- Implementare test per il caricamento delle view
- Verificare la struttura delle directory con tool automatici

## Checklist Verifica

Prima di ogni commit, verificare:
- [ ] I percorsi iniziano con `laravel/`
- [ ] La struttura delle directory è corretta
- [ ] I namespace corrispondono ai percorsi
- [ ] Le view sono nel percorso corretto
- [ ] I test validano i percorsi

## Note Importanti

1. La directory `laravel/` è OBBLIGATORIA per tutti i file del framework
2. Non creare mai file fuori dalla struttura standard
3. Mantenere la coerenza tra percorsi e namespace
4. Documentare eventuali eccezioni alla regola

## Collegamenti

- [Struttura Moduli](module-structure.md)
- [Convenzioni Namespace](namespace-rules.md)
- [Best Practices](best-practices.md)
- [PHPStan Configuration](phpstan/configuration.md)


---
## From DIRECTORY-STRUCTURE-RULES.md

# Directory Structure Rules - No Duplications (DRY)

## Regola Fondamentale

**NESSUNA DUPLICAZIONE DI CARTELLE** - Principio DRY (Don't Repeat Yourself)

## Caso Specifico: lang/lang/

### ❌ ERRATO (Duplicazione)
```
Modules/Xot/
└── lang/
    └── lang/          # ❌ DUPLICAZIONE!
        ├── it/
        ├── en/
        └── ...
```

### ✅ CORRETTO (DRY)
```
Modules/Xot/
└── lang/
    ├── it/
    ├── en/
    └── ...
```

## Rationale

1. **DRY**: Non ripetere strutture di cartelle
2. **KISS**: Struttura semplice e diretta
3. **Manutenibilità**: Una sola fonte di verità
4. **Laravel Convention**: Le traduzioni stanno in `lang/`, non in `lang/lang/`

## Pattern da Evitare

```
❌ /path/to/dir/dir/        # Duplicazione
❌ /modules/module/module/  # Duplicazione
❌ /config/config/          # Duplicazione
```

## Verifica

Cercare duplicazioni con:

```bash
# Trova tutte le cartelle duplicate
find laravel/Modules -type d -name "*/*" | awk -F/ '{print $NF}' | sort | uniq -d

# Trova specificamente lang/lang
find laravel/Modules -path "*/lang/lang" -type d
```

## Fix Applicato

- ✅ Rimosso `laravel/Modules/Xot/lang/lang/`
- ✅ File rimangono in `laravel/Modules/Xot/lang/`
- ✅ Nessuna perdita di dati
- ✅ Verificato con PHPStan

## Related

- GitHub Issue: #11
- GitHub Discussion: #12
- Skill: `.opencode/skills/directory-structure/SKILL.md`
- Docs: `Modules/Xot/docs/DRY_PRINCIPLES.md`

## Reference Projects

- `/var/www/_bases/base_quaeris_fila5_mono/laravel/Modules/Xot/lang/`
- `/var/www/_bases/base_laravelpizza/laravel/Modules/Xot/lang/`

Entrambi hanno struttura corretta senza duplicazioni.

