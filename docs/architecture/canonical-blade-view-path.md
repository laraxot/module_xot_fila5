---
title: "Percorso canonico delle viste Blade Xot"
type: standard
module: Xot
---

# Percorso canonico delle viste Blade Xot

Il percorso canonico delle viste di un modulo è:

```text
Modules/<Modulo>/resources/views
```

Per Xot il provider registra esclusivamente `resources/views` tramite il
namespace `xot::`. `app/Resources/views` è un residuo legacy non registrato
dal provider e non deve ricevere nuove viste.

I file legacy esistenti restano intatti per compatibilità e per consentire una
migrazione successiva, owner-localizzata e verificata. Non si devono creare
copie parallele né cancellare automaticamente il percorso legacy.

Il test `CanonicalBladeViewPathTest` mantiene questa frontiera: il percorso
canonico deve esistere e l'elenco dei residui legacy ammessi non può crescere.

