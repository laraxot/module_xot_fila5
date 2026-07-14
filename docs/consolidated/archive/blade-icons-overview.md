---
title: "Panoramica delle Blade Icons in Xot"
module: "Xot"
type: concept
tags: [blade, icons, overview]
created: 2026-07-14
updated: 2026-07-14
qmd: "blade icons overview"
related:
  - "./eloquent-magic-properties-rule.md"
---
# Panoramica delle Blade Icons in Xot

## Introduzione
Le Blade Icons sono un componente fondamentale del sistema di interfaccia utente in Xot, permettendo una gestione modulare e flessibile delle icone SVG all'interno delle viste Blade.

## Componenti Principali

### Registrazione delle Icons
Per una comprensione dettagliata del processo di registrazione delle icone, consultare la [documentazione completa del metodo registerBladeIcons](registerBladeIcons.md).

### Struttura delle Directory
```
Modules/
  └── [ModuleName]/
      └── assets/
          └── svg/
              └── [icon-files].svg
```

## Best Practices
1. Organizzare le icone in modo logico all'interno della directory svg
2. Utilizzare nomi descrittivi per i file delle icone
3. Mantenere una struttura coerente tra i vari moduli

## Integrazione con Blade
```blade
<x-icon name="module-name::icon-name" />
```

## Risorse Aggiuntive
- [Documentazione dettagliata di registerBladeIcons](registerBladeIcons.md)
- [Guida all'implementazione delle icone personalizzate](custom-icons-implementation.md)
