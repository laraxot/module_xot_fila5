# Aggiornamento Importante: ai_init.sh Script

## Nota di deprecazione

Questo documento riflette il modello legacy "un path reale per ogni tool" ed e'
da considerare superato.

## Modello corretto

Tutti gli adapter di root devono puntare a un solo backend condiviso:

```text
.claude   -> bashscripts/ai/.agents
.cursor   -> bashscripts/ai/.agents
.codex    -> bashscripts/ai/.agents
.gemini   -> bashscripts/ai/.agents
.iflow    -> bashscripts/ai/.agents
.windsurf -> bashscripts/ai/.agents
.zai      -> bashscripts/ai/.agents
```

<<<<<<< HEAD
Tutti dovrebbero mostrare "symbolic link to bashscripts/ai/..."
=======
## Shadow directory vietate

Le directory seguenti non devono esistere sotto `bashscripts/ai/`:

- `bashscripts/ai/.cursor`
- `bashscripts/ai/.gemini`
- `bashscripts/ai/.iflow`
- `bashscripts/ai/.windsurf`
- `bashscripts/ai/.zai`

Per estensione, il principio vale per qualsiasi altra cartella tool-specific
che duplichi il contenuto di `.agents`.

## Script canonico

```bash
bash bashscripts/tools/sync-ide-junctions.sh --check
bash bashscripts/tools/sync-ide-junctions.sh
```

## Perche'

Una sola fonte di verita' evita:

- drift tra tool;
- duplicazione dei prompt e delle regole;
- correzioni replicate in piu' alberi;
- falsa impressione che esistano stack separati per Cursor, Gemini o Windsurf.

## Cross-reference

- [ide-agents-junctions.md](ide-agents-junctions.md)
- [docs/wiki/concepts/agent-config-junctions-ssot.md](../../../../docs/wiki/concepts/agent-config-junctions-ssot.md)
>>>>>>> 09d6105 (.)
