# GenerateDbDocumentationCommand

## Descrizione
Questo comando genera documentazione dettagliata dello schema del database in formato Markdown.

## Utilizzo
```bash
php artisan xot:generate-db-documentation {schema_file} {output_dir?}
```

### Parametri
- `schema_file`: Percorso del file schema JSON (obbligatorio)
- `output_dir`: Directory di output per i file markdown (opzionale, default: docs/database)

## Funzionalità
1. Genera documentazione completa del database
2. Crea file markdown per ogni tabella
3. Genera diagrammi ER usando Mermaid
4. Documenta relazioni tra tabelle
5. Supporta indici e chiavi esterne

## Output
- `README.md`: Indice principale con panoramica del database
- File separati per ogni tabella con:
  - Struttura delle colonne
  - Chiavi primarie
  - Indici
  - Relazioni
  - Statistiche

## Best Practices
1. Utilizzo di strict types
2. Gestione errori robusta
3. Documentazione PHPDoc completa
4. Supporto per PHPStan livello 9
5. Conforme alle convenzioni Laraxot/<nome progetto>

## Collegamenti
- [Database Guidelines](../DATABASE-GUIDELINES.md)
- [Documentation Guidelines](../DOCUMENTATION-GUIDELINES.md)
- [PHPStan Level 9 Guide](../PHPSTAN-LEVEL9-GUIDE.md)
<<<<<<< .merge_file_xSg5Au
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
=======
- [Database Guidelines](../database-guidelines.md)
- [Documentation Guidelines](../documentation-guidelines.md)
- [PHPStan Level 9 Guide](../phpstan-level9-guide.md)
>>>>>>> laraxot/dev
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> da9ae01a0 (.)
=======
- [Database Guidelines](../database-guidelines.md)
- [Documentation Guidelines](../documentation-guidelines.md)
- [PHPStan Level 9 Guide](../phpstan-level9-guide.md)
<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_nv0C29
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
