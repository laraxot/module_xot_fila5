---
title: "GetMethodBodyAction — contratto"
type: contract
owner: Xot
module: Xot
status: accepted
updated: 2026-11-26
action: "Modules\\Xot\\Actions\\ModelClass\\GetMethodBodyAction"
qmd: "GetMethodBodyAction sorgente metodo Reflection righe file startLine endLine codice"
---

# GetMethodBodyAction

Restituisce il sorgente di un metodo di classe leggendo le righe dal file. Codice: `app/Actions/ModelClass/GetMethodBodyAction.php`.

## Input

- `string $class_name`: classe esistente.
- `string $method_name`: metodo della classe.

## Output

- `string`: righe dalla linea di dichiarazione alla linea di chiusura, incluse, con indentazione originale.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| `MODEL-METHOD-INV-1` | Il risultato è esattamente le righe `startLine..endLine` del file del metodo. Nessun test citato. | — (non dimostrato) |
| `MODEL-METHOD-INV-2` | Il docblock che precede il metodo non è incluso. Nessun test citato. | — (non dimostrato) |

## Effetti collaterali

- Legge il file sorgente da disco (`file()`).

## Errori

- `Assert::classExists` lancia se la classe non esiste.
- `\ReflectionException` se il metodo non esiste.
- `Assert::string` lancia se il file non è disponibile (metodi interni o generati).

## Non fa

- Non analizza né valida il codice estratto.
- Non funziona per metodi senza file sorgente.
