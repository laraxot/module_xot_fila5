---
title: "PHPStan Best Practices - Xot Module"
type: guideline
tags: [phpstan, testing, quality, static-analysis, pest, xot]
created: 2026-06-13
<<<<<<< HEAD
updated: 2026-09-21
qmd: "Xot PHPStan best practices Pest Assert method.internalClass Mockery allows Blade mockService rrmdir"
=======
<<<<<<< HEAD
<<<<<<< .merge_file_L3awa3
=======
<<<<<<< .merge_file_QHz5RC
=======
updated: 2026-09-21
qmd: "Xot PHPStan best practices Pest Assert method.internalClass Mockery allows Blade mockService rrmdir"
=======
<<<<<<< HEAD
>>>>>>> .merge_file_s1WYE4
updated: 2026-07-22
qmd: "Xot PHPStan best practices Pest Assert method.internalClass Mockery allows Blade"
=======
<<<<<<< HEAD
<<<<<<< .merge_file_L3awa3
=======
>>>>>>> .merge_file_PYTqPv
>>>>>>> .merge_file_s1WYE4
<<<<<<< HEAD
updated: 2026-06-13
qmd: "Xot PHPStan best practices Pest Assert closure mockService rrmdir"
=======
updated: 2026-07-22
qmd: "Xot PHPStan best practices Pest Assert method.internalClass Mockery allows Blade"
>>>>>>> laraxot/dev
=======
updated: 2026-09-21
qmd: "Xot PHPStan best practices Pest Assert method.internalClass Mockery allows Blade mockService rrmdir"
>>>>>>> laraxot/dev
<<<<<<< .merge_file_L3awa3
>>>>>>> laraxot/dev
=======
<<<<<<< .merge_file_QHz5RC
=======
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
>>>>>>> .merge_file_PYTqPv
>>>>>>> .merge_file_s1WYE4
>>>>>>> laraxot/dev
issues:
  - "https://github.com/laraxot/module_xot_fila5/issues/43"
discussions:
  - "https://github.com/laraxot/module_xot_fila5/discussions/29"
related:
  - concepts/phpstan-pest-bridge-discipline.md
  - overviews/platform-completion-roadmap.md
  - ../../../../../docs/wiki/PHPSTAN-INDEX.md
---

# PHPStan Best Practices - Xot Module

<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< .merge_file_L3awa3
=======
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
<<<<<<< .merge_file_QHz5RC
=======
=======
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> laraxot/dev
>>>>>>> .merge_file_PYTqPv
>>>>>>> .merge_file_s1WYE4
## Pattern per Test in Pest con PHPStan Level Max

### 1. Property Dinamiche in Closure Pest

**Problema:** PHPStan non riconosce `$this->property` nelle closure Pest.

**Soluzione A - Variabile Locale (Consigliata):**
<<<<<<< .merge_file_L3awa3
<<<<<<< HEAD
=======
=======
=======
<<<<<<< .merge_file_QHz5RC
=======
=======
<<<<<<< HEAD
=======
=======
>>>>>>> laraxot/dev
>>>>>>> .merge_file_PYTqPv
>>>>>>> .merge_file_s1WYE4
>>>>>>> laraxot/dev
Disciplina: **risolvere**, non sopprimere. Niente `@phpstan-ignore` di evasione,
niente baseline, niente `mixed` per zittire l'analizzatore.

## Pattern per Test in Pest con PHPStan Level Max

### 1. Property dinamiche in closure Pest

PHPStan non vede `$this->property` nelle closure Pest. Preferire variabile locale:

<<<<<<< HEAD
=======
<<<<<<< .merge_file_L3awa3
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======
<<<<<<< .merge_file_QHz5RC
=======
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
>>>>>>> .merge_file_PYTqPv
>>>>>>> laraxot/dev
>>>>>>> .merge_file_s1WYE4
>>>>>>> laraxot/dev
```php
test('example', function (): void {
    $action = new MyAction;
    $result = $action->execute();
    Assert::assertSame('expected', $result);
});
```

<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< .merge_file_L3awa3
=======
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
<<<<<<< .merge_file_QHz5RC
=======
=======
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> laraxot/dev
>>>>>>> .merge_file_PYTqPv
>>>>>>> .merge_file_s1WYE4
**Soluzione B - assert() Type Narrowing:**
```php
beforeEach(function (): void {
    $this->workDir = sys_get_temp_dir() . '/test';
<<<<<<< .merge_file_L3awa3
<<<<<<< HEAD
=======
=======
=======
<<<<<<< .merge_file_QHz5RC
=======
=======
<<<<<<< HEAD
=======
=======
>>>>>>> laraxot/dev
>>>>>>> .merge_file_PYTqPv
>>>>>>> .merge_file_s1WYE4
>>>>>>> laraxot/dev
Narrowing solo se il body usa `$this`:

```php
beforeEach(function (): void {
    $this->workDir = sys_get_temp_dir().'/test';
<<<<<<< HEAD
=======
<<<<<<< .merge_file_L3awa3
>>>>>>> laraxot/dev
=======
<<<<<<< .merge_file_QHz5RC
=======
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
>>>>>>> .merge_file_PYTqPv
>>>>>>> .merge_file_s1WYE4
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
    assert(is_string($this->workDir));
});
```

<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< .merge_file_L3awa3
=======
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
<<<<<<< .merge_file_QHz5RC
=======
=======
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> laraxot/dev
>>>>>>> .merge_file_PYTqPv
>>>>>>> .merge_file_s1WYE4
**Soluzione C - @phpstan-ignore (Quando inevitabile):**
```php
test('example', function (): void {
    /** @phpstan-ignore varTag.variableNotFound */
    $mock = Mockery::mock(MyClass::class);
});
```

### 2. Mock PHPUnit in Closure Pest

**Problema:** `$this->atLeastOnce()` è protected, PHPStan segnala errore.

**Soluzione:**
```php
$mock = $this->createUnitMock(MyClass::class);
/** @phpstan-ignore-next-line */
$mock->expects($this->atLeastOnce())
    ->method('execute')
    ->willReturn($result);
