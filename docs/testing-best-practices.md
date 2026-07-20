---
title: "Testing Best Practices — Modules/Xot"
type: rule
tags: [xot, testing, pest, phpstan]
module: Xot
created: 2026-07-20
updated: 2026-07-20
qmd: "testing best practice pest modulo xot type safety static analysis"
issues:
  - "https://github.com/laraxot/module_xot_fila5/issues/28"
discussions:
  - "https://github.com/laraxot/module_xot_fila5/discussions/29"
related:
  - ./00-index.md
  - ./00-INDEX.md
  - ./index.md
  - ./code-quality-standards.md
  - ./code-quality-standards-legacy.md
---

# Testing Best Practices - Modules/Xot

This document outlines best practices for writing and maintaining Pest tests under the Xot module, specifically addressing static analysis type safety.

## PHPStan Level 10 & Mockery

When using Mockery to mock dependencies in Pest tests, PHPStan might fail to resolve methods like `with()`, `andReturn()`, `andThrow()`, or `andReturnUsing()` called on `shouldReceive()`. This happens because Mockery returns a union type `ExpectationInterface|HigherOrderMessage` where these methods are not defined on all union members.

### Recommended Solution

Assign the result of `shouldReceive()` to a variable annotated with `/** @var \Mockery\Expectation $expectation */`.

#### Example

```php
/** @var \Mockery\MockInterface&MyAction $mock */
$mock = \Mockery::mock(MyAction::class);

/** @var \Mockery\Expectation $expectation */
$expectation = $mock->shouldReceive('execute');
$expectation->with($param)->andReturn($result);
```

This pattern ensures PHPStan successfully validates the chain at Level 10.

## Configurazione dell'Ambiente di Test

### File `.env.testing`

Il file `.env.testing` è usato per impostare le configurazioni specifiche per l'ambiente di test:

```
APP_ENV=testing
DB_CONNECTION=sqlite
DB_DATABASE=:memory:
SESSION_DRIVER=array
CACHE_DRIVER=array
QUEUE_CONNECTION=sync
```

### Struttura del TestCase

Ogni modulo dovrebbe avere un TestCase base nella cartella `tests/`:

#### Example
```php
/** @var \Mockery\MockInterface&MyAction $mock */
$mock = \Mockery::mock(MyAction::class);

/** @var \Mockery\Expectation $expectation */
$expectation = $mock->shouldReceive('execute');
$expectation->with($param)->andReturn($result);
```
This pattern ensures PHPStan successfully validates the chain at Level 10.
