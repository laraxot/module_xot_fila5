# Configurazione MCP per Claude Code

## Panoramica

<<<<<<< .merge_file_DmU0qS
<<<<<<< HEAD
<<<<<<< HEAD
Claude Code utilizza comandi CLI per configurare i server MCP. Questa guida descrive come configurare i server MCP per il progetto Quaeris Fila4 Mono.
=======
<<<<<<< HEAD
<<<<<<< HEAD
Claude Code utilizza comandi CLI per configurare i server MCP. Questa guida descrive come configurare i server MCP per il progetto Quaeris Fila4 Mono.
=======
Claude Code utilizza comandi CLI per configurare i server MCP. Questa guida descrive come configurare i server MCP per il progetto healthcare_app Fila4 Mono.
Claude Code utilizza comandi CLI per configurare i server MCP. Questa guida descrive come configurare i server MCP per il progetto.
>>>>>>> laraxot/dev
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
Claude Code utilizza comandi CLI per configurare i server MCP. Questa guida descrive come configurare i server MCP per il progetto healthcare_app Fila4 Mono.
Claude Code utilizza comandi CLI per configurare i server MCP. Questa guida descrive come configurare i server MCP per il progetto.
>>>>>>> 3792da0d (Check & fix styling)
=======
Claude Code utilizza comandi CLI per configurare i server MCP. Questa guida descrive come configurare i server MCP per il progetto Quaeris Fila4 Mono.
>>>>>>> .merge_file_WWh04e
=======
=======
Claude Code utilizza comandi CLI per configurare i server MCP. Questa guida descrive come configurare i server MCP per il progetto Quaeris Fila4 Mono.
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)

## Prerequisiti

- Claude Code installato e configurato
- Accesso al terminale
- Variabili d'ambiente del database configurate

## Configurazione Server MCP

### 1. Filesystem Server

Permette l'accesso ai file del progetto.

```bash
<<<<<<< .merge_file_DmU0qS
<<<<<<< HEAD
<<<<<<< HEAD
claude mcp add --transport http filesystem-quaeris http://localhost:8000/mcp/filesystem
=======
<<<<<<< HEAD
<<<<<<< HEAD
claude mcp add --transport http filesystem-quaeris http://localhost:8000/mcp/filesystem
=======
claude mcp add --transport http filesystem-healthcare_app http://localhost:8000/mcp/filesystem
claude mcp add --transport http filesystem http://localhost:8000/mcp/filesystem
>>>>>>> laraxot/dev
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
claude mcp add --transport http filesystem-healthcare_app http://localhost:8000/mcp/filesystem
claude mcp add --transport http filesystem http://localhost:8000/mcp/filesystem
>>>>>>> 3792da0d (Check & fix styling)
=======
claude mcp add --transport http filesystem-quaeris http://localhost:8000/mcp/filesystem
>>>>>>> .merge_file_WWh04e
=======
=======
claude mcp add --transport http filesystem-quaeris http://localhost:8000/mcp/filesystem
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
```

**Nota**: Richiede un server MCP HTTP in esecuzione. Per sviluppo locale, utilizzare server STDIO invece.

### 2. Fetch Server

Permette chiamate HTTP e API.

```bash
<<<<<<< .merge_file_DmU0qS
<<<<<<< HEAD
<<<<<<< HEAD
claude mcp add --transport http fetch-quaeris http://localhost:8000/mcp/fetch
=======
<<<<<<< HEAD
<<<<<<< HEAD
claude mcp add --transport http fetch-quaeris http://localhost:8000/mcp/fetch
=======
claude mcp add --transport http fetch-healthcare_app http://localhost:8000/mcp/fetch
>>>>>>> laraxot/dev
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
claude mcp add --transport http fetch-healthcare_app http://localhost:8000/mcp/fetch
>>>>>>> 3792da0d (Check & fix styling)
=======
claude mcp add --transport http fetch-quaeris http://localhost:8000/mcp/fetch
>>>>>>> .merge_file_WWh04e
=======
=======
claude mcp add --transport http fetch-quaeris http://localhost:8000/mcp/fetch
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
```

