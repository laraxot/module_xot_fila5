---
title: "[STORY] .github/README.md in ogni modulo e tema"
type: story
module: Xot
bmad: true
status: done
date: 2026-11-26
decision-makers: [utente]
priority: normal
created: 2026-11-26
updated: 2026-11-26
tags: [github, readme, moduli, temi, guardia]
qmd: "github README per pacchetto modulo tema .github/README.md generatore guardia Notify design-comuni"
related:
  - ../adr/0043-github-readme-per-pacchetto.md
  - ../../tests/Unit/Docs/PackagesHaveGithubReadmeTest.php
---

# `.github/README.md` in ogni modulo e tema

## Context and Problem Statement

Richiesta dell'utente (2026-11-26): «tutti i moduli e i temi devono avere il file .github/README.md , fa tutto con bmad + ecc + second brain».

Fase BMAD: **Analyze → Implement → Verify**.

Misurato prima di toccare niente (da `laravel/`, 25 pacchetti con `module.json`, `theme.json` o `composer.json`):

- 1 pacchetto su 25 aveva `.github/README.md`: Notify, e conteneva il tracking del progetto Design Comuni (358 righe), non la pagina del pacchetto.
- 24 senza. `Event`, `Barthelemy` e `Meetup` non hanno `.github` o l'hanno senza README, e non sono repository annidati qui (tracciati nella radice).
- Sui repository GitHub: tutti esistono tranne `laraxot/module_event_fila5`; Discussions spente in Blog, Barthelemy, Meetup, TwentyOne; Wiki spenta in Comment.

## Decision Drivers

- Nessuna riga inventata: i fatti vengono da `module.json`/`theme.json`/`composer.json`, dal remote git e dall'API GitHub.
- Non perdere il documento di Notify.
- Non scrivere in `docs/` dei pacchetti mentre un'altra sessione ne applica il tetto di 100 file: `.github/` è fuori da quel perimetro.

## Considered Options

- Scrivere 25 pagine a mano — scartata (derivano).
- Generarle da fatti verificati, senza sovrascrivere nulla (noclobber) e con una guardia — scelta.
- Un solo README condiviso — scartata: GitHub mostra il file del repository di quel pacchetto.

## Decision Outcome

Scelta: generazione da fatti verificati; decisione in [ADR 0043](../adr/0043-github-readme-per-pacchetto.md).

Fatto il 2026-11-26:

- 25 file `.github/README.md` creati (22 nei repo annidati, 3 nella radice: Event, Barthelemy, Meetup).
- Notify: il vecchio contenuto è ora `Modules/Notify/.github/design-comuni-issue-tracking.md` (9768 byte prima e dopo); i due rimandi in `copilot-instructions.md` (righe 384 e 430) puntano al nome nuovo.
- Guardia: `Modules/Xot/tests/Unit/Docs/PackagesHaveGithubReadmeTest.php`.
- Il generatore è uno script di sessione, non versionato: la regola vive nell'ADR e nella guardia, non nello script.

### Consequences

- 122 link relativi controllati, 0 rotti.
- Non spinto sui repository dei pacchetti: serve una decisione umana (vedi sotto). La sync committa la radice entro un minuto; i repo annidati restano con file non tracciati finché qualcuno non committa dentro il pacchetto.
- Le pagine dicono «il modulo non ha un `vendor/` proprio»: vero nel monorepo, falso in un checkout isolato del modulo.

[ATTESA-UMANO]: committare e spingere le 22 pagine nei repository dei pacchetti (`laraxot/dev`)? Creare `laraxot/module_event_fila5` o lasciare Event come placeholder senza repository?

### Confirmation

- Guardia: 2 passati, 3 asserzioni (`APP_CONFIG_CACHE=/nonexistent/config.php bash bashscripts/tools/pest-scratch-db.sh Modules/Xot/tests/Unit/Docs/PackagesHaveGithubReadmeTest.php`).
- Rosso riprodotto su un albero di prova (scratchpad): un pacchetto senza README, uno senza titolo e uno con link `../docs/` rotto sono segnalati tutti e tre; il pacchetto in regola no.
- Comando di presenza nella «Confirmation» dell'ADR: nessuna riga stampata.
- PHPStan sul file di test: «No errors». Pint: passed.
