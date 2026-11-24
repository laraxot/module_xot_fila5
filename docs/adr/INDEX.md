# Xot ADR index

This is the machine-readable inventory of architecture decisions owned by the **Xot** module.

An ADR records a difficult-to-reverse or surprising choice with a real trade-off. It states context, decision drivers, considered options, consequences, and a repeatable confirmation. A new decision supersedes an old one; it does not silently rewrite history.

## Decisions

- [0000-template](0000-template.md)
- [0001-actions-over-services](0001-actions-over-services.md)
- [0002-queueable-actions-over-framework-jobs](0002-queueable-actions-over-framework-jobs.md)
- [0003-pest-as-test-runner](0003-pest-as-test-runner.md)
- [0004-one-model-one-migration](0004-one-model-one-migration.md)
- [0005-owner-local-documentation](0005-owner-local-documentation.md)
- [0006-no-standalone-livewire-widgets](0006-no-standalone-livewire-widgets.md)
- [0006-xot-base-extension-points](0006-xot-base-extension-points.md)
- [0007-module-local-pest-testcase-binding](0007-module-local-pest-testcase-binding.md)
- [0008-filament-widgets-over-standalone-livewire](0008-filament-widgets-over-standalone-livewire.md)
- [0009-laravel-bootstrap-provider-registry](0009-laravel-bootstrap-provider-registry.md)
- [00010-no-ticket-logic-in-page-slug-middleware](00010-no-ticket-logic-in-page-slug-middleware.md)
- [00011-contract-docblock-reference](00011-contract-docblock-reference.md)
- [0012-behavioral-contract-governance](0012-behavioral-contract-governance.md)
- [0013-dati-sacri-migrazioni-e-test](0013-dati-sacri-migrazioni-e-test.md)
- [agent-harness](agent-harness.md)
- [architecture-tests-pest-arch](architecture-tests-pest-arch.md)
- [architecture-rules-phparkitect](architecture-rules-phparkitect.md)
- [auth-register-livewire-tenant-url-defaults](auth-register-livewire-tenant-url-defaults.md)
- [one-model-one-migration](one-model-one-migration.md)
- [pest-over-phpunit](pest-over-phpunit.md)
- [pest-testcase-binding-per-file](pest-testcase-binding-per-file.md)
- [queueable-actions-over-jobs](queueable-actions-over-jobs.md)

## Authoring

Use the shared template and rules in [Xot ADR standards](../../Xot/docs/adr/README.md). Do not create an ADR for a local implementation detail or an unverified hypothesis.