### 3. Memory Server

Memoria temporanea per contesto tra richieste.

```bash
<<<<<<< .merge_file_DmU0qS
<<<<<<< HEAD
<<<<<<< HEAD
claude mcp add --transport http memory-quaeris http://localhost:8000/mcp/memory
=======
<<<<<<< HEAD
<<<<<<< HEAD
claude mcp add --transport http memory-quaeris http://localhost:8000/mcp/memory
=======
claude mcp add --transport http memory-healthcare_app http://localhost:8000/mcp/memory
>>>>>>> laraxot/dev
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
claude mcp add --transport http memory-healthcare_app http://localhost:8000/mcp/memory
>>>>>>> 3792da0d (Check & fix styling)
=======
claude mcp add --transport http memory-quaeris http://localhost:8000/mcp/memory
>>>>>>> .merge_file_WWh04e
=======
=======
claude mcp add --transport http memory-quaeris http://localhost:8000/mcp/memory
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
```

### 4. MySQL Server

Interazione con database MySQL.

```bash
<<<<<<< .merge_file_DmU0qS
<<<<<<< HEAD
<<<<<<< HEAD
claude mcp add --transport http mysql-quaeris http://localhost:8000/mcp/mysql
=======
<<<<<<< HEAD
<<<<<<< HEAD
claude mcp add --transport http mysql-quaeris http://localhost:8000/mcp/mysql
=======
claude mcp add --transport http mysql-healthcare_app http://localhost:8000/mcp/mysql
>>>>>>> laraxot/dev
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
claude mcp add --transport http mysql-healthcare_app http://localhost:8000/mcp/mysql
>>>>>>> 3792da0d (Check & fix styling)
=======
claude mcp add --transport http mysql-quaeris http://localhost:8000/mcp/mysql
>>>>>>> .merge_file_WWh04e
=======
=======
claude mcp add --transport http mysql-quaeris http://localhost:8000/mcp/mysql
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
```

**Variabili d'ambiente richieste**:
- `DB_HOST`: Host del database (default: localhost)
- `DB_PORT`: Porta del database (default: 3306)
- `DB_USERNAME`: Username del database
- `DB_PASSWORD`: Password del database
- `DB_DATABASE`: Nome del database

### 5. Sequential Thinking Server

Analisi codice e ottimizzazione.

```bash
<<<<<<< .merge_file_DmU0qS
<<<<<<< HEAD
<<<<<<< HEAD
claude mcp add --transport http sequential-thinking-quaeris http://localhost:8000/mcp/sequential-thinking
=======
<<<<<<< HEAD
<<<<<<< HEAD
claude mcp add --transport http sequential-thinking-quaeris http://localhost:8000/mcp/sequential-thinking
=======
claude mcp add --transport http sequential-thinking-healthcare_app http://localhost:8000/mcp/sequential-thinking
>>>>>>> laraxot/dev
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
claude mcp add --transport http sequential-thinking-healthcare_app http://localhost:8000/mcp/sequential-thinking
>>>>>>> 3792da0d (Check & fix styling)
=======
claude mcp add --transport http sequential-thinking-quaeris http://localhost:8000/mcp/sequential-thinking
>>>>>>> .merge_file_WWh04e
=======
=======
claude mcp add --transport http sequential-thinking-quaeris http://localhost:8000/mcp/sequential-thinking
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
```

## Configurazione con Server STDIO (Raccomandato)

Per sviluppo locale, è preferibile utilizzare server STDIO invece di HTTP:

### Filesystem con STDIO

