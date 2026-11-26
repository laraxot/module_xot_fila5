---
title: "Template per Behavioral Contract"
type: template
module: Xot
status: active
created: 2026-11-26
updated: 2026-11-26
---

```yaml
title: "Contratto — <operazione>"
type: <contract-type>
module: <Module>
action: "<FQCN>"
status: accepted
created: YYYY-MM-DD
updated: YYYY-MM-DD
```

# Contratto — <operazione>

## Input

- <dato, tipo e vincolo>

## Output

- <valore restituito e forma osservabile>

## Invarianti

| ID | Promessa | Prova |
|---|---|---|
| `<OWNER>-<OPERATION>-INV-1` | <comportamento che deve restare vero> | `vendor/bin/pest <path> --group=<ID>` |

## Effetti collaterali

- <scritture, eventi, chiamate esterne o nessuno>

## Errori

- <errore e comportamento osservabile>

## Non fa

- <responsabilità esplicitamente fuori dal contratto>
