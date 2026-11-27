---
title: "Indice di lavoro contratti — Xot"
type: index
module: Xot
status: active
created: 2026-12-01
updated: 2026-12-01
qmd: "xot contracts index lavoro operazione action invarianti group pest"
---

# Indice di lavoro dei contratti — Xot

Tabella di lavoro dei contratti `type: contract` **locali** in `docs/contracts/`.
L'inventario completo (inclusi i contratti archiviati in
[`archive/docs-legacy/contracts/`](../../archive/docs-legacy/contracts/)) è in
[INDEX.md](INDEX.md); formato e regole in [README.md](README.md).

| Operazione | Contratto | Classe | Invarianti (group Pest) |
|---|---|---|---|
| Eseguire un comando Artisan da una lista chiusa | [execute-artisan-command-action](execute-artisan-command-action.md) | `Modules\Xot\Actions\ExecuteArtisanCommandAction` | `XOT-ARTISAN-EXEC-INV-1`, `XOT-ARTISAN-EXEC-INV-2` (dimostrate); `XOT-ARTISAN-EXEC-INV-3` (—) |
| Salvare un array su file in formato php o json | [save-array-action](save-array-action.md) | `Modules\Xot\Actions\Arr\SaveArrayAction` | `XOT-SAVE-ARRAY-INV-1`, `XOT-SAVE-ARRAY-INV-2`, `XOT-SAVE-ARRAY-INV-3` |
| Salvare un array come JSON su file | [save-json-array-action](save-json-array-action.md) | `Modules\Xot\Actions\Arr\SaveJsonArrayAction` | `XOT-SAVE-JSON-INV-1` (dimostrata); `XOT-SAVE-JSON-INV-2` (—) |
| Salvare un array come file PHP `return [...]` | [save-php-array-action](save-php-array-action.md) | `Modules\Xot\Actions\Arr\SavePhpArrayAction` | `XOT-SAVE-PHP-INV-1`, `XOT-SAVE-PHP-INV-2`, `XOT-SAVE-PHP-INV-3` |
| Inviare la mail di un record con PDF e log | [send-mail-by-record-action](send-mail-by-record-action.md) | `Modules\Xot\Actions\Mail\SendMailByRecordAction` | `XOT-MAIL-RECORD-INV-1` (dimostrata); `XOT-MAIL-RECORD-INV-2`, `XOT-MAIL-RECORD-INV-3`, `XOT-MAIL-RECORD-INV-4` (—) |

La prova minima di un'invariante: `vendor/bin/pest --group=<ID>` da `laravel/`.
