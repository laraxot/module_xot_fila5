---
title: "Ogni modulo e tema ha .github/README.md, generato da fatti verificati"
type: decision
status: accepted
created: 2026-11-26
updated: 2026-11-26
module: Xot
decision-makers: [utente]
qmd: "ADR 0043 github README per pacchetto modulo tema .github/README.md pagina repository GitHub guardia test"
related:
  - ./0041-no-docs-archive-folders.md
  - ../stories/0178-github-readme-per-pacchetto.story.md
  - ../../tests/Unit/Docs/PackagesHaveGithubReadmeTest.php
---

# Ogni modulo e tema ha `.github/README.md`

> Regola valida per tutti i tenant che usano Xot: vale per ogni cartella in `Modules/` e `Themes/` con `module.json`, `theme.json` o `composer.json`.

## Contesto

Ogni modulo e tema è anche un repository GitHub a sé (`laraxot/module_<m>_fila5`, `laraxot/theme_<t>_fila5`). GitHub mostra al posto del README principale il file `.github/README.md`, se esiste. Il 2026-11-26 lo avevano in 1 pacchetto su 26 (Notify), e lì era un documento di tracking di un altro progetto (Design Comuni), non la pagina del pacchetto.

Il `README.md` alla radice del pacchetto è un'altra cosa: spesso lungo e vecchio (642 righe in Activity, con badge «Laravel 12.x»). Serve una pagina breve che dica cos'è il pacchetto e porti a docs, issue, discussioni e sicurezza.

## Driver della decisione

- Ordine dell'utente: tutti i moduli e i temi hanno `.github/README.md`.
- Nessun fatto inventato: nome, descrizione, pacchetto Composer e repository vengono da `module.json`/`theme.json`/`composer.json` e dal remote git; le sezioni opzionali compaiono solo se il file esiste e solo se la funzione GitHub è attiva (Issues, Discussions, Wiki, letto dall'API).
- Il file non gonfia `docs/` (tetto di 100 `.md`): sta in `.github/`.

## Alternative scartate

- Riscrivere a mano 25 pagine — scartata: derivano e diventano false (il caso Activity).
- Un link simbolico al `README.md` di radice — scartata: i README lunghi sono il problema, e un symlink non si comporta bene sui repo annidati.
- Mettere la pagina in `docs/` — scartata: GitHub non la mostra, e conta contro il tetto.
- Un test che confronta il testo col generatore — scartata: il testo si può correggere a mano; la guardia controlla ciò che non deve mancare (esistenza, titolo, link che risolvono).

## Decisione

Scelta: **ogni modulo e tema ha `.github/README.md`**: titolo `# <Nome>`, la descrizione del pacchetto, una tabella con tipo, pacchetto Composer e repository, poi le sezioni «Dove guardare», «Segnalazioni e discussioni» e «Sviluppo» quando ci sono i fatti per scriverle.

Nessuna riga è indovinata. In particolare:

- il link a Discussioni compare solo se le Discussions sono attive sul repository (non lo sono in Blog, Barthelemy, Meetup, TwentyOne) e quello alla Wiki solo se la Wiki è attiva (non lo è in Comment);
- «Sviluppo» dice che i moduli non hanno un `vendor/` proprio perché è vero nel checkout monorepo (`laravel/CLAUDE.md`);
- se un pacchetto ha già un `.github/README.md` con altro contenuto, quel contenuto si sposta con un nome parlante e i rimandi si correggono (Notify: `design-comuni-issue-tracking.md`).

## Conseguenze

- Buono: il repository di ogni pacchetto ha una pagina iniziale corretta e breve; la guardia impedisce che un pacchetto nuovo ne resti senza.
- Buono: il testo non nomina il progetto ospite, quindi resta valido quando il modulo gira altrove.
- Cattivo: `Event`, `Barthelemy` e `Meetup` non sono repository annidati qui (sono tracciati nella radice): le loro pagine arrivano su GitHub solo con il repository della radice o dopo la creazione del repo del pacchetto. `module_event_fila5` oggi non esiste su GitHub.
- Cattivo: la pagina può invecchiare (descrizione cambiata in `module.json`); la guardia non lo rileva.
- Da decidere (umano): spingere le pagine sui repository dei pacchetti; questa decisione non lo fa.

### Confirmation

- `cd laravel && vendor/bin/pest Modules/Xot/tests/Unit/Docs/PackagesHaveGithubReadmeTest.php` — due test: esistenza con titolo e link relativi che risolvono. Riprodotto in rosso su un albero di prova con un README assente, uno senza titolo e uno con un link rotto.
- Da `laravel/`: `for d in Modules/* Themes/*; do [ -f $d/module.json ] || [ -f $d/theme.json ] || [ -f $d/composer.json ] || continue; [ -s $d/.github/README.md ] || echo "manca $d"; done` non stampa nulla (misurato il 2026-11-26; senza il filtro stampa anche `Themes/docs` e `Modules/README.md`, che non sono pacchetti).
