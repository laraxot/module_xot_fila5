---
title: "Ruflo Local Orchestration for Xot"
type: concept
confidence: high
updated: 2026-10-02
tags: [xot, ruflo, mcp, tooling, quality]
---

# Ruflo Local Orchestration for Xot

Ruflo e' tooling di orchestrazione locale, non codice runtime del modulo. Per Xot e' utile come supporto a quality gates, analisi PHPStan/Pest e memoria operativa cross-session.

## Regola Owner

- Xot resta owner delle regole architetturali Laravel/Filament/PHPStan.
- Ruflo puo' assistere con MCP tools, memoria e routing agentico.
- Ruflo non deve introdurre nuove dipendenze Composer nei moduli.

## Stato Locale Verificato

- CLI globale `ruflo v3.51.0`, Node `v26.10.0`, npm `v11.19.1`.
- Runtime V3 configurato in `.claude-flow/config.yaml` con swarm mesh,
  massimo 5 agenti e strategia consensus.
- Memoria inizializzata con `better-sqlite3`/AgentDB nativo, embedding
  `Xenova/all-MiniLM-L6-v2` e database locale `.swarm/memory.db`.
- Daemon attivo in modalità local-only, TTL 12 ore, 7 worker abilitati e
  massimo 2 esecuzioni concorrenti.
- Swarm inizializzato con topologia mesh, massimo 5 agenti, autoscaling e
  strategia development; manifest dei permessi strict in `.swarm/`.
- MCP non è ancora registrato nel `.mcp.json` del progetto: il file è protetto
  da un lock di un altro agente. Registrarlo dopo il rilascio del lock con il
  comando ufficiale `claude mcp add ruflo -- npx ruflo@latest mcp start`.
- `ruflo doctor` passa i controlli principali; restano warning opzionali per
  API key, agent-browser, AIDefence, identità Cognitum e marketplace Claude.
- `ruflo metaharness score` produce harness fit 48/100: la sicurezza è 90/100,
  ma MCP e memoria non sono ancora pienamente integrati con Codex.

## Installazione Ripetibile

```bash
npm install -g ruflo@latest
ruflo config init --v3
RUFLO_NO_SKILLS_SH=1 ruflo init --skip-claude --minimal --no-global \
    --no-signup --no-skills-sh --no-plugin-install
ruflo memory init
ruflo daemon start
ruflo doctor
```

L'inizializzazione usa `--skip-claude` perché `.claude`, `.agents` e `.codex`
sono symlink condivisi dal repository. Non usare `--force` e non eseguire
`ruflo init --codex`: potrebbero sovrascrivere `AGENTS.md` o la configurazione
condivisa degli agenti.

## Uso Consigliato

```bash
ruflo doctor
ruflo memory search -q "phpstan xotbase"
ruflo mcp tools
ruflo swarm init --v3-mode
ruflo mcp status
ruflo metaharness score
```

## Guardrail

- Non usare `ruflo init --codex --force`: puo' sovrascrivere `AGENTS.md` e `.agents`.
- Non delegare fix Xot a swarm autonomi senza test target chiari, ownership
  BMAD e lock sui file.
- Ogni modifica Xot resta soggetta a PHPStan, PHPMD phar, PHPInsights e Pest.
- Ruflo è tooling di sviluppo: nessuna dipendenza Composer o codice runtime dei
  moduli deve dipendere dalla sua presenza.

Riferimento root: [ruflo-local-orchestration](../../../../../docs/wiki/concepts/ruflo-local-orchestration.md).
