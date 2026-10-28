---
title: "ECC — indice documentazione PTVX"
type: index
module: Xot
status: active
created: 2026-10-28
updated: 2026-10-28
tags: [ecc, codex, documentation]
qmd: "ECC Codex indice documentazione configurazione PTVX"
related:
  - ../bmad/stories/ecc-codex-plugin-setup.story.md
  - ../00-INDEX.md
---

# ECC — indice documentazione PTVX

Questi documenti descrivono il plugin ECC nativo installato nell'ambiente Codex e
il suo uso nel repository PTVX. ECC aggiunge strumenti riutilizzabili; le istruzioni
locali in `AGENTS.md` restano la fonte di verità per questo progetto.

## Mappa

- [Architettura e perimetro](architecture.md): cosa installa ECC e come si collega
  all'host Codex.
- [Ciclo di vita Codex](codex-lifecycle.md): installazione, verifica, aggiornamento,
  disattivazione e rimozione.
- [Integrazione Claude Code](claude-code-integration.md): plugin utente, regole
  globali e differenza rispetto al plugin Codex.
- [Integrazione con PTVX](ptvx-integration.md): precedenza delle regole, BMAD,
  second brain, swarm, lock e gate di qualità.
- [Sicurezza, hook e MCP](security-and-hooks.md): provenienza, trust delle hook,
  server MCP e limiti verificati.
- [Workflow e selezione delle skill](workflows.md): quali capacità ECC usare per
  il lavoro Laravel e come applicarle senza duplicare i workflow locali.
- [Manutenzione](maintenance.md): aggiornamenti, controlli periodici e diagnosi.

## Stato attuale

- Sorgente ufficiale: `https://github.com/affaan-m/ECC`, licenza MIT.
- Canale: marketplace e plugin nativi Codex; installata la versione `2.2.3`.
- Nell'host è attivo anche il plugin Claude Code `ecc@ecc` `2.2.3`; i due harness
  mantengono cache, hook e configurazione distinti.
- Marketplace `ecc` e plugin `ecc@ecc` risultano registrati e abilitati in
  `/home/zorin/.codex`.
- La cache contiene tutti i riferimenti del manifest. `~/.codex/config.toml` contiene
  gli hash di trust Codex per `ecc@ecc:hooks/codex-hooks.json:session_start`; il
  plugin può eseguire questa hook nelle sessioni future.
- Non è stato eseguito il vecchio sync che copia file dentro `~/.codex`, né sono
  stati copiati i file `.codex/` di riferimento di ECC nel repository.

Per decisioni o aggiornamenti, consultare la story
[ecc-codex-plugin-setup](../bmad/stories/ecc-codex-plugin-setup.story.md) e poi
registrare i fatti durevoli nella [memoria condivisa](../../../../../bashscripts/ai/wiki/memories/ecc-codex-native-plugin.md).
