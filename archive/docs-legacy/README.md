# archive/docs-legacy — Xot

Documenti `.md` rimossi da `docs/` per rispettare il tetto di **100 file markdown**
(issues #151 e #149/#174, regola "no archive folders inside docs/" — ADR 0041).

Nessun file è stato cancellato: tutto è conservato qui, pronto per essere
consultato o ripristinato con `git mv` se serve.

## Contenuto

| Cartella | Provenienza | Motivo |
|---|---|---|
| `contracts/` | `docs/contracts/` (239 stub per-Action + `index.md` deprecato) | consolidati in `docs/contracts/INDEX.md` e `README.md`, che puntano qui |
| `consolidated/` | `docs/consolidated/` (25 file) | consolidati/legacy generati, sostituiti dalle guide in `docs/` |
| `digests/` | `docs/digests/` (3 file) | digest generati |
| `phpstan/` | `docs/phpstan/` (13 file, gitignored) | report generati di livello PHPStan |
| `wiki/` | `docs/wiki/` (10 file + sottoalberi) | wiki di modulo duplicata rispetto al wiki di progetto in `docs/wiki/` radice; restano `.mdc`, stub e asset |
| `bmad-stories/` | `docs/bmad/stories/` (23 story completate) | solo template e story attive restano in `docs/bmad/stories/` |

## Ripristino

```bash
# esempio: ripristinare un contratto
mv archive/docs-legacy/contracts/<file>.md docs/contracts/<file>.md
```

Attenzione: i docblock `@contract docs/contracts/<file>.md` nelle Action
continueranno a nominare il percorso originale; il file archiviato conserva
il suo nome, quindi il riferimento resta risolvibile solo se il file torna
in `docs/contracts/`.
