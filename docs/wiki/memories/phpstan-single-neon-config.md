---
title: "Solo laravel/phpstan.neon — mai altri .neon"
type: memory
module: Xot
status: active
created: 2026-10-20
updated: 2026-10-20
qmd: "phpstan single neon immutabile umano no -c no neon temporanei no baseline moduli filament stesso gate religione"
related:
  - ./index.md
  - ./phpstan-modules-zero-standing-order.md
  - ../../bmad/phpstan-status.md
  - ../../phpstan-fix-plan/final-config.md
  - ../../../../../../bashscripts/docs/prompts/11-phpstan.md
---

<!--
GateGuard facts:
1. Supersedes missing target linked from wiki/memories/index.md (broken link); complements final-config.md (stale ignore advice corrected there).
2. Linked from memories/index.md, phpstan-status, 11-phpstan, Theme Zero phpstan.md.
3. New file because index already points here and file was absent — same topic as final-config, memory is the short SSoT for agents.
4. User: "devi utilizzare laravel/phpstan.neon e solo io posso modificarlo, non puoi creare altri .neon , capisci il perche' ed il senso , aggiorna studia e migliora le cartelle docs..."
-->

# Solo `laravel/phpstan.neon`

## Scopo e perche'

Esiste **un** gate di analisi statica per tutto il monorepo Laravel. Se ogni
agente o modulo inventa un `.neon` proprio (`-c`, `phpstan-temp.neon`,
`phpstan.level9.neon` “per oggi”), il verde di una lane non e' piu' il verde
del progetto: CI, swarm e umano misurano cose diverse e il debito si nasconde
dietro configurazioni.

**Religione:** il codice si adatta al gate; il gate non si spezza per il codice.

## Regola operativa

| Chi | Cosa |
|-----|------|
| **Utente umano** | Unico autorizzato a modificare `laravel/phpstan.neon` |
| **Agente** | Solo `cd laravel && ./vendor/bin/phpstan analyse …` **senza** `-c`, `--level`, neon nuovi, restore/edit del neon |
| **Moduli/temi** | Eventuali `Modules/*/phpstan*.neon*` storici = **legacy non usabili**; non crearne altri; non citarli come gate |

File correlati che **non** sono il gate: `phpstan-baseline.neon` (include
commentato nel neon canonico), `phpstan-strict.neon` (include commentato),
neon sotto `Modules/*/docs/` (archivio/esperimenti).

## Cosa fare invece di un neon nuovo

- Helper test non visti → SSoT su `TestCase` + FQCN (non `scanFiles` nel neon)
- Ignore unmatched → segnala all'umano di togliere la voce; non spegnere
  `reportUnmatchedIgnoredErrors`
- Path scomodi → correggi tipi/codice; non `excludePaths` locali

## Verifica

```bash
cd laravel && ./vendor/bin/phpstan analyse Modules
# Note: Using configuration file .../laravel/phpstan.neon
git status --short laravel/phpstan.neon   # vuoto = agente non ha toccato il neon
```

## Filament

Widget/Resource/Page `XotBase*` passano dallo **stesso** gate. Nessun neon
Filament dedicato: il blueprint UI non cambia il misuratore
([livewire-to-filament-widgets-filament-blueprint](../../bmad/livewire-to-filament-widgets-filament-blueprint.md),
[filament-blueprint](../../bmad/filament-blueprint.md)).

## Riaffermazione utente (2026-10-20)

> "devi utilizzare laravel/phpstan.neon e solo io posso modificarlo, non puoi
> creare altri .neon"

Conferma: agenti non creano, non editano, non usano `-c` su neon legacy sotto
moduli/docs. Inventario storico (Activity/Geo/Xot `phpstan*.neon*`) = archivio,
non gate. Regola wiki: [phpstan-neon-immutable.md](../../../../../../bashscripts/ai/wiki/rules/phpstan-neon-immutable.md).
Catena operativa completa: [phpstan-modules-zero-standing-order](./phpstan-modules-zero-standing-order.md).
