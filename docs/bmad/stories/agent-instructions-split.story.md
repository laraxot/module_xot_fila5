---
title: "Suddivisione istruzioni agenti Claude e pattern comuni"
type: story
status: review
created: 2026-11-05
updated: 2026-11-05
tags: [bmad, claude, documentation, second-brain]
qmd: "suddivisione CLAUDE agent instructions common patterns documentazione agenti indice bidirezionale"
related:
  - ../../../../../../.agents/docs/claude/index.md
  - ../../../../../../CLAUDE.md
---
# Suddivisione istruzioni agenti Claude e pattern comuni

## Contesto e motivazione

I tre file indicati contengono materiale con scopi diversi: guida operativa specifica Laravel nel `CLAUDE.md` root, regole del harness Claude Code in `.claude/CLAUDE.md` e pattern generici/progetto in `patterns.md`. Tenerli lunghi nei percorsi auto-caricati spreca contesto; inoltre `.claude/CLAUDE.md` mescola prescrizioni Next.js/Supabase non pertinenti con un bridge PTVX che le contraddice. L'estrazione per argomento mantiene il materiale rintracciabile e crea riferimenti relativi in entrambe le direzioni.

## Acceptance criteria

- [x] Sezioni separate in pagine Markdown più piccole sotto `.agents/docs/`.
- [x] Ogni fonte è un indice leggero verso le pagine canoniche.
- [x] Ogni pagina linka la propria fonte e l'indice centrale.
- [x] Le fonti sono indici leggeri per l'auto-discovery; il contenuto resta consultabile on-demand.
- [x] Verificare link, frontmatter e indice QMD.
- [x] Registrare l'esito reale nella story e nello sprint status.

## Esito

Estratte le 906 righe originarie in 33 pagine tematiche (massimo 122 righe). `.claude` e `.agents` sono symlink verso `bashscripts/ai/.agents`; i link sono stati verificati rispetto alle destinazioni reali. La guida harness conteneva indicazioni Next.js/Supabase incoerenti con Laravel: ora restano consultabili nella sezione harness dedicata, senza confondere il bridge principale. L'indice centrale è collegato anche dall'indice generale degli agenti.

Verifica: 39 file controllati per link locali e frontmatter; 0 link mancanti nei file del refactor. `qmd update` completato e le nuove pagine sono presenti nella collection `agents-rules-skills`. Nessun test Pest eseguito: modifica documentale senza codice PHP. `graphify update .` avviato ma interrotto dopo 2.200/14.181 file AST, perché il rebuild completo eccedeva lo scope documentale; lock temporaneo rimosso dopo l'arresto. Stato `review` in attesa di un rebuild graphify completo quando richiesto per un cambiamento di codice.
