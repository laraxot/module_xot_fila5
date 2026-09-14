---
title: "PSR-4: una classe per file"
type: concept
tags: [psr-4, composer, autoload, tests]
created: 2026-07-16
updated: 2026-07-16
qmd: "xot psr-4 composer class file fixture action filename"
issues:
<<<<<<< HEAD
<<<<<<< HEAD
  - "https://github.com/laraxot/<repo progetto>/issues/38"
discussions:
  - "https://github.com/laraxot/<repo progetto>/discussions/12"
=======
  - "https://github.com/laraxot/base_techplanner_fila5/issues/38"
discussions:
  - "https://github.com/laraxot/base_techplanner_fila5/discussions/12"
>>>>>>> laraxot/dev
=======
  - "https://github.com/laraxot/base_techplanner_fila5/issues/38"
discussions:
  - "https://github.com/laraxot/base_techplanner_fila5/discussions/12"
>>>>>>> laraxot/dev
related:
  - "../../../../../../docs/wiki/rules/namespace-structure-rules.md"
---

# PSR-4: una classe per file

Composer deriva il file dal nome completo della classe. Fixture e Action devono quindi avere un file omonimo: `BreadcrumbProbe.php` e `ContextCompressorAction.php`, non file aggregatori o nomi abbreviati.

Se le classi omonime esistono già nei path canonici, la correzione minima è eliminare la copia aggregata. Verifica: `composer dump-autoload -o` non deve più riportare la classe.
