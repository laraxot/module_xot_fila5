# Headroom Integration — Xot Foundation Module

**Headroom** comprime il contesto Claude per ridurre token (60-95%) mantenendo qualità. Integrazione automatica in base_ptvx_fila5.

## Quick Start

```bash
# Setup automatico (eseguire una sola volta)
bash bashscripts/headroom-setup.sh

# Verificare stato
headroom status

# Monitorare ottimizzazione
headroom stats
```

## Architettura

### Flusso di Compressione
```
Claude Code request
    ↓
Headroom proxy (127.0.0.1:8787)
    ↓
SmartCrusher → ContentRouter → Compression Engine
    ↓
Kompress-v2-base (modello HF)
    ↓
Claude Opus-5 (60-95% token risparmiati)
```

### Target di Compressione (Laravel-specifici)

| Target | Tipo | Reversibile | ROI |
|--------|------|-------------|-----|
| Eloquent array output | semantic | ✅ | 70% |
| Query builder output | AST | ✅ | 65% |
| PHPStan diagnostics | AST | ✅ | 80% |
| Database schema | structural | ✅ | 75% |
| Migration files | AST | ✅ | 60% |
| QMD search results | semantic | ✅ | 55% |

## Configurazione

### Per-Agent (`.headroom.yaml`)

```yaml
agents:
  laravel-code-reviewer:
    priority: high
    context_budget: 120000
    compress_eloquent: true
    
  eloquent-specialist:
    priority: high
    context_budget: 85000
    compress_migrations: true
```

### Proxy Auto-Start

```bash
# Opzione 1: Hook Claude Code
# Aggiungi in .claude/settings.json:
{
  "hooks": {
    "pre-task": "headroom proxy --port 8787 &"
  }
}

# Opzione 2: Manual (per test)
headroom proxy --port 8787
```

## Monitoraggio

### Analytics
```bash
# Dashboard
headroom analytics

# Token saved per agent
cat .headroom/analytics/session_*

# Efficiency report
headroom stats --output json | jq '.efficiency'
```

### Threshold Adjustment
Se compressione troppo aggressiva:
```bash
# Ridurre threshold
headroom config --prune-threshold 0.8
headroom cache --clear
```

## Best Practices

### ✅ Comprimi sempre
- Output query builder (troppe ripetizioni in log)
- Array Eloquent con 50+ elementi
- PHPStan output (verboso, patterns ripetitivi)
- QMD search results (indici duplicati)

### ❌ Non comprimere
- Error stack traces (context critico per debug)
- Git diff (info linea-specifica necessaria)
- Test assertions (fallimento specifico)
- Messaggi d'errore iniziali

## Integrazione Moduli

Ogni modulo segue lo stesso pattern:

```bash
laravel/Modules/{ModuleName}/
├── docs/
│   ├── HEADROOM_INTEGRATION.md (copia template)
│   └── ...
├── commands/
├── config/
└── ...
```

Non serve configurazione speciale — Headroom auto-discovera moduli da `.headroom.yaml` (sezione `modules.path: "laravel/Modules"`).

## Troubleshooting

### Proxy non avvia
```bash
# Check port
lsof -i :8787

# Kill existing process
pkill -f "headroom proxy"

# Retry
headroom proxy --port 8787
```

### Compressione troppo aggressiva
```bash
headroom config --compress-old-messages false
headroom config --age-threshold-days 7
headroom cache --clear
```

### Recuperare dati compressi
```bash
# Recupera versione originale di query builder output
headroom decompress --id <message-id>
```

## Links

- [Headroom GitHub](https://github.com/headroomlabs-ai/headroom)
- [Configurazione globale](./.headroom.yaml)
- [Setup script](../bashscripts/headroom-setup.sh)
- [QMD Wiki](../docs/wiki/concepts/headroom-integration.md)

---

**Updated:** 2026-08-02  
**Author:** Claude Code  
**Status:** Production
