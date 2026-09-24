<<<<<<< HEAD
# Configurazione MCP per base_ptvx_fila4_mono

=======
>>>>>>> laraxot/dev
**Data Creazione**: 2026-01-12  
**Ultimo Aggiornamento**: 2026-01-12  
**Status**: ✅ Configurazione Completa e Ottimizzata

---

## 🎯 Scopo del Documento

Questo documento descrive la configurazione MCP ottimizzata per il progetto **base_ptvx_fila4_mono**, risultato di analisi approfondita delle necessità del progetto seguendo la metodologia Super Mucca.

---

## 📊 Server MCP Configurati

### Configurazione Completa

File: `laravel/.mcp.json`
<<<<<<< HEAD
=======
# Configurazione MCP per ptvx

**Stato**: configurazione verificata e riallineata al workspace corrente.

## Scopo

Questo documento descrive la configurazione MCP effettivamente usata nel repository `ptvx`, con focus su `laravel-boost` e sui file di configurazione che devono restare coerenti tra repository e IDE.

## File di configurazione rilevanti

### `laravel/.mcp.json`

E' il file condiviso dal progetto Laravel e contiene la configurazione applicativa principale. Per `laravel-boost` la configurazione corretta e portabile e':
>>>>>>> laraxot/dev

```json
{
    "mcpServers": {
        "laravel-boost": {
<<<<<<< HEAD
            "command": "php",
            "args": [
                "./artisan",
                "boost:mcp"
            ]
        },
        "filesystem": {
            "command": "npx",
            "args": [
                "-y",
                "@modelcontextprotocol/server-filesystem",
                "/var/www/_bases/base_ptvx_fila4_mono/laravel",
                "/var/www/_bases/base_ptvx_fila4_mono/docs",
                "/var/www/_bases/base_ptvx_fila4_mono/bashscripts"
            ]
        },
        "memory": {
            "command": "npx",
            "args": [
                "-y",
                "@modelcontextprotocol/server-memory"
            ]
        },
        "fetch": {
            "command": "npx",
            "args": [
                "-y",
                "@modelcontextprotocol/server-fetch"
            ]
        },
        "sequential-thinking": {
            "command": "npx",
            "args": [
                "-y",
                "@modelcontextprotocol/server-sequential-thinking"
            ]
        },
        "puppeteer": {
            "command": "npx",
            "args": [
                "-y",
                "@hisma/server-puppeteer"
            ]
        },
        "mysql": {
            "command": "npx",
            "args": [
                "-y",
                "@modelcontextprotocol/server-mysql"
            ],
            "env": {
                "MYSQL_HOST": "${DB_HOST}",
                "MYSQL_PORT": "${DB_PORT}",
                "MYSQL_USER": "${DB_USERNAME}",
                "MYSQL_PASSWORD": "${DB_PASSWORD}",
                "MYSQL_DATABASE": "${DB_DATABASE}"
            }
        },
        "git": {
            "command": "npx",
            "args": [
                "-y",
                "@modelcontextprotocol/server-git",
                "--repository",
                "/var/www/_bases/base_ptvx_fila4_mono"
            ]
=======
            "command": "/usr/bin/php8.3",
            "args": [
                "${PWD}/laravel/artisan",
                "boost:mcp"
            ]
>>>>>>> laraxot/dev
        }
    }
}
```

<<<<<<< HEAD
---

## 📋 Descrizione Server

### 1. laravel-boost
- **Scopo**: Laravel Boost MCP server per documentazione e analisi codice Laravel
- **Comando**: `php ./artisan boost:mcp`
- **Uso**: Accesso a documentazione Laravel, analisi codice, pattern recognition

### 2. filesystem
- **Scopo**: Gestione file e directory del progetto
- **Path configurati**:
  - `/var/www/_bases/base_ptvx_fila4_mono/laravel` - Codice Laravel
  - `/var/www/_bases/base_ptvx_fila4_mono/docs` - Documentazione
  - `/var/www/_bases/base_ptvx_fila4_mono/bashscripts` - Script e tool