```

### 3. Return Type Covarianza

**Problema:** `mockService()` in TestCase figlio deve essere covariante con parent.

**Soluzione:** Usare lo stesso tipo del parent:
```php
// XotBaseTestCase
public function mockService(string $abstract, ?\Closure $callback = null): MockInterface

// TestCase (figlio) - stessa signature, stesso tipo
public function mockService(string $abstract, ?\Closure $callback = null): MockObject
```

### 4. Chiamate static::assert*() Fuori Classe

**Problema:** `static::assertDirectoryDoesNotExist()` in closure Pest.

**Soluzione:** Usare `Assert::` (classe PHPUnit):
```php
// ❌ Errore
static::assertDirectoryDoesNotExist($path);

// ✅ OK
Assert::assertDirectoryDoesNotExist($path);
```

### 5. Type Narrowing per Funzioni PHP

**Problema:** `tempnam()` ritorna `string|false`, PHPStan segnala errore.

**Soluzione:** assegnazione diretta senza `assertIsString` ridondante se il ramo `false` è irraggiungibile in test, oppure:

```php
$tempFile = tempnam(sys_get_temp_dir(), 'prefix');
if ($tempFile === false) {
    Assert::fail('tempnam failed');
}
```

**Anti-pattern:** `Assert::assertIsString($tempFile)` quando `$tempFile` è già `string` — `staticMethod.alreadyNarrowedType`.

### 6. `@var TestCase $this` solo se serve

**Problema:** annotare `/** @var TestCase $this */` prima di `$action = app(...)` genera `varTag.differentVariable`.

**Soluzione:** mettere `@var` solo nelle closure che chiamano `$this->rrmdir()`, `$this->mockService()`, ecc. Se il test usa solo variabili locali, **omettere** `@var`.

<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
### 7. `expect()->toBe*()` → `method.internalClass` (Pest mixins)

**Problema:** in alcuni file Pest namespaced, PHPStan segnala `method.internalClass` su `Pest\Mixins\Expectation` (`toBe`, `toBeTrue`, `toThrow`, …) anche se altri test con `expect()` passano.

**Soluzione (DRY/KISS):** preferire `PHPUnit\Framework\Assert` + asserzione sul dato reale (count, instance, stesso valore). Evitare tautologie `expect(true)->toBe(true)` / `Assert::assertTrue(true)` (`staticMethod.alreadyNarrowedType`).

```php
use PHPUnit\Framework\Assert;

