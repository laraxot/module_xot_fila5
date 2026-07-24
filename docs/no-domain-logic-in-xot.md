# Xot must not contain domain-specific logic

**Date**: 2026-07-24

## Rule

`Modules/Xot` is the framework/base module. It provides infrastructure reused
by every other module: `XotBase*` Filament mirrors, safe-cast Actions
(`Modules/Xot/app/Actions/Cast/*`), cross-cutting traits, base providers.

It must **never** contain Actions/Models/Resources implementing logic for a
domain that already has its own dedicated module (`Modules/AI`,
`Modules/Notify`, `Modules/Media`, `Modules/Seo`, ...), regardless of where
the developer happened to be working when they wrote it.

## Why

- Breaks modular isolation — Xot becomes a heavy dependency that "knows about"
  domains it has no business knowing about.
- Makes it impossible to disable/remove a domain module without touching Xot.
- Confuses ownership — anyone looking for "AI actions" looks in
  `Modules/AI/app/Actions/`, not in `Modules/Xot/app/Actions/AI/`.

## Real case found and fixed (2026-07-24)

`Modules/Xot/app/Actions/AI/Ollama/{GenerateOllamaAction,ChatOllamaAction}.php`
existed inside Xot even though `Modules/AI` already exists with its own Actions
tree. Zero external callers referenced the Xot versions — moved to
`Modules/AI/app/Actions/Ollama/` (namespace `Modules\AI\Actions\Ollama`).
Details: [`Modules/AI/docs/ollama-actions-moved-from-xot.md`](../../AI/docs/ollama-actions-moved-from-xot.md).

## Checklist before adding a new Action under Modules/Xot/app/Actions/

1. Does this Action's domain already have a dedicated module
   (`Modules/AI`, `Modules/Notify`, `Modules/Media`, ...)? → it belongs there.
2. Is it generic infrastructure reusable across modules with no domain logic
   (safe casts, `XotBase*`, cross-cutting helpers)? → Xot is correct.
3. When unsure, check whether the target domain module already has a
   matching `Actions/<Subfolder>/` — if so, the answer is almost always
   "put it there".

See also: skill `xot-is-framework-base` and wiki concept
`xot-is-framework-base-not-domain-owner`.
