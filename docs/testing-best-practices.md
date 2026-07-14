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