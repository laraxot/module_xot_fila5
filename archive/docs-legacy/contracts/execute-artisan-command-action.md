---
title: "ExecuteArtisanCommandAction — contratto"
type: contract
owner: Xot
module: Xot
status: accepted
updated: 2026-11-26
action: "Modules\\Xot\\Actions\\ExecuteArtisanCommandAction"
qmd: "ExecuteArtisanCommandAction artisan allowlist comandi process php artisan timeout output migrate passport"
---

# ExecuteArtisanCommandAction

Esegue un comando Artisan da una lista chiusa di comandi consentiti. Codice: `app/Actions/ExecuteArtisanCommandAction.php` (classe a riga 18, `execute()` a riga 56, lista a righe 27-41).

## Input

- `string $command`: comando senza `php artisan`, deve coincidere con una voce della lista.

## Output

- `array{command, output: list<string>, status: 'completed'|'failed', exitCode}`.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| `XOT-ARTISAN-EXEC-INV-1` | Un comando che non coincide esattamente (`in_array` strict, riga 133) con una voce di `allowedCommands` (righe 27-41) lancia `RuntimeException('Comando non consentito: …')` prima di avviare qualsiasi processo (righe 60-62). Un comando vuoto non arriva alla lista: `Assert::stringNotEmpty` lancia `InvalidArgumentException` (riga 58). Il test copre la variante distruttiva `migrate` con `:fresh`, `migrate --force`, `MIGRATE` e ` migrate` con `Process::assertNothingRan`; il caso vuoto non è nel dataset. | `XOT-ARTISAN-EXEC-INV-1` |
| `XOT-ARTISAN-EXEC-INV-2` | L'esito riflette il processo: `status` è `completed` solo se il processo termina con successo, altrimenti `failed`; `exitCode` è il codice di uscita (`?? 0`); lo stdout entra in `output`, lo stderr con prefisso `[ERROR] ` (righe 100-116). | `XOT-ARTISAN-EXEC-INV-2` |
| `XOT-ARTISAN-EXEC-INV-3` | Il processo è `php artisan <comando>` con cwd `base_path()` e timeout 300 secondi (righe 68-71); l'output è raccolto a polling di 50 ms finché il processo gira (righe 77-95). I test usano `Process::fake` con la chiave `php artisan migrate`: non provano cwd, timeout né polling. | — (non dimostrato) |

ID precedenti (prefisso `EXEC-ARTISAN-INV-`, mai citati altrove, allineati ai group che i test portavano già): il numero 1 è ora `XOT-ARTISAN-EXEC-INV-1`; i numeri 3 e 4 sono confluiti in `XOT-ARTISAN-EXEC-INV-2`; il numero 2 è ora `XOT-ARTISAN-EXEC-INV-3`.

## Effetti collaterali

Esecuzione di un processo PHP. La lista include comandi che modificano dati o schema: `migrate`, `passport:purge` (cancella token), `passport:keys`, `queue:restart`, più i comandi di cache. Nessuna transazione.

## Errori

- `RuntimeException` per comando non consentito (protegge `XOT-ARTISAN-EXEC-INV-1`) o per errori del processo, incapsulati con il codice originale (righe 118-120).
- `InvalidArgumentException` per comando vuoto (riga 58).

## Non fa

- Non accetta argomenti aggiuntivi fuori dalla lista.
- Da valutare: `migrate` è in lista senza `--force`. Su produzione può applicare migrazioni pendenti: va confrontato con la regola sui dati sacri del progetto prima di mantenerlo.
