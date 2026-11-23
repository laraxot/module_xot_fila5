# Xot behavioral contract index

This is the machine-readable inventory of behavioral contracts owned by the **Xot** module.

A contract describes an existing public operation or boundary. It names the owner, input, output, stable invariants, side effects and their order, errors, and non-goals. Every invariant gets a stable ID and a Pest group when a test exists; missing coverage is recorded as debt instead of being implied away.

## Contracts

- [Bootstrap provider registry](bootstrap-provider-registry.md)

- [contract-authoring-standard](contract-authoring-standard.md)
- [xotbase-classes](xotbase-classes.md)

## Authoring

Use [Xot contract authoring standard](../../Xot/docs/contracts/contract-authoring-standard.md) and the shared template. Legacy behavior is documented as-is and is not a model for new code.

---
title: "Behavioral Contracts — indice operativo Xot"
type: index
owner: Xot
status: active
updated: 2026-11-23
---

# Behavioral Contracts — indice operativo Xot

Questo indice collega ogni promessa owner-local alla classe che la implementa, agli
ID delle invarianti e ai gruppi Pest che la verificano. Il formato è definito da
[behavioral-contract-template.md](behavioral-contract-template.md) e la decisione
di governance da [ADR 0012](../adr/0012-behavioral-contract-governance.md).

## Registro

| Contratto | Owner / superficie | Invarianti e gruppi Pest | Verifica |
| --- | --- | --- | --- |
| [xotbase-classes.md](xotbase-classes.md) | `Modules\\Xot` — classi `XotBase*` | Contratto di base, non una Action; verifica consumer indicata nel documento | Vedi la sezione “Come verificare” del contratto |

Non ci sono ancora Behavioral Contract di Action owner Xot da registrare. I
contratti di Action degli altri moduli restano nei rispettivi `docs/contracts/`;
questo indice non li duplica.

## Procedura per aggiungere un contratto

1. Creare il file a partire dal [template](behavioral-contract-template.md), con
   frontmatter `type: contract` e `action: <FQCN>`.
2. Verificare che l'Action contenga sia `@see docs/contracts/<file>.md` sia
   `@contract docs/contracts/<file>.md` e che il comportamento scritto sia quello
   realmente implementato.
3. Assegnare a ogni invariante un ID stabile `<SCOPE>-INV-<N>`; usare lo stesso ID
   nella tabella, nel test Pest e in questo registro.
4. Aggiungere il test al modulo owner con `->group('<ID>')`, quindi riportare il
   comando isolato nella colonna “Verifica”.
5. Aggiornare contratto, test e indice nella stessa modifica e lanciare i controlli
   documentali Xot.

## Comandi di controllo

Da `laravel/`:

```bash
vendor/bin/pest Modules/Xot/tests/Unit/Docs/ActionContractsAreCompleteTest.php
vendor/bin/pest Modules/Xot/tests/Unit/Docs/PackagesHaveContractsAndAdrTest.php
vendor/bin/pest --group=<SCOPE>-INV-<N>
```

Il terzo comando è un segnaposto operativo: sostituire `<SCOPE>-INV-<N>` con un ID
presente nel registro. Un contratto senza test associato non è completo.

## Documentazione correlata

- [README dei contratti](README.md) — indice e convenzioni storiche del package.
- [Standard di authoring](contract-authoring-standard.md) — regole di formato e
  verifica.
- [Regola Action Behavioral Contract](../rules/action-behavioral-contract.md) —
  quando il contratto è obbligatorio.