```bash
<<<<<<< .merge_file_DmU0qS
<<<<<<< HEAD
<<<<<<< HEAD
claude mcp add filesystem-quaeris npx -y @modelcontextprotocol/server-filesystem server-memory
=======
<<<<<<< HEAD
<<<<<<< HEAD
claude mcp add filesystem-quaeris npx -y @modelcontextprotocol/server-filesystem server-memory
=======
claude mcp add filesystem-healthcare_app npx -y @modelcontextprotocol/server-filesystem server-memory
>>>>>>> laraxot/dev
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
claude mcp add filesystem-healthcare_app npx -y @modelcontextprotocol/server-filesystem server-memory
>>>>>>> 3792da0d (Check & fix styling)
=======
claude mcp add filesystem-quaeris npx -y @modelcontextprotocol/server-filesystem server-memory
>>>>>>> .merge_file_WWh04e
=======
=======
claude mcp add filesystem-quaeris npx -y @modelcontextprotocol/server-filesystem server-memory
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
```

### MySQL con STDIO

```bash
<<<<<<< .merge_file_DmU0qS
<<<<<<< HEAD
<<<<<<< HEAD
claude mcp add mysql-quaeris npx -y @modelcontextprotocol/server-mysql
=======
<<<<<<< HEAD
<<<<<<< HEAD
claude mcp add mysql-quaeris npx -y @modelcontextprotocol/server-mysql
=======
claude mcp add mysql-healthcare_app npx -y @modelcontextprotocol/server-mysql
>>>>>>> laraxot/dev
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
claude mcp add mysql-healthcare_app npx -y @modelcontextprotocol/server-mysql
>>>>>>> 3792da0d (Check & fix styling)
=======
claude mcp add mysql-quaeris npx -y @modelcontextprotocol/server-mysql
>>>>>>> .merge_file_WWh04e
=======
=======
claude mcp add mysql-quaeris npx -y @modelcontextprotocol/server-mysql
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
```

**Con variabili d'ambiente**:
```bash
export DB_HOST=localhost
export DB_PORT=3306
export DB_USERNAME=your_username
export DB_PASSWORD=your_password
export DB_DATABASE=your_database

<<<<<<< .merge_file_DmU0qS
<<<<<<< HEAD
<<<<<<< HEAD
claude mcp add mysql-quaeris npx -y @modelcontextprotocol/server-mysql
=======
<<<<<<< HEAD
<<<<<<< HEAD
claude mcp add mysql-quaeris npx -y @modelcontextprotocol/server-mysql
=======
claude mcp add mysql-healthcare_app npx -y @modelcontextprotocol/server-mysql
>>>>>>> laraxot/dev
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
claude mcp add mysql-healthcare_app npx -y @modelcontextprotocol/server-mysql
>>>>>>> 3792da0d (Check & fix styling)
=======
claude mcp add mysql-quaeris npx -y @modelcontextprotocol/server-mysql
>>>>>>> .merge_file_WWh04e
=======
=======
claude mcp add mysql-quaeris npx -y @modelcontextprotocol/server-mysql
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
```

## Gestione Server

### Lista Server Configurati

```bash
claude mcp list
```

### Rimozione Server

```bash
<<<<<<< .merge_file_DmU0qS
<<<<<<< HEAD
<<<<<<< HEAD
claude mcp remove filesystem-quaeris
=======
<<<<<<< HEAD
<<<<<<< HEAD
claude mcp remove filesystem-quaeris
=======
claude mcp remove filesystem-healthcare_app
>>>>>>> laraxot/dev
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
claude mcp remove filesystem-healthcare_app
>>>>>>> 3792da0d (Check & fix styling)
=======
claude mcp remove filesystem-quaeris
>>>>>>> .merge_file_WWh04e
=======
=======
claude mcp remove filesystem-quaeris
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
```

### Test Connessione

```bash
<<<<<<< .merge_file_DmU0qS
<<<<<<< HEAD
<<<<<<< HEAD
claude mcp test filesystem-quaeris
=======
<<<<<<< HEAD
<<<<<<< HEAD
claude mcp test filesystem-quaeris
=======
claude mcp test filesystem-healthcare_app
>>>>>>> laraxot/dev
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
claude mcp test filesystem-healthcare_app
>>>>>>> 3792da0d (Check & fix styling)
=======
claude mcp test filesystem-quaeris
>>>>>>> .merge_file_WWh04e
=======
=======
claude mcp test filesystem-quaeris
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
```

