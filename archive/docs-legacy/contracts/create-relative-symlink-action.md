---
title: "CreateRelativeSymlinkAction — contratto"
type: contract
owner: Xot
module: Xot
status: accepted
updated: 2026-11-26
action: "Modules\\Xot\\Actions\\File\\CreateRelativeSymlinkAction"
qmd: "CreateRelativeSymlinkAction symlink relativo public_html themes assets percorso relativo realpath readlink"
---

# CreateRelativeSymlinkAction

Crea un symlink con destinazione relativa alla cartella del link, così il progetto resta valido se cambia percorso. Codice: `app/Actions/File/CreateRelativeSymlinkAction.php:23-93`.

Nota: la classe non usa il trait `QueueableAction`.

## Input

- `string $source`: cartella o file di destinazione, che deve esistere (`execute`, riga 28).
- `string $link`: percorso del link da creare (riga 28).

## Output

- `string`: la destinazione relativa scritta nel link (riga 33).

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| `FILE-SYMLINK-INV-1` | La destinazione scritta è relativa alla cartella del link ed è calcolata da `realpath` di entrambi. Non è mai assoluta. Codice: righe 39-59. Test: `tests/Unit/Actions/File/CreateRelativeSymlinkActionTest.php:29` | `FILE-SYMLINK-INV-1` |
| `FILE-SYMLINK-INV-2` | Se la cartella del link o la sorgente non esistono: `Assert` lancia `\InvalidArgumentException`. Codice: righe 41-44. Nessun test citato. | — (non dimostrato) |
| `FILE-SYMLINK-INV-3` | Il link è creato con `Safe\symlink`: se esiste già o fallisce, lancia eccezione. Codice: righe 30-31. Test citato (senza group): `tests/Unit/Actions/File/CreateRelativeSymlinkActionTest.php:38` | — (non dimostrato) |
| `FILE-SYMLINK-INV-4` | `isRelativeLinkTo()` è `false` se il percorso non è un link, se `readlink` fallisce, se il target è assoluto, o se il target risolto non coincide con la sorgente. Codice: righe 65-80. Test citato (senza group): `tests/Unit/Actions/File/CreateRelativeSymlinkActionTest.php:34` | — (non dimostrato) |

## Effetti collaterali

Creazione di un symlink nel filesystem. Non sovrascrive link esistenti.

## Errori

- `\InvalidArgumentException` (via `Assert`) per cartelle o sorgenti mancanti.
- Eccezioni `Safe\FilesystemException` per fallimento di `symlink` o `readlink`.

## Non fa

- Non crea la cartella del link.
- Non sostituisce un link esistente.
- Marker `@contract` aggiunto nel docblock della classe.
