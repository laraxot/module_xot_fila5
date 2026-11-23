# Xot behavioral contract index

This is the machine-readable inventory of behavioral contracts owned by the **Xot** module.

A contract describes an existing public operation or boundary. It names the owner, input, output, stable invariants, side effects and their order, errors, and non-goals. Every invariant gets a stable ID and a Pest group when a test exists; missing coverage is recorded as debt instead of being implied away.

## Contracts

- [Bootstrap provider registry](bootstrap-provider-registry.md)

- [contract-authoring-standard](contract-authoring-standard.md)
- [xotbase-classes](xotbase-classes.md)

## Authoring

Use [Xot contract authoring standard](../../Xot/docs/contracts/contract-authoring-standard.md) and the shared template. Legacy behavior is documented as-is and is not a model for new code.
