---
title: "Rimozione delle icone statiche dalle XotBaseResource"
status: ready-for-dev
epic: code-quality
related:
<<<<<<< .merge_file_M3x55W
<<<<<<< .merge_file_wpYRjp
  - ../../../../Incentivi/docs/bmad/stories/xot-base-resource-navigation-icon-translation.story.md
  - ../../../../IndennitaCondizioniLavoro/docs/bmad/stories/xot-base-resource-navigation-icon-translation.story.md
  - ../../../../Performance/docs/bmad/stories/xot-base-resource-navigation-icon-translation.story.md
<<<<<<< HEAD
  - ../../../../Ptv/docs/bmad/stories/xot-base-resource-navigation-icon-translation.story.md
  - ../../../../IndennitaResponsabilita/docs/bmad/stories/xot-base-resource-navigation-icon-translation.story.md
  - ../../../../User/docs/bmad/stories/xot-base-resource-navigation-icon-translation.story.md
=======
>>>>>>> laraxot/dev
=======
  - ../../../../User/docs/bmad/stories/xot-base-resource-navigation-icon-translation.story.md
>>>>>>> .merge_file_GJ4IrH
=======
  - ../../../../User/docs/bmad/stories/xot-base-resource-navigation-icon-translation.story.md
>>>>>>> .merge_file_Syczhb
---

# Story

Come manutentore Filament, voglio che le Resource che estendono `XotBaseResource` non dichiarino `$navigationIcon`, così la navigazione segue le traduzioni e le convenzioni centralizzate del modulo invece di fissare metadati UI nelle classi.

## Acceptance criteria

- [ ] Mappare tutte le classi Resource nei moduli e temi che estendono direttamente o indirettamente `XotBaseResource` e dichiarano `navigationIcon`.
- [ ] Per ogni classe in scope, stabilire se la dichiarazione è ridondante o se il valore serve a una funzione distinta; documentare eventuali eccezioni prima della modifica.
- [ ] Rimuovere le dichiarazioni statiche in scope e preservare la navigazione tradotta e il comportamento dei Resource.
- [ ] Verificare ogni modulo interessato con PHPStan e i test mirati; riportare risultati e limiti ambientali.
- [ ] Aggiornare la documentazione tematica dei moduli interessati e il second brain con la regola verificata.

## Ambito emerso

L’ispezione iniziale ha trovato Resource in Incentivi, IndennitaCondizioniLavoro e Performance; il censimento completo diretto e transitivo resta il primo task di implementazione. La story centrale Xot definisce il contratto comune.

<<<<<<< .merge_file_M3x55W
<<<<<<< .merge_file_wpYRjp
=======
=======
>>>>>>> .merge_file_Syczhb
Story gemelle con lo stesso nome esistono nei moduli Incentivi, IndennitaCondizioniLavoro,
Performance, Ptv e IndennitaResponsabilita della flotta Laraxot; questi moduli non sono
presenti in questo repo, quindi i link relativi sono stati rimossi da `related` (erano rotti).
L'unica gemella locale e' quella del modulo User.

<<<<<<< .merge_file_M3x55W
>>>>>>> .merge_file_GJ4IrH
=======
>>>>>>> .merge_file_Syczhb
## Vincoli

- Non introdurre label UI hardcoded: le traduzioni restano la fonte dei testi di navigazione.
- Prima di ogni edit acquisire il lock sul file; non sovrascrivere modifiche già presenti.
- Nessun `@phpstan-ignore` o cast usato per nascondere finding.
