---
title: "Contratti — Xot"
type: index
tags: [contracts, actions, xot]
created: 2026-11-18
updated: 2026-11-24
---

# Contratti — Xot

Xot è la base di tutti i moduli: qui stanno i contratti delle sue Action con effetti collaterali **chiamate dagli
altri moduli** — scrittura di array su file (traduzioni, config dei tenant, model su JSON), esecuzione di comandi
Artisan dal pannello, invio di mail con PDF. Un cambiamento qui si propaga a Lang, Tenant, User, Notify e a tutto ciò
che le usa.

**Quando leggerli**: prima di chiamare una di queste Action da un modulo, di cambiarne il comportamento, o di
scrivere un'Action simile (che invece di imitare il codice dovrebbe riusarle).

Formato (6 sezioni, tabella invarianti con ID e group Pest, `@contract` nel docblock):
[action-behavioral-contract](../rules/action-behavioral-contract.md). Un'invariante con group si verifica con
`vendor/bin/pest Modules/Xot/tests --group=<ID>`; `—` è debito dichiarato.

## Contratti

- [SaveArrayAction](save-array-action.md) — scrive un array su file PHP (default) o JSON, sovrascrivendo; punto unico usato da Lang, Tenant e Xot.
- [SavePhpArrayAction](save-php-array-action.md) — file PHP con `strict_types`, una chiave per riga, rileggibile con `require`.
- [SaveJsonArrayAction](save-json-array-action.md) — file JSON pretty-print, crea la cartella se manca.
- [ExecuteArtisanCommandAction](execute-artisan-command-action.md) — esegue `php artisan <cmd>` solo per comandi identici all'allowlist.
- [SendMailByRecordAction](send-mail-by-record-action.md) — PDF del record via SMTP all'email del record, poi log `sendMail`.