## Configurazione Avanzata

### Server Personalizzati

Per server MCP personalizzati, creare uno script wrapper:

```bash
#!/bin/bash
<<<<<<< .merge_file_DmU0qS
<<<<<<< HEAD
<<<<<<< HEAD
# ~/bin/mcp-mysql-quaeris.sh
=======
<<<<<<< HEAD
<<<<<<< HEAD
# ~/bin/mcp-mysql-quaeris.sh
=======
# ~/bin/mcp-mysql-healthcare_app.sh
>>>>>>> laraxot/dev
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
# ~/bin/mcp-mysql-healthcare_app.sh
>>>>>>> 3792da0d (Check & fix styling)
=======
# ~/bin/mcp-mysql-quaeris.sh
>>>>>>> .merge_file_WWh04e
=======
=======
# ~/bin/mcp-mysql-quaeris.sh
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)

export MYSQL_HOST="${DB_HOST:-localhost}"
export MYSQL_PORT="${DB_PORT:-3306}"
export MYSQL_USER="${DB_USERNAME}"
export MYSQL_PASSWORD="${DB_PASSWORD}"
export MYSQL_DATABASE="${DB_DATABASE}"

exec npx -y @modelcontextprotocol/server-mysql
```

Poi aggiungere il server:

```bash
<<<<<<< .merge_file_DmU0qS
<<<<<<< HEAD
<<<<<<< HEAD
chmod +x ~/bin/mcp-mysql-quaeris.sh
claude mcp add mysql-quaeris ~/bin/mcp-mysql-quaeris.sh
=======
<<<<<<< HEAD
<<<<<<< HEAD
chmod +x ~/bin/mcp-mysql-quaeris.sh
claude mcp add mysql-quaeris ~/bin/mcp-mysql-quaeris.sh
=======
chmod +x ~/bin/mcp-mysql-healthcare_app.sh
claude mcp add mysql-healthcare_app ~/bin/mcp-mysql-healthcare_app.sh
>>>>>>> laraxot/dev
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
chmod +x ~/bin/mcp-mysql-healthcare_app.sh
claude mcp add mysql-healthcare_app ~/bin/mcp-mysql-healthcare_app.sh
>>>>>>> 3792da0d (Check & fix styling)
=======
chmod +x ~/bin/mcp-mysql-quaeris.sh
claude mcp add mysql-quaeris ~/bin/mcp-mysql-quaeris.sh
>>>>>>> .merge_file_WWh04e
=======
=======
chmod +x ~/bin/mcp-mysql-quaeris.sh
claude mcp add mysql-quaeris ~/bin/mcp-mysql-quaeris.sh
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
```

## Troubleshooting

### Server non si connette

1. Verificare che il comando sia installato:
   ```bash
   npx -y @modelcontextprotocol/server-filesystem --version
   ```

2. Controllare permessi file:
   ```bash
   ls -la /docs.anthropic.com/claude/docs/mcp)
- [Model Context Protocol Specification](https://modelcontextprotocol.io)
<<<<<<< .merge_file_DmU0qS
<<<<<<< HEAD
<<<<<<< HEAD
- [MCP Editors Configuration](../mcp-editors-configuration.md)
=======
<<<<<<< HEAD
<<<<<<< HEAD
- [MCP Editors Configuration](../mcp-editors-configuration.md)
=======
- [MCP Editors Configuration](../mcp-editors-configuration.md)
>>>>>>> laraxot/dev
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
- [MCP Editors Configuration](../mcp-editors-configuration.md)
>>>>>>> 3792da0d (Check & fix styling)
=======
- [MCP Editors Configuration](../mcp-editors-configuration.md)
>>>>>>> .merge_file_WWh04e
=======
=======
- [MCP Editors Configuration](../mcp-editors-configuration.md)
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
