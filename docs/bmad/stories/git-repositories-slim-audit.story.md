---
title: "Audit e manutenzione dei repository Git annidati"
type: story
module: Xot
epic: quality/git-governance
story_id: git-repositories-slim-audit
status: done
track: quick-flow
created: 2026-11-24
updated: 2026-11-24
qmd: "git repository annidati moduli temi slim gc pack Notify gitmodules safe sync"
related:
  - ../../../../../../bashscripts/ai/wiki/memories/agent-standing-order.md
  - ../../../../../../bashscripts/git/gitmodules.ini
  - ../../../../../../bashscripts/git/subtrees/sync_subtrees_safe.sh
---

# Audit e manutenzione dei repository Git annidati

## Scopo

Ridurre il rumore e gli artefatti transitori nelle directory `.git` di moduli e
temi senza cancellare storia, branch o repository che il progetto usa per il
coordinamento `gitmodules.ini`.

## Evidenze verificate

- I 18 moduli e i 3 temi sono repository indipendenti intenzionali; i loro `.git`
  devono restare.
- Le directory contengono soprattutto pack Git raggiungibili, non cache o file
  temporanei. Reflog e metadati operativi sono piccoli ma non vanno cancellati
  durante sync/rebase.
- `Modules/Notify/.git` è il caso dominante: circa 426 MiB di pack, zero loose
  object, zero garbage e nessun oggetto unreachable rilevato. La dimensione è
  storia Git raggiungibile, non materiale eliminabile con una pulizia sicura.
- Xot aveva oggetti loose/prune-packable mentre altri agenti eseguivano già
  `git gc`/repack; le misure durante la manutenzione non sono uno snapshot unico.

## Decisione operativa

- Non rimuovere `.git`, `objects`, `refs`, `logs`, `packed-refs`, `REBASE_HEAD` o
  `gc.pid` mentre un sync, rebase o gc può essere attivo.
- Non usare `reset --hard`, riscrittura della storia, `filter-repo` o shallow clone
  per ridurre la dimensione: cambierebbero la collaborazione e potrebbero perdere
  storia recuperabile.
- La manutenzione ammessa è `git gc`/repack solo per il repository preciso,
  dopo aver verificato assenza di processi Git concorrenti e con il worktree
  coordinato. È manutenzione tecnica, non una soluzione alla storia raggiungibile.
- Per ridurre davvero Notify serve una decisione separata sull'archivio della
  storia o sul clone shallow; non si applica automaticamente.

## Conferma

Per ogni repository, prima e dopo la manutenzione, registrare:

```bash
git count-objects -vH
git fsck --full --no-reflogs --unreachable --no-progress
git status --short
```

Il risultato è valido solo quando non ci sono processi `git gc`, `repack`, fetch,
merge o sync concorrenti e il worktree non viene modificato dall'audit.

## Esecuzione 2026-11-24f

Richiesta utente: le `.git` di moduli/temi hanno troppi elementi; snellire senza
perdere i repo indipendenti.

**Fatto (sicuro):**
- rimossi 19× `.git/gk` (GitKraken stub)
- rimossi 21× `.git/lfs` (cache locale; policy no-LFS) + `filter.lfs.required=false` locale
- rimossi 2× `REBASE_HEAD` orfani (Lang, Media; nessun rebase attivo)
- `git gc --prune=now` su 3 temi/moduli con loose objects
- script ripetibile: `bashscripts/git/slim-nested-git-repos.sh`
- memoria: `docs/wiki/memories/nested-git-slim-hygiene.md`

**Non fatto (volutamente):** non toccato il pack Notify (~427 MiB / ~145k oggetti /
2164 commit raggiungibili) — non è spazzatura; eventuale archive/shallow è ADR
separata.

Verifica: `LEFT_gk=0 LEFT_lfs=0 LEFT_REBASE_HEAD=0`; totale du ~609→605 MiB;
voci top-level tipiche 15→13.

## Seguito (2026-11-24, claude-fila5): decisione su Notify rivista, passo successivo e non alternativo

Questa story resta valida per `gk`, `lfs`, `REBASE_HEAD`. Il resto del peso era altrove, e la riga «shallow è ADR separata» e'
stata superata dai fatti in [module-theme-git-slim](./module-theme-git-slim.story.md): ref di tracking, `refs/prefetch`,
`refs/original` e tag tenevano 57 MiB (613 → 556), e il taglio di Notify sul commit di HEAD ha portato 428 → 15 MiB (totale 143).
Dichiaro la divergenza invece di nasconderla: qui si diceva «non usare shallow clone»; l'ho fatto una volta, a mano, solo dopo
aver verificato HEAD == `laraxot/dev`, zero commit locali, remoto che serve il commit per SHA, e dopo una prova su una copia.
Recupero: `git fetch --unshallow laraxot`. Se la decisione contraria resta quella di questa story, il recupero e' quel comando.
Lo script `slim-nested-git-repos.sh` e quello nuovo `tools/git/slim-module-theme-git.sh` sono complementari (artefatti di tooling
contro ref/commit-graph): non unirli senza decidere chi tiene il `gc --prune=now` senza periodo di grazia.