Assert::assertSame(0, $mockComps->count());
```

### 8. Mockery sotto PHPStan

**Problema:** `->andReturn()` / `->andReturns()` su catena `shouldReceive` spesso dà `method.notFound` (union Mockery).

**Soluzione:** pattern Xot collaudato:
<<<<<<< .merge_file_L3awa3
<<<<<<< HEAD
=======
=======
=======
<<<<<<< .merge_file_QHz5RC
=======
=======
<<<<<<< HEAD
=======
=======
>>>>>>> laraxot/dev
>>>>>>> .merge_file_PYTqPv
>>>>>>> .merge_file_s1WYE4
>>>>>>> laraxot/dev
### 2. Mock PHPUnit in closure Pest

`$this->atLeastOnce()` è protected. Usare `createUnitMock()` o Mockery `allows()`.

### 3. Return type covarianza

`mockService()` nel TestCase figlio deve avere la stessa firma del parent.

### 4. Chiamate `static::assert*()` fuori classe

Nelle closure Pest usare `Assert::`, mai `static::`.

### 5. Type narrowing per funzioni PHP

`tempnam()` è `string|false`. Gestire `false` con `Assert::fail()`, non con
`assertIsString` su un valore già ristretto (`staticMethod.alreadyNarrowedType`).

### 6. `@var TestCase $this` solo se serve

Annotare `$this` solo nelle closure che chiamano metodi dell'istanza.
Se il test usa solo variabili locali, omettere `@var` (`varTag.differentVariable`).

### 7. `expect()->toBe*()` → `method.internalClass`

Su file Pest namespaced, `Pest\Mixins\Expectation` è `@internal`. Preferire
`PHPUnit\Framework\Assert` sul dato reale. Evitare tautologie `assertTrue(true)`.

### 8. Mockery sotto PHPStan

Catene `shouldReceive()->andReturn()` spesso `method.notFound`. Pattern Xot:
<<<<<<< HEAD
=======
<<<<<<< .merge_file_L3awa3
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======
<<<<<<< .merge_file_QHz5RC
=======
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
>>>>>>> .merge_file_PYTqPv
>>>>>>> laraxot/dev
>>>>>>> .merge_file_s1WYE4
>>>>>>> laraxot/dev

```php
/** @var GetComponentsAction&MockInterface $getComponents */
$getComponents = Mockery::mock(GetComponentsAction::class);
$getComponents->allows(['execute' => $mockComps]);
app()->instance(GetComponentsAction::class, $getComponents);
```

<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< .merge_file_L3awa3
=======
<<<<<<< .merge_file_QHz5RC
=======
=======
<<<<<<< HEAD
>>>>>>> .merge_file_s1WYE4
`RegisterBladeComponentsAction::execute(string $path, string $namespace, string $prefix = '')` — mockare `Modules\Xot\Actions\File\GetComponentsAction` (non un fantasma `Actions\Blade\GetComponentsAction`).

=======
<<<<<<< HEAD
<<<<<<< .merge_file_L3awa3
=======
>>>>>>> .merge_file_PYTqPv
>>>>>>> .merge_file_s1WYE4
`RegisterBladeComponentsAction::execute(string $path, string $namespace, string $prefix = '')` — mockare `Modules\Xot\Actions\File\GetComponentsAction` (non un fantasma `Actions\Blade\GetComponentsAction`).

>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
## Checklist Pre-Commit

- [ ] `php -d memory_limit=2048M vendor/bin/phpstan analyse Modules` passa (non solo Xot)
- [ ] Test Pest eseguibili: `vendor/bin/pest Modules/Xot/tests/Unit`
- [ ] Nessun `static::` in closure Pest (usare `Assert::`)
<<<<<<< HEAD
- [ ] Preferire `Assert::` se `expect()->…` dà `method.internalClass`
- [ ] Mockery: `allows(['method' => $value])` + `@var Class&MockInterface` (non catene `andReturn` fragili)
- [ ] Mock con `@phpstan-ignore-next-line` solo se inevitabile
=======
<<<<<<< HEAD
- [ ] Mock con `@phpstan-ignore-next-line` se necessario
=======
- [ ] Preferire `Assert::` se `expect()->…` dà `method.internalClass`
- [ ] Mockery: `allows(['method' => $value])` + `@var Class&MockInterface` (non catene `andReturn` fragili)
- [ ] Mock con `@phpstan-ignore-next-line` solo se inevitabile
>>>>>>> laraxot/dev
=======
<<<<<<< .merge_file_L3awa3
=======
<<<<<<< .merge_file_QHz5RC
=======
>>>>>>> laraxot/dev
>>>>>>> .merge_file_PYTqPv
>>>>>>> .merge_file_s1WYE4
>>>>>>> laraxot/dev
## Checklist pre-commit

- [ ] `php -d memory_limit=-1 vendor/bin/phpstan analyse` (comando che certifica) passa
- [ ] Pest del modulo: `vendor/bin/pest Modules/Xot/tests/Unit`
- [ ] Nessun `static::` in closure Pest
- [ ] Mockery: `allows(['method' => $value])` + `@var Class&MockInterface`
<<<<<<< HEAD
=======
<<<<<<< .merge_file_L3awa3
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======
<<<<<<< .merge_file_QHz5RC
=======
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
>>>>>>> .merge_file_PYTqPv
>>>>>>> laraxot/dev
>>>>>>> .merge_file_s1WYE4
>>>>>>> laraxot/dev

## Links

- [platform-completion-roadmap](overviews/platform-completion-roadmap.md)
- [phpstan-pest-bridge-discipline](concepts/phpstan-pest-bridge-discipline.md)
- [PHPSTAN-INDEX](../../../../../docs/wiki/PHPSTAN-INDEX.md)
- [module-testcase-xotbase-hierarchy](rules/module-testcase-xotbase-hierarchy.md)
<<<<<<< HEAD
- [phpstan-modules-fix](troubleshooting/phpstan-modules-fix.md)
=======
<<<<<<< HEAD
<<<<<<< .merge_file_L3awa3
=======
<<<<<<< .merge_file_QHz5RC
=======
- [phpstan-modules-fix](troubleshooting/phpstan-modules-fix.md)
>>>>>>> laraxot/dev
=======
- [phpstan-modules-fix](troubleshooting/phpstan-modules-fix.md)
=======
<<<<<<< HEAD
>>>>>>> .merge_file_s1WYE4
=======
<<<<<<< HEAD
=======
- [phpstan-modules-fix](troubleshooting/phpstan-modules-fix.md)
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
<<<<<<< .merge_file_L3awa3
=======
>>>>>>> laraxot/dev
>>>>>>> .merge_file_PYTqPv
>>>>>>> .merge_file_s1WYE4
>>>>>>> laraxot/dev
