---
title: "Xot — scopo del modulo e come raggiungerlo meglio"
type: concept
status: active
created: 2026-10-06
tags: [xot, purpose, framework, base classes, contracts, filament, foundation]
qmd: "xot scopo modulo foundation base classes traits contracts filament xotbase patterns architecture"
updated: 2026-10-06
issues:
  - "https://github.com/laraxot/module_xot_fila5/issues/"
discussions:
  - "https://github.com/laraxot/module_xot_fila5/discussions/"
---

# Xot — perche' esiste

## Lo scopo in una frase

**Xot è il fondamento architetturale dell'intera piattaforma: fornisce classi base (`XotBaseModel`, `XotBaseResource`, `XotBasePage`), contract per la type-safety, e pattern riutilizzabili che tutti gli altri 17 moduli estendono.**

## L'evidenza

- `XotBaseModel`, `XotBaseResource`, `XotBasePage`, `XotBaseTable`: classi base per estensione
- `Contracts`: interfacce per type-safety obbligatoria
- 295 file di documentazione per il framework
- **Nessun modulo deve estendere Filament/Laravel direttamente**: passa sempre da Xot

## Confini — cosa **non** appartiene a Xot

- La **logica di business** di alcun dominio: ogni modulo implementa il suo
- L'**estensione di laraxot/framework**: rimane nel repository laraxot/module_xot_fila5

## Collegamenti

- `docs/wiki/patterns/` — pattern architetturali
- `docs/bmad/` — decisioni di design framework
