---
title: "Installazione setup automazioni per Codex"
type: story
module: Xot
epic: quality
status: in-progress
created: 2026-10-05
updated: 2026-10-05
tags: [codex, skills, automation, second-brain]
related:
  - ./project-quality-audit.story.md
qmd: "codex project setup story installazione automazioni"
---
# Installazione setup automazioni per Codex

## Context and Problem Statement

Problema e obiettivo sono descritti nel Decision Outcome (migrazione automatica a MADR).

## Decision Drivers

- Richiesta utente / acceptance criteria della story
- Vincoli BMAD, second brain, Pest gate e dati sacri

## Considered Options

- Status quo (non fare)
- Implementare come descritto nel Decision Outcome

## Decision Outcome

Scelta: **implementare**, perché i driver sopra.

## Richiesta

Studiare e installare `anthropics/claude-plugins-official/plugins/claude-code-setup`
oppure la versione più adatta a Codex. Il lavoro prosegue insieme agli interventi
qualità e UX già autorizzati.

## Acceptance criteria e task

- [ ] Leggere sorgente, licenza e documentazione ufficiale Codex.
- [ ] Installare una skill locale adatta al runtime Codex, senza comandi Claude ineseguibili.
- [ ] Conservare provenienza e licenza; validare struttura e riferimenti.
- [ ] Verificare il comportamento su PTVX e registrare limiti e risultati.

## Coordinamento e decisione

Owner: Codex coordinatore; agenti esistenti continuano su password Xot e login User.
Originale Anthropic v1.0.0: singola skill di raccomandazioni in sola lettura, senza MCP
o hook propri. I comandi e i percorsi Claude richiedono adattamento al runtime Codex.
Applicare Ponytail: riusare BMAD, QMD, lock e gate già presenti; nessuna nuova
dipendenza applicativa o autorizzazione globale.

## Riferimenti

- https://github.com/anthropics/claude-plugins-official/tree/main/plugins/claude-code-setup
- https://learn.chatgpt.com/docs/build-skills
- https://developers.openai.com/plugins/guides/submit-claude-plugin


### Consequences

- Buono, perché chiude il gap descritto nel Context
- Cattivo, perché richiede write-back docs, lock e quality gate

### Confirmation

Aggiungere prova ripetibile (Pest exit code + conteggio, PHPStan, o skip host documentato).
