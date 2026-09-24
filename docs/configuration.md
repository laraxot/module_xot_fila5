# Configurazione del Sistema

## Struttura delle Configurazioni

### Configurazioni Globali
- Le configurazioni globali si trovano in `laravel/config/`
- Sono applicate a tutti i domini
- Possono essere sovrascritte da configurazioni specifiche per dominio

### Configurazioni per Dominio
- Le configurazioni specifiche per dominio si trovano in `laravel/config/<dominio_inverso>/`
- Il formato del dominio è invertito (es: `local/example` per `http://example.local`)
- Sovrascrivono le configurazioni globali quando necessario

## Gestione delle Risorse

### Percorsi delle Risorse
- Le risorse sono organizzate per modulo
- Utilizzare il formato `module::path` per riferirsi alle risorse
- Il percorso si traduce in `laravel/Modules/Module/resources/path`

### Esempi di Configurazione
```php
// Configurazione globale (laravel/config/metatag.php)
return [
    'default_logo' => 'xot::images/logo.svg',
];

// Configurazione specifica per dominio (laravel/config/local/example/metatag.php)
return [
    'logo_header' => 'patient::images/logo.svg',
    'logo_header_dark' => 'patient::images/logo.svg',
];
```

## Best Practices

### Organizzazione
1. **Configurazioni Globali**:
   - Mantenere le configurazioni di base in `laravel/config/`
   - Documentare tutte le opzioni disponibili
   - Fornire valori predefiniti appropriati

2. **Configurazioni per Dominio**:
   - Creare una cartella per ogni dominio
   - Mantenere solo le configurazioni che differiscono da quelle globali
   - Documentare le differenze specifiche per dominio

3. **Risorse**:
   - Organizzare le risorse per modulo
   - Utilizzare nomi descrittivi per i file
   - Mantenere una struttura coerente

### Manutenzione
1. **Versionamento**:
   - Tenere traccia delle modifiche alle configurazioni
   - Documentare le modifiche significative
   - Mantenere la compatibilità con le versioni precedenti

2. **Documentazione**:
   - Documentare tutte le opzioni di configurazione
   - Fornire esempi di utilizzo
   - Mantenere aggiornata la documentazione

## Collegamenti
<<<<<<< .merge_file_bH3mw4
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
- [Gestione Domini](domain_configuration.md)
- [Struttura del Progetto](project_structure.md)
- [Documentazione Principale](../readme.md)
## Collegamenti tra versioni di configuration.md
* [configuration.md](docs/configuration.md)
* [configuration.md](../../../xot/docs/configuration.md)
* [configuration.md](../../../cms/docs/configuration.md)
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======
>>>>>>> 8d801bbe (Check & fix styling)
=======
>>>>>>> .merge_file_uhoWKw
- [Gestione Domini](DOMAIN_CONFIGURATION.md)
- [Struttura del Progetto](PROJECT_STRUCTURE.md)
- [Documentazione Principale](../README.md)
## Collegamenti tra versioni di configuration.md
* [configuration.md](docs/configuration.md)
* [configuration.md](../../../Xot/docs/configuration.md)
<<<<<<< .merge_file_bH3mw4
<<<<<<< HEAD
<<<<<<< HEAD
* [configuration.md](../../../Cms/docs/configuration.md)
=======
<<<<<<< HEAD
* [configuration.md](../../../Cms/docs/configuration.md)
=======
* [configuration.md](../../../Cms/docs/configuration.md)
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======
* [configuration.md](../../../Cms/docs/configuration.md)
>>>>>>> 8d801bbe (Check & fix styling)
=======
* [configuration.md](../../../Cms/docs/configuration.md)
>>>>>>> .merge_file_uhoWKw
