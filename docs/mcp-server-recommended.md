<<<<<<< .merge_file_JIZvm6
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
=======


>>>>>>> laraxot/dev
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======


>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_6ejK1V
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
# MCP Server Consigliati per il Modulo Xot

## Scopo del Modulo
Modulo base/framework: fornisce servizi trasversali, integrazione tra componenti, azioni comuni.

## Server MCP Consigliati
- `filesystem`: Per gestione file e configurazioni cross-modulo.
- `fetch`: Per chiamate API da azioni condivise.
- `memory`: Per stato temporaneo tra moduli o azioni.

## Configurazione Minima Esempio
```json
{
  "mcpServers": {
    "filesystem": { "command": "npx", "args": ["-y", "@modelcontextprotocol/server-filesystem"] },
    "fetch": { "command": "npx", "args": ["-y", "@modelcontextprotocol/server-fetch"] },
    "memory": { "command": "npx", "args": ["-y", "@modelcontextprotocol/server-memory"] }
  }
}
```

## Note
<<<<<<< .merge_file_JIZvm6
<<<<<<< HEAD
<<<<<<< HEAD
- Xot non richiede MCP custom, ma può essere esteso da altri moduli.
=======
<<<<<<< HEAD
<<<<<<< HEAD
- Xot non richiede MCP custom, ma può essere esteso da altri moduli.
=======
- Xot non richiede MCP custom, ma può essere esteso da altri moduli.
>>>>>>> laraxot/dev
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
- Xot non richiede MCP custom, ma può essere esteso da altri moduli.
>>>>>>> 3792da0d (Check & fix styling)
=======
- Xot non richiede MCP custom, ma può essere esteso da altri moduli.
>>>>>>> .merge_file_6ejK1V
=======
=======
- Xot non richiede MCP custom, ma può essere esteso da altri moduli.
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
