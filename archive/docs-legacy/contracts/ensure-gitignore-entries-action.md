---
title: "EnsureGitignoreEntriesAction — contratto"
type: contract
owner: Xot
module: Xot
status: accepted
updated: 2026-11-26
action: "Modules\\Xot\\Actions\\File\\EnsureGitignoreEntriesAction"
qmd: "EnsureGitignoreEntriesAction gitignore righe symlink asset modulo tema public_html aggiunge mancanti"
---

# EnsureGitignoreEntriesAction

Aggiunge a un `.gitignore` le due righe necessarie per un link di asset (`<nome>/` e `<nome>`), se mancano. Codice: `app/Actions/File/EnsureGitignoreEntriesAction.php:21-52`.

## Input

- `string $gitignorePath`: percorso del `.gitignore` (`execute`, riga 26).
- `string $name`: nome del link, es. `Xot` (riga 26).
- `string $header = ''`: testo iniziale se il file manca (riga 26).

## Output

- `list<string>`: le righe aggiunte, nell'ordine `<nome>/`, `<nome>` (righe 40-50). `[]` se nulla è cambiato.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| `FILE-GITIGNORE-INV-1` | Una riga è aggiunta solo se, dopo `trim`, non è già presente come riga esatta. Codice: righe 34-39. Test citato (senza group): `tests/Unit/Actions/File/EnsureGitignoreEntriesActionTest.php:25,43` | — (non dimostrato) |
| `FILE-GITIGNORE-INV-2` | Se entrambe le righe sono presenti, ritorna `[]` senza scrivere. Codice: righe 40-42. Test: come sopra | `FILE-GITIGNORE-INV-2` |
| `FILE-GITIGNORE-INV-3` | Se il file manca, il contenuto iniziale è `header` (con `\n` finale) o vuoto. Codice: riga 28. Test citato (senza group): come sopra | — (non dimostrato) |
| `FILE-GITIGNORE-INV-4` | Se il contenuto non termina con `\n`, ne aggiunge uno prima delle nuove righe. La cartella del file è creata. Codice: righe 44-47. Test citato (senza group): come sopra | — (non dimostrato) |

## Effetti collaterali

Scrittura del `.gitignore` con `File::put` (sovrascrive il file con contenuto più righe). Nessuna transazione.

## Errori

- Nessuna eccezione propria.

## Non fa

- Non rimuove righe esistenti.
- Non gestisce accessi concorrenti al file.
- Marker `@contract` aggiunto nel docblock della classe.
