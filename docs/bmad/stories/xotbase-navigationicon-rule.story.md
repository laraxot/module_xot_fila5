<<<<<<< .merge_file_A2vZwo
<<<<<<< .merge_file_2CV6he
<<<<<<< .merge_file_HgiVZN
=======
=======
>>>>>>> .merge_file_DZiNVf
---
title: "Xot - xotbase-navigationicon-rule.story.md"
module: Xot
bmad: true
status: active
---
<<<<<<< .merge_file_2CV6he
>>>>>>> .merge_file_6rsHrM
=======
>>>>>>> .merge_file_DZiNVf
=======
---
title: "BMAD Story — XotBaseResource: rimuovere $navigationIcon (traduzioni gestiscono)"
type: story
module: Xot
bmad: true
status: draft
updated: 2026-10-09
tags: [docs, xot, bmad]
qmd: "bmad story   xotbaseresource: rimuovere $navigationicon (traduzioni gestiscono) xot"
---

>>>>>>> .merge_file_tj64dC
# BMAD Story — XotBaseResource: rimuovere $navigationIcon (traduzioni gestiscono)

## Epic
XOT-ARCH-001

## AC
- [ ] Chi estende `XotBaseResource` NON dichiara `protected static string|\BackedEnum|null $navigationIcon`
- [ ] Icone gestite via traduzioni (`Lang` module) / `PanelModuleAdapter`
- [ ] Moduli controllati: `IndennitaCondizioniLavoro`, `Incentivi`, `Ptv`, `Performance`, `Progressioni`
- [ ] Nessuna modifica a `docs/` oltre questa story

## Task
1. Rimuovere dichiarazione da `AssenzaResource`, `CondizioniLavoroResource`, `UploadResource`
2. Idem `PhaseResource`, `DefaultActivityResource`
3. Idem `BaseCategoriaProproResource`, `BaseMessageResource`, `BaseCriteriOptionResource`
4. Registrare regola in memoria / second-brain

## Status
Todo