- **Uso**: Fallback quando file sono bloccati o non accessibili con tool standard

### 3. memory
- **Scopo**: Memoria temporanea per contesto tra richieste
- **Uso**: Mantenere stato e contesto durante sessioni di lavoro

### 4. fetch
- **Scopo**: Chiamate HTTP e API
- **Uso**: Accesso a API esterne, documentazione online, risorse web

### 5. sequential-thinking
- **Scopo**: Analisi codice e ottimizzazione
- **Uso**: Problem-solving strutturato, analisi complessità, ottimizzazione

### 6. puppeteer
- **Scopo**: Test UI e automazione browser
- **Uso**: Test end-to-end, automazione browser, screenshot

### 7. mysql
- **Scopo**: Interazione con database MySQL
- **Variabili d'ambiente**: Usa variabili d'ambiente per sicurezza
- **Uso**: Query database, analisi schema, migrazioni

### 8. git
- **Scopo**: Operazioni Git sul repository
- **Path**: `/var/www/_bases/base_ptvx_fila4_mono`
- **Uso**: Operazioni Git, analisi commit, gestione branch

---

## 🔧 Utilizzo MCP nei Prompt

### Pattern di Utilizzo

Nei prompt è stato integrato il riferimento a MCP per aggirare ostacoli:

```
Se alcuni file risultano bloccati o non accessibili con tool standard:
- usa filesystem MCP (read/write/edit) come fallback
- se serve un FS alternativo: usa filesystem-quaeris MCP
- per esplorazione rapida: usa code_search / grep_search
- per analisi e ottimizzazione: usa sequential-thinking MCP
- per interazione database: usa mysql o postgres MCP
- per test UI e automazione: usa puppeteer MCP
```

---

## 📚 Collegamenti Correlati

- [MCP Servers Documentation](./mcp-servers.md)
- [MCP Editors Configuration](./mcp-editors-configuration.md)
- [Prompt Improvements](./prompts-improvements.md)

---

**Filosofia**: MCP come strumento per superare limitazioni e migliorare produttività nello sviluppo Laraxot.
=======
### `/.mcp.json`

Il file root del repository puo' esporre gli MCP condivisi anche fuori dal solo contesto Laravel. Per questo progetto deve includere almeno `laravel-boost` insieme agli altri server gia' usati nel repository.

### `/.cursor/mcp.json`

La configurazione Cursor del progetto deve puntare allo stesso workspace corrente e non a basi storiche o ad altri repository. La voce `laravel-boost` deve quindi usare la stessa strategia portabile con `${PWD}`.

## Verifica operativa

La verifica minima da eseguire nel progetto e':

```bash
cd laravel
php artisan boost:mcp --help
composer show laravel/boost
composer show laravel/mcp
```

Output atteso:

- il comando `boost:mcp` deve essere disponibile senza errori di bootstrap;
- `laravel/boost` deve risultare installato;
- `laravel/mcp` deve risultare installato.

## Stato attuale verificato

Nel workspace `ptvx` risultano verificati:

- `laravel/.mcp.json` contiene `laravel-boost`;
- `laravel/boost` e `laravel/mcp` sono installati via Composer;
- `php artisan boost:mcp --help` risponde correttamente;
- la configurazione Cursor di progetto e' stata riallineata dal vecchio path `base_predict_fila5` al workspace corrente.

## Note di allineamento

- Preferire `${PWD}/laravel/artisan` ai path assoluti hardcoded quando il file deve restare portabile nel repository.
- Evitare configurazioni Cursor che puntano a repository storici o diversi dal workspace attuale.
- Se si aggiorna `laravel-boost`, verificare sempre sia `laravel/.mcp.json` sia `/.cursor/mcp.json`.

## Collegamenti correlati

- [mcp-setup.md](./mcp-setup.md)
- [mcp-quickstart.md](./mcp-quickstart.md)
- [../../../docs/ai/claude/configuration.md](../../../docs/ai/claude/configuration.md)

**Filosofia**: un solo comando reale, una sola configurazione coerente, nessun path morto.
>>>>>>> laraxot/dev
